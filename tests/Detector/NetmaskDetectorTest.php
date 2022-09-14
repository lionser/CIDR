<?php

declare(strict_types=1);

namespace Lionser\Tests\Detector;

use Lionser\Detector\NetmaskDetector;
use Lionser\ValueObject\IP\IpV4;
use Lionser\ValueObject\IP\Netmask;
use PHPUnit\Framework\TestCase;

class NetmaskDetectorTest extends TestCase
{
    private NetmaskDetector $netmaskDetector;

    protected function setUp(): void
    {
        parent::setUp();

        $this->netmaskDetector = new NetmaskDetector();
    }

    /**
     * @dataProvider netmaskProvider
     */
    public function testDetect(string $ip, string $netmask): void
    {
        $this->assertEquals(new Netmask($netmask), $this->netmaskDetector->detect(new IpV4($ip)));
    }

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
