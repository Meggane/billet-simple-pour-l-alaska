<?php
require_once "TicketsManager.php";

class TicketsManagerPDO extends TicketsManager {
	protected $db;

	public function __construct(PDO $db) {
		$this->db = $db;
	}

	protected function add(Tickets $ticket) {
		$req = $this->db->prepare("INSERT INTO tickets(title, content, creationDate, modificationDate) VALUES (:title, :content, NOW(), NOW())");

		$req->bindValue(":title", $ticket->title());
		$req->bindValue(":content", $ticket->content());

		$req->execute();
	}

	public function count() {
		return $this->db->query("SELECT COUNT(*) FROM tickets")->fetchColumn();
	}

	public function delete($id) {
		$this->db->exec("DELETE FROM tickets WHERE id = " . (int) $id);
	}

	public function getList() {
		$sql = "SELECT id, title, content, creationDate, modificationDate FROM tickets ORDER BY id DESC";

		$req = $this->db->query($sql);
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Tickets");

		$ticketList = $req->fetchAll();

		foreach ($ticketList as $ticket) {
			$ticket->setCreationDate(new DateTime($ticket->creationDate()));
			$ticket->setModificationDate(new DateTime($ticket->modificationDate()));
		}

		$req->closeCursor();

		return $ticketList;
	}

	public function getUnique($id) {
		$req = $this->db->prepare("SELECT id, title, content, creationDate, modificationDate FROM tickets WHERE id = :id");

		$req->bindValue(":id", (int) $id, PDO::PARAM_INT);
		$req->execute();

		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Tickets");

		$ticket = $req->fetch();

		$ticket->setCreationDate(new DateTime($ticket->creationDate()));
		$ticket->setModificationDate(new DateTime($ticket->modificationDate()));

		return $ticket;
	}

	protected function update(Tickets $ticket) {
		$req = $this->db->prepare("UPDATE tickets SET title = :title, content = :content, modificationDate = NOW() WHERE id = :id");

		$req->bindValue(":title", $ticket->title());
		$req->bindValue(":content", $ticket->content());
		$req->bindValue(":id", $ticket->id(), PDO::PARAM_INT);

		$req->execute();
	}
}