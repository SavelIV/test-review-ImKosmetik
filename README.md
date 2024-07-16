`cp .env.example .env`

`docker-compose up-d`

`docker exec -it test_review_fpm sh`

`composer install`

`npm ci`

`npm run build` или `npm run dev` (для разработки)

`php artisan migrate`

`php artisan db:seed --class=ProductSeeder`

`exit`

http://localhost:8084/ если не менялся порт в .env

задача:

1. реализовать карточку товара.
заготовка лежит в resources/js/components/catalog/ProductCard.vue

у карточки сделать кнопку добавить в избранное

кнопка имеет два состояни: удалить из избранного/добавить в избранное,
состояние кнопки должно изменятся при удалении/добавлении, после получения ответа с сервера
вся логика должна быть в модулях стора resources/js/store/modules

для записей избранного использовать ид сессии в поле user_id

роуты для избранного лежат в routes/api.php

2. реализовать вид для списка избранного, в нем использовать тот же компонент что и для каталога
resources/js/components/catalog/ProductCard.vue

при клике на кнопку удалить из избранного после получения ответа с сервера запрашивать новый список избранного

3. дописать(переписать) контроллеры app/Http/Controllers/Api/FavoriteController.php и app/Http/Controllers/Api/ProductController.php