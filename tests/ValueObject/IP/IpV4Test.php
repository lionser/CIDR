<?php declare(strict_types=1);

namespace Lionser\Tests\ValueObject\IP;

use Lionser\ValueObject\IP\IpInterface;
use Lionser\ValueObject\IP\IpV4;
use PHPUnit\Framework\TestCase;

class IpV4Test extends TestCase
{
    private const IP_FOO = '127.0.0.1';

    /**
     * @var IpV4
     */
    private $ipV4;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        $this->ipV4 = new IpV4(self::IP_FOO);
    }

    public function testGetVersion(): void
    {
        $this->assertEquals(4, $this->ipV4->getVersion());
    }

    /**
     * @dataProvider ipProvider
     *
     * @param string $ip
     * @param $expected
     */
    public function testIsValid(string $ip, $expected): void
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
