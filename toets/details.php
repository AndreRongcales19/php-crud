<?php

global $db;
include 'dbconnect.php';

$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM laptops WHERE id=" . $id);

$query->execute();
$result = $query->fetchALL(PDO::FETCH_ASSOC);
foreach ($result as $data) {
    echo "Artikelnummer: " . $data['id'] . "<br>";
    echo "Category: " . $data['category'] . "<br>";
    echo "Merk: " . $data['merk'] . "<br>";
    echo "Type: " . $data['type'] . "<br>";
    echo "Memory: " . $data['memory'] . "<br>";
    echo "HD: " . $data['hd'] . "<br>";
    echo "Prijs:" . $data['prijs'] . "<br>";
}
?>
<br>
<a href="read.php">Terug naar read pagina</a>
