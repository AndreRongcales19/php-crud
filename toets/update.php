<?php
global $db;

try {
    $db = new PDO("mysql:host=localhost;dbname=laptops4u",
        "root", "");
    if (isset($_POST['update'])) {
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);

        $merk = filter_input(INPUT_POST, 'merk', FILTER_SANITIZE_SPECIAL_CHARS);

        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

        $memory = filter_input(INPUT_POST, 'memory', FILTER_VALIDATE_FLOAT);

        $hd = filter_input(INPUT_POST, 'hd', FILTER_SANITIZE_SPECIAL_CHARS);

        $prijs = filter_input(INPUT_POST, 'prijs', FILTER_VALIDATE_FLOAT);

        $query = $db->prepare("UPDATE laptops SET category = :category, merk = :merk, type = :type, memory = :memory, hd = :hd, prijs = :prijs WHERE id = :id");
        $query->bindParam(':category', $category);
        $query->bindParam(':merk', $merk);
        $query->bindParam(':type', $type);
        $query->bindParam(':memory', $memory);
        $query->bindParam(':hd', $hd);
        $query->bindParam(':prijs', $prijs);
        $query->bindParam('id', $_GET['id']);
        if ($query->execute()) {
            echo 'De nieuwe gegevens zijn toegevoegd';
            header("location: read.php");
        } else {
            echo 'Er is een fout opgetreden';
        }
        echo "<br>";
    } else {
        $query = $db->prepare("SELECT * FROM laptops WHERE id = :id");
        $query->bindParam("id", $_GET['id']);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $data) {
            $category = $data["category"];
            $merk = $data["merk"];
            $type = $data["type"];
            $memory = $data["memory"];
            $hd = $data["hd"];
            $prijs = $data["prijs"];
        }
    }
    if (isset($_POST['back'])) {
        header("location: read.php");
    }
} catch (PDOException $e) {
    die("Error!:" . $e->getMessage());
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body>
<h1>Update laptop</h1>
<form method="post">
    <label for="category">Category</label><br>
    <input type="text" name="category" id="category" value="<?=$category ?? ''?>"><br>
    <label for="merk">Merk</label><br>
    <input type="text" name="merk" id="merk" value="<?=$merk ?? ''?>"><br>
    <label for="type">Type</label><br>
    <input type="text" name="type" id="type" value="<?=$type ?? ''?>"><br>
    <label for="memory">Memory</label><br>
    <input type="number" name="memory" id="memory" value="<?=$memory ?? ''?>"><br>
    <label for="hd">HD</label><br>
    <input type="text" name="hd" id="hd" value="<?=$hd ?? ''?>"><br>
    <label for="price">Prijs</label><br>
    <input type="number" name="prijs" id="prijs" value="<?=$prijs ?? ''?>"><br>
    <input type="submit" value="update" name="update">
    <input type="submit" value="back" name="back">
</form>
</body>
</html>