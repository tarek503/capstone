<?php
session_start();
if (!isset($_SESSION['engineer_name'])) {
    die("Engineer not logged in. Please log in first.");
}

// Database connection details
$host = "127.0.0.1";
$dbname = "fyp"; 
$user = "root"; 
$pass = ""; 

try {
    // Establish database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Fetch warehouse managers and warehouse names
$query = "SELECT 
                warehouses.id AS warehouseID, 
                warehouses.manager_name, 
                warehouses.warehouse_name, 
                COALESCE(requests.reqStatus, 0) AS reqStatus
          FROM warehouses
          LEFT JOIN requests 
          ON warehouses.id = requests.warehouseID
          AND requests.engineer_name = :engineer_name";

// Prepare and execute the query
$statement = $conn->prepare($query);
$statement->execute(['engineer_name' => $_SESSION['engineer_name']]);

// Fetch all results
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
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
                        <a href="#requests" class="nav-item nav-link">Requests</a>
                    </div>
                    <a href="index.html" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Log Out</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Request Approval for Warehouses</h1>
                            <p class="text-white pb-3 animated slideInDown">Streamline your approval process and manage your warehouses efficiently.</p>
                            <a href="#requests" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">View Requests</a>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                            <div class="owl-carousel screenshot-carousel">
                                <img class="img-fluid" src="img/shelf-warehouse-perspective-box.jpg" alt="">
                                <img class="img-fluid" src="img/warehouse-efficiency-boxes-arranged.avif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Requests Section -->
        <div class="container-xxl py-5" id="feature">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-4 text-center text-primary-gradient">Requests</h1>
                    <h4 class="mb-5">Request access from the warehouse manager to proceed to the questionnaire</h4>
                </div>
                <div class="container py-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Manager Name</th>
                                <th>Warehouse Name</th>
                                <th>Request Approval</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php foreach ($rows as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['manager_name']) ?></td>
        <td><?= htmlspecialchars($row['warehouse_name']) ?></td>
        <td>
            <?php if ($row['reqStatus'] == 0): ?>
                <!-- Request Button -->
                <button 
                    class="btn btn-primary-gradient py-1.5 px-2.5 rounded-pill mt-1.5 request-btn" 
                    data-warehouse-id="<?= htmlspecialchars($row['warehouseID']) ?>" 
                    data-warehouse-name="<?= htmlspecialchars($row['warehouse_name']) ?>" 
                    data-engineer-name="<?= htmlspecialchars($_SESSION['engineer_name']) ?>">
                    Request
                </button>
            <?php elseif ($row['reqStatus'] == 1): ?>
                <!-- Pending Button -->
                <button class="btn btn-warning py-1.5 px-2.5 rounded-pill mt-1.5" disabled>
                    Pending
                </button>
            <?php elseif ($row['reqStatus'] == 2): 
                $_SESSION['warehouse_id'] = htmlspecialchars($row['warehouseID']);
                ?>
                <!-- Accepted Button -->
                <form method="POST" action="questionnaire.php" style="display:inline;">
                <input type="hidden" name="warehouseID" value="<?= htmlspecialchars($row['warehouseID']) ?>">
                <button type="submit" class="btn btn-success py-1.5 px-2.5 rounded-pill mt-1.5">
                    Accepted
                </button>
            </form>
            <?php elseif ($row['reqStatus'] == 3): ?>
                <!-- Deleted Button -->
                <button class="btn btn-danger py-1.5 px-2.5 rounded-pill mt-1.5" disabled>
                    Deleted
                </button>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>



                    </table>
                </div>
            </div>
        </div>
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
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
document.querySelectorAll('.request-btn').forEach(button => {
    button.addEventListener('click', function() {
        const warehouseId = this.getAttribute('data-warehouse-id');
        const warehouseName = this.getAttribute('data-warehouse-name');
        const engineerName = this.getAttribute('data-engineer-name');
        const action = 'request';

        // Perform AJAX request
        fetch('sendRequest.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                warehouseID: warehouseId,
                warehouse_name: warehouseName,
                engineer_name: engineerName,
                action
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);

                // Update "Request" button to "Pending"
                this.textContent = "Pending";
                this.classList.remove('btn-primary-gradient');
                this.classList.add('btn-warning');
                this.disabled = true;
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            alert("An error occurred. Please try again later.");
            console.error(error);
        });
    });
});
</script>

</body>
</html>