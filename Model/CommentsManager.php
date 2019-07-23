<?php

require_once "Manager.php";
require_once "Comment.php";

abstract class CommentsManager extends Manager {
	abstract protected function add(Comment $comment);

	abstract public function delete($id);

	abstract public function deleteFromTickets($idTickets);

	public function save(Comment $comment) {
		if ($comment->isValid()) {
			$comment->isNew() ? $this->add($comment) : $this->modify($comment);
		} else {
			throw new RuntimeException("The comment must be valid");
		}
	}

	// recover the liste of comment
	abstract public function getList($idTickets);


	// recover comment specific of the list
	abstract public function get($id);

	abstract protected function modify(Comment $comment);

	abstract public function count($idTickets);
}