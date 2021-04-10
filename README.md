# Тестовое задание

### Необходимо выполнить веб-страницу с формой из следующих полей:

- имя

- номер телефона

- дата рождения

Данные из формы должны обрабатываться php-скриптом, помещаться в базу данных MySQL, и выводиться на этой же странице в таблице. Оформление страницы - на ваше усмотрение, лишь бы выглядело аккуратно.

Cделать в поле с вводом телефона:

  - маску ввода, чтобы юзер не мог ошибиться с форматом номера;
  
  - подключить плагин наподобие select2, который будет позволять пользователю как ввести новый номер, так и выбрать из тех, что уже хранятся в базе данных.
 
# INSTALLATION

## AFTER GIT CLONE

   - cd /src
   - cp .env.example .env
   - composer update
   - cd ../
   - docker-compose up -d --build
   - docker-compose exec php php artisan migrate
   - docker-compose exec php chown laravel:laravel storage/logs/laravel.log
   - docker-compose exec php php artisan key:generate

## NOTES

  ### script will start on 127.0.0.1:8088

