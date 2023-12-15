### Cogitech recruitment application

## Requirements
- [Composer](https://getcomposer.org/)
- [PHP 8.1](https://www.php.net/)
- [Docker](https://www.docker.com/)
- [Symfony CLI](https://symfony.com/download)

## Install
1. Clone the repository:
```sh
https://github.com/TomaszSokalski/recruitment-task-cogitech.git
```
2. Access the directory:
```sh
cd recruitment-task-cogitech
```
3. Install the Composer dependencies:
```sh
composer install
```
4. Run docker image:
```sh
docker compose up -d
```
5. Adminer credentials:
```sh
System: MySql
Server: mysql
Username: root
Password: root
Database: root
```
6. Create database and make migrations:
```sh
symfony console doctrine:database:create
symfony.exe console doctrine:migrations:migrate
```
7. Load posts:
```sh
symfony.exe console app:load-posts
```
8. Run server and go to UI:
```sh
symfony server:start -d
https://127.0.0.1:8000
```
9. List of endpoints:
```sh
https://127.0.0.1:8000/api
https://127.0.0.1:8000/posts
https://127.0.0.1:8000/lista
https://127.0.0.1:8000/login
https://127.0.0.1:8000/register
```
    
