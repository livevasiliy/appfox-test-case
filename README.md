# AppFox Test-case

### Решенное тестовое задание от компании "AppFox".

Для запуска этого проекта склонируйте себе проект используя у себя в командной строке/терминале
```bash
git clone https://github.com/livevasiliy/appfox-test-case.git
```

После того как проект будет успешно склонирован, перейдите в папку, где лежит копия этого проекта, для этого напишите 
в командной строке/терминале 
```bash
cd ./appfox-test-case
```
Далее запустите команду для установки всех php-зависимостей указанных в composer.json 

#### У вас должен быть установлен на компьютере composer и версия PHP не ниже 7.2
```bash
composer install
```

Скопируйте себе файл .env.example для этого напишите команду:

Если Windows:
```bash
copy .env.example .env
```

На Linux/macOS:
```bash
cp .env.example .env
```

Сгенерируйте ключ

```bash
php artisan key:generate
```

Далее укажите в .env параметры для подключения к вашей базе данных для этого заполните параметры в файле:

```
DB_DATABASE=appfox-case // Название созданной вами базы данных
DB_USERNAME=root // Имя пользователя базы данных
DB_PASSWORD= // Пароль используемого для пользователя
```


После успешной установки всех зависимостей composer, запустите миграцию в указанную базу данных и локальный сервер предоставляемый Laravel, 
для этого запустите команду:
```bash
php artisan migrate --seed
php artisan serve
php artisan websocket:serve # Для запуска Laravel Websocket
``` 
```
После успешного запуска проект будет доступен по адресу: http://127.0.0.1:8000
```

Для проверки и демонстрации работы уведомлений создайте товар/новость, через Tinker.
```bash
php artisan tinker

factory(App\CompanyPost::class, 1)->create() # для создания новости
factory(App\CompanyProduct::class, 1)->create() # для создания товара
```
