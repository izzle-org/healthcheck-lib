<?php

namespace Izzle\HealthCheck\Tests;

use Izzle\HealthCheck\Response;
use PHPUnit\Framework\TestCase;
use JsonSerializable;

class ResponseTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $response = new Response(true);
        self::assertInstanceOf(Response::class, $response);
    }

    public function testCanBeInstantiatedWithOptions(): void
    {
        $response = new Response(true);
        self::assertInstanceOf(Response::class, $response);
        self::assertTrue($response->getStatus());
        self::assertNull($response->getMessage());
        self::assertNull($response->getData());

        $response = new Response(true, 'foobar');
        self::assertInstanceOf(Response::class, $response);
        self::assertTrue($response->getStatus());
        self::assertEquals('foobar', $response->getMessage());
        self::assertNull($response->getData());

        $response = new Response(true, 'foobar', ['x', 'y']);
        self::assertInstanceOf(Response::class, $response);
        self::assertTrue($response->getStatus());
        self::assertEquals('foobar', $response->getMessage());
        self::assertEquals(['x', 'y'], $response->getData());
    }

    public function testCanBeJsonSerialized(): void
    {
        $response = new Response(true);
        self::assertInstanceOf(JsonSerializable::class, $response);
    }
}
