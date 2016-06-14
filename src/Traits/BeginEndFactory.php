<?php

namespace Benrowe\Laravel\Widgets\Traits;

/**
 * Provides the begin & end functionality for the Widget factory
 *
 * @package Benrowe\Laravel\Widgets
 */
trait BeginEndFactory
{
    private $stack = [];

    /**
     * [begin description]
     * @return [type] [description]
     */
    public function begin()
    {
        $args = func_get_args();
        $this->stack[] = $args;
        $this->instantiateWidget($args);

        return $this->asExpression($this->widget->begin());
    }

    /**
     * [end description]
     * @return [type] [description]
     */
    public function end()
    {
        $args = array_pop($this->stack);
        $args[1] = $args[1] ? array_merge($args[1], $config) : [];
        $this->instantiateWidget($args);

        return $this->asExpression($this->widget->end());
    }
}
