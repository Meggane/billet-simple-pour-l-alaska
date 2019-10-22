<?php
require_once __DIR__ . "/pageController.php";
require_once __DIR__ . "/CommentsController.php";
require_once __DIR__ . "/ReportsController.php";
require_once __DIR__ . "/UsersController.php";
require_once __DIR__ . "/TicketsController.php";

$commentsController = new CommentsController("PDO", PDOFactory::getMysqlConnexion());
if (isset($_GET["idTicket"])) {
    $insertComment = $commentsController->insertComment();
}
$deleteComment = $commentsController->deleteComment();


$reportsController = new ReportsController("PDO", PDOFactory::getMysqlConnexion());
if (isset($_GET["idComment"])) {
    $insertReport = $reportsController->insertReport();
}
$deleteReport = $reportsController->deleteReport();



$ticketsController = new TicketsController("PDO", PDOFactory::getMysqlConnexion());
$ticketsController->insertTicket();
$ticketsController->deleteTicket();



$usersController = new usersController("PDO", PDOFactory::getMysqlConnexion());
$createUser = $usersController->createUser();
$deleteUser = $usersController->deleteUser();
$updateUser = $usersController->updateUser();
$connexionUser = $usersController->connexionUser();