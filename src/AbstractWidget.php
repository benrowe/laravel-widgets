<?php

namespace Benrowe\Laravel\Widgets;

use Arrilot\Widgets\AbstractWidget as BaseAbstractWidget;

/**
 *
 */
abstract class AbstractWidget extends BaseAbstractWidget
{
    /**
     * Constructor
     * Store the configuration & initialise the widget
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        foreach ($config as $key => $value) {
            $this->addCfg($key, $value);
        }
        $this->init();
    }

    /**
     * Custom initilisation for the widget
     *
     * @return boolean
     */
    protected function init()
    {
        return true;
    }

    /**
     * Retrieve the configuration value from the widget, based
     * on the supplied key
     *
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    public function cfg($key, $default = null)
    {
        if (array_key_exists($key, $this->config)) {
            return $this->config[$key];
        }
        if ($this->isConfigProperty($key)) {
            return $this->$key;
        }
        return $default;
    }

    /**
     * Add a configuration into the widget
     *
     * @param string $key
     * @param mixed $value
     * @return nil
     */
    public function addCfg($key, $value)
    {
        if ($this->isConfigProperty($key)) {
            $this->$key = $value;
            return;
        }

    }

    /**
     * Determine if the public property exists, and is public
     *
     * @param  string  $propertyName
     * @return boolean
     */
    private function isConfigProperty($propertyName)
    {
        try {
            $reflect = new \ReflectionClass($this);
            $property = $reflect->getProperty($propertyName);
            return $property->isPublic() && !$property->isStatic();
        } catch (\ReflectionException $e) {
            return false;
        }

    }
}
