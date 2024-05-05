<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{
// For deleting    
if($_GET['del']){
$catid=$_GET['del'];
mysqli_query($con,"delete from tblregusers where ID ='$catid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='registerUser.php'</script>";
          }


  ?>
<!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>VPMS - Manage Category</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
      
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, html {
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', sans-serif;
    background-color: #808080; 
}


.navbar {
    background-color: #333; 
    color: #ddd; 
    border-bottom: 1px solid #444; 
    padding: 10px 15px; 
}

.nav-link, .navbar-brand {
    color: #ddd; 
}

.nav-link:hover, .navbar-brand:hover {
    color: #fff; 
}


.sidebar {
    width: 250px;
    position: fixed;
    height: 100vh;
    left: 0;
    top: 0;
    z-index: 1000; 
    background-color: #333; 
    color: white; 
    overflow-x: hidden; 
    transition: 0.5s;
    margin-top: 150px;
}

.sidebar-header {
    padding: 10px;
    background: #222;
    text-align: center;
}

.sidebar-menu {
    display: flex;
    flex-direction: column; 
    align-items: center; 
    padding: 10px;
}

.sidebar-menu a {
    padding: 10px;
    text-decoration: none;
    color: white; 
    display: block; 
    width: 100%;
}

.sidebar-menu a:hover {
    background-color: #575757; 
}

.menutoggle {
    cursor: pointer; 
}

.user-avatar {
    border-radius: 50%; 
    margin-top: 10px; 
}

.content {
    margin-top: 90px; 
    background-color: #fff;
    color: #333; 
    padding: 20px; 
    min-height: 80vh; 
    margin-left: 50px;
}

.content h1, 
.content h2, 
.content h3, 
.content h4, 
.content h5, 
.content h6 {
    margin-bottom: 20px;
    color: #333; 
}

.content p {
    margin-bottom: 15px; 
    line-height: 1.6; 
}

.content a {
    color: #007bff; 
    text-decoration: none; 
}

.content a:hover {
    text-decoration: underline;
}


.header {
    background-color: #333;
    color: #ddd;
    padding: 20px;
    text-align: center;
}


.card {
    background-color: #333;
    color: #ddd;
    border: none;
    margin-bottom: 20px;
    margin-left: 200px;
}

.stat-icon {
    color: #ddd;
}

.stat-text,
.stat-heading {
    color: #ddd;
}


.chart-container {
    background-color: #333;
    color: #ddd;
    padding: 20px;
}


.footer {
    background-color: #333;
    color: #ddd;
    text-align: center;
    padding: 20px;
}


    </style>

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">VPMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vehicle Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="add_Category.php">Add Vehicle Category</a>
                        <a class="dropdown-item" href="manageVehicleCategory.php">Manage Vehicle Category</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_Vehicle.php">Add Vehicle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manageIncomingVehicle.php">Manage Incoming Vehicle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manageOutgoingVehicle.php">Manage Outgoing Vehicle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bwDateReport.php">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="searchVehicle.php">Search Vehicle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registerUser.php">Reg Users</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="sidebar">

<nav class="sidebar-menu">
    <a href="admin_Profile.php" class="nav-link"><i class="fa fa-user"></i> My Profile</a>
    <a href="changePassword.php" class="nav-link"><i class="fa fa-cog"></i> Change Password</a>
    <a href="index.php" class="nav-link"><i class="fa fa-power-off"></i> Logout</a>
</nav>
  
</div>


        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="registerUser.php">Registered Users</a></li>
                                    <li class="active">Registered Users</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                   
         

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Registered Users</strong>
                        </div>
                        <div class="card-body">
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                 
                    <th>Name</th>
                   <th>Contact Number</th>
                   <th>Email</th>
                <th>Registration Date</th>
                <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select *from  tblregusers");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  <td><?php  echo $row['RegDate'];?></td>
                  <td><a href="registerUser.php?del=<?php echo $row['ID'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
              </table>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<div class="clearfix"></div>

<?php include_once('includes/footer.php');?>

</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>