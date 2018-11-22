Instructions to mount project

First create a .env file and copy the contents of .env.example to it.
Add your database creedentials to the .env file.

Then execute the following commands:

    composer install
    php artisan key:generate
    php artisan storage:link
    php artisan migrate --seed

And finally, initiate the server:

    php artisan serve

Log in with the default creedentials or register a new account.
The default user is:
    email: user@test.com
    password: secret