<?php
session_start();
require_once __DIR__ . "/../../../../../Controller/pageController.php";

if (isset($_GET["id"])) {
    $ticketUnique = $tickets->getUnique(htmlspecialchars($_GET["id"]));
}

?>

    <head>
        <meta charset="utf-8">
        <title>Chapitre</title>
        <meta name="description" content="Découvrez le monde impitoyable de l'Alaska. «Quelqu'un m'a dit un jour que l'Alaska ne forgeait pas le caractère, elle le révélait». Un incroyable roman signé Jean Forteroche">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--OPEN GRAPH-->

        <meta property="og:title" content="Chapitre">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://php.meganeberthelot.fr/">
        <meta property="og:image" content="http://php.meganeberthelot.fr/Public/images/logo.jpg">
        <meta property="og:description" content="Découvrez le monde impitoyable de l'Alaska. «Quelqu'un m'a dit un jour que l'Alaska ne forgeait pas le caractère, elle le révélait». Un incroyable roman signé Jean Forteroche">
        <meta property="og:locale" content="fr_FR">
        <meta property="og:site_name" content="Billet simple pour l'Alaska">

        <!--TWITTER CARD-->

        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Chapitre">
        <meta name="twitter:site" content="@Billet simple pour l'Alaska">
        <meta name="twitter:description" content="Découvrez le monde impitoyable de l'Alaska. «Quelqu'un m'a dit un jour que l'Alaska ne forgeait pas le caractère, elle le révélait». Un incroyable roman signé Jean Forteroche">
        <meta name="twitter:image" content="http://php.meganeberthelot.fr/Public/images/logo.jpg">

        <link rel="icon" href="../../../../../Public/images/logo.jpg">
    </head>

    <nav id="nav_show_ticket" class="nav_pages">
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

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-9 col-xs-offset-1 col-xs-10">
                <form id="form_show_ticket" method="post" action="../../../../../Controller/CommentsController.php?idTicket=<?= htmlspecialchars($_GET["id"]) ?>">
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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../../../../Public/css/style.css">

    <script src="../../../../../Public/js/timestamp.js"></script>

<?php
include "../../Pages/Views/footer.php";
