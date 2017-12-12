<?php

namespace Huasituo\Ftp;

 use Huasituo\Ftp\Libraries\Ftps;

use Illuminate\Foundation\Application;

class Ftp
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * The active connection instances.
     *
     * @var array
     */
    protected $connections = array();

    /**
     * Create a new Modules instance.
     *
     * @param Application         $app
     */
    public function __construct(Application $app)
    {
        $this->app        = $app;
    }

    /**
     * Get the default connection name.
     *
     * @return string
     */
    public function getDefaultConnection()
    {
        return $this->app['config']['ftp.default'];
    }

    /**
     * Get the configuration for a connection.
     *
     * @param  string  $name
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    protected function getConfig($name)
    {
        $name = $name ?: $this->getDefaultConnection();
        $connections = $this->app['config']['ftp.connections'];
        if (is_null($config = array_get($connections, $name))) {
            throw new \InvalidArgumentException("Ftp [$name] not configured.");
        }
        return $config;
    }

    /**
     * Make the FTP connection instance.
     *
     * @param  string  $name
     * @return \Huasituo\Ftp\Ftp
     */
    protected function makeConnection($name)
    {
        $config = $this->getConfig($name);
        return new Ftps($config);
    }

    /**
     * Get a FTP connection instance.
     *
     * @param  string  $name
     */
    public function connection($name = null)
    {
        $name = $name ?: $this->getDefaultConnection();
        if ( ! isset($this->connections[$name])) {
            $this->connections[$name] = $this->makeConnection($name);
        }
        return $this->connections[$name];
    }

    /**
     * Disconnect from the given ftp.
     *
     * @param  string  $name
     * @return void
     */
    public function disconnect($name = null)
    {
        $name = $name ?: $this->getDefaultConnection();
        if ($this->connections[$name]) {
            $this->connections[$name]->disconnect();
            unset($this->connections[$name]);
        }
    }

    /**
     * Reconnect to the given ftp.
     *
     * @param  string  $name
     * @return \Anchu\Ftp\Ftp
     */
    public function reconnect($name = null)
    {
        $name = $name ?: $this->getDefaultConnection();
        $this->disconnect($name);
        return $this->connection($name);
    }

    /**
     * Return all of the created connections.
     *
     * @return array
     */
    public function getConnections()
    {
        return $this->connections;
    }
}
