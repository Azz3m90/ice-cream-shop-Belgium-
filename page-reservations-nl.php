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
                    <h1 class="mb-0">Formulier voor Onze Taarten en Gebakjes</h1>
                    <h4 class="text-muted mb-0">Vul het onderstaande formulier in om uw bestelling van taarten en
                        gebakjes te plaatsen. Bedankt voor uw vertrouwen!</h4>
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
                                <img src="./assets/img/Reservations/reservation_3.jpg" alt="bg-image">
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
                                    <label for="name">Naam:</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Naam"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="surname">Voornaam:</label>
                                    <input type="text" id="surname" name="surname" class="form-control"
                                        placeholder="Voornaam" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefoon:</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Telefoon" required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_date">Leveringsdatum:</label>
                                    <input type="date" id="delivery_date" name="delivery_date" class="form-control"
                                        placeholder="Leveringsdatum" required>
                                    <div class="form-helper-text"> 3 dagen nodig voor elke bestelling.</div>
                                </div>
                                <div class="form-group">
                                    <label for="persons">Aantal personen:</label>
                                    <input type="number" id="persons" name="persons" class="form-control"
                                        placeholder="Aantal personen" min="5" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Voor:</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="Meisje">Meisje</option>
                                        <option value="Jongen">Jongen</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="age">Leeftijd:</label>
                                    <input type="number" id="age" name="age" class="form-control" placeholder="Leeftijd"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="first_choice">Eerste smaakkeuze:</label>
                                    <select id="first_choice" name="first_choice" class="form-control" required>
                                        <option value="">Kies...</option>
                                        <!-- Voeg hier de opties toe voor de selectie -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="second_choice">Tweede smaakkeuze:</label>
                                    <select id="second_choice" name="second_choice" class="form-control" required>
                                        <option value="">Kies...</option>
                                        <!-- Voeg hier de opties toe voor de selectie -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alternate_choice">Alternatieve smaakkeuze:</label>
                                    <select id="alternate_choice" name="alternate_choice" class="form-control" required>
                                        <option value="">Kies...</option>
                                        <!-- Voeg hier de opties toe voor de selectie -->
                                    </select>
                                    <div class="form-helper-text">Deze keuze wordt gebruikt als een van de eerste twee
                                        keuzes niet beschikbaar is.</div>
                                </div>
                                <div class="form-group">
                                    <label for="filling">Vulling:</label>
                                    <select id="filling" name="filling" class="form-control" required>
                                        <option value="Standaard">Standaard</option>
                                        <option value="Speciaal">Speciaal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Opmerkingen:</label>
                                    <textarea id="comment" name="comment" class="form-control"
                                        placeholder="Opmerkingen"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">Bestand/foto toevoegen:</label>
                                    <input type="file" id="file" name="file" class="form-control-file">
                                    <div class="form-helper-text">Alleen bij 12 personen of meer.</div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <!-- HTML -->
                                        <label><strong>Voer de Captcha-code in:</strong></label><br />
                                        <input type="text" id="captcha" name="captcha"
                                            placeholder="Voer de Captcha-code in" required>
                                        <p><br /><img src="./php/booking/captcha.php?rand=<?php echo rand(); ?>"
                                                id="captcha_image"></p>
                                        <p>Kunt u de afbeelding niet lezen? <a href="#"
                                                onclick="refreshCaptcha(event);">Klik hier</a> om te vernieuwen</p>
                                    </div>
                                </div>
                            </div>
                            <input type="text" id="lang" name="lang" class="form-control" value="nl" disabled required
                                hidden>
                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                <span class="description">Reserveren!</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none"
                                            stroke="#FFFFFF" stroke-width="2" stroke-linecap="square"
                                            stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                    </svg>
                                </span>
                                <span class="error">Probeer opnieuw...</span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

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
    // Get the current date and time
    var currentDate = new Date();

    // Format the current date and time into the required format for the input element
    var formattedCurrentDate = currentDate.getFullYear() + '-' + ('0' + (currentDate.getMonth() +
        1)).slice(-2) + '-' + ('0' + currentDate.getDate()).slice(-2) + 'T' + ('0' + currentDate
        .getHours()).slice(-2) + ':' + ('0' + currentDate.getMinutes()).slice(-2);

    // Set the minimum value of the input element to the formatted current date and time
    document.getElementById("DateTime").min = formattedCurrentDate;

    function getCaptcha() {
        axios.get('./php/booking/get-captcha.php')
            .then(function(response) {
                console.log('Captcha:', response.data.captcha);
            })
            .catch(function(error) {
                console.error('Erreur lors de la récupération du captcha :', error);
            });
    }

    // Appeler cette fonction chaque fois que vous voulez obtenir la valeur du captcha
    getCaptcha();

    function submitForm() {
        const form = document.getElementById("booking-form");
        const captchaInput = form.querySelector('input[name="captcha"]');
        const captcha = captchaInput.value;

        // Créer un objet FormData et ajouter le champ captcha
        const formData = new FormData();
        formData.append('captcha', captcha);

        axios.post('./php/booking/validate-captcha.php', formData)
            .then(response => {
                console.log('Réponse de validation :', response.data.valid);

                if (response.data.valid) {
                    const submitButton = form.querySelector(".btn-submit");
                    submitButton.removeAttribute('disabled');

                } else {
                    openModal('Le code CAPTCHA saisi ne correspond pas. Veuillez réessayer.');
                    refreshCaptcha();
                }
            })
            .catch(error => {
                console.error('Erreur lors de la validation du CAPTCHA :', error);
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
                console.error('Erreur lors de l\'actualisation du CAPTCHA :', error);
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

            // Inclure la valeur du CAPTCHA dans FormData
            formData.append('captcha', captcha);
            // Valider chaque champ requis
            const inputs = form.querySelectorAll("[required]");
            let isValid = true;
            inputs.forEach(function(input) {
                if (input.value.trim() === "") {
                    isValid = false;
                    // Optionnel : vous pouvez ajouter un retour visuel pour l'utilisateur, comme ajouter une bordure rouge à l'entrée invalide
                    input.style.border = "1px solid red";
                } else {
                    // Réinitialiser la bordure à son style par défaut
                    input.style.border = "";
                }
            });

            // Vérifier si la date sélectionnée est le 14 février 2024
            if (selectedDateTime.getDate() === 14 && selectedDateTime.getMonth() ===
                1 && selectedDateTime.getFullYear() === 2024) {
                openModal(
                    "Nous sommes désolé, toutes nos tables sont réservées le 14 février 2024"
                );
                return; // Empêcher le traitement ultérieur
            }
            // Si tous les champs requis sont remplis, soumettre le formulaire
            if (isValid) {
                // Valider CAPTCHA
                axios.post('./php/booking/validate-captcha.php', formData)
                    .then(function(response) {
                        console.log('Réponse de validation :', response.data
                            .valid);

                        if (response.data.valid) {
                            // CAPTCHA est valide, procéder à la soumission du formulaire
                            if (isDateTimeValid(selectedDateTime)) {
                                submitButton.innerHTML =
                                    '<span class="description">Envoi...</span>';

                                axios.post('./php/booking/booking-form.php',
                                        formData)
                                    .then(function(response) {
                                        submitButton.innerHTML =
                                            '<span class="description">Réservation réussie !</span>';
                                        submitButton.classList.remove(
                                            'btn-secondary');
                                        submitButton.classList.remove(
                                            'btn-submit');
                                        submitButton.classList.add(
                                            'btn-success');
                                        submitButton.setAttribute(
                                            'disabled', 'disabled');
                                    })
                                    .catch(function(error) {
                                        submitButton.innerHTML =
                                            '<span class="error">Réessayer...</span>';
                                        submitButton.classList.remove(
                                            'btn-submit');
                                        submitButton.classList.remove(
                                            'btn-secondary');
                                        submitButton.classList.add(
                                            'btn-danger');
                                    });
                            } else {
                                // Afficher un message d'erreur et empêcher la soumission du formulaire
                                modalMessage.innerText =
                                    'Date ou heure invalide. Veuillez sélectionner une date et une heure valides dans les plages horaires autorisées.';
                                confirmationModal.style.display = 'block';
                                // Empêcher la soumission du formulaire
                                return false;
                            }
                        } else {
                            // Afficher un message d'erreur et empêcher la soumission du formulaire
                            modalMessage.innerText =
                                'Le code CAPTCHA saisi ne correspond pas. Veuillez réessayer.';
                            confirmationModal.style.display = 'block';
                            // Empêcher la soumission du formulaire
                            return false;
                        }
                    })
                    .catch(function(error) {
                        console.error(
                            'Erreur lors de la validation du CAPTCHA :',
                            error);
                    });
            } else {
                // Optionnel : vous pouvez informer l'utilisateur qu'il y a des champs requis vides
                modalMessage.innerText =
                    "Veuillez remplir tous les champs obligatoires.";
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
                    <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;"
                        width="88" class="mt-5 mb-5">
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
                                <a href="mailto:info@matthiasandsea.be" target="_blank">
                                    <i class="fa fa-lg fa-envelope"></i> info@matthiasandsea.be
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