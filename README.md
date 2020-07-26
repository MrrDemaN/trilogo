## Web server

Eсли у вас не настроен веб сервер, вы можете использвать laradock:

    git clone https://github.com/laradock/laradock.git
    cd laradock
    cp env-example .env
    docker-compose up -d nginx mysql

Для доступа в контейнер workspace:

    docker-compose exec workspace bash

## Установка проекта

1. Клонировать проект. Если вы используете Laradock - указать путь к проекту в .env файле:

        APP_CODE_PATH_HOST=../trilogo

2. Выполнить в директории проекта:

        cp .env.example .env

3. В файле .env проекта указать параметры подключения к mysql, пример:

        DB_CONNECTION=mysql
        DB_HOST=mysql
        DB_PORT=3306
        DB_DATABASE=default
        DB_USERNAME=default
        DB_PASSWORD=secret

4. В директории проекта выполнить команды (при использовании Laradock запускать из workspace):

        composer install
        php artisan migrate

5. Для заливки фейковых данных выполнить команду:

        php artisan db:seed

## Доступ к панели администратора

  Для доступа к панели администрирования перейти по адресу http://localhost/admin
