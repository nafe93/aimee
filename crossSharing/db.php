<?php
/**
 * Created by PhpStorm.
 * User: nafe
 * Date: 15.05.2017
 * Time: 17:42
 */
$host = 'localhost';
$db   = 'aimee';
$user = 'aimee';
$pass = 'n12345678';
$charset = 'utf8';

$pdo = true;

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
    die('Can not connect: ' . $e->getMessage());
}