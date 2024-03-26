<!-- Section - Menu -->
<section class="section pb-0 protrude">
    <style>
        .menu-sample .title {
            background-color: rgba(0, 0, 0, 0.5);
            /* You can adjust the color and opacity as needed */
            padding: 5px;
            /* Add some padding to make the background more visible */
            color: white;
            /* Set text color to white for better contrast */
        }
    </style>
    <div class="container">
        <h1 class="mb-6"></h1>
    </div>

    <div class="menu-sample-carousel carousel inner-controls" data-slick='{
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
    }'>

        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="./page-sur-place-en.php">
                <img src="./assets/img/surplace/surplace_4.jpeg" alt="On-site dining" style="width: 500px;height:400px;">
                <h3 class="title" title="On-site dining">On-site Dining</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="./page-reservation-en.php">
                <img src="./assets/img/icecream/cake.jpg" alt="cakes" style="width: 500px;height:400px;">
                <h3 class="title" title="Our logs and cakes">Cakes</h3>
            </a>
        </div>

        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="./Professionnels-en.php">
                <img src="./assets/img/professionals/professionals.jpg" alt="Professionals" style="width: 500px;height:400px;">
                <h3 class="title" title="Professionals"> Pros</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="#" id="reservation">
                <img src="./assets/img/Reservations/reservation.jpg" alt="Catering Events Reservations" style="width: 500px;height:400px;">
                <h3 class="title" title="Catering Events Reservations">Catering Reservations</h3>
            </a>
        </div>
    </div>
</section>
<!-- Section -->
<style>
    /* Styles for the modal */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1000;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black with opacity */
    }

    /* Styles for the modal content */
    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        /* 10% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
        max-width: 600px;
        /* Set max width */
        border-radius: 10px;
    }

    /* Close button */
    /* Close button */
    .close {
        color: #aaa;
        float: right;
        /* Changed to float right */
        font-size: 36px;
        /* Increased font size for larger close button */
        font-weight: bold;
        cursor: pointer;
        /* Added cursor:pointer to indicate interactive element */
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }

    /* Style for the header */
    .carousel-az {
        background-image: linear-gradient(to right, green, white, red);
        color: black;
        text-align: center;
        padding: 10px;
    }
</style>

<!-- HTML for the modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="close">&times;</div>
    <div class="modal-content">

        <header class="carousel-az">
            <h1>Coming Soon</h1>
        </header>
        <br>
        <h4>
            This page will be available soon.
            In the meantime, for any inquiries regarding an event,
            please contact us by phone at <a href="tel:+0497476548" style="font-weight:bold;" target="_blank">
                <i class="fa fa-mobile-phone fa-lg"></i> 0497 47 65 48
            </a>
        </h4>
        <!-- Footer content -->
        <footer class="carousel-az">
            <p>Stay tuned for exciting updates!</p>
        </footer>
    </div>
</div>

<!-- JavaScript for the modal -->
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the link for reservations
    var link = document.getElementById("reservation");

    // When the user clicks on the link, open the modal 
    link.addEventListener('click', function(event) {
        modal.style.display = "block";
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>