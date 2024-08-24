# Task Management APIs

1. Clone the repository:
    ```bash
    git clone https://github.com/Busuyem/tweetai.git
    cd tweetai
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Set up the environment file:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure your database in `.env`.

5. Run migrations:
    ```bash
    php artisan migrate
    ```

6. Serve the application:
    ```bash
    php artisan serve
    ```

7. Serve the application:
    ```bash
    php artisan serve
    ```

8. Start npm 
    ```bash
    npm run dev
    ```

9.  Start the job 
    ```bash
    php artisan schedule:work
    ```

10.  Run queue worker 
    ```bash
    php artisan queue:work
    ```

## API Documentation

### Autobots Endpoints

- Get the List of Autobots:
    ```
    GET /api/autobots
    ```

- GET an Autobot
    ```
    GET /api/autobots/:id
    ```

- GET an Autobot Posts
    ```
    GET /api/autobots/:id/posts
    ```

- GET Posts By ID
    ```
    GET /api/posts/:id
    ```

- GET Posts Comments
    ```
    GET /api/posts/:id/comments
    ```

- GET Autobots Counts
    ```
    GET /api/autobots/count
    ```

