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
                        <a href="#feature" class="nav-item nav-link">Management</a>
                    </div>  
                    <a href="index.html" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Log Out</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Admin Dashboard</h1>
                            <p class="text-white pb-3 animated slideInDown">Welcome to the Admin Dashboard. Manage engineers, warehouse managers, and reports effectively.</p>
                            <a href="#feature" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">Proceed to Manage</a>
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
                <h5 class="text-primary-gradient fw-medium">Manage Users</h5>
                <h1 class="mb-4">Admin User Management</h1>
                <p class="mb-4">Manage engineers, warehouse managers, and reports. View all registered users and control report submissions.</p>
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


 
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="text-primary-gradient fw-medium">List of Registered Engineers</h5>
            <h1 class="mb-5">Engineer Information</h1>
        </div>
        <?php
        $servername = "127.0.0.1";  
        $username = "root"; // Replace with your database username
        $password = ""; // Replace with your database password
        $dbname = "fyp"; // Replace with your database name

       

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch warehouses for the manager
        $sql = "SELECT id, name, email, is_engineer
                FROM users 
                WHERE is_engineer = 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered align="center" style="color: darkblue;">
                    <thead>
                        "<tr align="center" valign="middle" style="color: darkblue;">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                             <th>Reports</th>
                        </tr>
                    </thead>
                    <tbody>';
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr align=\"center\" valign=\"middle\" style=\"color: darkblue;\">
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>
                                    <button class='btn btn-primary-gradient py-1.5 px-2.5 rounded-pill mt-1.5 edit-button1'
                                            data-id='{$row['id']}'
                                            data-bs-toggle='modal' 
                                            data-bs-target='#editEngineerModal'>
                                        Edit
                                    </button>
                                   <button 
                                <button 
                                        class='btn btn-primary-gradient py-1.5 px-2.5 rounded-pill mt-1.5 delete-button1' 
                                        data-id='{$row['id']}'>
                                        Delete
                                    </button>
                                </td>
                                <td>
                            <a href='viewOld.php?name=" . urlencode($row['name']) . "' 
                            class='btn btn-secondary-gradient py-1.5 px-2.5 rounded-pill mt-1.5'>
                                View Engineer Reports
                            </a>
                        </td>
                      </tr>";
            }
            echo '</tbody></table>';
        } else {
            echo '<p class="text-center">No engineers data found in database.</p>';
        }
        ?>
    </div>
</div>

 
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="text-primary-gradient fw-medium">List of Registered Warehouse Managers</h5>
            <h1 class="mb-5">Warehouse Managers Information</h1>
        </div>
        <?php
        $servername = "127.0.0.1";  
        $username = "root"; // Replace with your database username
        $password = ""; // Replace with your database password
        $dbname = "fyp"; // Replace with your database name

       

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch warehouses for the manager
        $sql = "SELECT id, name, email, is_engineer
                FROM users 
                WHERE is_engineer = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered align="center" style="color: darkblue;">
                    <thead>
                        "<tr align="center" valign="middle" style="color: darkblue;">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                            <th>Warehouses</th>
                        </tr>
                    </thead>
                    <tbody>';
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr align=\"center\" valign=\"middle\" style=\"color: darkblue;\">
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>
                                    <button class='btn btn-primary-gradient py-1.5 px-2.5 rounded-pill mt-1.5 edit-button2'
                                            data-id='{$row['id']}'
                                            data-bs-toggle='modal' 
                                            data-bs-target='#editManagerModal'>
                                        Edit
                                    </button>
                                   <button 
                                <button 
                                        class='btn btn-primary-gradient py-1.5 px-2.5 rounded-pill mt-1.5 delete-button2' 
                                        data-id='{$row['id']}'>
                                        Delete
                                    </button>
                                </td>
                                <td>
                                <button class='btn btn-secondary-gradient py-1.5 px-2.5 rounded-pill mt-1.5 view-warehouses-button'
                                        data-id='{$row['id']}' 
                                        data-bs-toggle='modal' 
                                        data-bs-target='#viewWarehousesModal'>
                                    View Manager Warehouses
                                </button>
            </td>
                      </tr>";
            }
            echo '</tbody></table>';
        } else {
            echo '<p class="text-center">No managers data found in database.</p>';
        }
        $stmt->close();
        $conn->close();
        ?>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="text-primary-gradient fw-medium">Add a new warehouse manager</</h5>
            <h1 class="mb-5">Warehouse managers that are admitted by SERG, are added here.</h1>
        </div>
         <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
         <button class='btn btn-primary-gradient py-3 px-4 squared-pill mt-3'
                    data-bs-toggle='modal' 
                    data-bs-target='#addManagerModal'>
                    ADD A NEW MANAGER
                </button>
                    </div>;
    </div>
