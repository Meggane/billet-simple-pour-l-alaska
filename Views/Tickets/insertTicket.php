<?php
session_start();

if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
    $titlePage = "Créer un billet";
    $titleSocialNetworks = "Billet simple pour l'Alaska - Créer un billet";

    require_once __DIR__ . "/../../Controller/pageController.php";
    include __DIR__ . "/../../Controller/variableController.php";
    require_once __DIR__ . "/../../page.php";

    if (isset($_GET["id"])) {
        $ticket = $tickets->getUnique(htmlspecialchars($_GET["id"]));
    }
?>

    <nav class="nav_pages">
        <?php include "../Pages/menu.php"; ?>
    </nav>

    <div id="section_insert_ticket">
        <p><a class="link_insert_ticket" href="../Pages/book.php">Revenir à la page précédente</a></p>

        <form action="../../Controller/TicketsController.php" method="post">
            <p id="form_insert_ticket">
                <script type="text/javascript" src="../../Public/tinymce/js/tinymce/tinymce.js"></script>
                <script type="text/javascript" src="../../Public/js/tickets.js"></script>

                <input type="text" name="title" id="title_insert_ticket" placeholder="Titre du billet" value="<?php if (isset($ticket)) echo $ticket->title(); ?>">
                <textarea id="content_insert_ticket" name="content"><?php if (isset($ticket)) echo $ticket->content(); ?></textarea><br>

                <?php
                if (isset($ticket) && !$ticket->isNew()) {
                    ?>
                    <input type="hidden" name="id" value="<?= $ticket->id() ?>"/>
                    <input type="submit" class="btn btn-primary" value="Modifier" name="modifier" id="btn_modifier"/>
                    <?php
                } else {
                    ?>
                    <input type="submit" class="btn btn-primary" value="Valider">
                    <?php
                }
                ?>
            </p>
        </form>
    </div>

    <?php
} else {
    header("Location: ../../Errors/permission.html");
}