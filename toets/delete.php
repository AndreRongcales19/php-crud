<?php
include 'dbconnect.php';
include_once 'class.php';
global $db;

try {
    if (isset($_POST['delete'])) {
        $query = $db->prepare("DELETE FROM laptops WHERE id = :id");
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $query->bindParam("id", $id);
        if ($query->execute()) {
            echo "Het item is verwijderd";
        } else {
            echo "Er is een fout opgetreden";
        }
        header("location: read.php");
        echo "<br>";
    }
    if (isset($_POST['back'])) {
        header("location: read.php");
    }
} catch (PDOException $e) {
    die("Error!:" . $e->getMessage());
}

$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM laptops WHERE id=" . $id);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_CLASS, 'Laptop');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body>
<div class="container">
    <h1>Verwijder de volgende rij?</h1>
    <table class="table">
        <tr>
            <th>category</th>
            <th>merk</th>
            <th>type</th>
            <th>details</th>
            <th>hd</th>
            <th>prijs</th>
        </tr>
        <?php foreach ($results as $result):?>
            <tr>
                <td><?=$result->category?></td>
                <td><?=$result->merk?></td>
                <td><?=$result->type?></td>
                <td><?=$result->memory?></td>
                <td><?=$result->hd?></td>
                <td><?=$result->prijs?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <form method="post">
        <input type="submit" value="delete" name="delete">
        <input type="submit" value="back" name="back">
    </form>
</div>
</body>
</html>
