<?php

require_once "Hydrator.php";

abstract class Entity {

	use Hydrator;

	protected $errors = [],
			  $id;

	public function __construct(array $data = []) {
		if (!empty($data)) {
			$this->hydrate($data);
		}
	}

	public function isNew() {
		return empty($this->id);
	}

	public function errors() {
		return $this->errors;
	}

	public function id() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = (int) $id;
	}
}