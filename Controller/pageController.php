<?php
require_once __DIR__ . "/../Model/PDOFactory.php";
require_once __DIR__ . "/../Model/TicketsManagerPDO.php";
require_once __DIR__ . "/../Model/CommentsManagerPDO.php";
require_once __DIR__ . "/../Model/ReportsManagerPDO.php";
require_once __DIR__ . "/../Model/UsersManagerPDO.php";
require_once __DIR__ . "/TicketsController.php";
require_once __DIR__ . "/CommentsController.php";
require_once __DIR__ . "/ReportsController.php";
require_once __DIR__ . "/UsersController.php";

$db = PDOFactory::getMySqlConnexion();
$tickets = new TicketsManagerPDO($db);
$comments = new CommentsManagerPDO($db);
$reports = new ReportsManagerPDO($db);
$users = new UsersManagerPDO($db);