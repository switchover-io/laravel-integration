<?php 

namespace SwitchoverLaravel;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Switchover\SwitchoverClient;

class SwitchoverServiceProvider extends ServiceProvider {

   /** 
    * @var bool
    */
   protected $defer = false;

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPublishing();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->configure();
        $this->registerSwitchover();
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/switchover.php' => $this->app->configPath('switchover.php'),
            ], 'switchover-config');

        }
    }

    protected function configure()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/switchover.php', 'switchover');
    }


    private function registerSwitchover() {

        $this->app->singleton('switchover', function($app) {            
           
            $cache = $app['cache.store'];
            $logger = $app['log'];

            $ttl = Config::get('switchover.cache.time');
            $httpOptions =  Config::get('switchover.http');
            $sdkKey = Config::get('switchover.sdkkey');

            return new SwitchoverClient($sdkKey, [
                'cache.time' => $ttl,
                'logger' => $logger,
                'cache' => $cache,
                'http' => $httpOptions
            ]); 
        });
    }
}