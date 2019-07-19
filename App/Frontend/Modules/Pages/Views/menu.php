<ul class="nav_ul">
    <li class="main_menu"><a class="link_menu" href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
    <li class="main_menu"><a class="link_menu" href="book.php"><i class="fas fa-book-open"></i> Livre</a></li>

    <?php
    require_once __DIR__ . "/../../../../../Model/PDOFactory.php";
    require_once __DIR__ . "/../../../../../Model/UsersManagerPDO.php";

    $db = PDOFactory::getMysqlConnexion();
    $userPDO = new UsersManagerPDO($db);


    if (isset($_SESSION["login"])) {
        $user = $userPDO->get($_SESSION["id"]);
        $_SESSION['login'] = $user->login();
    ?>
    <li id="administration" class="main_menu"><a class="link_menu" href="#" onclick="menuAdministration.openSubMenuAdministration()"><i class="fas fa-user"></i> <?= $_SESSION["login"] ?></a>
        <ul id="sub_menu_administration">
            <li><a href="infoUser.php" class="link_menu">Mes informations</a></li>
            <li><a href="../../../../Backend/Modules/Connexion/Views/deconnexion.php" class="link_menu">Déconnexion</a></li>
        </ul>
    </li>

    <?php
    } else {
    ?>
    <li id="administration" class="main_menu" onclick="menuAdministration.openSubMenuAdministration()"><a class="link_menu" href="#"><i class="fas fa-user"></i> Non connecté</a>
        <ul id="sub_menu_administration">
            <li><a href="#" class="link_menu" onclick="form.openFormConnexion()">Connexion</a></li>
            <li><a href="#" class="link_menu" onclick="form.openFormRegistration()">Inscription</a></li>
        </ul>
    </li>
    <?php
    }
    ?>

</ul>


<?php include("form.php"); ?>

<script src="../../../../../Public/js/index.js"></script>