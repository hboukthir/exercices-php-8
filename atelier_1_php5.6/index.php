<?php
include 'Task.php';
include 'TaskManager.php';

$taskManager = new TaskManager();
$taskManager->addTask("Acheter du pain");
$taskManager->addTask("Faire les courses");

$tasks = $taskManager->getTasks();

echo "<h1>Liste des Tâches</h1>";
foreach ($tasks as $task) {
    echo "Tâche: " . $task->getDescription() . " - Statut: " . $task->getStatus() . "<br>";
}
?>
