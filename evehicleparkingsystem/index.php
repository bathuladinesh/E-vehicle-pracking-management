<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Parking Management</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-FDy41pYWjXadFEbAY8kPtZv1P5RkoNT3UzBRE9/XF0qPB53UkSeNh2Mv9xTTl+ZZOHYxxbLk+H5OIk9eJ4NZDg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">

    <style>

body {
    font-family: 'Montserrat', sans-serif;
    background-color: #222;
    color: #ddd;
    overflow-x: hidden; 
}

.navbar {
    background-color: #333;
}

.navbar-brand,
.navbar-nav .nav-link {
    color: #ddd !important;
}

.navbar-toggler {
    color: #fff;
}
.masthead {
    padding: 100px 0;
    background-image: url('assets/img/Smart-Parking-System.jpg');
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.masthead-heading {
    font-size: 3.5rem;
}

.divider-custom-line,
.divider-custom-icon {
    background-color: #ddd;
}

.card {
    background-color: transparent;
    border: none;
    width: 100%;
}

.card-img-top {
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}

.card-title {
    color: #fff;
}

.card-text {
    color: #ddd;
}
.btn-primary {
    background-color: #666;
    border-color: #666;
    display: block;
}

.btn-primary:hover {
    background-color: #444;
    border-color: #444;
    color: #ddd;
}

    </style>

</head>
<body id="page-top">
   
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">E-Parking Management</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            
        </div>
    </nav>
   
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex flex-column align-items-center">
            <h1 class="masthead-heading text-uppercase mb-0">E-Parking Management</h1>
            <div class="divider-custom divider-light mt-4 mb-4">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card mb-3">
                        <img src="assets/img/admin_image.jpg" class="card-img-top" alt="Admin Image">
                        <div class="card-body">
                            <h5 class="card-title">Admin</h5>
                            <p class="card-text">Manage the system as an administrator.</p>
                            <a href="admin/index.php" class="btn btn-primary">Admin</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="card mb-3">
                        <img src="assets/img/user_image.png" class="card-img-top" alt="User Image">
                        <div class="card-body">
                            <h5 class="card-title">User</h5>
                            <p class="card-text">Access the system as a user.</p>
                            <a href="users/login.php" class="btn btn-primary">User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
    <script src="js/scripts.js"></script>
   
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
