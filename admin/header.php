<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta tags, title, favicons, stylesheets, etc. -->
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- Title -->
    <title>GELATO NATURALE - Découvrez nos Saveurs Artisanales</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href=".././assets/img/svg/gelatonaturale.svg">
    <!--<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png"><link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png"><link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png"><link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">-->
    <!-- Fonts -->
    <!--<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="dist/css/fontsgoogleapiscom_css2_family.css">
    <!--bootstrap 5-->
    <link rel="stylesheet" href="dist/css/bootstrap/bootstrap.min.css">
    <!--mdb-->
    <link rel="stylesheet" href="dist/css/mdb.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="dist/css/fontawesome/fontawesome.min.css">
    <!--flags-->
    <link rel="stylesheet" href="dist/css/flag-icons.min.css">
    <!-- CSS Core -->
    <link rel="stylesheet" href="dist/css/core.css">
    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="dist/css/theme-blue.css">
    <script src=".././dist/js/menu/axios.min.js"></script>
    <script src=".././dist/js/clearCache.js"></script>
    <!-- Canonical URL to avoid duplicate content issues -->
    <link rel="canonical" href="https://gelatonaturale.be/gelatonaturale/index.php">
    <!-- Open Graph meta tags for social media sharing -->
    <meta property="og:title" content="Gelato Naturale - Meilleure crèmerie artisanale à Tarcienne">
    <meta property="og:description" content="Découvrez les saveurs artisanales uniques de Gelato Naturale à Tarcienne.">
    <meta property="og:image" content="https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale.svg">
    <meta property="og:url" content="https://gelatonaturale.be/gelatonaturale/index.php">
    <meta property="og:type" content="website">
    <!-- Structured Data using JSON-LD for better search engine understanding -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Restaurant",
            "name": "Gelato Naturale",
            "description": "Meilleure crèmerie artisanale à Tarcienne.",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Route de Philippeville 34",
                "addressLocality": "Tarcienne",
                "addressRegion": "Wallonie",
                "postalCode": "5651",
                "addressCountry": "Belgique"
            },
            "priceRange": "€",
            "url": "https://gelatonaturale.be/gelatonaturale/index.php",
            "image": "https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale.svg",
            "telephone": "+32 497 47 65 48"
        }
    </script>
    <!-- Additional SEO optimizations -->
    <meta name="description" content="Découvrez les saveurs artisanales uniques de Gelato Naturale à Tarcienne.">
    <meta name="keywords" content="Gelato Naturale, crèmerie artisanale, Tarcienne, crème glacée, sorbet">
    <meta name="robots" content="index, follow">
</head>

<body>
    <div id="body-wrapper" class="animsition">
        <header id="header" class="light">
            <div class="container">
                <div class="row">
                    <style>
                        .italian-flag {
                            background: linear-gradient(90deg, #008C45 0%, #008C45 30%, #FFFFFF 30%, #FFFFFF 70%, #FF0000 66%, #FF0000 100%);
                            display: inline-block;
                            padding: 10px;
                        }

                        .title {
                            font-size: 24px;
                            /* Adjust the font size */
                            font-weight: bold;
                            /* Add bold font weight */
                            margin-top: 10px;
                            /* Add some top margin for spacing */
                            color: #333;
                            /* Set the color to a darker shade for better readability */
                        }

                        @keyframes blink {
                            0% {
                                opacity: 1;
                            }

                            50% {
                                opacity: 0;
                            }

                            100% {
                                opacity: 1;
                            }
                        }

                        #Cartening {
                            background-image: url('.././assets/img/comming-soon/coming-soon.jpeg');
                            background-size: 24px 24px;
                            background-repeat: no-repeat;
                            padding-right: -30px;
                            background-position: right center;
                            /* Image positioned from the right */
                            /* Adjust as needed */
                            /* Font size */
                            animation: blink 3s infinite;
                            pointer-events: none;
                            /* Make it unclickable */
                        }
                    </style>
                    <div class="col-md-3 ">
                        <!-- Logo -->
                        <div class="module module-logo dark italian-flag">
                            <a href="index-en.php">
                                <img src=".././assets/img/gelatonaturale.svg" alt="gelatonaturale" style="width: 200px;height: 100px;" width="88">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <!-- Navigation -->
                        <nav class="module module-navigation left mr-4">
                            <ul id="nav-main" class="nav nav-main">
                                <li>
                                    <a href=".././index.php">Accueil</a>
                                </li>
                                <li>
                                    <a href=".././page-sur-place.php">Sur place</a>
                                </li>
                                <li>
                                    <a href=".././page-reservation.php">Gâteaux</a>
                                </li>
                                <li>
                                    <a href=".././Professionnels.php">Professionnels</a>
                                </li>
                                <li>
                                    <a href="#" id="Cartening">Réservations Traiteurs</a>
                                    <!-- Translate "Coming Soon" -->

                                </li>
                                <li>
                                    <a href=".././page-gallery.php">Galerie</a>
                                </li>
                                <li>
                                    <a href=".././page-contact.php">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>