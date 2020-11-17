<?php
/**
 * tests/Defaults/PrefixTest.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests\Defaults;

use Rita\Database\Encryption\Tests\TestCase;
use Rita\Database\Encryption\EncryptionDefaults;

/**
 * PrefixTest
 */
class PrefixTest extends TestCase
{
    public function testPrefix()
    {
        $defaults = $this->getMockBuilder(EncryptionDefaults::class)->getMockForAbstractClass();
        $this->assertEquals('__LARAVEL-DATABASE-ENCRYPTED-%VERSION%__', $defaults::DEFAULT_PREFIX);
        $this->assertSame($defaults::DEFAULT_PREFIX, $defaults->getPrefixDefault());
    }
}
