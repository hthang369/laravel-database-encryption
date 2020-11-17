<?php
/**
 * src/EncryptionFacade.php.
 *
 * @author      Thang Tran <thangtran3690@gmail.com>
 * @version     v1.0.0
 */
declare(strict_types=1);

namespace Rita\Database\Encryption;

use RuntimeException;

/**
 * EncryptionFacade.
 *
 * @link        https://github.com/Rita/laravel-database-encryption
 * @link        https://packagist.org/packages/Rita/laravel-database-encryption
 * @link        https://Rita.github.io/laravel-database-encryption/classes/Rita.Database.Encryption.EncryptionFacade.html
 */
class EncryptionFacade extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'DatabaseEncryption';
    }

    /**
     * Get the singleton of EncryptionHelper.
     *
     * @return EncryptionHelper
     */
    public static function getInstance()
    {
        return app(self::getFacadeAccessor());
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string $method
     * @param  array  $args
     *
     * @return mixed
     * @throws \RuntimeException
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getInstance();

        throw_if(! $instance, RuntimeException::class, 'A facade root has not been set.');
        throw_if(! method_exists($instance, $method), RuntimeException::class, 'Method "'.$method.'" does not exist on "'.get_class($instance).'".');

        return $instance->$method(...$args);
    }
}
