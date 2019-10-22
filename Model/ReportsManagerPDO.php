<?php
require_once "ReportsManager.php";

class ReportsManagerPDO extends ReportsManager {
    protected function add(Reports $reports) {
        $q = $this->dao->prepare("INSERT INTO reports SET idComment = :idComment, idTickets = :idTickets, pseudo = :pseudo, message = :message, reportingDate = NOW()");

        $q->bindValue(":idComment", $reports->idComment(), PDO::PARAM_INT);
        $q->bindValue(":idTickets", $reports->idTickets(), PDO::PARAM_INT);
        $q->bindValue(":pseudo", $reports->pseudo());
        $q->bindValue(":message", $reports->message());

        $q->execute();

        $reports->setId($this->dao->lastInsertId());
    }

    public function delete($id) {
        $this->dao->exec("DELETE FROM reports WHERE id = " . (int) $id);
    }

    public function deleteFromComment($idComment) {
        $this->dao->exec("DELETE FROM reports WHERE idComment = " . (int) $idComment);
    }

    public function deleteFromTickets($idTickets) {
        $this->dao->exec("DELETE FROM reports WHERE idTickets = " . (int) $idTickets);
    }

    public function getList($idComment) {
        $q = $this->dao->prepare("SELECT id, idComment, idTickets, pseudo, message, reportingDate FROM reports WHERE idComment = " . (int) $idComment . " ORDER BY id DESC");
        $q->execute();

        $q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reports");

        $reports = $q->fetchAll();

        foreach ($reports as $report) {
            $report->setReportingDate(new DateTime($report->reportingDate()));
        }

        return $reports;
    }

    public function get($id) {
        $q = $this->dao->prepare("SELECT id, idComment, idTickets, pseudo, message, reportingDate FROM reports WHERE id = " . (int) $id);
        $q->execute();

        $q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reports");

        return $q->fetch();
    }

    public function getAll() {
        $req = $this->dao->query("SELECT id, idComment, idTickets, pseudo, message, reportingDate FROM reports ORDER BY id DESC");

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reports");

        $reportList = $req->fetchAll();

        foreach ($reportList as $report) {
            $report->setReportingDate(new DateTime($report->reportingDate()));
        }

        $req->closeCursor();

        return $reportList;
    }

    protected function modify(Reports $reports) {
        $q = $this->dao->prepare("UPDATE reports SET pseudo = :pseudo, message = :message WHERE id = :id");

        $q->bindValue(":pseudo", $reports->pseudo());
        $q->bindValue(":message", $reports->message());
        $q->bindValue(":id", $reports->id(), PDO::PARAM_INT);

        $q->execute();
    }

    public function count($idComment) {
        return $this->dao->query("SELECT COUNT(*) FROM reports WHERE idComment = " . $idComment)->fetchColumn();
    }
}