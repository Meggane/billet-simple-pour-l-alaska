<?php

require_once "Entity.php";

class Reports extends Entity {
    protected $idComment,
              $pseudo,
              $message,
              $reportingDate;

    const INVALID_PSEUDO = 1;
    const INVALID_MESSAGE = 2;

    public function isValid() {
        return !(empty($this->pseudo) || empty($this->message) || empty($this->idComment));
    }

    public function setIdComment($idComment) {
        $this->idComment = (int) $idComment;
    }

    public function setPseudo($pseudo) {
        if (!is_string($pseudo) || empty($pseudo)) {
            $this->errors[] = self::INVALID_PSEUDO;
        }

        $this->pseudo = $pseudo;
    }

    public function setMessage($message) {
        if (!is_string($message) || empty($message)) {
            $this->errors[] = self::INVALID_MESSAGE;
        }

        $this->message = $message;
    }

    public function setReportingDate(Datetime $reportingDate) {
        $this->reportingDate = $reportingDate;
    }

    public function idComment() {
        return $this->idComment;
    }

    public function pseudo() {
        return $this->pseudo;
    }

    public function message() {
        return $this->message;
    }

    public function reportingDate() {
        return $this->reportingDate;
    }
}