<?php

require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/CommentsManagerPDO.php";
require_once __DIR__ . "/../../../../../Model/ReportsManagerPDO.php";
require_once __DIR__ . "/../../../../../Model/TicketsManagerPDO.php";

$db = PDOFactory::getMysqlConnexion();
$comments = new CommentsManagerPDO($db);
$manager = new ReportsManagerPDO($db);
$comment = $comments->get(htmlspecialchars($_GET["id"]));
$idComment = $comment->id();
$tickets = new TicketsManagerPDO($db);


if (isset($_POST['pseudo']) && isset($_POST['message']))
{
    $report = new Reports(
        [
            'pseudo' => $_POST['pseudo'],
            'message' => $_POST['message'],
            'idComment' => $idComment,
        ]
    );

    if (isset($_POST['id']))
    {
        $report->setId($_POST['id']);
    }

    if ($report->isValid())
    {
        $manager->save($report);
        header("Location: ../../../../Frontend/Modules/Reports/Views/reportValid.php");
    }
    else
    {
        $errors = $report->errors();
    }
}