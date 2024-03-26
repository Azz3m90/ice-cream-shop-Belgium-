<!-- Sectie - Menu -->
<section class="section pb-0 protrude">
    <style>
    .menu-sample .title {
        background-color: rgba(0, 0, 0, 0.5);
        /* Pas de kleur en dekking aan zoals nodig */
        padding: 5px;
        /* Voeg wat padding toe om de achtergrond zichtbaarder te maken */
        color: white;
        /* Stel tekstkleur in op wit voor beter contrast */
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

        <!-- Voorbeeldmenu -->
        <div class="menu-sample">
            <a href="./page-sur-place-nl.php">
                <img src="./assets/img/surplace/surplace_4.jpeg" alt="Ter plaatse eten"
                    style="width: 500px;height:400px;">
                <h3 class="title" title="Ter plaatse eten">Ter plaatse</h3>
            </a>
        </div>
        <!-- Voorbeeldmenu -->
        <div class="menu-sample">
            <a href="./page-reservations-nl.php">
                <img src="./assets/img/icecream/cake.jpg" alt="taarten" style="width: 500px;height:400px;">
                <h3 class="title" title="taarten">Taarten</h3>
            </a>
        </div>
        <!-- Voorbeeldmenu -->
        <div class="menu-sample">
            <a href="./Professionnels-nl.php">
                <img src="./assets/img/professionals/professionals.jpg" alt="Professionals"
                    style="width: 500px;height:400px;">
                <h3 class="title" title="Professionals">Profi's</h3>
            </a>
        </div>
        <!-- Voorbeeldmenu -->
        <div class="menu-sample">
            <a href="#" id="reservation">
                <img src="./assets/img/Reservations/reservation.jpg" alt="Catering Evenementen Reserveringen"
                    style="width: 500px;height:400px;">
                <h3 class="title" title="Catering Evenementen Reserveringen">Catering Reserveringen</h3>
            </a>
        </div>
    </div>
</section>
<!-- Sectie -->
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
<!-- HTML voor de modale venster -->
<div id="myModal" class="modal">
    <!-- Modale inhoud -->
    <div class="close">&times;</div>
    <div class="modal-content">

        <header class="carousel-az">
            <h1>Binnenkort beschikbaar</h1>
        </header>
        <br>
        <h4>
            Deze pagina zal binnenkort beschikbaar zijn.
            In de tussentijd, voor alle vragen met betrekking tot een evenement,
            kunt u ons telefonisch bereiken op <a href="tel:+0497476548" style="font-weight:bold;" target="_blank">
                <i class="fa fa-mobile-phone fa-lg"></i> 0497 47 65 48
            </a>
        </h4>
        <!-- Inhoud van de footer -->
        <footer class="carousel-az">
            <p>Blijf op de hoogte voor spannende updates!</p>
        </footer>
    </div>
</div>


<!-- JavaScript voor de modale venster -->
<script>
// Haal de modale venster op
var modal = document.getElementById("myModal");

// Haal de <span> op die het modale venster sluit
var span = document.getElementsByClassName("close")[0];

// Haal de link voor de reserveringen op
var link = document.getElementById("reservation");

// Wanneer de gebruiker op de link klikt, open de modale venster
link.addEventListener('click', function(event) {
    modal.style.display = "block";
});

// Wanneer de gebruiker op <span> (x) klikt, sluit de modale venster
span.onclick = function() {
    modal.style.display = "none";
}

// Wanneer de gebruiker ergens buiten de modale venster klikt, sluit het
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>