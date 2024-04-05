cp .env.example .env

docker-compose up-d

docker exec -it test_review_fpm bash

composer install

npm install

php artisan migrate

exit

npm run build

http://localhost:8084/ если не менялся порт в .env
