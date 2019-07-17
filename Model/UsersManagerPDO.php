<?php

require_once __DIR__ . "/UsersManager.php";

class UsersManagerPDO extends UsersManager {
	protected function add(Users $users) {
		$q = $this->dao->prepare("INSERT INTO users SET login = :login, password = :password, email = :email, admin = false");
		
		$q->bindValue(":login", $users->login());
		$q->bindValue(":password", $users->password());
		$q->bindValue(":email", $users->email());

		$q->execute();

		$users->setId($this->dao->lastInsertId());
	}

	public function delete($id) {
		$this->dao->exec("DELETE FROM users WHERE id = " . (int) $id);
	}

	public function get($id) {
		$q = $this->dao->prepare("SELECT id, login, password, email FROM users WHERE id = :id");

        $q->bindValue(":id", (int) $id, PDO::PARAM_INT);
		$q->execute();

		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Users");

		return $q->fetch();
	}

	protected function modify(Users $users) {
		$q = $this->dao->prepare("UPDATE users SET login = :login, password = :password, email = :email WHERE id = :id");

		$q->bindValue(":login", $users->login());
		$q->bindValue(":password", $users->password());
		$q->bindValue(":email", $users->email());
		$q->bindValue(":id", $users->id(), PDO::PARAM_INT);
		
		$q->execute();
	}
}