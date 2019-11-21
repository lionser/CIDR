<?php declare(strict_types=1);

namespace Lionser\Tests\ValueObject\IP;

use Lionser\ValueObject\IP\IpV4;
use Lionser\ValueObject\IP\Range;
use Lionser\ValueObject\IP\RangeInterface;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    private const IP_FOO = '127.0.0.1';
    private const IP_BAR = '127.0.0.255';

    /**
     * @var RangeInterface
     */
    private $range;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        $this->range = new Range(new IpV4(self::IP_FOO), new IpV4(self::IP_BAR));
    }

    public function testToString(): void
    {
        $expected = sprintf("%s-%s", self::IP_FOO, self::IP_BAR);

        $this->assertEquals($expected, (string) $this->range);
    }
}
