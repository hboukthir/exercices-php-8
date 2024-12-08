<?php

class SmsNotification extends AbstractNotification {
    public function send(string $to, string $message): bool {
        echo "Sending SMS to $to from {$this->from} with message: $message\n";
        // Simulate success
        return true;
    }
}

