<?php
/**
 * tests/Helper/SetEnabledTestt.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests\Helper;

use Rita\Database\Encryption\Tests\TestCase;
use Rita\Database\Encryption\EncryptionHelper;

/**
 * EnabledTest
 */
class EnabledTest extends TestCase
{
    public function testEnabledCached()
    {
        $helper = (new EncryptionHelper())->setEnabled(null);

        $this->assertAttributeEquals(null, 'enabledCache', $helper);
        $this->assertTrue(is_bool($helper->isEnabled()));
        $this->assertAttributeNotSame(null, 'enabledCache', $helper);
    }

    public function testEnabledTrue()
    {
        $helper = (new EncryptionHelper())->setEnabled(true);

        $this->assertTrue($helper->isEnabled());
    }

    public function testEnabledFalse()
    {
        $helper = new EncryptionHelper();

        $helper->setEnabled(false);
        $this->assertFalse($helper->isEnabled());
    }
}
