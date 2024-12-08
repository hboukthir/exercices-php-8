<?php
declare(strict_types=1);

include 'Task.php';
include 'TaskManager.php';

try {
    $taskManager = new TaskManager();
    $taskManager->addTask("Acheter du pain");
    $taskManager->addTask("Faire les courses");

    $tasks = $taskManager->getTasks();

    echo "<h1>Liste des Tâches</h1>";
    foreach ($tasks as $task) {
        echo "Tâche: " . $task->getDescription() . " - Statut: " . $task->getStatus() . "<br>";
    }

} catch (InvalidArgumentException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
