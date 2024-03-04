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
   <img src="assets/img/gelatonaturale.svg" alt="matthiasandsea" style="width: 200px;height: 75px;" width="88">
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
       <h4 class="text-muted">New product!</h4>
       <h1>Caviar</h1>
      </div>
      <div class="content-inner">
       <h3>Pasta Maker's Corner</h3>
       <h5 class="text-muted mb-5">Handmade Black Truffle Ravioli!</h5>
      </div>
      <div class="content-inner">
       <h1>Delicious</h1>
       <h5 class="text-muted mb-5">HEAT SIDE TO START!</h5>
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
    <!--             <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div> -->
    <h1>The Best Seafood in Tarcienne!</h1>
    <p class="lead text-muted mb-5">Experience the ocean's delights at <strong>MATTHIAS AND SEA</strong>, nestled in the
     charming town of Tarcienne. Our restaurant is a hidden gem, offering a unique seafood dining experience that's sure
     to captivate your taste buds. </p>
   </div>
  </div>
 </section>
 <!-- Section - Menu -->
 <section class="section pb-0 protrude" hidden>
  <div class="container">
   <h1 class="mb-6">Our menu</h1>
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
            <a href="menu-grid-navigation-en.php#${category.categoryName.replace(/\s+/g, '')}">
              <img src="./assets/img/bg.png" alt="${category.categoryName}" class="image">
              <h5 class="title">${category.categoryName}</h5>
            </a>
          `;

    // Append the category to the container
    menuCarouselContainer.appendChild(categoryElement);


   });
  }

  // Define the URL for the JSON data file
  const jsonUrl = './admin/php/dishes/load-dishes-en.php';

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
  // Load the JSON data using Axios
  axios.get(jsonUrl)
   .then(response => {
    const menuData = response.data.menu || []; // Use the menu data or default to an empty array
    //console.log(response.data.menu)
    renderMenu(menuData);
    // Scroll to the specified section after the page is fully loaded
    // Scroll to the specified section after the menu items are rendered
    const hash = window.location.hash;
    if (hash) {
     const targetElement = document.querySelector(hash);
     if (targetElement) {
      targetElement.scrollIntoView({
       behavior: 'smooth'
      });
     }
    }
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
   <h1 id="offer-head" class="text-center mb-6">Special offers</h1>
   <div class="carousel" data-slick='{"dots": true}' id="specialOffers">
    <!-- Here the injected special offer elements will be added -->
   </div>
  </div>
  <script>
  // Define the URL for the JSON data file
  const url = './admin/php/offers/load_offers.php';

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
                  <img src="${absoluteUrl}" alt="" class="special-offer-image">
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
     <!--<h2 class="mb-3">Check our promo video!</h2>-->
     <h2 class="mb-3">
      <a href="book-a-table-en.php">Book a table even right now
       <!--or make an online order-->!
      </a>
     </h2>
    </div>
   </div>
  </div>
 </section>
 <!-- Footer -->
 <footer id="footer" class="bg-dark dark">
  <div class="container">
   <!-- Footer 1st Row -->
   <div class="footer-first-row row">
    <div class="col-lg-3 text-center">
     <a href="index-en.php">
      <img src="assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 200px;" width="88"
       class="mt-5 mb-5">
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
        <td class="content"><a href="tel:+071218620" target="_blank">071 21 86 20</a></td>
       </tr>
       <tr>
        <td class="title">Email:</td>
        <td class="content"><a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a></td>
       </tr>
      </tbody>
     </table>

     <h5 class="text-muted mb-3 mt-4">Social Media</h5>
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
<!-- Panel Cart -->
<div id="panel-cart">
 <div class="panel-cart-container">
  <div class="panel-cart-title">
   <h5 class="title">Your Cart</h5>
   <button class="close" data-toggle="panel-cart">
    <i class="ti ti-close"></i>
   </button>
  </div>
  <div class="panel-cart-content cart-details">
   <table class="cart-table">
    <tr>
     <td class="title">
      <span class="name">
       <a href="#product-modal" data-toggle="modal">Beef Burger</a>
      </span>
      <span class="caption text-muted">Large (500g)</span>
     </td>
     <td class="price">$9.00</td>
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
       <a href="#product-modal" data-toggle="modal">Extra Burger</a>
      </span>
      <span class="caption text-muted">Small (200g)</span>
     </td>
     <td class="price text-success">$9.00</td>
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
     <div class="col-7 text-right text-muted">Order total:</div>
     <div class="col-5">
      <strong>$ <span class="cart-products-total">0.00</span>
      </strong>
     </div>
    </div>
    <div class="row">
     <div class="col-7 text-right text-muted">Devliery:</div>
     <div class="col-5">
      <strong>$ <span class="cart-delivery">0.00</span>
      </strong>
     </div>
    </div>
    <hr class="hr-sm">
    <div class="row text-lg">
     <div class="col-7 text-right text-muted">Total:</div>
     <div class="col-5">
      <strong>$ <span class="cart-total">0.00</span>
      </strong>
     </div>
    </div>
   </div>
   <div class="cart-empty">
    <i class="ti ti-shopping-cart"></i>
    <p>Your cart is empty...</p>
   </div>
  </div>
 </div>
 <a href="checkout-en.php" class="panel-cart-action btn btn-secondary btn-block btn-lg">
  <span>Go to checkout</span>
 </a>
</div>
<!-- Panel Mobile -->
<nav id="panel-mobile">
 <div class="module module-logo bg-dark dark">
  <a href="index-en.php">
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