<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

$host = 'mariadb:3306';
$db = 'test';
$user = 'test';
$pass = 'test';

$connection  = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

foreach ($connection->query('SELECT * FROM users') as $row){
    echo $row['id'] . ' ' . $row['name'] . '<br>';
}




?>

</body>
</html>