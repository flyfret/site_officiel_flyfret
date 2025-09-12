<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consulting - Business, Finance and Professional Services HTML 5 Template</title>
    <!-- fav icon -->
    <link href="{{ asset('assets/assets/images/logo.png') }}" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- animated-css -->
    <link href="{{ asset('assets/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css">
    <!-- font-awesome-css -->
    <link href="{{ asset('assets/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- owl-carrosel-css -->
    <link href="{{ asset('assets/assets/owl-carrosel/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/assets/owl-carrosel/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{ asset('assets/assets/css/revolution/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/revolution/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/revolution/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/offcanvas-menu.css') }}" type="text/css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- style-css -->
    <link href="{{ asset('assets/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-L+DGBFY6RmrSyEJLG2wF/pZ4vx9ccLaqW8v/0w9UH7mlIHBaCXW5eEUYrh2bJjKo2UPsNoBLBX4Qo0l1cmrzOw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="homePageOne">
    <!-- start preloader -->

    <!-- end preloader -->


    <header class="header-section">


        <nav class="navbar navbar-inverse hidden-sm hidden-xs">
            <div class="navbar-inner">

                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('index1') }}">
                        <img src="assets/images/logo.png" alt="image">
                    </a>

                </div>
                <style>
                    .navbar-brand img {
                        width: 200px;
                        /* Largeur du logo */
                        height: auto;
                        /* Hauteur ajustée automatiquement pour garder les proportions */
                    }
                </style>





                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav" style="right: 200%;">


                        <li><a href="#">À propos</a></li>

                        <li class="dropdown"><a href="#">EXPEDITION<i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('index12') }}">Envoyer votre <br>colis</a></li>
                                <li><a href="{{ route('suivi') }}">Suivre votre <br>colis</a></li>

                            </ul>
                        </li>
                        <li><a href="#"> BLOG </a></li>
                        <li><a href="#">CONTACT </a></li>
                        <style>
                            /* Cibler uniquement le bouton avec l'ID "btn-devis" */
                            #btn-devis {
                                display: inline-flex;
                                /* Utilise flexbox pour aligner le texte et la flèche */
                                align-items: center;
                                /* Aligne verticalement */
                                justify-content: center;
                                /* Centre horizontalement */
                                width: 120%;
                                /* Ajuste la largeur à 100% */
                                max-width: 900px;
                                /* Largeur maximale */
                                background-color: #8000FF;
                                /* Couleur de fond violet */
                                color: white;
                                /* Texte blanc par défaut */
                                font-weight: bold;
                                /* Texte en gras */
                                text-transform: uppercase;
                                /* Texte en majuscules */
                                text-decoration: none;
                                /* Supprime la décoration des liens */
                                padding: 5px 5px;
                                /* Ajoute de l'espace intérieur */
                                font-size: 18px;
                                /* Taille du texte */
                                /* Coins arrondis */
                                transition: color 0.3s ease, background-color 0.3s ease;
                                /* Transition fluide */

                            }

                            /* État au survol */
                            #btn-devis:hover {
                                color: black;
                                /* Texte noir au survol */
                                background-color: #8000FF;
                                /* Fond reste violet */
                            }

                            /* État focus (lorsque l'utilisateur sélectionne) */
                            #btn-devis:focus {
                                outline: none;
                                /* Supprime le contour par défaut */
                                background-color: #8000FF;
                                /* Fond reste violet */
                                color: white;
                                /* Texte blanc */
                            }

                            /* État actif (lorsqu'on clique) */
                            #btn-devis:active {
                                background-color: #8000FF;
                                /* Fond reste violet */
                                color: white;
                                /* Texte blanc */
                            }

                            /* Style pour la flèche */
                            #btn-devis .arrow {
                                margin-left: 15px;
                                /* Espace entre le texte et la flèche */
                                font-size: 22px;
                                /* Taille de la flèche */
                                font-weight: bold;
                            }

                            .navbar-brand img {
                                width: 200px;
                                /* Largeur du logo */
                                height: auto;
                                /* Hauteur ajustée automatiquement pour garder les proportions */
                            }
                        </style>

                        <li>
                            <a href="contact.html" id="btn-devis">
                                Obtenez devis <span class="arrow">➔</span>
                            </a>
                        </li>





                    </ul>
                </div>
            </div>
            </div>
        </nav>
    </header> <!-- header-section -->

    <div
        style="position: fixed; bottom: 40px; right: 20px; z-index: 9999; display: flex; flex-direction: column; align-items: center; gap: 5px;">
        <!-- WhatsApp -->
        <a href="#" id="whatsappButton">
            <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp"
                style="width: 60px; height: 60px; border-radius: 50%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
        </a>

        <select id="whatsappSelect" style="display: none;">
            <option value="">Sélectionnez une ville</option>
            <option value="+33751551845">Paris</option>
            <option value="+33751455595">Lyon</option>
            <option value="+33751455595">Nancy</option>
        </select>

        <script>
            document.getElementById("whatsappButton").addEventListener("click", function(event) {
                event.preventDefault(); // Empêche l'ouverture immédiate
                let selectBox = document.getElementById("whatsappSelect");

                // Affiche la sélection si elle est cachée
                if (selectBox.style.display === "none") {
                    selectBox.style.display = "block";
                }
            });

            document.getElementById("whatsappSelect").addEventListener("change", function() {
                let numero = this.value.trim();
                if (numero) {
                    let message = encodeURIComponent("Bonjour, je vous contacte via WhatsApp !");
                    let lienWhatsApp = "https://api.whatsapp.com/send?phone=" + numero + "&text=" + message;
                    window.location.href = lienWhatsApp; // Redirection immédiate
                }
            });
        </script>

        <!-- Messenger   https://m.me/YourPageID -->

        <a href="#" target="_blank">
            <img src="https://img.icons8.com/color/48/000000/facebook-messenger.png" alt="Messenger"
                style="width: 60px; height: 60px; border-radius: 50%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
        </a>
    </div>

    @yield('content')



    <footer class="footer-section">
        <div class="footer-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-wrapper">
                            <h3>Localisation</h3>
                            <ul class="location">



                                <li><i class="fa fa-home" aria-hidden="true"></i>
                                    <div class="content" style="font-size:18px">
                                        Lyon (Vaulx-en-velin 69120) <br>Paris (Créteil 94000)
                                    </div>
                                </li>
                                <li><i class="fa fa-home" aria-hidden="true"></i>
                                    <div class="content" style="font-size:18px">
                                        Abidjan (Rivera Palmeraie) <br> Carrefour guiraud
                                    </div>
                                </li><br>

                            </ul>


                            </ul>
                        </div> <!-- footer-wrapper -->
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-wrapper">
                            <h3>Contact</h3>
                            <ul class="location">

                                <li><i class="fa fa-phone" aria-hidden="true"></i>

                                    <div class="content"style="font-size:18px">
                                        France <br>+33 5 54 54 31 71
                                    </div>
                                </li>
                                <li><i class="fa fa-phone" aria-hidden="true"> </i>

                                    <div class="content" style="font-size:20px">
                                        Abidjan <br><br>+225 27 22 30 48 19 / <br>+225 05 94 94 65 65
                                    </div>
                                </li>


                            </ul>
                        </div> <!-- footer-wrapper -->
                    </div>



                    <div class="col-md-4 col-sm-4">
                        <div class="footer-wrapper">
                            <h3>Horaire</h3>
                            <ul class="location">



                                <li><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <div class="content" style="font-size:18px">
                                        Du Lundi au Samedi <br> 9h-19h
                                    </div>


                                </li>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i>

                                    <div class="content" style="font-size:18px">
                                        Dimanche 14h-19
                                    </div>

                                </li><br>
                                <h3>Suivez-nous sur</h3>
                                <ul class="social-icon">
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-facebook"
                                                    aria-hidden="true"></i></a></li>

                                        <li><a href="#"><i class="fa-brands fa-instagram"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-tiktok"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>

                                </ul>
                        </div> <!-- footer-wrapper -->
                    </div>

                </div>
            </div>
        </div> <!-- footer-container -->


        <div class="copy-right text-center">
            <div class="container">
                <p style="color:#fff;">FlyFret International Group<a href="#"></a></p>
            </div>
        </div> <!-- copy-right -->
    </footer> <!-- footer-section -->





    <!-- Off-Canvas View Only -->
    <span class="menu-toggle navbar visible-xs visible-sm">
        <i class="fa fa-bars" aria-hidden="true" style="background-color: #8022F4;"></i>
        <div class="logo" style="text-align: center; ">
            <img src="assets/images/logo.png" alt="Logo" style="max-width: 200px; height: auto;">
        </div>
    </span>

    <!-- Offcanvas menu -->
    <div id="offcanvas-menu" class="visible-xs visible-sm" style="background-color: #fff;">
        <span class="close-menu">
            <i class="fa fa-times" aria-hidden="true" style="background-color: #F10CF3;"></i>
        </span><br> <br> <br>



        <ul class="menu-wrapper">
            <li><a href="about.html" style="color: #8022F4; font-weight: bold;">À propos</a></li><!-- end of li -->

            <li>
                <a style="color: #8022F4; font-weight: bold;" class="dropmenu" href="#">EXPEDITION<i
                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul class="dropDown sub-menu">
                    <li><a href="{{ route('index12') }}" style="color:#F10CF3;">Envoyer votre colis</a></li>
                    <li><a href="{{ route('suivi') }}"style="color:#F10CF3;">Suivre votre colis</a></li>
                </ul><!-- end of dropdown -->
            </li><!-- end of li -->

            <li><a href="contact.html" style="color: #8022F4; font-weight: bold;">BLOG</a></li><!-- end of li -->
            <li><a href="contact.html" style="color: #8022F4; font-weight: bold;">CONTACT</a></li><!-- end of li -->
        </ul> <!-- menu-wrapper -->
    </div>
    <!-- Off-Canvas View Only -->


    <style>
        /* Logo scaling for mobile */
        .navbar-brand img {
            width: 200px;
            height: auto;
        }

        /* Style for the 'Get a Quote' button */
        #btn-devis {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #8000FF;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px 15px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        #btn-devis:hover {
            color: black;
            background-color: #F10CF3;
        }

        /* Style for the dropdown menu */
        .navbar-nav .dropdown-menu {
            background-color: #8000FF;
            border-radius: 5px;
        }

        .navbar-nav .dropdown-item {
            color: white;
        }

        .navbar-nav .dropdown-item:hover {
            color: #F10CF3;
        }

        /* Navbar mobile toggle */
        @media (max-width: 991px) {
            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-link {
                padding: 10px 0;
            }

            .navbar-toggler {
                background-color: #8000FF;
            }
        }
    </style>


    <script src="{{ asset('assets/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/assets/js/portfolio.js') }}"></script>
    <script src="{{ asset('assets/assets/owl-carrosel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/assets/js/language.js') }}"></script>

    <!-- Revolution Slider -->
    <script src="{{ asset('assets/assets/revolution/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/assets/revolution/jquery.themepunch.tools.min.js') }}"></script>

    <!-- Revolution Extensions -->
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/revolution/extensions/revolution.extension.video.min.js') }}"></script>

    <script src="{{ asset('assets/assets/js/script.js') }}"></script>
</body>

</html>
