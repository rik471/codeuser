<?php

namespace CodePress\CodeUser\Tests;

use CodePress\CodeUser\Providers\CodeUserServiceProvider;
use CodePress\CodeUser\Providers\EventServiceProvider;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
    public function migrate()
    {
        $this->artisan('migrate:refresh',[
            '--realpath' => realpath(__DIR__ . '/../src/resources/migrations')
        ]);
    }

    public function getPackageProviders($app)
    {
        return [
            AuthServiceProvider::class,
            PasswordResetServiceProvider::class,
            EventServiceProvider::class,
            CodeUserServiceProvider::class
        ];
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
       /* $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);*/
        config(['database' => require __DIR__ . '/config/database.php']);
        config(['auth' => require __DIR__ . '/../src/config/auth.php']);
    }
}