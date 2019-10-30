<?php
require_once "CommentsManager.php";

class CommentsManagerPDO extends CommentsManager {
	protected function add(Comment $comment) {
		$q = $this->dao->prepare("INSERT INTO comments SET idTickets = :idTickets, pseudo = :pseudo, message = :message, publicationDate = NOW()");

		$q->bindValue(":idTickets", $comment->idTickets(), PDO::PARAM_INT);
		$q->bindValue(":pseudo", $comment->pseudo());
		$q->bindValue(":message", $comment->message());

		$q->execute();

		$comment->setId($this->dao->lastInsertId());
	}

	public function delete($id) {
		$this->dao->exec("DELETE FROM comments WHERE id = " . (int) $id);
	}

	public function deleteFromTickets($idTickets) {
		$this->dao->exec("DELETE FROM comments WHERE idTickets = " . (int) $idTickets);
	}

	public function getList($idTickets) {
		$q = $this->dao->prepare("SELECT id, idTickets, pseudo, message, publicationDate FROM comments WHERE idTickets = " . (int) $idTickets . " ORDER BY id DESC");
		$q->execute();

		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comment");

		$comments = $q->fetchAll();

		foreach ($comments as $comment) {
			$comment->setPublicationDate(new DateTime($comment->publicationDate()));
		}

		return $comments;
	}

	public function get($id) {
		$q = $this->dao->prepare("SELECT id, idTickets, pseudo, message, publicationDate FROM comments WHERE id = " . (int) $id);
		$q->execute();

		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comment");

		$comment = $q->fetch();

        $comment->setPublicationDate(new DateTime($comment->publicationDate()));

		return $comment;
	}

    protected function modify(Comment $comment) {
		$q = $this->dao->prepare("UPDATE comments SET pseudo = :pseudo, message = :message WHERE id = :id");

		$q->bindValue(":pseudo", $comment->pseudo());
		$q->bindValue(":message", $comment->message());
		$q->bindValue(":id", $comment->id(), PDO::PARAM_INT);
		
		$q->execute();
	}

	public function count($idTickets) {
        return $this->dao->query("SELECT COUNT(*) FROM comments WHERE idTickets = " . $idTickets)->fetchColumn();
    }
}