# auto-main
PHP Library written on Laravel 5.5 / Vue.js

Prerequisites:
- Composer
- Laravel
- NPM

Install:

- clone this repository
- Go to the folder application using cd
- composer install
- Copy .env.example file to .env  on root folder. 
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password     (DB_PASSWORD) field correspond to your configuration.
- run php artisan migrate
- npm install
- npm run watch
- Run php artisan key:generate
- Run php artisan serve
- Go to localhost:8000

This is a Vehicle service that simulates vehicle service appointments. I have included:
- Customer Center (Add, delete, edit, show, update)
- Appointments Center (Add, delete, edit, show, update)
- Vehicle types Center (Add, delete)
- Services Center (Add, delete, edit, show, update)
- Vehicles (Add, delete, edit, show, update)

Future updates:

- Form validations
- Schedule/Appointments Frontend design (Calendar component)
- Notifications
- Emails
