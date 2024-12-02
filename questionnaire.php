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
    <title>SERG Questionnaire</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
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

    <script>
        function toggleFollowUps(section, question, show) {
            const followUps = document.querySelectorAll(`.${section.replace(/\s+/g, '_')}_${question}_followup`);
            followUps.forEach(el => el.style.display = show ? 'block' : 'none');
        }
    </script>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">SERG</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#feature" class="nav-item nav-link active">Questionnaire</a>
                    </div>
                    <a href="index.html" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Log Out</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

        <!-- Questionnaire Start -->
        <div class="container py-5" style="background-color: #f8f9fa;">
            <h1 class="mb-4 text-center text-primary-gradient">Safety Questionnaire</h1>
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
                <button type="submit" class="btn btn-primary-gradient">Submit</button>
            </form>
        </div>
        <!-- Questionnaire End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer">
            <div class="container py-5">
                <p>&copy; SERG, All Rights Reserved.</p>
            </div>
        </div>
        <!-- Footer End -->
    </div>
</body>
</html>
