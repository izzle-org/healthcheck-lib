<?php
declare(strict_types=1);

namespace Izzle\HealthCheck\Checks;

use Izzle\HealthCheck\CheckInterface;
use Izzle\HealthCheck\Response;

/**
 * Class NullCheck
 * @package Izzle\HealthCheck\Checks
 */
class NullCheck implements CheckInterface
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'null-check';
    }

    /**
     * @param array|null $params
     * @return Response
     */
    public function run(?array $params = []): Response
    {
        return new Response(true, 'Ok');
    }
}
