<?php

namespace Benrowe\Laravel\Widgets;

use Arrilot\Widgets\ServiceProvider as BaseServiceProvider;
use Benrowe\Laravel\Widgets\Factories\WidgetFactory;
use Arrilot\Widgets\Misc\LaravelApplicationWrapper;

/**
 * @package Benrowe\Laravel\Widgets
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Suplement the base provider with a different version of the widget factory
     *
     * @return nil
     */
    public function register()
    {
        parent::boot();

        $this->app->bind('arrilot.widget', function () {
            return new WidgetFactory(new LaravelApplicationWrapper());
        });

        $this->app->alias('arrilot.widget', 'Arrilot\Widgets\Factories\WidgetFactory');

    }

    /**
     * Register two additional blade directives
     *
     * @return nil
     */
    public function boot()
    {
        parent::boot();
        $this->registerBladeDirective('widget-begin', '$1<?php echo app("arrilot.widget")->begin$2; ?>');
        $this->registerBladeDirective('widget-end', '$1<?php echo app("arrilot.widget")->endw$2; ?>');
    }
}
