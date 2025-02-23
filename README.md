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
