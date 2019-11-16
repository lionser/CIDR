<?php declare(strict_types=1);

namespace IpTool\Tests\Resolver;

use IpTool\Resolver\NetmaskResolver;
use PHPUnit\Framework\TestCase;

class NetmaskResolverTest extends TestCase
{
    /**
     * @var NetmaskResolver
     */
    private $netmaskResolver;

    public function setUp()
    {
        parent::setUp();

        $this->netmaskResolver = new NetmaskResolver();
    }

    /**
     * @dataProvider netmaskProvider
     *
     * @param string $ip
     * @param string $netmask
     */
    public function testResolve(string $ip, string $netmask): void
    {
        $this->assertEquals($netmask, $this->netmaskResolver->resolve($ip));
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
