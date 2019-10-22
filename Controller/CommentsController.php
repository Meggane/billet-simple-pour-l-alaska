<?php
require_once __DIR__ . "/BackController.php";

class CommentsController extends BackController {
    public function __construct($app, $db) {
        parent::__construct($app, $db);
    }

    public function insertComment() {
        include __DIR__ . "/variableController.php";
        $ticket = $tickets->getUnique(htmlspecialchars($_GET["idTicket"]));
        $idTickets = $ticket->id();
        $comments = new CommentsManagerPDO($db);

        if (isset($_POST['pseudo']) && isset($_POST['message']) && preg_match("/^[A-Za-z0-9]+/", htmlspecialchars($_POST["pseudo"])) && preg_match("/^[A-Za-z0-9]+/", htmlspecialchars($_POST["message"]))) {
            $comment = new Comment([
                    'pseudo' => htmlspecialchars($_POST['pseudo']),
                    'message' => htmlspecialchars($_POST['message']),
                    'idTickets' => $idTickets
                ]);

            if (isset($_POST['id'])) {
                $comment->setId(htmlspecialchars($_POST['id']));
            }

            if ($comment->isValid()) {
                $comments->save($comment);
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            } else {
                header("Location: " . $_SERVER["HTTP_REFERER"] . "#form_show_ticket");
            }
        } else {
            header("Location: " . $_SERVER["HTTP_REFERER"] . "#form_show_ticket");
        }
    }

    public function deleteComment() {
        include __DIR__ . "/variableController.php";

        if (isset($_GET['delete'])) {
            $comments->delete(htmlspecialchars((int) $_GET['delete']));
            $reports->deleteFromComment(htmlspecialchars((int) $_GET['delete']));
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
}

require_once __DIR__ . "/pageController.php";