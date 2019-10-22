<?php
require_once "Tickets.php";
require_once "Manager.php";

abstract class TicketsManager extends Manager {

	abstract protected function add(Tickets $ticket);

	abstract public function count();

	abstract public function delete($id);

	abstract public function getList();

	abstract public function getUnique($id);

	public function save(Tickets $ticket) {
		if ($ticket->isValid()) {
			$ticket->isNew() ? $this->add($ticket) : $this->update($ticket);
		} else {
			throw new RuntimeException("The ticket must be valid to be saved");
		}
	}

	abstract protected function update(Tickets $ticket);

}