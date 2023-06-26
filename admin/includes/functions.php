<?php 

function my_autoloader($class) {
    include_once 'includes/' . $class . '.php';
  }
  
  spl_autoload_register('my_autoloader');






function redirect($location){

   header("Location: {$location}")


}



?>