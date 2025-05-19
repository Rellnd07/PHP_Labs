# lab4 Берёзов Артём
## 1. Инструкции по запуску проекта
1. Скачайте проект и разместите файлы в директории веб-сервера:
`git clone https://github.com/ваш-репозиторий.git`
2. Запустите сервер:
   `php -S localhost:8000`
4. Откройте в браузере:
   `http://localhost:8000`
## 2. Описание лабораторной работы   
__Цель:__ Изучить основы работы с циклами, массивами и функциями в PHP. Научиться использовать ассоциативные массивы, генерировать данные с помощью циклов и выполнять базовые операции с файловой системой.

1. Реализовать циклы for и while с выводом промежуточных значений

2. Создать и обработать массивы

3. Разработать функции для обработки транзакций

4. Реализовать галерею изображений с обработкой файловой системы
## 3. Краткая документация к проекту 
<table>
    <tr>
        <th>Файл</th>
        <th>Описание</th>
    </tr>
    <tr>
        <td>index.php</td>
        <td>Решение с 1 по 4 задания</td>
    </tr>
    <tr>
       <td>image.php</td>
      <td>Решение 5 задания </td>
    </tr>
     <tr>
        <td>image</td>
        <td>Папка с изображениями для галереи</td>
    </tr>
</table>

## 4. Примеры использования проекта с приложением скриншотов или фрагментов кода

1.Рeализация цикла for:

```php
<?php echo "<h2>Задание 1: Цикл for</h2>";
$a = 0;
$b = 0;

for ($i = 0; $i <= 5; $i++) {
    $a += 10;
    $b += 5;
    echo "Шаг $i: a = $a, b = $b<br>";
}
echo "End of the loop: a = $a, b = $b<br>"; ?>
```
Скриншот:
![image](https://github.com/user-attachments/assets/d9f45afe-b80c-4c6f-8226-fc69aeacc7a2)


2. Реализация цикла while:
```php
<?php echo "<h2>Задание 2: Цикл while</h2>"; 

$a = 0;
$b = 0;
$i = 0;

while ($i <= 5) {
    $a += 10;
    $b += 5;
    echo "Шаг $i: a = $a, b = $b<br>";
    $i++;
}
echo "<strong>Итог:</strong> a = $a, b = $b<br><hr>";
```
Скриншот:

![image](https://github.com/user-attachments/assets/8da7fb62-44d5-4048-b8cb-7c3353cbde30)

3. Работа с массивами:
```php 
  echo "<h2>Задание 3: Массив случайных чисел</h2>";
$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}
echo "<pre>";
print_r($numbers);
echo "</pre><hr>";
  ```

Скриншот:

![image](https://github.com/user-attachments/assets/b7234aeb-48b8-4aeb-908f-630adbde2dc4)

4. Ассоциативные массивы и функции:

  ```php
echo "<h2>Задание 4: Ассоциативные массивы и функции</h2>";

// ---------- Исходные данные ----------
$transactions = [
    [
        "transaction_id" => 1,
        "transaction_date" => "2019-01-01",
        "transaction_amount" => 100.00,
        "transaction_description" => "Payment for groceries",
        "merchant_name" => "SuperMart",
    ],
    [
        "transaction_id" => 2,
        "transaction_date" => "2020-02-15",
        "transaction_amount" => 75.50,
        "transaction_description" => "Dinner with friends",
        "merchant_name" => "Local Restaurant",
    ],
    [
        "transaction_id" => 3,
        "transaction_date" => "2021-07-08",
        "transaction_amount" => 120.75,
        "transaction_description" => "Online shopping",
        "merchant_name" => "eStore",
    ],
    [
        "transaction_id" => 4,
        "transaction_date" => "2022-03-30",
        "transaction_amount" => 60.00,
        "transaction_description" => "Taxi ride",
        "merchant_name" => "CityTaxi",
    ],
];

// ---------- Вывод таблицы ----------
echo "<h2>Таблица транзакций</h2>";
echo "<table border='1' cellpadding='5' cellspacing='0'>
<tr style='background-color: #a6a6a6; color: #252525'>
    <th>ID</th>
    <th>Дата</th>
    <th>Сумма</th>
    <th>Описание</th>
    <th>Организация</th>
</tr>";

foreach ($transactions as $t) {
    echo "<tr>
        <td>{$t['transaction_id']}</td>
        <td>{$t['transaction_date']}</td>
        <td>{$t['transaction_amount']}</td>
        <td>{$t['transaction_description']}</td>
        <td>{$t['merchant_name']}</td>
    </tr>";
}
echo "</table><br>";

// ---------- Функции ----------
function calculateTotalAmount(array $transactions): float {
    return array_reduce($transactions, fn($sum, $t) => $sum + $t['transaction_amount'], 0);
}

function calculateAverage(array $transactions): float {
    $total = calculateTotalAmount($transactions);
    return count($transactions) > 0 ? $total / count($transactions) : 0;
}

function mapTransactionDescriptions(array $transactions): array {
    return array_map(fn($t) => $t['transaction_description'], $transactions);
}

// ---------- Вывод результатов ----------
echo "<h3>Результаты:</h3>";
echo "<p><strong>Общая сумма:</strong> " . calculateTotalAmount($transactions) . "</p>";
echo "<p><strong>Среднее значение:</strong> " . number_format(calculateAverage($transactions), 2) . "</p>";
$descriptions = mapTransactionDescriptions($transactions);
for ($i = 0; $i < count($descriptions); $i++) {
    echo "Описание транзакции №: $i: " . $descriptions[$i] . "<br>";
}
echo "</pre>";
   ```
Скриншот:

![image](https://github.com/user-attachments/assets/2ac4e8fb-07fd-45ac-a711-907f4905c685)


5. Работа с файловой системой:
   Галерея изображений
 ```php  
  
   $dir = 'image/';
$files = scandir($dir);
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея изображений</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background-color: #444;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        nav {
            background-color: #eee;
            padding: 10px;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .gallery {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }
        .gallery img {
            width: 150px;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            object-fit: cover;
        }
    </style>
</head>
<body>

<header>
    <h1>Добро пожаловать в галерею</h1>
</header>

<nav>
    <a href="#">Главная</a>
    <a href="#">Галерея</a>
    <a href="#">Контакты</a>
</nav>

<div class="gallery">
    <?php
    if ($files !== false) {
        foreach ($files as $file) {
            if ($file != "." && $file != ".." && preg_match('/\.jpg$/i', $file)) {
                $path = $dir . $file;
                echo "<img src=\"$path\" alt=\"$file\">";
            }
        }
    } else {
        echo "<p>Ошибка при загрузке изображений.</p>";
    }
    ?>
</div>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Моя галерея</p>
</footer>

</body>
</html>

```

Скриншот:

![image](https://github.com/user-attachments/assets/af0c7e24-b3f7-45bf-8572-2f0611ffbdd8)


## 5. Список использованных источников

   1. https://skillbox.ru/media/code/yazyk-razmetki-markdown-shpargalka-po-sintaksisu-s-primerami/
      
   2. https://gist.github.com/Jekins/2bf2d0638163f1294637

   3. https://proglib.io/p/samouchitel-dlya-nachinayushchih-kak-osvoit-php-s-nulya-za-30-minut-2021-02-08

      
