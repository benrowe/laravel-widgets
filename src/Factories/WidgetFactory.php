<?php

namespace Benrowe\Laravel\Widgets\Factories;

use Arrilot\Widgets\Factories\WidgetFactory as BaseWidgetFactory;
use Arrilot\Widgets\AbstractWidget;
use Benrowe\Laravel\Widgets\Expression;
use Benrowe\Laravel\Widgets\Traits\WidgetWrapperFactory;

/**
 * Widget Factory
 *
 * @package Benrowe\Laravel\Widgets
 */
class WidgetFactory extends BaseWidgetFactory
{
    use WidgetWrapperFactory;

    /**
     * Instanciate the widget, based on the provided configuration
     * and return the instance of the widget
     *
     * @param  array $params widget parameters
     * @return AbstractWidget
     */
    public function initWidget(array $params = [])
    {
        $this->instantiateWidget($params);
        return $this->widget;
    }

    /**
     * Convert the outputted html to an expression.
     * The expression represents both the output (string) and the instance of
     * the related widget
     *
     * @param  string $html
     * @return Expression
     */
    protected function asExpression($html)
    {
        return new Expression($html, $this->widget);
    }
}
