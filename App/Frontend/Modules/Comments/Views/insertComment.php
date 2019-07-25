<?php

require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/CommentsManagerPDO.php";
require_once __DIR__ . "/../../../../../Model/TicketsManagerPDO.php";

$db = PDOFactory::getMysqlConnexion();
$manager = new CommentsManagerPDO($db);
$tickets = new TicketsManagerPDO($db);
$ticket = $tickets->getUnique(htmlspecialchars($_GET["id"]));
$idTickets = $ticket->id();

if (isset($_POST['pseudo']) && isset($_POST['message']))
{
    $comment = new Comment(
        [
            'pseudo' => $_POST['pseudo'],
            'message' => $_POST['message'],
            'idTickets' => $idTickets
        ]
    );

    if (isset($_POST['id']))
    {
        $comment->setId($_POST['id']);
    }

    if ($comment->isValid())
    {
        $manager->save($comment);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else
    {
        $errors = $comment->errors();
    }
}