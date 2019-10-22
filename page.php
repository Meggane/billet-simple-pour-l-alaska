<?php
ob_start();
$contentPage = ob_get_clean();
require_once __DIR__ . "/Views/Templates/layout.php";