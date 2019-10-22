<?php
session_start();
$titlePage = "Liste des signalements des commentaires";
$titleSocialNetworks = "Liste des signalements des commentaires";

require_once __DIR__ . "/../../Controller/pageController.php";
include __DIR__ . "/../../Controller/variableController.php";
require_once __DIR__ . "/../../page.php";

if (isset($_SESSION["login"]) && $_SESSION["admin"] == 1) {
    $reportsList = $reports->getAll();
    ?>

    <nav id="nav_showReports" class="nav_pages">
        <?php include __DIR__ . "/../Pages/menu.php" ?>
    </nav>

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
                                <p id="commentPost"
                                   class="text-secondary text-center"><?= $report->reportingDate()->format("d/m/Y à H\hi") ?></p>
                            </div>
                            <div class="col-md-10">
                                <p>
                                    <a id="pseudo_show_reports" class="float-left" href="#"><strong><?= $report->pseudo() ?></strong></a>
                                </p>
                                <div class="clearfix"></div>
                                <p><?= $report->message() ?></p>
                                <p>
                                    <a id="btn_delete_show_reports" href="?delete=<?= $report->id() ?>"
                                       class="float-right btn btn-outline-primary ml-2"> <i
                                                class="fas fa-trash-alt"></i> Supprimer</a>
                                </p>
                                <p>
                                    <a id="btn_show_com_show_reports"
                                       href="../Tickets/show.php?id=<?= $comment->idTickets() ?>#<?= $comment->id() ?>"
                                       class="float-right btn btn-outline-primary ml-2">Voir le commentaire</a>
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
} else {
    header("Location: ../../Errors/permission.html");
}

