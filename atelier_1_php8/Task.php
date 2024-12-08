<?php
declare(strict_types=1);

class Task {
    public function __construct(
        private int $id,
        private string $description,
        private string $status = 'incomplete'
    ) {
        $this->setStatus($status);
    }

    public function getId(): int {
        return $this->id;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        if (!in_array($status, ['complete', 'incomplete'], true)) {
            throw new InvalidArgumentException('Statut invalide. Utilisez "complete" ou "incomplete".');
        }
        $this->status = $status;
    }
}
?>
