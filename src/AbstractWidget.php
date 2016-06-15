<?php

namespace Benrowe\Laravel\Widgets;

use Arrilot\Widgets\AbstractWidget as BaseAbstractWidget;
use Arrilot\Widgets\WidgetId;

/**
 *
 */
abstract class AbstractWidget extends BaseAbstractWidget
{
    const ID_PREFIX = 'widget-';

    /**
     * @var string
     */
    private $id;

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
     * @return nil|null
     */
    public function addCfg($key, $value)
    {
        if ($this->isConfigProperty($key)) {
            $this->$key = $value;
            return;
        }
        $this->config[$key] = $value;
    }

    /**
     * Retrieve the widget id
     *
     * @param  boolean $autoGenerate automatically generate the id if none is
     *                               already set
     * @return string
     */
    public function getId($autoGenerate = true)
    {
        if (!$this->id && $autoGenerate) {
            $this->id = self::ID_PREFIX . WidgetId::get();
        }
        return $this->id;
    }

    /**
     * Set the widget identifier
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
