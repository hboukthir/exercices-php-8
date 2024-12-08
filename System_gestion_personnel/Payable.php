<?php

// Interface Payable
interface Payable {
    public function calculatePay(): float;
}

// Classe de base Person
abstract class Person {
    protected string $name;
    protected int $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getDetails(): string {
        return "Name: {$this->name}, Age: {$this->age}";
    }
}

// Classe dérivée Student
class Student extends Person {
    private string $gradeLevel;

    public function __construct(string $name, int $age, string $gradeLevel) {
        parent::__construct($name, $age);
        $this->gradeLevel = $gradeLevel;
    }

    public function getDetails(): string {
        return parent::getDetails() . ", Grade Level: {$this->gradeLevel}";
    }
}

// Classe dérivée Teacher
class Teacher extends Person implements Payable {
    private float $hourlyRate;
    private int $hoursWorked;

    public function __construct(string $name, int $age, float $hourlyRate, int $hoursWorked) {
        parent::__construct($name, $age);
        $this->hourlyRate = $hourlyRate;
        $this->hoursWorked = $hoursWorked;
    }

    public function calculatePay(): float {
        return $this->hourlyRate * $this->hoursWorked;
    }

    public function getDetails(): string {
        return parent::getDetails() . ", Pay: {$this->calculatePay()}";
    }
}

// Exemple d'utilisation
$student = new Student("Alice", 20, "Undergraduate");
$teacher = new Teacher("Mr. Smith", 40, 50.0, 20);

echo $student->getDetails() . PHP_EOL;  // Affiche les détails de l'étudiant
echo $teacher->getDetails() . PHP_EOL;  // Affiche les détails de l'enseignant avec paiement