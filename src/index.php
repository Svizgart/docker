<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

include_once 'my_function.php';

//$host = 'mariadb:3306';
//$db = 'test';
//$user = 'test';
//$pass = 'test';
//
//$connection  = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
//
//foreach ($connection->query('SELECT * FROM users') as $row){
//    echo $row['id'] . ' ' . $row['name'] . '<br>';
//}
//


$url_file = "/usr/share/nginx/html/report" . time() . "txt";
$fp = fopen($url_file, "w");

// Part 1
fwrite($fp, "Part1:\nВ цикле заполнить массив из 20 элементов: 
10 чётных чисел, потом 10 нечётных. Распечатать его.\n");

define('SOURCE_ARRAY_LENGTH', 20);
define('RANDOM_MIN_VALUE', 1);
define('RANDOM_MAX_VALUE', 10);
$sourceArray = [];
for ($i = 0; $i < SOURCE_ARRAY_LENGTH; $i++) {
    if ($i >= round(SOURCE_ARRAY_LENGTH / 2)) {
        $sourceArray[] = getRandomOddNumber();
    } else {
        $sourceArray[] = getRandomEvenNumber();
    }
}
echo "P1<br>";
fwrite($fp, bufferingArrayToString($sourceArray) . addDivide());
typing($sourceArray);

// Part 2
fwrite($fp, "Part2:\nПеремешать массив. Распечатать.\n");
shuffle($sourceArray);
echo "P2<br>";
fwrite($fp, bufferingArrayToString($sourceArray) . addDivide());
typing($sourceArray);

// Part 3
fwrite($fp, "Part3\nРазделить массив на два: с чётными и нечётными числами. Распечатать оба.\n
Массив четныз: \n");
echo "P3<br>";
$evenValues = array_filter(
    $sourceArray,
    function ($item) {
        return 0 === $item % 2;
    }
);
fwrite($fp, bufferingArrayToString($evenValues) . "\n");
typing($evenValues);
$oddValues = array_filter(
    $sourceArray,
    function ($item) {
        return 1 === $item % 2;
    }
);
fwrite($fp, "Массив не четныз: \n" . bufferingArrayToString($oddValues). addDivide());
typing($oddValues);

// Part 4
fwrite($fp, "Part4:\nИз двух массивов собрать один: нечётные ключи и чётные значения. Распечатать.\n");
$combinationOfArrays = array_combine(
    array_values($oddValues),
    array_values($evenValues)
);
echo "P4<br>";
fwrite($fp, bufferingArrayToString($oddValues) . addDivide());
typing($combinationOfArrays);

/*
 * Part 5
 * */
fwrite($fp, "Part5:\nОбойти в цикле массив из п.4 и создать новый массив, где ключи сохраняются, 
а все значения заменяются на массивы случайной длины от 1 до N, 
где N - значение элемента массива. Значения нового массива - случайные числа от 1 до N в кубе.\n");

foreach ($combinationOfArrays as $key => &$value) {
    $savedValue = $value;
    $value = [];
    for ($i = 0, $l = rand(1, $savedValue); $i < $l; $i++) {
        $value[] = rand(1, $savedValue ** 3);
    }
}
unset($value);
echo "P5<br>";
fwrite($fp, bufferingArrayToString($combinationOfArrays) . addDivide());
typing($combinationOfArrays);

//Part 6
fwrite($fp, "Part6:\nОтсортировать двумерный массив из п. 5 по убыванию ключей и по возрастанию значений 
во внутренних массивах\n");
$kpiArray = $combinationOfArrays;

foreach ($kpiArray as $k => $value) {
    sort($value);
    $kpiArray[$k] = $value;
}
krsort($kpiArray);

echo "P6<br>";
fwrite($fp, bufferingArrayToString($kpiArray) . addDivide());
typing($kpiArray);

fclose($fp);

?>

</body>
</html>