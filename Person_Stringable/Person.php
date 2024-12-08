<?php

// Déclaration de la classe Person qui implémente l'interface Stringable
class Person implements Stringable {
    private string $firstName;
    private string $lastName;
    private int $age;

    // Constructeur pour initialiser les propriétés de la personne
    public function __construct(string $firstName, string $lastName, int $age) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    // Implémentation de la méthode __toString pour formater l'objet en chaîne
    public function __toString(): string {
        return "{$this->firstName} {$this->lastName}, Age: {$this->age}";
    }
}
