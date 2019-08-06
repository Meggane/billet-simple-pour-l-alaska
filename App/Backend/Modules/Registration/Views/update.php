<?php
require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/UsersManagerPDO.php";
$db = PDOFactory::getMySqlConnexion();
$users = new UsersManagerPDO($db);

$user = $users->get($_GET["id"]);

if (isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["confirm_password_infoUser"]) && $_POST["password"] == $_POST["confirm_password_infoUser"]) {
    $passwordCrypt = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $q = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
    $q->bindValue(":password", $passwordCrypt);
    $q->bindValue(":id", $user->id(), PDO::PARAM_INT);
    $q->execute();

    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

echo "<p>Les mots de passe doivent être identiques</p>";
