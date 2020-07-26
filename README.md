<h3>Web server</h3> 
Eсли у вас не настроен веб сервер, вы можете использвать laradock:
git clone https://github.com/laradock/laradock.git.
cd laradock
cp env-example .env
docker-compose up -d nginx mysql
Для доступа в контейнер workspace:
docker-compose exec workspace bash
<h3>Установка проекта</h3>
1. Клонировать проект.
1*. Если вы используете Laradock - указать путь к проекту в .env файле:
APP_CODE_PATH_HOST=../trilogo.
2. Выполнить в директории проекта cp env-example .env.
3. В файле .env проекта указать параметры подключения к mysql, пример:
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=root
DB_PASSWORD=root
4. В директории проекта выполнить команды (при использовании Laradock запускать из workspace):
composer install
php artisan migrate
5. Для заливки фейковых данных выполнить команду:
php artisan db:seed
