<?php

require_once __DIR__ . "/BackController.php";
require_once __DIR__ . "/pageController.php";

class ReportsController extends BackController {
    public function __construct($app, $db) {
        parent::__construct($app, $db);
    }

    public function insertReport() {
        include __DIR__ . "/variableController.php";
        $comment = $comments->get(htmlspecialchars($_GET["idComment"]));
        $idComment = $comment->id();

        $idTickets = $comment->idTickets();


        if (isset($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST["pseudo"]) && !empty($_POST["message"]) && preg_match("/^[A-Za-z0-9]+/", htmlspecialchars($_POST["pseudo"])) && preg_match("/^[A-Za-z0-9]+/", htmlspecialchars($_POST["message"])))
        {
            $report = new Reports(
                [
                    'pseudo' => htmlspecialchars($_POST['pseudo']),
                    'message' => htmlspecialchars($_POST['message']),
                    'idComment' => $idComment,
                    'idTickets' => $idTickets,
                ]
            );

            if (isset($_POST['id']))
            {
                $report->setId(htmlspecialchars($_POST['id']));
            }

            if ($report->isValid())
            {
                $reports->save($report);
                header("Location: ../Views/Reports/reportValid.php");
            }
        } else {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    public function deleteReport() {
        include __DIR__ . "/variableController.php";

        if (isset($_GET['delete']))
        {
            $reports->delete(htmlspecialchars((int) $_GET['delete']));
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
}

$reportsController = new ReportsController("PDO", PDOFactory::getMysqlConnexion());
if (isset($_GET["idComment"])) {
    $insertReport = $reportsController->insertReport();
}
$deleteReport = $reportsController->deleteReport();