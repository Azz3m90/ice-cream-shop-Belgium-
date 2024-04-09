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
include 'header-nl.php';
?>
<script src="./dist/js/menu/axios.min.js"></script>
<script src="./dist/js/clearCache.js"></script>

<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
    <a class="dropdown-toggle" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
        <i class="flag flag-netherlands m-0"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="Dropdown">
        <li>
            <a class="dropdown-item" href="#">
                <i class="flag-netherlands flag"></i>Dutch <i class="fa fa-check text-success ms-2"></i>
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
            <a class="dropdown-item" href="./page-reservation-en.php">
                <i class="flag-united-kingdom flag"></i> English</a>
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
        <a href="index.php">
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

    <!-- Pagina Titel -->
    <div class="page-title border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <h1 class="mb-0">Formulier voor onze Yule Cakes</h1>
                    <h4 class="text-muted mb-0" style="text-align: justify;">Vul het onderstaande formulier in om uw
                        bestelling voor Yule Cakes te plaatsen. Dank u voor uw vertrouwen!</h4>
                </div>
            </div>
        </div>
    </div>



    <!-- Section -->
    <section class="section section-lg bg-dark">
        <div class="bg-video dark-overlay">
            <img class="bg-image dark-overlay" src="./assets/img/Reservations/reservation.jpg"
                alt="Professionals Background">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="utility-box">
                        <div class="utility-box-title bg-dark dark">
                            <div class="bg-image">
                                <img src="./assets/img/icecream/cake.jpg" alt="bg-image">
                            </div>
                            <div>
                                <span class="icon icon-primary">
                                    <i class="ti ti-bookmark-alt"></i>
                                </span>
                                <h4 class="mb-0">Formulier</h4>
                                <p class="lead text-muted mb-0">Details over uw reservering.</p>
                            </div>
                        </div>
                        <form id="booking-form" class="booking-form" method="post" data-validate>
                            <div class="utility-box-content">

                                <div class="form-group">
                                    <label for="last_name">Achternaam:</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                        placeholder="Achternaam" required>
                                </div>
                                <div class="form-group">
                                    <label for="first_name">Voornaam:</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control"
                                        placeholder="Voornaam" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefoonnummer:</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Telefoonnummer" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_date">Leveringsdatum:</label>
                                    <input type="date" id="delivery_date" name="delivery_date" class="form-control"
                                        placeholder="Leveringsdatum" min="<?php echo date('Y-m-d'); ?>" required>
                                    <div class="form-helper-text">Voor alle ingediende aanvragen geldt een minimum van 3
                                        dagen.
                                        <br />Voor elk dringend verzoek kunt u ons bellen.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="persons">Aantal Personen:</label>
                                    <input type="number" id="persons" name="persons" class="form-control"
                                        placeholder="Aantal Personen minimaal 5 personen" min="5" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Voor:</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="" selected disabled>Kies...</option>
                                        <option value="Man">Man</option>
                                        <option value="Vrouw">Vrouw</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="age">Leeftijd:</label>
                                    <input type="number" id="age" name="age" class="form-control" placeholder="Leeftijd"
                                        required>
                                </div>
                                <div class="form-group" id="first_choice_out">
                                    <label for="first_choice">Eerste Smaakkeuze:</label>
                                    <select id="first_choice" name="first_choice" class="form-control" required>
                                        <option value="" selected disabled>Kies...</option>

                                        <optgroup label="Klassieke Smaken">
                                            <option value="Vanille">Vanille</option>
                                            <option value="Chocolade">Chocolade</option>
                                            <option value="Stracciatella">Stracciatella</option>
                                            <option value="Beter dan Kinder Bueno">Beter dan Kinder Bueno</option>
                                            <option value="Beter dan Rocher">Beter dan Rocher</option>
                                            <option value="Beter dan Snickers">Beter dan Snickers</option>
                                            <option value="Beter dan Nutella">Beter dan Nutella</option>
                                            <option value="Pistache">Pistache</option>
                                            <option value="Koffie">Koffie</option>
                                            <option value="Fior di latte">Fior di latte</option>
                                            <option value="Gezouten Boter Karamel">Gezouten Boter Karamel</option>
                                            <option value="Speculoos">Speculoos</option>
                                            <option value="Engelse Soep">Engelse Soep</option>
                                            <option value="Tiramisù">Tiramisù</option>
                                            <option value="Kokosnoot">Kokosnoot</option>
                                        </optgroup>
                                        <optgroup label="Sorbet">
                                            <option value="Aardbeien sorbet">Aardbeien sorbet</option>
                                            <option value="Frambozen sorbet">Frambozen sorbet</option>
                                            <option value="Banaan sorbet">Banaan sorbet</option>
                                            <option value="Frambozen sorbet">Frambozen sorbet</option>
                                            <option value="Litchi sorbet">Litchi sorbet</option>
                                            <option value="Mango sorbet">Mango sorbet</option>
                                            <option value="Passievrucht sorbet">Passievrucht sorbet</option>
                                            <option value="Limoen sorbet">Limoen sorbet</option>
                                            <option value="Gele citroen sorbet">Gele citroen sorbet</option>
                                            <option value="Meloen cavaillon sorbet">Meloen cavaillon sorbet</option>
                                            <option value="Watermeloen sorbet">Watermeloen sorbet</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group" id="second_choice_out">
                                    <label for="second_choice">Tweede Smaakkeuze:</label>
                                    <select id="second_choice" name="second_choice" class="form-control" required>
                                        <option value="" selected disabled>Kies...</option>
                                        <optgroup label="Klassieke Smaken">
                                            <option value="Vanille">Vanille</option>
                                            <option value="Chocolade">Chocolade</option>
                                            <option value="Stracciatella">Stracciatella</option>
                                            <option value="Beter dan Kinder Bueno">Beter dan Kinder Bueno</option>
                                            <option value="Beter dan Rocher">Beter dan Rocher</option>
                                            <option value="Beter dan Snickers">Beter dan Snickers</option>
                                            <option value="Beter dan Nutella">Beter dan Nutella</option>
                                            <option value="Pistache">Pistache</option>
                                            <option value="Koffie">Koffie</option>
                                            <option value="Fior di latte">Fior di latte</option>
                                            <option value="Gezouten Boter Karamel">Gezouten Boter Karamel</option>
                                            <option value="Speculoos">Speculoos</option>
                                            <option value="Engelse Soep">Engelse Soep</option>
                                            <option value="Tiramisù">Tiramisù</option>
                                            <option value="Kokosnoot">Kokosnoot</option>
                                        </optgroup>
                                        <optgroup label="Sorbet">
                                            <option value="Aardbeien sorbet">Aardbeien sorbet</option>
                                            <option value="Frambozen sorbet">Frambozen sorbet</option>
                                            <option value="Banaan sorbet">Banaan sorbet</option>
                                            <option value="Frambozen sorbet">Frambozen sorbet</option>
                                            <option value="Litchi sorbet">Litchi sorbet</option>
                                            <option value="Mango sorbet">Mango sorbet</option>
                                            <option value="Passievrucht sorbet">Passievrucht sorbet</option>
                                            <option value="Limoen sorbet">Limoen sorbet</option>
                                            <option value="Gele citroen sorbet">Gele citroen sorbet</option>
                                            <option value="Meloen cavaillon sorbet">Meloen cavaillon sorbet</option>
                                            <option value="Watermeloen sorbet">Watermeloen sorbet</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group" id="alternate_choice_out">
                                    <label for="alternate_choice">Alternatieve Smaakkeuze:</label>
                                    <select id="alternate_choice" name="alternate_choice" class="form-control" required>
                                        <option value="" selected disabled>Kies...</option>
                                        <optgroup label="Klassieke Smaken">
                                            <option value="Vanille">Vanille</option>
                                            <option value="Chocolade">Chocolade</option>
                                            <option value="Stracciatella">Stracciatella</option>
                                            <option value="Beter dan Kinder Bueno">Beter dan Kinder Bueno</option>
                                            <option value="Beter dan Rocher">Beter dan Rocher</option>
                                            <option value="Beter dan Snickers">Beter dan Snickers</option>
                                            <option value="Beter dan Nutella">Beter dan Nutella</option>
                                            <option value="Pistache">Pistache</option>
                                            <option value="Koffie">Koffie</option>
                                            <option value="Fior di latte">Fior di latte</option>
                                            <option value="Gezouten Boter Karamel">Gezouten Boter Karamel</option>
                                            <option value="Speculoos">Speculoos</option>
                                            <option value="Engelse Soep">Engelse Soep</option>
                                            <option value="Tiramisù">Tiramisù</option>
                                            <option value="Kokosnoot">Kokosnoot</option>
                                        </optgroup>
                                        <optgroup label="Sorbet">
                                            <option value="Aardbeien sorbet">Aardbeien sorbet</option>
                                            <option value="Frambozen sorbet">Frambozen sorbet</option>
                                            <option value="Banaan sorbet">Banaan sorbet</option>
                                            <option value="Frambozen sorbet">Frambozen sorbet</option>
                                            <option value="Litchi sorbet">Litchi sorbet</option>
                                            <option value="Mango sorbet">Mango sorbet</option>
                                            <option value="Passievrucht sorbet">Passievrucht sorbet</option>
                                            <option value="Limoen sorbet">Limoen sorbet</option>
                                            <option value="Gele citroen sorbet">Gele citroen sorbet</option>
                                            <option value="Meloen cavaillon sorbet">Meloen cavaillon sorbet</option>
                                            <option value="Watermeloen sorbet">Watermeloen sorbet</option>
                                        </optgroup>
                                    </select>

                                    <div class="form-helper-text">Deze keuze wordt gebruikt als een van de eerste twee
                                        keuzes niet beschikbaar is.</div>
                                </div>

                                <div class="form-group">
                                    <label for="topping">Topping:</label>
                                    <select id="topping" name="topping" class="form-control" required>
                                        <option value="">Kies...</option>
                                        <option value="Standaard">Standaard</option>
                                        <option value="Speciaal">Speciaal</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="comments">Opmerkingen:</label>
                                    <textarea id="comments" name="comments" class="form-control"
                                        placeholder="Opmerkingen"></textarea>
                                </div>

                                <div class="form-group" id="file_out">
                                    <label for="file">Bestand/Foto toevoegen:</label>
                                    <input type="file" id="file" name="file" class="form-control-file">
                                    <div class="form-helper-text" id="file_helper">Alleen voor 12 personen of meer.
                                    </div>
                                </div>

                                <!-- Captcha -->
                                <div class="row">
                                    <div class="form-group">
                                        <label><strong>Voer de Captcha-code in:</strong></label><br />
                                        <input type="text" id="captcha" name="captcha"
                                            placeholder="Voer de Captcha-code in" required>
                                        <p><br /><img src="./php/booking/captcha.php?rand=<?php echo rand(); ?>"
                                                id="captcha_image"></p>
                                        <p>Kan de afbeelding niet lezen? <a href="#"
                                                onclick="refreshCaptcha(event);">Klik hier</a> om te vernieuwen</p>
                                    </div>
                                </div>

                            </div>

                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                <span class="description">Reservering maken!</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none"
                                            stroke="#FFFFFF" stroke-width="2" stroke-linecap="square"
                                            stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                    </svg>
                                </span>
                                <span class="error">Opnieuw proberen...</span>
                            </button>

                        </form>

                        <style>
                        .btn-success {
                            background-color: #28a745;
                            border-color: #28a745;
                        }

                        .btn-danger {
                            background-color: #dc3545;
                            border-color: #dc3545;
                        }

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
                            border: 1px solid red;
                        }
                        </style>

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
                                    openModal('Voer een geldig e-mailadres in.');
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
                                    openModal("Vul alle verplichte velden in.");
                                    return false;
                                }

                                axios.post('./php/booking/validate-captcha.php', formData)
                                    .then(response => {
                                        if (response.data.valid) {
                                            console.log(formData);
                                            // Use AJAX to submit form data
                                            submitButton.innerHTML =
                                                '<span class="description">Bezig met verzenden...</span>';
                                            axios.post('./php/booking/booking-reservations-nl.php',
                                                    formData)
                                                .then(response => {
                                                    console.log('Form submission response:', response
                                                        .data);
                                                    if (response.data === 'success success') {
                                                        submitButton.innerHTML =
                                                            '<span class="description">Reservering succesvol!</span>';
                                                        submitButton.classList.remove('btn-secondary');
                                                        submitButton.classList.remove('btn-submit');
                                                        submitButton.classList.add('btn-success');
                                                        submitButton.setAttribute('disabled',
                                                            'disabled');
                                                    } else {
                                                        openModal(
                                                            'Er is een fout opgetreden bij het verzenden van het formulier. Probeer het opnieuw.'
                                                        );
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error submitting form:', error);
                                                    openModal(
                                                        'Er is een fout opgetreden bij het verzenden van het formulier. Probeer het opnieuw.'
                                                    );
                                                });
                                        } else {
                                            openModal(
                                                'De ingevoerde CAPTCHA-code komt niet overeen. Probeer het opnieuw.'
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
    <br>
    <?php
    include 'carosuel-main-nl.php';
    ?>

    <!-- Pied de page -->
    <footer id="footer" class="bg-dark dark">
        <div class="container">
            <!-- Première rangée du pied de page -->
            <div class="footer-first-row row">
                <div class="col-lg-3 text-center">
                    <a href="index.php">
                        <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale"
                            style="width: 200px;height: 100px;" width="88" class="mt-5 mb-5">
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
                            include 'table-nl.php'
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
                                <td class="content">
                                    <a href="tel:+0497476548" target="_blank">
                                        <i class="fa fa-phone fa-lg"></i> 0497 47 65 48
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="title">Email :</td>
                                <td class="content">
                                    <a href="mailto:info@gelatonaturale.be" target="_blank">
                                        <i class="fa fa-lg fa-envelope"></i> info@gelatonaturale.be
                                    </a>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <h5 class="text-muted mb-3 mt-4">Médias sociaux</h5>
                    <a href="https://www.facebook.com/gelatonaturaletarcienne"
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
            <!-- Deuxième rangée du pied de page -->
            <div class="footer-second-row">
                <span class="text-muted">Personnalisé par FAST CAISSE <script>
                    document.write(new Date().getFullYear())
                    </script>©. </span>
            </div>
        </div>
        <!-- Retour en haut -->
        <button id="back-to-top" class="back-to-top">
            <i class="ti ti-angle-up"></i>
        </button>
        <style>
        .window {
            position: fixed;
            top: 40%;
            right: 20px;
            /* Initially hidden */
            width: auto;
            max-width: 300px;
            background: linear-gradient(to right, #009246 0%, #009246 33.33%, #ffffff 33.33%, #ffffff 66.66%, #ce2b37 66.66%, #ce2b37 100%);
            /* Italian flag gradient */
            border: 2px solid #ffffff;
            /* White border */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: right 0.5s;
            z-index: 99999;
            cursor: pointer;
        }

        .window.active {
            right: 20px;
            /* Slide in from the right */
        }

        .window-header {
            font-size: 18px;
            font-weight: bold;
            color: #808080;
            margin-bottom: 10px;
            white-space: nowrap;
            /* Rotate the header vertically */
            transform-origin: center;
            /* Set rotation origin */
            transition: font-size 0.5s, transform 0.5s;
            /* Transition for font size and rotation */
        }

        .window.active .window-header {
            /* Rotate and center the header */
            transform-origin: left center;
            color: #343a40;
            /* Set rotation origin */
        }

        .window:not(.active) .window-header {
            font-size: 18px;
            transform: rotate(-90deg);

            /* Smaller font size when not active */
        }

        .window-body {
            font-size: 16px;
            color: #343a40;
            /* White text */
            line-height: 1.6;
            display: none;
            /* Initially hidden */
        }

        /* Class to show sticky note body when active */
        .active .window-body {
            display: block;
        }
        </style>


        <div class="window" id="window">
            <div class="window-header">Tarief</div>
            <div class="window-body">
                <strong>Italiaanse meringue bedekking:</strong><br>
                - €4,5 per persoon voor 8 personen of meer<br>
                - €5 voor kleinere taarten<br><br>
                <strong>Hazelnoot-knapperige chocolade bedekking:</strong><br>
                - €6 per persoon
            </div>


        </div>

        <script>
        const windowElement = document.getElementById('window');


        // Toggle active class on click
        windowElement.addEventListener('click', () => {
            windowElement.classList.toggle('active');
        });
        </script>
    </footer>
    <!-- Pied de page / Fin -->
</div>
<!-- Content / End -->

<!-- Panel Mobile -->
<nav id="panel-mobile">
    <div class="module module-logo bg-dark dark">
        <a href="#">
            <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;"
                width="88">
        </a>
        <button class="close" data-toggle="panel-mobile">
            <i class="ti ti-close"></i>
        </button>
    </div>
    <nav class="module module-navigation"></nav>
    <!--language selector-->
    <div class="dropdown col-md-2 right mt-5">
        <a class="dropdown-toggle" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown"
            aria-expanded="false">
            <i class="flag flag-netherlands m-0"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="Dropdown">
            <li>
                <a class="dropdown-item" href="#">
                    <i class="flag-netherlands flag"></i>Dutch <i class="fa fa-check text-success ms-2"></i>
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
                <a class="dropdown-item" href="./page-reservation-en.php">
                    <i class="flag-united-kingdom flag"></i> English</a>
            </li>
        </ul>
    </div>
    <?php
    include 'footer-nl.php';
    ?>