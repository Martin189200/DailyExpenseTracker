<?php


require_once 'db.php';
$conn = new mysqli($host, $user, $pass, $database);


/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method == 'put') 
{       parse_str(file_get_contents('php://input'), $_PUT);
        $new_c =$_PUT['newcat'];
        $query2 = "SELECT * FROM categories where category='$new_c';";
        $result2 = $conn->query($query2);
        
        if($result2->num_rows == 1 )
        {
            $json_string = json_encode("Category already exists!", JSON_UNESCAPED_UNICODE);
            echo $json_string;
        }
        else{
        $query = "INSERT INTO categories(category) VALUES ('$new_c');";
        $result = $conn->query($query);
        
        $result1 = $conn->query($query2);
        $all_row = mysqli_fetch_all($result1, MYSQLI_ASSOC);
        $json_string = json_encode($all_row, JSON_UNESCAPED_UNICODE);
        echo $json_string;
        }
        
    }
else
{
    $query = "SELECT * FROM categories ORDER BY category ASC;";
    $result = $conn->query($query);
    $all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $json_string = json_encode($all_rows, JSON_UNESCAPED_UNICODE);
    echo $json_string;
}
/* close connection */
$conn->close();
?>