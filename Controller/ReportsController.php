<?php

require_once  __DIR__ . "/../Model/PDOFactory.php";
require_once __DIR__ . "/../Model/ReportsManagerPDO.php";
require_once __DIR__ . "/BackController.php";
require_once __DIR__ . "/pageController.php";

class ReportsController extends BackController {
    public function __construct($app, $db) {
        parent::__construct($app, $db);
    }

    public function insertReport() {
        $db = PDOFactory::getMySqlConnexion();
        $comments = new CommentsManagerPDO($db);
        $reports = new ReportsManagerPDO($db);
        $comment = $comments->get(htmlspecialchars($_GET["idComment"]));
        $idComment = $comment->id();

        $idTickets = $comment->idTickets();


        if (isset($_POST['pseudo']) && isset($_POST['message']))
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
                //$comment->setReport();
                header("Location: ../App/Frontend/Modules/Reports/Views/reportValid.php");
            }
            else
            {
                $errors = $report->errors();
            }
        }
    }

    public function deleteReport() {
        $db = PDOFactory::getMysqlConnexion();
        $manager = new ReportsManagerPDO($db);

        if (isset($_GET['delete']))
        {
            $manager->delete(htmlspecialchars((int) $_GET['delete']));
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
}

$reportsController = new ReportsController("PDO", PDOFactory::getMysqlConnexion());
if (isset($_GET["idComment"])) {
    $insertReport = $reportsController->insertReport();
}
$deleteReport = $reportsController->deleteReport();