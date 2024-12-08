<?php
class TaskManager {
    private $tasks = [];

    public function addTask($description) {
        $id = count($this->tasks) + 1;
        $task = new Task($id, $description);
        $this->tasks[] = $task;
    }

    public function removeTask($id) {
        foreach ($this->tasks as $key => $task) {
            if ($task->getId() == $id) {
                unset($this->tasks[$key]);
                return;
            }
        }
        trigger_error('Tâche non trouvée.', E_USER_WARNING);
    }

    public function getTasks() {
        return $this->tasks;
    }
}
?>
