<?php
// Example using if
$age = 22;

if ($age > 12 && $age < 20) {
   $message = "you are a teenager!";
} elseif ($age > 40) {
   $message = "you are an adult!";
} else {
   $message = "you are in your prime... get to work!";
}

// Example using a ternary operator
$name = "Anna";
echo $name ? $name.', '.$message : 'Anonymous, '.$message; 