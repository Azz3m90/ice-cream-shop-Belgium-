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
   <img src="../assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 75px;" width="88">
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
 <!-- Section -->
 <section class="section section-lg bg-dark">
  <!-- Vidéo de fond -->
  <!-- Vidéo de fond -->
  <div class="bg-video dark-overlay" data-src="../assets/vid/seafood.mp4" data-type="video/mp4"></div>
  <div class="container">
   <div class="row justify-content-center">
    <div class="col-lg-6">
     <!-- Réserver une table -->
     <div class="utility-box">
      <div class="utility-box-title bg-dark dark">
       <div class="bg-image">
        <img src="./assets/img/dropdown-about/dropdown-about.jpg" alt="">
       </div>
       <div>
        <span class="icon icon-primary">
         <i class="ti ti-bookmark-alt"></i>
        </span>
        <h4 class="mb-0">Connexion administrateur</h4>
        <p class="lead text-muted mb-0">Veuillez vous connecter à votre compte administrateur.</p>
       </div>
      </div>
      <div class="utility-box-content">
       <h2>Connexion</h2>
       <form action="./php/login/login.php" id="booking-form" class="booking-form" type="POST" data-validate>
        <div class="form-group">
         <label>Nom d'utilisateur :</label>
         <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
         <label>Mot de passe :</label>
         <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button id="submit" class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="button"
         onclick="login()">
         <span class="description">Se connecter</span>
         <span class="success">
          <svg x="0px" y="0px" viewBox="0 0 32 32">
           <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2"
            stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
          </svg>
         </span>
         <span class="error">Mot de passe ou nom d'utilisateur invalide</span>
        </button>
        <div id="response-message"></div>
       </form>


       <script src="./dist/js/menu/axios.min.js"></script>
       <script>
       function login() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var formData = new FormData();
        formData.append('login', true);
        formData.append('username', username);
        formData.append('password', password);

        axios.post('./php/login/login.php', formData)
         .then(function(response) {
          var responseData = response.data;
          var messageContainer = document.getElementById('response-message');

          if (responseData.status === 'success') {

           const submitButton = document.getElementById('submit');
           //submitButton.querySelector('.description').style.display = 'none';
           submitButton.querySelector('.success').style.display = 'block';
           submitButton.querySelector('.error').style.display = 'none';

           messageContainer.innerHTML = 'Login successful. Redirecting...';

           // Redirect to the specified page after a short delay
           setTimeout(function() {
            window.location.href = responseData.redirect;
           }, 2000);
          } else {
           // Check if responseData.message is defined before accessing it
           var errorMessage = responseData.message || 'An unknown error occurred.';
           messageContainer.innerHTML = 'Error: ' + errorMessage;
          }
         })
         .catch(function(error) {
          console.error('Error:', error);
         });
       }
       </script>
      </div>
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
      <img src="../assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88"
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
<!-- Content / End -->
<!-- Panel Mobile -->
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
 </div>
 <?php
    include './footer.php';
?>
