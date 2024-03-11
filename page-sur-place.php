<?php
    include 'header.php';
?>
 <script src="./dist/js/menu/axios.min.js"></script>
 <script src="./dist/js/clearCache.js"></script>
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
     <a class="dropdown-item" href="./page-sur-place-en.php">
      <i class="flag flag-united-kingdom"></i>English </a>
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
<!-- Page Title -->
<div class="page-title border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-5">
                <h1 class="mb-0">Sur Place</h1>
                <h4 class="text-muted mb-0">Salon de dégustation & terrasses: photos</h4>
            </div>
        </div>
    </div>
</div>
          <!-- Section -->
<!-- Nos Services de Petite Restauration -->
<section class="section section-bg-edge">
  <div class="image left bottom col-md-7">
    <div class="bg-image">
      <img src="./assets/img/surplace/services.jpg" alt="services">
      </div>
      </div>
      <div class="container offset-md-1">
        <div class="col-lg-5 offset-lg-7 col-md-6">
      <!--<div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>-->
        <h2 class="mb-5 ml-5 ">Nos Services de Petite Restauration:</h2>
        <p class="lead text-muted mb-5 ml-5">Experience the ocean's delights at Matthias and Sea, nestled in the charming
        Besoin d'une petite pause gourmande ou d'une collation rapide? Explorez notre sélection de plats légers et savoureux proposés dans notre service de petite restauration. Que ce soit des sandwiches frais, des salades croquantes ou des plats du jour faits maison, nous avons de quoi satisfaire toutes vos envies, même en cas de petite faim.
        </p>
    <!--<h6>Mark Johnson, Chef</h6><img src="assets/img/svg/sign.svg" alt="" class="mb-5"><h4>What people say about Us?</h4><a href="page-reviews.php" class="btn btn-outline-primary"><span>Check our reviews</span></a>-->
       </div>
  </div>
