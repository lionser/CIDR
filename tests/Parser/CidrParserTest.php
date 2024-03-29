<?php

declare(strict_types=1);

namespace Lionser\Tests\Parser;

use Lionser\Detector\NetmaskDetector;
use Lionser\Parser\CidrParser;
use Lionser\Parser\RangeParserInterface;
use Lionser\ValueObject\Cidr;
use Lionser\ValueObject\IP\IpV4;
use Lionser\ValueObject\IP\Range;
use PHPUnit\Framework\TestCase;

class CidrParserTest extends TestCase
{
    private RangeParserInterface $parser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->parser = new CidrParser(new NetmaskDetector());
    }

    /**
     * @dataProvider ipRangeProvider
     *
     * @param string[] $expected
     */
    public function testParseRange(string $start, string $end, array $expected): void
    {
        $ipStart = new IpV4($start);
        $ipEnd   = new IpV4($end);
        $ipRange = new Range($ipStart, $ipEnd);
        $cidrs   = array_map('strval', $this->parser->parseRange($ipRange));

        $this->assertEquals($expected, $cidrs);
    }

    public function ipRangeProvider(): \Generator
    {
        yield ['1.0.0.0', '1.0.0.255', ['1.0.0.0/24']];
        yield ['1.0.0.0', '1.0.255.255', ['1.0.0.0/16']];
        yield ['1.0.0.0', '1.255.255.255', ['1.0.0.0/8']];
        yield [
            '1.0.0.0', '255.255.255.255', [
                '1.0.0.0/8',
                '2.0.0.0/7',
                '4.0.0.0/6',
                '8.0.0.0/5',
                '16.0.0.0/4',
                '32.0.0.0/3',
                '64.0.0.0/2',
                '128.0.0.0/1',
            ],
        ];
        yield [
            '1.0.0.1', '1.0.0.255', [
                '1.0.0.1/32',
                '1.0.0.2/31',
                '1.0.0.4/30',
                '1.0.0.8/29',
                '1.0.0.16/28',
                '1.0.0.32/27',
                '1.0.0.64/26',
                '1.0.0.128/25',
            ],
        ];
        yield [
            '1.101.222.33', '1.102.223.255', [
                '1.101.222.33/32',
                '1.101.222.34/31',
                '1.101.222.36/30',
                '1.101.222.40/29',
                '1.101.222.48/28',
                '1.101.222.64/26',
                '1.101.222.128/25',
                '1.101.223.0/24',
                '1.101.224.0/19',
                '1.102.0.0/17',
                '1.102.128.0/18',
                '1.102.192.0/19',
            ],
        ];
        yield [
            '88.31.7.201', '88.31.255.0', [
                '88.31.7.201/32',
                '88.31.7.202/31',
                '88.31.7.204/30',
                '88.31.7.208/28',
                '88.31.7.224/27',
                '88.31.8.0/21',
                '88.31.16.0/20',
                '88.31.32.0/19',
                '88.31.64.0/18',
                '88.31.128.0/18',
                '88.31.192.0/19',
                '88.31.224.0/20',
                '88.31.240.0/21',
                '88.31.248.0/22',
                '88.31.252.0/23',
                '88.31.254.0/24',
                '88.31.255.0/32',
            ],
        ];
    }
}
