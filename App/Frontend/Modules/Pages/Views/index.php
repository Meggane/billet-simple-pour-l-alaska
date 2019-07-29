<?php
session_start();

$titlePage = "Accueil";
$titleSocialNetworks = "Billet simple pour l'Alaska - Accueil";
$bodyPage = "";

ob_start();
?>

<header id="header_index">
  <div id="background_header_index">
    <nav class="main_nav">
      <?php include("menu.php"); ?>
    </nav>
    <h1 id="titleIndex">BILLET SIMPLE POUR L'ALASKA</h1>
    <div id="double_arrows">
      <a class="link_index" href="#ancre"><i class="fas fa-angle-double-down faa-vertical animated"></i></a>
    </div>
  </div>
</header>

<section>
    <h2 id="ancre">Qui suis-je ?</h2>
</section>

<?php
include __DIR__ . "/footer.php";

$contentPage = ob_get_clean();

require("../../../Templates/layout.php");