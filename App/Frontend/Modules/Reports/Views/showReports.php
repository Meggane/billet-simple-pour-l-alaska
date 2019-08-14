<?php
session_start();
ob_start();

$titlePage = "Liste des signalements des commentaires";
$titleSocialNetworks = "Liste des signalements des commentaires";
$bodyPage = "";

require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/ReportsManagerPDO.php";
require_once __DIR__ . "/../../../../../Model/CommentsManagerPDO.php";


$db = PDOFactory::getMySqlConnexion();
$reports = new ReportsManagerPDO($db);
$reportsList = $reports->getAll();
$comments = new CommentsManagerPDO($db);
?>

<nav id="nav_showReports" class="nav_pages">
    <?php include __DIR__ . "/../../Pages/Views/menu.php" ?>
</nav>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<section id="section_show_reports">
<?php
foreach ($reportsList as $report) {
    $idComment = $report->idComment();
    $comment = $comments->get($idComment);
    ?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 id="h5_showReports">
                        Le commentaire a été signalé <?= $reports->count($report->idComment()) ?> fois
                    </h5>
                    <div class="col-md-2">
                        <p id="commentPost" class="text-secondary text-center"><?= $report->reportingDate()->format("d/m/Y à H\hi") ?></p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            <a class="float-left" href="../../Comments/Views/showUser.php"><strong><?= $report->pseudo() ?></strong></a>
                        </p>
                        <div class="clearfix"></div>
                        <p><?= $report->message() ?></p>
                        <p>
                            <a href="?delete=#" class="float-right btn btn-outline-primary ml-2"> <i class="fas fa-trash-alt"></i> Supprimer</a>
                        </p>
                        <p>
                            <a href="../../Tickets/Views/show.php?id=<?= $comment->idTickets() ?>#<?= $comment->id() ?>" class="float-right btn btn-outline-primary ml-2">Voir le commentaire</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php
}
?>
</section>

<?php
$contentPage = ob_get_clean();
require_once __DIR__ . "/../../../Templates/layout.php";