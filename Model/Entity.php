<?php

abstract class Entity {
	protected $errors = [],
			  $id;

	public function __construct(array $data = []) {
		if (!empty($data)) {
			$this->hydrate($data);
		}
	}

    public function hydrate($data) {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);

            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
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