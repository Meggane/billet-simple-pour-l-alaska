<?php

require_once __DIR__ . "/Manager.php";
require_once __DIR__ . "/Users.php";

abstract class UsersManager extends Manager {
	abstract protected function add(Users $users);

	abstract public function delete($id);

	public function save(Users $users) {
		if ($users->isValid()) {
			$users->isNew() ? $this->add($users) : $this->modify($users);
		} else {
			throw new RuntimeException("The users must be valid");
		}
	}

	// recover comment specific of the list
	abstract public function get($login);

    abstract public function getAllEmail($email);

	abstract public function modify(Users $users);
}