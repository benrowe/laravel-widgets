<?php

namespace Benrowe\Laravel\Widgets\Factories;

use Arrilot\Widgets\Factories\WidgetFactory as BaseWidgetFactory;
use Benrowe\Laravel\Widgets\Expression;
use Benrowe\Laravel\Widgets\Traits\BeginEndFactory;

/**
 * Widget Factory
 *
 * @package Benrowe\Laravel\Widgets
 */
class WidgetFactory extends BaseWidgetFactory
{
    use BeginEndFactory;

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
