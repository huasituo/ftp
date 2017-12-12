<?php 

namespace Huasituo\Ftp;

use Huasituo\Hook\Contracts\Repository;

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
        $this->app->singleton('ftp', function ($app) {
            $repository = $app->make(Repository::class);
            return new FtpConnection($app, $repository);
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
