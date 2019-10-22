<?php
require_once __DIR__ . "/BackController.php";

class TicketsController extends BackController {

    public function __construct($app, $db) {
        parent::__construct($app, $db);
    }

    public function insertTicket() {
        include __DIR__ . "/variableController.php";

        if (isset($_POST['title']) && isset($_POST['content'])) {
            $ticket = new Tickets([
                    'title' => htmlspecialchars($_POST['title']),
                    'content' => $_POST['content']
                ]);

            if (isset($_POST['id'])) {
                $ticket->setId(htmlspecialchars($_POST['id']));
            }

            if ($ticket->isValid()) {
                $tickets->save($ticket);
                header("Location: ../Views/Pages/book.php");
                exit();
            } else {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit();
            }
        }
    }

    public function deleteTicket() {
        include __DIR__ . "/variableController.php";

        if (isset($_GET['supprimer'])) {
            $tickets->delete(htmlspecialchars((int) $_GET['supprimer']));
            $comments->deleteFromTickets(htmlspecialchars((int) $_GET['supprimer']));
            $reports->deleteFromTickets(htmlspecialchars((int) $_GET['supprimer']));
        }
    }
}

require_once __DIR__ . "/pageController.php";