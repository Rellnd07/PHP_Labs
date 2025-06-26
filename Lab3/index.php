<?php
// Задание 1
$lastName = 'Ivanov';
$firstName = 'Nikolai';
echo 'Client\'s last name is '.$lastName.', and their first name is '.$firstName.'.';

$age = 30;
print '<br>Client\'s age is '.$age.'.';

// Задание 2
$currentDay = date("D");

if ($currentDay === "Fri") {
   echo "<br>Have a great weekend!";
} elseif ($currentDay === "Sun") {
   echo "<br>Tomorrow starts a new work week!";
} else {
   echo "<br>Have a productive workday!";
}

// Использование числового обозначения дня недели
$currentDayNum = date("w");
if ($currentDayNum == 5) {
    echo "<br>Have a great weekend!";
} elseif ($currentDayNum == 0) {
    echo "<br>Tomorrow starts a new work week!";
} else {
    echo "<br>Have a productive workday!";
}

// Задание 4
$day = date("w");
switch ($day) {
    case 0:
        echo "<br>Today is Sunday, ".date("d.m.Y");
        break;
    case 1:
        echo "<br>Today is Monday, ".date("d.m.Y");
        break;
    case 2:
        echo "<br>Today is Tuesday, ".date("d.m.Y");
        break;
    case 3:
        echo "<br>Today is Wednesday, ".date("d.m.Y");
        break;
    case 4:
        echo "<br>Today is Thursday, ".date("d.m.Y");
        break;
    case 5:
        echo "<br>Today is Friday, ".date("d.m.Y");
        break;
    case 6:
        echo "<br>Today is Saturday, ".date("d.m.Y");
        break;
    default:
        echo "<br>Unknown day";
        break;
}

// Задание 5

echo '<br><br><table border="1" cellpadding="5" style="border-collapse:collapse;">';
echo '<tr><th>№</th><th>Фамилия Имя</th><th>График работы</th></tr>';

$dayNum = date("w");

// John Styles
if ($dayNum == 1 || $dayNum == 3 || $dayNum == 5) {
    $johnSchedule = '8:00-12:00';
} else {
    $johnSchedule = 'Нерабочий день';
}

echo '<tr><td>1</td><td>John Styles</td><td>'.$johnSchedule.'</td></tr>';

// Jane Doe
if ($dayNum == 2 || $dayNum == 4 || $dayNum == 6) {
    $janeSchedule = '12:00-16:00';
} else {
    $janeSchedule = 'Нерабочий день';
}

echo '<tr><td>2</td><td>Jane Doe</td><td>'.$janeSchedule.'</td></tr>';
echo '</table>'; 