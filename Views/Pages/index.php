<?php
session_start();
$titlePage = "Accueil";
$titleSocialNetworks = "Billet simple pour l'Alaska - Accueil";

include __DIR__ . "/../../page.php";
?>

<header id="header_index">
  <div id="background_header_index">
    <nav class="main_nav">
      <?php include __DIR__ . "/menu.php"; ?>
    </nav>
    <h1 id="titleIndex">BILLET SIMPLE POUR L'ALASKA</h1>
    <div id="double_arrows">
      <a class="link_index" href="#ancre"><i class="fas fa-angle-double-down faa-vertical animated"></i></a>
    </div>
  </div>
</header>

<section>
    <h2 id="ancre">Qui suis-je ?</h2>
    <p class="img_jean">
        <img src="../../Public/images/jean.jpg">
    </p>
    <p class="p_ancre">
        Je suis né le 31 juillet 1965 dans l'agglomération de Paris, en France. Mon nom complet est Jean Pierre Forteroche. J'ai commencé à écrire mon premier roman à l'âge de 25 ans.
    </p>
    <p class="p_ancre">
        C’est lors d’un voyage en train de Toulouse à Paris que me vient l'idée de mon premier roman à succès "La fin n'est que le début".
    </p>
    <p class="p_ancre">
        Je me tourne vers un public adulte à partir de 2012 en publiant le roman social "Demain est déjà là", puis en entamant une série policière l'année suivante.
    </p>
    <p class="p_ancre">
        Aujourd'hui, je souhaite me lancer dans une nouveau défi, une nouvelle manière d'écrire et de transmettre. C'est pourquoi mon nouveau livre "Billet simple pour l'Alaska" sera diffusé sur ce site chapitre par chapitre. Votre avis compte afin d'écrire un livre non pas seul mais tous ensemble !
    </p>
</section>

<?php
include __DIR__ . "/footer.php";
