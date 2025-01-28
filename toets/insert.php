<?php
include_once "dbconnect.php";

$errorCategory = '';
$errorMerk = '';
$errorType = '';
$errorMemory = '';
$errorHD = '';
$errorPrijs = '';


$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);

$merk = filter_input(INPUT_POST, 'merk', FILTER_SANITIZE_SPECIAL_CHARS);

$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

$memory = filter_input(INPUT_POST, 'memory', FILTER_VALIDATE_FLOAT);

$hd = filter_input(INPUT_POST, 'hd', FILTER_SANITIZE_SPECIAL_CHARS);

$prijs = filter_input(INPUT_POST, 'prijs', FILTER_VALIDATE_FLOAT);

$category = trim($category);

if (isset($_POST['insert'])) {
    if (empty($category)) {
        $errorCategory = 'Category invullen';
    }
    if (empty($merk)) {
        $errorMerk = 'Merk invullen';
    }
    if (empty($type)) {
        $errorType = 'Type invullen';
    }
    if ($memory===false) {
        $errorMemory = 'Memory invullen';
    }
    if (empty($hd)) {
        $errorHD = 'HD invullen';
    }
    if ($prijs===false) {
        $errorPrijs = 'Prijs invullen';
    }

    if ($errorCategory=='' && $errorMerk=='' && $errorType=='' && $errorMemory=='' && $errorHD=='' && $errorPrijs=='') {
        global $db;
        //var_dump($inputs);
        //die;
        $query = $db->prepare('INSERT INTO laptops(category,merk,type,memory,hd,prijs) VALUES (:category,:merk,:type,:memory,:hd,:prijs)');
        $query->bindParam(':category', $category);
        $query->bindParam(':merk', $merk);
        $query->bindParam(':type', $type);
        $query->bindParam(':memory', $memory);
        $query->bindParam(':hd', $hd);
        $query->bindParam(':prijs', $prijs);
        $query->execute();
        header("location: read.php");
    }
}
if (isset($_POST['back'])) {
    header("location: read.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body>
<h1>Insert smartphone</h1>
<form method="post">
    <label for="category">Category</label><br>
    <input type="text" name="category" id="category" value="<?=$category ?? ''?>"><br>
    <?=$errorCategory?><br>
    <label for="merk">Merk</label><br>
    <input type="text" name="merk" id="merk" value="<?=$merk ?? ''?>"><br>
    <?=$errorMerk?><br>
    <label for="type">Type</label><br>
    <input type="text" name="type" id="type" value="<?=$type ?? ''?>"><br>
    <?=$errorType?><br>
    <label for="memory">Memory</label><br>
    <input type="number" name="memory" id="memory" value="<?=$memory ?? ''?>"><br>
    <?=$errorMemory?><br>
    <label for="hd">HD</label><br>
    <input type="text" name="hd" id="hd" value="<?=$hd ?? ''?>"><br>
    <?=$errorHD?><br>
    <label for="prijs">Prijs</label><br>
    <input type="number" name="prijs" id="prijs" value="<?=$prijs ?? ''?>"><br>
    <?=$errorPrijs?><br>
        <input type="submit" value="opslaan" name="i    nsert">
        <input type="submit" value="back" name="back">
</form>
</body>
</html>