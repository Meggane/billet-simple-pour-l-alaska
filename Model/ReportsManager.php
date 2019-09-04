<?php

require_once "Manager.php";
require_once "Reports.php";

abstract class ReportsManager extends Manager {
    abstract protected function add(Reports $reports);

    abstract public function delete($id);

    abstract public function deleteFromComment($idComment);

    abstract public function deleteFromTickets($idTickets);

    public function save(Reports $reports) {
        if ($reports->isValid()) {
            $reports->isNew() ? $this->add($reports) : $this->modify($reports);
        } else {
            throw new RuntimeException("The reports must be valid");
        }
    }

    abstract public function getList($idComment);

    abstract public function get($id);

    abstract public function getAll();

    abstract protected function modify(Reports $reports);

    abstract public function count($idComment);
}