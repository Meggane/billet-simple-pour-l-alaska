<?php
require_once "Entity.php";

class Comment extends Entity {
	protected $idTickets,
			  $pseudo,
			  $message,
			  $publicationDate;

	const INVALID_PSEUDO = 1;
	const INVALID_MESSAGE = 2;

	public function isValid() {
		return !(empty($this->pseudo) || empty($this->message) || empty($this->idTickets));
	}

	public function setIdTickets($idTickets) {
		$this->idTickets = (int) $idTickets;
	}

	public function setPseudo($pseudo) {
		if (!is_string($pseudo) || empty($pseudo)) {
			$this->errors[] = self::INVALID_PSEUDO;
		}

		$this->pseudo = $pseudo;
	}

	public function setMessage($message) {
		if (!is_string($message) || empty($message)) {
			$this->errors[] = self::INVALID_MESSAGE;
		}

		$this->message = $message;
	}

	public function setPublicationDate(Datetime $publicationDate) {
		$this->publicationDate = $publicationDate;
	}

	public function idTickets() {
		return $this->idTickets;
	}

	public function pseudo() {
		return $this->pseudo;
	}

	public function message() {
		return $this->message;
	}

	public function publicationDate() {
		return $this->publicationDate;
	}
}