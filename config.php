<?php


//phpinfo();





function my_autoloader($class) {
    require_once 'classes/' . $class . '.php';
}

spl_autoload_register('my_autoloader');




?>