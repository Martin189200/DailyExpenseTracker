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
    <title>Expenditure</title>
  </head>
  
  <script>
$( function() {
$("#date").datepicker({ minDate: -30, maxDate: "0D" });

} );
</script>
  <body>
  
    <nav class="navbar navbar-dark navbar-expand-lg  sticky-top" id="navi">
  <div class="container-fluid">
    <a class="navbar-brand" id="brand" href="index.php" data-bs-toggle="tooltip" data-bs-placement="buttom" title="Home Page" > <img src="Image/expense.png" alt="" width="40" height="40" class="d-inline-block"> Expense Tracker</a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> <!-- hamburger -->
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-md-0"><!-- me>margin end, mb>margin button -->
        
        <li class="nav-item">
          <a class="nav-link active" href="#" >Expenditure <img src="Image/wallet.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="Report.php" >Report <img src="Image/report.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
        </li>
        <li class="nav-item ">
          
          <a class="nav-link" href="session.php?logout='1'">Log Out <img src="Image/logout.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
          
        </li>
		<li class="nav-item">
        <a href='accinfo.php' class ="nav-link " data-bs-toggle="tooltip" data-bs-placement="left" title="Account Info" ><img src="Image/user.png" alt="" width="28" height="28" class="d-inline-block align-text-top"></a>
  		</li>
  </ul>
  </div>
  </div>
</nav>

<section class="min-vh-100 text-lg-start " > <!-- style="background-color:#E1C2B3;">  -->
  <div class="container py-5 h-100">
    
    <div class="row d-flex justify-content-center align-items-center h-100">
      
      <div class="col col-xl-10">
        
        <div class="card" id="card1" > <!--background-color :#edb518;" >#C3A6A0">  -->
         
          <div class="row g-0">
           
            <div class="col-md-6 col-lg-5 d-none d-md-block">
            
            <div class="card-body p-4 p-lg-5 text-black">
            
            <div class="d-flex align-items-center mb-3 pb-1">
                    
                    <span class="h1 fw-bold mb-0">Today expenses</span>
            </div>  
            
              <table class="table table-striped table-bordered"" id='tdy_t'>
  				<thead>
    				<tr>
      				<th scope="col">#</th>
      				<th scope="col">Date</th>
      				<th scope="col">Amount</th>
      				<th scope="col">Category</th>
    				</tr>
  				</thead>
  			<tbody>
   
  			</tbody>
			 </table> 
			 
            </div>
            
            </div>
            
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    
                    <span class="h1 fw-bold mb-0">Add expense here <?php echo $_SESSION['username'] ?> </span>
                  </div>
                  <div id="test" class="h5 fw-bold mb-0" style="color:red"></div>
				
				  <div class="form-outline mb-4" id="form">
				  	<label class="form-label" for="category">Category</label>
				  	<select class="form-control form-control-lg" id="category" required>
				  		<option value="" disabled selected>Select your category</option>
                        
                    </select>
                    
                    
                  </div>  

                  <div class="form-outline mb-4">
                    <label class="form-label" for="amount">Amount</label>
                    <div class="input-group"><span class="input-group-text">MMK</span>
                    <input type="number" id="amount" class="form-control form-control-lg" required/>
                    </div>
                  </div>
                  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="date">Date</label>
                    <!--  <input type="date" id="date" class="form-control form-control-lg" /> -->
                    <input type="text" id="date" class="form-control form-control-lg" required/>
                  </div> 

                  <div class="pt-1 mb-4">
                    <button class="btn btn-lg btn-block " type="button" id="saveBtn" name="save">Save</button>
                    <button class="btn btn-lg btn-block " type="button" id="add_c">To add new category</button>
                  </div>
  				  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div id="cat"></div>
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
   		 var click_cat=0;	
		$(document).ready(function(){
		
		$.ajax({
		method: "GET",
		url: "API/expenseSaveAPI.php",
		datatype: 'json'
		})
		.done(function(msg) {
		
		var retObj = JSON.parse(msg);
			
			var table_str='';
          	
			for(let i=0;i<retObj.length;i++)
			{	j = i+1;
				table_str +='<tr><td>'+j+'</td><td>'+retObj[i].date+'</td><td>'+retObj[i].amount+'</td><td>'+retObj[i].category+'</td></tr>';
													
			}
				
			$('#tdy_t').append(table_str);
		});	
			
			
		$('#category').click(function(){
		
		 if (click_cat < 1){
		 	click_cat= click_cat+1 ;
			
			$.ajax({
			method: "POST",
			url: "API/expenseAPI.php",
			
			datatype: "json"
			})
			.done(function( msg ) {
			var retObj = JSON.parse(msg);
		
			var table_str='';
          
			for(let i=0;i<retObj.length;i++)
			{	
				$.each(retObj[i], function(key, value){
   			 	table_str +='<option class="c_choose">'+retObj[i].category+'</option>';
													});
			}
		
			$('#category').append(table_str);
		})
		}
		
		});
		
		$('#saveBtn').click(function(){
		
			var dateTypeVar = $('#date').datepicker('getDate');
			var date= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
			var cate = $(category).val();
			var amot = parseFloat($(amount).val());
				$('#test').html('');
			//console.log(jQuery.type(amot));
			//console.log(amot);
			if(cate != null && amot != 0 && date != '' )
				{ 	
					//if(amot.isNumeric())	
				//	{
					$.ajax({
							method: "POST",
							url: "API/expenseSaveAPI.php",
							data: { cat:cate, amt:amot, idate:date },
							datatype:'json'
							})
					.done(function(msg) 
					{
					
						$('#test').html(msg);
						
					});
				//}
				//else {$('#test').html("Amount must be only numbers!");}
				}
			else 
				{   $('#test').html("You must fill all boxes!");
					}
		});
		
		$('#add_c').click(function()
		{	
			$('#cat').load("category.php");
			$('html, body').animate({
                    scrollTop: $("#cat").offset().top
                }, 200);
		});
		
		});
		
		

    </script>
  </body> <!-- datatype: "json" var r = JSON.parse(msg); -->
</html>