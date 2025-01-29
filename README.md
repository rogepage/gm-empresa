# gm-empresa

Jogos de empresa do spartansite

sail php artisan migrate
sail php artisan migrate:rollback

sail php artisan make:migration create_xxxx_table

touch database/database.sqlite

sail php artisan tink

alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

docker run --rm \
 -v $(pwd):/opt \
 -w /opt laravelsail/php80-composer:latest \
 bash -c "composer require --dev laravel/sail && composer install && php artisan sail:install --with=mariadb,mailhog,redis"

docker exec -it gm-empresa-laravel.test-1 /bin/bash

php artisan make:session-table

curl -s "https://laravel.build/example-app?php=83" | bash

sail php artisan artisan make:component fazerjogada
