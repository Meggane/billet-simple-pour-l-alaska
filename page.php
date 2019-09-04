<?php

ob_start();

$contentPage = ob_get_clean();

require_once __DIR__ . "/App/Frontend/Templates/layout.php";