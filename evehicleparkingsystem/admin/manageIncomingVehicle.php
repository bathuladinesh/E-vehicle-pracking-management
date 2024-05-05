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
mysqli_query($con,"delete from tblvehicle where ID ='$catid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manageIncomingVehicle.php'</script>";
          }


  ?>
<!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>VPMS - Manage Incoming Vehicle</title>


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
            
body {
    font-family: 'Open Sans', sans-serif;
    background-color: #222;
    color: #ddd;
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
    margin-top: 135px; 
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

.header {
    background-color: #333;
    color: #ddd;
}


.breadcrumbs {
    background-color: #333;
    color: #ddd;
    padding: 10px 0;
}

.breadcrumbs-inner .breadcrumb {
    background-color: transparent;
    margin-bottom: 0;
}

.breadcrumbs-inner .breadcrumb-item a {
    color: #ddd;
}

.card {
    background-color: #333;
    color: #ddd;
    border: none;
    margin-bottom: 20px;
}

.card-header {
    background-color: #222;
    color: #ddd;
}

.card-body {
    padding: 20px;
}


.table {
    background-color: #333;
    color: #ddd;
}

.table th,
.table td {
    border-color: #555;
}

.table th {
    background-color: #222;
}


.btn-primary {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 8px;
}

.btn-primary:hover {
    background-color: #45a049; 
}

.btn-warning {
    background-color: #fdd835; 
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 8px;
}

.btn-warning:hover {
    background-color: #fbc02d; 
}

.btn-danger {
    background-color: #f44336; 
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 8px;
}

.btn-danger:hover {
    background-color: #d32f2f;
}


.footer {
    background-color: #333;
    color: #ddd;
    padding: 20px 0;
}


.content {
    padding: 20px;
    margin-left: 230px;
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
                                    <li><a href="manageIncomingVehicle.php">Manage Vehicle</a></li>
                                    <li class="active">Manage Incoming Vehicle</li>
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
                            <strong class="card-title">Manage Incoming Vehicle</strong>
                        </div>
                        <div class="card-body">
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                 
                    <th>Parking Number</th>
                    <th>Owner Name</th>
                    <th>Vehicle Reg Number</th>
                   
                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select *from   tblvehicle where Status=''");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['ParkingNumber'];?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['RegistrationNumber'];?></td>
                  
                  <td><a href="viewIncomingVehicle.php?viewid=<?php echo $row['ID'];?>" class="btn btn-primary">View</a> 

<a href="print.php?vid=<?php echo $row['ID'];?>" style="cursor:pointer" target="_blank" class="btn btn-warning">Print</a>
<a href="manageIncomingVehicle.php?del=<?php echo $row['ID'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                  </td>
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