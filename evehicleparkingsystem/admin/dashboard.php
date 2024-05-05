<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>


<!doctype html>

 <html class="no-js" lang="">
<head>
    
    <title>VPMS - Admin Dashboard</title>
   

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
 >
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }


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
    margin-top: 160px; 
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
    margin-top: 160px;
    background-color: #fff;
    color: #333;
    padding: 20px;
    min-height: 80vh; 
    margin-left: 250px;
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

    
        <div class="content">
       
            <div class="animated fadeIn">
             
                <div class="row">
                    <?php
 $query=mysqli_query($con,"select ID from tblvehicle where date(InTime)=CURDATE();");
$count_today_vehentries=mysqli_num_rows($query);
 ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-car"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_today_vehentries;?></span></div>
                                            <div class="stat-heading">Todays Vehicle Entries</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <?php

 $query1=mysqli_query($con,"select ID from tblvehicle where date(InTime)=CURDATE()-1;");
$count_yesterday_vehentries=mysqli_num_rows($query1);
 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-car"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_yesterday_vehentries?></span></div>
                                            <div class="stat-heading">Yesterdays Vehicle Entries</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <?php

 $query2=mysqli_query($con,"select ID from tblvehicle where date(InTime)>=(DATE(NOW()) - INTERVAL 7 DAY);");
$count_lastsevendays_vehentries=mysqli_num_rows($query2);
 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-car"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_lastsevendays_vehentries?></span></div>
                                            <div class="stat-heading">Last 7 days Vehicle Entries</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <?php

 $query3=mysqli_query($con,"select ID from tblvehicle");
$count_total_vehentries=mysqli_num_rows($query3);
 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-car"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_total_vehentries?></span></div>
                                            <div class="stat-heading">Total Vehicle Entries</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

           <?php

 $query=mysqli_query($con,"select ID from tblregusers");
$regdusers=mysqli_num_rows($query);
 ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $regdusers;?></span></div>
                                            <div class="stat-heading">Total Registered Users</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

           <?php

 $query=mysqli_query($con,"select ID from tblcategory");
$listedcat=mysqli_num_rows($query);
 ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-file"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $listedcat;?></span></div>
                                            <div class="stat-heading">Listed Categories</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
                
               
            </div>
            
        </div>
      
        <div class="clearfix"></div>
       
       <?php include_once('includes/footer.php');?>

   
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

   
</body>
</html>
<?php } ?>