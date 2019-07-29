<?php
ob_start();
session_start();

if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
    $titlePage = "Créer un billet";
    $titleSocialNetworks = "Billet simple pour l'Alaska - Créer un billet";
    $bodyPage = "body_insert_ticket";

    require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
    require_once __DIR__ . "/../../../../../Model/TicketsManagerPDO.php";
    require_once __DIR__ . "/../TicketsController.php";
    $db = PDOFactory::getMysqlConnexion();
    $tickets = new TicketsManagerPDO($db);

    if (isset($_GET["id"])) {
        $ticket = $tickets->getUnique($_GET["id"]);
    }

    ?>

    <nav class="nav_pages">
        <?php include "../../Pages/Views/menu.php"; ?>
    </nav>

    <div id="section_insert_ticket">
        <p><a class="link_insert_ticket" href="<?= (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "../../Pages/Views/index.php") ?>">Revenir à la page précédente</a></p>

        <form action="insertTicket.php" method="post">
            <p id="form_insert_ticket">
              
                <script type="text/javascript" src="../../../../../Public/tinymce/js/tinymce/tinymce.js"></script>
                <script type="text/javascript">
                    tinyMCE.init({
                        mode: "exact",
                        elements: "content_insert_ticket",
                        plugins: [
                            "advlist autolink lists link image charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table paste imagetools wordcount"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                        content_css: [
                            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                            '//www.tiny.cloud/css/codepen.min.css'
                        ],

                        automatic_uploads: true,
                        images_upload_url: 'postAcceptor.php',
                    });
                </script>

                <input type="text" name="title" id="title_insert_ticket" placeholder="Titre du billet"
                       value="<?php if (isset($ticket)) echo $ticket->title(); ?>">
                <textarea id="content_insert_ticket" name="content"><?php if (isset($ticket)) echo $ticket->content(); ?></textarea><br>


                <?php
                if (isset($ticket) && !$ticket->isNew()) {
                    ?>
                    <input type="hidden" name="id" value="<?= $ticket->id() ?>"/>
                    <input type="submit" class="btn-primary" value="Modifier" name="modifier" id="btn_modifier"/>
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
    header("Location: ../../../../../Errors/permission.html");
}

$contentPage = ob_get_clean();

require "../../../Templates/layout.php";