<?php

require_once  __DIR__ . "/../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../Model/TicketsManagerPDO.php";

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
                header("Location: /../../../../Frontend/Modules/Pages/Views/book.php");
            }
            else
            {
                $errors = $ticket->errors();
            }
        }
    }
}