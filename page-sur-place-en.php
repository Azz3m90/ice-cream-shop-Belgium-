<?php
include 'header.php';
?>
<script src="./dist/js/menu/axios.min.js"></script>
<script src="./dist/js/clearCache.js"></script>
<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
    <a class="dropdown-toggle" href="#" id="Dropdown1" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
        <i class="flag flag-united-kingdom  m-0"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="Dropdown1">
        <li>
            <a class="dropdown-item" href="#">
                <i class="flag-united-kingdom  flag"></i> English <i class="fa fa-check text-success ms-2"></i>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="./page-sur-place.php">
                <i class="flag flag-france"></i>Français </a>
        </li>
        <li>
            <a class="dropdown-item" href="./page-sur-place-nl.php">
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
    <!-- Content -->
    <div id="content">
        <!-- Page Title -->
        <div class="page-title border-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 offset-lg-5">
                        <h1 class="mb-0">Sur Place</h1>
                        <h4 class="text-muted mb-0">Tasting Room & Terraces: Photos</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section -->
        <section id="gallery" class="section section-gallery cover">

            <!-- Gallery Carousel -->
            <div class="gallery-carousel inner-controls">

                <div class="slide">
                    <div class="bg-image bg-parallax"><img src="./assets/img/surplace/surplace_2.jpg" alt=""></div>
                </div>
                <div class="slide">
                    <div class="bg-image bg-parallax"><img src="./assets/img/surplace/surplace_3.jpeg" alt=""></div>
                </div>
                <div class="slide">
                    <div class="bg-image bg-parallax"><img src="./assets/img/surplace/surplace_6.jpg" alt=""></div>
                </div>
                <div class="slide">
                    <div class="bg-image bg-parallax"><img src="./assets/img/surplace/surplace_4.jpeg" alt=""></div>
                </div>
            </div>


            <!-- Gallery Carousel Nav -->
            <div class="gallery-nav">
                <img src="./assets/img/surplace/surplace_2_min.jpg" alt="">
                <img src="./assets/img/surplace/surplace_3_min.jpeg" alt="">
                <img src="./assets/img/surplace/surplace_6_min.jpg" alt="">
                <img src="./assets/img/surplace/surplace_4_min.jpg" alt="">

            </div>

            <div class="set-fullscreen" data-local-scroll>
                <a href="#gallery"><i class="ti ti-fullscreen"></i></a>
            </div>

        </section>
        <br>
        <!-- Section -->
        <!-- Our Small Food Services -->
        <section class="section section-bg-edge">
            <div class="image left bottom col-md-7">
                <div class="bg-image">
                    <img src="./assets/img/surplace/services.jpg" alt="services">
                </div>
            </div>
            <div class="container offset-md-1">
                <div class="col-lg-5 offset-lg-7 col-md-6">
                    <!--<div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>-->
                    <h2 class="mb-5 ml-5">Gelato Naturale - Ice Cream Shop:</h2>
                    <p class="lead text-muted mb-5 ml-5" style="text-align: justify;">Experience the pleasure of ice
                        cream at Gelato Naturale, where every bite takes you on a journey to a world of delights. With
                        an exquisite selection of artisanal flavors, we offer you an unforgettable icy experience.
                        Whether you love timeless classics or unique creations, our shop has something to satisfy all
                        your cravings for frozen treats. All our ice creams are made with 💯 fresh fruits and 💯 without
                        artificial flavors, embodying the essence of gelato naturale.</p>

                    <!--<h6>Mark Johnson, Chef</h6><img src="assets/img/svg/sign.svg" alt="" class="mb-5"><h4>What people say about Us?</h4><a href="page-reviews.php" class="btn btn-outline-primary"><span>Check our reviews</span></a>-->
                </div>
            </div>
        </section>
        <!-- Section - Offers -->
        <section class="section bg-light">
            <div class="container">
                <!--<h1 class="text-center mb-6">Special offers</h1>-->
                <div class="carousel" data-slick='{"dots": true}'>
                    <!-- Our Ice Creams -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/our-icecream.jpeg" alt="Our Ice Creams">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Our Ice Creams:</h2>
                            <h5 class="text-muted mb-5">
                                Our ice cream production is 100% natural from fresh products. We offer a variety of
                                flavors depending on the availability of fresh fruit and chocolate, which may vary
                                depending on the season. On average, between 30 and 40 flavors are offered permanently.
                                Italian counter service: Our tasting room and terrace are available for your tasting.
                            </h5>
                        </div>
                    </div>
                    <!-- Our Sorbets -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/natural-drinks.jpg" alt="Our Sorbets">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Our Sorbets:</h2>
                            <h5 class="text-muted mb-5">
                                Our sorbet production is 100% natural from fresh products. We offer a variety of flavors
                                depending on the availability of fresh fruit and chocolate, which may vary depending on
                                the season. On average, between 30 and 40 flavors are offered permanently. Italian
                                counter service: Our tasting room and terrace are available for your tasting.
                            </h5>
                        </div>
                    </div>
                    <!-- Our Ice Cream Cups -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/coupes.jpg" alt="Our Ice Cream Cups">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Our Ice Cream Cups:</h2>
                            <h5 class="text-muted mb-5">
                                A menu of ice creams and sorbets is offered with table service. This varies depending on
                                the production at the time.
                            </h5>
                        </div>
                    </div>
                    <!-- Our Waffles -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/gaufres.jpg" alt="Our Waffles">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Our Waffles:</h2>
                            <h5 class="text-muted mb-5">
                                Our homemade waffle production is offered with several variations: ice cream, sorbets,
                                chocolate. You are free to compose them according to your tastes. A waffle menu will
                                also be available with table service.
                            </h5>
                        </div>
                    </div>
                    <!-- Our Crepes -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/Crepes.jpg" alt="Our Crepes">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Our Crepes:</h2>
                            <p class="lead text-muted mb-5">
                                Our homemade crepe production is offered with several variations: ice cream, sorbets,
                                chocolate. You are free to compose them according to your tastes. A crepe menu will also
                                be available with table service.
                            </p>
                        </div>
                    </div>
                    <!-- Our Ice Burgger -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/ice-burger.jpg" alt="Our Ice Burgger">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Our Ice Burgger:</h2>
                            <h5 class="text-muted mb-5">
                                Ice burgger is a real burger halfway between a burger and an Italian brioche that is
                                cooked at the moment. Our homemade Ice Burgger is offered with several variations: ice
                                cream, sorbets, chocolate. You are free to compose them according to your tastes. An Ice
                                Burgger menu will also be available with table service.
                            </h5>
                        </div>
                    </div>
                    <!-- Our Hot Drinks -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/boissons-chaudes.jpg" alt="Our Hot Drinks">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Our Hot Drinks:</h2>
                            <h5 class="text-muted mb-5">
                                Enjoy our selection of hot drinks that will warm your heart and soul. Whether it's a
                                delicious coffee, a fragrant tea, or a comforting hot chocolate, our quality hot drinks
                                will delight you at any time of the day.
                            </h5>
                        </div>
                    </div>
                    <!-- Our Appetizers -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/nos-aperos.jpg" alt="Our Appetizers">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Our Appetizers:</h2>
                            <h5 class="text-muted mb-5">
                                Start your meal in style by enjoying our delicious appetizers. Whether you prefer cheese
                                and charcuterie boards, refined appetizers, or refreshing cocktails, our appetizers will
                                awaken your taste buds and stimulate your appetite for the rest of the meal.
                            </h5>
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
                <!-- First row of footer -->
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
                        /* Dark background color */
                        color: #ffffff;
                        /* Text color */
                        border-radius: 10px;
                        /* Rounded corners */
                        margin-top: 20px;
                        /* Add space on top */
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
                                <?php include 'table-en.php' ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-5 col-md-6 styled-table">
                        <h5 class="text-muted mb-3">Contact Information</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="title">Phone :</td>
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
                <!-- Second row of footer -->
                <div class="footer-second-row">
                    <span class="text-muted">Customized by FAST CAISSE <script>
                        document.write(new Date().getFullYear())
                        </script>©. </span>
                </div>
            </div>
            <!-- Back to top button -->
            <button id="back-to-top" class="back-to-top">
                <i class="ti ti-angle-up"></i>
            </button>
        </footer>
        <!-- Footer / End -->
    </div>
    <!-- Content / End -->


    <!-- Panneau Mobile -->
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
            <a class="dropdown-toggle" href="#" id="Dropdown1" role="button" data-mdb-toggle="dropdown"
                aria-expanded="false">
                <i class="flag flag-united-kingdom  m-0"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="Dropdown1">
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="flag-united-kingdom  flag"> </i> English<i class="fa fa-check text-success ms-2"></i>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="./page-sur-place.php">
                        <i class="flag flag-france"></i>Français </a>
                </li>
                <li>
                    <a class="dropdown-item" href="./page-sur-place-nl.php">
                        <i class="flag-netherlands flag"></i>Dutch </a>
                </li>
            </ul>
        </div>
        <?php
        include 'footer.php';
        ?>