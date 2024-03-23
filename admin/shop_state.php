<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: user-login.php');
    exit;
}
?>
<?php
include './header.php';
?>
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
    </ul>
    <a class="ml-2" href="../admin/php/login/logout.php"><strong>Logout</strong></a>
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
        <a href=".././index.php">
            <img src=".././assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 75px;" width="88">
        </a>
    </div>
    <!-- Cart -->
    <!--
        <a href="#" class="module module-cart" data-toggle="panel-cart"><i class="ti ti-shopping-cart"></i><span class="notification">0</span></a>
      -->
</header>
<!-- Header / End -->
<style>
    /* Add your CSS styles here */
    .time-set {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        margin-left: 10px;
    }

    .time-set input {
        margin-right: 10px;
        width: 100px;
    }

    .delete-time-set {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 10px;
    }

    .delete-time-set:hover {
        background-color: #c82333;
    }

    .add-time-set {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .add-time-set:hover {
        background-color: #218838;
    }

    label {
        margin: 10px;
    }
</style>
</head>
<!-- Content -->
<div id="content">
    <!-- Page Title -->
    <div class="page-title border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <h1 class="mb-0">Opening Hours</h1>
                    <h4 class="text-muted mb-0">Manage opening and closing hours for each day</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Section -->
    <section class="section section-lg bg-dark">
        <!-- Background Video -->
        <div class="bg-video dark-overlay">
            <!-- Background Photo -->
            <img class="bg-image dark-overlay" src="./assets/img/admin/open_closed.jpg" alt="Opened Closed">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Opening Hours Form -->
                    <div class="utility-box">
                        <div class="utility-box-title bg-dark dark">
                            <div class="bg-image">
                                <img src="./assets/img/admin/open_closed.jpg" alt="bg-image">
                            </div>
                            <div>
                                <span class="icon icon-primary">
                                    <i class="ti ti-bookmark-alt"></i>
                                </span>
                                <h4 class="mb-0">Set Opening Hours</h4>
                                <p class="lead text-muted mb-0">Set the opening and closing hours for each day of the
                                    week.</p>
                            </div>
                        </div>
                        <form id="booking-form" class="booking-form" method="post" data-validate>
                            <div class="form-group">
                                <label for="monday">Monday:</label>
                                <div class="time-set">
                                    <input type="text" name="monday_open[]" class="form-control" placeholder="Open" value="18:00" required>
                                    <span>-</span>
                                    <input type="text" name="monday_close[]" class="form-control" placeholder="Close" value="22:00" required>
                                    <button type="button" class="delete-time-set">Delete</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tuesday">Tuesday:</label>
                                <span>closed</span>
                            </div>
                            <div class="form-group">
                                <label for="wednesday">Wednesday:</label>
                                <div class="time-set">
                                    <input type="text" name="wednesday_open[]" class="form-control" placeholder="Open" value="18:00" required>
                                    <span>-</span>
                                    <input type="text" name="wednesday_close[]" class="form-control" placeholder="Close" value="22:00" required>
                                    <button type="button" class="delete-time-set">Delete</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="thursday">Thursday:</label>
                                <div class="time-set">
                                    <input type="text" name="thursday_open[]" class="form-control" placeholder="Open" value="12:00" required>
                                    <span>-</span>
                                    <input type="text" name="thursday_close[]" class="form-control" placeholder="Close" value="14:30" required>
                                    <span>, </span>
                                    <input type="text" name="thursday_open[]" class="form-control" placeholder="Open" value="18:00" required>
                                    <span>-</span>
                                    <input type="text" name="thursday_close[]" class="form-control" placeholder="Close" value="22:00" required>
                                    <button type="button" class="delete-time-set">Delete</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="friday">Friday:</label>
                                <div class="time-set">
                                    <input type="text" name="friday_open[]" class="form-control" placeholder="Open" value="12:00" required>
                                    <span>-</span>
                                    <input type="text" name="friday_close[]" class="form-control" placeholder="Close" value="14:00" required>
                                    <span>, </span>
                                    <input type="text" name="friday_open[]" class="form-control" placeholder="Open" value="18:00" required>
                                    <span>-</span>
                                    <input type="text" name="friday_close[]" class="form-control" placeholder="Close" value="22:00" required>
                                    <button type="button" class="delete-time-set">Delete</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="saturday">Saturday:</label>
                                <div class="time-set">
                                    <input type="text" name="saturday_open[]" class="form-control" placeholder="Open" value="18:00" required>
                                    <span>-</span>
                                    <input type="text" name="saturday_close[]" class="form-control" placeholder="Close" value="22:00" required>
                                    <button type="button" class="delete-time-set">Delete</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sunday">Sunday:</label>
                                <div class="time-set">
                                    <input type="text" name="sunday_open[]" class="form-control" placeholder="Open" value="12:00" required>
                                    <span>-</span>
                                    <input type="text" name="sunday_close[]" class="form-control" placeholder="Close" value="14:30" required>
                                    <span>, </span>
                                    <input type="text" name="sunday_open[]" class="form-control" placeholder="Open" value="18:00" required>
                                    <span>-</span>
                                    <input type="text" name="sunday_close[]" class="form-control" placeholder="Close" value="22:00" required>
                                    <button type="button" class="delete-time-set">Delete</button>
                                </div>
                            </div>
                            <button type="button" class="add-time-set" data-day="sunday">Add more</button>
                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                <span class="description">Submit</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById("booking-form");

                form.addEventListener("submit", function(event) {
                    event.preventDefault();
                    submitForm();
                });

                document.querySelectorAll('.add-time-set').forEach(function(button) {
                    button.addEventListener('click', function() {
                        const day = this.getAttribute('data-day');
                        const hoursDiv = document.getElementById(day + '-hours');
                        const newTimeSet = document.createElement('div');
                        newTimeSet.classList.add('time-set');
                        newTimeSet.innerHTML = `
                        <input type="text" name="${day}_open[]" class="form-control" placeholder="Open">
                        <input type="text" name="${day}_close[]" class="form-control" placeholder="Close">
                        <button type="button" class="delete-time-set">Delete</button>
                    `;
                        hoursDiv.appendChild(newTimeSet);
                        addDeleteListener(newTimeSet);
                    });
                });

                document.querySelectorAll('.delete-time-set').forEach(function(button) {
                    addDeleteListener(button.parentElement);
                });

                function addDeleteListener(element) {
                    const deleteButton = element.querySelector('.delete-time-set');
                    deleteButton.addEventListener('click', function() {
                        element.remove();
                    });
                }

                function submitForm() {
                    const formData = new FormData(form);
                    // Now you can submit the form data to the server using AJAX (e.g., with Axios or Fetch API)
                    // Example:
                    /*
                    axios.post('/save-opening-hours', formData)
                        .then(response => {
                            console.log(response.data);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                    */
                }
            });
        </script>
</div>
<!-- Pied de page -->
<footer id="footer" class="bg-dark dark">
    <div class="container">
        <!-- Première rangée du pied de page -->
        <div class="footer-first-row row">
            <div class="col-lg-3 text-center">
                <a href=".././index.php">
                    <img src=".././assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88" class="mt-5 mb-5">
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
            <img src=".././assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88">
        </a>
        <button class="close" data-toggle="panel-mobile">
            <i class="ti ti-close"></i>
        </button>
    </div>
    <nav class="module module-navigation"></nav>

    <hr class="dropdown-divider">
    <!--language selector-->
    <div class="dropdown col-12">
        <a class="dropdown-toggle" href="#" id="Dropdown1" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="flag flag-france m-0"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="Dropdown1">
            <li>
                <a class="dropdown-item" href="#">
                    <i class="flag-france flag"></i>Français <i class="fa fa-check text-success ms-2"></i>
                </a>
            </li>
        </ul>
        <a href="../admin/php/login/logout.php"><strong>Logout</strong></a>
    </div>
    <?php
    include './footer.php';
    ?> </ul>
    <a href="../admin/php/login/logout.php"><strong>Logout</strong></a>
    </div>
    <?php
    include './footer.php';
    ?>