# TodoApp

To do list application built using the Laravel framework and MySQL database.

## Application features

-   User can be used without registering or logging
-   User can create and add new tasks
-   User can checked the tasks that have been done
-   Completed tasks can be distinguished visually
-   Tasks are sorted from most recently created
-   Existing tasks can be updated or deleted
-   Users should be able to changing the order of the task list

## Installation

Clone the repository in terminal

```sh
git clone https://github.com/rochmadqolim/todolist-app.git
```

Open code editor and go to todolist-app folder or use command

```sh
cd todolist-app
```

Run the following commands in the terminal to install all the required dependencies.

```sh
composer install
```

Create a database with the name 'todolist' in mysql and set the .env file

```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=todolist
    DB_USERNAME=root
    DB_PASSWORD=
```

Run the web server and mysql on xampp
Perform database migration with the command

```
'php artisan migrate'
```

## Run the application

To start the application run the command

```
php artisan serve
```

Then open http://localhost:8000/todoApp from the browser and the application can be used.

The first display of the application if the installation is successful.

![alt text](https://github.com/rochmadqolim/todolist-app/blob/main/public/todoApp.jpg?raw=true)
