<ul class="nav_ul">
    <li class="main_menu"><a class="link_menu" href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
    <li class="main_menu"><a class="link_menu" href="book.php"><i class="fas fa-book-open"></i> Livre</a></li>
    <li id="administration" class="main_menu"><a class="link_menu" href="#"><i class="fas fa-user"></i> Non connecté</a>
       	<ul id="sub_menu_administration">
       		<li><a href="#" class="link_menu" onclick="form.openFormConnection()">Connexion</a></li>
       		<li><a href="#" class="link_menu" onclick="form.openFormRegistration()">Inscription</a></li>
       	</ul>
    </li>
</ul>


<?php //include("form.php"); ?>

<script src="../../../../../Web/js/index.js"></script>