<?php
session_start();
$status = '';
if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
    // Validation: Checking entered captcha code with the generated captcha code
    if (strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0) {
        // Note: the captcha code is compared case insensitively.
        // if you want case sensitive match, update the check above to strcmp()
        $status = "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#FF0000;'>Entered captcha code does not match! Kindly try again.</span></p>";
    } else {
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
            <a class="dropdown-item" href="./page-reservation.php">
                <i class="flag flag-france"></i>Français </a>
        </li>
        <li>
            <a class="dropdown-item" href="./page-reservations-nl.php">
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
                    <h1 class="mb-0">Form for Our Yule Logs and Cakes</h1>
                    <h4 class="text-muted mb-0" style="text-align: justify;">Please fill out the form below to place
                        your order for yule logs and
                        cakes. Thank you for your trust!</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section section-lg bg-dark">
        <!-- Video BG -->
        <!-- BG Video -->
        <!-- Vidéo de fond -->
        <div class="bg-video dark-overlay">
            <!-- BG Photo -->
            <img class="bg-image dark-overlay" src="./assets/img/Reservations/reservation.jpg" alt="Professionals Background">

        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Réserver une table -->
                    <div class="utility-box">
                        <div class="utility-box-title bg-dark dark">
                            <div class="bg-image">
                                <img src="./assets/img/Reservations/reservation_3.jpg" alt="bg-image">
                            </div>
                            <div>
                                <span class="icon icon-primary">
                                    <i class="ti ti-bookmark-alt"></i>
                                </span>
                                <h4 class="mb-0">Book a table</h4>
                                <p class="lead text-muted mb-0">Details about your reservation.</p>
                            </div>
                        </div>
                        <form id="booking-form" class="booking-form" method="post" data-validate>
                            <div class="utility-box-content">
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_date">Delivery Date:</label>
                                    <input type="date" id="delivery_date" name="delivery_date" class="form-control" placeholder="Delivery Date" min="<?php echo date('Y-m-d'); ?>" required>
                                    <div class="form-helper-text">A minimum of 3 days is required for all submitted
                                        requests.</div>
                                </div>
                                <div class="form-group">
                                    <label for="persons">Number of Persons:</label>
                                    <input type="number" id="persons" name="persons" class="form-control" placeholder="Number of Persons minimum 5 persons" min="5" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">For:</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age:</label>
                                    <input type="number" id="age" name="age" class="form-control" placeholder="Age" required>
                                </div>
                                <div class="form-group" id="first_choice_out">
                                    <label for="first_choice">First Flavor Choice:</label>
                                    <select id="first_choice" name="first_choice" class="form-control" required>
                                        <option value="" selected disabled>Choose...</option>
                                        <optgroup label="New Flavors">
                                            <option value="Panna et ciocolatto bacio">Panna et ciocolatto bacio</option>
                                            <option value="Vanilla jam and butter bread">Vanilla jam and butter bread
                                            </option>
                                            <option value="Almonds">Almonds</option>
                                            <option value="Fig">Fig</option>
                                            <option value="Butter and jam bread">Butter and jam bread</option>
                                        </optgroup>
                                        <optgroup label="English Soup">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Abruzzese cake">Abruzzese cake</option>
                                            <option value="Homemade Speculoos">Homemade Speculoos</option>
                                            <option value="Brown sugar">Brown sugar</option>
                                        </optgroup>
                                        <optgroup label="Classic Flavors">
                                            <option value="Vanilla">Vanilla</option>
                                            <option value="Chocolate">Chocolate</option>
                                            <option value="Strawberry">Strawberry</option>
                                            <option value="Mint">Mint</option>
                                        </optgroup>
                                        <optgroup label="Nutty Delights">
                                            <option value="Toasted pistachio">Toasted pistachio</option>
                                            <option value="Pistachio Italy (classic)">Pistachio Italy (classic)</option>
                                            <option value="Hazelnut Italy">Hazelnut Italy</option>
                                            <option value="Almonds">Almonds</option>
                                        </optgroup>
                                        <optgroup label="Exotic Flavors">
                                            <option value="Coconut">Coconut</option>
                                            <option value="Mango">Mango</option>
                                            <option value="Passion fruit">Passion fruit</option>
                                            <option value="Lychee">Lychee</option>
                                        </optgroup>
                                        <optgroup label="Sorbet">
                                            <option value="Banana">Banana</option>
                                            <option value="Raspberry">Raspberry</option>
                                            <option value="Red Fruits">Red Fruits</option>
                                            <option value="Blueberry">Blueberry</option>
                                        </optgroup>
                                        <optgroup label="Specialties">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Salted Caramel">Salted Caramel</option>
                                            <option value="Zabayon">Zabayon</option>
                                            <option value="Bacio">Bacio</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group" id="second_choice_out">
                                    <label for="second_choice">Second Flavor Choice:</label>
                                    <select id="second_choice" name="second_choice" class="form-control" required>
                                        <option value="" selected disabled>Choose...</option>
                                        <optgroup label="New Flavors">
                                            <option value="Panna et ciocolatto bacio">Panna et ciocolatto bacio</option>
                                            <option value="Vanilla jam and butter bread">Vanilla jam and butter bread
                                            </option>
                                            <option value="Almonds">Almonds</option>
                                            <option value="Fig">Fig</option>
                                            <option value="Butter and jam bread">Butter and jam bread</option>
                                        </optgroup>
                                        <optgroup label="English Soup">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Abruzzese cake">Abruzzese cake</option>
                                            <option value="Homemade Speculoos">Homemade Speculoos</option>
                                            <option value="Brown sugar">Brown sugar</option>
                                        </optgroup>
                                        <optgroup label="Classic Flavors">
                                            <option value="Vanilla">Vanilla</option>
                                            <option value="Chocolate">Chocolate</option>
                                            <option value="Strawberry">Strawberry</option>
                                            <option value="Mint">Mint</option>
                                        </optgroup>
                                        <optgroup label="Nutty Delights">
                                            <option value="Toasted pistachio">Toasted pistachio</option>
                                            <option value="Pistachio Italy (classic)">Pistachio Italy (classic)</option>
                                            <option value="Hazelnut Italy">Hazelnut Italy</option>
                                            <option value="Almonds">Almonds</option>
                                        </optgroup>
                                        <optgroup label="Exotic Flavors">
                                            <option value="Coconut">Coconut</option>
                                            <option value="Mango">Mango</option>
                                            <option value="Passion fruit">Passion fruit</option>
                                            <option value="Lychee">Lychee</option>
                                        </optgroup>
                                        <optgroup label="Sorbet">
                                            <option value="Banana">Banana</option>
                                            <option value="Raspberry">Raspberry</option>
                                            <option value="Red Fruits">Red Fruits</option>
                                            <option value="Blueberry">Blueberry</option>
                                        </optgroup>
                                        <optgroup label="Specialties">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Salted Caramel">Salted Caramel</option>
                                            <option value="Zabayon">Zabayon</option>
                                            <option value="Bacio">Bacio</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group" id="alternate_choice_out">
                                    <label for="alternate_choice">Alternative Flavor Choice:</label>
                                    <select id="alternate_choice" name="alternate_choice" class="form-control" required>
                                        <option value="" selected disabled>Choose...</option>
                                        <optgroup label="New Flavors">
                                            <option value="Panna et ciocolatto bacio">Panna et ciocolatto bacio</option>
                                            <option value="Vanilla jam and butter bread">Vanilla jam and butter bread
                                            </option>
                                            <option value="Almonds">Almonds</option>
                                            <option value="Fig">Fig</option>
                                            <option value="Butter and jam bread">Butter and jam bread</option>
                                        </optgroup>
                                        <optgroup label="English Soup">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Abruzzese cake">Abruzzese cake</option>
                                            <option value="Homemade Speculoos">Homemade Speculoos</option>
                                            <option value="Brown sugar">Brown sugar</option>
                                        </optgroup>
                                        <optgroup label="Classic Flavors">
                                            <option value="Vanilla">Vanilla</option>
                                            <option value="Chocolate">Chocolate</option>
                                            <option value="Strawberry">Strawberry</option>
                                            <option value="Mint">Mint</option>
                                        </optgroup>
                                        <optgroup label="Nutty Delights">
                                            <option value="Toasted pistachio">Toasted pistachio</option>
                                            <option value="Pistachio Italy (classic)">Pistachio Italy (classic)</option>
                                            <option value="Hazelnut Italy">Hazelnut Italy</option>
                                            <option value="Almonds">Almonds</option>
                                        </optgroup>
                                        <optgroup label="Exotic Flavors">
                                            <option value="Coconut">Coconut</option>
                                            <option value="Mango">Mango</option>
                                            <option value="Passion fruit">Passion fruit</option>
                                            <option value="Lychee">Lychee</option>
                                        </optgroup>
                                        <optgroup label="Sorbet">
                                            <option value="Banana">Banana</option>
                                            <option value="Raspberry">Raspberry</option>
                                            <option value="Red Fruits">Red Fruits</option>
                                            <option value="Blueberry">Blueberry</option>
                                        </optgroup>
                                        <optgroup label="Specialties">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Salted Caramel">Salted Caramel</option>
                                            <option value="Zabayon">Zabayon</option>
                                            <option value="Bacio">Bacio</option>
                                        </optgroup>
                                    </select>

                                    <div class="form-helper-text">This choice will be used if either of the first two
                                        choices is unavailable.</div>
                                </div>

                                <div class="form-group">
                                    <label for="topping">Topping:</label>
                                    <select id="topping" name="topping" class="form-control" required>
                                        <option value="">Choose...</option>
                                        <option value="Standard">Standard</option>
                                        <option value="Special">Special</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="comments">Comments:</label>
                                    <textarea id="comments" name="comments" class="form-control" placeholder="Comments"></textarea>
                                </div>
                                <div class="form-group" id="file_out">
                                    <label for="file">Add File/Photo:</label>
                                    <input type="file" id="file" name="file" class="form-control-file">
                                    <div class="form-helper-text" id="file_helper">Only for 12 persons or more.</div>
                                </div>
                                <!-- Captcha -->
                                <div class="row">
                                    <div class="form-group">
                                        <label><strong>Enter the Captcha code:</strong></label><br />
                                        <input type="text" id="captcha" name="captcha" placeholder="Enter the Captcha code" required>
                                        <p><br /><img src="./php/booking/captcha.php?rand=<?php echo rand(); ?>" id="captcha_image"></p>
                                        <p>Can't read the image? <a href="#" onclick="refreshCaptcha(event);">Click
                                                here</a> to refresh</p>
                                    </div>
                                </div>

                            </div>

                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                <span class="description">Make a Reservation!</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                    </svg>
                                </span>
                                <span class="error">Retry...</span>
                            </button>
                        </form>


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
                                var personsInput = document.getElementById('persons');
                                var fileOut = document.getElementById('file_out');
                                var fileHelper = document.getElementById('file_helper');
                                fileOut.style.display = 'none';
                                fileHelper.style.display = 'none';
                                document.getElementById('file').removeAttribute('required');
                                personsInput.addEventListener('change', function() {
                                    var persons = parseInt(personsInput.value);
                                    if (persons >= 12) {
                                        fileOut.style.display = 'block';
                                        fileHelper.style.display = 'block';
                                        document.getElementById('file').setAttribute('required', true);
                                    } else {
                                        fileOut.style.display = 'none';
                                        fileHelper.style.display = 'none';
                                        document.getElementById('file').removeAttribute('required');
                                    }
                                });
                                form.addEventListener("submit", function(event) {
                                    event.preventDefault();
                                    submitForm();
                                });

                                captchaImage.addEventListener("click", function() {
                                    refreshCaptcha();
                                });

                                function getCaptcha() {
                                    axios.get('./php/booking/get-captcha.php')
                                        .then(function(response) {
                                            console.log('Captcha:', response.data.captcha);
                                        })
                                        .catch(function(error) {
                                            console.error('Error fetching captcha:', error);
                                        });
                                }

                                // Call this function whenever you want to get the value of captcha
                                getCaptcha();

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

                                    // Validate each required input field
                                    const inputs = form.querySelectorAll("[required]");
                                    let isValid = true;
                                    inputs.forEach(function(input) {
                                        if (input.value.trim() === "") {
                                            isValid = false;
                                            // Add red border to empty required fields
                                            input.style.border = "1px solid red";
                                        } else {
                                            // Reset border to default style
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
                                                // Use AJAX to submit form data
                                                submitButton.innerHTML =
                                                    '<span class="description">Submitting...</span>';
                                                console.log(formData);

                                                axios.post('./php/booking/booking-reservations-en.php',
                                                        formData)
                                                    .then(response => {
                                                        console.log('Form submission response:', response
                                                            .data);
                                                        if (response.data === 'success success') {
                                                            submitButton.innerHTML =
                                                                '<span class="description">Reservation successful!</span>';
                                                            submitButton.classList.remove('btn-secondary');
                                                            submitButton.classList.remove('btn-submit');
                                                            submitButton.classList.add('btn-success');
                                                            submitButton.setAttribute('disabled',
                                                                'disabled');
                                                        } else {
                                                            openModal(
                                                                'There was an error submitting the form. Please try again.'
                                                            );
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.error('Error submitting form:', error);
                                                        openModal(
                                                            'There was an error submitting the form. Please try again.'
                                                        );
                                                    });
                                            } else {
                                                openModal(
                                                    'The entered CAPTCHA code does not match. Please try again.'
                                                );
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
    <?php
    include 'carosuel-main-en.php';
    ?>
    <!-- Footer -->
    <footer id="footer" class="bg-dark dark">
        <div class="container">
            <!-- Footer 1st Row -->
            <div class="footer-first-row row">
                <div class="col-lg-3 text-center">
                    <a href="index-en.php">
                        <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88" class="mt-5 mb-5">
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
                                <td class="content">
                                    <a href="tel:+0497476548" target="_blank">
                                        <i class="fa fa-phone fa-lg"></i> 0497 47 65 48
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="title">Email:</td>
                                <td class="content">
                                    <a href="mailto:info@gelatonaturale.be" target="_blank">
                                        <i class="fa fa-lg fa-envelope"></i>info@gelatonaturale.be
                                    </a>
                                </td>


                            </tr>
                        </tbody>
                    </table>

                    <h5 class="text-muted mb-3 mt-4">Social Media</h5>
                    <a href="https://www.facebook.com/gelatonaturaletarcienne" class="icon icon-social icon-circle icon-sm icon-facebook">
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
            <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88">
        </a>
        <button class="close" data-toggle="panel-mobile">
            <i class="ti ti-close"></i>
        </button>
    </div>
    <nav class="module module-navigation"></nav>
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
                <a class="dropdown-item" href="./page-reservation.php">
                    <i class="flag flag-france"></i>Français </a>
            </li>
            <li>
                <a class="dropdown-item" href="./page-reservations-nl.php">
                    <i class="flag-netherlands flag"></i>Dutch </a>
            </li>
        </ul>
    </div>
    <?php
    include 'footer-en.php';
    ?>