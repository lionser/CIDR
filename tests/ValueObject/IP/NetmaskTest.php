<?php declare(strict_types=1);

namespace Lionser\Tests\ValueObject\IP;

use Lionser\ValueObject\IP\IpInterface;
use Lionser\ValueObject\IP\Netmask;
use PHPUnit\Framework\TestCase;

class NetmaskTest extends TestCase
{
    private const NETMASK_FOO = '255.255.255.0';

    /**
     * @var IpInterface
     */
    private $netmask;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        $this->netmask = new Netmask(self::NETMASK_FOO);
    }

    public function testGetVersion(): void
    {
        $this->assertEquals(4, $this->netmask->getVersion());
    }
}
