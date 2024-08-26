# TweetAI APIs

## Setup

1. **Clone the repository:**
    ```bash
    git clone https://github.com/Busuyem/tweetai.git
    cd tweetai
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Set up the environment file:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure your database in `.env`.**

5. **Run migrations:**
    ```bash
    php artisan migrate
    ```

6. **Compile assets:**
    ```bash
    npm run dev
    ```

7. **Start the application:**
    ```bash
    php artisan serve
    ```

8. **Start the scheduler (for jobs):**
    ```bash
    php artisan schedule:work
    ```

9. **Start the queue worker (for queues):**
    ```bash
    php artisan queue:work
    ```

## API Documentation

### Autobots Endpoints

- **Get the List of Autobots:**
    ```
    GET /api/autobots
    ```

- **Get an Autobot by ID:**
    ```
    GET /api/autobots/:id
    ```

- **Get Posts of an Autobot:**
    ```
    GET /api/autobots/:id/posts
    ```

- **Get a Post by ID:**
    ```
    GET /api/posts/:id
    ```

- **Get Comments of a Post:**
    ```
    GET /api/posts/:id/comments
    ```

- **Get Counts of Autobots:**
    ```
    GET /api/autobots/count
    ```
