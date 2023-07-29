<?php

require_once 'db.php';
session_start();
$db = new mysqli($host, $user, $pass, $database);

$u_id = $_SESSION['u_id'];
$method = strtolower($_SERVER['REQUEST_METHOD']);

if(isset($_POST["action"]))
{
if ($_POST["action"] == 'changeinfo')
{
    $newName = htmlspecialchars($_POST['name']);
    $email = $_POST['mail'];
    
   
    $user_check_query = "SELECT * FROM users WHERE username='$newName' AND email='$email'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_array($result);
   
    if ($user) { // if user exists
        if ($user['username'] === $username) {
            echo "Username already exists";  
        }
        else if ($user['email'] === $email) {
            echo "Email already exists";
        }
    }
        
        else {
            $query = "UPDATE users SET username='$newName', email='$email'WHERE u_id= '$u_id'";
            // echo $query;
            $result = $db->query($query);
            $_SESSION['username'] = $newName;
           
            echo "Your username and email is successfully updated.";
        }
    
    
}

if ($_POST["action"] == 'pswchange')
{       
        $psw_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        $old_psw = md5($_POST['old']);
        $new_psw = $_POST['new'];
        $cnew_psw = $_POST['cnew'];
        if($old_psw == $_SESSION['password'])
        {  
            if(preg_match($psw_regex,$new_psw) && preg_match($psw_regex,$cnew_psw))
            {   
                $password = md5($new_psw);
                $query = "UPDATE users SET password='$password' WHERE u_id= '$u_id'";
                // echo $query;
                $result = $db->query($query);
                $_SESSION['password']= $password;
                echo "Your password is successfully updated.";
            }
            else {
                echo "Password must has minimum 8 characters including at least<br>-one uppercase and lowercase letter<br>-one digit and a special character!";
            }
          
        }
        else {
            echo "Old password is wrong!";
        }
}
}
?>