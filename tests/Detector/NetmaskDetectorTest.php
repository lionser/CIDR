<?php declare(strict_types=1);

namespace IpTool\Tests\Detector;

use IpTool\Detector\NetmaskDetector;
use IpTool\ValueObject\IP\IPv4;
use IpTool\ValueObject\IP\Netmask;
use PHPUnit\Framework\TestCase;

class NetmaskDetectorTest extends TestCase
{
    /**
     * @var NetmaskDetector
     */
    private $netmaskDetector;

    public function setUp()
    {
        parent::setUp();

        $this->netmaskDetector = new NetmaskDetector();
    }

    /**
     * @dataProvider netmaskProvider
     *
     * @param string $ip
     * @param string $netmask
     */
    public function testDetect(string $ip, string $netmask): void
    {
        $this->assertEquals(new Netmask($netmask), $this->netmaskDetector->detect(new IPv4($ip)));
    }

    /**
     * @return \Generator
     */
    public function netmaskProvider(): \Generator
    {
        yield ['1.0.0.0', '255.0.0.0'];
        yield ['1.1.0.0', '255.255.0.0'];
        yield ['1.1.1.0', '255.255.255.0'];
        yield ['1.1.1.1', '255.255.255.255'];
        yield ['1.1.0.1', '255.255.255.255'];
        yield ['1.0.0.1', '255.255.255.255'];
        yield ['0.0.0.1', '255.255.255.255'];
    }
}
