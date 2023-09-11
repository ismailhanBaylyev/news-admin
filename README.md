<p align="center"><img width="400" src="https://raw.githubusercontent.com/ismailhanBaylyev/news-admin/main/public/assets/images/logos/logo.png"></p>

# Laravel - Админ-панель новостей

<p align="center"<img src="https://raw.githubusercontent.com/ismailhanBaylyev/news-admin/main/public/assets/images/screen/NewsAdmin.PNG" height="auto" width="100%"></p>

> Макет админ-панели был сделан на Bootstrap. Также для удобство и визуальной привлекательности были использованы, такие плагины:

<p><a href="https://abpetkov.github.io/switchery/">Switchery</a></p>  
<p><a href="https://sortablejs.github.io/Sortable/">Sortable</a></p>  

<hr>

### Требования
    Laravel >= 10.22
    PHP >= 8.2

В админ-панели вы можете (Просматривать, Добавлять и Редактировать информацию), также есть поддержка API!

## Пошаговая инструкция установки

### 1. Загрузите проект

Откройте консоль:

```bash
composer require tcg/voyager
```

> If you are installing this on Laravel 10, we are working on getting a permanent release available; however, you can still use this with Larvel 10 by requiring the following:

```bash
composer require tcg/voyager dev-1.6-l10
```

### 2. Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```

### 3. Run The Installer

Lastly, we can install voyager. You can do this either with or without dummy data.
The dummy data will include 1 admin account (if no users already exists), 1 demo page, 4 demo posts, 2 categories and 7 settings.

To install Voyager without dummy simply run

```bash
php artisan voyager:install
```

If you prefer installing it with dummy run

```bash
php artisan voyager:install --with-dummy
```

And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/admin](http://localhost:8000/admin).

## Creating an Admin User

If you did go ahead with the dummy data, a user should have been created for you with the following login credentials:

>**email:** `admin@admin.com`   
>**password:** `password`

NOTE: Please note that a dummy user is **only** created if there are no current users in your database.

If you did not go with the dummy user, you may wish to assign admin privileges to an existing user.
This can easily be done by running this command:

```bash
php artisan voyager:admin your@email.com
```

If you did not install the dummy data and you wish to create a new admin user, you can pass the `--create` flag, like so:

```bash
php artisan voyager:admin your@email.com --create
```

And you will be prompted for the user's name and password.