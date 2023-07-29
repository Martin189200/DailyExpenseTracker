<?php include('API/login_regAPI.php');?>
<!doctype html>
<html lang="en">
  <head>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/e5fca70c43.js" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="sst.css">
    <title>Login</title>
  </head>
  <body>
   <!--  <nav class="navbar navbar-dark navbar-expand-lg sticky-top" id="navi">
  <div class="container-fluid">
    <a class="navbar-brand" id="brand" href="" data-bs-toggle="tooltip" data-bs-placement="buttom" title="Home Page"> <img src="Image/expense.png" alt="" width="40" height="40" class="d-inline-block "> Expense Tracker</a>

    
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
            <li><a class="dropdown-item" href=#>Login <img src="Image/login.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="signup.php">Register <img src="Image/regis.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a></li>         	
          </ul>
        </li>
		<li class="nav-item">
        <a href='accinfo.php' class ="nav-link disabled" aria-disabled="true" >
        	<img src="Image/user.png" alt="" width="28" height="28" class="d-inline-block align-text-top"/></a>
  		</li>
  </ul>
  </div>
  </div>
</nav>  -->
	  <section class="min-vh-100 py-5" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-10">
        <div class="card" id="card1">
          <div class="row g-0">
          
            <div class=" col-md-5 d-none d-md-block align-self-center">
              <img src="Image/login-page.jpg "
                alt="login" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
           
           
            
            <div class="col-md-7 col-lg-7 d-flex align-self-center">
              <div class="card-body text-black"> 
              
				<div class="d-flex align-items-center mb-3 pb-1">
                    <img src="Image/expense.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
                    <span class="h1 fw-bold mb-0">Expense Tracker</span>
                  </div>
                  <div>
                  
                <form  action="login.php" method="POST" id="formID">
                <?php include('errors.php') ?>
                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>                    
                    <input type="text" name ="username" class="form-control form-control-lg" id="username"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" id="psw"/>
                    <input type="checkbox" onclick="showPsw()">Show Password
                  </div>

                  <div class="pt-1 mb-4">
                   <button class="btn  btn-lg btn-block" type="submit" id="loginBtn"  name="login_user">Login</button>
                 <!--     <input class="btn  btn-lg btn-block" type="button" id="loginBtn" value="Login" name="login_user"/> -->
                  
                  </div>
               
                </form>
                 	 
                  <h3 class="mb-5 pb-lg-2" id="p">Don't have an account? <a href="signup.php"
                      id="link">Register</a></h3>
                  
               
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>

function showPsw() {
    var x = document.getElementById("psw");
  if (x.type === "password") {
    x.type = "text";
    
  } else {
    x.type = "password";
    
  }
}  
</script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
   -->
      
  </body>
</html>