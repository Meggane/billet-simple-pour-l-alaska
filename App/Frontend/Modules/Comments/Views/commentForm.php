<?php
//session_start();
require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/CommentsManagerPDO.php";
//require_once __DIR__ . "/../../../../../Controller/test.php";

$db = PDOFactory::getMySqlConnexion();
$comments = new CommentsManagerPDO($db);
$commentList = $comments->getList($_GET["id"]);
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--To Work with icons-->

<?php
foreach ($commentList as $comment) {
    ?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                        <p id="commentPost" class="text-secondary text-center"><?= $comment->publicationDate()->format("d F Y H:i:s") ?> GMT+02:00</p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            <a class="float-left" href="../../Comments/Views/showUser.php"><strong><?= $comment->pseudo() ?></strong></a>
                        </p>
                        <div class="clearfix"></div>
                        <p><?= $comment->message() ?></p>
                        <p>
                            <?php
                            if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
                            ?>
                            <a href="?delete=<?= $comment->id() ?>" class="float-right btn btn-outline-primary ml-2"> <i class="fas fa-trash-alt"></i> Supprimer</a>
                            <?php
                            }
                            ?>
                            <a class="float-right btn text-white btn-danger"> <i class="fas fa-flag"></i> Signaler</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}