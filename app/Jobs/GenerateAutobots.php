<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\Autobot;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Events\AutobotCreated;

class GenerateAutobots implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The maximum number of times a job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 1200; // 20 minutes

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            
            $users = Http::get('https://jsonplaceholder.typicode.com/users')->json();
            Log::info('Fetched users', ['user_count' => count($users)]);

            
            foreach (array_slice($users, 0, 500) as $userData) {
                try {
                    
                    $autobot = Autobot::create([
                        'name' => $userData['name'],
                        'email' => $userData['email'],
                    ]);

                    event(new AutobotCreated($autobot));
                    
                    Log::info('Autobot created', ['autobot' => $autobot]);

                    
                    $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
                    foreach (array_slice($posts, 0, 10) as $postData) {
                        $post = $autobot->posts()->create([
                            'title' => $postData['title'],
                            'body' => $postData['body'],
                        ]);

                        Log::info('Post created', ['post' => $post]);

                        
                        $comments = Http::get('https://jsonplaceholder.typicode.com/comments')->json();
                        foreach (array_slice($comments, 0, 10) as $commentData) {
                            $post->comments()->create([
                                'name' => $commentData['name'],
                                'body' => $commentData['body'],
                            ]);

                            Log::info('Comment created', ['comment' => $commentData]);
                        }
                    }
                } catch (\Illuminate\Database\QueryException $e) {
                    Log::warning('Duplicate email skipped', ['email' => $userData['email'], 'error' => $e->getMessage()]);
                    continue; // Skip to the next user
                }
            }
        } catch (Throwable $e) {
            
            Log::error('Error in GenerateAutobots job', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Optionally, rethrow the exception if you want the job to fail and be retried
            throw $e;
        }
    }
}
