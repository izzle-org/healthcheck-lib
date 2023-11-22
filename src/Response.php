<?php
declare(strict_types=1);

namespace Izzle\HealthCheck;

use JsonSerializable;

/**
 * Class Response
 * @package Izzle\HealthCheck
 */
class Response implements JsonSerializable
{
    /**
     * @var bool
     */
    protected bool $status = false;

    /**
     * @var string|null
     */
    protected ?string $message = null;

    /**
     * @var array|null
     */
    protected ?array $data = null;

    /**
     * @param bool $status
     * @param string|null $message
     * @param array|null $data
     */
    public function __construct(bool $status, ?string $message = null, ?array $data = null)
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * @return array|mixed
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data
        ];
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
}
