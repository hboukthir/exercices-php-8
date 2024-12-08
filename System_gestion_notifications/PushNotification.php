<?php

class PushNotification extends AbstractNotification {
    public function send(string $to, string $message): bool {
        echo "Sending Push Notification to $to from {$this->from} with message: $message\n";
        // Simulate success
        return true;
    }
}

