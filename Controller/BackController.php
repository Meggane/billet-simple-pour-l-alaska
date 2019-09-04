<?php

abstract class BackController {
	protected $module = "",
              $view = "",
              $app = "",
              $name = "",
              $db = "",
              $managers = null;

	public function __construct($app, $db) {
        $this->app = $app;
        $this->db = $db;
        $this->name = "";
	}

    public function setModule($module) {
        if (!is_string($module) || empty($module)) {
            throw new \InvalidArgumentException("Le module doit être une chaîne de caractères valide");
        }

        $this->module = $module;
    }

    public function setView($view) {
        if (!is_string($view) || empty($view)) {
            throw new \InvalidArgumentException("La vue doit être une chaîne de caractères valide");
        }

        $this->view = $view;

        $this->page->setContentFile(__DIR__ . "/../../App/" . $this->app->name() . "/Modules/" . $this->module . "Views/" . $this->view . ".php");
    }

    public function app() {
        return $this->app;
    }

    public function name()
    {
        return $this->name;
    }
}