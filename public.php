<html>
	<head>
		<style type="text/css">
			#cmd{
	width: 20%;
	background: #ebd0ce;
	padding: 10px;
	border: 0;
	border-radius: 3px;
	text-transform: uppercase;
	letter-spacing: 3px;
	cursor: pointer;
}

		</style>
		<link rel = "stylesheet" href = "styles.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script type="text/javascript">
			var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

function printPDF() {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('Challan.pdf');
};

		</script>
</head>
<?php 
    $conn = mysqli_connect("localhost","root","","challan");

        // if(isset($_POST['check']))
        // {

        	if(isset($_POST['dlno']) && $_POST['dlno'] != "")
        	{
				// echo $_POST['dlno'];
        		$filtervalues = $_POST['dlno'];
        		$query = "SELECT * FROM challan_generation WHERE dlno='".$_POST['dlno']."';";
        		$result = $conn->query($query);

				if ($result->num_rows > 0) {
				  // output data of each row
				    echo "<div id='editor'></div> <button id='cmd' onclick='printPDF()' style='float: right;'>generate PDF</button>";
				    echo "<div id='content'>";
				  while($row = $result->fetch_assoc()) {
				    // echo "chno: " . $row["chno"]. " - dlno: " . $row["dlno"]. " -vn" . $row["vn"]. "dn: " . $row["dn"]. "Phone: " . $row["phone"]. "Date: " .$row["ddate"]. "location: " . $row["Location"]."vitype: " . $row["vitype"]."fine: " . $row["fine"]."<br>";

					echo "<table class = 'publicTable' style='border:1px solid black;
					justify-content: center;
					align-items: center;
					width: 40%;
					height: 50%;
					margin:auto;
					padding:1%;
					margin-top:10px;
					font-style: oblique;
					font-weight: bold;
					font-size: larger;'>
					<tr><td>CHALLAN NUMBER</td><td>" . $row["chno"]. "</td></tr>
					<tr><td>DL NUMBER</td><td>" . $row["dlno"]. "</td></tr>
					<tr><td>VEHICLE NO</td><td>" . $row["vn"]. "</td></tr>
					<tr><td>DRIVER NAME</td><td>" . $row["dn"]. "</td></tr>				
					<tr><td>PHONE NO</td><td>" . $row["phone"]. "</td></tr>
					<tr><td>DATE</td><td>" . $row["ddate"]. "</td></tr>
					<tr><td>LOCATION</td><td>" . $row["Location"]. "</td></tr>
					<tr><td>VIOLATION TYPE</td><td>" . $row["vitype"]. "</td></tr>
					<tr><td>FINE</td><td>" . $row["fine"]. "</td></tr>
					</table>";
				  }
				echo "</div>";
				} else {
					echo "<script>alert('No Record Found!');window.location.href = 'publiclogin.html';</script>";

				}
				$conn->close();
        	}
        	else if (isset($_POST['vn']))
			 {
				$filtervalues = $_POST['vn'];
        		$query = "SELECT * FROM challan_generation WHERE vn='".$_POST['vn']."';";
        		$result = $conn->query($query);

				if ($result->num_rows > 0) {
				  // output data of each row
					echo "<div id='editor'></div> <button id='cmd' onclick='printPDF()'style='float: right;'>generate PDF</button>";
				    echo "<div id='content'>";
				  while($row = $result->fetch_assoc()) {
				    echo "<table class = 'publicTable' style='border:1px solid black;
					justify-content: center;
					align-items: center;
					width: 50%;
					height: 50%;
					margin:auto;
					padding:1%;
					margin-top:10px;
					font-style: oblique;
					font-weight: bold;
					font-size: larger;'>
					<tr><td>CHALLAN NUMBER</td><td>" . $row["chno"]. "</td></tr>
					<tr><td>DL NUMBER</td><td>" . $row["dlno"]. "</td></tr>
					<tr><td>VEHICLE NO</td><td>" . $row["vn"]. "</td></tr>
					<tr><td>DRIVER NAME</td><td>" . $row["dn"]. "</td></tr>				
					<tr><td>PHONE NO</td><td>" . $row["phone"]. "</td></tr>
					<tr><td>DATE</td><td>" . $row["ddate"]. "</td></tr>
					<tr><td>LOCATION</td><td>" . $row["Location"]. "</td></tr>
					<tr><td>VIOLATION TYPE</td><td>" . $row["vitype"]. "</td></tr>
					<tr><td>FINE</td><td>" . $row["fine"]. "</td></tr>
					</table>";
				  }
				echo "</div>";
				} else {
					echo "<script>alert('No Record Found!');window.location.href = 'publiclogin.html';</script>";
				//   echo "No Record Found!";
				}
				$conn->close();        
				}

        ?>

		</html>