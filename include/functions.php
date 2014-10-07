<?php
include_once "include/config.php";
class User{

    public function __construct(){
    
        $db = new DB_Class();

    }
    
    public function register_user($name,$username,$password,$email){
        
        $password = md5($password);
        
        $sql = mysql_query("select uid from users WHERE username = '".$username."' or email = '".$email."' ");
        $num_row = mysql_num_rows($sql);
        if($num_row == 0){
            
            $result = mysql_query("INSERT INTO users values('','$username','$password','$name','$email')") or die(mysql_error());
            return $result;
        }
        else{
            return FALSE;
        }
    }
    
    public function get_session(){
        
        return isset($_SESSION['login']);
    }
    
    public function check_login($emailusername,$password){
        
        $password = md5($password);
        $result = mysql_query("SELECT uid from users WHERE email = '".$emailusername."' or username = '".$emailusername."' and password = '".$password."' ");
        $user_data = mysql_fetch_array($result);
        $num_rows = mysql_num_rows($result);
        
        if($num_rows == 1){
            
            $_SESSION['login'] = true;
            $_SESSION['uid'] = $user_data['uid'];
            return true;
        }else{
            
            return false;
        }
    }
    
    public function get_fullname($uid){
        
        $result = mysql_query("SELECT name FROM users WHERE uid = $uid");
        $user_data = mysql_fetch_array($result);
        echo $user_data['name'];
    }
    
    public function get_session1(){
        
        return $_SESSION['login'];
    }

    public function user_logout(){
        
        $_SESSION['login'] = FALSE;
        session_destroy();
    } 

 
}
    ?>