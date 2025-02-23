## To RUN the application

-   you must have composer installed on your machine
-   you must have php installed on your machine (minimum version 8.2)
-   clone the repo
-   make sure to set those env variables to your .env
    -   DB_HOST=your-host
    -   DB_DATABASE=your-database-name
    -   DB_USERNAME=your-username
    -   DB_PASSWORD=your-password
    -   MAIL_MAILER=your mailer (for testing purpose prefer to use mailtrap)
    -   MAIL_HOST=your-host
    -   MAIL_PORT=your-port
    -   MAIL_USERNAME=your-username
    -   MAIL_PASSWORD=your-password
-   got to the project directory: cd /root/path/to/repo
-   run this command: composer install
-   run this command: php artisan migrate --seed
-   for running the queue you must run: php artisan queue:work
-   after running the migration, seeding & queue worker you can impor tthe attached postman collection for testing the simple APIs provided for this task

#### HINT: this repo contains only a simple demonstration of the task, it is not a complete application for this provided instructions:

##### Task Orientation:

1. Simple API with Authentication
   Create a Laravel API that allows users to register, log in, and retrieve their profile details.
   Use Laravel Sanctum for authentication.
   Implement API resource controllers and validation.
2. Event and Listener with Queue
   Create a system where when a new user registers, a welcome email is sent.
   Implement Laravel events and listeners.
   Use queues to process the email in the background.
3. Dynamic Relationship Query with Scope
   Create a model for Users and Posts, where users can have multiple posts.
   Implement a query scope to filter only users who have more than X number of posts.
   Use Eloquent relationships to retrieve a user’s posts.
4. Laravel Middleware for Role-Based Access
   Implement a middleware that restricts access to certain routes based on user roles (Admin, Editor, User).
   Use route middleware to control access.
   Store roles in the database and use policy or gates for authorization.
