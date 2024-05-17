## About Project
Welcome to Auction Live CRUD Operations. This project primarily focuses on the CRUD operations related to users.

## Major Technology
1) php 8.2
2) laravel 11
3) Vue 3
4) Bootstrap 5
5) Node 21.0.0

## Database Required
1) MYSQL

## How to Setup Project
1) Clone the project from git repository
2) cp .env.example .env (create environment file for connecting it to database)
3) composer install ( Install the composer in the project)
4) php artisan migrate (create database and migrate the schema to our local database)
5) php artisan db:seed --class=UserSeeder (Seed the Userseeder for dummy data from mockAPI.io and save to our local database)
6) npm install (for node modules)

## Run the project
1) php artisan serve
2) npm run dev

## Screenshots
Home Page
![image](https://github.com/Rubin1234/auctions-live-crud/assets/50777621/11ea7be7-9703-4521-8fcb-dbc3a595797d)

Create User
![image](https://github.com/Rubin1234/auctions-live-crud/assets/50777621/4cb30a5a-41e9-4c53-9dd4-0a5092a6f9f9)

Delete User
![image](https://github.com/Rubin1234/auctions-live-crud/assets/50777621/1b3883ca-dbde-4b6a-8456-a7b798497543)


Update User
![image](https://github.com/Rubin1234/auctions-live-crud/assets/50777621/b56c3082-59c8-4189-8da7-06a990f4b0b9)




