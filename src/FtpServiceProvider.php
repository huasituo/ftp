<?php 

namespace Huasituo\Ftp;

use Huasituo\Ftp\Providers\RouteServiceProvider;
use Huasituo\Ftp\Providers\LibrariesServiceProvider;

use Illuminate\Support\ServiceProvider;

class FtpServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ftp.php' => config_path('ftp.php'),
        ], 'config');
        $this->loadTranslationsFrom(__DIR__.'/../translations', 'ftp');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/ftp.php', 'ftp'
        );
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(LibrariesServiceProvider::class);

        $this->app->singleton('ftp', function ($app) {
            return new Ftp($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string
     */
    public function provides()
    {
        return ['ftp'];
    }
}
