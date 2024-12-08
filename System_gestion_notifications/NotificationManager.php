<?php

class NotificationManager {
    private array $notifications = [];

    public function registerNotification(NotificationInterface $notification): void {
        $this->notifications[] = $notification;
    }

    public function sendAll(string $to, string $message): void {
        foreach ($this->notifications as $notification) {
            $success = $notification->send($to, $message);
            if ($success) {
                echo "Notification sent successfully!\n";
            } else {
                echo "Failed to send notification.\n";
            }
        }
    }
}
