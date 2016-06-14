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
     * Being the widget
     *
     * @return Expression
     */
    public function begin()
    {
        $args = func_get_args();
        $this->stack[] = $args;
        $this->instantiateWidget($args);

        return $this->asExpression($this->widget->begin());
    }

    /**
     * End the widget
     *
     * @param array $config suplementry config
     * @return Expression
     */
    public function end($config = [])
    {
        $args = array_pop($this->stack);
        $args[1] = $args[1] ? array_merge($args[1], $config) : [];
        $this->instantiateWidget($args);

        return $this->asExpression($this->widget->end());
    }
}
