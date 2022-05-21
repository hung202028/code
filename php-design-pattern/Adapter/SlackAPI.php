<?php
namespace Adapter;


class SlackAPI
{
    private string $apiKey = '';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function login(bool $debug = false): bool
    {
        if ($debug) {
            echo sprintf('Login to slack, apiKey=%s', $this->apiKey);
        }

        return !empty($this->apiKey);
    }

    public function notifyChannel(string $channelId, string $message)
    {
        if (!$this->login()) {
            throw new Exception("Can't login to slack, please check apiKey");
        }

        echo sprintf('Sending to channel: %s, message: %s', $channelId, $message);
    }
}
