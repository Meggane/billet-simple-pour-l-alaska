<?php

require_once  __DIR__ . "/../../../../Model/PDOFactory.php";
require_once __DIR__ . "/../../../../Model/UsersManagerPDO.php";

class UsersController {
	protected $api = null,
        $dao = null,
        $managers = [];

    public function __construct($api, $dao) {
        $this->api = $api;
        $this->dao = $dao;
    }

	public function deleteUser() {
        $db = PDOFactory::getMySqlConnexion();
        $manager = new UsersManagerPDO($db);

        if (isset($_GET["delete-user"])) {
            session_destroy();
            $manager->delete((int) $_GET["delete-user"]);
            header("Location: ../../../../Frontend/Modules/Pages/Views/index.php");
        }
    }
}

$usersController = new usersController("PDO", PDOFactory::getMysqlConnexion());
$deleteUser = $usersController->deleteUser();