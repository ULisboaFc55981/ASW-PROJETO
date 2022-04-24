<?php 
//Inicia todas as opções essenciais e opcionais do website
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('SITE_ROOT', dirname(__FILE__));

include SITE_ROOT . '/config/settings.php';

include SITE_ROOT .'/functions/app.php';
include_once  SITE_ROOT .'/config/settings.php';
include  SITE_ROOT .'/functions/auth.php';
include  SITE_ROOT .'/functions/dbconnections.php';
include  SITE_ROOT .'/functions/crud.php';

