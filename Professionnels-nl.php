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
    <!-- Paginatitel -->
    <div class="page-title border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <h1 class="mb-0">Professionals</h1>
                    <h4 class="text-muted mb-0" style="text-align: justify;">We kunnen aan al uw verzoeken voldoen op
                        het gebied van delicatessen,
                        cacaoproductie, sterrenrestaurants, etc.
                        Of u nu een Frans, Maghrebijns, Aziatisch, Italiaans gastronomisch restaurant bent, wij zullen
                        uw kenmerkende ijs naar uw smaak, traditie en behoefte creëren.
                        Wij bieden ook bezorgservice aan.</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Sectie -->
    <section class="section section-lg bg-dark">
        <!-- Achtergrondvideo -->
        <div class="bg-video dark-overlay">
            <!-- Achtergrondfoto -->
            <img class="bg-image dark-overlay" src="./assets/img/professionals/professionals.jpg" alt="Achtergrond voor professionals">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Tafel reserveren -->
                    <div class="utility-box">
                        <div class="utility-box-title bg-dark dark">
                            <div class="bg-image">
                                <img src="./assets/img/professionals/prof.jpg" alt="Achtergrondafbeelding">
                            </div>
                            <div>
                                <span class="icon icon-primary">
                                    <i class="ti ti-bookmark-alt"></i>
                                </span>
                                <h4 class="mb-0">Tafel reserveren</h4>
                                <p class="lead text-muted mb-0">Details over uw reservering.</p>
                            </div>
                        </div>
                        <form id="booking-form" class="booking-form" method="post" data-validate>
                            <div class="utility-box-content">
                                <div class="form-group">
                                    <label for="name">Naam :</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Naam" required>
                                </div>
                                <div class="form-group">
                                    <label for="surname">Voornaam :</label>
                                    <input type="text" id="surname" name="surname" class="form-control" placeholder="Voornaam" required>
                                </div>
                                <div class="form-group">
                                    <label for="company">Bedrijf :</label>
                                    <input type="text" id="company" name="company" class="form-control" placeholder="Bedrijf" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefoon :</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Telefoon" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail :</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <label for="sector">Sector :</label>
                                    <input type="text" id="sector" name="sector" class="form-control" placeholder="Sector" required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_date">Gewenste leverdatum :</label>
                                    <input type="date" id="delivery_date" name="delivery_date" class="form-control" placeholder="Gewenste leverdatum" min="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_address">Afleveradres :</label>
                                    <input type="text" id="delivery_address" name="delivery_address" class="form-control" placeholder="Afleveradres" required>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Opmerking :</label>
                                    <textarea id="comment" name="comment" class="form-control" placeholder="Opmerking"></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <!-- HTML -->
                                        <label><strong>Vul de Captcha-code in:</strong></label><br />
                                        <input type="text" id="captcha" name="captcha" placeholder="Vul de Captcha-code in" required>
                                        <p><br /><img src="./php/booking/captcha.php?rand=<?php echo rand(); ?>" id="captcha_image"></p>
                                        <p>Kunt u de afbeelding niet lezen? <a href="#" onclick="refreshCaptcha(event);">Klik hier</a> om te vernieuwen</p>
                                    </div>
                                </div>
                            </div>
                            <input type="text" id="lang" name="lang" class="form-control" value="nl" disabled required hidden>
                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                <span class="description">Reserveren!</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                    </svg>
                                </span>
                                <span class="error">Probeer opnieuw...</span>
                            </button>
                        </form>


                        <style>
                            .btn-success {
                                background-color: #28a745;
                                /* Groene kleur voor succes */
                                border-color: #28a745;
                            }

                            .btn-danger {
                                background-color: #dc3545;
                                /* Rode kleur voor fout */
                                border-color: #dc3545;
                            }

                            /* Moderne modale stijlen */
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
                                /* Verander randkleur naar rood */
                            }
                        </style>
                        <!-- Eenvoudige bevestigingsmodus -->
                        <!-- Eenvoudige bevestigingsmodus -->
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

                                function getCaptcha() {
                                    axios.get('./php/booking/get-captcha.php')
                                        .then(function(response) {
                                            console.log('Captcha:', response.data.captcha);
                                        })
                                        .catch(function(error) {
                                            console.error('Fout bij het ophalen van de captcha:', error);
                                        });
                                }

                                // Roep deze functie aan wanneer je de waarde van de captcha wilt ophalen
                                getCaptcha();

                                function submitForm() {
                                    const captcha = captchaInput.value;
                                    const formData = new FormData(form);
                                    formData.append('captcha', captcha);

                                    // Valideer e-mail
                                    const emailInput = form.querySelector('input[name="email"]');
                                    const email = emailInput.value;
                                    if (!validateEmail(email)) {
                                        openModal('Voer een geldig e-mailadres in.');
                                        emailInput.style.border = "1px solid red";
                                        return false;
                                    }

                                    // Valideer elk vereist invoerveld
                                    const inputs = form.querySelectorAll("[required]");
                                    let isValid = true;
                                    inputs.forEach(function(input) {
                                        if (input.value.trim() === "") {
                                            isValid = false;
                                            // Voeg een rode rand toe aan lege verplichte velden
                                            input.style.border = "1px solid red";
                                        } else {
                                            // Reset de rand naar de standaardstijl
                                            input.style.border = "";
                                        }
                                    });

                                    if (!isValid) {
                                        // Als een verplicht veld leeg is, toon een foutmelding en voorkom het verzenden van het formulier
                                        openModal("Vul alle verplichte velden in.");
                                        return false;
                                    }
                                    submitButton.innerHTML =
                                        '<span class="description">Bezig met verzenden...</span>';

                                    axios.post('./php/booking/validate-captcha.php', formData)
                                        .then(response => {
                                            if (response.data.valid) {
                                                // Gebruik AJAX om de formuliergegevens te verzenden
                                                axios.post('./php/booking/booking-professionnels-nl.php',
                                                        formData)
                                                    .then(response => {
                                                        console.log('Reactie op verzending van formulier:',
                                                            response.data);
                                                        if (response.data === 'success') {
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
                                                        console.error(
                                                            'Fout bij het verzenden van het formulier:',
                                                            error);
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
                                            console.error('Fout bij valideren CAPTCHA:', error);
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
                                        console.error('Fout bij vernieuwen CAPTCHA:', error);
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
    include 'carosuel-main-nl.php';
    ?>
    <!-- Footer -->
    <footer id="footer" class="bg-dark dark">
        <div class="container">
            <!-- Footer 1st Row -->
            <div class="footer-first-row row">
                <div class="col-lg-3 text-center">
                    <a href="index-nl.php">
                        <img src="./assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88" class="mt-5 mb-5">
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
                                        <i class="fa fa-lg fa-envelope"></i>info@gelatonaturale.be
                                    </a>
                                </td>


                            </tr>
                        </tbody>
                    </table>

                    <h5 class="text-muted mb-3 mt-4">Médias sociaux</h5>
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


</div>
<!-- Panel Mobile -->
<nav id="panel-mobile">
    <div class="module module-logo bg-dark dark">
        <a href="#">
            <img src="./assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88">
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