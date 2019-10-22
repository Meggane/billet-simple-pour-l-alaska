<?php
abstract class BackController {
	protected $app = "",
              $db = "";

	public function __construct($app, $db) {
        $this->app = $app;
        $this->db = $db;
	}

    public function app() {
        return $this->app;
    }
}