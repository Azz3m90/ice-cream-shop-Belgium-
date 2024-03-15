<?php
    include 'header-en.php';
?>
<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
    <a class="dropdown-toggle" href="#" id="Dropdown1" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
        <i class="flag flag-united-kingdom m-0"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="Dropdown1">
        <li>
            <a class="dropdown-item" href="#">
                <i class="flag flag-united-kingdom"></i>English <i class="fa fa-check text-success ms-2"></i>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="index-nl.php">
                <i class="flag-netherlands flag"></i>Dutch </a>
        </li>
        <li>
            <a class="dropdown-item" href="index.php">
                <i class="flag-france flag"></i>Français </a>
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
    <!-- Section - Main -->
    <section class="section section-main section-main-1 bg-light">
        <div class="container dark">
            <div class="slide-container">
                <div id="section-main-1-carousel-image" class="image inner-controls">
                    <!-- Image carousel -->
                    <div class="slide">
                        <div class="bg-image">
                            <img src="assets/img/icecream/carousel-1.jpg" alt="Vanilla Ice Cream">
                        </div>
                    </div>
                    <div class="slide">
                        <div class="bg-image">
                            <img src="assets/img/icecream/carousel-2.jpg" alt="Chocolate Ice Cream">
                        </div>
                    </div>
                    <div class="slide">
                        <div class="bg-image">
                            <img src="assets/img/icecream/carousel-3.jpg" alt="Strawberry Ice Cream">
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="content dark">
                    <div id="section-main-1-carousel-content">
                        <!-- Content slides -->
                        <div class="content-inner">
                            <h4 class="text-muted">Delicious Treat</h4>
                            <h1>Ice Cream</h1>
                        </div>
                        <div class="content-inner">
                            <h3>Classic Flavors</h3>
                            <h5 class="text-muted mb-5">Indulge yourself with our classic flavors of creamy vanilla,
                                rich chocolate, and refreshing strawberry.</h5>
                        </div>
                        <div class="content-inner">
                            <h1>Irresistible</h1>
                            <h5 class="text-muted mb-5">Satisfy your sweet cravings with our delightful ice cream
                                creations!</h5>
                        </div>
                    </div>
                    <nav class="content-nav">
                        <a class="prev" href="#">
                            <i class="ti ti-arrow-left"></i>
                        </a>
                        <a class="next" href="#">
                            <i class="ti ti-arrow-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <!-- Section - About -->
    <section class="section section-bg-edge">
        <div class="image right col-md-6 offset-md-6">
            <div class="bg-image">
                <br>
                <img src="assets/img/icecream/landing-image.jpg" alt="landing-image">
            </div>
        </div>
        <div class="container">
            <div class="col-lg-5 col-md-9">
                <h1>About Our Establishment</h1>
                <p class="lead text-muted mb-5 text-justify">Our establishment, opened in 2021 after years of
                    preparation, specializes in the production and distribution of ice creams and sorbets. We serve a
                    variety of clients, including ice cream parlors, restaurants, institutions, wholesalers, and
                    delicatessens, with included delivery service. Our commitment to natural products enables us to
                    efficiently meet the needs of our professional clients by offering them custom flavors. For
                    individuals, we provide a tasting room with a beautiful terrace, where they can savor our products.
                    Additionally, they have the opportunity to purchase our ice creams by the liter and cakes, subject
                    to availability, without prior reservation.</p>
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
                    <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 200px;"
                        width="88" class="mt-5 mb-5">
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
                            <td class="content"><a href="mailto:mattiacollu@msn.com" target="_blank"> <i
                                        class="fa fa-lg fa-envelope"></i> mattiacollu@msn.com</a></td>
                        </tr>
                    </tbody>
                </table>

                <h5 class="text-muted mb-3 mt-4">Social Media</h5>
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

<a href="checkout-en.php" class="panel-cart-action btn btn-secondary btn-block btn-lg">
    <span>Go to checkout</span>
</a>
</div>
<!-- Panel Mobile -->
<nav id="panel-mobile">
    <div class="module module-logo bg-dark dark">
        <a href="index-en.php">
            <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;"
                width="88">
        </a>
        <button class="close" data-toggle="panel-mobile">
            <i class="ti ti-close"></i>
        </button>
    </div>
    <nav class="module module-navigation"></nav>
    <!--language selector-->
    <div class="dropdown col-12">
        <a class="dropdown-toggle" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown"
            aria-expanded="false">
            <i class="flag flag-united-kingdom m-0"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="Dropdown">
            <li>
                <a class="dropdown-item" href="#">
                    <i class="flag flag-united-kingdom"></i>English <i class="fa fa-check text-success ms-2"></i>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="index-nl.php">
                    <i class="flag-netherlands flag"></i>Dutch </a>
            </li>
            <li>
                <a class="dropdown-item" href="index.php">
                    <i class="flag-france flag"></i>Français </a>
            </li>
        </ul>
    </div>
    <?php
    include 'footer-en.php';
?>