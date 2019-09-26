<?php
session_start();
$titlePage = "Chapitre";
$titleSocialNetworks = "Billet simple pour l'Alaska - Chapitre";
$bodyPage = "";

require_once __DIR__ . "/../../Controller/pageController.php";
include __DIR__ . "/../../Controller/variableController.php";
require_once __DIR__ . "/../../page.php";

if (isset($_GET["id"])) {
    $ticketUnique = $tickets->getUnique(htmlspecialchars($_GET["id"]));
}
?>

<nav id="nav_show_ticket" class="nav_pages">
    <?php include "../Pages/menu.php"; ?>
</nav>

<p id="link_show_ticket"><a href="../Pages/book.php">Retour aux chapitres</a></p>

<?php
if (isset($ticketUnique)) {
    ?>
<div id="show_ticket">
    <h1><?= $ticketUnique->title() ?></h1>
    <p><?= nl2br($ticketUnique->content()) ?></p>
    <p class="date_ticket_show"><?= ($ticketUnique->creationDate() == $ticketUnique->modificationDate() ? "Publié le " . $ticketUnique->creationDate()->format("d/m/Y à H\hi") : "Publié le " . $ticketUnique->creationDate()->format("d/m/Y à H\hi") . " | Modifié le " . $ticketUnique->modificationDate()->format("d/m/Y à H\hi")) ?>

</div>
    <?php
}
?>

<h2 id="h2_show_ticket" class="text-center">Commentaires</h2>

<?php include "../Comments/commentForm.php" ?>

<div class="container">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-9 col-xs-offset-1 col-xs-10">
            <form id="form_show_ticket" method="post" action="../../Controller/CommentsController.php?idTicket=<?= htmlspecialchars($_GET["id"]) ?>">
                <p>
                    <input class="input_form_comment" type="text" name="pseudo" id="pseudo" <?php
                    if (isset($_SESSION["login"])) {
                        echo "value=" . $_SESSION["login"];
                    } else {
                        echo "placeholder=Pseudo";
                    }
                    ?>
                    >
                </p>
                <p>
                    <textarea class="textarea_form_comment" rows="10" cols="30" name="message" id="message" placeholder="Commentaire"></textarea>
                </p>
                <input type="submit" id="btn_send_comment" class="btn btn-primary" value="Envoyer">
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="../../Public/css/style.css">

<?php
include "../Pages/footer.php";
