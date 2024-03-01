<!DOCTYPE html>
<html lang="en">

<head>
 <!-- Meta -->
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
 <meta http-equiv="Pragma" content="no-cache" />
 <meta http-equiv="Expires" content="0" />

 <!-- Title -->
 <title>MATTHIAS AND SEA</title>
 <!-- Favicons -->
 <link rel="shortcut icon" href="./assets/img/svg/matthias-and-sea.svg">
 <!--<link rel="apple-touch-icon" href="./assets/img/favicon_60x60.png"><link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon_76x76.png"><link rel="apple-touch-icon" sizes="120x120" href="./assets/img/favicon_120x120.png"><link rel="apple-touch-icon" sizes="152x152" href="./assets/img/favicon_152x152.png">-->
 <!-- Fonts -->
 <!--<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">-->
 <link rel="stylesheet" href="./dist/css/fontsgoogleapiscom_css2_family.css">
 <!--bootstrap 5-->
 <link rel="stylesheet" href="./dist/css/bootstrap/bootstrap.min.css" />
 <!--mdb-->
 <link rel="stylesheet" href="./dist/css/mdb.min.css" />
 <!--fontawesome-->
 <link rel="stylesheet" href="./dist/css/fontawesome/fontawesome.min.css" />
 <!--flags-->
 <link rel="stylesheet" href="./dist/css/flag-icons.min.css" />
 <!-- CSS Core -->
 <link rel="stylesheet" href="./dist/css/core.css" />
 <!-- CSS Theme -->
 <link id="theme" rel="stylesheet" href="./dist/css/theme-blue.css" />
 <!-- Canonical URL to avoid duplicate content issues -->
 <link rel="canonical" href="https://www.matthiasandsea.be/matthias-and-sea/index-en.php">
 <!-- Open Graph meta tags for social media sharing -->
 <meta property="og:title" content="Matthias and Sea - Tarcienne's Finest Seafood Restaurant">
 <meta property="og:description" content="Experience the ocean's bounty at Matthias and Sea in Tarcienne.">
 <meta property="og:image" content="https://www.matthiasandsea.be/matthias-and-sea/./assets/img/matthiasandsea.jpg">
 <meta property="og:url" content="https://www.matthiasandsea.be/matthias-and-sea/index-en.php">
 <meta property="og:type" content="website">
 <script src="././dist/js/menu/axios.min.js"></script>
 <script src="././dist/js/clearCache.js"></script>
 <!-- Structured Data using JSON-LD for better search engine understanding -->
 <script type="application/ld+json">
 {
  "@context": "http://schema.org",
  "@type": "Restaurant",
  "name": "Matthias and Sea",
  "description": "Tarcienne's finest seafood restaurant.",
  "address": {
   "@type": "PostalAddress",
   "streetAddress": "Route de Philippeville 34",
   "addressLocality": "Tarcienne",
   "addressRegion": "Walloon Region",
   "postalCode": "5651",
   "addressCountry": "Belgium"
  },
  "priceRange": "€€",
  "url": "https://www.matthiasandsea.be/matthias-and-sea/index-en.php",
  "image": "https://www.matthiasandsea.be/matthias-and-sea/./assets/img/matthiasandsea.jpg",
  "telephone": "+32-071-21-86-20"
 }
 </script>
 <style>
 #loader {
  display: none;
  position: fixed;
  top: 50;
  left: 50;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.8);
  /* semi-transparent white background */
  z-index: 999;
  /* place it above other elements */
  display: flex;
  align-items: center;
  justify-content: center;
 }
 </style>
</head>

<body>

 <div id="loader" style="display: none;">

  <img src="./assets/spinner/spinner.svg" alt="spinner">
 </div>

 <div id="body-wrapper" class="animsition">
  <!-- Header -->
  <header id="header" class="light">
   <div class="container">
    <div class="row">
     <div class="col-md-3">
      <!-- Logo -->
      <div class="module module-logo dark">
       <a href=".././index-en.php">
        <img src="./assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88">
       </a>
      </div>
     </div>
     <div class="col-md-7">
      <!-- Navigation -->
      <nav class="module module-navigation left mr-4">
       <ul id="nav-main" class="nav nav-main">

        <li>
         <a href="./offers.php">Offres</a>
        </li>
        <li>
         <a href="./gallery.php">Galerie</a>
        </li>
        <li>
         <a href="./dishes_en.php">Plats</a>
        </li>
        <li class="has-dropdown ">
         <a href="#">ِAds Manager</a>
         <div class="dropdown-container">
          <ul class="dropdown-mega">
           <li>
            <a href="./emails.php">Add Ads</a>
           </li>
           <li>
            <a href="./emails-view.php">Ads Viewer</a>
           </li>
          </ul>
          <div class="dropdown-image">
           <img src="./assets/img/dropdown-about/dropdown-about.jpg" alt="">
          </div>
         </div>
        </li>

        <!-- more options -->
        <!--
                            <li class="has-dropdown"><a href="#">More</a><div class="dropdown-container"><ul class="dropdown-mega"><li><a href="page-offer-single-en.php">Offer single</a></li><li><a href="page-product-en.php">Product</a></li><li><a href="book-a-table-en.php">Book a table</a></li><li><a href="checkout-en.php">Checkout</a></li><li><a href="confirmation-en.php">Confirmation</a></li><li><a href="blog-en.php">Blog</a></li><li><a href="blog-sidebar-en.php">Blog + Sidebar</a></li><li><a href="blog-post-en.php">Blog Post</a></li><li><a href="documentation/" target="_blank">Documentation</a></li></ul><div class="dropdown-image"><img src="http://assets.suelo.pl/soup/img/photos/dropdown-more.jpg" alt=""></div></div></li>
                          -->
       </ul>
      </nav>
      <!-- Order -->
      <!--
                    <div class="module left"><a href="menu-list-navigation-en.php" class="btn btn-outline-secondary"><span>Order</span></a></div>
-->
     </div>