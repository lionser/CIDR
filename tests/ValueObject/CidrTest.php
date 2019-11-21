<?php declare(strict_types=1);

namespace Lionser\Tests\ValueObject\IP;

use Lionser\ValueObject\Cidr;
use Lionser\ValueObject\IP\IpV4;
use Lionser\ValueObject\IP\RangeInterface;
use PHPUnit\Framework\TestCase;

class CidrTest extends TestCase
{
    private const IP_FOO   = '127.0.0.1';
    private const BITS_FOO = 32;

    /**
     * @var RangeInterface
     */
    private $cidr;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        $this->cidr = new Cidr(new IpV4(self::IP_FOO), self::BITS_FOO);
    }

    public function testToString(): void
    {
        $expected = sprintf("%s/%s", self::IP_FOO, self::BITS_FOO);

        $this->assertEquals($expected, (string) $this->cidr);
    }
}
