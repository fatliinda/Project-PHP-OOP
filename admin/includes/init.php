<?php


       defined('DS') ? null: define('DS', DIRECTORY_SEPARATOR);
        define('SITE_ROOT',DS . 'C:'. DS .'xampp'. DS .'htdocs'. DS .'learn'. DS .'Detyra1'. DS .'CMS_TEMPLATE  PHP');
        defined('INCLUDES_PATH')? null : define('INCLUDES_PATH', SITE_ROOT .DS. 'admin'.DS.'includes');


        require_once('functions.php');
        require_once('database.php'); 
        require_once('user.php');
        require_once('session.php');
        require_once('db_object.php');
        require_once('photo.php');
?>