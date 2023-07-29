<?php
require_once 'db.php';
session_start();
$conn = new mysqli($host, $user, $pass, $database);


/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$username = $_SESSION['username'];
$u_id = $_SESSION['u_id'];
//echo $u_id;
if(isset($_POST["action"]))
{
    if($_POST["action"] == 'selectDate')
    {
        $fromDate = $_POST['from'];
        $toDate = $_POST['to'];
        $query = "SELECT * FROM expense where u_id='$u_id' AND date BETWEEN '$fromDate' AND '$toDate';";
        $result = $conn->query($query);
      // echo $query;
        if($result->num_rows == 0 )
        {
            $json_string = json_encode("There is no expenses in selected date!", JSON_UNESCAPED_UNICODE);
            echo $json_string;
        }
        else 
        {
            $all_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $json_string = json_encode($all_row, JSON_UNESCAPED_UNICODE);
            echo $json_string;
        }
    }
    
    if($_POST["action"] == 'autocomplete')
    {
        $query = "SELECT category FROM categories ORDER BY category ASC;";
        $result = $conn->query($query);
        
        if($result->num_rows > 0 )
        {
            $all_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $json_string = json_encode($all_row, JSON_UNESCAPED_UNICODE);
            echo $json_string;
        }
        else {   
            $json_string = json_encode("Error", JSON_UNESCAPED_UNICODE);
            echo $json_string;}
        
    }
    
    if($_POST["action"] == 'graph')
    {
        $fromDate = $_POST['from'];
        $toDate = $_POST['to'];
        $query = "SELECT  date,category,sum(amount) as totalamount FROM expense where u_id='$u_id' AND date BETWEEN '$fromDate' AND '$toDate' GROUP BY (category);";
        $result = $conn->query($query);
        
        if($result->num_rows > 0 )
        {
            $all_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $json_string = json_encode($all_row, JSON_UNESCAPED_UNICODE);
            echo $json_string;
        }
        else {
                $json_string = json_encode("error", JSON_UNESCAPED_UNICODE);
                 echo $json_string;}
            
    }
    
    if($_POST["action"] == 'catBtn')
    {
        $cat = $_POST['category'];
        
        $query = "SELECT  date,category,amount FROM expense e INNER JOIN users u ON e.u_id= u.u_id where u.username='$username'  AND category='$cat';";
        $result = $conn->query($query);
        
        if($result->num_rows > 0 )
        {
            $all_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $json_string = json_encode($all_row, JSON_UNESCAPED_UNICODE);
            echo $json_string;
        }
        else {
            $json_string = json_encode("Error", JSON_UNESCAPED_UNICODE);
            echo $json_string;}
            
    }
    
    
    
}