<?php
echo "<h2>Задание 1: Цикл for</h2>";
$a = 0;
$b = 0;

for ($i = 0; $i <= 5; $i++) {
    $a += 10;
    $b += 5;
    echo "Шаг $i: a = $a, b = $b<br>";
}
echo "<strong>Итог:</strong> a = $a, b = $b<br><hr>";


// ----------------------------

echo "<h2>Задание 2: Цикл while</h2>";
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


// ----------------------------

echo "<h2>Задание 3: Массив случайных чисел</h2>";
$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}
echo "<pre>";
print_r($numbers);
echo "</pre><hr>";


// ----------------------------

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

// ---------- Дополнительное задание: Класс ----------
echo "<hr><h2>Класс Transaction</h2>";

class Transaction {
    public int $id;
    public string $date;
    public float $amount;
    public string $description;
    public string $merchant;

    public function __construct($id, $date, $amount, $description, $merchant) {
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->description = $description;
        $this->merchant = $merchant;
    }
}

$transactionObjects = [
    new Transaction(1, "2023-01-01", 150.00, "Books", "Bookstore"),
    new Transaction(2, "2023-02-14", 80.00, "Cafe", "CoffeeShop"),
    new Transaction(3, "2023-03-10", 250.50, "Tech Purchase", "ElectroWorld"),
];

function totalAmountObj($transactions): float {
    return array_reduce($transactions, fn($sum, $t) => $sum + $t->amount, 0);
}

function averageAmountObj($transactions): float {
    return count($transactions) > 0 ? totalAmountObj($transactions) / count($transactions) : 0;
}

echo "<p><strong>Общая сумма (объекты):</strong> " . totalAmountObj($transactionObjects) . "</p>";
echo "<p><strong>Средняя сумма (объекты):</strong> " . number_format(averageAmountObj($transactionObjects), 2) . "</p>";


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
