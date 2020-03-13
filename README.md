Руководство по запуску:

1. docker-compose up -d
2. create .env
3. docker-compose exec app composer install
4. docker-compose exec app php artisan key:generate
5. docker-compose exec app php artisan config:cache
6. docker-compose exec db bash
7. mysql -u root -p
8. GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY '1111';
9. FLUSH PRIVILEGES;
10. docker-compose exec app php artisan migrate
11. register (http://localhost/register)
11. login (http://localhost/login) -> get key
12. После чего можно использовать функционал предварительно записав в headers
    
    Authorization Bearer 'KEY'
    
    Accept application/json
