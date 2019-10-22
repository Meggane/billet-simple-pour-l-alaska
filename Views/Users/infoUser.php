<?php
session_start();
$titlePage = "Mes informations";
$titleSocialNetworks = "Billet simple pour l'Alaska - Mes informations";

include __DIR__ . "/../../page.php";

if (isset($_SESSION["login"])) {
?>

    <nav id="nav_info_user" class="nav_pages" class="main_nav">
        <?php include __DIR__ . "/../Pages/menu.php"; ?>
    </nav>

    <div id="info_user" class="container-fluid well span6">
        <div class="row-fluid">
            <div class="info_user_presentation col-lg-2 col-sm-4 col-xs-12" >
                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img-circle">
            </div>

            <div class="info_user_presentation col-lg-8 col-sm-4 col-xs-12">
                <h3><?= $_SESSION["login"] ?></h3>
                <h6>Email: <?= $_SESSION["email"] ?></h6>
            </div>

            <div id="info_user_btn_delete_user" class="col-lg-2 col-sm-4 col-xs-10">
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
            <div class="col-lg-6 col-sm-12">
                <form method="post" id="passwordForm" action="../../Controller/UsersController.php?login=<?= $user->login() ?>">
                    <input type="password" class="input-lg form-control" name="password_infoUser" id="password_infoUser" placeholder="Nouveau mot de passe" autocomplete="off">
                    <div class="row">
                        <div class="span_info_user col-sm-6">
                            <span id="8char" class="glyphicon glyphicon-remove"></span> Minimum 6 caractères<br>
                            <span id="ucase" class="glyphicon glyphicon-remove"></span> Une lettre majuscule
                        </div>
                        <div class="span_info_user col-sm-6">
                            <span id="lcase" class="glyphicon glyphicon-remove"></span> Une lettre minuscule<br>
                            <span id="num" class="glyphicon glyphicon-remove"></span> Un nombre
                        </div>
                    </div>
                    <input type="password" class="input-lg form-control" name="confirm_password_infoUser" id="confirm_password_infoUser" placeholder="Confirmation nouveau mot de passe" autocomplete="off">
                    <div class="row">
                        <div class="span_info_user col-sm-12">
                            <span id="pwmatch" class="glyphicon glyphicon-remove"></span> Les mots de passe sont identiques
                        </div>
                    </div>
                    <input id="submit_change_password" type="submit" class="col-lg-12 col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Modifier">
                </form>
            </div>
        </div>
    </div>

    <script src="../../Public/js/changePassword.js"></script>

<?php
} else {
    header("Location: ../../Errors/permission.html");
}