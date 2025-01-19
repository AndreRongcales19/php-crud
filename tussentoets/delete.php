<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=smartphone4u",
        "root", "");
    if (isset($_POST['insert'])) {
        $query = $db->prepare("SELECT FROM smartphone WHERE id = :id");
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $query->bindParam("id", $_GET["id"]);
        $query->execute();
        header("location: master.php");
    }
} catch (PDOException $e) {
    die("Error!:" . $e->getMessage());
}
$query = $db->prepare('SELECT * FROM smartphone');
$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $data) {
    echo "<a href='master.php?id=".$data['id']."'''>';
}
?>
