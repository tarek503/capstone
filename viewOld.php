
<?php
session_start(); // Start the session to retrieve the logged-in user's data

// Check if the manager is logged in
if (!isset($_SESSION['engineer_name'])) {
    header("Location: index.html"); // Redirect to the login page if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SERG</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="mainEng.php" class="navbar-brand p-0">
                    <h1 class="m-0">SERG</h1>
                </a>    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#feature" class="nav-item nav-link">Old Reports</a>
                    </div>
                    <a href="index.html" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Log Out</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Managing Your Warehouse Information</h1>
                            <p class="text-white pb-3 animated slideInDown">Manage warehouse data and assist engineers in generating safety reports for your warehouse.</p>
                            <a href="#feature" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">Proceed to Manage Your Info</a>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                            <div class="owl-carousel screenshot-carousel">
                                <img class="img-fluid" src="img\shelf-warehouse-perspective-box.jpg" alt="">
                                <img class="img-fluid" src="img\warehouse-efficiency-boxes-arranged.avif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


<!-- Reports start -->

<div class="container-xxl py-5" id="feature">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">View Old Reports By <?php echo $_SESSION['engineer_name'] ?></h5>
                    <h1 class="mb-5">Warehouse Information</h1>
                </div>
                <?php
                // Database connection
                $servername = "127.0.0.1";  
                $username = "root"; // Replace with your database username
                $password = ""; // Replace with your database password
                $dbname = "fyp"; // Replace with your database name

                $engineer_name = $_SESSION['engineer_name'];

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch reports for the engineer
                $sql = "SELECT EngineerUsername, WarehouseName, pdf_file FROM reports WHERE EngineerUsername = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $engineer_name);
                $stmt->execute();
                $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo '<table class="table table-bordered text-center">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>Engineer Name</th>';
                            echo '<th>Warehouse Name</th>';
                            echo '<th>Report</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['EngineerUsername']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['WarehouseName']) . '</td>';
                                echo '<td>';
                                if (!empty($row['pdf_file'])) {
                                    $fileName = "Safety_Report_" . uniqid() . ".pdf"; 
                                    file_put_contents($fileName, $row['pdf_file']);
                                    echo '<a href="' . $fileName . '" target="_blank" class="btn btn-primary-gradient py-2 px-4 rounded-pill">View</a> ';
                                    echo '<a href="' . $fileName . '" download class="btn btn-secondary-gradient py-2 px-4 rounded-pill">Download</a>';
                                } else {
                                    echo '<span class="text-muted">No PDF available</span>';
                                }
                                echo '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo '<p class="text-center">No reports found.</p>';
                        }

                $stmt->close();
                $conn->close();
                ?>
            </div>
        </div>
        <!-- Reports end -->
         
        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Address</h4>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Koraytem</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+961 79 133 173</p>
                        <p><i class="fa fa-envelope me-3"></i>serg@gmail.com</p>
                       
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Conditions</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p>To get our news periodically, enter your email.</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary-gradient fs-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">SERG</a>, All Right Reserved. 
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FAQs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up text-white"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>