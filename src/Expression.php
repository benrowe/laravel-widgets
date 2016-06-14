<?php

namespace Benrowe\Laravel\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\HtmlString;

/**
 * Represents the widget after it has been executed.
 *
 * This expression allows the widets to be outputted (aka echo'd) or
 * allows access to the public methods of the widget inside the view.
 *
 * @package Benrowe\Laravel\Widgets
 */
class Expression extends HtmlString
{
    protected $widget;

    public function __construct($html, AbstractWidget $widget)
    {
        $this->widget = $widget;
        parent::__construct($html);
    }

    public function getWidget()
    {
        return $this->widget;
    }

    public function __call($method, array $params = [])
    {
        if (is_callable($this->widget, $method)) {
            return call_user_func_array([$this->widget, $method], $params);
        }
        throw new InvalidArgumentException(
            sprintf(
                '"%s" does not have a method of "%s"',
                get_class($this->widget),
                $method
            )
        );
    }
}
