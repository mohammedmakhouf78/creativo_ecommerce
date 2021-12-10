<?php

if (!function_exists("dd")) {
    function dd($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        die;
    }
}

if (!function_exists("assets")) {
    function assets($path)
    {
        return "http://localhost/projects/creativo/ecommerce/assets/$path";
    }
}
