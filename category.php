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
    <title>Category</title>
  </head>
  <body >
<!--  <nav class="navbar navbar-dark navbar-expand-lg sticky-top" id="navi">
  <div class="container-fluid">
    <a class="navbar-brand" id="brand" href="index.php" data-bs-toggle="tooltip" data-bs-placement="buttom" title="Home Page"> <img src="Image/expense.png" alt="" width="40" height="40" class="d-inline-block "> Expense Tracker</a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> 
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            Expenditure <img src="Image/wallet.png" alt="" width="25" height="25" class="d-inline-block">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item " href='expenditure.php'>Add expense</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="category.php">Manage category</a></li>
          	
          </ul>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link " href="Report.php" >Report <img src="Image/report.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
        </li>
        <li class="nav-item ">
          
          <a class="nav-link" href="index.php?logout='1'">Log Out <img src="Image/logout.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
          
        </li>
		<li class="nav-item">
        <a href='accinfo.php' class ="nav-link " data-bs-toggle="tooltip" data-bs-placement="left" title="Account Info" ><img src="Image/user.png" alt="" width="28" height="28" class="d-inline-block align-text-top"></a>
  		</li>
  </ul>
  </div>
  </div>
</nav>

<section class="text-center text-lg-start min-vh-100" >
 

  
    
     <div class="row  justify-content-center bg-white">
    <div class="col-lg-8 mb5  align-self-center" >
    
     -->
     <div class="container py-5">
      <div class="card p-4 p-lg-5" id="card1">    
            
      <div class="card-body p-4 p-lg-5 shadow-5 text-center">
      
        <h2 class="fw-bold ">Manage your category</h2>
            
            <table class="table table-striped table-hover" id="cat_t">
  				<thead>
    				<tr>
      				<th scope="col">#</th>
      				<th scope="col">Category</th>
      				</tr>
  				</thead>
  			<tbody id="t">
  			</tbody>
			 </table> 
			 <div id="add_c">
			 
			 Category :
			 <input type="text" id="add_cat" />
             <button class="btn btn-lg btn-block " type="button" id="addBtn" name="add">Add category</button>
        	 <h5 id="error" style="color:red;"> </h5>
        	 
          </div>
        </div>
        </div>
        
     </div>
<!-- 
     </div>
    </div>
  
   
 </section> -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
    <script>
    
    $(document).ready(function(){
    
   	var newBtn="<button class='btn btn-md btn-block deleteBtn' type='button' >Delete</button>";
    $.ajax({
			method: "POST",
			url: "API/categoryAPI.php",
			
			datatype: "json"
			})
			.done(function( msg ) {
			var retObj = JSON.parse(msg);
			
			var table_str='';
			for(let i=0;i<retObj.length;i++)
			{	
				var j =i+1;
				
				table_str +='<tr><td>'+j+'</td><td class="cat">'+retObj[i].category+'</td></tr>';
													
			}
				
			$('#t').append(table_str);
			})
		
		
		
		$('#addBtn').click(function()
			{	
			var new_c = $('#add_cat').val();
			
			if (new_c != 0 && new_c.match(/^[A-Za-z]+$/))
			{
				$.ajax({
						method: "PUT",
						url: "API/categoryAPI.php",
						data: {newcat:new_c},
						datatype: "json"
						})
				.done(function( msg ) 
				{
					$('#add_cat').val("");
					var retObj = JSON.parse(msg);
					if(retObj == "Category already exists!"){$("#error").html(retObj);}
					else {
					var new_str='';		
			  		new_str +='<tr><td>'+ retObj[0].c_id +'</td><td class="cat">'+retObj[0].category+'</td></tr>';
															
					$('#t').append(new_str);
					$("#error").html("Category is added!");
						}
					
				})
			}
			else { $("#error").html("Category must be alphabets only!");};
			});	
			
		});
    

		</script>
  </body>
</html>