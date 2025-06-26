<?php
// Лабораторная работа №1. Основы HTTP

// Задание №2. Составление HTTP-запросов

// 1. Составьте GET-запрос к серверу по адресу http://sandbox.com, указав в заголовке User-Agent ваше имя и фамилию.
function sendCustomGetRequest() {
    $url = "http://sandbox.com";
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "User-Agent: Ivan Ivanov\r\n"
        ]
    ];
    $context = stream_context_create($opts);
    $result = @file_get_contents($url, false, $context);
    echo "GET-запрос отправлен. Ответ сервера:\n";
    echo $result ? $result : "Нет ответа или ошибка соединения.\n";
    echo "\n";
}

// 2. Составьте POST-запрос к серверу по адресу http://sandbox.com/cars, указав в теле запроса параметры: make: Toyota, model: Corolla, year: 2020
function sendCustomPostRequest() {
    $url = "http://sandbox.com/cars";
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
    $result = @file_get_contents($url, false, $context);
    echo "POST-запрос отправлен. Ответ сервера:\n";
    echo $result ? $result : "Нет ответа или ошибка соединения.\n";
    echo "\n";
}

// 3. Составьте PUT-запрос к серверу по адресу http://sandbox.com/cars/1, указав в заголовке User-Agent ваше имя и фамилию, в заголовке Content-Type значение application/json и в теле запроса параметры: { "make": "Toyota", "model": "Corolla", "year": 2021 }
function sendCustomPutRequest() {
    $url = "http://sandbox.com/cars/1";
    $data = json_encode([
        "make" => "Toyota",
        "model" => "Corolla",
        "year" => 2021
    ]);
    $opts = [
        "http" => [
            "method" => "PUT",
            "header" => "User-Agent: Ivan Ivanov\r\nContent-Type: application/json\r\n",
            "content" => $data
        ]
    ];
    $context = stream_context_create($opts);
    $result = @file_get_contents($url, false, $context);
    echo "PUT-запрос отправлен. Ответ сервера:\n";
    echo $result ? $result : "Нет ответа или ошибка соединения.\n";
    echo "\n";
}

// 4. Пример возможного ответа сервера на POST /cars
function exampleServerResponse() {
    header("Content-Type: application/json");
    http_response_code(201);
    $response = [
        "id" => 42,
        "make" => "Toyota",
        "model" => "Corolla",
        "year" => 2020,
        "message" => "Машина успешно добавлена"
    ];
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

// 5. Примеры ситуаций для HTTP-кодов состояния
function explainHttpStatusCodes() {
    $codes = [
        200 => "200 OK — Запрос успешно выполнен (например, GET /cars/1, если машина найдена).",
        201 => "201 Created — Ресурс успешно создан (например, POST /cars).",
        400 => "400 Bad Request — Некорректный запрос (например, отсутствует обязательный параметр).",
        401 => "401 Unauthorized — Необходима авторизация (например, попытка доступа без токена).",
        403 => "403 Forbidden — Доступ запрещён (например, недостаточно прав).",
        404 => "404 Not Found — Ресурс не найден (например, GET /cars/999, если такой машины нет).",
        500 => "500 Internal Server Error — Внутренняя ошибка сервера (например, сбой базы данных)."
    ];
    echo "Примеры ситуаций для HTTP-кодов состояния:\n";
    foreach ($codes as $code => $desc) {
        echo "$desc\n";
    }
}

// Для демонстрации (раскомментируйте нужные вызовы):
// sendCustomGetRequest();
// sendCustomPostRequest();
// sendCustomPutRequest();
// exampleServerResponse();
// explainHttpStatusCodes();
?>

