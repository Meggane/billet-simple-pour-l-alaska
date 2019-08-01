<?php
session_start();
ob_start();
$titlePage = "";
$titleSocialNetworks = "";
$bodyPage = "";

?>
    <nav class="nav_pages">
        <?php include __DIR__ . "/../../Pages/Views/menu.php"; ?>
    </nav>

<div id="report_valid">
    <p>Votre signalement a bien été envoyé. Nous traiterons votre demande dans les plus brefs délais.</p>
    <p><a href="../../Pages/Views/book.php">Retour aux chapitres</a></p>
</div>

<?php
$contentPage = ob_get_clean();
require_once __DIR__ . "/../../../Templates/layout.php";