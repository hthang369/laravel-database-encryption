<?php
/**
 * tests/FacadeTest.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests;

use RuntimeException;
use Rita\Database\Encryption\EncryptionFacade;
use Rita\Database\Encryption\EncryptionHelper;
use DatabaseEncryption as EncryptionRealFacade;

/**
 * FacadeTest
 */
class FacadeTest extends TestCase
{
    public function testManualConstruct()
    {
        $facade = new EncryptionFacade();
        $this->assertEquals('DatabaseEncryption', $this->callProtectedMethod($facade, 'getFacadeAccessor'));
    }

    public function testConstructValid()
    {
        $this->assertEquals(app('DatabaseEncryption'), database_encryption());
    }

    public function testConstructInvalid()
    {
        $helper = new class() extends EncryptionHelper {};
        $this->assertNotEquals(app('DatabaseEncryption'), $helper);
    }

    public function testAccessor()
    {
        $this->assertEquals(self::callProtectedMethod(new EncryptionFacade(), 'getFacadeAccessor'), 'DatabaseEncryption');
    }

    public function testFacade()
    {
        $this->assertSame(app('DatabaseEncryption'), EncryptionRealFacade::getInstance());
        $this->assertEquals(EncryptionHelper::VERSION, EncryptionRealFacade::getVersion());
    }

    public function testCallStaticInvalid()
    {
        $class = new class() extends EncryptionFacade
        {
            public static function getFacadeRoot()
            {
                return null;
            }
        };

        $this->expectException(RuntimeException::class);
        $class::staticMethodThatDoesntExist();
    }
}
