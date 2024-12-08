<?php

require_once 'NotificationInterface.php';
require_once 'AbstractNotification.php';
require_once 'EmailNotification.php';
require_once 'SmsNotification.php';
require_once 'PushNotification.php';
require_once 'NotificationManager.php';

// Create instances of notifications
$emailNotification = new EmailNotification('noreply@example.com');
$smsNotification = new SmsNotification('+123456789');
$pushNotification = new PushNotification('MyApp');

// Register and send notifications
$manager = new NotificationManager();
$manager->registerNotification($emailNotification);
$manager->registerNotification($smsNotification);
$manager->registerNotification($pushNotification);

$manager->sendAll('recipient@example.com', 'This is a test message!');
