<?php
$action = $_POST['action'];
if ($action == 'create'){

$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit'];
$prioriteit = $_POST['prioriteit'];
$melder = $_POST['melder'];
$overige_info = $_POST['overige_info'];

echo $attractie . " / " . $type . " / " . $capaciteit . " / " . $prioriteit . " / " . $melder . " / " . $overige_info;

require_once '../../../config/conn.php';
$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info)
            VALUE (:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";
$statement = $conn->prepare($query);
$statement->execute([":attractie" => $attractie, ":type" => $type, ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit, ":melder" => $melder, ":overige_info" => $overige_info,]);

header("Location: ../../../index.php");
}

if ($action == 'edit'){
    $id = (int) $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    require_once "conn.php"; 
    $query = "UPDATE user SET name = :name, password = :password WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([":name" => $name, ":password" => $password, ":id" => $id]);
    header("Location: ../../../meldingen/index.php");
}