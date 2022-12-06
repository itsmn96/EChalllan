<?php 

$host="localhost";
$username="root";
$pass="";
$db="challan";

$conn=mysqli_connect($host,$username,$pass);
mysqli_select_db($conn,$db);

if(isset($_POST['username'])){
    
    $Name=$_POST['username'];
    $Password=$_POST['pass'];
    
    $sql="select * from tblusers where Name='".$Name."'AND Password='".$Password."' limit 1";
    
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){
        header("location: Challan.html");
        exit();
    }
    else{
        echo " <script>
        	alert('Incorrect Password');
        	window.location.href='policelogin.html';
        </script>";
        exit();
    }
        
}
?>