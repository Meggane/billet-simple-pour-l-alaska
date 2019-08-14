<?php
session_start();
ob_start();

$titlePage = "Mes informations";
$titleSocialNetworks = "Billet simple pour l'Alaska - Mes informations";
$bodyPage = "";

require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/UsersManagerPDO.php";
require_once __DIR__ . "/../UsersController.php";

$db = PDOFactory::getMysqlConnexion();
$user = new UsersManagerPDO($db);

if (isset($_SESSION["login"])) {
?>

    <nav id="nav_info_user" class="nav_pages" class="main_nav">
        <?php include __DIR__ . "/../../../../Frontend/Modules/Pages/Views/menu.php"; ?>
    </nav>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <br><br>
    <div id="info_user" class="container-fluid well span6">
        <div class="row-fluid">
            <div class="span2" >
                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img-circle">
            </div>

            <div class="span8">
                <h3><?= $_SESSION["login"] ?></h3>
                <h6>Email: <?= $_SESSION["email"] ?></h6>
            </div>

            <div class="span2">
                <a href="?delete-user=<?= $user->id() ?>" id="delete_user"><i class="fas fa-times"></i> Supprimer mon compte</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 id="h2_infoUser">Modifier le mot de passe</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <form method="post" id="passwordForm" action="../../Registration/Views/update.php?id=<?= $user->id() ?>">
                    <input type="password" class="input-lg form-control" name="password_infoUser" id="password_infoUser" placeholder="Nouveau mot de passe" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-6">
                            <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Minimum 6 caractères<br>
                            <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Une lettre majuscule
                        </div>
                        <div class="col-sm-6">
                            <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Une lettre minuscule<br>
                            <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Un nombre
                        </div>
                    </div>
                    <input type="password" class="input-lg form-control" name="confirm_password_infoUser" id="confirm_password_infoUser" placeholder="Confirmation nouveau mot de passe" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12">
                            <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Les mots de passe sont identiques
                        </div>
                    </div>
                    <input id="submit_change_password" type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Modifier le mot de passe">
                </form>
            </div><!--/col-sm-6-->
        </div><!--/row-->
    </div>

    <script src="../../../../../Public/js/changePassword.js"></script>

<?php
}

$contentPage = ob_get_clean();

require __DIR__ . "/../../../../Frontend/Templates/layout.php";