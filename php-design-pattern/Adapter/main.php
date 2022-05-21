<?php

require_once '../autoload.php';

use Adapter\Notification;
use Adapter\SlackNotification;
use Adapter\EmailNotification;
use Adapter\AlertType;

class PagerDuty
{
    private array $notifiers = [];
    private array $config;

    public function getApplicationConfig(): array
    {
        if (!isset($this->config)) {
            // Need to install yaml extension:
            // 1: brew install libyaml
            // 2: pecl install yaml
            // 3: Please provide the prefix of libyaml installation [autodetect] : /opt/homebrew/Cellar/libyaml/0.2.5
            $this->config = yaml_parse_file(__DIR__ . DIRECTORY_SEPARATOR . "config.yaml");
        }

        return $this->config;
    }

    public function getEmailAlert()
    {
        $config = $this->getApplicationConfig();

        $receivers = $config['alert']['emails'] ?? '';
        $receivers = explode(',', $receivers);

        return new EmailNotification($receivers);
    }

    public function getSlackAlert()
    {
        $config = $this->getApplicationConfig();

        $channels = $config['alert']['slacks']['channels'] ?? '';
        $channels = explode(',', $channels);

        $apiKey = $config['alert']['slacks']['apiKey'] ?? '';

        return new SlackNotification($apiKey, $channels);
    }

    /**
     * @return Notification[]|false
     */
    public function getNotifiers()
    {
        if (empty($this->notifiers)) {
            $config = $this->getApplicationConfig();

            $enable = $config['notifier']['enable'] ?? false;
            if (!boolval($enable)) {
                $this->notifiers = [];
                return;
            }

            $type = $config['notifier']['type'] ?? AlertType::EMAIL;
            switch (intval($type)) {
                case AlertType::EMAIL->value:
                    $this->notifiers[] = $this->getEmailAlert();
                    break;
                case AlertType::SLACK->value:
                    $this->notifiers[] = $this->getSlackAlert();
                    break;
                case AlertType::ALL->value:
                    $this->notifiers[] = $this->getSlackAlert();
                    $this->notifiers[] = $this->getEmailAlert();
                    break;
            }
        }

        return $this->notifiers;
    }

    public function alert($title, $message)
    {
        $notifiers = $this->getNotifiers();
        /** @var Notification $sender */
        foreach ($notifiers as $sender) {
            $sender->notify($title, $message);
        }
    }
}

$app = new PagerDuty();
$app->alert('Demo Title', 'Demo Message');
