<?php

namespace Benrowe\Laravel\Widgets\Traits;

/**
 * Caching trait for Widgets
 *
 * By including this trait in with your widget, it will cache it's output
 *
 * @package Benrowe\Laravel\Widgets\Traits
 */
trait Cache
{
    /**
     * The duration of the cache in seconds
     *
     * @return int
     */
    public function cacheDuration()
    {
        return  300;
    }

    /**
     * [cacheEnabled description]
     * @return [type] [description]
     */
    public function cacheEnabled()
    {
        return true;
    }
}
