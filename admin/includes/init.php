<?php


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'learn' . DS . 'Detyra1' . DS . 'CMS_TEMPLATE_PHP');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes' . DS . 'images');



        require_once('functions.php');
        require_once('database.php'); 
        require_once('user.php');
        require_once('session.php');
        require_once('db_object.php');
        require_once('photo.php');
?>