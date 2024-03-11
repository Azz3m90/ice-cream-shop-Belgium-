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
     <h1 class="mb-0">Galerie</h1>
     <h4 class="text-muted mb-0">Quelques informations sur notre restaurant</h4>
    </div>
   </div>
  </div>
 </div>

 <style>
 body {
  margin: 0;
  font-family: 'Arial', sans-serif;
 }

 .section-gallery {
  padding: 20px;
 }

 .gallery-cards {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: space-between;
 }

 .gallery-card {
  flex: 0 0 calc(25% - 20px);
  max-width: calc(25% - 20px);
  box-sizing: border-box;
  overflow: hidden;
  border: 1px solid #ddd;
  border-radius: 8px;
  margin-bottom: 20px;
  position: relative;
  transition: transform 0.3s ease-in-out;
 }

 .gallery-card:hover {
  transform: scale(1.05);
 }

 .gallery-card img {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 8px 8px 0 0;
  /* Add rounded corners to the top */
 }


 .delete-button {
  position: absolute;
  top: 20%;
  left: 40%;
  width: 200px;
 }



 /* Media Query for Tablet/Desktop */
 @media screen and (max-width: 1024px) {
  .gallery-card {
   flex: 0 0 calc(33.33% - 20px);
   max-width: calc(33.33% - 20px);
  }
 }

 /* Media Query for Mobile */
 @media screen and (max-width: 768px) {
  .gallery-card {
   flex: 0 0 calc(50% - 20px);
   max-width: calc(50% - 20px);
  }
 }



 #confirmationModal {
  display: none;
  position: fixed;
  z-index: 9999;
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

 .confirmation-buttons button {
  cursor: pointer;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin: 0 10px;
  color: #fff;
  display: inline-flex;
  /* Added to make buttons display inline */
  align-items: center;
  /* Align items vertically in the center */
  justify-content: center;
  /* Align items horizontally in the center */
 }

 .confirmation-buttons button:focus {
  outline: none;
 }

 #confirmDeleteButton {
  background-color: #dc3545;
 }

 #cancelDeleteButton {
  background-color: #007bff;
 }

 #confirmAddDishButton {
  background-color: #35dc9c;
 }
 </style>
 <!-- HTML for the Confirmation Modal -->
 <div id="confirmationModal" class="modal">
  <div class="cmodal-content">
   <h2 class="lead text-muted mb-0">Delete Dish</h2>

   <div class="confirmation-buttons">
    <p class="lead text-muted mb-0">Are you sure you want to delete this Image?</p><br>
    <form id="deletionProccess">
     <input type="text" name="ImageID" id="ImageID" value="-1" hidden>


     <button type="submit" id="confirmDeleteButton" class="btn btn-submit btn-danger"><span
       class="description">Delete</span></button>
     <button id="cancelDeleteButton" class="btn btn-submit  btn-primary"><span
       class="description">Cancel</span></button>
    </form>
   </div>
  </div>
 </div>
 <style>
 /* Styles for the modal */
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

 .modal-dialog {
  background-color: white;
  border: 1px solid #ccc;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  max-width: 90%;
  margin: 50px auto;
  /* Center the modal on the page */
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
  overflow-y: auto;
 }

 /* CSS for the image thumbnail */
 #image-thumbnail {
  width: 150px;
  height: 150px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-top: 10px;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
 }

 /* Responsive styles for mobile view */
 @media (max-width: 768px) {
  .modal-dialog {
   max-width: 100%;
  }

  .modal-body {
   max-height: none;
   height: auto;
  }
 }

 .thumbnail-card {
  width: 100px;
  /* Adjust the width as needed */
  margin: 5px;
 }

 .thumbnail-card img {
  width: 150px;
  height: 150px;
  border-radius: 8px;
 }
 </style>
 <!-- Add Dish Form Modal -->
 <div id="addImageModal" class="modal">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h2>Add Images</h2>
     <button class="close" onclick="closeAddImageModal()">X</button>
    </div>
    <div class="modal-body">
     <form id="add-image-form" enctype="multipart/form-data">

      <!-- Dish Image Upload -->
      <div class="form-group">
       <label class="title lead" for="addImageCategoryimage">Upload Images</label>
       <div class="row">
        <div class="col-md-8">
         <input type="file" id="addImageCategoryimage" name="addImageCategoryimage[]" class="form-control"
          accept="image/*" multiple required>
        </div>

       </div>
       <div class="row">
        <div id="image-preview" class="d-flex flex-wrap"></div>
       </div>
      </div>
      <button type="button" onclick="uploadImages()" class="btn btn-submit btn-lg btn-block btn-success"><span
        class="description">Upload Images</span></button>
     </form>
    </div>
   </div>
  </div>
 </div>



 <script>
 // Function to close the Add Image Modal
 function closeAddImageModal() {
  document.getElementById('addImageModal').style.display = 'none';
 }

 // Function to handle file selection and preview
 document.getElementById('addImageCategoryimage').addEventListener('change', function(event) {
  const previewContainer = document.getElementById('image-preview');
  previewContainer.innerHTML = ''; // Clear previous previews

  const files = event.target.files;
  for (const file of files) {
   const reader = new FileReader();

   reader.onload = function(e) {
    const thumbnailCard = document.createElement('div');
    thumbnailCard.classList.add('thumbnail-card');

    const thumbnail = document.createElement('img');
    thumbnail.src = e.target.result;
    thumbnail.alt = 'Image Thumbnail';

    thumbnailCard.appendChild(thumbnail);
    previewContainer.appendChild(thumbnailCard);
   };

   reader.readAsDataURL(file);
  }
 });

 // Function to upload images to the server using Axios
 function uploadImages() {
  const formData = new FormData(document.getElementById('add-image-form'));
  formData.append('restaurant_id', 1)
  // Send formData using Axios to your PHP script
  axios.post('.././admin/php/gallery/add-image.php', formData)
   .then(response => {
    console.log(response.data);
    showSuccessMessage()
    document.getElementById('successButton').click()

    setTimeout(() => {
     document.getElementById('addImageModal').style.display = "none"
     location.reload();
    }, 1000); // Adjust the delay as needed

    // You can add further actions here, like closing the modal or updating the gallery
   })
   .catch(error => {
    console.error('Error uploading images:', error);
   });
 }
 </script>

 <style>
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
 </style>
 <button class="edit-button plus-button" id="plus-button" title="Add Dishes Categories">+</button>

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

 <script>
 // Replace 'your-json-file.json' with the actual path to your JSON file

 // Fetch JSON data using Axios
 axios.get('.././admin/php/gallery/get-image.php')
  .then(response => {
   console.log(response.data)
   const galleryImages = response.data.galleryImages;

   // Create the gallery carousel and nav elements
   const carouselContainer = document.getElementById('galleryCarousel');
   const navContainer = document.getElementById('galleryNav');

   // Loop through gallery images and create HTML elements
   galleryImages.forEach(image => {
    // Create carousel slide
    const slide = document.createElement('div');
    slide.className = 'slide';
    slide.id = `slide${image.id}`

    const bgParallax = document.createElement('div');
    bgParallax.className = 'bg-parallax';

    const img = document.createElement('img');
    img.src = `${image.path}`;
    img.alt = '';


    bgParallax.appendChild(img);
    slide.appendChild(bgParallax);
    carouselContainer.appendChild(slide);

    const deleteButton = document.createElement('button')

    // Create delete button
    deleteButton.classList.add('btn', 'btn-sm', 'btn-submit', 'btn-danger', 'delete-button')
    const deleteContent = document.createElement('span')
    deleteContent.innerHTML = 'Delete'
    deleteContent.classList.add('description')
    deleteButton.appendChild(deleteContent)
    deleteButton.dataset.imageId = image.id; // Assuming you have data-image-id attribute
    deleteButton.addEventListener('click', () => handleDelete(image.id));

    // Append delete button to slide
    slide.appendChild(deleteButton);

    // Create nav image
    const navImg = document.createElement('img');
    navImg.src = `${image.path}`;
    navImg.alt = '';
    navImg.id = `nav${image.id}`
    navContainer.appendChild(navImg);
   });
   showSuccessMessage()
   document.getElementById('successButton').click()
  })
  .catch(error => {
   console.error('Error fetching JSON data:', error);
  });

 // Function to handle image deletion
 function handleDelete(imageId) {
  // Set the ImageID in the confirmation modal form
  document.getElementById('ImageID').value = imageId;

  // Show the confirmation modal
  document.getElementById('confirmationModal').style.display = 'block';
 }

 // Event listener for the delete button
 document.querySelectorAll('.delete-button').forEach(button => {
  button.addEventListener('click', function() {
   const imageId = this.dataset.imageId; // Assuming you have data-image-id attribute

   // Call the handleDelete function
   handleDelete(imageId);
  });
 });

 // Event listener for the plus button
 document.getElementById('plus-button').addEventListener('click', function() {
  // Show the addDishModal
  document.getElementById('addImageModal').style.display = 'block';
 });
 const cancelDeleteButton = document.getElementById('cancelDeleteButton')
 // Event listener for canceling the dishes categories deletion
 cancelDeleteButton.addEventListener('click', function(event) {
  event.preventDefault()
  document.getElementById('confirmationModal').style.display = 'none';
 })
 // Event listener for the deletion form
 document.getElementById('deletionProccess').addEventListener('submit', function(event) {
  event.preventDefault();

  const imageId = document.getElementById('ImageID').value;
  console.log(imageId)
  const formData = new FormData()
  formData.append('id', imageId)
  formData.append('restaurant_id', 1)

  // Call PHP script to delete image
  axios.post('.././admin/php/gallery/delete-image.php', formData)
   .then(response => {
    // Remove the deleted image from the DOM
    // Remove the deleted image from the DOM after a short delay

    showSuccessMessage()
    document.getElementById('successButton').click()
    //console.log(response.data)
    // Remove the deleted image elements from the DOM after a short delay
    const deletedImageId = response.data.deletedImageId;
    setTimeout(() => {
     // Remove the slide element
     const deletedSlideElement = document.getElementById(`slide${deletedImageId}`);
     if (deletedSlideElement) {
      deletedSlideElement.remove();
      const deletedNavImgElement = document.getElementById(`nav${deletedImageId}`);
      deletedNavImgElement.remove();
     }
     document.getElementById('confirmationModal').style.display = 'none';
     location.reload();
    }, 100); // Adjust the delay as needed

   })
   .catch(error => {
    console.error('Error deleting image:', error);
   });
 });
 document.getElementById('addImageCategoryimage').addEventListener('change', handleFileSelect);

 function handleFileSelect(event) {
  const input = event.target;
  const thumbnailsContainer = document.getElementById('thumbnails-container');
  thumbnailsContainer.innerHTML = ''; // Clear existing thumbnails

  if (input.files && input.files.length > 0) {
   for (const file of input.files) {
    // Display thumbnail
    const reader = new FileReader();
    reader.onload = function(e) {
     const thumbnail = document.createElement('img');
     thumbnail.src = e.target.result;
     thumbnail.alt = 'Image Thumbnail';
     thumbnail.classList.add('img-thumbnail');
     thumbnailsContainer.appendChild(thumbnail);
    };
    reader.readAsDataURL(file);
   }
  }
 }



 function closeEditCategoryModal() {
  var modal = document.getElementById('addImageModal')

  modal.style.display = 'none'

  var modalform = document.getElementById('add-image-form')

  modalform.reset()

  // Remove the modal-open class from the body
  document.body.classList.remove('modal-open')
  // Remove the modal backdrop
  const modalBackdrop = document.querySelector('.modal-backdrop')
  if (modalBackdrop) {
   document.body.removeChild(modalBackdrop)
  }
  // Make the body scrollable
  document.body.style.overflow = 'visible'
 }
 </script>


 <!-- Pied de page -->
 <footer id="footer" class="bg-dark dark">
  <!--alert-->
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
    <p id="successMessage">completed successfully</p>
   </div>
  </div>
  <button id="dangerButton" hidden>Show Danger Message</button>
  <button id="successButton" hidden>Show Success Message</button>
  <div class="alert alert-error" id="alert-error">
   <div class="icon__wrapper">
    <span class="fa fa-close"></span>
   </div>
   <p id="errorMessage">Something went wrong.</p>
  </div>
  <script>
  function showSuccessMessage() {
   const alertMessageContainer = document.getElementById('alert-message-success')
   // Remove the existing alert message if it exists
   if (alertMessageContainer) {
    alertMessageContainer.remove()
   }

   // Create the HTML structure
   const containerDiv = document.createElement('div')
   containerDiv.id = 'alert-message'

   const alertDiv = document.createElement('div')
   alertDiv.classList.add('alert', 'alert-success')
   alertDiv.id = 'alert-success'

   const iconWrapper = document.createElement('div')
   iconWrapper.classList.add('icon__wrapper')

   const iconSpan = document.createElement('span')
   iconSpan.classList.add('fa', 'fa-check')

   const paragraph = document.createElement('p')
   paragraph.textContent = 'completed successfully'

   iconWrapper.appendChild(iconSpan)
   alertDiv.appendChild(iconWrapper)
   alertDiv.appendChild(paragraph)
   containerDiv.appendChild(alertDiv)

   // Append the container div to the document body or any other desired location
   document.body.appendChild(containerDiv)

   // Call the showSuccessMessage function to display the success message
   setTimeout(() => {
    alertDiv.classList.remove('show')
    alertDiv.classList.add('show')

    setTimeout(() => {
     alertDiv.style.transition = 'transform 0.5s ease-in-out'
     alertDiv.style.transform = 'translateX(0)'
     setTimeout(() => {
      alertDiv.style.opacity = 0
      setTimeout(() => {
       alertDiv.classList.remove('show')
       alertDiv.classList.remove('alert')
       alertMessageContainer.remove()
      }, 500)
     }, 500)
    }, 1000)
   }, 100)
  }
  </script>
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