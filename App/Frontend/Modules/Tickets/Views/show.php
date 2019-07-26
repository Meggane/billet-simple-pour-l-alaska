<?php
session_start();
require_once __DIR__ . "/../../../../../Model/TicketsManagerPDO.php";
require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/CommentsManagerPDO.php";
require_once __DIR__ . "/../TicketsController.php";

$db = PDOFactory::getMySqlConnexion();
$comments = new CommentsManagerPDO($db);
$tickets = new TicketsManagerPDO($db);
if (isset($_GET["id"])) {
    $ticketUnique = $tickets->getUnique($_GET["id"]);
}

?>

<link rel="stylesheet" type="text/css" href="../../../../../Public/css/style.css">

<nav class="nav_pages">
    <?php include "../../Pages/Views/menu.php"; ?>
</nav>

<p id="link_show_ticket"><a href="../../Pages/Views/book.php">Retour aux chapitres</a></p>

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

<?php include "../../Comments/Views/commentForm.php" ?>

<form id="form_show_ticket" method="post" action="../../Comments/Views/insertComment.php?id=<?= $_GET["id"] ?>">
    <p>
        <input class="input_form_comment" type="text" name="pseudo" id="pseudo" <?php
        if (isset($_SESSION["login"])) {
            echo "value=" . $_SESSION["login"];
        }
        ?>
        >
    </p>
    <p>
        <textarea class="textarea_form_comment" rows="10" cols="30" name="message" id="message"></textarea>
    </p>
    <input type="submit" class="btn btn-primary" value="Envoyer">
</form>

<script src="../../../../../Public/js/timestamp.js"></script>
