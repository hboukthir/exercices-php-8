<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Roleable.php';
use PHPUnit\Framework\TestCase;

class RoleableTest extends TestCase {
    public function testAdminRole() {
        $admin = new Admin("Alice");
        $this->assertEquals("Administrator", $admin->getRole());
    }

    public function testMemberRole() {
        $member = new Member("Bob");
        $this->assertEquals("Member", $member->getRole());
    }
}
?>
