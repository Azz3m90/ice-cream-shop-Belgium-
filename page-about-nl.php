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
    <i class="flag-netherlands flag"></i>Dutch <i class="fa fa-check text-success ms-2"></i>
   </a>
  </li>
  <li>
   <hr class="dropdown-divider">
  </li>
  <li>
   <a class="dropdown-item" href="page-about-en.php">
    <i class="flag flag-united-kingdom"></i>English </a>
  </li>
  <li>
   <a class="dropdown-item" href="page-about.php">
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
<!-- Content -->
<div id="content">
 <!-- Page Title -->
 <div class="page-title border-top">
  <div class="container">
   <div class="row">
    <div class="col-lg-7 offset-lg-5">
     <h1 class="mb-0">About Us</h1>
     <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
    </div>
   </div>
  </div>
 </div>
 <!-- Section -->
 <section class="section section-bg-edge">
  <div class="image left bottom col-md-7">
   <div class="bg-image">
    <img src="./assets/img/Chef/Chef.jpg" alt="chef">
   </div>
  </div>
  <div class="container offset-md-1">
   <div class="col-lg-5 offset-lg-7 col-md-6">
    <!--<div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>-->
    <h2 class="mb-5 ml-5">De Beste Zeevruchten in Tarcienne!</h2>
    <p class="lead text-muted mb-5 ml-5">Ervaar de heerlijkheden van de oceaan bij Matthias and Sea, gelegen in het
     charmante
     stadje Tarcienne. Ons restaurant is een verborgen juweeltje en biedt een unieke eetervaring met zeevruchten die
     zeker uw smaakpapillen zal veroveren.</p>
    <!--<h6>Mark Johnson, Chef</h6><img src="assets/img/svg/sign.svg" alt="" class="mb-5"><h4>What people say about Us?</h4><a href="page-reviews.php" class="btn btn-outline-primary"><span>Check our reviews</span></a>-->
   </div>
  </div>
 </section>
 <!-- Section -->
 <section class="section section-lg dark bg-dark">
  <!-- BG Image -->
  <div class="bg-image bg-parallax">
   <img src="./assets/img/chef/bg-croissant.jpg" alt="">
  </div>
  <div class="container text-center">
   <div class="col-lg-8 offset-lg-2">
    <h2 class="mb-3">Wil je ons bezoeken?</h2>
    <h5 class="text-muted">Boek nu zelfs een tafel!</h5>
    <!--<a href="menu-list-navigation.php" class="btn btn-primary"><span>Order Online</span></a>-->
    <a href="book-a-table-nl.php" class="btn btn-outline-primary">
     <span>Reserveer een tafel</span>
    </a>
   </div>
  </div>
 </section>
 <!-- Footer -->
 <footer id="footer" class="bg-dark dark">
  <div class="container">
   <!-- Footer 1st Row -->
   <div class="footer-first-row row">
    <div class="col-lg-3 text-center">
     <a href="index-nl.php">
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

 <a href="checkout-nl.php" class="panel-cart-action btn btn-secondary btn-block btn-lg">
  <span>Go to checkout</span>
 </a>
</div>
<!-- Panel Mobile -->
<nav id="panel-mobile">
 <div class="module module-logo bg-dark dark">
  <a href="index-nl.php">
   <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88">
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
    <a class="dropdown-item" href="page-about-en.php">
     <i class="flag flag-united-kingdom"></i>English </a>
   </li>
   <li>
    <a class="dropdown-item" href="page-about.php">
     <i class="flag-france flag"></i>Français </a>
   </li>
  </ul>
 </div>
 <?php
    include 'footer-nl.php';
?>