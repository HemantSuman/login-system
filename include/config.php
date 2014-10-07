<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','hemant_login');

class DB_Class{

    function __construct(){
        
        $connection = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die(mysql_error());
        mysql_select_db(DB_DATABASE) or die(mysql_error());
        
    }
}
?>
