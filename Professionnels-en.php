<?php
session_start();
$status = '';
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
// Validation: Checking entered captcha code with the generated captcha code
if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
// Note: the captcha code is compared case insensitively.
// if you want case sensitive match, update the check above to strcmp()
$status = "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#FF0000;'>Entered captcha code does not match! Kindly try again.</span></p>";
}else{
$status = "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#46ab4a;'>Your captcha code is match.</span></p>";	
	}
}

?>
<?php
    include 'header-en.php';
?>
<script src="./dist/js/menu/axios.min.js"></script>
<script src="./dist/js/clearCache.js"></script>
<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
 <a class="dropdown-toggle" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
  <i class="flag flag-united-kingdom m-0"></i>
 </a>
 <ul class="dropdown-menu" aria-labelledby="Dropdown">
  <li>
   <a class="dropdown-item" href="#">
    <i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i>
   </a>
  </li>
  <li>
   <hr class="dropdown-divider">
  </li>
  <li>
   <a class="dropdown-item" href="./Professionnels.php">
    <i class="flag flag-france"></i>Français </a>
  </li>
  <li>
   <a class="dropdown-item" href="./Professionnels-nl.php">
    <i class="flag-netherlands flag"></i>Dutch </a>
  </li>
 </ul>
</div>
<!-- Cart -->
<!--
                <div class="col-md-2"><a href="#" class="module module-cart right" data-toggle="panel-cart"><span class="cart-icon"><i class="ti ti-shopping-cart"></i><span class="notification">0</span></span><span class="cart-value">$<span class="value">0.00</span></span></a></div>
              -->
</div>
</div>
</header>
<!-- Header / End -->
<!-- Header -->
<header id="header-mobile" class="light">
 <div class="module module-nav-toggle">
  <a href="#" id="nav-toggle" data-toggle="panel-mobile">
   <span></span>
   <span></span>
   <span></span>
   <span></span>
  </a>
 </div>
 <div class="module module-logo">
 <a href="index-en.php">
    <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 75px;" width="88">
   </a>
 </div>
 <!-- Cart -->
 <!--
        <a href="#" class="module module-cart" data-toggle="panel-cart"><i class="ti ti-shopping-cart"></i><span class="notification">0</span></a>
      -->
</header>
<!-- Header / End -->
<!-- Content -->
<div id="content">
 <!-- Page Title -->
<div class="page-title border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-5">
                <h1 class="mb-0">Professionals</h1>
                <h4 class="text-muted mb-0">We can cater to all your needs in fine groceries, cocoa production, Michelin-starred restaurants, etc.
