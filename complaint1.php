<?php

	$conn =mysqli_connect('localhost','root','','challan');

	if(!$conn)
	{
		echo 'Server not connected!';
	}

	if(!mysqli_select_db($conn,'challan'))
	{
		echo 'Database not selected!!';
	}

	$dlno = $_POST['dlno'];
    $chno = $_POST['chno'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $file = $_POST['file'];

    $sql="INSERT INTO complaint (dlno, chno, name, email, description, file,status) VALUES ('$dlno', '$chno', '$name', '$email', '$description', '$file','Pending')";

    if(!mysqli_query($conn,$sql))
    {
    	echo 'Error';
    }
    else
    {
        echo "<script>alert('Your complaint registed successfully!!!');window.location.href = 'Complaint.html';</script>";

    	/*echo '<div style="display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    font-style: oblique;
    font-weight: bold;
    font-size: larger;">Your complaint registed successfully!!!</div>'*/;
    }


  ?>