<?php 

require_once __DIR__ . "/../../../../../Model/PDOFactory.php";

$bdd = PDOFactory::getMySqlConnexion();

$passwordCrypt = password_hash($_POST["password"], PASSWORD_DEFAULT);
$login = $_POST["login"];
$email = $_POST["email"];

$req = $bdd->prepare("INSERT INTO users (login, password, email) VALUES(?, ?, ?)");
$req->execute(array($_POST["login"], $passwordCrypt, $_POST["email"]));

$req->closeCursor();
header("Location: index.php");