Whether you're a French, Maghrebi, Asian, Italian gastronomic restaurant, we'll create your signature ice cream according to your taste, tradition, and need.
We also provide delivery service for you.</h4>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<section class="section section-lg bg-dark">
    <!-- Background Video -->
    <!-- Background Video -->
    <div class="bg-video dark-overlay">
        <!-- Background Photo -->
        <img class="bg-image dark-overlay" src="./assets/img/professionals/professionals.jpg" alt="Professionals Background">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Book a Table -->
                <div class="utility-box">
                    <div class="utility-box-title bg-dark dark">
                        <div class="bg-image">
                            <img src="./assets/img/professionals/prof.jpg" alt="bg-image">
                        </div>
                        <div>
                            <span class="icon icon-primary">
                                <i class="ti ti-bookmark-alt"></i>
                            </span>
                            <h4 class="mb-0">Book a Table</h4>
                            <p class="lead text-muted mb-0">Details about your reservation.</p>
                        </div>
                    </div>
                    <form id="booking-form" class="booking-form" method="post" data-validate>
                        <div class="utility-box-content">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname:</label>
                                <input type="text" id="surname" name="surname" class="form-control" placeholder="Surname" required>
                            </div>
                            <div class="form-group">
                                <label for="company">Company:</label>
                                <input type="text" id="company" name="company" class="form-control" placeholder="Company" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="sector">Sector of Activity:</label>
                                <input type="text" id="sector" name="sector" class="form-control" placeholder="Sector of Activity" required>
                            </div>
                            <div class="form-group">
                                <label for="delivery_date">Desired Delivery Date:</label>
                                <input type="date" id="delivery_date" name="delivery_date" class="form-control" placeholder="Desired Delivery Date" required>
                            </div>
                            <div class="form-group">
                                <label for="delivery_address">Delivery Address:</label>
                                <input type="text" id="delivery_address" name="delivery_address" class="form-control" placeholder="Delivery Address" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea id="comment" name="comment" class="form-control" placeholder="Comment"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <!-- HTML -->
                                    <label><strong>Enter Captcha Code:</strong></label><br />
                                    <input type="text" id="captcha" name="captcha" placeholder="Enter Captcha Code" required>
                                    <p><br /><img src="./php/booking/captcha.php?rand=<?php echo rand(); ?>" id="captcha_image"></p>
                                    <p>Can't read the image? <a href="#" onclick="refreshCaptcha(event);">Click here</a> to refresh</p>
                                </div>
                            </div>
                        </div>
                        <input type="text" id="lang" name="lang" class="form-control" value="en" disabled required hidden>
                        <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                            <span class="description">Make a Reservation!</span>
                            <span class="success">
                                <svg x="0px" y="0px" viewBox="0 0 32 32">
                                    <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                </svg>
                            </span>
                            <span class="error">Try again...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
    .btn-success {
        background-color: #28a745;
        /* Green color for success */
        border-color: #28a745;
    }

    .btn-danger {
        background-color: #dc3545;
        /* Red color for error */
        border-color: #dc3545;
    }

    /* Modern modal styles */
    #confirmationModal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    #confirmationModal p {
        margin-bottom: 20px;
    }

    #confirmationModal button {
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .invalid-input {
        border: 1px solid red; /* Change border color to red */
    }

    </style>
    <!-- Simple confirmation modal -->
    <!-- Simple confirmation modal -->
    <div id="confirmationModal">
        <div>
            <p id="modalMessage"></p>
            <button onclick="closeModal()">OK</button>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("booking-form");
        const submitButton = form.querySelector(".btn-submit");
        const captchaInput = form.querySelector('input[name="captcha"]');
        const captchaImage = document.getElementById('captcha_image');
        const confirmationModal = document.getElementById('confirmationModal');
        const modalMessage = document.getElementById('modalMessage');
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            submitForm();
        });

        captchaImage.addEventListener("click", function() {
            refreshCaptcha();
        });

        function submitForm() {
            const captcha = captchaInput.value;
            const formData = new FormData(form);
            formData.append('captcha', captcha);
            // Validate email
            const emailInput = form.querySelector('input[name="email"]');
            const email = emailInput.value;
            if (!validateEmail(email)) {
                openModal('Please enter a valid email address.');
                emailInput.style.border = "1px solid red";
                return false;
            }

            // Validate each required input
            const inputs = form.querySelectorAll("[required]");
            let isValid = true;
            console.log(inputs);
            inputs.forEach(function(input) {
                if (input.value.trim() === "") {
                    isValid = false;
                    // Add red border to empty required fields
                    input.style.border = "1px solid red";
                } else {
                    // Reset the border to its default style
                    input.style.border = "";
                }
            });

            if (!isValid) {
                // If any required field is empty, show an error message and prevent form submission
                openModal("Please fill in all required fields.");
                return false;
            }
            axios.post('./php/booking/validate-captcha.php', formData)
                .then(response => {
                    if (response.data.valid) {
                        // Use AJAX to submit the form data
                        axios.post('./php/booking/booking-professionnels-en.php', formData)
                            .then(response => {
                                console.log('Form submission response:', response.data);
                                if (response.data === 'success') {
                                    submitButton.innerHTML = '<span class="description">Reservation Successful!</span>';
                                    submitButton.classList.remove('btn-secondary');
                                    submitButton.classList.remove('btn-submit');
                                    submitButton.classList.add('btn-success');
                                    submitButton.setAttribute('disabled', 'disabled');
                                } else {
                                    openModal('An error occurred while submitting the form. Please try again.');
                                }
                            })
                            .catch(error => {
                                console.error('Error submitting form:', error);
                                openModal('An error occurred while submitting the form. Please try again.');
                            });
                    } else {
                        openModal('The entered CAPTCHA code does not match. Please try again.');
                        refreshCaptcha();
                    }
                })
                .catch(error => {
                    console.error('Error validating CAPTCHA:', error);
                });
        }
    });

    function refreshCaptcha(event) {
        if (event) {
            event.preventDefault();
        }

        var img = document.getElementById('captcha_image');

        axios.get('./php/booking/captcha.php', {
                params: {
                    rand: Math.random() * 1000
                },
                responseType: 'arraybuffer'
            })
            .then(function(response) {
                var blob = new Blob([response.data], {
                    type: 'image/jpeg'
                });
                var imgUrl = URL.createObjectURL(blob);
                img.src = imgUrl;
                getCaptcha();
            })
            .catch(function(error) {
                console.error('Error refreshing CAPTCHA:', error);
            });
    }

    function openModal(message) {
        modalMessage.innerText = message;
        confirmationModal.style.display = 'block';
    }

    function closeModal() {
        document.getElementById('confirmationModal').style.display = 'none';
    }

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    </script>


     </div>
    </div>
   </div>
  </div>
 </section>
 <!-- Footer -->
 <footer id="footer" class="bg-dark dark">
  <div class="container">
   <!-- Footer 1st Row -->
   <div class="footer-first-row row">
    <div class="col-lg-3 text-center">
     <a href="index-en.php">
      <img src="assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88"
       class="mt-5 mb-5">
     </a>
    </div>
    <style>
    .styled-table {
     --background-color: #343a40;
     /* Dark background color */
     color: #ffffff;
     /* Text color */
     border-radius: 10px;
     /* Rounded corners */
     margin-top: 20px;
     /* Add some space at the top */
    }

    .styled-table h5 {
     color: #007bff;
     /* Blue theme color */
    }

    .styled-table td.title {
     --font-weight: bold;
     color: #ffffff;
     /* Text color */
    }

    .styled-table td.content {
     color: #a8b2b7;
     /* Lighter text color */
    }

    .styled-table a {
     color: #ffffff;
     /* Link color */
    }

    .styled-table a:hover {
     text-decoration: none;
     /* Remove underline on hover */
    }
    </style>

    <div class="col-lg-4 col-md-6 styled-table">
     <h5 class="text-muted">Opening Hours</h5>
     <table class="table">
      <tbody>
      <?php
        include 'table-en.php';
      ?>
      </tbody>
     </table>
    </div>

    <div class="col-lg-5 col-md-6 styled-table">
     <h5 class="text-muted mb-3">Contact Information</h5>
     <table class="table">
      <tbody>
       <tr>
        <td class="title">Phone:</td>
        <td class="content"><a href="tel:+071218620" target="_blank">071 21 86 20</a></td>
       </tr>
       <tr>
        <td class="title">Email:</td>
        <td class="content"><a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a></td>
       </tr>
      </tbody>
     </table>

     <h5 class="text-muted mb-3 mt-4">Social Media</h5>
     <a href="https://www.facebook.com/profile.php?id=100064692546589&ref=embed_page"
      class="icon icon-social icon-circle icon-sm icon-facebook">
      <i class="fa fa-facebook"></i>
     </a>
     <a href="#" class="icon icon-social icon-circle icon-sm icon-google">
      <i class="fa fa-google"></i>
     </a>
     <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter">
      <i class="fa fa-twitter"></i>
     </a>
     <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube">
      <i class="fa fa-youtube"></i>
     </a>
     <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram">
      <i class="fa fa-instagram"></i>
     </a>
    </div>
   </div>
   <!-- Footer 2nd Row -->
   <div class="footer-second-row">
    <span class="text-muted">Customized by FAST CAISSE <script>
     document.write(new Date().getFullYear())
     </script>©. </span>
   </div>
  </div>
  <!-- Back To Top -->
  <button id="back-to-top" class="back-to-top">
   <i class="ti ti-angle-up"></i>
  </button>
 </footer>
 <!-- Footer / End -->
</div>
<!-- Content / End -->
<!-- Panel Mobile -->
<nav id="panel-mobile">
 <div class="module module-logo bg-dark dark">
  <a href="#">
   <img src="assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88">
  </a>
  <button class="close" data-toggle="panel-mobile">
   <i class="ti ti-close"></i>
  </button>
 </div>
 <nav class="module module-navigation"></nav>
 <!--language selector-->
 <div class="dropdown col-12">
  <a class="dropdown-toggle" href="#" id="Dropdown1" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
   <i class="flag flag-united-kingdom m-0"></i>
  </a>
  <ul class="dropdown-menu" aria-labelledby="Dropdown1">
   <li>
    <a class="dropdown-item" href="#">
     <i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i>
    </a>
   </li>
   <li>
    <hr class="dropdown-divider">
   </li>
   <li>
   <a class="dropdown-item" href="./Professionnels.php">
    <i class="flag flag-france"></i>Français </a>
  </li>
  <li>
   <a class="dropdown-item" href="./Professionnels-nl.php">
    <i class="flag-netherlands flag"></i>Dutch </a>
  </li>
  </ul>
 </div>
 <?php
    include 'footer-en.php';
?>