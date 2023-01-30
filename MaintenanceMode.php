<?php

class MaintenanceMode
{
    private $status;
    private $allowedIps = [];
    private $message;

    public function __construct(bool $status, array $allowedIps = [], string $message = 'Maintenance mode is currently enabled. Please check back later.')
    {
        $this->status = $status;
        $this->allowedIps = $allowedIps;
        $this->message = $message;
    }

    public function check(): void
    {
        if ($this->status) {
            if ($this->isIpAllowed()) {
                return;
            }

            header('HTTP/1.1 503 Service Unavailable');
            header('Retry-After: 3600');
            echo $this->message;
            exit;
        }
    }

    private function isIpAllowed(): bool
    {
        $clientIp = $_SERVER['REMOTE_ADDR'];
        if (in_array($clientIp, $this->allowedIps, true)) {
            return true;
        }
        return false;
    }
}
