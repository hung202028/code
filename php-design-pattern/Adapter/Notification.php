<?php

namespace Adapter;

interface Notification
{
    public function notify(string $title, string $message);
}
