<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=laptops4u",
        "root", "");
} catch (PDOException $e) {
    die("Error!:" . $e->getMessage());
}
?>
