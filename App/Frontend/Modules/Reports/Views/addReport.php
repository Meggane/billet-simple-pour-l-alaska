<?php
session_start();
$titlePage = "Signalement commentaire";
$titleSocialNetworks = "Signalement commentaire";
$bodyPage = "";

require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/CommentsManagerPDO.php";
require_once __DIR__ . "/../../../../../page.php";

$db = PDOFactory::getMySqlConnexion();
$comments = new CommentsManagerPDO($db);
$comment = $comments->get((int) $_GET["id"]);
?>

<nav id="nav_addReport" class="nav_pages">
    <?php include __DIR__ . "/../../Pages/Views/menu.php"; ?>
</nav>

<div id="comment_of_report" class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                    <p id="commentPost" class="text-secondary text-center"><?= $comment->publicationDate() ?></p>
                </div>
                <div class="col-md-10">
                    <p>
                        <a class="float-left" href="../../Comments/Views/showUser.php"><strong><?= $comment->pseudo() ?></strong></a>
                    </p>
                    <div class="clearfix"></div>
                    <p><?= $comment->message() ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/reportForm.php";