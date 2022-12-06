<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="styles.css">
		    <style>
        h1 {
      text-align: center;
      font-size: 2.5em;
      font-weight: bold;
      padding-top: 1em;
      margin-bottom: -0.5em;
    }

    form {
      padding: 40px;
    }

    input,
    textarea {
      margin: 5px;
      font-size: 1.1em !important;
      outline: none;
    }

    label {
      margin-top: 2em;
      font-size: 1.1em !important;
    }

    label.form-check-label {
      margin-top: 0px;
    }

    #err {
      display: none;
      padding: 1.5em;
      padding-left: 4em;
      font-size: 1.2em;
      font-weight: bold;
      margin-top: 1em;
    }

    table{
      width: 90% !important;
      margin: 1.5rem auto !important;
      font-size: 1.1em !important;
    }

    .error{
      color: #FF0000;
    }
    * {
  margin: 0px;
  box-sizing: border-box;
  font-family: "Source Sans Pro", sans-serif;
}

body {
  max-width: 100vw;
  overflow-x: hidden;
  height: 100vh;
}

.header-nav {
  position: sticky;
  top: 0;
  z-index: 999;
  background-color: #404040 !important;
}

.navbar-brand {
  font-size: 1.5em;
  color: white !important;
  font-weight: 400;
}
#register,
#logout {
  float: right;
  padding: 5px;
  text-decoration: none;
  color: white;
  font-size: 1.2em;
  margin: auto 15px;
  font-weight: 400;
  width: max-content;
}
#register:hover {
  background-color: seagreen;
  border-radius: 5px;
}
#logout {
  outline: none;
  background-color: #f74b3f;
  border: 1px solid black;
  color: white;
  border-radius: 8px;
}
#logout:hover {
  background-color: #cc392e;
  cursor: pointer;
  columns: white;
  border-radius: 8px;
}

.content {
  margin: 20px 10px;
  font-size: 1.4em;
}
.content p {
  margin: 1px auto !important;
}

.content2 {
  padding: 50px;
  margin: 10px auto;
  font-size: 1.4em !important;
}
.content2 .heading {
  color: #22cb5c;
  font-weight: bold;
}

.row {
  margin-top: 20px;
}
.leftComponent {
  width: 48vw;
  height: 450px;
  margin: 10px;
}
.leftComponent img {
  height: 100%;
  width: 100%;
}

.rightComponent {
  width: 45vw;
  height: 450px;
  margin: 10px;
}

.rightComponent h3 {
  text-align: center;
  font-size: 1.6em;
  margin-top: 25vh;
}
.rightComponent hr {
  width: 80%;
  border: 1px solid black;
  margin: auto;
}
.loginForm {
  margin: 10px;
  width: 100%;
  height: 50%;
}
.loginForm input {
  border-radius: 5px;
  outline: none;
}

input:focus,
textarea:focus {
  border: 1px solid #22cb5c !important;
  box-shadow: 0px 0px 5px #22cb5c !important;
}
.btn {
  width: 100%;
}

.footer {
  width: 100%;
  text-align: center;
  padding: 10px;
  bottom: 0;
  background: #404040 !important;
  bottom: 0px;
}

.footer > div {
  width: 100%;
}

@media (max-width: 572px) {
  body {
    width: 100vw;
    height: 100vh;
  }
  .navbar-brand {
    font-size: 1em;
  }
  #register,
  #home {
    font-size: 1em;
    margin: 1px;
  }
  .leftComponent,
  .rightComponent {
    width: 90vw;
    height: fit-content;
  }

  .rightComponent h3 {
    margin: 10px;
  }
  .content2 {
    padding: 10px;
  }
}

    </style>

</head>
<body>

	<ul class="nav justify-content-end">
            <li class="nav-item">
            <button id="logout" onclick="window.location.href='adminpanel.html';">Back</button> </div>
            </li>
            </ul>
	<center>
<table border="1px" style="width: 600px; line-height: 40px;">
	<tr>
		<th colspan="7"><h2>Complaint Record</h2></th>
	</tr>
	<t>
		<th>DrivingLNO</th>
		<th>Challan Number</th>
		<th>Name</th>
		<th>Email</th>
		<th>Description</th>
		<th>File</th>
		<th>Status</th>
	</t>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Challan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM complaint where Status='Pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {?>
    	<tr>
    		<td><?php echo $row["dlno"]; ?></td>
    		<td><?php echo $row["chno"]; ?></td>
    		<td><?php echo $row["Name"]; ?></td>
    		<td><?php echo $row["email"]; ?></td>
    		<td><?php echo $row["Description"]; ?></td>
    		<td><?php echo $row["file"]; ?></td>
    		<td><?php echo $row["Status"]; ?></td>
       <!-- echo "<br> "." DrivingLNO : ". $row["dlno"]. "Chno : " . $row["chno"] ."Name : " . $row["Name"] ." Email : " . $row["email"] ." Description : " . $row["Description"] . " File : " . $row["file"] . " Status : " . $row["Status"] ."<br>";-->
<?php
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</table></center>
</body>
</html>