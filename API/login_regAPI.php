<?php
require_once 'db.php';
session_start();
$db = new mysqli($host, $user, $pass, $database);

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//$method = strtolower($_SERVER['REQUEST_METHOD']);
//Login user
if (isset($_POST['login_user']))  {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    
    
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
    if (count($errors) == 0) { 
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = $db ->query($query);
        $all_rows = mysqli_fetch_array($results, MYSQLI_ASSOC);
        
       
        if (mysqli_num_rows($results) == 1) {
            
            
            $_SESSION['username'] = $all_rows['username'];
            $_SESSION['u_id'] = $all_rows['u_id'];
            $_SESSION['email'] = $all_rows['email'];
            $_SESSION['password'] = $all_rows['password'];
           
            header('location: expenditure.php');
        }else {
            array_push($errors, "Wrong username/password combination");
           // array_push($errors, $all_rows);
        }
    }
}
// REGISTER USER

if (isset($_POST['reg_user']))  {
    // receive all input values from the form
    $username = $_POST['username'];
    $email =  $_POST['mail'];
    $password_1 = $_POST['p1'];
   $password_2 =  $_POST['p2'];
   
   $psw_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    
 

  if (!preg_match("/^[A-Za-z]*$/",$username)) { array_push($errors, "Only letters are allowed"); }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "* Please enter a valid email address*"); }
  if ($password_1 != $password_2) 
      {
      array_push($errors, "The two passwords do not match");
      }
      else if(!preg_match($psw_regex,$password_1))
        {
          array_push($errors, "Password must has minimum 8 characters including at least<br>-one uppercase and lowercase letter<br>-one digit and a special character.");
        }
        else{
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	$result = mysqli_query($db, $query);
  	if($result == 'true'){
  	//$_SESSION['success'] = "You are now logged in";
  	    header('location: login.php');
  	     }
  	     else
  	     {
  	         array_push($errors, "An error is occured!");
  	     }
  }
 }
}


?>