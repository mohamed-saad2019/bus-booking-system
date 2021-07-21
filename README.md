# bus-booking-system

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



in postman :
        1- First, you must login with this request (auth/login)
            use this account
            mobile : 01069195365
            password : 123456789

        2- After logging in successfully, put the api_token in the requests to be used .
        3- If you want govveronrates , use this request (getCountries) .
        4- If you want to see a list of empty places, you can use this request (getlist).
        5- To book a ticket, you can use this request (ticketbooking), taking into account that the user can book more than one chair in one request
        6- Finally, you can see the examples in collection , and if you face any difficulty, do not hesitate to contact me.
