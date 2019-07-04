<?php

class PDOFactory {
	public static function getMysqlConnexion() {
		$db = new PDO("mysql:host=localhost;dbname=billet_simple_pour_l_alaska", "root", "");
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $db;
	}
}