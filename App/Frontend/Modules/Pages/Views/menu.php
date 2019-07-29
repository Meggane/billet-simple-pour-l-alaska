<ul class="nav_ul">
    <li class="main_menu"><a class="link_menu" href="../../../../Frontend/Modules/Pages/Views/index.php"><i class="fas fa-home"></i> Accueil</a></li>
    <li class="main_menu"><a class="link_menu" href="../../../../Frontend/Modules/Pages/Views/book.php"><i class="fas fa-book-open"></i> Livre</a></li>

    <?php
    require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
    require_once __DIR__ . "/../../../../../Model/UsersManagerPDO.php";

    $db = PDOFactory::getMysqlConnexion();
    $userPDO = new UsersManagerPDO($db);


    if (isset($_SESSION["login"])) {
        $user = $userPDO->get($_SESSION["id"]);
        $_SESSION['login'] = $user->login();
    ?>

    <li class="main_menu"><a class="link_menu" href="../../../../Backend/Modules/Users/Views/infoUser.php"><i class="fas fa-user"></i> <?= $_SESSION["login"] ?></a></li>
    <li class="main_menu"><a href="../../../../Backend/Modules/Connexion/Views/deconnexion.php" class="link_menu"><i class="fas fa-sign-in-alt"></i> Déconnexion</a></li>
    <?php
    } else {
    ?>

    <li class="main_menu" onclick="form.openFormConnexion()"><a class="link_menu" href="#"><i class="fas fa-user"></i> Connexion</a></li>
    <?php
    }
    ?>
</ul>

<?php include("form.php"); ?>