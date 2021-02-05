# Event App
## Process to Deploy
* Close project 
* rename .env.example to .env
* create DataBase with any name and update in .env 
        
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=event_app
        DB_USERNAME=root
        DB_PASSWORD=mysqldba

* run ```php artisan migrate```
* run ```php artisan serve```
* your application will start running
