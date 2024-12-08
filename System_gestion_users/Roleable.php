<?php
interface Roleable {
    public function getRole(): string;
}
class Admin implements Roleable {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getRole(): string {
        return "Administrator";
    }
}

class Member implements Roleable {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getRole(): string {
        return "Member";
    }
}
?>
