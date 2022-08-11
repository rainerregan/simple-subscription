# Simple Blog Post Subscription System
This Laravel app will allow user to create blog posts with `title` and `content` using RESTful API, and subscribing to the mailing list, so people will get the newest info about the latest blog posts.

## How to implement
1. Clone this repository. And navigate to the folder using `cd simple-subscription`
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
    
    if the `.env` is not available, you can create the new `.env` file manually on the project root, and copy the `.env.example` into `.env` file you've created before. After that, you can continue modifying.
    
4. Modify the `APP_URL` on the `.env` file
    ```php
    APP_URL=http://127.0.0.1:8000/
    ```
5. Modify the `QUEUE_CONNECTION` to `database` in the `.env` file
    ```
    QUEUE_CONNECTION=database
    ```
6. Run the composer install to install the dependencies
    ```
    composer install
    ```
7. Run the migration
    ```
    php artisan migrate
    ```
8. Register mailtrap.io account on [mailtrap.io](https://mailtrap.io)
9. Configure the SMPT settings on `.env` file using your mailtrap.io configuration.
    ```php
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=1ceee7a8519b35
    MAIL_PASSWORD=8a1e76d1ec515d
    MAIL_ENCRYPTION=tls
    ```
10. Run the artisan serve command
    ```
    php artisan serve
    ```
11. Run the queue:work command for using notification email queue.
    ```
    php artisan queue:work
    ```
12. Run the database seeder to populate database with dummy data
    ```
    php artisan db:seed
    ```
    Type `yes` if you want to reset the database and fill with new fresh data.
13. Open the postman collections to try the API
    [![Run in Postman](https://run.pstmn.io/button.svg)](https://god.postman.co/run-collection/d6ecad4c27effd09e4cc?action=collection%2Fimport)
    
## Using Postman
### Add new post using the postman

If you are using local, the endpoint is using the `POST` method. URL:
```
http://127.0.0.1:8000/api/posts?title={TITLE}&content={CONTENT}
```

for example:
```
http://127.0.0.1:8000/api/posts?title=This is the best title 2&content=This is the best content 2
```

Note: remember to use `application/json` as the `Content-Type` and `Accept` header in the request
![image](https://user-images.githubusercontent.com/34080279/184169076-2cce3362-72a2-4bb9-9ebe-4c9340c5f838.png)

Add the `title` and `content` parameters to the request using `POST` method
![image](https://user-images.githubusercontent.com/34080279/184168855-cce9584c-e7e3-465e-9d24-474c29a98d3e.png)

Once you add the post, a new email would be sent to the subscriber list in the database.
![image](https://user-images.githubusercontent.com/34080279/184169779-fb8a11d9-eefd-42af-83dc-a516cf1427c3.png)


### Subscribe new email
You can insert new email to the subscribe endpoint to list new email to the mailing list.
The endpoint is using `GET` method with URL:
```
http://127.0.0.1:8000/api/subscribe?email={TYPE_EMAIL}
```

for example:
```
http://127.0.0.1:8000/api/subscribe?email=rainer@gmail.com
```

Note: remember to use `application/json` as the `Content-Type` and `Accept` header in the request

Example:
![image](https://user-images.githubusercontent.com/34080279/184171025-7222fdcb-9b7d-4f96-b3b9-1023ef3b797f.png)


### Unsubscribe
To unsubscribe, you can click the link in the email, or you can hit the API endpoint using `GET` method.

Endpoint URL:
```
http://127.0.0.1:8000/api/unsubscribe/{YOUR_EMAIL}
```

for example:
```
http://127.0.0.1:8000/api/unsubscribe/rainer@gmail.com
```

Note: remember to use `application/json` as the `Content-Type` and `Accept` header in the request


