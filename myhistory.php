<?php
require_once("admin/dbconnection.php");
session_start();
global $row;
//if(!isset($_SESSION["sess_user"])){
//  header("Location: index.php");
//}
//else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Check</title>
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
  background-color: #545871 !important;
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
  background-color: #cc392e;
  border: 1px solid black;
  color: white;
  border-radius: 8px;
}
#logout:hover {
  background-color: #ebd0ce;
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
    background: #84889c;
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

<body style="color: #84889c">
  <!--Navbar-->
  <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="leaveAplicationForm.php">Complaint Check</a>
      <ul class="nav justify-content-end">
           
           <!--<li class="nav-item">
                <a class="nav-link" href="myhistory.php" style="color:white;">Complaint History</a>
            </li>-->
            <li class="nav-item">
            <button id="logout" onclick="window.location.href='cc.html';">Back</button>
            </li>
            </ul>

      
    </div>
  </nav>


  <h1>Complaint History</h1>

  <div class="container">
  
    <div class="table-responsive">
    
      <table class="table table-bordered table-hover table-striped">
          <thead>
              <th>#</th>
              <th>Licence Number</th>
              <th>Challan Number</th>
              <th>Name</th>
              <th>Description</th>
              <th>Status</th>
          </thead>
          <tbody>
            <!-- loading all leave applications of the user -->
            <?php
                  $chno = $_POST['chno'];
                  $leaves = mysqli_query($conn,"SELECT * FROM complaint WHERE chno='".$chno."'");
                  if($leaves){
                    $numrow = mysqli_num_rows($leaves);
                    if($numrow!=0){
                      $cnt=1;
                      while($row1 = $leaves->fetch_assoc()){
                        echo "<tr>
                                <td>$cnt</td>
                                <td>".$row1['dlno']."</td>
                                <td>".$row1['chno']."</td>
                                <td>".$row1['Name']."</td>
                                <td>".$row1['Description']."</td>
                                <td><b>".$row1['Status']."</b></td>
                              </tr>";
                     $cnt++; }
                    } else {
                      echo"<tr class='text-center'><td colspan='12'><b>YOU DON'T HAVE ANY COMPLAINT HISTORY! PLEASE APPLY TO VIEW YOUR STATUS HERE!</b></td></tr>";
                    }
                  }
                  else{
                    /*echo "Query Error : " . "SELECT descr,status FROM leaves WHERE eid='".$_SESSION['sess_eid']."'" . "<br>" . mysqli_error($conn);;*/
                  }
              ?>
          </tbody>
      </table>
  </div>
  </div>

  

</body>

</html>

<?php
//}

ini_set('display_errors', true);
error_reporting(E_ALL);
?>