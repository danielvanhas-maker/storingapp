<?php
require_once '../../../config/config.php';
session_start();

$inputName = $_POST['name'];
if(empty($inputName))
    {
        $errors[] = "Vul een Naam in";
    }

$inputPassword = $_POST['password'];
if(empty($inputPassword))
    {
        $errors[] = "Vul een wachtwoord in";
    }

if(isset($errors)) 
{ 
var_dump($errors); 
die(); 
} 

require_once '../../../config/conn.php';

$query = "SELECT id, name, password FROM user WHERE name = :name";

$statement = $conn->prepare($query);

$statement->execute([":name" => $inputName]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($user && ($inputPassword == $user['password']))
    {
        $_SESSION['logged'] = "1";
        header("Location: ../../../index.php");
        exit;
    }
else
    {
        $errormsg = "Ongeldige naam of wachtwoord!";
        header("Location: ../../../login.php?msg=$errormsg");
        exit;
    }