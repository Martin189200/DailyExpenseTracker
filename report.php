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
        	
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Report</title>
  </head>
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
          <a class="nav-link " href="expenditure.php" >Expenditure <img src="Image/wallet.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link active" href="Report.php" >Report <img src="Image/report.png" alt="" width="25" height="25" class="d-inline-block align-text-top"></a>
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
<section class="min-vh-100 text-lg-start " >
<div class="container py-5 h-100" >
<div class="card" id="card1">
	<div class="card-body">
	<div class="row g-0 d-flex justify-content-center align-items-center ">
	
	<span class="h4 fw-bold mb-0">Select date range within last 30 days</span>
	
	<div class=" mb-4 col-md-6">
         
            <div class="input-group"><span class="input-group-text">From</span>
             <input type="text" id="from" name="from"  class="form-control form-control-lg" placeholder="Choose start date" required/>
             </div>
        </div>
		
		<div class=" mb-4 col-md-6">
            <div class="input-group"><span class="input-group-text">To</span>
             <input type="text" id="to" name="to"  class="form-control form-control-lg" placeholder="Choose end date" required/>
             </div>
        </div>
        
        <div class="pt-1 mb-4">
            <button class="btn btn-lg btn-block " type="button" id="selectBtn" name="select">GO!</button>
            <button class="btn btn-lg btn-block " type="button" id="graphBtn" >To see graph</button>
            
            <!-- <a class="btn btn-lg btn-block " type="submit" id="print" href="printAPI.php" >Print table</a>  -->
                    
        </div>
        <div id="nodate" style=" color:red"></div>
 	
	</div>
	<div class="row g-0" id="showtable">		
	</div>	
	</div>	
	</div>
	
	  
	
	<div class="pie-chart-container py-5 h-100" id="chart">
 	<div class="row d-flex justify-content-center align-items-center h-100">
      
        <div class="card" id="card3">
          
			<canvas id="myChart" ></canvas>
		  
		</div>
	  
</div>
</div>
	
	<div class="card" id="card2">
	<div class="card-body">
	<div class="row g-0 d-flex justify-content-center align-items-center ">
	
	<span class="h4 fw-bold mb-0">Select a category</span>        
		
		<div class=" mb-4 col-md-6">
            <div class="input-group"><span class="input-group-text">Category</span>
             <input type="text" id="category"  class="form-control form-control-lg" placeholder="Enter a category.."required/>
             </div>
             <div id="cerror" ></div>
        </div>
        
        <div class="pt-1 mb-4 ui-widget">
            <button class="btn btn-lg btn-block " type="button" id="categoryBtn" >GO!</button>
                    
        </div>
 
	</div>
	<div class="row g-0" id="showcattable">		
	</div>	
	</div>
	</div>

 
</div>
</section>
<!-- 
<div class="chart-container py-5 h-100">
<div class="pie-chart-container">
	<div class="row d-flex justify-content-center align-items-center h-100">
    
      
        <div class="card" id="card1">        
          <canvas id="myChart"></canvas>
          
        </div>
    
    </div>
    
