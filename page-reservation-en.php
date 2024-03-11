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
<h4 class="text-muted mb-0">We can meet all your requests for fine groceries, cocoa production, starred restaurants.
Whether you are a French gourmet restaurant, Maghrebi, Asian, or Italian, we will create your signature ice cream according to your taste, tradition, and needs.
We also provide delivery service for you.</h4>

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
<img class="bg-image dark-overlay" src="./assets/img/professionals/professionals.jpg" alt="Professionals Background">

   </div>
   <div class="container">
    <div class="row justify-content-center">
     <div class="col-lg-6">
      <!-- Réserver une table -->
      <div class="utility-box">
       <div class="utility-box-title bg-dark dark">
        <div class="bg-image">
         <img src="./assets/img/professionals/prof.jpg" alt="bg-image">
        </div>
       <div>
        <span class="icon icon-primary">
         <i class="ti ti-bookmark-alt"></i>
        </span>
        <h4 class="mb-0">Book a table</h4>
        <p class="lead text-muted mb-0">Details about your reservation.</p>
       </div>
      </div>
      <form id="booking-form" class="booking-form" data-validate>
    <div class="utility-box-content">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="surname" class="form-control" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <label>Company:</label>
            <input type="text" name="company" class="form-control" placeholder="Company" required>
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label>Industry Sector:</label>
            <input type="text" name="sector" class="form-control" placeholder="Industry Sector" required>
        </div>
        <div class="form-group">
            <label>Desired Delivery Date:</label>
            <input type="date" name="delivery_date" class="form-control" placeholder="Desired Delivery Date" required>
        </div>
        <div class="form-group">
            <label>Delivery Address:</label>
            <input type="text" name="delivery_address" class="form-control" placeholder="Delivery Address" required>
        </div>
        <div class="form-group">
            <label>Comment:</label>
            <textarea name="comment" class="form-control" placeholder="Comment"></textarea>
        </div>
        <div class="row">
            <div class="form-group">
                <?php echo $status; ?>
                <!-- HTML -->
                <label><strong>Enter Captcha Code:</strong></label><br />
                <input type="text" name="captcha" id="captcha" placeholder="Enter Captcha Code" />
                <p><br /><img src="./php/booking/captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'></p>
                <p>Can't read the image? <a href='#' onclick='refreshCaptcha(event);'>Click here</a> to refresh</p>
            </div>
        </div>
    </div>
    <input type="text" name="lang" class="form-control" value="en" disabled required hidden>
    <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
        <span class="description">Make a reservation!</span>
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
                    // Get the current date and time
    var currentDate = new Date();
    
    // Format the current date and time into the required format for the input element
    var formattedCurrentDate = currentDate.getFullYear() + '-' + ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' + ('0' + currentDate.getDate()).slice(-2) + 'T' + ('0' + currentDate.getHours()).slice(-2) + ':' + ('0' + currentDate.getMinutes()).slice(-2);

    // Set the minimum value of the input element to the formatted current date and time
    document.getElementById("DateTime").min = formattedCurrentDate;
      function getCaptcha() {
       axios.get('./php/booking/get-captcha.php')
        .then(function(response) {
         console.log('Captcha:', response.data.captcha);

        })
        .catch(function(error) {
         console.error('Error fetching captcha:', error);
        });
      }

      // Call this function whenever you want to get the captcha value
      getCaptcha();

      function submitForm() {
       const form = document.getElementById("booking-form");
       const captchaInput = form.querySelector('input[name="captcha"]');
       const captcha = captchaInput.value;

       // Create FormData object and append captcha field
       const formData = new FormData();
       formData.append('captcha', captcha);

       axios.post('./php/booking/validate-captcha.php', formData)
        .then(response => {
         console.log('Validation response:', response.data.valid);

         if (response.data.valid) {
          const submitButton = form.querySelector(".btn-submit");


         } else {
          openModal('Entered CAPTCHA code does not match. Please try again.');
          refreshCaptcha();

         }
        })
        .catch(error => {
         console.error('Error validating CAPTCHA:', error);
        });
      }

      function openModal(message) {
       modalMessage.innerText = message;
       confirmationModal.style.display = 'block';
      }

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
      document.addEventListener("DOMContentLoaded", function() {
       const form = document.getElementById("booking-form");
       const submitButton = form.querySelector(".btn-submit");

       const datetimeInput = form.querySelector('input[name="datetime"]');
       const confirmationModal = document.getElementById('confirmationModal');
       const modalMessage = document.getElementById('modalMessage');

       form.addEventListener("submit", function(event) {
         event.preventDefault();

         const formData = new FormData(form);
         const selectedDateTime = new Date(formData.get('datetime'));
         const captchaInput = form.querySelector('input[name="captcha"]');
         const captcha = captchaInput.value;

         // Include CAPTCHA value in FormData
         formData.append('captcha', captcha);
           // Validate each required input
           const inputs = form.querySelectorAll("[required]");
            let isValid = true;
            inputs.forEach(function(input) {
                if (input.value.trim() === "") {
                    isValid = false;
                    // Optionally, you can add visual feedback for the user, like adding a red border to the invalid input
                    input.style.border = "1px solid red";
                } else {
                    // Reset the border to its default style
                    input.style.border = "";
                }
            });
                    // Check if selected date is 14th February 2024
                    if (selectedDateTime.getDate() === 14 && selectedDateTime.getMonth() === 1 && selectedDateTime.getFullYear() === 2024) {
            openModal("We are sorry, all our tables are reserved on February 14th, 2024.");
            return; // Prevent further processing
        }
            // If all required fields are filled, submit the form
            if (isValid) {

         // Validate CAPTCHA
         axios.post('./php/booking/validate-captcha.php', formData)
          .then(function(response) {
           console.log('Validation response:', response.data.valid);

           if (response.data.valid) {
            // CAPTCHA is valid, proceed with form submission
            if (isDateTimeValid(selectedDateTime)) {
             submitButton.innerHTML = '<span class="description">Submitting...</span>';

             axios.post('./php/booking/booking-form-en.php', formData)
              .then(function(response) {
               submitButton.innerHTML = '<span class="description">Reservation Successful!</span>';
               submitButton.classList.remove('btn-secondary');
               submitButton.classList.remove('btn-submit');
               submitButton.classList.add('btn-success');
               submitButton.setAttribute('disabled', 'disabled');
              })
              .catch(function(error) {
               submitButton.innerHTML = '<span class="error">Try again...</span>';
               submitButton.classList.remove('btn-submit');
               submitButton.classList.remove('btn-secondary');
               submitButton.classList.add('btn-danger');
              });
            } else {
             // Show an error message and prevent form submission
             modalMessage.innerText =
              'Invalid Date or Time. Please select a valid date and time within the allowed hours.';
             confirmationModal.style.display = 'block';
             // Prevent form submission
             return false;
            }
           } else {
            // Show an error message and prevent form submission
            modalMessage.innerText = 'Entered CAPTCHA code does not match. Please try again.';
            confirmationModal.style.display = 'block';
            // Prevent form submission
            return false;
           }
          })
          .catch(function(error) {
           console.error('Error validating CAPTCHA:', error);
          });
        } else {
                // Optionally, you can inform the user that there are empty required fields
                modalMessage.innerText = "Please fill in all required fields.";
                confirmationModal.style.display = 'block';
            }
        });

        function isDateTimeValid(dateTime) {
    const day = dateTime.getDay();
    const hours = dateTime.getHours();
    const minutes = dateTime.getMinutes();
    switch (day) {
        case 0: // Sunday
            return (hours >= 18 && hours < 22) || (hours >= 12 && hours < 14);
        case 1: // Monday
            return hours >= 18 && hours < 22;
        case 2: // Tuesday
            return false; // Closed on Tuesday
        case 3: // Wednesday
            return hours >= 18 && hours < 22;
        case 4: // Thursday
            return (hours >= 12 && hours < 14) || (hours >= 18 && hours < 22);
        case 5: // Friday
            return (hours >= 12 && hours < 14) || (hours >= 18 && hours < 22);
        case 6: // Saturday
            return hours >= 18 && hours < 22;
        default:
            return false;
    }
}




       function openModal(message) {
        modalMessage.innerText = message;
        confirmationModal.style.display = 'block';
       }
      });

      function closeModal() {
       document.getElementById('confirmationModal').style.display = 'none';
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
        <td class="content">
    <a href="tel:+0497476548" target="_blank">
        <i class="fa fa-phone fa-lg"></i> 0497 47 65 48
    </a>
</td>

       </tr>
       <tr>
        <td class="title">Email:</td>
       <td class="content">
    <a href="mailto:info@matthiasandsea.be" target="_blank">
        <i class="fa fa-lg fa-envelope"></i> info@matthiasandsea.be
    </a>
</td>

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