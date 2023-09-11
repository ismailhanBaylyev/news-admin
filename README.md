<p align="center"><img width="400" src="https://raw.githubusercontent.com/ismailhanBaylyev/news-admin/main/public/assets/images/logos/logo.png"></p>

# Laravel - Админ-панель новостей

<p align="center"<img src="https://raw.githubusercontent.com/ismailhanBaylyev/news-admin/main/public/assets/images/screen/news_admin.png" height="auto" width="100%"></p>

> Макет админ-панели был сделан на Bootstrap. Также для удобство и визуальной привлекательности были использованы, такие плагины:

<p><a href="https://abpetkov.github.io/switchery/">Switchery</a></p>  
<p><a href="https://sortablejs.github.io/Sortable/">Sortable</a></p>  

<hr>

### Требования
    Laravel >= 10.22
    PHP >= 8.2

В админ-панели вы можете (Просматривать, Добавлять и Редактировать информацию), также есть поддержка API!

## Инструкция 🚀

Скачайте и установите проект. После уставновки, нужно создать базу данных и запускайте сервер.

## Установка ⚒️

Для установки проекта надо выполнить все шаги 🤘

1. Загрузите проект и откройте терминал в корневой папке.
2. Выполните команду "install composer"

```bash
composer install
```

3. Выполните команду для генерации ключа

```bash
php artisan key:generate
```

4. Теперь нужно добавить информацию о базе данных в .env файл (Для этого найдите файл <b>.env.example</b> и удалите <b>.example</b>):

```
DB_HOST=localhost
DB_DATABASE=news
DB_USERNAME=root
DB_PASSWORD=
```

5. Выполните команду для создания и заполнения базы данных тестовыми данными:

```bash
php artisan migrate --seed
```

Если вы хотите только создать базу данных с таблицами без тестовых данных. Выполните эту команду:

```bash
php artisan migrate
```

6. Теперь просто запустите эту команду для запуска сервера.

```bash
php artisan serve
```

7. Скопируйте адрес после запуска сервера и можете пользоваться.🥳

## API 📜

### GET /api/news/<page>

#### Получения всех статей, с пагинацией

> <page> - Номер страницу по умолчанию: 1
> Список всех активных статей

    [
        {
            "id": 11,
            "category_id": 2,
            "name": "Test",
            "slug": "Test",
            "content": "Testing",
            "image": "public/images/Cz84zhNqMRAlJnGAj3yTnH6lNmWNGcX7i55DxetF.jpg",
            "sort": 0,
            "status": 1,
            "created_at": "2023-09-11T01:11:39.000000Z",
            "updated_at": "2023-09-11T01:11:39.000000Z"
        },
        {
            "id": 3,
            "category_id": 5,
            "name": "eveniet aut reiciendis at soluta",
            "slug": "odit",
            "content": "Molestiae recusandae enim distinctio dolorem similique qui veniam tempora unde voluptatem assumenda et deserunt deleniti quod quia aut est totam exercitationem tenetur dolore non est consequatur sunt facere aspernatur earum aut unde dolor blanditiis sapiente dolores.",
            "image": "public/images/test.jpg",
            "sort": 1,
            "status": 1,
            "created_at": "2023-09-11T00:33:34.000000Z",
            "updated_at": "2023-09-11T01:01:34.000000Z"
        },
        {
            "id": 5,
            "category_id": 4,
            "name": "et laborum ut aliquid voluptatum",
            "slug": "odit",
            "content": "Quae optio ullam molestiae delectus officiis sapiente rerum mollitia aliquid qui doloribus ratione pariatur inventore eligendi eum vel rem eius quia quas eum reprehenderit a corporis et maiores ut repudiandae eveniet molestiae repudiandae non totam.",
            "image": "public/images/test.jpg",
            "sort": 5,
            "status": 1,
            "created_at": "2023-09-11T00:33:34.000000Z",
            "updated_at": "2023-09-11T00:36:01.000000Z"
        }
    ]

### GET /api/category

#### Получения всех категорий статей

> Список активных категорий

[
  {
    "id": 4,
    "name": "assumenda",
    "sort": 5,
    "status": 1,
    "created_at": "2023-09-11T00:33:34.000000Z",
    "updated_at": "2023-09-11T00:35:36.000000Z"
  },
  {
    "id": 1,
    "name": "nostrum",
    "sort": 2,
    "status": 1,
    "created_at": "2023-09-11T00:33:34.000000Z",
    "updated_at": "2023-09-11T00:33:34.000000Z"
  },
  {
    "id": 2,
    "name": "dolores",
    "sort": 1,
    "status": 1,
    "created_at": "2023-09-11T00:33:34.000000Z",
    "updated_at": "2023-09-11T00:33:34.000000Z"
  }
]

### GET /api/category-news/<category-id>

#### Получения статей по заданной категории

> <category-id> - Нужно указать <b>ID</b> категории
> Список активных статей по заданной категории

[
  {
    "id": 10,
    "category_id": 2,
    "name": "voluptate aut cupiditate dolor eaque",
    "slug": "cum",
    "content": "Quo sapiente possimus sint veritatis ipsum assumenda consequatur odio quasi reiciendis et assumenda ut explicabo ex qui tenetur saepe porro repellat recusandae voluptatem dolor et quia quia culpa et perferendis vero commodi suscipit veritatis sequi qui dolorem fugiat dolor repellat aliquid iusto reprehenderit facilis adipisci enim fugiat quia consequatur corrupti asperiores et laboriosam sit est dicta.",
    "image": "public/images/test.jpg",
    "sort": 1,
    "status": 1,
    "created_at": "2023-09-11T00:33:34.000000Z",
    "updated_at": "2023-09-11T00:35:54.000000Z"
  },
  {
    "id": 6,
    "category_id": 2,
    "name": "ipsam magni voluptas sed et",
    "slug": "dolores",
    "content": "Vel aliquid facere quod ipsum repudiandae sed omnis ut eligendi quisquam quos fugit harum porro voluptas unde ipsa id modi neque rem sed ducimus accusantium et ipsa incidunt sapiente debitis expedita veritatis et quo aliquid qui quidem temporibus consequuntur a perspiciatis et qui.",
    "image": "public/images/test.jpg",
    "sort": 4,
    "status": 1,
    "created_at": "2023-09-11T00:33:34.000000Z",
    "updated_at": "2023-09-11T00:33:34.000000Z"
  },
]

### GET /api/news-slug/<slug>

#### Получения статьи по slug

> <slug> - Нужно указать <b>Slug</b> статьи
> Список активных статей по slug

[
  {
    "id": 5,
    "category_id": 4,
    "name": "et laborum ut aliquid voluptatum",
    "slug": "odit",
    "content": "Quae optio ullam molestiae delectus officiis sapiente rerum mollitia aliquid qui doloribus ratione pariatur inventore eligendi eum vel rem eius quia quas eum reprehenderit a corporis et maiores ut repudiandae eveniet molestiae repudiandae non totam.",
    "image": "public/images/test.jpg",
    "sort": 5,
    "status": 1,
    "created_at": "2023-09-11T00:33:34.000000Z",
    "updated_at": "2023-09-11T00:36:01.000000Z"
  }
]
