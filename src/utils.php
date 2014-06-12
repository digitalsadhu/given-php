<?php

if (!function_exists('describe')) {
    /**
     * @see GivenPHP::describe
     *
     * @param $description
     * @param $callback
     *
     * @return void
     */
    function describe($description, $callback)
    {
        GivenPHP::get_instance()->describe($description, $callback);
    }
}

if (!function_exists('context')) {
    /**
     * @see GivenPHP::context
     *
     * @param $description
     * @param $callback
     *
     * @return void
     */
    function context($description, $callback)
    {
        GivenPHP::get_instance()->context($description, $callback);
    }
}

if (!function_exists('given')) {
    /**
     * @see GivenPHP::given
     *
     * @param $name
     * @param $value
     *
     * @return void
     */
    function given($name, $value)
    {
        GivenPHP::get_instance()->given($name, $value);
    }
}

if (!function_exists('when')) {
    /**
     * @see GivenPHP::when
     *
     * @param $callback
     *
     * @return void
     */
    function when($callback)
    {
        GivenPHP::get_instance()->when($callback);
    }
}

if (!function_exists('then')) {
    /**
     * @see GivenPHP::then
     *
     * @param $callback
     *
     * @return void
     */
    function then($callback)
    {
        GivenPHP::get_instance()->then($callback);
    }
}
