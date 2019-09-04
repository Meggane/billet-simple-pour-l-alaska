<?php
session_start();
session_destroy();

header("Location: ../../../../Frontend/Modules/Pages/Views/index.php");
exit();