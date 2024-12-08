<?php
// Database connection
$host = "127.0.0.1";  // Database host
$dbname = "fyp";  // Database name
$user = "root";  // Database username
$pass = "";  // Database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Assume a logged-in username (replace this with session-based logic)
$loggedInUsername = "trkhmz503";

// Fetch the engineer username
$query = "SELECT username FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute(['username' => $loggedInUsername]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User not found.";
    exit();
}

// Fetch questions
$query = "SELECT * FROM Q ORDER BY Section";
$statement = $conn->prepare($query);
$statement->execute();
$questions = $statement->fetchAll(PDO::FETCH_ASSOC);
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
                        <a href="#feature" class="nav-item nav-link">Questionnaire</a>
                    </div>
                    <a href="index.html" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Log Out</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Building Your Safety Report From Scratch</h1>
                            <p class="text-white pb-3 animated slideInDown">Welcome to SERG, your trusted solution for creating and managing safety engineering reports. Streamline hazard assessments, risk analyses, and compliance audits with ease and precision.</p>
                            <a href="#feature" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">Proceed to the questionnaire</a>
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
                    <h1 class="mb-4 text-center text-primary-gradient">Safety Questionnaire</h1>
                    <h4 class="mb-5">Please fill the following questionnaire according to the warehouse information</h4>
                </div>
                <div class="container py-5">
            <form method="POST" action="saveAnswers.php">
                <div class="mb-4">
                    <label for="warehouseName" class="form-label">Warehouse Name:</label>
                    <input type="text" id="warehouseName" name="warehouseName" class="form-control" required>
                </div>

                <?php foreach ($questions as $q): 
                    $sectionClass = str_replace(' ', '', htmlspecialchars($q['Section'])); ?>
                    <div class="mb-5">
                        <h3 class="fw-bold"><?= htmlspecialchars($q['Section']) ?></h3>

                        <!-- Question 1 -->
                        <label class="form-label"><?= htmlspecialchars($q['Q1']) ?></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?= $sectionClass ?>_A1" value="Yes" 
                                   onclick="toggleFollowUps('<?= $sectionClass ?>', 'A1', false)">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?= $sectionClass ?>_A1" value="No" 
                                   onclick="toggleFollowUps('<?= $sectionClass ?>', 'A1', true)">
                            <label class="form-check-label">No</label>
                        </div>

                        <!-- Follow-up for Question 1 -->
                        <div class="ms-4 <?= $sectionClass ?>_A1_followup" style="display: none;">
                            <?php if (!empty($q['Q11'])): ?>
                                <label class="form-label"><?= htmlspecialchars($q['Q11']) ?></label>
                                <input type="text" class="form-control" name="<?= $sectionClass ?>_A11">
                            <?php endif; ?>
                            <?php if (!empty($q['Q12'])): ?>
                                <label class="form-label"><?= htmlspecialchars($q['Q12']) ?></label>
                                <input type="text" class="form-control" name="<?= $sectionClass ?>_A12">
                            <?php endif; ?>
                        </div>

                        <!-- Question 2 -->
                        <label class="form-label mt-3"><?= htmlspecialchars($q['Q2']) ?></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?= $sectionClass ?>_A2" value="Yes" 
                                   onclick="toggleFollowUps('<?= $sectionClass ?>', 'A2', false)">
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?= $sectionClass ?>_A2" value="No" 
                                   onclick="toggleFollowUps('<?= $sectionClass ?>', 'A2', true)">
                            <label class="form-check-label">No</label>
                        </div>

                        <!-- Follow-up for Question 2 -->
                        <div class="ms-4 <?= $sectionClass ?>_A2_followup" style="display: none;">
                            <?php if (!empty($q['Q21'])): ?>
                                <label class="form-label"><?= htmlspecialchars($q['Q21']) ?></label>
                                <input type="text" class="form-control" name="<?= $sectionClass ?>_A21">
                            <?php endif; ?>
                            <?php if (!empty($q['Q22'])): ?>
                                <label class="form-label"><?= htmlspecialchars($q['Q22']) ?></label>
                                <input type="text" class="form-control" name="<?= $sectionClass ?>_A22">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <input type="hidden" name="username" value="<?= htmlspecialchars($user['username']) ?>">
                <button type="submit" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3">Submit</button>
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
    <script>
        function toggleFollowUps(section, question, show) {
            const followUps = document.querySelectorAll(`.${section.replace(/\s+/g, '_')}_${question}_followup`);
            followUps.forEach(el => el.style.display = show ? 'block' : 'none');
        }
    </script>
<script>
   document.querySelector('form').addEventListener('submit', async function (e) {
    e.preventDefault(); // Prevent default form submission

    // Get the form data
    const formData = new FormData(this);

    try {
        // Send the form data using fetch
        const response = await fetch('saveAnswers.php', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            // Show success alert
            alert('Data has been saved successfully!');

            // Locate the "Submit" button
            const submitButton = this.querySelector('button[type="submit"]');

            // Check if the "Generate Report" button already exists
            if (!document.querySelector('#generateReportButton')) {
                // Create the "Generate Report" button dynamically
                const generateButton = document.createElement('button');
                generateButton.id = 'generateReportButton';
                generateButton.className = 'btn btn-primary-gradient rounded-pill py-2 px-4 ms-3';
                generateButton.textContent = 'Generate Report';

                // Append the "Generate Report" button next to the "Submit" button
                submitButton.insertAdjacentElement('afterend', generateButton);

                // Add event listener to the new button for report generation
                generateButton.addEventListener('click', async function (e) {
                    e.preventDefault(); // Prevent default form submission when clicking "Generate Report"

                    try {
                        const reportResponse = await fetch('generateReport.php', {
                            method: 'POST',
                        });

                        if (!reportResponse.ok) {
                            throw new Error('Failed to generate the report.');
                        }

                        // Parse Content-Disposition header to extract the filename
                        const contentDisposition = reportResponse.headers.get('Content-Disposition');
                        let filename = 'Safety_Report.pdf'; // Default filename
                        if (contentDisposition && contentDisposition.includes('filename=')) {
                            filename = contentDisposition.split('filename=')[1].replace(/"/g, '');
                        }

                        // Convert the response to a blob and trigger the download
                        const blob = await reportResponse.blob();
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = url;
                        a.download = filename; // Use the extracted filename
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    } catch (error) {
                        alert('Error generating report: ' + error.message);
                    }
                });
            }
        } else {
            alert('An error occurred while saving the data.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while saving the data.');
    }
});

</script>

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