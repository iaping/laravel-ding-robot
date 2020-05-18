<?php

namespace Aping\LaravelDingRobot;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class RobotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom($this->configPath(), 'ding');

        $this->publishes([
            $this->configPath() => config_path('ding.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ding', function (Application $app) {
            return new RobotManager($app);
        });

        $this->app->alias('ding', RobotManager::class);
    }

    /**
     * config path
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/ding.php';
    }

}
