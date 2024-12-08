<?php

class EmailNotification extends AbstractNotification {
    public function send(string $to, string $message): bool {
        echo "Sending Email to $to from {$this->from} with message: $message\n";
        // Simulate success
        return true;
    }
}
