# Тестовое задание

### Необходимо выполнить веб-страницу с формой из следующих полей:

- имя

- номер телефона

- дата рождения

Данные из формы должны обрабатываться php-скриптом, помещаться в базу данных MySQL, и выводиться на этой же странице в таблице. Оформление страницы - на ваше усмотрение, лишь бы выглядело аккуратно.
 
# INSTALLATION

## AFTER GIT CLONE

   - cd /src
   - cp .env.xample .env
   - composer update
   - cd ../
   - docker-compose up -d --build
   - docker-compose exec php php artisan migrate
   - docker-compose exec php chown laravel:laravel storage/logs/laravel.log
   - docker-compose exec php php artisan key:generate

## NOTES

  ### script will start on 127.0.0.1:8088

