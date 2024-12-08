<?php

abstract class AbstractNotification implements NotificationInterface {
    protected string $from;

    public function __construct(string $from) {
        $this->from = $from;
    }
}
