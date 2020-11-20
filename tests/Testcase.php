<?php 

namespace SwitchoverLaravel;

use Orchestra\Testbench\TestCase as OrchestraTestCase;


class Testcase extends OrchestraTestCase {


    protected $blade;

    public function setUp(): void
    {
        parent::setUp();

        $this->blade = app('blade.compiler');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('cache.default', 'array');
        $app['config']->set('switchover.sdkkey', '<SDK-KEY>');
        $app['config']->set('switchover.http', []);
       
    }

    /**
     * Get Service Provider
     *
     * @param \Illuminate\Foundation\Application $app
     * @return \SwitchoverLaravel\SwitchoverServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [SwitchoverServiceProvider::class];
    }

    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Switchover' => Switchover::class,
        ];
    }



}