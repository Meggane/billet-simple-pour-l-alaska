<?php
session_start();
$titlePage = "Signalement commentaire";
$titleSocialNetworks = "Signalement commentaire";

require_once __DIR__ . "/../../page.php";
require_once __DIR__ . "/../../Controller/pageController.php";
include __DIR__ . "/../../Controller/variableController.php";

$comment = $comments->get(htmlspecialchars((int) $_GET["id"]));
?>

<nav id="nav_addReport" class="nav_pages">
    <?php include __DIR__ . "/../Pages/menu.php"; ?>
</nav>

<div id="comment_of_report" class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="add_report_presentation col-md-2 col-sm-4 col-xs-4">
                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                    <p id="commentPost" class="text-secondary text-center">Posté le <?= $comment->publicationDate()->format("d/m/Y à H\hi") ?></p>
                </div>
                <div class="add_report_presentation col-md-10 col-sm-8 col-xs-8">
                    <p>
                        <a id="pseudo_addReport" class="float-left" href="#"><strong><?= $comment->pseudo() ?></strong></a>
                    </p>
                    <div class="clearfix"></div>
                    <p><?= $comment->message() ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/reportForm.php";