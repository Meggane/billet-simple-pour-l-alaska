<?php
require_once __DIR__ . "/../../Controller/pageController.php";
include __DIR__ . "/../../Controller/variableController.php";
$commentList = $comments->getList($_GET["id"]);

foreach ($commentList as $comment) {
?>

    <div id="<?= $comment->id() ?>" class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="presentation_comment_form col-md-2">
                        <img src="../../Public/images/avatar.jpg" class="img img-rounded img-fluid"/>
                        <p id="commentPost" class="text-secondary text-center">Posté le <?= $comment->publicationDate()->format("d/m/Y à H:i") ?></p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            <a class="float-left" href="#"><strong><?= $comment->pseudo() ?></strong></a>
                        </p>
                        <div class="clearfix"></div>
                        <p><?= $comment->message() ?></p>
                        <p>
                            <?php
                            if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
                            ?>
                            <a id="btn_delete_comment_ticket" href="?delete=<?= $comment->id() ?>" class="btn_comment_ticket float-right btn btn-outline-danger ml-2"> <i class="fas fa-trash-alt"></i> Supprimer</a>
                            <?php
                            }
                            ?>
                            <a href="../Reports/addReport.php?id=<?= $comment->id() ?>" class="btn_comment_ticket float-right btn text-white btn-danger"> <i class="fas fa-flag"></i> Signaler</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}