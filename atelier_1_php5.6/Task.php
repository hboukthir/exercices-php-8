<?php
class Task {
    private $id;
    private $description;
    private $status;

    public function __construct($id, $description, $status = 'incomplete') {
        $this->id = $id;
        $this->description = $description;
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        if ($status === 'complete' || $status === 'incomplete') {
            $this->status = $status;
        } else {
            trigger_error('Statut invalide. Utilisez "complete" ou "incomplete".', E_USER_WARNING);
        }
    }
}
?>
