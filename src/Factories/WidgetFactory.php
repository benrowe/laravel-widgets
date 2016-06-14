<?php

namespace Benrowe\Laravel\Widgets\Factories;

use Arrilot\Widgets\Factories\WidgetFactory as BaseWidgetFactory;
use Benrowe\Laravel\Widgets\Expression;
use Benrowe\Laravel\Widgets\Traits\BeginEndFactory;

/**
 *
 *
 * @package Benrowe\Laravel\Widgets
 */
class WidgetFactory extends BaseWidgetFactory
{
    use BeginEndFactory;

    /**
     * Convert the outputted html to an expression
     *
     * @param  string $html
     * @return Expression
     */
    protected function asExpression($html)
    {
        return new Expression($html, $this->widget);
    }
}
