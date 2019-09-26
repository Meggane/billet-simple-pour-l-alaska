<ul id="mobile_menu" onclick="menu.openMenu()"><i id="mobile_menu_font_awesome" class="fas fa-bars"></i></ul>
    <ul id="nav_ul">
        <li class="main_menu"><a class="link_menu" href="../Pages/index.php"><i class="fas fa-home"></i> Accueil</a></li>
        <li class="main_menu"><a class="link_menu" href="../Pages/book.php"><i class="fas fa-book-open"></i> Livre</a></li>

        <?php
        require_once __DIR__ . "/../../Controller/pageController.php";
        include __DIR__ . "/../../Controller/variableController.php";

        if (isset($_SESSION["id"])) {
            $user = $users->get($_SESSION["login"]);
            $_SESSION['login'] = $user->login();
            $_SESSION['id'] = $user->id();
        ?>

        <li class="main_menu"><a class="link_menu" href="../Users/infoUser.php"><i class="fas fa-user"></i> <?= $_SESSION["login"] ?></a></li>

        <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) { ?>

        <li class="main_menu"><a href="../Reports/showReports.php" class="link_menu"><i class="fas fa-flag"></i> Signalements</a></li>

        <?php
         }
         ?>

        <li class="main_menu"><a href="../Connexion/deconnexion.php" class="link_menu"><i class="fas fa-sign-in-alt"></i> Déconnexion</a></li>

        <?php
        } else {
        ?>

        <li class="main_menu" onclick="form.openFormConnexion()"><a class="link_menu" href="#"><i class="fas fa-user"></i> Connexion</a></li>

        <?php
        }
        ?>

    </ul>

<?php include __DIR__ . "/form.php";