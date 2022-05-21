<?php

namespace Adapter;

class SlackNotification implements Notification
{
    private SlackAPI $slackAPI;
    private array $channels;

    public function __construct(string $apiKey, array $channels)
    {
        $this->slackAPI = new SlackAPI($apiKey);
        $this->channels = $channels;
    }

    public function notify(string $title, string $message)
    {
        $slackMessage = sprintf("%s--%s", $title, $message);
        foreach ($this->channels as $channelId) {
            if (empty($channelId)) {
                continue;
            }

            $this->slackAPI->notifyChannel($channelId, $slackMessage);
            echo "\n";
        }
    }
}
