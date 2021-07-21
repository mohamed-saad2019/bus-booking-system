for Run the Project

- make a Clone on Your server location like xampp->htdocs
- 
- write : composer install
        : composer dump-autoload
        : Rename env folder from  [ .env.example ] to [ .env ] 
        : write your database name 
        : write php artisan key:generate 
        :       php artisan config:cache
        :       php artisan migrate --seed
        :       php artisan serv
        
url api : http://127.0.0.1:8000/api

*** please use this link https://www.getpostman.com/collections/7a2362b568d8cf22787b 
for import postman collection .