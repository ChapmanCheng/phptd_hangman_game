<?php

spl_autoload_register('autoLoader');

function autoLoader($class)
{
    $path = __DIR__ . '/classes/';
    require $path . $class . '.inc.php';
}
