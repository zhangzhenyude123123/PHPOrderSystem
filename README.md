#PHP Final Project — OrderSystem
##Teammate

ZHANG Zhenyu 299920 

LI Guanlong 299940 

ZHANG Chenwei 299949

ZHAO Haoran  299897

##Cooperation

ZHANG Zhenyu : Design project structure, Complete Register ,Login and Dashboard function

LI Guanlong : Complete the Check-In function, Participate in database design

ZHANG Chenwei : Complete the reservation function, Participate in database design

ZHAO Haoran : Page design and UI development


##Quick Setup

1. Install expansion package dependencies  
   1. `composer install`
   
   2. `npm install`

2. Generate configuration file  
    `cp .env.example .env`   
   

3. Configure the database configuration file
    1. Create a new *ordersystem* database in the mysql command line  
        `CREATE DATABASE ordersystem;`    
       
    2. Add Mysql configuration information in file *OrderSystem/config/database.php*  
       >You need to add your host, mysql port number, mysql login account and password here  
    
    ```
       'host' => env('DB_HOST', 'enter host url'),
       'port' => env('DB_PORT', 'enter mysql post number'),
       'database' => env('DB_DATABASE', 'ordersystem'),
       'username' => env('DB_USERNAME', 'enter mysql name'),
       'password' => env('DB_PASSWORD', 'enter mysql password'),
   ```      
   3. Add Mysql configuration information in file *OrderSystem/.env*
        >You need to add your host, mysql port number, mysql login account and password here
    ```
        DB_CONNECTION= enter host url
        DB_HOST= 127.0.0.1
        DB_PORT= enter mysql post number
        DB_DATABASE= ordersystem
        DB_USERNAME= enter mysql name
        DB_PASSWORD= enter mysql password
    ```
    

3. Generate database file  
    `php artisan migrate`  


4. Run this Project  
   `php artisan serve`



