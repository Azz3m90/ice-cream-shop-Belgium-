<?php
    include 'header.php';
?>
<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
 <a class="dropdown-toggle" href="#" id="Dropdown1" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
  <i class="flag flag-france m-0"></i>
 </a>
 <ul class="dropdown-menu" aria-labelledby="Dropdown1">
  <li>
   <a class="dropdown-item" href="#">
    <i class="flag-france flag"></i>Français <i class="fa fa-check text-success ms-2"></i>
   </a>
  </li>
  <li>
   <hr class="dropdown-divider">
  </li>
  <li>
   <a class="dropdown-item" href="index-en.php">
    <i class="flag flag-united-kingdom"></i>English </a>
  </li>
  <li>
   <a class="dropdown-item" href="index-nl.php">
    <i class="flag-netherlands flag"></i>Dutch </a>
  </li>
 </ul>
</div>
</div>
</div>
</header>
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
   <img src="assets/img/gelatonaturale.svg" alt="matthiasandsea" style="width: 200px;height: 75px;" width="88">
  </a>
 </div>
 <!-- Cart -->
 <!--
        <a href="#" class="module module-cart" data-toggle="panel-cart"><i class="ti ti-shopping-cart"></i><span class="notification">0</span></a>
      -->
</header>
<!-- Section - Main -->
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
            <h4 class="text-muted">Délice Gourmand</h4>
            <h1>Glace</h1>
          </div>
          <div class="content-inner">
            <h3>Saveurs Classiques</h3>
            <h5 class="text-muted mb-5">Faites-vous plaisir avec nos saveurs classiques de vanille crémeuse, chocolat riche et fraise rafraîchissante.</h5>
          </div>
          <div class="content-inner">
            <h1>Irresistible</h1>
            <h5 class="text-muted mb-5">Satisfaites vos envies sucrées avec nos délicieuses créations de glaces!</h5>
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
   <h1>À propos de Notre Établissement</h1>
   <p class="lead text-muted mb-5 text-justify">Notre établissement, ouvert en 2021 après des années de préparation, est spécialisé dans la production et la distribution de crèmes glacées et sorbets. Nous servons une variété de clients, notamment les glaciers, les restaurants, les collectivités, les grossistes et les épiceries fines, avec un service de livraison inclus. Notre engagement envers les produits naturels nous permet de répondre efficacement aux besoins de nos clients professionnels, en leur offrant des saveurs personnalisées. Pour les particuliers, nous proposons un salon de dégustation avec une terrasse magnifique, où ils peuvent savourer nos produits. De plus, ils ont la possibilité d'acheter nos glaces au litre et des gâteaux, selon les disponibilités, sans réservation préalable.</p>
  </div>
 </div>
  </div>
  
 </section>
<br>

        <!-- Section - Menu -->
        <section class="section pb-0 protrude">
            <div class="container">
                <h1 class="mb-6"></h1>
            </div>

            <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                "dots": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 1
                        }
                    },
                    {
                        "breakpoint": 690,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }'>

                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Burgers">
                        <img src="./assets/img/surplace/surplace.jpg" alt="sur-place" style="width: 500px;height:400px;">
                        <h3 class="title" title="Sur place">Sur place</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Pizza">
                        <img src="./assets/img/ourcake/cake.jpg" alt="Nos bûches et gâteaux"  style="width: 500px;height:400px;">
                        <h3 class="title" title="Nos bûches et gâteaux">Nos bûches et gâteaux</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Pasta">
                        <img src="./assets/img/professionals/professionals.jpg" alt="Professionals" style="width: 500px;height:400px;">
                        <h3 class="title" title="Professionnels"> Profess- ionnels</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu-list-navigation.html#Pasta">
                        <img src="./assets/img/Reservations/reservation.jpg" alt="Réservations Traiteurs Évènements" style="width: 500px;height:400px;">
                        <h3 class="title" title="Réservations Traiteurs Évènements"> Bûches et Gâteaux</h3>
                    </a>
                </div>
            </div>

        </section>
 <!-- Section -->
 <section class="section section-lg dark bg-dark" hidden>
  <!-- BG Image -->
  <div class="bg-image bg-parallax">
   <div class="bg-video dark-overlay" data-src="assets/vid/seafood.mp4" data-type="video/mp4"></div>
  </div>
  <div class="container text-center">
   <div class="row justify-content-center">
    <div class="col-lg-8">
     <!--<h2 class="mb-3">Consultez notre vidéo promotionnelle !</h2>-->
     <h2>
      <a href="book-a-table.php"> Réservez une table dès maintenant
       <!--ou passez une commande en ligne--> !
      </a>
     </h2>
    </div>
   </div>
  </div>
 </section>
 <!-- Pied de page -->
 <footer id="footer" class="bg-dark dark">
  <div class="container">
   <!-- Première rangée du pied de page -->
   <div class="footer-first-row row">
    <div class="col-lg-3 text-center">
     <a href="index.php">
     <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 200px;" width="88"
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
        include 'table-fr.php';
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
   <!-- Deuxième rangée du pied de page -->
   <div class="footer-second-row">
    <span class="text-muted"> Personnalisé par FAST CAISSE <script>
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
<!-- Panneau Mobile -->
<nav id="panel-mobile">
 <div class="module module-logo bg-dark dark">
  <a href="#">
   <img src="assets/img/gelatonaturale.svg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88">
  </a>
  <button class="close" data-toggle="panel-mobile">
   <i class="ti ti-close"></i>
  </button>
 </div>
 <nav class="module module-navigation"></nav>
 <!--language selector-->
 <div class="dropdown col-12">
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
    <a class="dropdown-item" href="index-en.php">
     <i class="flag flag-united-kingdom"></i>English </a>
   </li>
   <li>
    <a class="dropdown-item" href="index-nl.php">
     <i class="flag-netherlands flag"></i>Dutch </a>
   </li>
  </ul>
 </div>
 <?php
    include 'footer.php';
?>