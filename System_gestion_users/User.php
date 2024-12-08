<?php
abstract class User {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function getRole();
}

class Admin extends User {
    public function getRole() {
        return "Administrator";
    }
}

class Member extends User {
    public function getRole() {
        return "Member";
    }
}
?>
