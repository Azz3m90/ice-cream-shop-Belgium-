<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
	header('location: user-login.php');
	exit;
}
?>
<?php
    include 'header.php';
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
   <img src=".././assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 75px;" width="88">
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
 <style>
 *,
 *::before,
 *::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
 }

 :root {

  --success: #12c99b;
  --error: #e41749;
 }



 .alert {
  min-height: 67px;
  width: 200px;
  max-width: 90%;
  border-radius: 12px;
  padding: 16px 22px 17px 20px;
  display: flex;
  align-items: center;
 }

 .alert-warning {
  background: var(--warning);
 }

 .alert-success {
  background: var(--success);
 }

 .alert-error {
  background: var(--error);
 }

 .alert .icon__wrapper {
  height: 34px;
  width: 34px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.253);
  display: flex;
  align-items: center;
  justify-content: center;
 }

 .alert .icon__wrapper span {
  font-size: 21px;
  color: #fff;
 }

 .alert p {
  color: #fff;
  font-family: Verdana;
  margin-left: 10px;
 }

 .alert p a,
 .alert p a:visited,
 .alert p a:active {
  color: #fff;
 }

 .alert .open {
  margin-left: auto;
  margin-right: 5px;
 }

 .alert .close,
 .alert .open {
  color: #fff;
  transition: transform 0.5s;
  font-size: 18px;
  cursor: pointer;
 }

 .alert .close:hover,
 .alert .open:hover {
  transform: scale(1.3);
 }

 /* ... original CSS code ... */

 .alert {
  position: fixed;
  z-index: 999999;
  bottom: 20px;
  right: -100%;
  /* Initially hidden off-screen */
  transition: all 0.5s ease-in-out;
 }

 .alert.show {
  right: 0;
  /* Slide in from the right */
 }
 </style>
 <div id="alert-message-success">
  <div class="alert alert-success" id="alert-success">
   <div class="icon__wrapper">
    <span class="fa fa-check"></span>
   </div>
   <p>completed successfully</p>
  </div>
 </div>
 <button id="dangerButton" hidden>Show Danger Message</button>
 <button id="successButton" hidden>Show Success Message</button>
 <div class="alert alert-error" id="alert-error">
  <div class="icon__wrapper">
   <span class="fa fa-close"></span>
  </div>
  <p>Something went wrong.</p>
 </div>
 <style>
 /* CSS for Confirmation Modal */
 #confirmationModal {
  display: none;
  position: fixed;
  z-index: 2;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.7);
 }

 .confirmation-buttons {
  text-align: center;
  margin-top: 20px;
 }

 .cmodal-content {
  background-color: #fff;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  border-radius: 5px;
  max-width: 400px;
  text-align: center;
  position: relative;
 }

 #confirmDeleteButton,
 #cancelDeleteButton {
  padding: 10px 20px;
  margin: 0 10px;
  cursor: pointer;
  border: none;
  border-radius: 5px;
 }

 #confirmDeleteButton {
  background-color: #dc3545;
  color: #fff;
 }

 .confirmation-buttons button {
  cursor: pointer;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin: 0 10px;
  color: #fff;
 }

 .confirmation-buttons button:focus {
  outline: none;
 }

 /* Close button (X) */
 .cmodal-content h2 {
  position: absolute;
  top: 10px;
  left: 20px;
  cursor: pointer;
  font-size: 24px;
  color: #000;
 }
 </style>
 <!-- HTML for the Confirmation Modal -->
 <div id="confirmationModal" class="modal">
  <div class="cmodal-content">
   <h2 class="lead text-muted mb-0">Delete Offer</h2>

   <div class="confirmation-buttons">
    <p class="lead text-muted mb-0">Are you sure you want to delete this offer?</p><br>
    <button id="confirmDeleteButton" class="btn btn-submit btn-danger"><span class="description">Delete</span></button>
    <button id="cancelDeleteButton" class="btn btn-submit  btn-primary"><span class="description">Cancel</span></button>
   </div>
  </div>
 </div>

 <!-- Section -->
 <section class="section section-lg bg-dark">
  <!-- Section - Offers -->
  <div class="container">
   <h1 class="text-center text-light mb-6">Offre spéciale</h1>
   <style>
   .offer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
   }

   .offer-card {
    width: 30%;
    /* Set a fixed width for all offer cards */
    min-width: 300px;
    /* Ensure a minimum width for offer cards */
    margin: 10px;
    border: 1px solid rgb(20, 12, 12);
    padding: 10px;
    background-color: #f5f5f5;
    display: flex;
    flex-direction: column;
    position: relative;
   }

   .offer-image {
    max-width: 100%;
    height: 200px;
   }

   .language-indicator {
    align-self: flex-end;
    padding: 5px;
    border-radius: 5px;
   }

   .language-indicator.en {
    background-color: blue;
    color: white;
   }

   .language-indicator.fr {
    background-color: red;
    color: white;
   }

   .language-indicator.nl {
    background-color: green;
    color: white;
   }


   .edit-delete-container {
    display: inline-block;
    justify-content: space-between;
    /* Align buttons to the right */
    position: absolute;
    bottom: 10px;
    right: 10px;
   }

   .delete-button {
    margin-left: 5px;
   }

   /* Custom CSS for hover color and font change */
   .edit-button,
   .delete-button {
    transition: background-color 0.3s, color 0.3s;
    /* Add a smooth transition for color change */
    font-weight: bold;
    /* Change the font weight on hover */
   }

   .edit-button:hover {

    color: #fff;
    /* Change text color on hover to white */
   }

   .delete-button:hover {
    background-color: red;
    /* Change background color on hover (blue as an example) */
    color: #fff;
    /* Change text color on hover to white */
   }

   .offer-content {
    text-align: center;
   }

   .offer-title {
    font-size: 1.5em;
   }

   .offer-description {
    font-size: 1.2em;
   }

   .offer-details {
    list-style-type: none;
    padding: 0;
   }

   .offer-details li {
    margin: 5px 0;
   }

   .offer-details .false {
    color: red;
    /* Apply red color to "false" details */
   }

   @media screen and (max-width: 768px) {
    .offer-card {
     width: 100%;
     /* Full width for offer cards on smaller screens */
     height: auto;
     /* Allow content to determine height */
    }
   }

   /* Styles for the modal */
   .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 999;
    display: flex;
    align-items: center;
    justify-content: center;
   }

   .modal-dialog {
    background-color: white;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    max-width: 90%;
    /* Set a maximum width for the modal dialog */
   }

   .modal-header {
    padding: 10px;
    display: flex;
    justify-content: space-between;
    background-color: #f5f5f5;
   }

   .close {
    cursor: pointer;
    color: #000;
    font-size: 20px;
   }

   .modal-body {
    padding: 20px;
    max-height: 600px;
    /* Set a maximum height for the modal body */
    overflow-y: auto;
    /* Enable vertical scrolling when the content exceeds the maximum height */
   }

   .detail-row {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
   }

   /* CSS for the image thumbnail */
   #image-thumbnail {
    width: 150px;
    /* Set the width of the thumbnail */
    height: auto;
    /* Maintain aspect ratio by adjusting height automatically */
    border: 1px solid #ccc;
    /* Add a border around the thumbnail */
    border-radius: 5px;
    /* Apply a border radius for rounded corners */
    margin-top: 10px;
    /* Add some margin to separate it from other elements */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    /* Add a subtle box shadow for a raised effect */
   }

   #addNewDetailButton:hover {
    color: #090909;
   }

   .detail-rowA {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
   }

   #addNewDetailButtonA:hover {
    color: #090909;
   }

   /* CSS for the image thumbnail */
   #image-thumbnailA {
    width: 150px;
    /* Set the width of the thumbnail */
    height: auto;
    /* Maintain aspect ratio by adjusting height automatically */
    border: 1px solid #ccc;
    /* Add a border around the thumbnail */
    border-radius: 5px;
    /* Apply a border radius for rounded corners */
    margin-top: 10px;
    /* Add some margin to separate it from other elements */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    /* Add a subtle box shadow for a raised effect */
   }

   /* Responsive styles for mobile view */
   @media (max-width: 768px) {
    .modal-dialog {
     max-width: 100%;
     /* Adjust the maximum width for smaller screens */
    }

    .modal-body {
     max-height: none;
     /* Remove the maximum height for better mobile scrolling */
     height: 400px;
    }
   }

   /* Style the plus button */
   .plus-button {
    background-color: green;
    color: white;
    font-size: 24px;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    position: fixed;
    bottom: 50px;
    right: 0px;
    width: 50px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    transition: background-color 0.3s;
   }

   .plus-button:hover {
    background-color: green;
   }

   /* The modal (hidden by default) */
   .modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
   }
   </style>

   <div class="container mt-5">
    <div class="offer-container" id="offer-container">
     <!-- Offers will be dynamically added here using JavaScript -->
    </div>
    <!-- Edit Offer Form Modal -->
    <div id="editOfferModal" class="modal">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h2>Edit Offer</h2>
        <button class="close" onclick="closeEditModal()">X</button>
       </div>
       <div class="modal-body">
        <form id="edit-offer-form" enctype="multipart/form-data">
         <input type="hidden" id="offer-id" name="id">
         <input type="hidden" id="selected-language" name="selected-language">
         <div class="form-row">
          <div class="form-group col-md-6">
           <label for="language">Language:</label>
           <select id="language" name="language" class="form-control" disabled>
            <option value="nl">Dutch (nl)</option>
            <option value="en">English (en)</option>
            <option value="fr">French (fr)</option>
           </select>
          </div>
          <div class="form-group col-md-6">
           <label for="title">Title:</label>
           <input type="text" id="title" name="title" class="form-control" required>
          </div>
         </div>
         <div class="form-row">
          <div class="form-group col-md-6">
           <label for="description">Description:</label>
           <textarea id="description" name="description" class="form-control" required></textarea>
          </div>
          <div class="form-group col-md-6">
           <label for="image">Upload Image:</label>
           <div class="row d-flex">
            <div class="col-8">
             <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>
            <div class="col-4">
             <img id="image-thumbnail" src="../assets/img/offers/11.jpeg" alt="Image Thumbnail" class="img-thumbnail">
            </div>
           </div>
          </div>
         </div>
         <div class="form-group">
          <label for="details">Details:</label>
          <div id="details" class="form-check">
           <!-- JavaScript code to generate checkboxes, input text, and add/delete options -->
          </div>
          <button type="button" id="addNewDetailButton" class="btn btn-sm btn-submit btn-success">
           <span class="description">
            Add New Detail
           </span>
          </button>
         </div>
         <!-- Add more fields based on your JSON structure -->
         <button type="submit" name="submit" id="submit" class="btn btn-secondary btn-block btn-lg btn-submit">
          <span class="description">Save</span>
          <span class="success">
           <svg x="0px" y="0px" viewBox="0 0 32 32">
            <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2"
             stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
           </svg>
          </span>
          <span class="error">Retry...</span>
         </button>
        </form>

       </div>
      </div>
     </div>
    </div>
    <!-- Add new Offer Form Modal -->
    <div id="editOfferModalA" class="modal">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h2>Add an Offer</h2>
        <button class="close" onclick="closeEditModal()">X</button>
       </div>
       <div class="modal-body">
        <form id="edit-offer-formA" enctype="multipart/form-data">
         <input type="hidden" id="offer-idA" name="idA">
         <div class="form-row">
          <div class="form-group col-md-6">
           <label for="languageA">Language:</label>
           <select id="languageA" name="languageA" class="form-control">
            <option value="nl">Dutch (nl)</option>
            <option value="en">English (en)</option>
            <option value="fr" selected>French (fr)</option>
           </select>
          </div>
          <div class="form-group col-md-6">
           <label for="titleA">Title:</label>
           <input type="text" id="titleA" name="titleA" class="form-control" required>
          </div>
         </div>
         <div class="form-row">
          <div class="form-group col-md-6">
           <label for="descriptionA">Description:</label>
           <textarea id="descriptionA" name="descriptionA" class="form-control" required></textarea>
          </div>
          <div class="form-group col-md-6">
           <label for="image">Upload Image:</label>
           <div class="row d-flex">
            <div class="col-8">
             <input type="file" id="imageA" name="imageA" class="form-control" accept="image/*" required>
            </div>
            <div class="col-4">
             <img id="image-thumbnailA" src="../assets/img/offers/11.jpeg" alt="Image Thumbnail" class="img-thumbnail">
            </div>
           </div>
          </div>
         </div>
         <div class="form-group">
          <label for="detailsA">Details:</label>
          <div id="detailsA" class="form-check">
           <!-- JavaScript code to generate checkboxes, input text, and add/delete options -->
          </div>
          <button type="button" id="addNewDetailButtonA" class="btn btn-sm btn-submit btn-success">
           <span class="description">
            Add New Detail
           </span>
          </button>
         </div>
         <!-- Add more fields based on your JSON structure -->
         <button type="submit" name="submitA" id="submitA" class="btn btn-secondary btn-block btn-lg btn-submit">
          <span class="description">Add an offer</span>
          <span class="success">
           <svg x="0px" y="0px" viewBox="0 0 32 32">
            <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2"
             stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
           </svg>
          </span>
          <span class="error">Retry...</span>
         </button>
        </form>

       </div>
      </div>
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
     <a href="../index.php">
      <img src="../assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88"
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
<!-- Content / End -->
<!-- Panel Mobile -->
<nav id="panel-mobile">
 <div class="module module-logo bg-dark dark">
  <a href="#">
   <img src="../assets/img/matthiasandsea.jpg" alt="matthiasandsea" style="width: 200px;height: 100px;" width="88">
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
 <!-- Pied de page -->
 <script src="../admin/dist/js/offers/offers-admin.js"></script>
 <?php
    include 'footer.php';
?>