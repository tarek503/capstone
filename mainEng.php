
<?php
session_start();
if(!isset($_SESSION['engineer_name'])) {
    header('index.html');
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
                        <a href="#feature" class="nav-item nav-link">Reports</a>
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
                            <a href="#feature" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">Proceed to Generate a Report</a>
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
                <h1 class="mb-4">#1 Platform For Achieving Warehouse Safety</h1>
                <p class="mb-4">At SERG, we understand the importance of maintaining safety and compliance in engineering projects. Our platform is designed to empower professionals with seamless tools to create, manage, and access safety engineering reports. Whether you're conducting hazard assessments, risk analyses, or compliance audits, SERG simplifies the process, ensuring accuracy and efficiency every step of the way.

                    With an intuitive interface and robust features, SERG helps you stay organized, save time, and focus on what matters most—enhancing safety and minimizing risks. Explore our easy-to-use platform and experience the future of safety engineering reporting today!</p>
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

<!-- Reports start -->

        <div class="container-xxl py-5" id="feature">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Reports</h5>
                    <h1 class="mb-5">Explore Functionalities</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-edit text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Create New Report</h5>
                            <p class="m-0">Quickly generate comprehensive safety engineering reports with ease and precision.</p>
                            <a href="requestPage.php" class="btn btn-primary-gradient mt-3">Create New Report</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-folder-open text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">View Old Reports</h5>
                            <p class="m-0">Access and manage previously generated reports at any time, from anywhere.</p>
                            <a href="viewOld.php" class="btn btn-secondary-gradient mt-3">View Old Reports</a>
                        </div>
                    </div>
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
    <button class="btn btn-link" onclick="openDialog('privacyPolicyDialog')">Privacy Policy</button>
    <button class="btn btn-link" onclick="openDialog('termsConditionsDialog')">Terms & Conditions</button>

    <!-- Privacy Policy Dialog -->
    <div id="privacyPolicyDialog" class="dialog" style="display: none;">
        <div class="dialog-content">
            <span class="close" onclick="closeDialog('privacyPolicyDialog')">&times;</span>
            <h4>Privacy Policy</h4>
            <div class="dialog-text">
                <p>Privacy Policy for SERG (Safety Engineering Report Generator)</p>

                <p>Effective Date: 16/12/2024</p>

                <p>SERG (Safety Engineering Report Generator) is committed to protecting the privacy of its users. This Privacy Policy outlines how we collect, use, store, and protect your personal and non-personal data when you access or use our website and services.</p>

                <p>1. Information We Collect</p>

                <p>1.1 Personal Information:<br>When you register or use our services, we may collect personal information such as your name, email address, and contact details.</p>

                <p>1.2 Usage Data:<br>We automatically collect information about your interactions with our website, including your IP address, browser type, operating system, and the pages you visit.</p>

                <p>1.3 Report Data:<br>Data submitted through the questionnaire, including responses and generated reports, is processed to provide the service and stored securely.</p>

                <p>1.4 Cookies and Tracking Technologies:<br>We use cookies and similar technologies to enhance your user experience and analyze website performance. You can manage your cookie preferences through your browser settings.</p>

                <p>2. How We Use Your Information</p>

                <p>2.1 To Provide and Improve Services:<br>We use your information to generate safety engineering reports, process requests, and enhance the functionality of our platform.</p>

                <p>2.2 Communication:<br>We may contact you via email or notifications to provide updates, respond to inquiries, and share important information about our services.</p>

                <p>2.3 Compliance and Security:<br>Your information may be used to comply with legal obligations, prevent fraudulent activities, and ensure the security of our platform.</p>

                <p>3. How We Store and Protect Your Data</p>

                <p>3.1 Data Storage:<br>Personal information and report data are stored securely in our databases. Generated reports are saved in an S3 bucket, and their file paths are stored in our database for retrieval.</p>

                <p>3.2 Security Measures:<br>We implement industry-standard security practices, including encryption, access controls, and regular audits, to protect your data from unauthorized access, alteration, or disclosure.</p>

                <p>3.3 Data Retention:<br>We retain your data only for as long as necessary to provide our services and comply with legal obligations. You may request the deletion of your data at any time by contacting us.</p>

                <p>4. Sharing Your Information</p>

                <p>4.1 Third-Party Services:<br>We may share data with third-party providers, such as the GPT API, to process and generate reports. These providers are obligated to protect your data in accordance with their privacy policies.</p>

                <p>4.2 Legal Requirements:<br>We may disclose your information if required to do so by law or in response to valid requests by public authorities.</p>

                <p>4.3 Business Transfers:<br>In the event of a merger, acquisition, or sale of assets, your data may be transferred to the new owner, subject to the terms of this Privacy Policy.</p>

                <p>5. Your Rights and Choices</p>

                <p>5.1 Access and Correction:<br>You have the right to access and correct your personal information stored with us.</p>

                <p>5.2 Data Portability:<br>You may request a copy of your data in a commonly used format.</p>

                <p>5.3 Deletion:<br>You can request the deletion of your personal data, and we will process your request unless we are legally required to retain it.</p>

                <p>5.4 Opt-Out:<br>You can opt-out of non-essential communications or data collection by contacting us.</p>

                <p>6. Third-Party Links<br>Our website may contain links to third-party websites. We are not responsible for the privacy practices of these external sites. We encourage you to review their privacy policies.</p>

                <p>7. Changes to This Privacy Policy<br>We may update this Privacy Policy periodically to reflect changes in our practices or legal requirements. We will notify you of significant changes via email or website updates.</p>

                <p>By using the SERG website and services, you agree to the terms of this Privacy Policy.</p>
            </div>
        </div>
    </div>

    <!-- Terms & Conditions Dialog -->
    <div id="termsConditionsDialog" class="dialog" style="display: none;">
        <div class="dialog-content">
            <span class="close" onclick="closeDialog('termsConditionsDialog')">&times;</span>
            <h4>Terms & Conditions</h4>
            <div class="dialog-text">
                <p>Terms and Conditions for SERG (Safety Engineering Report Generator)

Effective Date: 16/12/2024

Welcome to SERG! By accessing or using our website and services, you agree to comply with and be bound by the following terms and conditions. Please read them carefully before using our platform.

<p>1 <strong>Acceptance of Terms</strong></p>
<p>By using SERG, you confirm that you have read, understood, and agree to these Terms and Conditions. If you do not agree, you must not use our services.</p>

<p>2. <strong>Use of Services</strong></p>
<p>2.1 SERG provides tools for generating safety engineering reports based on user-submitted data. You agree to use these services only for lawful purposes.</p>
<p>2.2 You are responsible for ensuring the accuracy and completeness of the data you provide.</p>
<p>3. <strong>User Accounts</strong></p>
<p>3.1 To access certain features, you may need to create an account. You are responsible for maintaining the confidentiality of your login credentials.</p>
<p>3.2 You must notify us immediately of any unauthorized use of your account or security breaches.</p>
<p>4. <strong>Intellectual Property</strong></p>
<p>4.1 All content on the SERG platform, including text, graphics, and software, is the property of SERG or its licensors and is protected by copyright and intellectual property laws.</p>
<p>4.2 You may not reproduce, distribute, or modify any part of the platform without prior written consent.</p>
<p>5. <strong>Data Usage and Privacy</strong></p>
<p>5.1 By using SERG, you consent to the collection and use of your data as outlined in our Privacy Policy.</p>
<p>5.2 You retain ownership of the data you submit but grant SERG a license to process and store this data to provide services.</p>
<p>6. <strong>Limitation of Liability</strong></p>
<p>6.1 SERG is provided on an "as-is" basis. We make no guarantees regarding the accuracy, reliability, or availability of the platform.</p>
<p>6.2 To the fullest extent permitted by law, SERG shall not be liable for any indirect, incidental, or consequential damages arising from the use of our services.</p>
<p>7. <strong>Termination</strong></p>
<p>We reserve the right to terminate or suspend your access to the platform at our sole discretion, without prior notice, for conduct that violates these terms.</p>
<p>8. <strong>Changes to Terms</strong></p>
<p>We may update these Terms and Conditions from time to time. Significant changes will be communicated via email or through updates on the platform.</p>
<p>9. <strong>Governing Law</strong></p>
<p>These terms are governed by the laws of [Insert Jurisdiction]. Any disputes arising from these terms will be subject to the exclusive jurisdiction of the courts in [Insert Jurisdiction].</p>
            </div>
        </div>
    </div>
</div>

<script>
    function openDialog(dialogId) {
        document.getElementById(dialogId).style.display = 'block';
    }

    function closeDialog(dialogId) {
        document.getElementById(dialogId).style.display = 'none';
    }
</script>

<style>
    .dialog {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        padding: 20px;
        width: 80%;
        max-width: 500px;
    }

    .dialog-content {
        text-align: left;
    }

    .dialog-text {
        color: black;
        max-height: 300px;
        overflow-y: auto;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 20px;
        color: #333;
    }

    .dialog-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
</style>


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