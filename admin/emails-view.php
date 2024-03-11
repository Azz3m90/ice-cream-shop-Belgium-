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
     <h1 class="mb-0">Ads Manager </h1>
     <h3 class="text-muted mb-0"><sub>(views)</sub></h3>

    </div>
   </div>
  </div>
 </div>


 <link rel="stylesheet" href="./Ads_manager/project/css/index.css">
 <script src="./Ads_manager/project/js/jquery.min.js"></script>
 <script src="./Ads_manager/project/js/jquery-ui.min.js"></script>
 <script src="./Ads_manager/project/js/prepareUpload.js"></script>
 <script src="./Ads_manager/project/js/wysiwyg.js"></script>
 <?php include './Ads_manager/project/view.php';
 ?>
 <!-- Modal for sending emails -->
 <div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="sendEmailModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="sendEmailModalLabel">Send Email Options</h5>
     <button type="button" class="close" data-dismiss="modal" onclick="closeSendEmailModal();" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="modal-body">
     <!-- Add your email options here -->
     <p>Choose email sending options:</p>
     <div class="form-check">
      <input class="form-check-input" type="radio" name="emailOptions" id="sendToAll" value="all" checked>
      <label class="form-check-label" for="sendToAll">
       Send to all emails
      </label>
     </div>
     <div class="form-check">
      <input class="form-check-input" type="radio" name="emailOptions" id="sendBetweenDates" value="betweenDates">
      <label class="form-check-label" for="sendBetweenDates">
       Send to all emails between two dates
      </label>
     </div>
     <!-- Add more options as needed -->

     <!-- Add form fields for date range if applicable -->
     <div class="form-group mt-3 startDate">
      <label for="startDate">Start Date:</label>
      <input type="date" class="form-control" id="startDate" name="startDate">
     </div>
     <div class="form-group endDate">
      <label for="endDate">End Date:</label>
      <input type="date" class="form-control" id="endDate" name="endDate">
     </div>
    </div>
    <div class="modal-footer">
     <input type="text" name="adsId2send" id="adsId2send" hidden />
     <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeSendEmailModal();"><span
       class="description">
       Close</span></button>
     <button type="button" class="btn btn-primary" id="sendAdsEmailBtn"><span class="description">
       Send Emails</span></button>
    </div>
   </div>
  </div>
 </div>
 <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
  aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"
      onclick="closeDeleteConfirmationModal();">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="modal-body">
     <p>Are you sure you want to delete this ad?</p>
    </div>
    <div class="modal-footer">
     <input type="text" name="adsId" id="adsId" hidden />
     <button type="button" class="btn btn-secondary" data-dismiss="modal"
      onclick="closeDeleteConfirmationModal();"><span class="description">Close</span> </button>
     <button type="button" class="btn btn-danger" onclick="confirmDelete()"><span
       class="description">Delete</span></button>
    </div>
   </div>
  </div>
 </div>
 <!-- Modal -->
 <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="emailModalLabel">Emails Sent</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="modal-body">

     <h1 id="emailStatusMessage" class="font-weight-bold mb-3"></h1>

     <ul id="emailDetailsList" class="list-group">
      <!-- Email details will be dynamically added here -->
     </ul>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="description">Close</span>
     </button>
    </div>
   </div>
  </div>
 </div>
 <button type="button" id="btnEmailCount" class="btn btn-primary" data-toggle="modal" data-target="#emailModal" hidden>
  <span class="description">Open Modal</span>
 </button>
 <script>
 // Add logic to handle the selected email sending option
 // You can use JavaScript or make an AJAX request to the server
 // Function to handle the click event on the "Send Emails" button
 $(document).ready(function() {
  // Initially hide the date fields
  $(".startDate, .endDate").hide();
  //$('#btnEmailCount').trigger('click');
  // Add change event listener to the radio buttons
  $('input[name="emailOptions"]').change(function() {
   // If "Send between two dates" is selected, show the date fields; otherwise, hide them
   if ($(this).val() === "betweenDates") {
    $(".startDate, .endDate").show();
   } else {
    $(".startDate, .endDate").hide();
   }
  });


  // Add input event listener to the start date field
  $('#startDate').on('input', function() {
   // Set the minimum date for the end date field
   $('#endDate').prop('min', $(this).val());
   // Validate that the end date is greater than the start date
   validateDates();
  });

  // Add input event listener to the end date field
  $('#endDate').on('input', function() {
   // Validate that the end date is greater than the start date
   validateDates();

  });



  function validateDates() {
   var startDate = $('#startDate').val();
   var endDate = $('#endDate').val();

   // Check if both start and end dates are set
   if (startDate && endDate) {
    // Compare dates and show an alert if end date is not greater than or equal to the start date
    if (startDate > endDate) {
     alert("End date must be greater than or equal to the start date.");
     // Clear the end date field
     $('#endDate').val('');
    }

   }
  }
 });

 $('#sendAdsEmailBtn').on('click', function() {
  // Get the selected email sending option
  var emailOption = $('input[name="emailOptions"]:checked').val();

  // Get the selected start and end dates
  var startDate = $('#startDate').val();
  var endDate = $('#endDate').val();

  // Get the adsId from the hidden input field
  var adsIdToSend = $('#adsId2send').val();

  // Perform different actions based on the selected email sending option
  if (emailOption === 'all') {

   sendEmailsToAll(adsIdToSend);
  } else if (emailOption === 'betweenDates') {
   sendEmailsBetweenDates(adsIdToSend, startDate, endDate);
  }

  // Close the modal
  closeSendEmailModal();
 });

 // Function to send emails to all recipients
 function sendEmailsToAll(adsId) {
  $("#loader").show();
  // Make an AJAX request to send emails to all recipients
  $.ajax({
   type: 'POST',
   url: 'Ads_manager/project/send_emails.php', // Replace with the actual path to your PHP script
   data: {
    emailOption: 'all',
    adsId: adsId
   },
   success: function(response) {
    console.log(response);
    $("#loader").hide();
    handleEmailResponse(response);
    // Handle success, e.g., show a success message
   },
   error: function(error) {
    console.error('Error:', error);
    // Handle errors if needed
   }
  });
 }

 // Function to send emails between two dates
 function sendEmailsBetweenDates(adsId, startDate, endDate) {
  // Make an AJAX request to send emails between two dates
  $("#loader").show();
  $.ajax({
   type: 'POST',
   url: 'Ads_manager/project/send_emails.php', // Replace with the actual path to your PHP script
   data: {
    emailOption: 'betweenDates',
    adsId: adsId,
    startDate: startDate,
    endDate: endDate
   },
   success: function(response) {
    console.log(response);
    $("#loader").hide();
    handleEmailResponse(response);
    // Handle success, e.g., show a success message
   },
   error: function(error) {
    console.error('Error:', error);
    // Handle errors if needed
   }
  });
 }
 // Function to handle the email response and show a modal
 function handleEmailResponse(jsonResponse) {
  // Parse the JSON string
  var response = JSON.parse(jsonResponse);
  //console.log(response.message);
  if (response.success) {
   // Display a modal with the email count and details
   $('#btnEmailCount').click();

   // Display the success message
   var emailStatusMessage = document.getElementById("emailStatusMessage");
   emailStatusMessage.innerHTML = 'Number of Emails: ' + response.message;

   // Display details of each email
   var emailDetails = document.getElementById("emailDetailsList");
   var i = 0;
   if (response.emails.length > 0) {
    emailDetails.innerHTML = '<h4>Email Details:</h4>';
    response.emails.forEach(function(email) {
     i = i + 1;
     emailDetails.innerHTML += '<li class="font-weight-bold mb-3">Email( ' + i + ' ): ' + email.email + '</li>';
    });
    i = 0;
   } else {
    emailDetails.innerHTML = '<p>No email details available.</p>';
   }
  } else {
   // Handle the case where the response indicates an error
   // You can show an error message or take other actions as needed
   // Display the success message
   var emailStatusMessage = document.getElementById("emailStatusMessage");
   emailStatusMessage.innerHTML = '<p> There is an error.</p>';
  }
 }
 // Function to close the send email modal
 function closeSendEmailModal() {
  $('#sendEmailModal').modal('hide');
 }


 function deleteAd(adId) {
  // Add logic to delete the ad with the given ID
  // You can use AJAX to send a request to the server for deletion
  openDeleteConfirmationModal();
  $('#adsId').val(adId);
  console.log('Deleting ad with ID: ' + adId);
 }

 function sendEmail(adId) {
  // Add logic to send email for the ad with the given ID
  // You can open the modal or perform any other actions
  openSendEmailModal(adId);
  $('#startDate').val();
  $('#endDate').val();
  $('#adsId2send').val(adId);
  console.log('Sending email for ad with ID: ' + adId);
 }

 function openSendEmailModal(adId) {
  $('#sendEmailModal').modal('show');

 }

 function closeSendEmailModal() {
  $('#sendEmailModal').modal('hide');
 }

 function openDeleteConfirmationModal() {
  $('#deleteConfirmationModal').modal('show');
 }

 function closeDeleteConfirmationModal() {
  $('#deleteConfirmationModal').modal('hide');
 }

 function confirmDelete() {
  // Add logic for confirming and handling deletion
  $('#deleteConfirmationModal').modal('hide');
  // Additional logic to submit the form or perform AJAX deletion
  // document.getElementById('emailForm').submit();
  // Retrieve the adId from the input field
  var adIdToDelete = $('#deleteConfirmationModal').find('#adsId').val();
  console.log(adIdToDelete);
  // Close the delete confirmation modal
  $('#deleteConfirmationModal').modal('hide');
  $("#loader").show();
  // Make an AJAX request to delete the ad
  $.ajax({
   type: "POST",
   url: "Ads_manager/project/delete_ad.php", // Replace with the actual path to your delete_ad.php file
   data: {
    adId: adIdToDelete
   },
   success: function(response) {
    console.log(response);
    $("#loader").hide();

    // Handle the response from the server, e.g., display a success message

    // Optionally, you can reload the page or update the ad list after successful deletion
    window.location.reload();
   },
   error: function(error) {
    console.error("Error:", error);

    // Handle errors if needed
   }
  });
 }
 </script>

 <footer id="footer" class="bg-dark dark">
  <div class="container">

   <div class="footer-first-row row">
    <div class="col-lg-3 text-center"><a href="../index.php"><img src="../assets/img/gelatonaturale.svg"
       alt="gelatonaturale" style="width: 200px;height: 100px;" width="88" class="mt-5 mb-5"></a></div>
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