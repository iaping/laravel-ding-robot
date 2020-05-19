<?php

namespace Aping\LaravelDingRobot;

use Aping\PddingRobot\Fast;
use Illuminate\Foundation\Application;

class RobotManager
{
    /**
     * The application instance.
     *
     * @var Application
     */
    protected $app;

    /**
     * The ding robot instances.
     *
     * @var array
     */
    public $robots = [];

    /**
     * RobotManager constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * robot
     *
     * @param null $name
     * @return Fast
     */
    public function robot($name = null)
    {
        $name = $name ?? $this->getDefault();

        if (! isset($this->robots[$name])) {
            $config = $this->app['config']->get("ding.robots.{$name}");
            $this->robots[$name] = Fast::new($config['token'], $config['secret']);
        }

        return $this->robots[$name];
    }

    /**
     * default robot name
     *
     * @return string
     */
    public function getDefault()
    {
        return $this->app['config']->get('ding.default', 'default');
    }

    /**
     * Dynamically pass methods to the default robot.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->robot()->$method(...$parameters);
    }

}
