<?php

spl_autoload_register(null, false);

spl_autoload_extensions('.php, .class.php');

function classLoader($className)
{
    $currentDir = dirname(__FILE__);

    $pieces = explode('\\', $className);
    array_shift($pieces);

    $className = implode("\\", $pieces);

    $pieces = preg_split('/(?=[A-Z])/', $className, -1, PREG_SPLIT_NO_EMPTY);

    while (count($pieces) > 0) {

        $filePath = implode('', $pieces);

        $file = sprintf('%s/%s/src/%s.class.php', $currentDir, $filePath, $className);

        if (file_exists($file))
        {
            include $file;
            break;
        }

        array_pop($pieces);
    }

    return false;
}

spl_autoload_register('classLoader');
