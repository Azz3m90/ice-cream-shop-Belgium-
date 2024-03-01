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
    <a class="dropdown-item" href="page-gallery-en.php">
     <i class="flag flag-united-kingdom"></i>English </a>
   </li>
   <li>
    <a class="dropdown-item" href="page-gallery-nl.php">
     <i class="flag-netherlands flag"></i>Dutch </a>
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
 <!-- Content -->
 <div id="content">
  <!-- Page Title -->
  <div class="page-title border-top dark bg-dark">
   <div class="container">
    <div class="row">
     <div class="col-lg-7 offset-lg-4">
      <h1 class="mb-0">Galerie</h1>
      <h4 class="text-muted mb-0">Quelques informations sur notre restaurant</h4>
     </div>
    </div>
   </div>
  </div>
  <!-- Your HTML structure -->
  <section id="gallery" class="section section-gallery cover">
   <!-- Gallery Carousel -->
   <div class="gallery-carousel inner-controls" id="galleryCarousel"></div>

   <!-- Gallery Carousel Nav -->
   <div class="gallery-nav" id="galleryNav"></div>

   <div class="set-fullscreen" data-local-scroll>
    <a href="#gallery">
     <i class="ti ti-fullscreen"></i>
    </a>
   </div>
  </section>

  <!-- Your JavaScript code -->
  <script>
  // Replace 'your-json-file.json' with the actual path to your JSON file
  const jsonFilePath = './admin/php/gallery/get-image.php';

  function normalizeUrl(baseUrl, relativePath) {
   // Split the relative path into segments
   var pathSegments = relativePath.split('/');

   // Remove '../' and './' segments
   var cleanedSegments = pathSegments.filter(function(segment) {
    return segment !== '..' && segment !== '.';
   });

   // Join the cleaned segments
   var cleanedPath = cleanedSegments.join('/');

   // Combine with the base URL
   var absoluteUrl = new URL(cleanedPath, baseUrl).href;

   return absoluteUrl;
  }
    var baseUrl = "https://www.matthiasandsea.be//matthias-and-sea/";
  // Fetch JSON data using Axios
  axios.get(jsonFilePath)
   .then(response => {
    const galleryImages = response.data.galleryImages;

    // Create the gallery carousel and nav elements
    const carouselContainer = document.getElementById('galleryCarousel');
    const navContainer = document.getElementById('galleryNav');

    // Loop through gallery images and create HTML elements
    galleryImages.forEach(image => {
     // Create carousel slide
     const slide = document.createElement('div');
     slide.className = 'slide';

     const bgParallax = document.createElement('div');
     bgParallax.className = 'bg-parallax';

     var relativePathFromDatabase = image.path;

     // Use the URL constructor to handle concatenation and normalization
     var absoluteUrl = normalizeUrl(baseUrl, relativePathFromDatabase);
     const img = document.createElement('img');
     img.src = `${absoluteUrl}`;
     img.alt = '';

     bgParallax.appendChild(img);
     slide.appendChild(bgParallax);
     carouselContainer.appendChild(slide);

     // Create nav image
     const navImg = document.createElement('img');
     navImg.src = `${absoluteUrl}`;
     navImg.alt = '';

     navContainer.appendChild(navImg);
    });
   })
   .catch(error => {
    console.error('Error fetching JSON data:', error);
   });
  </script>
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
 <!-- Panneau de commande -->
 <div id="panel-cart">
  <div class="panel-cart-container">
   <div class="panel-cart-title">
    <h5 class="title">Votre panier</h5>
    <button class="close" data-toggle="panel-cart">
     <i class="ti ti-close"></i>
    </button>
   </div>
   <div class="panel-cart-content cart-details">
    <table class="cart-table">
     <tr>
      <td class="title">
       <span class="name">
        <a href="#product-modal" data-toggle="modal">Burger au bœuf</a>
       </span>
       <span class="caption text-muted">Grand (500g)</span>
      </td>
      <td class="price">9,00 $</td>
      <td class="actions">
       <a href="#product-modal" data-toggle="modal" class="action-icon">
        <i class="ti ti-pencil"></i>
       </a>
       <a href="#" class="action-icon">
        <i class="ti ti-close"></i>
       </a>
      </td>
     </tr>
     <tr>
      <td class="title">
       <span class="name">
        <a href="#product-modal" data-toggle="modal">Burger supplémentaire</a>
       </span>
       <span class="caption text-muted">Petit (200g)</span>
      </td>
      <td class="price text-success">9,00 $</td>
      <td class="actions">
       <a href="#product-modal" data-toggle="modal" class="action-icon">
        <i class="ti ti-pencil"></i>
       </a>
       <a href="#" class="action-icon">
        <i class="ti ti-close"></i>
       </a>
      </td>
     </tr>
    </table>
    <div class="cart-summary">
     <div class="row">
      <div class="col-7 text-right text-muted">Total de la commande :</div>
      <div class="col-5">
       <strong>
        <span class="cart-products-total">0,00 $</span>
       </strong>
      </div>
     </div>
     <div class="row">
      <div class="col-7 text-right text-muted">Livraison :</div>
      <div class="col-5">
       <strong>
        <span class="cart-delivery">0,00 $</span>
       </strong>
      </div>
     </div>
     <hr class="hr-sm">
     <div class="row text-lg">
      <div class="col-7 text-right text-muted">Total :</div>
      <div class="col-5">
       <strong>
        <span class="cart-total">0,00 $</span>
       </strong>
      </div>
     </div>
    </div>
    <div class="cart-empty">
     <i class="ti ti-shopping-cart"></i>
     <p>Votre panier est vide...</p>
    </div>
   </div>
  </div>
  <a href="paiement.php" class="panel-cart-action btn btn-secondary btn-block btn-lg">
   <span>Passer à la caisse</span>
  </a>
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
     <a class="dropdown-item" href="page-gallery-en.php">
      <i class="flag flag-united-kingdom"></i>English </a>
    </li>
    <li>
     <a class="dropdown-item" href="page-gallery-nl.php">
      <i class="flag-netherlands flag"></i>Dutch </a>
    </li>
   </ul>
  </div>
  <?php
    include 'footer.php';
?>