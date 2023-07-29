<?php include_once 'session.php';?>
<!doctype html>
<html lang="en">
  <head>
  <script src="https://kit.fontawesome.com/e5fca70c43.js" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="sst.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>Account Information</title>
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-lg sticky-top" id="navi">
  <div class="container-fluid">
    <a class="navbar-brand" id="brand" href="" data-bs-toggle="tooltip" data-bs-placement="buttom" title="Home Page"> <img src="Image/expense.png" alt="" width="40" height="40" class="d-inline-block"> Expense Tracker</a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> <!-- hamburger -->
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0"><!-- me>margin end, mb>margin button -->
        
         <li class="nav-item">
          <a class="nav-link" href="expenditure.php" >Expenditure <img src="Image/wallet.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link " href="Report.php" >Report <img src="Image/report.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
        </li>
        
        <li class="nav-item ">
          
          <a class="nav-link" href="session.php?logout='1'">Log Out <img src="Image/logout.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
          
        </li>
        
		<li class="nav-item">
        <a href='accinfo.php' class ="nav-link active " data-bs-toggle="tooltip" data-bs-placement="left" title="Account Info" ><img src="Image/user.png" alt="" width="28" height="28" class="d-inline-block align-text-top"></a>
  		</li>
  </ul>
  </div>
  </div>
</nav>

<section class="min-vh-100 text-lg-start" >
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      
        <div class="card" id="card1">
        <div class="row g-o">
        <div class=" col d-flex align-items-center ">
             <span class="h1 fw-bold ">Account Information</span>
        </div>
        </div>
          <div class="row g-0">
          
            <div class="col-md-6 col-lg-6  align-self-center">
            <div class="card-body text-black"> 
            
               <div id='error' style="color:red;font-size: 18px; "></div>
				  <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>                    
                    <input type="text" name ="username" class="form-control form-control-lg" id="username" placeholder="<?php echo $_SESSION['username']?>"/>
                  </div>
				  
				  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Your email</label>                    
                    <input type="text" name ="email" class="form-control form-control-lg" id="email"  placeholder="<?php echo $_SESSION['email']?>"/>
                  </div>	
                  <div class="pt-1 mb-4">
                   <button class="btn  btn-lg btn-block"  id="infochangeBtn"  name="change">Change Info</button>
                 <!--<input class="btn  btn-lg btn-block" type="button" id="loginBtn" value="Login" name="login_user"/> -->
                          
                  </div>                 
                
            </div>
            </div>
            
            <div class="col-md-6 col-lg-6 d-flex align-self-center">
              <div class="card-body text-black"> 
              
          		<div id="error2" style="color:red; font-size: 18px;"></div>         
          				
          		<div class="form-outline mb-4">
                    <label class="form-label" for="old_psw">Enter old password</label>
                    <input type="password"  class="form-control form-control-lg" id="old"/>
                </div>
                
                <div class="form-outline mb-4">
                    <label class="form-label" for="new_psw">Enter new password</label>
                    <input type="password"  class="form-control form-control-lg" id="new"/>
                </div>
                  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="cnew_psw">Confirm new Password</label>
                    <input type="password" class="form-control form-control-lg" id="cnew"/>
                    <input type="checkbox" onclick="showPsw()">Show Password
                  </div>
                  <div class="pt-1 mb-4">
                  <button class="btn  btn-lg btn-block"  id="pswchangeBtn" >Change password</button>
                 <!--<input class="btn  btn-lg btn-block" type="button" id="loginBtn" value="Login" name="login_user"/> -->
                 </div>
           
              
              </div>
            </div>

	
    </div>         
   </div>
  </div>          
 </div>

  
</section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
    
    	
    $(document).ready(function()
    {	
		//pswchange
		$('#pswchangeBtn').click(function(){
		
		var old_psw = $('#old').val();
		var new_psw = $('#new').val();
		var cnew_psw = $('#cnew').val();
				
		if(old_psw != '' && new_psw != '' && cnew_psw!= '')
		{	
			if(new_psw == cnew_psw)
			{
				$.ajax({
				method: "POST",
				url: "API/accinfoAPI.php",
				data: { old:old_psw, new:new_psw, cnew:cnew_psw, action:'pswchange' },
				})
				.done(function(msg) {
					$('#error2').html(msg);
				});
			} //psw-match-endif
			else 
			{
				$('#error2').html('New passwords are not match!');
			}
		}//check-null-enif
		else
			{$('#error2').html('Fill all three password fields!');}
		});
		
		//infochange
		$('#infochangeBtn').click(function(){
		
		
		var username = $('#username').val();
		var email = $('#email').val();
		//console.log('hi');
		//console.log(jQuery.type(username));
		
		if(username != '' && email != '')
		{
		console.log('hi2');
		$.ajax({
		method: "POST",
		url: "API/accinfoAPI.php",
		data: { name:username, mail:email, action:"changeinfo" },
		
		})
		.done(function(msg) {
		
		$('#error').html(msg);
			
		});
		} //endif
		else { $('#error').html('Fill new username and email'); }
		});
		
		
});
  
 function showPsw() {
  var x = document.getElementById("cnew");
  var y = document.getElementById("new");
  var z = document.getElementById("old");
  if (x.type === "password") {
    x.type = "text";
    y.type = "text";
    z.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
    z.type = "password";
  }
}   
    </script>
  </body>
</html>