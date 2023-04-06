<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Future super REST API

###### Тестовое задание

Демо: https://future.lila.su/api/documentation#/Notebook

##### Структура методов:
- **GET** `/api/v1/notebooks`
- **POST** `/api/v1/notebooks`
- **GET** `/api/v1/notebooks/{id}`
- **PUT** `/api/v1/notebooks/{id}`
- **DELETE** `/api/v1/notebooks/{id}`

В описании к заданию опечатка, описано два метода POST, сделал как должно быть.

##### Поля для записной книжки:
1. ФИО (обязательное)
2. Компания
3. Телефон (обязательное)
4. Email (обязательное)
5. Дата рождения
6. Фото

В описании не написано, что фото должно загружаться на сервер.<br>

[+] Возможность выводить информацию в списке постранично: Есть<br>
[+] Swagger для отображения методов api: Есть

##### Как вы тестировали результат своей работы:
В самом начале **Postman** потом уже самим **Swagger**.
