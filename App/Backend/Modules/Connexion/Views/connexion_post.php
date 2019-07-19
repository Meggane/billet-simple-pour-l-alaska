<?php

require_once __DIR__ . "/../../../../../Model/PDOFactory.php";

$bdd = PDOFactory::getMySqlConnexion();

if (empty($_POST['login']) || empty($_POST['password'])) {
    $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
} else {
    $query=$bdd->prepare('SELECT password, id, login, email, admin FROM users WHERE login = :login');
    $query->bindValue(':login',$_POST['login'], PDO::PARAM_STR);
    $query->execute();
    $data=$query->fetch();

    if (isset($_POST["password"]) && password_verify($_POST['password'], $data['password'])) {
        session_start();
        $_SESSION["login"] = $data["login"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["id"] = $data["id"];
        $_SESSION["admin"] = $data["admin"];
        $previousPage = $_SERVER["HTTP_REFERER"];
        header("Location: $previousPage");
    } else {
        $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d accueil</p>';
    }

    $query->CloseCursor();
}
?>

</body>
</html>