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

<?php
}

$contentPage = ob_get_clean();

require __DIR__ . "/../../../../Frontend/Templates/layout.php";