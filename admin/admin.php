<?php
 $conn = mysqli_connect("localhost","root","","challan");
session_start();
if(!isset($_SESSION["sess_user"])){
  header("Location: index.php");
}
else{
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
    <title>Admin Panel</title>

    <style>
        h1 {
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            padding-top: 1em;
        }

        .mycontainer {
            width: 90%;
            margin: 1.5rem auto;
            min-height: 60vh;
        }

        .mycontainer table {
            margin: 1.5rem auto;
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
    <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        
            <a class="navbar-brand" href="#">Complaint</a>
            <!-- <button class="btn-default" onclick="window.location.href='leavehist.php';">Leave History</button> </div> -->
            <!-- <nav class="nav navbar-right">
            <a class="nav-link active" href="#">Active</a>
            
            </nav>

            <button id="logout" onclick="window.location.href='logout.php';">Logout</button> </div> -->

            <ul class="nav justify-content-end">
            <!--  <li class="nav-item">
               <a class="nav-link" href="list_emp.php" style="color:white;">View Employees <span class="badge badge-pill" style="background-color:#2196f3;"><?php include('count_emp.php');?></span></a>
            </li>*/-->
            <li class="nav-item">
                <a class="nav-link" href="chistory.php" style="color:white;">Complaint History</a>
            </li>
            <li class="nav-item">
            <button id="logout" onclick="window.location.href='login.html';">Logout</button> </div>
            </li>
            </ul>
            
    </nav>

    <h1>Admin Panel</h1>

    <div class="mycontainer">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>DLNumber</th>
                    <th>Challan Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Actions</th>
                    <!-- <th>Action</th> -->
                </thead>
                <tbody>
                        <!-- loading all leave applications from database -->
                        <?php
                                global $row;
                                $query = mysqli_query($conn,"SELECT * FROM Complaint WHERE status='Pending'");
                                
                                $numrow = mysqli_num_rows($query);

                               if($query){
                                    
                                    if($numrow!=0){
                                         $cnt=1;

                                          while($row = mysqli_fetch_assoc($query)){
                                            $datetime1 = new DateTime($row['fromdate']);
                                            $datetime2 = new DateTime($row['todate']);
                                            $interval = $datetime1->diff($datetime2);
                                            
                                            echo "<tr>
                                                    <td>$cnt</td>
                                                    <td>{$row['ename']}</td>
                                                    <td>{$row['descr']}</td>
                                                    <td>{$datetime1->format('Y/m/d')} <b>--</b> {$datetime2->format('Y/m/d')}</td>
                                                    <td>{$interval->format('%a Day/s')}</td>
                                          
                                                    <td><a href=\"updateStatusAccept.php?eid={$row['eid']}&descr={$row['descr']}\"><button class='btn-success btn-sm' >Accept</button></a>
                                                    <a href=\"updateStatusReject.php?eid={$row['eid']}&descr={$row['descr']}\"><button class='btn-danger btn-sm' >Reject</button></a></td>
                                                  </tr>";  
                                         $cnt++; }       
                                    }
                                }
                                else{
                                    echo "Query Error : " . "SELECT * FROM Complaint WHERE status='Pending'" . "<br>" . mysqli_error($conn);
                                }
                       ?> 
                    
                </tbody>
            </table>
    </div>

    <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
    <div>
    <p class="text-center">&copy; <?php echo date("Y"); ?> -MCA-21MX </p>
      <p class="text-center"></p>
    </div>
    </footer>
</body>

</html>

<?php
}

ini_set('display_errors', true);
error_reporting(E_ALL);
?>