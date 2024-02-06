### Database Query Builder та ORM

**Каталог з інтерфейсами:**<br>
app/Models/Interfaces/

**Каталог з репозиторіями:**<br>
app/Models/Repositories/

**Провайдер, який дозволяє змінити використовуваний репозиторій:**<br>
app/Providers/RepositoryServiceProvider.php

### Створення структури БД та наповнення даними

php artisan migrate --seed <br>
php artisan migrate:refresh --seed

### Приклади роутів для отримання даних

**Вивести список всіх категорій:**<br>
/blog

**Вивести інформацію про категорію за її ID, включаючи список постів даної категорії:**<br>
/blog/1

**Вивести інформаю з посту за його ID, включаючи всі коментарі до даного посту:**<br>
/blog/1/1

**Створити нову категорію:**<br>
/blog/addCategory?name=Category name&description=Category description

**Змінити пост за його ID:**<br>
/blog/updatePost?id=1&title=Post title&content=Post content

**Видалити коментар за його ID:**<br>
/blog/deleteComment?id=1
