<?php
session_start();

$titlePage = "Livre";
$titleSocialNetworks = "Billet simple pour l'Alaska - Livre";
$bodyPage = "";

require_once __DIR__ . "/../../../../../Controller/pageController.php";
require_once __DIR__ . "/../../../../../page.php";

$ticketList = $tickets->getList();
?>

    <nav class="nav_pages">
        <?php include __DIR__ . "/menu.php"; ?>
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
        $ticket = $tickets->getUnique(htmlspecialchars((int) $_GET["id"]));

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
            <p class="link_ticket_admin">
                <?= ($ticket->creationDate() == $ticket->modificationDate() ? "Publié le " . $ticket->creationDate()->format('d/m/Y à H\hi') : "Publié le " . $ticket->creationDate()->format('d/m/Y à H\hi') . " | Modifié le " . $ticket->modificationDate()->format('d/m/Y à H\hi'));

                if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
                    ?>
                    <a id="btn_modify_book" class="btn btn-primary" href="../../Tickets/Views/insertTicket.php?id=<?= $ticket->id() ?>">Modifier</a>
                    <a id="btn_remove_book" class="btn btn-danger" href="?supprimer=<?= $ticket->id() ?>">Supprimer</a>
                    <?php
                }
                ?>
            </p>
        </div><br>

        <?php
    }
}

include __DIR__ . "/footer.php";