<?php
require_once __DIR__ . "/../../../../../Model/TicketsManagerPDO.php";
require_once __DIR__ . "/../../../../../Model/PDOFactory.php";

$titlePage = "Chapitre";
$titleSocialNetworks = "Billet simple pour l'Alaska - Chapitre";
$bodyPage = "";

ob_start();

$db = PDOFactory::getMySqlConnexion();
$tickets = new TicketsManagerPDO($db);
$ticketUnique = $tickets->getUnique($_GET["id"]);
?>

<p><a href="../../Pages/Views/book.php">Retour aux chapitres</a></p>

<h1><?= $ticketUnique->title() ?></h1>
<p><?= nl2br($ticketUnique->content()) ?></p>
<p><?= ($ticketUnique->creationDate() == $ticketUnique->modificationDate() ? "Publié le " . $ticketUnique->creationDate()->format("d/m/Y à H\hi") : "Publié le " . $ticketUnique->creationDate()->format("d/m/Y à H\hi") . " | Modifié le " . $ticketUnique->modificationDate()->format("d/m/Y à H\hi")) ?>

<?php
$contentPage = ob_get_clean();

require("../../../Templates/layout.php");

