<?php

declare(strict_types=1);

namespace Lionser\Tests\ValueObject\IP;

use Lionser\ValueObject\IP\IpInterface;
use Lionser\ValueObject\IP\IpV4;
use PHPUnit\Framework\TestCase;

class IpV4Test extends TestCase
{
    private const IP_FOO = '127.0.0.1';

    private IpV4 $ipV4;

    protected function setUp(): void
    {
        $this->ipV4 = new IpV4(self::IP_FOO);
    }

    public function testGetVersion(): void
    {
        $this->assertEquals(4, $this->ipV4->getVersion()->value);
    }

    /**
     * @dataProvider ipProvider
     */
    public function testIsValid(string $ip, bool $expected): void
    {
        $ip = new IpV4($ip);

        $this->assertEquals($expected, $ip->isValid());
    }

    /**
     * @return \Generator
     */
    public function ipProvider(): \Generator
    {
        yield ['127.0.0.1', true];
        yield ['192.168.1.1', true];
        yield ['192.168.1.1.1', false];
        yield ['foo', false];
    }
}
