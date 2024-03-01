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
  <li>
   <a class="dropdown-item" href="./dishes_en.php">
    <i class="flag-united-kingdom flag"></i>English
   </a>
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
<div id="content">
 <!-- Page Title -->
 <div class="page-title bg-light">
  <div class="container">
   <div class="row">
    <div class="col-lg-8 offset-lg-4">
     <h1 class="mb-0">Menu Management</h1>
     <h4 class="text-muted mb-0">Information about managing our restaurant's menu</h4>
    </div>
   </div>
  </div>
 </div>
 <!-- Page Content -->
 <style>
 /* CSS for Confirmation Modal */
 /* CSS for Confirmation Modal */
 #confirmationModal,
 #confirmationModalAddition {
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

 #confirmAddCategButton {
  background-color: #35dc9c;
 }

 }

 #cancelAdditionButton {
  background-color: #007bff;
 }
 </style>
 <!-- HTML for the Confirmation Modal -->
 <div id="confirmationModal" class="modal">
  <div class="cmodal-content">
   <h2 class="lead text-muted mb-0">Delete Dish</h2>

   <div class="confirmation-buttons">
    <p class="lead text-muted mb-0">Are you sure you want to delete this item?</p><br>
    <form id="deletionProccess">
     <input type="text" name="DPlateNumber" id="DPlateNumber" value="-1" hidden>
     <input type="text" name="DCategoryId" id="DCategoryId" value="-1" hidden>
     <input type="text" name="categoryName4D" id="categoryName4D" value="undefined" hidden>

     <button type="submit" id="confirmDeleteButton" class="btn btn-submit btn-danger"><span
       class="description">Delete</span></button>
     <button id="cancelDeleteButton" class="btn btn-submit  btn-primary"><span
       class="description">Cancel</span></button>
    </form>
   </div>
  </div>
 </div>
 <div id="confirmationModalAddition" class="modal">
  <div class="cmodal-content">
   <h2 class="lead text-muted mb-0">Add To Menu</h2>
   <div class="confirmation-buttons">
    <p class="lead text-muted mb-0">Select what do you want to Add </p><br>
    <style>
    .add-buttons-container {
     display: flex;
     gap: 10px;
     /* Adjust the spacing between buttons as needed */
    }

    /* Add this class to each button */
    .add-buttons-container button {
     flex: 1;
     /* Distribute available space equally among the buttons */
    }
    </style>

    <div class="add-buttons-container">
     <button id="confirmAddDishButton" class="btn btn-submit btn-success"><span class="description">Add
       Dish</span></button>
     <button id="confirmAddCategButton" class="btn btn-submit btn-success"><span class="description">Add
       Category</span></button>
     <button id="cancelAdditionButton" class="btn btn-submit btn-primary"><span
       class="description">Cancel</span></button>
    </div>
   </div>
  </div>
 </div>


 <style>
 /* Add this CSS to your stylesheet or within a <style> tag in your HTML document */

 .category-buttons {
  position: absolute;
  bottom: 0;
  right: 0;
  margin: 10px;
 }

 .menu-item {
  position: relative;
 }

 .item-buttons {
  position: absolute;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  bottom: 0;
  right: 0;
  margin: 10px;
 }

 .item-buttons button {
  margin-left: 5px;
 }
 </style>
 <div class="page-content">
  <div class="container">
   <div class="row no-gutters">
    <div class="col-md-3">
     <!-- Menu Navigation -->
     <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
      <ul class="nav nav-menu bg-dark dark" id="Category">
       <!-- <li><a href="#caviar">caviar</a></li><li><a href="#Pasta">Pasta</a></li>-->
      </ul>
     </nav>
    </div>
    <div class="col-md-9" id="MenuCategory">
     <!-- Menu Category / caviar -->
     <div id="caviar" class="menu-category">
      <div class="menu-category-title">
       <div class="bg-image">
        <img src="http://assets.suelo.pl/soup/img/photos/menu-title-burgers.jpg" alt="">
       </div>
       <h2 class="title">caviar</h2>
      </div>
      <div class="menu-category-content padded">
       <div class="row gutters-sm">
        <!-- end-->
        <div class="col-lg-4 col-6">
         <!-- Menu Item -->
         <div class="menu-item menu-grid-item">
          <img class="mb-4" src="http://assets.suelo.pl/soup/img/products/product-burger.jpg" alt="">
          <h6 class="mb-0">Beef Burger</h6>
          <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
          <div class="row align-items-center mt-4">
           <div class="col-sm-6">
            <span class="text-md mr-4">
             <span class="text-muted">from</span> $ <span data-product-base-price>9.00</span>
            </span>
           </div>
           <!--<div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="1"><span>Add to cart</span></button></div>-->
          </div>
         </div>
        </div>
        <div class="col-lg-4 col-6">
         <!-- Menu Item -->
         <div class="menu-item menu-grid-item">
          <img class="mb-4" src="http://assets.suelo.pl/soup/img/products/product-pizza.jpg" alt="">
          <h6 class="mb-0">Broccoli</h6>
          <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
          <div class="row align-items-center mt-4">
           <div class="col-sm-6">
            <span class="text-md mr-4">
             <span class="text-muted">from</span> $ <span data-product-base-price>9.00</span>
            </span>
           </div>
           <!--<div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="2"><span>Add to cart</span></button></div>-->
          </div>
         </div>
        </div>
        <div class="col-lg-4 col-6">
         <!-- Menu Item -->
         <div class="menu-item menu-grid-item">
          <img class="mb-4" src="http://assets.suelo.pl/soup/img/products/product-chicken-burger.jpg" alt="">
          <h6 class="mb-0">Chicken Burger</h6>
          <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
          <div class="row align-items-center mt-4">
           <div class="col-sm-6">
            <span class="text-md mr-4">
             <span class="text-muted">from</span> $ <span data-product-base-price>14.00</span>
            </span>
           </div>
           <!--<div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="3"><span>Add to cart</span></button></div>-->
          </div>
         </div>
        </div>
        <div class="col-lg-4 col-6">
         <!-- Menu Item -->
         <div class="menu-item menu-grid-item">
          <img class="mb-4" src="http://assets.suelo.pl/soup/img/products/product-pasta.jpg" alt="">
          <h6 class="mb-0">Creste di Galli</h6>
          <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
          <div class="row align-items-center mt-4">
           <div class="col-sm-6">
            <span class="text-md mr-4">
             <span class="text-muted">from</span> $ <span data-product-base-price>13.00</span>
            </span>
           </div>
           <!--<div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="4"><span>Add to cart</span></button></div>-->
          </div>
         </div>
        </div>
        <div class="col-lg-4 col-6">
         <!-- Menu Item -->
         <div class="menu-item menu-grid-item">
          <img class="mb-4" src="http://assets.suelo.pl/soup/img/products/product-chicken-wings.jpg" alt="">
          <h6 class="mb-0">Chicken wings</h6>
          <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
          <div class="row align-items-center mt-4">
           <div class="col-sm-6">
            <span class="text-md mr-4">
             <span class="text-muted">from</span> $ <span data-product-base-price>13.00</span>
            </span>
           </div>
           <!--<div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="5"><span>Add to cart</span></button></div>-->
          </div>
         </div>
        </div>
        <div class="col-lg-4 col-6">
         <!-- Menu Item -->
         <div class="menu-item menu-grid-item">
          <img class="mb-4" src="http://assets.suelo.pl/soup/img/products/product-sushi.jpg" alt="">
          <h6 class="mb-0">Nigiri-sushi</h6>
          <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
          <div class="row align-items-center mt-4">
           <div class="col-sm-6">
            <span class="text-md mr-4">
             <span class="text-muted">from</span> $ <span data-product-base-price>13.00</span>
            </span>
           </div>
           <!--<div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="6"><span>Add to cart</span></button></div>-->
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>


    <div class="container mt-5">
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
     #image-thumbnail,
     #image-thumbnail-dish,
     #addCategoryimage-thumbnail,
     #addDishCategoryimage-thumbnail {
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

     /* Style the plus button */
     .plus-button {
      background-color: #4aa36b;
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
      background-color: #14a44d;
     }
     </style>
     <!-- Edit Category Form Modal -->
     <div id="editCategoryModal" class="modal">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h2>Edit a Category</h2>
         <button class="close" onclick="closeEditCategoryModal()">X</button>
        </div>
        <div class="modal-body">
         <form id="edit-category-form" enctype="multipart/form-data">


          <input type="hidden" id="category-id" name="categoryId" />

          <div class="form-group">
           <label class="title lead" for="newCategoryName">Category Name</label>
           <div class="row d-flex col-8">
            <input type="text" id="title" name="newCategoryName" class="form-control" required>
           </div>
          </div>

          <div class="form-group" hidden>
           <label class="title lead" for="newImage">Upload Image</label>
           <div class="row d-flex">
            <div class="col-8">
             <input type="file" id="image" name="newImage" class="form-control" accept="image/*">
            </div>
            <div class="col-4">
             <img id="image-thumbnail" src="../assets/img/offers/11.jpeg" alt="Image Thumbnail" class="img-thumbnail">
            </div>
           </div>
          </div>



          <!-- Add more fields based on your JSON structure -->

          <div class="form-group text-center">
           <!-- Add more fields based on your JSON structure -->
           <button type="submit" name="submit" id="submit" class="btn btn-secondary btn-block btn-lg btn-submit">
            <span class="description">save</span>
            <span class="success">
             <svg x="0px" y="0px" viewBox="0 0 32 32">
              <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF"
               stroke-width="2" stroke-linecap="square" stroke-miterlimit="10"
               d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
             </svg>
            </span>
            <span class="error">Retry...</span>
           </button>
          </div>
         </form>


        </div>
       </div>
      </div>
     </div>
     <!-- Add new dish Form Modal -->
     <div id="editDishModal" class="modal">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h2>Edit a Dish</h2>
         <button class="close" onclick="closeEditCategoryModal()">X</button>
        </div>
        <div class="modal-body">
         <form id="edit-dish-form" enctype="multipart/form-data">
          <input type="hidden" id="dish-id" name="dishId" />
          <input type="hidden" id="categoryName" name="categoryName" />
          <input type="hidden" id="categoryIdD" name="categoryIdD" />
          <div class="form-row">
           <div class="form-group col-md-6">
            <label class="title lead" for="DishTitle">Title:</label>
            <input type="text" id="DishTitle" name="DishTitle" class="form-control" required>
           </div>
           <div class="form-group col-md-6">
            <div class="form-group col-md-6">
             <label class="title lead" for="DishPrice">Price(€):</label>
             <input type="text" id="DishPrice" name="DishPrice" class="form-control" required>
            </div>
           </div>

          </div>
          <div class="form-row">
           <div class="form-group col-md-6">
            <label class="title lead" for="DishDescription">Description:</label>
            <textarea id="DishDescription" name="DishDescription" class="form-control"></textarea>
           </div>
           <div class="form-group col-md-6" hidden>
            <label class="title lead" for="image">Upload Image:</label>
            <div class="row d-flex">
             <div class="col-md-5">
              <input type="file" id="imageDish" name="imageDish" class="form-control" accept="image/*">
             </div>
             <div class="col-md-4">
              <img id="image-thumbnail-dish" src="../assets/img/offers/11.jpeg" alt="Image Thumbnail"
               class="img-thumbnail">
             </div>
            </div>
           </div>
          </div>

          <!-- Add more fields based on your JSON structure -->
          <button type="submit" name="Dishsubmit" id="Dishsubmit" class="btn btn-secondary btn-block btn-lg btn-submit">
           <span class="description">save</span>
           <span class="success">
            <svg x="0px" y="0px" viewBox="0 0 32 32">
             <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF"
              stroke-width="2" stroke-linecap="square" stroke-miterlimit="10"
              d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
            </svg>
           </span>
           <span class="error">Retry...</span>
          </button>
         </form>

        </div>
       </div>
      </div>
     </div>
     <button class="edit-button plus-button" id="plus-button" title="Add Dishes Categories">+</button>
     <!-- Add Category Form Modal -->
     <div id="addCategoryModal" class="modal">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h2>Add a Category</h2>
         <button class="close" onclick="closeEditCategoryModal()">X</button>
        </div>
        <div class="modal-body">
         <form id="add-category-form" enctype="multipart/form-data">
          <input type="hidden" id="addCategoryID" name="categoryId" />

          <div class="form-group">
           <label class="title lead" for="newCategoryName">Category Name</label>
           <div class="row d-flex col-8">
            <input type="text" id="addCategorytitle" name="newCategoryName" class="form-control" required>
           </div>
          </div>

          <div class="form-group" hidden>
           <label class="title lead" for="newImage">Upload Image</label>
           <div class="row d-flex">
            <div class="col-8">
             <input type="file" id="addCategoryimage" name="newImage" class="form-control" accept="image/*">
            </div>
            <div class="col-4">
             <img id="addCategoryimage-thumbnail" src="../assets/img/offers/11.jpeg" alt="Image Thumbnail"
              class="img-thumbnail">
            </div>
           </div>
          </div>

          <button type="submit" class="btn btn-submit btn-lg btn-block btn-success"><span class="description">Add
            Category</span></button>
         </form>
        </div>
       </div>
      </div>
     </div>
     <!-- Add Dish Form Modal -->
     <div id="addDishModal" class="modal">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h2>Add a Dish</h2>
         <button class="close" onclick="closeEditCategoryModal()">X</button>
        </div>
        <div class="modal-body">
         <form id="add-dish-form" enctype="multipart/form-data">
          <input type="hidden" id="categoryIdDish" name="categoryIdDish" />
          <input type="hidden" id="categoryNameDish" name="categoryNameDish" />

          <!-- Category Dropdown and Dish Name -->
          <div class="form-row">
           <div class="form-group col-md-6">
            <label class="title lead" for="categoryDropdown">Category</label>
            <select id="categoryDropdown" name="categoryDropdown" class="form-control" required>
             <!-- Categories will be populated dynamically -->
            </select>
           </div>
           <div class="form-group col-md-6">
            <label class="title lead" for="addDishCategoryName">Dish Name</label>
            <input type="text" id="addDishCategorytitle" name="addDishCategoryName" class="form-control" required>
           </div>
          </div>

          <!-- Dish Price and Description -->
          <div class="form-row">
           <div class="form-group col-md-6">
            <label class="title lead" for="addDishPrice">Dish Price</label>
            <input type="text" id="addDishPrice" name="addDishPrice" class="form-control" required>
           </div>
           <div class="form-group col-md-6">
            <label class="title lead" for="addDishDescription">Dish Description</label>
            <textarea id="addDishDescription" name="addDishDescription" class="form-control" rows="3"></textarea>
           </div>
          </div>
          <!-- Dish Image Upload -->
          <div class="form-group" hidden>
           <label class="title lead" for="addDishCategoryimage">Upload Image</label>
           <div class="row">
            <div class="col-md-8">
             <input type="file" id="addDishCategoryimage" name="newImage" class="form-control" accept="image/*">
            </div>
            <div class="col-md-4">
             <img id="addDishCategoryimage-thumbnail" src="../assets/img/offers/11.jpeg" alt="Image Thumbnail"
              class="img-thumbnail">
            </div>
           </div>
          </div>
          <button type="submit" class="btn btn-submit btn-lg btn-block btn-success"><span class="description">Add a
            Dish</span></button>
         </form>
        </div>
       </div>
      </div>
     </div>
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
    </div>
   </div>
  </div>
 </div>
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
   <li>
    <hr class="dropdown-divider">
   </li>
   <li>
    <a class="dropdown-item" href="./dishes_en.php">
     <i class="flag-united-kingdom flag"></i>English
    </a>
   </li>
  </ul>
  <a class="ml-2" href="../admin/php/login/logout.php"><strong>Logout</strong></a>
 </div>
 <script src="../admin/dist/js/dishes/dishes-fr.js"></script>
 <?php
    include './footer.php';
?>