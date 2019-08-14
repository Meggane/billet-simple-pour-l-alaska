<?php
session_start();
session_destroy();

require_once __DIR__ . "/../../../../../Model/UsersManagerPDO.php";
require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
$db = PDOFactory::getMysqlConnexion();
$users = new UsersManagerPDO($db);
$user = $users->delete($_GET["id"]);

header("Location: ../../../../Frontend/Modules/Pages/Views/index.php");
exit;