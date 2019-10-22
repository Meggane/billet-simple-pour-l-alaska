<?php
require_once __DIR__ . "/Entity.php";

class Users extends Entity {
	protected $login,
			  $password,
			  $email,
              $admin;

	const INVALID_LOGIN = 1;
	const INVALID_PASSWORD = 2;
	const INVALID_EMAIL = 3;

	public function isValid() {
		return !(empty($this->login) || empty($this->password) || empty($this->email));
	}

	public function setLogin($login) {
		if (!is_string($login) || empty($login)) {
			$this->errors[] = self::INVALID_LOGIN;
		}

		$this->login = $login;
	}

	public function setPassword($password) {
		if (!password_verify($this->password, password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT)) || empty($this->password)) {
			$this->errors[] = self::INVALID_PASSWORD;
		}

		$this->password = $password;
	}

	public function setEmail($email) {
		if (!filter_var($this->email) || empty($this->email)) {
			$this->errors[] = self::INVALID_EMAIL;
		}

		$this->email = $email;
	}

	public function setAdmin($admin) {
	    $this->admin = (bool) $admin;
    }

	public function login() {
		return $this->login;
	}

	public function password() {
		return $this->password;
	}

	public function email() {
		return $this->email;
	}

	public function admin() {
	    return $this->admin;
    }
}