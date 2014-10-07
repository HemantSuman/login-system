<?php
include_once 'include/functions.php';

$user = new User();
    if ($user->get_session())
    {
        header("location:home.php");
    } 

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $register = $user->register_user($_POST['name'], $_POST['username'], $_POST['password'], $_POST['email']);
        if ($register)
        {
            echo "Registration successful <a href='login.php'>Click here</a> to login";
        } else
        {
        echo "Registration failed. Email or Username already exits please try again";
        }
    }
?>
<form method="POST" action="" name="reg" >
Full Name
<input type="text" name="name"/>
Username
<input type="text" name="username"/>
Password
<input type="password" name="password"/>
Email
<input type="text" name="email"/>
<input type="submit" value="Register"/>
</form>