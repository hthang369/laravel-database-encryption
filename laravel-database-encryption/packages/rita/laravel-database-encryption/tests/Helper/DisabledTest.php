<?php
/**
 * tests/Helper/DisabledTest.php
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests\Helper;

use Rita\Database\Encryption\Tests\TestCase;
use Rita\Database\Encryption\EncryptionHelper;

/**
 * DisabledTest
 */
class DisabledTest extends TestCase
{
    public function testDisabledCached()
    {
        $helper = (new EncryptionHelper())->setDisabled(null);

        $this->assertAttributeEquals(null, 'enabledCache', $helper);
        $this->assertTrue(is_bool($helper->isDisabled()));
        $this->assertAttributeNotSame(null, 'enabledCache', $helper);
    }

    public function testDisabledTrue()
    {
        $helper = (new EncryptionHelper())->setDisabled(true);

        $this->assertTrue($helper->isDisabled());
        $this->assertFalse($helper->isEnabled());
    }

    public function testDisabledFalse()
    {
        $helper = (new EncryptionHelper())->setDisabled(false);

        $this->assertFalse($helper->isDisabled());
        $this->assertTrue($helper->isEnabled());
    }
}
