
<?php
session_start(); // Start the session to retrieve the logged-in user's data

// Check if the manager is logged in
if (!isset($_SESSION['manager_name'])) {
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
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">SERG</h1>
                </a>    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#feature" class="nav-item nav-link">Warehouse Info</a>
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

        <!-- About Start -->
<div class="container-xxl py-5" id="about">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-primary-gradient fw-medium">About Us</h5>
                <h1 class="mb-4">Input Essential Warehouse Information</h1>
                <p class="mb-4">Warehouse managers are responsible for inputting crucial information about their warehouse. This information helps engineers generate accurate safety reports, ensuring efficiency and safety in the workplace.</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <i class="fa fa-cogs fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                            <div class="ms-3">
                                <h2 class="mb-0" data-toggle="counter-up">1000000</h2>
                                <p class="text-primary-gradient mb-0">Active Clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                        <div class="d-flex">
                            <i class="fa fa-comments fa-2x text-secondary-gradient flex-shrink-0 mt-1"></i>
                            <div class="ms-3">
                                <h2 class="mb-0" data-toggle="counter-up">100000</h2>
                                <p class="text-secondary-gradient mb-0">Clients Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">Read More</a>
            </div>
            <div class="col-lg-6 text-center">
                <img class="img-fluid wow fadeInUp" data-wow-delay="0.5s" src="img\safety_tips.jpg" style="max-width: 70%; height: auto;">
            </div>
        </div>
    </div>
</div>

<!-- Reports start -->

<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="text-primary-gradient fw-medium">Add a warehouse as <?php echo $_SESSION['manager_name'] ?></</h5>
            <h1 class="mb-5">Create a new warehouse with the according information</h1>
        </div>
         <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
         <button class='btn btn-primary-gradient py-3 px-4 squared-pill mt-3'
                    data-bs-toggle='modal' 
                    data-bs-target='#addWarehouseModal'>
                    ADD NEW WAREHOUSE
                </button>
                    </div>;
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="text-primary-gradient fw-medium">Warehouses Managed By <?php echo $_SESSION['manager_name'] ?></</h5>
            <h1 class="mb-5">Warehouse Information</h1>
        </div>
        <?php
        // Database connection
        $servername = "127.0.0.1";  
        $username = "root"; // Replace with your database username
        $password = ""; // Replace with your database password
        $dbname = "fyp"; // Replace with your database name

        $manager_name = $_SESSION['manager_name'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch warehouses for the manager
        $sql = "SELECT id,  warehouse_name, location, capacity, status, last_updated 
                FROM warehouses 
                WHERE manager_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $manager_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Warehouse Name</th>
                            <th>Location</th>
                            <th>Capacity</th>   
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>';
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['warehouse_name']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['capacity']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['last_updated']}</td>
                        <td>
                                    <button class='btn btn-primary-gradient py-1.5 px-2.5 rounded-pill mt-1.5 edit-button'
                                            data-id='{$row['id']}'
                                            data-bs-toggle='modal' 
                                            data-bs-target='#editWarehouseModal'>
                                        Edit
                                    </button>
                                   <button 
                                <button 
                                        class='btn btn-primary-gradient py-1.5 px-2.5 rounded-pill mt-1.5 delete-button' 
                                        data-id='{$row['id']}'>
                                        Delete
                                    </button>
                                </td>
                      </tr>";
            }
            echo '</tbody></table>';
        } else {
            echo '<p class="text-center">No warehouses found for this manager.</p>';
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</div>



<!-- Edit Warehouse Modal -->
<div class="modal fade" id="editWarehouseModal" tabindex="-1" aria-labelledby="editWarehouseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editWarehouseForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editWarehouseModalLabel">Edit Warehouse Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="warehouseId" name="warehouse_id">
                    <div class="mb-3">
                        <label for="modalWarehouseName" class="form-label">Warehouse Name</label>
                        <input type="text" id="modalWarehouseName" name="warehouse_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalLocation" class="form-label">Location</label>
                        <input type="text" id="modalLocation" name="location" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalCapacity" class="form-label">Capacity</label>
                        <input type="number" id="modalCapacity" name="capacity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalStatus" class="form-label">Status</label>
                        <select id="modalStatus" name="status" class="form-select" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-gradient py-2 px-3 rounded-pill mt-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-gradient py-2 px-3 rounded-pill mt-2">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addWarehouseModal" tabindex="-1" aria-labelledby="addWarehouseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addWarehouseForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWarehouseModalLabel">Add Warehouse Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="warehouseName" class="form-label">Warehouse Name</label>
                        <input type="text" id="warehouseName" name="warehouseName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="warehouseLocation" class="form-label">Location</label>
                        <input type="text" id="warehouseLocation" name="warehouseLocation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="warehouseCapacity" class="form-label">Capacity</label>
                        <input type="number" id="warehouseCapacity" name="warehouseCapacity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="warehouseStatus" class="form-label">Status</label>
                        <select id="warehouseStatus" name="warehouseStatus" class="form-select" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-gradient py-2 px-3 rounded-pill mt-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-gradient py-2 px-3 rounded-pill mt-2">Save Warehouse</button>
                </div>
            </form>
        </div>
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
    <script>
    document.getElementById("addWarehouseForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch("saveWarehouseInfo.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((result) => {
                if (result.success) {
                    alert("Warehouse added successfully!");
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert("Failed to save warehouse.");
                }
            })
            .catch((error) => console.error("Error saving warehouse:", error));
    });
    </script>

<script>
     document.addEventListener("DOMContentLoaded", function () {
                const editButtons = document.querySelectorAll(".edit-button");
                editButtons.forEach(button => {
                    button.addEventListener("click", function () {
                        const id = this.dataset.id;
                        fetch(`fetchWarehouse.php?id=${id}`)
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById("warehouseId").value = data.id;
                                document.getElementById("modalWarehouseName").value = data.warehouse_name;
                                document.getElementById("modalLocation").value = data.location;
                                document.getElementById("modalCapacity").value = data.capacity;
                                document.getElementById("modalStatus").value = data.status;
                            })
                            .catch(error => console.error("Error fetching warehouse data:", error));
                    });
                });
    // Handle Form Submission
    document.getElementById("editWarehouseForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch("updateWarehouse.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((result) => {
                if (result.success) {
                    alert("Warehouse updated successfully!");
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert("Failed to update warehouse.");
                }
            })
            .catch((error) => console.error("Error updating warehouse:", error));
    });
});
    </script>


    <script>
document.addEventListener("DOMContentLoaded", function () {
    // Add event listener to delete buttons
    const deleteButtons = document.querySelectorAll(".delete-button");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            const warehouseId = this.getAttribute("data-id"); // Get warehouse ID

            if (confirm("Are you sure you want to delete this warehouse?")) {
                // Send AJAX request to deleteWarehouse.php
                fetch("deleteWarehouse.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `id=${warehouseId}`,
                })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert("Warehouse deleted successfully!");
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert("Failed to delete warehouse: " + result.message);
                        }
                    })
                    .catch(error => console.error("Error deleting warehouse:", error));
            }
        });
    });
});
</script>

</body>

</html>