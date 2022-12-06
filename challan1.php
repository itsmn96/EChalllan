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

	$chno = $_POST['chno'];
    $dlno = $_POST['dlno'];
    $vn = $_POST['vn'];
    $dn = $_POST['dn'];
    $phone = $_POST['phone'];
    $ddate = $_POST['ddate'];
    $Location = $_POST['Location'];
    $vitype = $_POST['vitype'];
    $fine = $_POST['fine'];

    $sql="INSERT INTO challan_generation (chno, dlno, vn, dn, phone, ddate, Location, vitype, fine) VALUES ('$chno', '$dlno', '$vn', '$dn', '$phone', '$ddate', '$Location', '$vitype', '$fine')";

    if(!mysqli_query($conn,$sql))
    {
    	echo 'Error';
    }
    else
    {
    	echo "<script>alert('Challan Generated!');window.location.href = 'Challan.html';</script>";
    }


  ?>