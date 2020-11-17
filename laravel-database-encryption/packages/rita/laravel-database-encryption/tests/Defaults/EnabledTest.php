<?php
/**
 * tests/Defaults/EnabledTest.php
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
 * EnabledTest
 */
class EnabledTest extends TestCase
{
    public function testEnabled()
    {
        $defaults = $this->getMockBuilder(EncryptionDefaults::class)->getMockForAbstractClass();
        $this->assertEquals(false, $defaults::DEFAULT_ENABLED);
        $this->assertSame($defaults::DEFAULT_ENABLED, $defaults->isEnabledDefault());
        $this->assertSame(!$defaults::DEFAULT_ENABLED, $defaults->isDisabledDefault());
    }
}
