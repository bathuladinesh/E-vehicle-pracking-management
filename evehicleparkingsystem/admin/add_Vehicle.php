<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $parkingnumber=mt_rand(100000000, 999999999);
    $catename=$_POST['catename'];
     $vehcomp=$_POST['vehcomp'];
    $vehreno=$_POST['vehreno'];
    $ownername=$_POST['ownername'];
    $ownercontno=$_POST['ownercontno'];
    $enteringtime=$_POST['enteringtime'];
    
     
    $query=mysqli_query($con, "insert into  tblvehicle(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno')");
    if ($query) {
echo "<script>alert('Vehicle Entry Detail has been added');</script>";
echo "<script>window.location.href ='manageIncomingVehicle.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
    }

  
}
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>VPMS - Add Vehicle</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

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
}

.sidebar-menu a {
    padding: 10px;
    text-decoration: none;
    color: white; 
    display: block; 
    width: 100%;
}

.sidebar-menu a:hover {
    background-color: #575757; /
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

.form-control {
    background-color: #444;
    border-color: #555;
    color: #ddd;
}


.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}


.footer {
    background-color: #333;
    color: #ddd;
    padding: 20px 0;
}


.content {
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
                                    <li><a href="add_Vehicle.php">Vehicle</a></li>
                                    <li class="active">Add Vehicle</li>
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
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> 

                    </div>

              

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add </strong> Vehicle
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catename" id="catename" class="form-control">
                                                <option value="0">Select Category</option>
                                                <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle Company</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="vehcomp" name="vehcomp" class="form-control" placeholder="Vehicle Company" required="true"></div>
                                    </div>
                                 
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Registration Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="vehreno" name="vehreno" class="form-control" placeholder="Registration Number" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownername" name="ownername" class="form-control" placeholder="Owner Name" required="true"></div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Contact Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownercontno" name="ownercontno" class="form-control" placeholder="Owner Contact Number" required="true" maxlength="10" pattern="[0-9]+"></div>
                                    </div>
                                   
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Add</button></p>
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="col-lg-6">
                        
                  
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