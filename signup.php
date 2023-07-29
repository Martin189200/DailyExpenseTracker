<?php include('API/login_regAPI.php');?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="sst.css">
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Register</title>
  </head>
  <body>
      <nav class="navbar navbar-dark navbar-expand-lg sticky-top" id="navi">
  <div class="container-fluid">
    <a class="navbar-brand" id="brand" href="" data-bs-toggle="tooltip" data-bs-placement="buttom" title="Home Page"> <img src="Image/expense.png" alt="" width="40" height="40" class="d-inline-block "> Expense Tracker</a>

    <!--
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>  
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            Expenditure <img src="Image/wallet.png" alt="" width="25" height="25" class="d-inline-block">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item disabled" href='expenditure'>Add expense</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item disabled" href="category.php">Manage category</a></li>
          	
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="Report.php" aria-disabled="true">Report <img src="Image/report.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            Account 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="login.php">Login <img src="Image/login.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="signup.php">Register <img src="Image/regis.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?logout='1'">Log Out <img src="Image/logout.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a></li>
          </ul>
        </li>
		<li class="nav-item">
        <a href='accinfo.php' class ="nav-link disabled" aria-disabled="true"><img src="Image/user.png" alt="" width="25" height="25" class="d-inline-block align-text-top" /></a>
  		</li>
  </ul>
  </div>  -->
  </div>
</nav>

    <!-- Section: Design Block -->
<section class="text-center text-lg-start" >
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
    
<!-- <div class="col-lg-6 mb-5 mb-lg-0 " > --> 
	<div class="col-md-6 col-lg-5 d-none d-md-block align-self-center">  <!-- d-none d-md-block -->
        <img src="Image/social-media.gif" class="w-100 rounded-4 shadow-4"
          alt="Sign up now" />
      </div>
          
      <!-- <div class="col-lg-6 mb-5 mb-lg-0"> -->
      <div class="col-md-6  mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Sign up now</h2>
            
            <form action="signup.php" method="POST" id="myform">
            	<?php include('errors.php') ?>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              
                
              <!--   <div class="col-md-6 mb-4"> -->
                
                  <div class="form-outline mb-4">
                  
                    <input type="text" id="r_name" class="form-control form-control-lg"  name="username" required/>
                    <label class="form-label" for="r_name">Username(6-8 characters)</label>
                  </div>
              

              <!-- Email input -->
              <div class="form-outline mb-4">
              
              	<div class="input-group">
                	<input type="email" id="r_mail" class="form-control form-control-lg" name="mail" required/>
                	<span class="input-group-text" >@example.com</span>
                </div>
                <label class="form-label" for="r_mail">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
              
                <input type="password" id="r_password" class="form-control form-control-lg" name="p1" required/>
                <label class="form-label" for="r_password">Password</label>
              </div>

			  <!-- Password comfirm -->
              <div class="form-outline mb-4">
              
                <input type="password" id="r_confirmpassword" class="form-control form-control-lg" name="p2" required/>
                <label class="form-label" for="r_confirmpassword">Confirm password</label><br>
                
                <input type="checkbox" onclick="showPsw()" class="check">Show Password
              </div>
             

              <!-- Submit button -->
              <button type="submit" class="btn  btn-block mb-4" id="signupBtn" value="Sign up" name="reg_user">Sign Up</button>
                
             
              
              <p class="mb-5 pb-lg-2" id="#p">Have an account? <a href="login.php"
                      id="link">Login here</a></p>

             
            </form>
          </div>
        </div>
      </div>      
    </div>
  </div>
  <!-- Jumbotron -->
</section>

<div id="msg"></div>
<!-- Section: Design Block -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
<script>
    function showPsw() {
  var x = document.getElementById("r_confirmpassword");
  var y = document.getElementById("r_password");
  if (x.type == "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
} </script>
    
    
  </body>
</html>