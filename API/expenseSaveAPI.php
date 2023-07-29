<?php
require_once 'db.php';
session_start();
$conn = new mysqli($host, $user, $pass, $database);


/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$method = strtolower($_SERVER['REQUEST_METHOD']);
$username= $_SESSION['username'];
$u_id= $_SESSION['u_id'];

if ($method == "get")
{
    $qry = "SELECT date,amount,category FROM expense where u_id='$u_id' AND date=current_date();";
    $rt = $conn->query($qry);
    $rows = mysqli_fetch_all($rt, MYSQLI_ASSOC);
    
    $json_string = json_encode($rows, JSON_UNESCAPED_UNICODE);
    echo $json_string;
}

if ($method == "post")
{
    $amount = htmlspecialchars($_REQUEST['amt']);
    $category = $_REQUEST['cat'];
    $date=$_REQUEST['idate'];
    
    //if(is_int($amount)){
    $query = "SELECT c_id FROM categories where category ='$category';";
    $result = $conn->query($query);
    $all_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $c_id = implode("",array_values($all_row[0]));
    
         if($stmt = $conn->prepare("INSERT INTO expense(u_id, c_id, category, amount, date)  VALUES (?,?,?,?,?)")) {
        $stmt->bind_param("sssds",$u_id,$c_id,$category, $amount, $date);
        $stmt->execute();
        Echo "<br>Your expense is added";
        $stmt->close(); 
            } 
        else {
             echo "Something went wrong!";
    }
    //}
    //else {echo "Amount must be numbers!";}
}

$conn->close();
?>