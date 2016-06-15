<?php

namespace Benrowe\Laravel\Widgets\Traits;

use Benrowe\Laravel\Widgets\Expression;

/**
 * When used in conjection with your concrete widget, enables the widget
 * to be used with begin/end calls
 *
 * @package Benrowe\Laravel\Widgets
 */
trait WidgetWrapper
{
    /**
     * Begin the widget
     *
     * @return Expression
     */
    abstract public function begin();

    /**
     * End the widget
     *
     * @param  array $params additional config to suplement the instanciated
     *                       widget
     * @return Expression    The result
     */
    abstract public function end(array $params = []);
}
