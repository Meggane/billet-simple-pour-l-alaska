<?php

require_once "Entity.php";

class Tickets extends Entity {
	protected $title,
			  $content,
			  $creationDate,
			  $modificationDate;

	const TITLE_INVALIDE = 1;
	const CONTENT_INVALIDE = 2;

	public function isValid() {
		return !(empty($this->title) || empty($this->content));
	}


	// SETTERS

	public function setTitle($title) {
		if (!is_string($title) || empty($title)) {
			$this->errors[] = self::TITLE_INVALIDE;
		} else {
			$this->title = $title;
		}
	}

	public function setContent($content) {
		if (!is_string($content) || empty($content)) {
			$this->errors[] = self::CONTENT_INVALIDE;
		} else {
			$this->content = $content;
		}
	}

	public function setCreationDate(DateTime $creationDate) {
		$this->creationDate = $creationDate;
	}

	public function setModificationDate(DateTime $modificationDate) {
		$this->modificationDate = $modificationDate;
	}


	// GETTERS

	public function title() {
		return $this->title;
	}

	public function content() {
		return $this->content;
	}

	public function creationDate() {
		return $this->creationDate;
	}

	public function modificationDate() {
		return $this->modificationDate;
	}
}