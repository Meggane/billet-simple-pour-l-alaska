<?php
require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/UsersManagerPDO.php";
$db = PDOFactory::getMySqlConnexion();
$users = new UsersManagerPDO($db);

$user = $users->get($_GET["id"]);

if (isset($_POST["password_infoUser"]) && !empty($_POST["password_infoUser"]) && isset($_POST["confirm_password_infoUser"]) && $_POST["password_infoUser"] == $_POST["confirm_password_infoUser"] && preg_match("/[A-Z]+/", $_POST["password_infoUser"]) && preg_match("/[a-z]+/", $_POST["password_infoUser"]) && preg_match("/[0-9]+/", $_POST["password_infoUser"])) {
    $passwordCrypt = password_hash($_POST["password_infoUser"], PASSWORD_DEFAULT);

    $q = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
    $q->bindValue(":password", $passwordCrypt);
    $q->bindValue(":id", $user->id(), PDO::PARAM_INT);
    $q->execute();

    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

echo "<p>Les mots de passe doivent être identiques</p>";

