<?php
$dsn = "mysql:host=localhost;port=8889;dbname=pelacek_cassidy_portfolio1;charset=utf8mb4";
try {
    // Create a PDO connection
    $connection = new PDO($dsn, 'root', 'root');  
    echo "Connected successfully!";
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('Unable to connect');
}
?>