</div>


<div class="modal fade" id="editEngineerModal" tabindex="-1" aria-labelledby="editEngineerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editEngineerForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEngineerModalLabel">Edit Engineer Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="engineerID" name="engineer_id">
                    <div class="mb-3">
                        <label for="modalEngineerName" class="form-label">Engineer Name</label>
                        <input type="text" id="modalEngineerName" name ="engineer_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalEngineerEmail" class="form-label">Engineer Email</label>
                        <input type="email" id="modalEngineerEmail" name="engineer_email" class="form-control" required>
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

<div class="modal fade" id="editManagerModal" tabindex="-1" aria-labelledby="editManagerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editManagerForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editManagerModalLabel">Edit Manager Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="managerID" name="manager_id">
                    <div class="mb-3">
                        <label for="modalManagerName" class="form-label">Manager Name</label>
                        <input type="text" id="modalManagerName" name ="manager_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalManagerEmail" class="form-label">Manager Email</label>
                        <input type="email" id="modalManagerEmail" name="manager_email" class="form-control" required>
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

<div class="modal fade" id="viewWarehousesModal" tabindex="-1" aria-labelledby="viewWarehousesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewWarehousesModalLabel">Warehouses Managed by <span id="managerNameTitle"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center style='color: darkblue;'">
                    <thead>
                        <tr style='color: darkblue;'>
                            <th>Warehouse ID</th>
                            <th>Warehouse Name</th>
                            <th>Location</th>
                            <th>Capacity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="warehousesTableBody">
                        <!-- Dynamically populated rows will appear here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addManagerModal" tabindex="-1" aria-labelledby="addManagerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addManagerForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addManagerModalLabel">Add Warehouse Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="managerName" class="form-label">Manager Name</label>
                        <input type="text" id="managerName" name="managerName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="managerEmail" class="form-label">Email</label>
                        <input type="text" id="managerEmail" name="managerEmail" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="managerPassword" class="form-label">Password</label>
                        <input type="password" id="managerPassword" name="managerPassword" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary-gradient py-2 px-3 rounded-pill mt-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-gradient py-2 px-3 rounded-pill mt-2">Save Manager Info</button>
                </div>
            </form>
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
                </div>
            </div>
        </div>
        <!-- Footer End -->

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
     document.addEventListener("DOMContentLoaded", function () {
                const editButtons = document.querySelectorAll(".edit-button1");
                editButtons.forEach(button => {
                    button.addEventListener("click", function () {
                        const id = this.dataset.id;
                        fetch(`fetchUser.php?id=${id}`)
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById("engineerID").value = data.id;
                                document.getElementById("modalEngineerName").value = data.name;
                                document.getElementById("modalEngineerEmail").value = data.email;
                            })
                            .catch(error => console.error("Error fetching engineer data:", error));
                    });
                });
    // Handle Form Submission
    document.getElementById("editEngineerForm").addEventListener("submit", function (event) {
        event.preventDefault(); 

        const formData = new FormData(this);

        fetch("updateUser.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((result) => {
                if (result.success) {
                    alert("Engineer information updated successfully!");
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert("Failed to update data.");
                }
            })
            .catch((error) => console.error("Error updating data:", error));
    });
});
    </script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Add event listener to delete buttons
    const deleteButtons = document.querySelectorAll(".delete-button1");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            const eid = this.getAttribute("data-id"); 

            if (confirm("Are you sure you want to delete this engineer's information?")) {
                // Send AJAX request to deleteWarehouse.php
                fetch("deleteUser.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `id=${eid}`,
                })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert("Engineer information deleted successfully!");
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert("Failed to delete engineer information: " + result.message);
                        }
                    })
                    .catch(error => console.error("Error deleting engineer information:", error));
            }
        });
    });
});
</script>

