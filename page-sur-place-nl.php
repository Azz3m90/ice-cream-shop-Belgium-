<?php
include 'header-nl.php';
?>
<script src="./dist/js/menu/axios.min.js"></script>
<script src="./dist/js/clearCache.js"></script>
<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
    <a class="dropdown-toggle" href="#" id="Dropdown1" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
        <i class="flag flag-netherlands m-0"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="Dropdown1">
        <li>
            <a class="dropdown-item" href="#">
                <i class="flag-netherlands  flag"></i>Dutch <i class="fa fa-check text-success ms-2"></i>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="./page-sur-place-en.php">
                <i class="flag flag-united-kingdom"></i>English </a>
        </li>
        <li>
            <a class="dropdown-item" href="./page-sur-place-nl.php">
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
<!-- Inhoud -->
<div id="content">
    <!-- Paginatitel -->
    <div class="page-title border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <h1 class="mb-0">Sur Place</h1>
                    <h4 class="text-muted mb-0">Proeflokaal & terrassen: foto's</h4>
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
    <!-- Sectie -->
    <!-- Onze Kleine Restauratiediensten -->
    <section class="section section-bg-edge">
        <div class="image left bottom col-md-7">
            <div class="bg-image">
                <img src="./assets/img/surplace/services.jpg" alt="diensten">
            </div>
        </div>
        <div class="container offset-md-1">
            <div class="col-lg-5 offset-lg-7 col-md-6">
                <!--<div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>-->
                <h2 class="mb-5 ml-5" style="color: #000000;">Gelato Naturale - IJssalon:</h2>
                <p class="lead text-muted mb-5 ml-5" style="text-align: justify;color: #000000;">
                    Experienceer het genot van ijs bij Gelato Naturale, waar elke hap je meeneemt op een reis naar een
                    wereld van genot. Met een uitgelezen selectie ambachtelijke smaken bieden we je een onvergetelijke
                    ijzige ervaring. Of je nu houdt van tijdloze klassiekers of unieke creaties, onze winkel heeft voor
                    elk wat wils om je verlangen naar bevroren lekkernijen te bevredigen. Al onze ijsjes worden bereid
                    met 💯 verse vruchten en 💯 zonder kunstmatige smaakstoffen, waardoor ze echt natuurlijk zijn..</p>

                <!--<h6>Mark Johnson, Chef</h6><img src="assets/img/svg/sign.svg" alt="" class="mb-5"><h4>What people say about Us?</h4><a href="page-reviews.php" class="btn btn-outline-primary"><span>Check our reviews</span></a>-->
            </div>
        </div>
    </section>
    <!-- Sectie - Aanbiedingen -->
    <section class="section bg-light">
        <div class="container">
            <!--<h1 class="text-center mb-6">Speciale aanbiedingen</h1>-->
            <div class="carousel" data-slick='{"dots": true}'>
                <!-- Ons Ijs -->
                <div class="special-offer">
                    <img src="./assets/img/surplace/our-icecream.jpeg" alt="Ons Ijs">
                    <div class="special-offer-content">
                        <h2 class="mb-5">Ons Ijs:</h2>
                        <h5 class="text-muted mb-5">
                            Onze ijsproductie is 💯 natuurlijk van verse producten. We bieden een verscheidenheid aan
                            smaken afhankelijk van de beschikbaarheid van vers fruit en chocolade, die afhankelijk van
                            het seizoen kunnen variëren. Gemiddeld worden er permanent tussen de 30 en 40 smaken
                            aangeboden. Italiaanse toonbankbediening: Onze proeflokaal en terras zijn beschikbaar voor
                            uw proeverij.
                        </h5>
                    </div>
                </div>
                <!-- Onze Sorbets -->
                <div class="special-offer">
                    <img src="./assets/img/surplace/natural-drinks.jpg" alt="Onze Sorbets">
                    <div class="special-offer-content">
                        <h2 class="mb-5">Onze Sorbets:</h2>
                        <h5 class="text-muted mb-5">
                            Onze sorbetproductie is 💯 natuurlijk van verse producten. We bieden een verscheidenheid
                            aan smaken afhankelijk van de beschikbaarheid van vers fruit en chocolade, die afhankelijk
                            van het seizoen kunnen variëren. Gemiddeld worden er permanent tussen de 30 en 40 smaken
                            aangeboden. Italiaanse toonbankbediening: Onze proeflokaal en terras zijn beschikbaar voor
                            uw proeverij.
                        </h5>
                    </div>
                </div>
                <!-- Onze Ijs Coupe -->
                <div class="special-offer">
                    <img src="./assets/img/surplace/coupes.jpg" alt="Onze Ijs Coupe">
                    <div class="special-offer-content">
                        <h2 class="mb-5">Onze Ijs Coupe:</h2>
                        <h5 class="text-muted mb-5">
                            Een kaart met ijs en sorbets wordt aangeboden met bediening aan tafel. Dit varieert
                            afhankelijk van de productie op dat moment.
                        </h5>
                    </div>
                </div>
                <!-- Onze Wafels -->
                <div class="special-offer">
                    <img src="./assets/img/surplace/gaufres.jpg" alt="Onze Wafels">
                    <div class="special-offer-content">
                        <h2 class="mb-5">Onze Wafels:</h2>
                        <h5 class="text-muted mb-5">
                            Onze huisgemaakte wafelproductie wordt aangeboden met verschillende variaties: ijs, sorbets,
                            chocolade. U kunt ze naar eigen smaak samenstellen. Een wafelkaart is ook beschikbaar met
                            bediening aan tafel.
                        </h5>
                    </div>
                </div>
                <!-- Onze Pannenkoeken -->
                <div class="special-offer">
                    <img src="./assets/img/surplace/Crepes.jpg" alt="Onze Pannenkoeken">
                    <div class="special-offer-content">
                        <h2 class="mb-5">Onze Pannenkoeken:</h2>
                        <p class="lead text-muted mb-5">
                            Onze huisgemaakte pannenkoeken worden aangeboden met verschillende variaties: ijs, sorbets,
                            chocolade. U kunt ze naar eigen smaak samenstellen. Een pannenkoekenkaart is ook beschikbaar
                            met bediening aan tafel.
                        </p>
                    </div>
                </div>
                <!-- Onze Ice Burgger -->
                <div class="special-offer">
                    <img src="./assets/img/surplace/ice-burger.jpg" alt="Onze Ice Burgger">
                    <div class="special-offer-content">
                        <h2 class="mb-5">Onze Ice Burgger:</h2>
                        <h5 class="text-muted mb-5">
                            Ice burgger is een echte burger die halfweg tussen een burger en een Italiaanse brioche ligt
                            en wordt bereid op het moment. Onze huisgemaakte Ice Burgger wordt aangeboden met
                            verschillende variaties: ijs, sorbets, chocolade. U kunt ze naar eigen smaak samenstellen.
                            Een Ice Burgger-kaart is ook beschikbaar met bediening aan tafel.
                        </h5>
                    </div>
                </div>
                <!-- Onze Warme Dranken -->
                <div class="special-offer">
                    <img src="./assets/img/surplace/boissons-chaudes.jpg" alt="Onze Warme Dranken" width="400px">
                    <div class="special-offer-content">
                        <h2 class="mb-5">Onze Warme Dranken:</h2>
                        <h5 class="text-muted mb-5">
                            Geniet van onze selectie warme dranken die uw hart en ziel verwarmen. Of het nu gaat om een
                            heerlijke koffie, een geurige thee of een troostende warme chocolademelk, onze
                            kwaliteitsvolle warme dranken zullen u op elk moment van de dag bekoren.
                        </h5>
                    </div>
                </div>
                <!-- Onze Aperitieven -->
                <div class="special-offer">
                    <img src="./assets/img/surplace/nos-aperos.jpg" alt="Onze Aperitieven">
                    <div class="special-offer-content">
                        <h2 class="mb-5">Onze Aperitieven:</h2>
                        <h5 class="text-muted mb-5">
                            Begin uw maaltijd met stijl door te genieten van onze heerlijke aperitieven. Of u nu kiest
                            voor kaas- en vleesplanken, verfijnde hapjes of verfrissende cocktails, onze aperitieven
                            zullen uw smaakpapillen prikkelen en uw eetlust stimuleren voor de rest van de maaltijd.
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include 'carosuel-main-nl.php';
    ?>
    <!-- Voet -->
    <footer id="footer" class="bg-dark dark">
        <div class="container">
            <!-- Eerste rij van voet -->
            <div class="footer-first-row row">
                <div class="col-lg-3 text-center">
                    <a href="index.php">
                        <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88" class="mt-5 mb-5">
                    </a>
                </div>
                <style>
                    .styled-table {
                        --background-color: #343a40;
                        /* Donkere achtergrondkleur */
                        color: #ffffff;
                        /* Tekstkleur */
                        border-radius: 10px;
                        /* Afgeronde hoeken */
                        margin-top: 20px;
                        /* Ruimte toevoegen aan de bovenkant */
                    }

                    .styled-table h5 {
                        color: #007bff;
                        /* Blauwe themakleur */
                    }

                    .styled-table td.title {
                        --font-weight: bold;
                        color: #ffffff;
                        /* Tekstkleur */
                    }

                    .styled-table td.content {
                        color: #a8b2b7;
                        /* Lichtere tekstkleur */
                    }

                    .styled-table a {
                        color: #ffffff;
                        /* Linkkleur */
                    }

                    .styled-table a:hover {
                        text-decoration: none;
                        /* Onderstreping verwijderen bij zweven */
                    }
                </style>
                <div class="col-lg-4 col-md-6 styled-table">
                    <h5 class="text-muted">Openingstijden</h5>
                    <table class="table">
                        <tbody>
                            <?php include 'table-nl.php' ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-5 col-md-6 styled-table">
                    <h5 class="text-muted mb-3">Contactgegevens</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="title">Telefoon :</td>
                                <td class="content">
                                    <a href="tel:+0497476548" target="_blank">
                                        <i class="fa fa-phone fa-lg"></i> 0497 47 65 48
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="title">E-mail :</td>
                                <td class="content">
                                    <a href="mailto:info@gelatonaturale.be" target="_blank">
                                        <i class="fa fa-lg fa-envelope"></i>info@gelatonaturale.be
                                    </a>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                    <h5 class="text-muted mb-3 mt-4">Sociale Media</h5>
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
            <!-- Tweede rij van voet -->
            <div class="footer-second-row">
                <span class="text-muted">Aangepast door FAST CAISSE <script>
                        document.write(new Date().getFullYear())
                    </script>©. </span>
            </div>
        </div>
        <!-- Terug naar boven -->
        <button id="back-to-top" class="back-to-top">
            <i class="ti ti-angle-up"></i>
        </button>
    </footer>
    <!-- Voet / Einde -->
</div>
<!-- Inhoud / Einde -->


<!-- Panneau Mobile -->
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
        <a class="dropdown-toggle" href="#" id="Dropdown1" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="flag flag-netherlands m-0"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="Dropdown1">
            <li>
                <a class="dropdown-item" href="#">
                    <i class="flag-netherlands  flag"></i>Dutch <i class="fa fa-check text-success ms-2"></i>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="./page-sur-place-en.php">
                    <i class="flag flag-united-kingdom"></i>English </a>
            </li>
            <li>
                <a class="dropdown-item" href="./page-sur-place-nl.php">
                    <i class="flag-france flag"></i>Français </a>
            </li>
        </ul>
    </div>
    <?php
    include 'footer-nl.php';
    ?>