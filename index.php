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
 <!-- Section - Main -->
 <section class="section section-main section-main-1 bg-light">
  <div class="container dark">
   <div class="slide-container">
    <div id="section-main-1-carousel-image" class="image inner-controls">
     <div class="slide">
      <div class="bg-image">
       <img src="assets/img/home/caviar.webp" alt="caviar">
      </div>
     </div>
     <div class="slide">
      <div class="bg-image">
       <img src="assets/img/home/media/10.jpeg" alt="">
      </div>
     </div>
     <div class="slide">
      <div class="bg-image">
       <img src="assets/img/home/media/7.jpeg" alt="">
      </div>
     </div>
    </div>
    <div class="content dark">
     <div id="section-main-1-carousel-content">
      <div class="content-inner">
       <h4 class="text-muted">Fruit de mer</h4>
       <h1>Caviar</h1>
       <div class="btn-group"></div>
      </div>
      <div class="content-inner">
       <h3>Côté pastaio</h3>
       <h5 class="text-muted mb-5">Ravioli faits main à la truffe noir!</h5>
      </div>
      <div class="content-inner">
       <h1>Délicieux</h1>
       <h5 class="text-muted mb-5">CÔTÉ CHALEUR POUR COMMENCER!</h5>
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
    <img src="assets/img/main/seafood.jpg" alt="">
   </div>
  </div>
  <div class="container">
   <div class="col-lg-5 col-md-9">
    <h1>Les Meilleurs Fruits de Mer MATTHIAS AND SEA!</h1>
    <p class="lead text-muted mb-5">Découvrez les délices de l'océan chez <strong>MATTHIAS AND SEA</strong>, niché dans
     la charmante ville de Tarcienne. Notre restaurant est un joyau caché, offrant une expérience unique de dégustation
     de fruits de mer qui saura captiver vos papilles. </p>
   </div>
  </div>
 </section>
 <!-- Section - Menu -->
 <section class="section pb-0 protrude" hidden>
  <div class="container">
   <h1 class="mb-6">Notre menu</h1>
  </div>
  <!-- Section - Menu -->
  <div class="container" id="MenuCarousel">
   <div class="carousel" data-slick='{
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
      }' id="menuCarousel">
    <!-- Here the injected menu elements will be added -->
   </div>
  </div>
  <script>
  // Function to render the menu elements

  function renderMenu(menuData) {
   const menuCarouselContainer = document.getElementById('menuCarousel');

   menuData.forEach(category => {
    // Create a div for each menu category
    const categoryElement = document.createElement('div');
    categoryElement.classList.add('menu-sample');
    var relativePathFromDatabase = category.CategoryImage;
    // Use the URL constructor to handle concatenation and normalization
    var absoluteUrl = normalizeUrl(baseUrl, relativePathFromDatabase);
    // Create the category content
    categoryElement.innerHTML = `
            <a href="menu-grid-navigation.php#${category.categoryName.replace(/\s+/g, '')}">
              <img src="./assets/img/bg.png"  alt="${category.categoryName}" class="image">
              <h5 class="title">${category.categoryName}</h5>
            </a>
          `;

    // Append the category to the container
    menuCarouselContainer.appendChild(categoryElement);


   });
  }

  // Define the URL for the JSON data file
  const jsonUrl = './admin/php/dishes/load-dishes.php';

  // Load the JSON data using Axios
  axios.get(jsonUrl)
   .then(response => {
    const menuData = response.data.menu || []; // Use the menu data or default to an empty array
    renderMenu(menuData);
   })
   .catch(error => {
    console.error('Error loading JSON data:', error);
    document.getElementById("menu-head").remove();
    // You can provide a fallback behavior or display an error message to the user here.
   });
  </script>
 </section>
 <!-- Section - Offers -->
 <section class="section bg-light" hidden>
  <!-- Section - Offers -->
  <div class="container" id="Carousel">
   <h1 id="offer-head" class="text-center mb-6">Offres spéciales</h1>

   <div class="carousel" data-slick='{"dots": true}' id="specialOffers">
    <!-- Here the injected special offer elements will be added -->
   </div>
  </div>
  <script>
  // Define the URL for the JSON data file
  const url = './admin/php/offers/load_offers.php';

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

   // Convert the URL
   absoluteUrl = absoluteUrl.replace('/matthias-and-sea/matthias-and-sea/', '/matthias-and-sea/');


   return absoluteUrl;
  }
  var baseUrl = "http://localhost/matthias-and-sea/";
  // Function to render the special offer elements
  function renderSpecialOffers(offersData) {
   const specialOffersContainer = document.getElementById('specialOffers');

   offersData.forEach(offer => {
    // Create a div for each special offer
    const specialOffer = document.createElement('div');
    specialOffer.classList.add('special-offer');

    var relativePathFromDatabase = offer.image;

    // Use the URL constructor to handle concatenation and normalization
    var absoluteUrl = normalizeUrl(baseUrl, relativePathFromDatabase);
    // Create the special offer content
    specialOffer.innerHTML = `
                  <img src="./admin/${offer.image}" alt="" class="special-offer-image">
                  <div class="special-offer-content">
                    <h2 class="mb-2">${offer.title}</h2>
                    <h5 class="text-muted mb-5">${offer.description}</h5>
                    <ul class="list-check text-lg mb-0">
                      ${offer.details
                        .map(
                          detail => `<li class="${detail.class}">${detail.text}</li>`
                        )
                        .join('')}
                    </ul>
                  </div>
                `;

    // Append the special offer to the container
    specialOffersContainer.appendChild(specialOffer);
   });
  }

  // Function to load JSON data from the specified URL
  function loadJSONData(url, callback) {
   fetch(url)
    .then(response => response.json())
    .then(data => callback(data))
    .catch(error => console.error('Error loading JSON data:', error));
  }

  // Get the user's preferred language from the HTML lang attribute
  const userLanguage = document.documentElement.lang;

  // Example: Display the user's preferred language in the console
  console.log(`User's Preferred Language: ${userLanguage}`);
  // Load the JSON data and render the special offers
  loadJSONData(url, function(data) {
   try {
    const offersData = data[userLanguage] || data['fr']; // Use the preferred language or default to English
    renderSpecialOffers(offersData.offers);
   } catch (error) {
    document.getElementById("offer-head").remove();
    // You can provide a fallback behavior or display an error message to the user here.
   }
  });
  </script>
 </section>
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