<?php
session_start();
session_start();
$titlePage = "Commentaire signalé";
$titleSocialNetworks = "Billet simple pour l'alaska - Commentaire signalé";
$bodyPage = "";

require_once __DIR__ . "/../../../../../page.php";
?>
    <nav class="nav_pages">
        <?php include __DIR__ . "/../../Pages/Views/menu.php"; ?>
    </nav>

<div id="report_valid">
    <p>Votre signalement a bien été envoyé. Nous traiterons votre demande dans les plus brefs délais.</p>
    <p><a href="../../Pages/Views/book.php">Retour aux chapitres</a></p>
</div>