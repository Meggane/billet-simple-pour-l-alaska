<?php
session_start();
session_destroy();

$previousPage = $_SERVER["HTTP_REFERER"];

header("Location: ../../../../Frontend/Modules/Pages/Views/index.php");
exit();