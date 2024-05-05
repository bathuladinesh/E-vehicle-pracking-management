<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


function detectSQLInjection($input) {

    $pattern = "/(--|#|;|'|\"|\\*\\/|\\/\\*|\\bor\\b|\\band\\b|\\bselect\\b|\\bupdate\\b|\\bdelete\\b|\\bdrop\\b|\\binsert\\b|\\bunion\\b)/i";
    return preg_match($pattern, $input);
}

if (isset($_POST['login'])) {
   
    $emailcon = $_POST['emailcont'];
    $password = md5($_POST['password']);

    if (detectSQLInjection($emailcon) || detectSQLInjection($password)) {
        print "<script>alert('Better luck next time bro!');</script>";
        error_log("Possible SQL injection attempt using: $emailcon");
    } else {

        $stmt = $con->prepare("SELECT ID, MobileNumber FROM tblregusers WHERE (Email = ? OR MobileNumber = ?) AND Password = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . $con->error);
        }

        $stmt->bind_param("sss", $emailcon, $emailcon, $password);

        $stmt->execute();

        $stmt->store_result();

        $stmt->bind_result($userID, $mobileNumber);

        if ($stmt->num_rows > 0) {

            $stmt->fetch();
            $_SESSION['vpmsuid'] = $userID;
            $_SESSION['vpmsumn'] = $mobileNumber;
            header('location:dashboard.php');
        } else 
        {

            echo "<script>alert('Invalid Details.');</script>";
        }
        $stmt->close();
    }
}
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>E-PM User Login Page</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <h2 style="color: #fff">E-PM! Sign in</h2>
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                         
                        <div class="form-group">
                            <label>Registered Email or Contact Number</label>
                           <input type="text" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter password" required="true" class="form-control">
                        </div>
                        <div class="checkbox">
                            
                            <label class="pull-right">
                                <a href="forgotPass.php">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                       
                       <div class="checkbox" style="padding-bottom: 20px;padding-top: 20px;">
                            
                            <label class="pull-left" >
                                <a href="signup.php">Signup(Register yourself)</a>
                            </label>

                        </div>
                        <div class="checkbox" style="padding-bottom: 20px;padding-top: 20px;">
                            
                            <label class="pull-right" >
                                <a href="../index.php">Home</a>
                            </label>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../admin/assets/js/main.js"></script>

</body>
</html>
