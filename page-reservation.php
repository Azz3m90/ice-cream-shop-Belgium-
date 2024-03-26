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
include 'header.php';
?>
<script src="./dist/js/menu/axios.min.js"></script>
<script src="./dist/js/clearCache.js"></script>

<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
    <a class="dropdown-toggle" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
        <i class="flag flag-france m-0"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="Dropdown">
        <li>
            <a class="dropdown-item" href="#">
                <i class="flag-france flag"></i>Français <i class="fa fa-check text-success ms-2"></i>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="./page-reservation-en.php">
                <i class="flag flag-united-kingdom"></i>English </a>
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

    <!-- Page Title -->
    <div class="page-title border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <h1 class="mb-0">Formulaire pour Nos Gâteaux</h1>
                    <h4 class="text-muted mb-0" style="text-align: justify;">Veuillez remplir le formulaire ci-dessous
                        pour passer votre commande de
                        gâteaux. Merci de votre confiance !</h4>
                </div>
            </div>
        </div>
    </div>


    <!-- Section -->
    <section class="section section-lg bg-dark">
        <div class="bg-video dark-overlay">
            <img class="bg-image dark-overlay" src="./assets/img/Reservations/reservation.jpg" alt="Professionals Background">
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
                                <h4 class="mb-0">Formulaire</h4>
                                <p class="lead text-muted mb-0">Détails sur votre réservation.</p>
                            </div>
                        </div>
                        <form id="booking-form" class="booking-form" method="post" data-validate>
                            <div class="utility-box-content">

                                <div class="form-group">
                                    <label for="last_name">Nom de Famille :</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Nom de Famille" required>
                                </div>
                                <div class="form-group">
                                    <label for="first_name">Prénom :</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Prénom" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Numéro de Téléphone :</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Numéro de Téléphone" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail :</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_date">Date de Livraison :</label>
                                    <input type="date" id="delivery_date" name="delivery_date" class="form-control" placeholder="Date de Livraison" min="<?php echo date('Y-m-d'); ?>" required>
                                    <div class="form-helper-text">Un minimum de 3 jours est requis pour toutes les
                                        demandes soumises.</div>
                                </div>
                                <div class="form-group">
                                    <label for="persons">Nombre de Personnes :</label>
                                    <input type="number" id="persons" name="persons" class="form-control" placeholder="Nombre de Personnes (minimum 5 personnes)" min="5" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Pour :</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="" selected disabled>Choisissez...</option>
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="age">Âge :</label>
                                    <input type="number" id="age" name="age" class="form-control" placeholder="Âge" required>
                                </div>

                                <div class="form-group" id="first_choice_out">
                                    <label for="first_choice">Premier Choix de Saveur :</label>
                                    <select id="first_choice" name="first_choice" class="form-control" required>
                                        <option value="" selected disabled>Choisissez...</option>
                                        <optgroup label="Nouvelles Saveurs">
                                            <option value="Panna et ciocolatto bacio">Panna et ciocolatto bacio</option>
                                            <option value="Pain à la confiture de vanille et au beurre">Pain à la
                                                confiture de vanille et au beurre</option>
                                            <option value="Amandes">Amandes</option>
                                            <option value="Figues">Figues</option>
                                            <option value="Pain à la confiture et au beurre">Pain à la confiture et au
                                                beurre</option>
                                        </optgroup>
                                        <optgroup label="Soupes Anglaises">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Gâteau Abruzzese">Gâteau Abruzzese</option>
                                            <option value="Spéculoos Maison">Spéculoos Maison</option>
                                            <option value="Sucre Brun">Sucre Brun</option>
                                        </optgroup>
                                        <optgroup label="Saveurs Classiques">
                                            <option value="Vanille">Vanille</option>
                                            <option value="Chocolat">Chocolat</option>
                                            <option value="Fraise">Fraise</option>
                                            <option value="Menthe">Menthe</option>
                                        </optgroup>
                                        <optgroup label="Délices Noisettés">
                                            <option value="Pistaches grillées">Pistaches grillées</option>
                                            <option value="Pistache Italie (classique)">Pistache Italie (classique)
                                            </option>
                                            <option value="Noisette Italie">Noisette Italie</option>
                                            <option value="Amandes">Amandes</option>
                                        </optgroup>
                                        <optgroup label="Saveurs Exotiques">
                                            <option value="Noix de coco">Noix de coco</option>
                                            <option value="Mangue">Mangue</option>
                                            <option value="Fruit de la passion">Fruit de la passion</option>
                                            <option value="Litchi">Litchi</option>
                                        </optgroup>
                                        <optgroup label="Sorbet">
                                            <option value="Banane">Banane</option>
                                            <option value="Framboise">Framboise</option>
                                            <option value="Fruits Rouges">Fruits Rouges</option>
                                            <option value="Myrtille">Myrtille</option>
                                        </optgroup>
                                        <optgroup label="Spécialités">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Caramel Salé">Caramel Salé</option>
                                            <option value="Zabayon">Zabayon</option>
                                            <option value="Bacio">Bacio</option>
                                        </optgroup>
                                    </select>

                                </div>

                                <div class="form-group" id="second_choice_out">
                                    <label for="second_choice">Deuxième Choix de Saveur :</label>
                                    <select id="second_choice" name="second_choice" class="form-control" required>
                                        <option value="" selected disabled>Choisissez...</option>
                                        <optgroup label="Nouvelles Variantes de Saveurs">
                                            <option value="Panna et ciocolatto bacio">Panna et ciocolatto bacio</option>
                                            <option value="Vanille confiture et pain au beurre">Vanille confiture et
                                                pain au beurre</option>
                                            <option value="Amandes">Amandes</option>
                                            <option value="Figues">Figues</option>
                                            <option value="Pain beurre et confiture">Pain beurre et confiture</option>
                                        </optgroup>
                                        <optgroup label="Soupes Anglaises">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Gâteau Abruzzese">Gâteau Abruzzese</option>
                                            <option value="Speculoos Maison">Speculoos Maison</option>
                                            <option value="Sucre Brun">Sucre Brun</option>
                                        </optgroup>
                                        <optgroup label="Variantes de Saveurs Classiques">
                                            <option value="Vanille">Vanille</option>
                                            <option value="Chocolat">Chocolat</option>
                                            <option value="Fraise">Fraise</option>
                                            <option value="Menthe">Menthe</option>
                                        </optgroup>
                                        <optgroup label="Délices aux Noix">
                                            <option value="Pistache grillée">Pistache grillée</option>
                                            <option value="Pistache Italie (classique)">Pistache Italie (classique)
                                            </option>
                                            <option value="Noisette Italie">Noisette Italie</option>
                                            <option value="Amandes">Amandes</option>
                                        </optgroup>
                                        <optgroup label="Variantes de Saveurs Exotiques">
                                            <option value="Noix de Coco">Noix de Coco</option>
                                            <option value="Mangue">Mangue</option>
                                            <option value="Fruit de la Passion">Fruit de la Passion</option>
                                            <option value="Litchi">Litchi</option>
                                        </optgroup>
                                        <optgroup label="Sorbets">
                                            <option value="Banane">Banane</option>
                                            <option value="Framboise">Framboise</option>
                                            <option value="Fruits Rouges">Fruits Rouges</option>
                                            <option value="Myrtille">Myrtille</option>
                                        </optgroup>
                                        <optgroup label="Spécialités">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Caramel Salé">Caramel Salé</option>
                                            <option value="Zabayon">Zabayon</option>
                                            <option value="Bacio">Bacio</option>
                                        </optgroup>
                                    </select>
                                    <div class="form-helper-text">Ce choix sera utilisé si l'un des deux premiers choix
                                        n'est pas disponible.</div>

                                </div>

                                <div class="form-group" id="alternate_choice_out">
                                    <label for="alternate_choice">Choix de saveur alternatif :</label>
                                    <select id="alternate_choice" name="alternate_choice" class="form-control" required>
                                        <option value="" selected disabled>Choisissez...</option>
                                        <optgroup label="Nouvelles saveurs">
                                            <option value="Panna et ciocolatto bacio">Panna et ciocolatto bacio</option>
                                            <option value="Vanille et pain beurre">Vanille et pain beurre</option>
                                            <option value="Amandes">Amandes</option>
                                            <option value="Figues">Figues</option>
                                            <option value="Pain beurre et confiture">Pain beurre et confiture</option>
                                        </optgroup>
                                        <optgroup label="Soupes anglaises">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Gâteau Abruzzese">Gâteau Abruzzese</option>
                                            <option value="Speculoos maison">Speculoos maison</option>
                                            <option value="Sucre brun">Sucre brun</option>
                                        </optgroup>
                                        <optgroup label="Saveurs classiques">
                                            <option value="Vanille">Vanille</option>
                                            <option value="Chocolat">Chocolat</option>
                                            <option value="Fraise">Fraise</option>
                                            <option value="Menthe">Menthe</option>
                                        </optgroup>
                                        <optgroup label="Délices aux noix">
                                            <option value="Pistache grillée">Pistache grillée</option>
                                            <option value="Pistache Italie (classique)">Pistache Italie (classique)
                                            </option>
                                            <option value="Noisette Italie">Noisette Italie</option>
                                            <option value="Amandes">Amandes</option>
                                        </optgroup>
                                        <optgroup label="Saveurs exotiques">
                                            <option value="Noix de coco">Noix de coco</option>
                                            <option value="Mangue">Mangue</option>
                                            <option value="Fruit de la passion">Fruit de la passion</option>
                                            <option value="Litchi">Litchi</option>
                                        </optgroup>
                                        <optgroup label="Sorbets">
                                            <option value="Banane">Banane</option>
                                            <option value="Framboise">Framboise</option>
                                            <option value="Fruits rouges">Fruits rouges</option>
                                            <option value="Myrtille">Myrtille</option>
                                        </optgroup>
                                        <optgroup label="Spécialités">
                                            <option value="Tiramisu">Tiramisu</option>
                                            <option value="Caramel salé">Caramel salé</option>
                                            <option value="Zabayon">Zabayon</option>
                                            <option value="Bacio">Bacio</option>
                                        </optgroup>
                                    </select>

                                    <div class="form-helper-text">Ce choix sera utilisé si l'une des deux premières
                                        options n'est pas disponible.</div>

                                </div>

                                <div class="form-group">
                                    <label for="topping">Garniture :</label>
                                    <select id="topping" name="topping" class="form-control" required>
                                        <option value="">Choisissez...</option>
                                        <option value="Standard">Standard</option>
                                        <option value="Spécial">Spécial</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="comments">Commentaires :</label>
                                    <textarea id="comments" name="comments" class="form-control" placeholder="Commentaires"></textarea>
                                </div>

                                <div class="form-group" id="file_out">
                                    <label for="file">Ajouter un fichier/photo :</label>
                                    <input type="file" id="file" name="file" class="form-control-file">
                                    <div class="form-helper-text" id="file_helper">Uniquement pour 12 personnes ou plus.
                                    </div>
                                </div>

                                <!-- Captcha -->
                                <div class="row">
                                    <div class="form-group">
                                        <label><strong>Entrez le code Captcha :</strong></label><br />
                                        <input type="text" id="captcha" name="captcha" placeholder="Entrez le code Captcha" required>
                                        <p><br /><img src="./php/booking/captcha.php?rand=<?php echo rand(); ?>" id="captcha_image"></p>
                                        <p>Vous ne pouvez pas lire l'image ? <a href="#" onclick="refreshCaptcha(event);">Cliquez ici</a> pour rafraîchir</p>
                                    </div>
                                </div>

                            </div>

                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                <span class="description">Faire une réservation !</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                    </svg>
                                </span>
                                <span class="error">Réessayer...</span>
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
                                            console.error('Erreur lors de la récupération du captcha:', error);
                                        });
                                }

                                // Appelez cette fonction chaque fois que vous voulez obtenir la valeur du captcha
                                getCaptcha();

                                function submitForm() {

                                    const captcha = captchaInput.value;
                                    const formData = new FormData(form);
                                    formData.append('captcha', captcha);

                                    // Valider l'e-mail
                                    const emailInput = form.querySelector('input[name="email"]');
                                    const email = emailInput.value;
                                    if (!validateEmail(email)) {
                                        openModal('Veuillez saisir une adresse e-mail valide.');
                                        emailInput.style.border = "1px solid red";
                                        return false;
                                    }

                                    // Valider chaque champ d'entrée requis
                                    const inputs = form.querySelectorAll("[required]");
                                    let isValid = true;
                                    inputs.forEach(function(input) {
                                        if (input.value.trim() === "") {
                                            isValid = false;
                                            // Ajouter une bordure rouge aux champs requis vides
                                            input.style.border = "1px solid red";
                                        } else {
                                            // Réinitialiser la bordure au style par défaut
                                            input.style.border = "";
                                        }
                                    });

                                    if (!isValid) {
                                        // Si un champ requis est vide, afficher un message d'erreur et empêcher l'envoi du formulaire
                                        openModal("Veuillez remplir tous les champs requis.");
                                        return false;
                                    }

                                    axios.post('./php/booking/validate-captcha.php', formData)
                                        .then(response => {
                                            if (response.data.valid) {
                                                console.log(formData);
                                                // Utilisez AJAX pour soumettre les données du formulaire
                                                submitButton.innerHTML =
                                                    '<span class="description">Soumission en cours...</span>';
                                                axios.post('./php/booking/booking-reservations.php',
                                                        formData)
                                                    .then(response => {
                                                        console.log(
                                                            'Réponse de la soumission du formulaire:',
                                                            response
                                                            .data);
                                                        if (response.data === 'success success') {
                                                            submitButton.innerHTML =
                                                                '<span class="description">Réservation réussie!</span>';
                                                            submitButton.classList.remove('btn-secondary');
                                                            submitButton.classList.remove('btn-submit');
                                                            submitButton.classList.add('btn-success');
                                                            submitButton.setAttribute('disabled',
                                                                'disabled');
                                                        } else {
                                                            openModal(
                                                                'Une erreur est survenue lors de la soumission du formulaire. Veuillez réessayer.'
                                                            );
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.error(
                                                            'Erreur lors de la soumission du formulaire:',
                                                            error);
                                                        openModal(
                                                            'Une erreur est survenue lors de la soumission du formulaire. Veuillez réessayer.'
                                                        );
                                                    });
                                            } else {
                                                openModal(
                                                    'Le code CAPTCHA saisi ne correspond pas. Veuillez réessayer.'
                                                );
                                                refreshCaptcha();
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Erreur de validation du CAPTCHA:', error);
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
                                        console.error('Erreur lors de l\'actualisation du CAPTCHA: ', error);
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
    include 'carosuel-main.php';
    ?>
    <!-- Pied de page -->
    <footer id="footer" class="bg-dark dark">
        <div class="container">
            <!-- Première rangée du pied de page -->
            <div class="footer-first-row row">
                <div class="col-lg-3 text-center">
                    <a href="index.php">
                        <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88" class="mt-5 mb-5">
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
                            include 'table-fr.php'
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
            <i class="flag flag-france m-0"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="Dropdown">
            <li>
                <a class="dropdown-item" href="#">
                    <i class="flag-france flag"></i>Français <i class="fa fa-check text-success ms-2"></i>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="./page-reservation-en.php">
                    <i class="flag flag-united-kingdom"></i>English </a>
            </li>
            <li>
                <a class="dropdown-item" href="././page-reservations-nl.php">
                    <i class="flag-netherlands flag"></i>Dutch </a>
            </li>
        </ul>
    </div>
    <?php
    include 'footer.php';
    ?>