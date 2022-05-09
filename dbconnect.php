<?php
$host = "localhost";
$db = "users";
$user = "root";
$pass = "";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, $opt);

?>