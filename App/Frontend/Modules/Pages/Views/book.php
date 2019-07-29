<?php
session_start();

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

<nav class="nav_pages">
    <?php include "menu.php"; ?>
</nav>

<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
    ?>

    <div id="button_create"><a href="../../Tickets/Views/insertTicket.php"><button type="button" class="btn btn-primary">Créer un billet</button></a></div>

    <?php
}
?>


<?php

if (isset($_GET["id"])) {
    ?>

    <section id="ticket_book">

        <?php
        $ticket = $tickets->getUnique((int) $_GET["id"]);

        echo "<h2>", $ticket->title(), "</h2>", "\n",
        "<p>", nl2br($ticket->content()), "</p>", "\n";

        if ($ticket->creationDate() != $ticket->modificationDate()) {
            echo "<p class='modification_date_book'>Modifié le ", $ticket->modificationDate()->format("d/m/Y à H\hi"), "</p>";
        }
        ?>
    </section>

    <?php
} else {

    foreach ($ticketList as $ticket) {
        ?>

        <div class="tickets">
            <h1><a class="ticket_title" href="../../Tickets/Views/show.php?id=<?= $ticket->id() ?>"><?= $ticket->title() ?></a></h1>
            <p class="ticket_border"></p>
            <p class="ticket_content"><?= nl2br($ticket->content()) ?></p>
            <p>
                <?= ($ticket->creationDate() == $ticket->modificationDate() ? "Publié le " . $ticket->creationDate()->format('d/m/Y à H\hi') : "Publié le " . $ticket->creationDate()->format('d/m/Y à H\hi') . " | Modifié le " . $ticket->modificationDate()->format('d/m/Y à H\hi'));

                if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
                    ?>
                    <a href="../../Tickets/Views/insertTicket.php?id=<?= $ticket->id() ?>">Modifier</a> | <a href="?supprimer=<?= $ticket->id() ?>">Supprimer</a>
                    <?php
                }
                ?>
            </p>
        </div><br>

        <?php
    }
}

include __DIR__ . "/footer.php";

$contentPage = ob_get_clean();
require __DIR__ . "/../../../Templates/layout.php"; ?>

