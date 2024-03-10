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
    include 'header-nl.php';
?>

<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
 <a class="dropdown-toggle" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
  <i class="flag flag-netherlands m-0"></i>
 </a>
 <ul class="dropdown-menu" aria-labelledby="Dropdown">
  <li>
   <a class="dropdown-item" href="#">
    <i class="flag-france flag"></i>Dutch <i class="fa fa-check text-success ms-2"></i>
   </a>
  </li>
  <li>
   <hr class="dropdown-divider">
  </li>
  <li>
   <a class="dropdown-item" href="./Professionnels-en.php">
    <i class="flag flag-united-kingdom"></i>English </a>
  </li>
  <li>
   <a class="dropdown-item" href="./Professionnels.php">
    <i class="flag-france flag"></i>Français</a>
    </li>
 </ul>
</div>
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
 <a href="index-nl.php">
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
<h4 class="text-muted mb-0">We kunnen aan al uw verzoeken voldoen voor fijne kruidenierswaren, cacaoproductie, sterrenrestaurants.
Of u nu een Frans gastronomisch restaurant, Maghrebijn, Aziatisch of Italiaans bent, wij zullen uw kenmerkende ijs naar uw smaak, traditie en behoeften creëren.
We bieden ook bezorgservice voor u.</h4>

            </div>
        </div>
    </div>
</div>
 <!-- Section -->
 <section class="section section-lg bg-dark">
  <!-- Video Achtergrond -->
  <!-- Achtergrondvideo -->
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
        <h4 class="mb-0">Reserveer een tafel</h4>
        <p class="lead text-muted mb-0">Details over uw reservering.</p>
       </div>
      </div>
      <form id="booking-form" class="booking-form" data-validate>
    <div class="utility-box-content">
        <div class="form-group">
            <label>Naam:</label>
            <input type="text" name="name" class="form-control" placeholder="Naam" required>
        </div>
        <div class="form-group">
            <label>Voornaam:</label>
            <input type="text" name="surname" class="form-control" placeholder="Voornaam" required>
        </div>
        <div class="form-group">
            <label>Bedrijf:</label>
            <input type="text" name="company" class="form-control" placeholder="Bedrijf" required>
        </div>
        <div class="form-group">
            <label>Telefoon:</label>
            <input type="text" name="phone" class="form-control" placeholder="Telefoon" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label>Bedrijfstak:</label>
            <input type="text" name="sector" class="form-control" placeholder="Bedrijfstak" required>
        </div>
        <div class="form-group">
            <label>Gewenste Leverdatum:</label>
            <input type="date" name="delivery_date" class="form-control" placeholder="Gewenste Leverdatum" required>
        </div>
        <div class="form-group">
            <label>Leveringsadres:</label>
            <input type="text" name="delivery_address" class="form-control" placeholder="Leveringsadres" required>
        </div>
        <div class="form-group">
            <label>Opmerking:</label>
            <textarea name="comment" class="form-control" placeholder="Opmerking"></textarea>
        </div>
        <div class="row">
            <div class="form-group">
                <?php echo $status; ?>
                <!-- HTML -->
                <label><strong>Vul de Captcha-code in:</strong></label><br />
                <input type="text" name="captcha" id="captcha" placeholder="Vul de Captcha-code in" />
                <p><br /><img src="./php/booking/captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'></p>
                <p>Kunt u de afbeelding niet lezen? <a href='#' onclick='refreshCaptcha(event);'>Klik hier</a> om te vernieuwen</p>
            </div>
        </div>
    </div>
    <input type="text" name="lang" class="form-control" value="nl" disabled required hidden>
    <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
        <span class="description">Reservering maken!</span>
        <span class="success">
            <svg x="0px" y="0px" viewBox="0 0 32 32">
                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
            </svg>
        </span>
        <span class="error">Opnieuw proberen...</span>
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
            console.error('Fout bij het ophalen van captcha:', error);
        });
}

// Roep deze functie aan wanneer je de captcha-waarde wilt ophalen
getCaptcha();

