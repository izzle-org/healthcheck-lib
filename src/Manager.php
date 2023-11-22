<?php
declare(strict_types=1);

namespace Izzle\HealthCheck;

use InvalidArgumentException;

/**
 * Class Manager
 * @package Izzle\HealthCheck
 */
class Manager
{
    /**
     * @var array
     */
    protected array $checks = [];

    /**
     * HealthCheckService constructor.
     * @param array $checks
     */
    public function __construct(array $checks = [])
    {
        $this->checks = $checks;
    }

    /**
     * @return array
     */
    public function getChecks(): array
    {
        return $this->checks;
    }

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function run(): array
    {
        $result = [];

        foreach ($this->checks as $check) {
            if (!($check instanceof CheckInterface)) {
                throw new InvalidArgumentException('Check must be instance of ' . CheckInterface::class);
            }

            $result[$check->getName()] = $check->run();
        }

        return $result;
    }
}
