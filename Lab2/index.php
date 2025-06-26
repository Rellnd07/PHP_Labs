<?php
/**
 * Главный файл приложения.
 *
 * Используется для выполнения лабораторной работы по PHP.
 * @author Ваше Имя
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интеграция PHP и HTML</title>
</head>
<body>
    <h2>Часть 1: Разница между echo и print</h2>
    <?php
    echo "Это сообщение выведено с помощью echo.<br>";
    print "Это сообщение выведено с помощью print.<br>";
    echo "Привет", " ", "мир!<br>";
    $printResult = print("print возвращает: ");
    echo $printResult . "<br>";
    ?>

    <h2>Часть 2: Работа с переменными и выводом</h2>
    <?php
    $days = 288;
    $message = "Все возвращаются на работу!";
    echo "В " . $days . " день, приблизительно ... " . $message . "<br>";
    echo "В $days день, приблизительно ... $message<br>";
    ?>

    <h2>Часть 3: Арифметические операции</h2>
    <?php
    $a = 10;
    $b = 5;
    echo "Сложение: " . ($a + $b) . "<br>";
    echo "Вычитание: " . ($a - $b) . "<br>";
    echo "Умножение: " . ($a * $b) . "<br>";
    echo "Деление: " . ($a / $b) . "<br>";
    echo "Остаток от деления: " . ($a % $b) . "<br>";
    ?>

    <h2>Часть 4: Типы данных</h2>
    <?php
    $intVar = 42;
    $floatVar = 3.14;
    $stringVar = "Привет, PHP!";
    $boolVar = true;
    var_dump($intVar);
    echo "<br>";
    var_dump($floatVar);
    echo "<br>";
    var_dump($stringVar);
    echo "<br>";
    var_dump($boolVar);
    echo "<br>";
    ?>

    <h2>Часть 5: Интеграция PHP и HTML</h2>
    <h1>Добро пожаловать, <?php echo "гость"; ?>!</h1>
    <p>Сегодня: <?php echo date("Y-m-d"); ?></p>

    <h2>Часть 6: Вывод стиха</h2>
    <?php
    $poem = "\"Белеет парус одинокий\"\n    \"В тумане моря голубом!...\"\n    Что ищет он в стране далекой?\n    Что кинул он в краю родном?...";
    echo '<pre>' . $poem . '</pre>';
    ?>

    <h2>Часть 7: PHPDoc для функции (дополнительно)</h2>
    <?php
    /**
     * Возвращает сумму двух чисел.
     *
     * @param int $a Первое число.
     * @param int $b Второе число.
     * @return int Сумма чисел.
     */
    function calculateSum(int $a, int $b): int {
        return $a + $b;
    }
    echo "Сумма 7 и 8: " . calculateSum(7, 8);
    ?>
</body>
</html> 