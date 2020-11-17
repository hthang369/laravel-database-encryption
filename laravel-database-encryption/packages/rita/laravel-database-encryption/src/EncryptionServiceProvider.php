<?php
/**
 * src/EncryptionServiceProvider.php.
 *
 * @author      Thang Tran <thangtran3690@gmail.com>
 * @version     v1.0.0
 */
declare(strict_types=1);

namespace Rita\Database\Encryption;

/**
 * EncryptionServiceProvider.
 *
 * @link        https://github.com/Rita/laravel-database-encryption
 * @link        https://packagist.org/packages/Rita/laravel-database-encryption
 * @link        https://Rita.github.io/laravel-database-encryption/classes/Rita.Database.Encryption.EncryptionServiceProvider.html
 */
class EncryptionServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * This method is called after all other service providers have
     * been registered, meaning you have access to all other services
     * that have been registered by the framework.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([__DIR__.'/../config/database-encryption.php' => config_path('database-encryption.php')]);

        if (! defined('LARAVEL_DATABASE_ENCRYPTION_VERSION')) {
            define('LARAVEL_DATABASE_ENCRYPTION_VERSION', EncryptionHelper::VERSION);
        }

        foreach (EncryptionDefaults::getHelpersDefault() as $helper) {
            throw_if(! empty($helper) && ! function_exists($helper),
                     'The provider did not boot helper function: "'.$helper.'".');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/database-encryption.php', 'database-encryption');

        $this->app->singleton(EncryptionFacade::getFacadeAccessor(), function ($app) {
            return new EncryptionHelper();
        });

        $this->commands([\Rita\Database\Encryption\Console\Commands\MigrateEncryptionCommand::class]);
    }
}
