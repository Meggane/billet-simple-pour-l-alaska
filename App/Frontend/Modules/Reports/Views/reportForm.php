<div id="form_report">
    <h3>Signaler ce commentaire</h3>
    <form method="post" action="../../../../../Controller/ReportsController.php?idComment=<?= $comment->id() ?>">
        <label for="pseudo">
            <input class="input_pseudo_report" type="text" id="pseudo" name="pseudo" <?php
            if (isset($_SESSION["login"])) {
                echo "value=" . $_SESSION["login"];
            } else {
                echo 'placeholder="Veuillez indiquer votre nom"';
            }
            ?>
            >
        </label>
        <label for="message">
            <textarea rows="15" cols="70" id="message" name="message"></textarea>
        </label>
        <input id="submit_report_form" type="submit" class="btn-primary" value="Envoyer">
    </form>
    <p>* Nous vous rappelons que tout signalement d'un contenu inapproprié doit être dument renseigné et engage votre responsabilité en cas d'utilisation abusive.</p>
</div>