</section>  
        <!-- Section - Offers -->
        <section class="section bg-light">

            <div class="container">
                <!--<h1 class="text-center mb-6">Special offers</h1>-->
                <div class="carousel" data-slick='{"dots": true}'>
                    <!-- Nos Glaces -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/natural.jpg" alt="Nos Glaces" width="300px" height="300px">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Nos Glaces:</h2>
                            <h5 class="text-muted mb-5">
                                Notre production de glaces est 100% naturelle à partir des produits frais. Nous proposons une variété de saveurs en fonction de l'arrivage des fruits frais et du chocolat, qui peut varier selon la saison. En moyenne, entre 30 et 40 saveurs sont proposées en permanence. Service au comptoir à l'italienne: Notre salon et terrasse sont disponibles pour votre dégustation.
                            </h5>
                        </div>
                    </div>
                    <!-- Nos Sorbets -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/natural-drinks.jpg" alt="Nos Sorbets" width="400px" >
                        <div class="special-offer-content">
                            <h2 class="mb-5">Nos Sorbets:</h2>
                            <h5 class="text-muted mb-5">
                                Notre production de sorbets est 100% naturelle à partir des produits frais. Nous proposons une variété de saveurs en fonction de l'arrivage des fruits frais et du chocolat, qui peut varier selon la saison. En moyenne, entre 30 et 40 saveurs sont proposées en permanence. Service au comptoir à l'italienne: Notre salon et terrasse sont disponibles pour votre dégustation.
                            </h5>
                        </div>
                    </div>
                    <!-- Nos Coupes de Glaces -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/coupes.jpg" alt="Nos Coupes de Glaces" width="400px" height="200px">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Nos Coupes de Glaces:</h2>
                            <h5 class="text-muted mb-5">
                                Une carte des glaces et sorbets est proposée avec un service à table. Cela varie en fonction de la production du moment.
                            </h5>
                        </div>
                    </div>
                    <!-- Nos Gaufres -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/gaufres.jpg" alt="Nos Gaufres" width="400px" height="200px">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Nos Gaufres:</h2>
                            <h5 class="text-muted mb-5">
                                Notre production de gaufres maison vous est proposée avec plusieurs variantes : crème glacée, sorbets, chocolat. Libre à vous de les composer selon vos goûts. Une carte des gaufres sera également disponible avec un service à table.
                            </h5>
                        </div>
                    </div>
                    <!-- Nos Crêpes -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/crepes.jpg" alt="Nos Crêpes" width="400px" height="200px">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Nos Crêpes:</h2>
                            <p class="lead text-muted mb-5">
                                Notre production de crêpes maison vous est proposée avec plusieurs variantes : crème glacée, sorbets, chocolat. Libre à vous de les composer selon vos goûts. Une carte des crêpes sera également disponible avec un service à table.
                            </p>
                        </div>
                    </div>
                    <!-- Notre Ice Burgger -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/ice-burger.jpg" alt="Notre Ice Burgger" width="400px" height="200px">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Notre Ice Burgger:</h2>
                            <h5 class="text-muted mb-5">
                                Ice burgger est un véritable burger à mi-chemin entre un burger et une brioche à l'italienne qui est cuit au moment. Notre production d'Ice Burgger maison vous est proposée avec plusieurs variantes : crème glacée, sorbets, chocolat. Libre à vous de les composer selon vos goûts. Une carte d'Ice Burgger sera également disponible avec un service à table.
                            </h5>
                        </div>
                    </div>
                    <!-- Nos Boissons Chaudes -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/boissons-chaudes.jpg" alt="Nos Boissons Chaudes"  width="400px">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Nos Boissons Chaudes:</h2>
                            <h5 class="text-muted mb-5">
                                Dégustez notre sélection de boissons chaudes qui vous réchaufferont le cœur et l'âme. Que ce soit un café savoureux, un thé parfumé ou un chocolat chaud réconfortant, nos boissons chaudes de qualité vous raviront à tout moment de la journée.
                            </h5>
                        </div>
                    </div>
                    <!-- Nos Apéros -->
                    <div class="special-offer">
                        <img src="./assets/img/surplace/nos-aperos.jpg" alt="Nos Apéros" width="400px" height="200px">
                        <div class="special-offer-content">
                            <h2 class="mb-5">Nos Apéros:</h2>
                            <h5 class="text-muted mb-5">
                                Commencez votre repas avec style en savourant nos délicieux apéritifs. Que vous préfériez des planches de fromages et de charcuteries, des amuse-bouches fins ou des cocktails rafraîchissants, nos apéros sauront éveiller vos papilles et stimuler votre appétit pour la suite du repas.
                            </h5>
                        </div>
                    </div>


                    </div>
                </div>
            </div>

        </section>


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
       <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88"
        class="mt-5 mb-5">
      </a>
     </div>
     <style>
  .styled-table {
    --background-color: #343a40; /* Couleur de fond sombre */
    color: #ffffff; /* Couleur du texte */
    border-radius: 10px; /* Coins arrondis */
    margin-top: 20px; /* Ajouter un espace en haut */
  }

  .styled-table h5 {
    color: #007bff; /* Couleur thème bleu */
  }

  .styled-table td.title {
    --font-weight: bold;
    color: #ffffff; /* Couleur du texte */
  }

  .styled-table td.content {
    color: #a8b2b7; /* Couleur de texte plus claire */
  }

  .styled-table a {
    color: #ffffff; /* Couleur du lien */
  }

  .styled-table a:hover {
    text-decoration: none; /* Supprimer le soulignement au survol */
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
    <a href="mailto:info@matthiasandsea.be" target="_blank">
        <i class="fa fa-lg fa-envelope"></i> info@matthiasandsea.be
    </a>
</td>

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
 <!-- Contenu / Fin -->

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
     <a class="dropdown-item" href="./page-sur-place-en.php">
      <i class="flag flag-united-kingdom"></i>English </a>
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