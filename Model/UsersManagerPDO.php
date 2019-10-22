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

	public function get($login) {
		$q = $this->dao->prepare("SELECT id, login, password, email, admin FROM users WHERE login = :login");

        $q->bindValue(":login", $login);
		$q->execute();

		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Users");

		return $q->fetch();
	}

    public function getAllEmail($email) {
        $q = $this->dao->prepare("SELECT email FROM users WHERE email = :email");

        $q->bindValue(":email", $email);
        $q->execute();

        $q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Users");

        return $q->fetch();
    }

    public function modify(Users $users)
    {
        $q = $this->dao->prepare("UPDATE users SET login = :login, password = :password, email = :email WHERE id = :id");

        $q->bindValue(":login", $users->login());
        $q->bindValue(":password", $users->password());
        $q->bindValue(":email", $users->email());
        $q->bindValue(":id", $users->id(), PDO::PARAM_INT);

        $q->execute();
    }

    public function updatePassword($id) {
        $passwordCrypt = password_hash(htmlspecialchars($_POST["password_infoUser"]), PASSWORD_DEFAULT);

		$q = $this->dao->prepare("UPDATE users SET password = :password WHERE id = " . (int) $id);
		$q->bindValue(":password", $passwordCrypt);
		$q->execute();
	}
}