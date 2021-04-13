<?php

namespace Izzle\HealthCheck\Tests;

use InvalidArgumentException;
use Izzle\HealthCheck\Checks\NullCheck;
use Izzle\HealthCheck\Response;
use PHPUnit\Framework\TestCase;
use Izzle\HealthCheck\Manager;

class ManagerTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $manager = new Manager();
        self::assertInstanceOf(Manager::class, $manager);
    }

    public function testCanGetChecks(): void
    {
        $manager = new Manager();
        self::assertCount(0, $manager->getChecks());
    }

    public function testCanBeInstantiatedWithChecks(): void
    {
        $manager = new Manager([new NullCheck()]);
        self::assertCount(1, $manager->getChecks());
    }

    public function testCanRunChecks(): void
    {
        $check = new NullCheck();
        $manager = new Manager([$check]);
        $responses = $manager->run();

        self::assertCount(1, $responses);
        self::assertInstanceOf(Response::class, $responses[$check->getName()]);

        $this->expectException(InvalidArgumentException::class);
        $manager = new Manager([$check, 'foobar']);
        $manager->run();
    }
}
