<?php
declare(strict_types=1);

class TaskManager {
    private array $tasks = [];

    public function addTask(string $description): void {
        $id = count($this->tasks) + 1;
        $task = new Task($id, $description);
        $this->tasks[] = $task;
    }

    public function removeTask(int $id): void {
        $found = false;
        foreach ($this->tasks as $key => $task) {
            if ($task->getId() === $id) {
                unset($this->tasks[$key]);
                $found = true;
                break;
            }
        }
        if (!$found) {
            throw new InvalidArgumentException('Tâche non trouvée.');
        }
    }

    public function getTasks(): array {
        return $this->tasks;
    }
}
?>
