<?php
spl_autoload_register(function($className) {
     
    // Replace string with directory separator for namespace and classname
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    if (file_exists($className . '.php')) {
        require_once($className . '.php');
    }
});
?>