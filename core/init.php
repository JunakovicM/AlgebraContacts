<?php

error_reporting(E_ALL); //  E_ALL ispisuje greške dok smo u developmentu
ini_set('display_errors', 1);
ini_set ('display_startup_errors', true);


session_start();
  // session_regenerate_id();

spl_autoload_register(function($class) {
    require_once 'classes/' .$class . '.php';
});

require_once 'functions/sanitize.php';

?>