<script>
     document.addEventListener("DOMContentLoaded", function () {
                const editButtons = document.querySelectorAll(".edit-button2");
                editButtons.forEach(button => {
                    button.addEventListener("click", function () {
                        const id = this.dataset.id;
                        fetch(`fetchUser.php?id=${id}`)
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById("managerID").value = data.id;
                                document.getElementById("modalManagerName").value = data.name;
                                document.getElementById("modalManagerEmail").value = data.email;
                            })
                            .catch(error => console.error("Error fetching manager data:", error));
                    });
                });
    // Handle Form Submission
    document.getElementById("editManagerForm").addEventListener("submit", function (event) {
        event.preventDefault(); 

        const formData = new FormData(this);

        fetch("updateUser.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((result) => {
                if (result.success) {
                    alert("Manager information updated successfully!");
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert("Failed to update data.");
                }
            })
            .catch((error) => console.error("Error updating data:", error));
    });
});
    </script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Add event listener to delete buttons
    const deleteButtons = document.querySelectorAll(".delete-button2");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            const mid = this.getAttribute("data-id"); 

            if (confirm("Are you sure you want to delete this manager's information?")) {
                // Send AJAX request to deleteWarehouse.php
                fetch("deleteUser.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `id=${mid}`,
                })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert("Manager information deleted successfully!");
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert("Failed to delete manager information: " + result.message);
                        }
                    })
                    .catch(error => console.error("Error deleting manager information:", error));
            }
        });
    });
});
</script>

<script>
    document.getElementById("addManagerForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch("saveManagerInfo.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((result) => {
                if (result.success) {
                    alert("Manager added successfully!");
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert("Failed to save manager info.");
                }
            })
            .catch((error) => console.error("Error saving manager info  :", error));
    });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const viewWarehousesButtons = document.querySelectorAll(".view-warehouses-button");
    const warehousesTableBody = document.getElementById("warehousesTableBody");
    const managerNameTitle = document.getElementById("managerNameTitle");

    viewWarehousesButtons.forEach(button => {
        button.addEventListener("click", function () {
            const managerId = this.dataset.id;

            // Clear the table body before populating new data
            warehousesTableBody.innerHTML = "";

            // Fetch warehouses for the selected manager
            fetch(`fetchWarehouses.php?managerId=${managerId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        managerNameTitle.textContent = data.managerName;
                        data.warehouses.forEach(warehouse => {
                            const row = `<tr style='color: darkblue;'>
                                <td>${warehouse.id}</td>
                                <td>${warehouse.warehouse_name}</td>
                                <td>${warehouse.location}</td>
                                <td>${warehouse.capacity}</td>
                                <td>${warehouse.status}</td>
                            </tr>`;
                            warehousesTableBody.innerHTML += row;
                        });
                    } else {
                        warehousesTableBody.innerHTML = `<tr><td colspan="5">No warehouses found.</td></tr>`;
                    }
                })
                .catch(error => {
                    console.error("Error fetching warehouses:", error);
                    warehousesTableBody.innerHTML = `<tr><td colspan="5">Error loading warehouses.</td></tr>`;
                });
        });
    });
});

</script>        

    </div>
</body>

</html>
