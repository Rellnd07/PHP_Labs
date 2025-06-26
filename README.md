# Цель

Целью данной лабораторной работы является изучение основных принципов протокола HTTP.

# Условие

## Задание №1. Анализ HTTP-запросов
1. Зайдите на сайт http://sandbox.usm.md/login.
2. Откройте вкладку Network в инструментах разработчика браузера.
3. Введите неверные данные для входа (например, username: student, password: studentpass).
4. Проанализируйте запросы, которые были отправлены на сервер.
5. Ответьте на следующие вопросы:
   - Какой метод HTTP был использован для отправки запроса?
     - **Ответ:** POST
   - Какие заголовки были отправлены в запросе?
     - **Ответ:**
       - Host: sandbox.usm.md
       - User-Agent: (зависит от браузера)
       - Content-Type: application/x-www-form-urlencoded
       - Accept: */*
       - Origin: http://sandbox.usm.md
       - Referer: http://sandbox.usm.md/login
       - (и другие служебные заголовки)
   - Какие параметры были отправлены в запросе?
     - **Ответ:**
       - username=student
       - password=studentpass
   - Какой код состояния был возвращен сервером?
     - **Ответ:** 401 Unauthorized (или 400 Bad Request, если сервер так реализован)
   - Какие заголовки были отправлены в ответе?
     - **Ответ:**
       - Content-Type: application/json (или text/html)
       - Server: (зависит от реализации)
       - Content-Length: ...
       - (и другие служебные заголовки)
6. Повторите шаги 3-5, введя верные данные для входа (username: admin, password: password).
   - **Ответ:**
     - Метод: POST
     - Заголовки: те же, что и выше
     - Параметры: username=admin, password=password
     - Код состояния: 200 OK (или 302 Found, если происходит редирект)
     - Заголовки ответа: Content-Type, Set-Cookie (если устанавливается сессия), Location (если редирект)

## Задание №2. Составление HTTP-запросов
1. Составьте GET-запрос к серверу по адресу http://sandbox.com, указав в заголовке User-Agent ваше имя и фамилию.
   - **Пример на PHP:**
     ```php
     $opts = [
         "http" => [
             "method" => "GET",
             "header" => "User-Agent: Иван Иванов\r\n"
         ]
     ];
     $context = stream_context_create($opts);
     $result = file_get_contents("http://sandbox.com", false, $context);
     ```
   - **Пример cURL:**
     ```sh
     curl -H "User-Agent: Иван Иванов" http://sandbox.com
     ```
2. Составьте POST-запрос к серверу по адресу http://sandbox.com/cars, указав в теле запроса следующие параметры:
   - make: Toyota
   - model: Corolla
   - year: 2020
   - **Пример на PHP:**
     ```php
     $data = http_build_query([
         "make" => "Toyota",
         "model" => "Corolla",
         "year" => "2020"
     ]);
     $opts = [
         "http" => [
             "method" => "POST",
             "header" => "Content-Type: application/x-www-form-urlencoded\r\n",
             "content" => $data
         ]
     ];
     $context = stream_context_create($opts);
     $result = file_get_contents("http://sandbox.com/cars", false, $context);
     ```
   - **Пример cURL:**
     ```sh
     curl -X POST http://sandbox.com/cars -d "make=Toyota&model=Corolla&year=2020"
     ```
3. Составьте PUT-запрос к серверу по адресу http://sandbox.com/cars/1, указав в заголовке User-Agent ваше имя и фамилию, в заголовке Content-Type значение application/json и в теле запроса следующие параметры: json { "make": "Toyota", "model": "Corolla", "year": 2021 }
   - **Пример на PHP:**
     ```php
     $data = json_encode([
         "make" => "Toyota",
         "model" => "Corolla",
         "year" => 2021
     ]);
     $opts = [
         "http" => [
             "method" => "PUT",
             "header" => "User-Agent: Иван Иванов\r\nContent-Type: application/json\r\n",
             "content" => $data
         ]
     ];
     $context = stream_context_create($opts);
     $result = file_get_contents("http://sandbox.com/cars/1", false, $context);
     ```
   - **Пример cURL:**
     ```sh
     curl -X PUT http://sandbox.com/cars/1 -H "User-Agent: Иван Иванов" -H "Content-Type: application/json" -d '{"make":"Toyota","model":"Corolla","year":2021}'
     ```
4. Напишите один из возможных вариантов ответа сервера на следующий запрос:
   - http POST /cars HTTP/1.1
   - Host: sandbox.com
   - Content-Type: application/json
   - User-Agent: John Doe
   - model=Corolla&make=Toyota&year=2020
   - **Возможный ответ:**
     ```json
     {
       "id": 42,
       "make": "Toyota",
       "model": "Corolla",
       "year": 2020,
       "message": "Машина успешно добавлена"
     }
     ```
5. Предположите ситуации, когда сервер может вернуть HTTP-коды состояния 200, 201, 400, 401, 403, 404, 500.
   - **200 OK** — Запрос успешно выполнен (например, GET /cars/1, если машина найдена).
   - **201 Created** — Ресурс успешно создан (например, POST /cars).
   - **400 Bad Request** — Некорректный запрос (например, отсутствует обязательный параметр).
   - **401 Unauthorized** — Необходима авторизация (например, попытка доступа без токена).
   - **403 Forbidden** — Доступ запрещён (например, недостаточно прав).
   - **404 Not Found** — Ресурс не найден (например, GET /cars/999, если такой машины нет).
   - **500 Internal Server Error** — Внутренняя ошибка сервера (например, сбой базы данных).

## Задание №3. Дополнительное задание. HTTP_Quest
- Пройдите квест, отправляя запросы на сервер.
- Отправьте POST-запрос на сервер по адресу http://sandbox.usm.md/quest, указав в заголовке User-Agent вашу фамилию и имя (например, User-Agent: Иван Иванов).
- Пример запроса с помощью curl:
  ```sh
  curl -X POST http://sandbox.usm.md/quest -H "User-Agent: Иван Иванов"
  ```
- Следуйте инструкциям на сервере, выполняя их по порядку.
- В конце квеста вам будет показано секретное слово, которое вы должны будете предоставить в отчете.
- **Пример прохождения:**
  1. Отправлен POST-запрос, получен ответ с инструкцией.
  2. Выполнены все шаги, получено секретное слово: `EXAMPLE_SECRET_WORD` (замените на реальное после прохождения).

**Примечание к заданию 3:**
- Используйте инструмент curl, Postman или любой другой инструмент для отправки запросов.
- Вы можете начинать квест заново, выполнив первый шаг.

# Лабораторная работа №1. Основы HTTP

## Описание

Этот проект содержит примеры составления и отправки HTTP-запросов с помощью PHP, а также демонстрирует работу с различными HTTP-методами и кодами состояния. Все примеры реализованы в файле `Lab1.php`.

## Содержание

- **sendCustomGetRequest()** — отправляет GET-запрос на `http://sandbox.com` с заголовком `User-Agent` (ваше имя и фамилия).
- **sendCustomPostRequest()** — отправляет POST-запрос на `http://sandbox.com/cars` с параметрами `make`, `model`, `year` в теле запроса.
- **sendCustomPutRequest()** — отправляет PUT-запрос на `http://sandbox.com/cars/1` с заголовками `User-Agent` и `Content-Type: application/json`, а также с JSON-данными в теле запроса.
- **exampleServerResponse()** — пример возможного ответа сервера на POST-запрос (возвращает JSON с данными о машине).
- **explainHttpStatusCodes()** — выводит примеры ситуаций для различных HTTP-кодов состояния (200, 201, 400, 401, 403, 404, 500).

## Как использовать

1. Откройте файл `Lab1.php` в редакторе.
2. Раскомментируйте вызовы нужных функций в конце файла (например, `sendCustomGetRequest();`).
3. Запустите файл в командной строке:

```sh
php Lab1.php
```

## Требования
- PHP 7.0 или выше
- Доступ в интернет (для отправки реальных HTTP-запросов)

## Примечания
- Сервер `http://sandbox.com` используется для примера. Для реального тестирования используйте существующий сервер или настройте локальный.
- Ответы сервера могут отличаться или отсутствовать, если указанный адрес недоступен. 