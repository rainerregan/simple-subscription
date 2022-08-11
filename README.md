# Simple Blog Post Subscription System
This Laravel app will allow user to create blog posts with `title` and `content` using RESTful API, and subscribing to the mailing list, so people will get the newest info about the latest blog posts.

## How to implement
1. Clone this repository
2. Activate MYSQL on XAMPP and Create a new database using MySQL. For example:
    ```sql
    CREATE DATABASE simple_subscription;
    ```
3. Modify the `.env` file, and set the database connection using your own local configurations
    ```php
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=simple_subscription
    DB_USERNAME=root
    DB_PASSWORD=
    ```
4. Modify the `APP_URL` on the `.env` file
    ```php
    APP_URL=http://127.0.0.1:8000/
    ```
5. Run the migration
    ```
    php artisan migrate
    ```
6. Register mailtrap.io account on [mailtrap.io](https://mailtrap.io)
7. Configure the SMPT settings on `.env` file using your mailtrap.io configuration.
    ```php
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=1ceee7a8519b35
    MAIL_PASSWORD=8a1e76d1ec515d
    MAIL_ENCRYPTION=tls
    ```
8. Run the queue:work command for using notification email queue.
    ```
    php artisan queue:work
    ```
9. Open the postman collections. 
    [![Run in Postman](https://run.pstmn.io/button.svg)](https://god.postman.co/run-collection/d6ecad4c27effd09e4cc?action=collection%2Fimport)
10. Try to add new post using the postman