function submitForm() {
    const form = document.getElementById("booking-form");
    const captchaInput = form.querySelector('input[name="captcha"]');
    const captcha = captchaInput.value;

    // Maak een FormData-object aan en voeg het captcha-veld toe
    const formData = new FormData();
    formData.append('captcha', captcha);

    axios.post('./php/booking/validate-captcha.php', formData)
        .then(response => {
            console.log('Validatie reactie:', response.data.valid);

            if (response.data.valid) {
                const submitButton = form.querySelector(".btn-submit");
                submitButton.removeAttribute('disabled');

            } else {
                openModal('De ingevoerde CAPTCHA-code komt niet overeen. Probeer het opnieuw.');
                refreshCaptcha();
            }
        })
        .catch(error => {
            console.error('Fout bij het valideren van CAPTCHA:', error);
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
            console.error('Fout bij het vernieuwen van CAPTCHA:', error);
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

        // Voeg de waarde van CAPTCHA toe aan FormData
        formData.append('captcha', captcha);
        // Valideer elk vereist invoerveld
        const inputs = form.querySelectorAll("[required]");
        let isValid = true;
        inputs.forEach(function(input) {
            if (input.value.trim() === "") {
                isValid = false;
                // Optioneel: je kunt visuele feedback toevoegen voor de gebruiker, zoals een rode rand toevoegen aan het ongeldige invoerveld
                input.style.border = "1px solid red";
            } else {
                // Reset de rand naar de standaardstijl
                input.style.border = "";
            }
        });

        // Controleer of de geselecteerde datum 14 februari 2024 is
        if (selectedDateTime.getDate() === 14 && selectedDateTime.getMonth() === 1 && selectedDateTime.getFullYear() === 2024) {
            openModal("Het spijt ons, al onze tafels zijn gereserveerd op 14 februari 2024");
            return; // Voorkom verdere verwerking
        }
        // Als alle vereiste velden zijn ingevuld, verstuur het formulier
        if (isValid) {
            // Valideer CAPTCHA
            axios.post('./php/booking/validate-captcha.php', formData)
                .then(function(response) {
                    console.log('Validatie reactie:', response.data.valid);

                    if (response.data.valid) {
                        // CAPTCHA is geldig, ga door met het verzenden van het formulier
                        if (isDateTimeValid(selectedDateTime)) {
                            submitButton.innerHTML = '<span class="description">Verzenden...</span>';

                            axios.post('./php/booking/booking-form-nl.php', formData)
                                .then(function(response) {
                                    submitButton.innerHTML = '<span class="description">Reservering succesvol!</span>';
                                    submitButton.classList.remove('btn-secondary');
                                    submitButton.classList.remove('btn-submit');
                                    submitButton.classList.add('btn-success');
                                    submitButton.setAttribute('disabled', 'disabled');
                                })
                                .catch(function(error) {
                                    submitButton.innerHTML = '<span class="error">Probeer het opnieuw...</span>';
                                    submitButton.classList.remove('btn-submit');
                                    submitButton.classList.remove('btn-secondary');
                                    submitButton.classList.add('btn-danger');
                                });
                        } else {
                            // Toon een foutmelding en voorkom het verzenden van het formulier
                            modalMessage.innerText =
                                'Ongeldige datum of tijd. Selecteer alstublieft een geldige datum en tijd binnen de toegestane uren.';
                            confirmationModal.style.display = 'block';
                            // Voorkom het verzenden van het formulier
                            return false;
                        }
                    } else {
                        // Toon een foutmelding en voorkom het verzenden van het formulier
                        modalMessage.innerText = 'De ingevoerde CAPTCHA-code komt niet overeen. Probeer het opnieuw.';
                        confirmationModal.style.display = 'block';
                        // Voorkom het verzenden van het formulier
                        return false;
                    }
                })
                .catch(function(error) {
                    console.error('Fout bij het valideren van CAPTCHA:', error);
                });
        } else {
            // Optioneel: je kunt de gebruiker informeren dat er lege vereiste velden zijn
            modalMessage.innerText = "Vul alle vereiste velden in.";
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



}); 
   function openModal(message) {
        modalMessage.innerText = message;
        confirmationModal.style.display = 'block';
    }

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
     <a href="index-nl.php">
      <img src="assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88"
       class="mt-5 mb-5">
     </a>
    </div>
    <style>
    .styled-table {
     --background-color: #343a40;
     /* Couleur de fond sombre */
     color: #ffffff;
     /* Couleur du texte */
     border-radius: 10px;
     /* Coins arrondis */
     margin-top: 20px;
     /* Ajouter un espace en haut */
    }

    .styled-table h5 {
     color: #007bff;
     /* Couleur thème bleu */
    }

    .styled-table td.title {
     --font-weight: bold;
     color: #ffffff;
     /* Couleur du texte */
    }

    .styled-table td.content {
     color: #a8b2b7;
     /* Couleur de texte plus claire */
    }

    .styled-table a {
     color: #ffffff;
     /* Couleur du lien */
    }

    .styled-table a:hover {
     text-decoration: none;
     /* Supprimer le soulignement au survol */
    }
    </style>

    <div class="col-lg-4 col-md-6 styled-table">
     <h5 class="text-muted">Heures d'ouverture</h5>
     <table class="table">
      <tbody>
<?php 
include 'table-nl.php';
?>
      </tbody>
     </table>
    </div>

    <div class="col-lg-5 col-md-6 styled-table">
     <h5 class="text-muted mb-3">Coordonnées</h5>
     <table class="table">
      <tbody>
       <tr>
        <td class="title">Téléphone :</td>
        <td class="content"><a href="tel:+071218620" target="_blank">071 21 86 20</a></td>
       </tr>
       <tr>
        <td class="title">Email :</td>
        <td class="content"><a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a></td>
       </tr>
      </tbody>
     </table>

     <h5 class="text-muted mb-3 mt-4">Médias sociaux</h5>
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
    <span class="text-muted">Aangepast door FAST CAISSE <script>
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
<!-- Panel Cart -->
<div id="panel-cart">
 <div class="panel-cart-container">
  <div class="panel-cart-title">
   <h5 class="title">Your Cart</h5>
   <button class="close" data-toggle="panel-cart">
    <i class="ti ti-close"></i>
   </button>
  </div>
  <div class="panel-cart-content cart-details">
   <table class="cart-table">
    <tr>
     <td class="title">
      <span class="name">
       <a href="#product-modal" data-toggle="modal">Beef Burger</a>
      </span>
      <span class="caption text-muted">Large (500g)</span>
     </td>
     <td class="price">$9.00</td>
     <td class="actions">
      <a href="#product-modal" data-toggle="modal" class="action-icon">
       <i class="ti ti-pencil"></i>
      </a>
      <a href="#" class="action-icon">
       <i class="ti ti-close"></i>
      </a>
     </td>
    </tr>
    <tr>
     <td class="title">
      <span class="name">
       <a href="#product-modal" data-toggle="modal">Extra Burger</a>
      </span>
      <span class="caption text-muted">Small (200g)</span>
     </td>
     <td class="price text-success">$9.00</td>
     <td class="actions">
      <a href="#product-modal" data-toggle="modal" class="action-icon">
       <i class="ti ti-pencil"></i>
      </a>
      <a href="#" class="action-icon">
       <i class="ti ti-close"></i>
      </a>
     </td>
    </tr>
   </table>
   <div class="cart-summary">
    <div class="row">
     <div class="col-7 text-right text-muted">Order total:</div>
     <div class="col-5">
      <strong>$ <span class="cart-products-total">0.00</span>
      </strong>
     </div>
    </div>
    <div class="row">
     <div class="col-7 text-right text-muted">Devliery:</div>
     <div class="col-5">
      <strong>$ <span class="cart-delivery">0.00</span>
      </strong>
     </div>
    </div>
    <hr class="hr-sm">
    <div class="row text-lg">
     <div class="col-7 text-right text-muted">Total:</div>
     <div class="col-5">
      <strong>$ <span class="cart-total">0.00</span>
      </strong>
     </div>
    </div>
   </div>
   <div class="cart-empty">
    <i class="ti ti-shopping-cart"></i>
    <p>Your cart is empty...</p>
   </div>
  </div>
 </div>
 <a href="checkout-nl.php" class="panel-cart-action btn btn-secondary btn-block btn-lg">
  <span>Go to checkout</span>
 </a>
</div>
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
   <i class="flag flag-netherlands m-0"></i>
  </a>
  <ul class="dropdown-menu" aria-labelledby="Dropdown1">
   <li>
    <a class="dropdown-item" href="#">
     <i class="flag-netherlands flag"></i>Dutch <i class="fa fa-check text-success ms-2"></i>
    </a>
   </li>
   <li>
    <hr class="dropdown-divider">
   </li>
   <li>
   <a class="dropdown-item" href="./Professionnels-en.php">
    <i class="flag flag-united-kingdom"></i>English </a>
  </li>
  <li>
   <a class="dropdown-item" href="./Professionnels.php">
    <i class="flag-france flag"></i>Français</a>
    </li>
  </ul>
 </div>
 <?php
    include 'footer-nl.php';
?>