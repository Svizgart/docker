<?php

/**
 * @return int
 * генерирует четное случайное число в заданном диапазоне
 */
function getRandomEvenNumber()
{
    $number = rand(RANDOM_MIN_VALUE, RANDOM_MAX_VALUE);
    return 0 !== $number % 2
        ? $number - 1
        : $number;
}

/**
 * @return int
 * генерирует не четное случайное число в заданном диапазоне
 */
function getRandomOddNumber()
{
    $number = rand(RANDOM_MIN_VALUE, RANDOM_MAX_VALUE);
    return 0 === $number % 2
        ? $number - 1
        : $number;
}


/**
 * @param array $array
 * @return false|string
 * приводит массив к удобочитаемому виду для записи его в логфайл
 */
function bufferingArrayToString(array $array)
{
    $array_values = array_values($array);

    if (is_array($array_values[0])) {
        ob_start();

        echo "[\n";
        foreach ($array as $k => $value) {
            echo "  $k:";
            echo bufferingArrayToString($value) . ",";
            echo "\n";
        }
        echo "]";

        return ob_get_clean();
    }

    return "[" . implode(',', $array) . "]";;
}

/**
 * @param $data
 * печатает массив на фронте
 */
function typing($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

/**
 * @return string
 * разделитель
 */
function addDivide()
{

    return "\n-----------------------------------------------------------------------------------------------\n";
}


