<?php
$titlePage = "Livre";
$titleSocialNetworks = "Billet simple pour l'Alaska - Livre";
$bodyPage = "";

ob_start();
require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../../Model/TicketsManagerPDO.php";
require_once __DIR__ . "/../../Tickets/TicketsController.php";


$db = PDOFactory::getMysqlConnexion();
$tickets = new TicketsManagerPDO($db);
$ticketsController = new TicketsController("PDO", PDOFactory::getMysqlConnexion());
$insertTicket = $ticketsController->insertTicket();

$ticketList = $tickets->getList();
?>
 
<nav id="nav_book" class="main_nav">
  <?php include("menu.php"); ?>
</nav>
  
<div id="button_create"><a href="../../Tickets/Views/insertTicket.php"><button type="button" class="btn btn-primary">Créer un billet</button></a></div>


<?php

if (isset($_GET["id"])) {
?>

<section id="ticket_book">
<div class="link_back_book"><a href="<?= $_SERVER["HTTP_REFERER"]; ?>">Retour à la page précédente</a></div>

<?php
    $ticket = $tickets->getUnique((int) $_GET["id"]);

    echo "<h2>", $ticket->title(), "</h2>", "\n",
    "<p>", nl2br($ticket->content()), "</p>", "\n";

    if ($ticket->creationDate() != $ticket->modificationDate()) {
        echo "<p class='modification_date_book'>Modifié le ", $ticket->modificationDate()->format("d/m/Y à H\hi"), "</p>";
    }
    ?>
</section>

    <script src="/projet_4/Public/js/book.js"></script>
    <?php
} else {

    foreach ($ticketList as $ticket) {
        ?>

        <div class="tickets">
            <h1><a class="ticket_title" href="../../Tickets/Views/show.php?id=<?= $ticket->id() ?>"><?= $ticket->title() ?></a></h1>
            <p class="ticket_border"></p>
            <p class="ticket_content"><?= nl2br($ticket->content()) ?></p>
            <p>
                <?= ($ticket->creationDate() == $ticket->modificationDate() ? "Créé le " . $ticket->creationDate()->format('d/m/Y à H\hi') : "Modifié le " . $ticket->modificationDate()->format('d/m/Y à H\hi')) ?>
                <a href="../../Tickets/Views/insertTicket.php?modifier=<?= $ticket->id() ?>">Modifier</a> | <a href="?supprimer=<?= $ticket->id() ?>">Supprimer</a>
            </p>
        </div><br>

    <?php
    }
}

$contentPage = ob_get_clean();

require("../../../Templates/layout.php");
?>