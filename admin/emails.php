<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
	header('location: user-login.php');
	exit;
}
?>
<?php
    include './header.php';
?>
<!--language selector-->
<div class="dropdown col-md-2 right mt-5">
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
 </ul>
 <a class="ml-2" href="../admin/php/login/logout.php"><strong>Logout</strong></a>
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
  <a href=".././index.php">
   <img src=".././assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 75px;" width="88">
  </a>
 </div>
 <!-- Cart -->
 <!--
        <a href="#" class="module module-cart" data-toggle="panel-cart"><i class="ti ti-shopping-cart"></i><span class="notification">0</span></a>
      -->
</header>
<!-- Header / End -->
<!-- Content -->
<di id="content">
 <!-- Page Title -->
 <div class="page-title border-top dark bg-dark">
  <div class="container">
   <div class="row">
    <div class="col-lg-7 offset-lg-4">
     <h1 class="mb-0">Ads Manager</h1>


    </div>
   </div>
  </div>
 </div>
 <link rel="stylesheet" href="./Ads_manager/project/css/index.css">
 <script src="./Ads_manager/project/js/jquery.min.js"></script>
 <script src="./Ads_manager/project/js/jquery-ui.min.js"></script>
 <script src="./Ads_manager/project/js/prepareUpload.js"></script>
 <script src="./Ads_manager/project/js/wysiwyg.js"></script>

 <?php
if (isset($_GET['message'])) {
    echo '<p style="color: red;">' . htmlspecialchars($_GET['message']) . '</p>';
}
 ?>
 <?php
    include './Ads_manager/project/index.php';
?>




 <!-- Pied de page -->
 <footer id="footer" class="bg-dark dark">

  <div class="container">
   <!-- Première rangée du pied de page -->
   <div class="footer-first-row row">
    <div class="col-lg-3 text-center">
     <a href="../index.php">
      <img src="../assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88"
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
include 'table-nl.php';
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
  <a href="../paiement.php" class="panel-cart-action btn btn-secondary btn-block btn-lg">
   <span>Passer à la caisse</span>
  </a>
 </div>
 <!-- Panneau Mobile -->
 <nav id="panel-mobile">
  <div class="module module-logo bg-dark dark">
   <a href="#">
    <img src="../assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88">
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

   </ul>
   <a class="ml-2" href="../admin/php/login/logout.php"><strong>Logout</strong></a>
  </div>

  </div>

  <?php
    include './footer.php';
?>