<?php require_once 'db.php';
$conn = new mysqli($host, $user, $pass, $database);


/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

  $query = "SELECT category FROM categories;";
  $result = $conn->query($query);
  $all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $json_string = json_encode($all_rows, JSON_UNESCAPED_UNICODE);
  echo $json_string;



/* close connection */
$conn->close();
?>
