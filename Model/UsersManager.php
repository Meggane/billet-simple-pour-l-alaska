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

	abstract public function get($id);

	abstract protected function modify(Users $users);
}