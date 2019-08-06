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

    <nav class="nav_pages" class="main_nav">
        <?php include __DIR__ .  "/../../../../Frontend/Modules/Pages/Views/menu.php"; ?>
    </nav>

    <a href="?delete-user=<?= $user->id() ?>" id="delete_user"><i class="fas fa-times"></i> Supprimer mon compte</a>
    <h1>Mes informations</h1>
    <p>Pseudo : <?= $_SESSION["login"] ?></p>
    <p>Email : <?= $_SESSION["email"] ?></p>

    <h2>Modifier le mot de passe</h2>
    <form method="post" action="../../Registration/Views/update.php?id=<?= $user->id() ?>">
        <label>Nouveau mot de passe :</label>
        <p>
            <input type="password" name="password" id="password">
        </p>
        <label>Confirmation nouveau mot de passe :</label>
        <p>
            <input type="password" name="confirm_password_infoUser" id="confirm_password_infoUser">
        </p>
        <p>
            <input type="submit" value="Valider">
        </p>
    </form>

<?php
}

$contentPage = ob_get_clean();

require __DIR__ . "/../../../../Frontend/Templates/layout.php";