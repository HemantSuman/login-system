<?php
session_start();
include_once 'include/functions.php';
$user = new User();

    if ($user->get_session())
        {
            header("location:home.php");
        }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $login = $user->check_login($_POST['emailusername'],$_POST['password']);
            if($login){
                header('location:login.php');
            }else{
                $msg = "incorrect detail";
            }
        }
      
if(isset($msg))      
echo $msg; 
?>

<form method="POST" action="" >
    
Email or Username
<input type='text' name='emailusername'/>
Password
<input type='password' name='password'/>
<input type='submit' value='Login'/>
</form>