</div>
</div>
 -->
          

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
    $('#chart').hide();
    
    //daterange
    $('#selectBtn').click(function()
    {
		
		var dateTypeVar = $('#from').datepicker('getDate');
		var fdate= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
		var dateTypeVar1 = $('#to').datepicker('getDate');
		var tdate= $.datepicker.formatDate('yy-mm-dd', dateTypeVar1);	
		if(tdate != '' && fdate!= '')
		  {
			$.ajax({
			method: "POST",
			url: "API/reportAPI.php",
			data: {from:fdate, to:tdate, action:'selectDate'},
			datatype: "json"
			})
			.done(function( msg ) {
			var retObj = JSON.parse(msg);
			
			if(retObj == "There is no expenses in selected date!")
			{
				$('#nodate').html(retObj);
			}
			else
			{
			$('#showtable').html('');
			$('#nodate').html('');
			var table_str='<table class="table table-striped table-bordered" id="expense_table">';
			table_str += '<thead><tr><th>Expense ID</th><th>Date</th><th>Amount</th><th>Category</th></tr></thead><tbody>';
			
			for(let i=0;i<retObj.length;i++)
			
			{ var j = i+1;
				table_str +='<tr><td>'+j+'</td><td>'+retObj[i].date+'</td><td>'+retObj[i].amount+'</td><td>'+retObj[i].category+'</td></tr>';								
				
			}
				table_str += '</tbody></table>';			
			$('#showtable').append(table_str);
			
			
			}
		})
		}//endif
		else {	$('#chart').hide();
				$('#nodate').html("Please select both start and end date!");
				$('#showtable').html('');
				}
		})
    		// barchart
    		$('#graphBtn').click(function()
    		{
    			var dateTypeVar = $('#from').datepicker('getDate');
				var fdate= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
				var dateTypeVar1 = $('#to').datepicker('getDate');
				var tdate= $.datepicker.formatDate('yy-mm-dd', dateTypeVar1);
				if(tdate != '' && fdate!= '')
				{	
    			$.ajax({
				method: "POST",
				url: "API/reportAPI.php",
				type: "JSON",
				data: { from:fdate, to:tdate, action : 'graph'}
				})
				.done(function( data ) {
				
				var retObj=JSON.parse(data);
    			var amount = [];
       			 var category = [];
       			 if(retObj == "error")
			{
				$('#nodate').html("There is no expenses in selected date");
			}
			else
			{

        		for(let i=0;i<retObj.length;i++)
				{
				$.each(retObj[i], function(key, value){
   				 category[i]=retObj[i].category;
   				 amount[i]=Number(retObj[i].totalamount);
					});
					}
       			 //contents of the chart
    		    var chartdata = {
            	labels: category,
            	datasets: [
                	{
                    label : 'Total by Category',
                    backgroundColor:'#687477',
                    color:'#fff',
                    maxBarThickness: 80,
                    minBarLength: 15,
                    data: amount,
                    datalabels: {
                        color: 'blue',
                        anchor: 'end',
                        align: 'top',
                        font: {
                            weight: 'bold'
                        }
                    }
            }
            ]
        };
        var ctx = $('#myChart'); //canvas id in summaryByCategory
        var barGraph = new Chart(ctx,  {
            type: 'bar',
            data: chartdata,
                    });
                  	$('#nodate').html('');
					$('#chart').show();
					$('html, body').animate({
                    scrollTop: $("#chart").offset().top
               		 }, 200);
               		 
					}
                    });

                    }
                    else {;
                    $('#nodate').html("Please select both start and end date!");
                    $('#showtable').html('');
                    $('#chart').hide('');}
                    
    		})
    		//autocomplete
    		$('#category').click(function()
    		{
    		$.ajax({
			method: "POST",
			url: "API/reportAPI.php",
			data: {action:'autocomplete'},
			datatype: "json"
			})
			.done(function( msg ) {
			var retObj = JSON.parse(msg);
			
			   var category = [];
	        for(let i=0;i<retObj.length;i++)
			{
				$.each(retObj[i], function(key, value){
    			category[i]=retObj[i].category;
    				});
			}
				console.log(category);
				 $( "#category" ).autocomplete({
    		  source: category
    		});
    		
			})
    		})
    		//catbtn
    		$('#categoryBtn').click(function()
    		{
    		var cat=$('#category').val();
    		//console.log(cat);
    		if(cat != ''){
    		$.ajax({
			method: "POST",
			url: "API/reportAPI.php",
			data: {category:cat,action:'catBtn'},
			datatype: "json"
			})
			.done(function( msg ) {
			$('#showcattable').html('');
			$('#cerror').html('');
			var retObj = JSON.parse(msg);
			var tamount=0;
			
	        var table_str='<table class="table table-striped table-bordered" id="expense_table">';
			table_str += '<thead><tr><th>Expense ID</th><th>Date</th><th>Amount</th><th>Category</th></tr></thead><tbody>';
			
			for(let i=0;i<retObj.length;i++)
			
			{ var j = i+1;
				tamount = tamount+parseInt(retObj[i].amount);
				table_str +='<tr><td>'+j+'</td><td>'+retObj[i].date+'</td><td>'+retObj[i].amount+'</td><td>'+retObj[i].category+'</td></tr>';								
				
			}
				table_str += '<tr><td colspan="2" style="text-align: center;">Total amount</td><td colspan="2" style="text-align: center;">'+tamount+'</td></tbody></table>';
				console.log(tamount);			
			$('#showcattable').append(table_str);
			})
			} //endif
    		else{$( "#cerror" ).html("Please fill a category!");}
			
    		
    		})

    	})
    	
    	
    
    	
    
    
  $( function() {
    $( "#from" ).datepicker({ minDate: -30, maxDate: "0D" });
    $( "#to" ).datepicker({ minDate: -30, maxDate: "0D" });
    
    
   			
   
  });   
    
    
    

</script>
     </body>
</html>