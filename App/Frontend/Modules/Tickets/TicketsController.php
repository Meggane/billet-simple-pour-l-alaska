<?php

require_once  __DIR__ . "/../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../Model/TicketsManagerPDO.php";
require_once __DIR__ . "/../../../../Model/CommentsManagerPDO.php";

class TicketsController {
    protected $api = null,
              $dao = null,
              $managers = [];

    public function __construct($api, $dao) {
        $this->api = $api;
        $this->dao = $dao;
    }

    public function insertTicket() {
        $db = PDOFactory::getMysqlConnexion();
        $manager = new TicketsManagerPDO($db);

        if (isset($_GET['modifier']))
        {
            $ticket = $manager->getUnique((int) $_GET['modifier']);
        }

        if (isset($_GET['supprimer']))
        {
            $manager->delete((int) $_GET['supprimer']);
        }

        if (isset($_POST['title']) && isset($_POST['content']))
        {
            $ticket = new Tickets(
                [
                    'title' => $_POST['title'],
                    'content' => $_POST['content']
                ]
            );

            if (isset($_POST['id']))
            {
                $ticket->setId($_POST['id']);
            }

            if ($ticket->isValid())
            {
                $manager->save($ticket);
                header("Location: ../../Pages/Views/book.php");
                exit();
            }
            else
            {
                $errors = $ticket->errors();
            }
        }
    }

    public function insertComment() {
        $db = PDOFactory::getMysqlConnexion();
        $manager = new CommentsManagerPDO($db);

        if (isset($_GET['delete']))
        {
            $manager->delete((int) $_GET['delete']);
            $previousPage = $_SERVER["HTTP_REFERER"];
            header("Location: " . $previousPage);
        }
    }
}

$ticketsController = new TicketsController("PDO", PDOFactory::getMysqlConnexion());
$ticketsController->insertTicket();
$insertComment = $ticketsController->insertComment();