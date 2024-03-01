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
   <a class="dropdown-item" href="images-nl.php">
    <i class="flag-netherlands flag"></i>Dutch </a>
  </li>
  <li>
   <a class="dropdown-item" href="images.php">
    <i class="flag-france flag"></i>Français </a>
  </li>

 </ul>
</div>
</div>
</div>
</header>
<header id="header-mobile" class="light">
 <!-- Mobile header content -->
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
   <img src="assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 75px;" width="88">
  </a>
 </div>
</header>
<!-- Section - Main -->
<!-- Header / End -->
<!-- Content -->
<div id="content">

 <style>
 @import url(https://fonts.bunny.net/css?family=amita:700);

 body {
  background: url('./admin/assets/img/printable/3.jpg') center center/cover no-repeat;
  min-height: 100vh;
  display: -webkit-flex;
  display: flex;
  flex-direction: column;
 }

 h1 {
  color: #fefae0;
  font-family: Amita;
  margin: 20px auto;
  width: 450px;
  font-size: 3rem;
  text-align: center;
  border-bottom: 10px double #bc6c25;
 }

 .img-element {
  width: 450px;
  height: 300px;
  margin: 10px;
  border: 10px solid #fefae0;
  -webkit-filter: sepia(100%);
  filter: sepia(100%);
  transition-duration: 1s;
 }

 .img-element:hover {
  border: 5px solid #fff;
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);
  transform: scale(1.1);
  -webkit-filter: none;
  filter: none;
  z-index: 999;
 }



 .container-image {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
 }

 .fullscreen-overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.9);
  justify-content: center;
  align-items: center;
  z-index: 99999;
 }

 .fullscreen-image {
  max-width: 100%;
  max-height: 100%;
 }

 .exit-fullscreen {
  position: absolute;
  top: 10px;
  right: 10px;
  color: #fff;
  cursor: pointer;
 }

 .print-icon {
  position: absolute;
  bottom: 20px;
  left: 50%;
  width: 100px;
  height: 100px;
  transform: translateX(-50%);
  color: #fff;
  cursor: pointer;
  z-index: 9999;
 }
 </style>

 <h1>Our Catering Menu</h1>
 <br><br>
 <div class="container-image">
  <img class="img-element" src='./admin/assets/img/printable/1.jpg' alt="Herd of horses"
   onclick="openFullscreen(this);">
  <img class="img-element" src="./admin/assets/img/printable/2.jpg" alt="Baby Elephant" onclick="openFullscreen(this);">
 </div>

 <div class="fullscreen-overlay" onclick="closeFullscreen()">
  <i onclick="closeFullscreen()" class="exit-fullscreen fas fa-window-close fa-lg" aria-hidden="true"></i>

  <img class="fullscreen-image" id="fullscreenImage">
  <i class="fa fa-solid fa-print fa-lg print-icon" onclick="printImage()"></i>
 </div>
 <br><br>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
 <script>
 function openFullscreen(element) {
  var fullscreenOverlay = document.querySelector('.fullscreen-overlay');
  var fullscreenImage = document.getElementById('fullscreenImage');

  fullscreenImage.src = element.src;
  fullscreenOverlay.style.display = 'flex';

  // Check for different browser support
  if (document.documentElement.requestFullscreen) {
   document.documentElement.requestFullscreen();
  } else if (document.documentElement.mozRequestFullScreen) {
   /* Firefox */
   document.documentElement.mozRequestFullScreen();
  } else if (document.documentElement.webkitRequestFullscreen) {
   /* Chrome, Safari and Opera */
   document.documentElement.webkitRequestFullscreen();
  } else if (document.documentElement.msRequestFullscreen) {
   /* IE/Edge */
   document.documentElement.msRequestFullscreen();
  }
 }

 function closeFullscreen() {
  if (document.exitFullscreen) {
   document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
   document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
   document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
   document.msExitFullscreen();
  }

  document.querySelector('.fullscreen-overlay').style.display = 'none';
 }

 function printImage() {
  var fullscreenImage = document.getElementById('fullscreenImage');
  var printWindow = window.open('', '_blank');
  printWindow.document.write('<img src="' + fullscreenImage.src + '" style="max-width: 100%;">');
  printWindow.document.close();
  printWindow.print();
 }
 </script>

 <!-- Section -->
 <section class="section section-lg dark bg-dark">
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
      <img src="assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88"
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
     <h5 class="text-muted">Heures d' ouverture</h5>
     <table class="table">
      <tbody>
 <?php
  include 'table-en.php';
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
   <img src="assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88">
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
    <a class="dropdown-item" href="images-nl.php">
     <i class="flag-netherlands flag"></i>Dutch </a>
   </li>
   <li>
    <a class="dropdown-item" href="images.php">
     <i class="flag-france flag"></i>Français </a>
   </li>
  </ul>

  </ul>
 </div>
 <?php
    include 'footer.php';
?>