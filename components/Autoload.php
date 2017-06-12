<?php

function __autoload($class_name){
    $dir_paths = array(
        '/components/',
        '/controllers/',
        '/models/'
    );

    foreach ($dir_paths as $path){
        $path = ROOT.$path.$class_name.'.php';

        if(is_file($path)){
            include_once $path;
        }
    }

}