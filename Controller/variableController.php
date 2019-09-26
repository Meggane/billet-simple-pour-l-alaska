<?php

$db = PDOFactory::getMySqlConnexion();
$tickets = new TicketsManagerPDO($db);
$comments = new CommentsManagerPDO($db);
$reports = new ReportsManagerPDO($db);
$users = new UsersManagerPDO($db);