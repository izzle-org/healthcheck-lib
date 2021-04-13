<?php

namespace Izzle\HealthCheck;

/**
 * Interface CheckInterface
 * @package Izzle\HealthCheck
 */
interface CheckInterface
{
    /**
     * @return string
     */
    public function getName(): string;
    
    /**
     * @param array|null $params
     * @return Response
     */
    public function run(?array $params = []): Response;
}
