# PHP Final Project — OrderSystem

## Teammate

ZHANG Zhenyu   
LIU Ruihang 


## Cooperation

ZHANG Zhenyu :
1. Design project structure, Complete Register ,Login and Dashboard function
2. Complete the Check-In function, Participate in database design
3. Complete the reservation function, Participate in database design
4. Page design and UI development

## Quick Setup

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

    
    
5. Generate laravel key  
    `php artisan key:generate`

    

6. Run this Project  
   `php artisan serve`

   

## Change the CURRENT_DAY and  CARNIVAL_DAYS

1.  Open the file **helpers.php**  in  *OrderSystem/app/Unit*

2. Change the number in function **getCarnivalMax()** and **getCarnivalDay()**

    >If you want to change the CARNIVAL_DAYS, you need to change the **return value** in getCarnivalMax() .
    >
    >If you want to change the CURRENT_DAY,  you need to change the **return value** in getCarnivalDay() .

   ```
   function getCarnivalMax():int
   {
       //Enter the Carnival Max Day
       return 5;
   }
   
   function getCarnivalDay():int{
       //Enter the CurrentDay
       return 0;
   }
   ```

   

   

