<?php

require_once  __DIR__ . "/../Model/PDOFactory.php";
require_once __DIR__ . "/../Model/TicketsManagerPDO.php";
require_once __DIR__ . "/../Model/CommentsManagerPDO.php";
require_once __DIR__ . "/../Model/ReportsManagerPDO.php";
require_once __DIR__ . "/BackController.php";

class TicketsController extends BackController {

    public function __construct($app, $db) {
        parent::__construct($app, $db);
    }

    public function insertTicket() {
        $db = PDOFactory::getMysqlConnexion();
        $manager = new TicketsManagerPDO($db);

        if (isset($_POST['title']) && isset($_POST['content']))
        {
            $ticket = new Tickets(
                [
                    'title' => htmlspecialchars($_POST['title']),
                    'content' => $_POST['content']
                ]
            );

            if (isset($_POST['id']))
            {
                $ticket->setId(htmlspecialchars($_POST['id']));
            }

            if ($ticket->isValid())
            {
                $manager->save($ticket);
                header("Location: ../App/Frontend/Modules/Pages/Views/book.php");
                exit();
            }
            else
            {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit();
            }
        }
    }

    public function deleteTicket() {
        $db = PDOFactory::getMysqlConnexion();
        $manager = new TicketsManagerPDO($db);
        $comments = new CommentsManagerPDO($db);
        $reports = new ReportsManagerPDO($db);

        if (isset($_GET['supprimer']))
        {
            $manager->delete(htmlspecialchars((int) $_GET['supprimer']));
            $comments->deleteFromTickets(htmlspecialchars((int) $_GET['supprimer']));
            $reports->deleteFromTickets(htmlspecialchars((int) $_GET['supprimer']));
        }
    }
}

$ticketsController = new TicketsController("PDO", PDOFactory::getMysqlConnexion());
$ticketsController->insertTicket();
$ticketsController->deleteTicket();