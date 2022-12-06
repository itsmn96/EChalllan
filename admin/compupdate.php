<?php
  include("dbconnection.php");
  if($_SERVER['REQUEST_METHOD']=="GET")
  {
      $chno=$_GET['chno'];
      $selection = $_GET['selection'];
  $query = mysqli_query($conn,"update complaint set Status='$selection' WHERE chno='$chno'");
}
mysqli_close($conn);
    header("Location:chistory.php");

?>