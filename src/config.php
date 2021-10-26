<?php

$db_host = 'db'; // catch from db container
$db_username = 'root';
$db_password = 'hoangtu';
$db_name = 'memos';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
