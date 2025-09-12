<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paiement indisponible - FlyFret</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #7B01F7;
            --secondary-color: #F10CF3;
            --dark-color: #1a1a1a;
            --light-color: #f8f9fa;
            --white: #ffffff;
            --black: #000000;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
            overflow-x: hidden;
        }
        
        /* Header Styles */
        .navbar {
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand img {
            height: 50px;
            width: auto;
        }
        
        .nav-link {
            font-weight: 500;
            padding: 8px 15px;
            color: var(--dark-color);
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .dropdown-menu {
            border-radius: 8px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .dropdown-item {
            padding: 8px 20px;
        }
        
        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        #btn-devis {
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 20px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        
        #btn-devis:hover {
            background-color: var(--secondary-color);
            color: var(--white);
            transform: translateY(-2px);
        }
        
        #btn-devis .arrow {
            margin-left: 8px;
            transition: all 0.3s ease;
        }
        
        #btn-devis:hover .arrow {
            transform: translateX(3px);
        }
        
        /* Maintenance Section */
        .maintenance-section {
            padding: 100px 0;
            background-color: #f8f9fa;
            text-align: center;
        }
        
        .maintenance-icon {
            font-size: 80px;
            color: var(--primary-color);
            margin-bottom: 30px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .maintenance-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .maintenance-subtitle {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            color: #555;
        }
        
        .alternative-options {
            background-color: var(--white);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            max-width: 800px;
            margin: 40px auto 0;
            text-align: left;
        }
        
        .alternative-title {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            text-align: center;
        }
        
        .option-card {
            background: rgba(123, 1, 247, 0.05);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .option-card:hover {
            transform: translateX(5px);
            background: rgba(123, 1, 247, 0.1);
        }
        
        .option-card h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .option-card p {
            margin-bottom: 0;
        }
        
        .contact-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .contact-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(123, 1, 247, 0.2);
            color: var(--white);
        }
        
        /* Footer Styles */
        .footer-section {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 60px 0 20px;
        }
        
        .footer-wrapper h3 {
            font-size: 1.5rem;
            margin-bottom: 25px;
            color: var(--white);
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-wrapper h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }
        
        .location li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }
        
        .location i {
            margin-right: 15px;
            color: var(--secondary-color);
            font-size: 20px;
            margin-top: 3px;
        }
        
        .social-icon {
            display: flex;
            padding: 0;
            margin-top: 20px;
        }
        
        .social-icon li {
            list-style: none;
            margin-right: 15px;
        }
        
        .social-icon a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            transition: all 0.3s ease;
        }
        
        .social-icon a:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .copy-right {
            padding: 20px 0;
            background-color: rgba(0, 0, 0, 0.2);
            margin-top: 40px;
        }
        
        /* WhatsApp Button */
        .whatsapp-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
        
        .whatsapp-btn, .messenger-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .whatsapp-btn {
            background-color: #25D366;
            color: var(--white);
        }
        
        .messenger-btn {
            background-color: #006AFF;
            color: var(--white);
        }
        
        .whatsapp-btn:hover, .messenger-btn:hover {
            transform: scale(1.1);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background-color: var(--white);
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                margin-top: 15px;
            }
        }
        
        @media (max-width: 767.98px) {
            .maintenance-section {
                padding: 60px 0;
            }
            
            .maintenance-title {
                font-size: 2rem;
            }
            
            .alternative-options {
                padding: 20px;
            }
        }
        
        @media (max-width: 575.98px) {
            .maintenance-title {
                font-size: 1.8rem;
            }
            
            .maintenance-subtitle {
                font-size: 1rem;
            }
            
            .whatsapp-btn, .messenger-btn {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="header-section sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/assets/images/logo.png" alt="FlyFret Logo">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/apropos">À propos</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="expeditionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                EXPEDITION
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="expeditionDropdown">
                                <li><a class="dropdown-item" href="http://127.0.0.1:8000/envoi-colis">Envoyer votre colis</a></li>
                                <li><a class="dropdown-item" href="http://127.0.0.1:8000/suivi_colis">Suivre votre colis</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/blog">BLOG</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/contact">CONTACT</a>
                        </li>
                        
                        <li class="nav-item ms-lg-3">
                            <a href="#" id="btn-devis" class="nav-link">
                                Obtenez devis <span class="arrow">➔</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Maintenance Section -->
    <section class="maintenance-section">
        <div class="container">
            <div class="maintenance-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h1 class="maintenance-title">Paiement temporairement indisponible</h1>
            <p class="maintenance-subtitle">
                Notre système de paiement est actuellement en maintenance pour amélioration. Nous nous excusons pour la gêne occasionnée et travaillons à rétablir le service au plus vite.
            </p>
            
            <div class="alternative-options">
                <h3 class="alternative-title">Options alternatives</h3>
                
                
                <div class="option-card">
                    <h4><i class="fas fa-store me-2"></i> Paiement en agence</h4>
                    <p>Rendez-vous dans l'une de nos agences pour régler votre commande en personne.</p>
                </div>
                
                <div class="option-card">
                    <h4><i class="fas fa-clock me-2"></i> Réessayez plus tard</h4>
                    <p>Le service devrait être rétabli dans les prochaines heures. Merci de réessayer ultérieurement.</p>
                </div>
                
                <div class="text-center">
                    <a href="#" class="contact-btn">
                        <i class="fas fa-headset me-2"></i> Contacter le support
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="footer-wrapper">
                        <h3>Localisation</h3>
                        <ul class="location list-unstyled">
                            <li class="d-flex mb-3">
                                <i class="fas fa-map-marker-alt mt-1 me-3"></i>
                                <div>
                                    <strong>France</strong><br>
                                    Lyon (Vaulx-en-velin 69120)<br>
                                    Paris (Créteil 94000)
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-map-marker-alt mt-1 me-3"></i>
                                <div>
                                    <strong>Côte d'Ivoire</strong><br>
                                    Abidjan (Rivera Palmeraie)<br>
                                    Carrefour guiraud
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="footer-wrapper">
                        <h3>Contact</h3>
                        <ul class="location list-unstyled">
                            <li class="d-flex mb-3">
                                <i class="fas fa-phone-alt mt-1 me-3"></i>
                                <div>
                                    <strong>France</strong><br>
                                    +33 5 54 54 31 71
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-phone-alt mt-1 me-3"></i>
                                <div>
                                    <strong>Côte d'Ivoire</strong><br>
                                    +225 27 22 30 48 19<br>
                                    +225 05 94 94 65 65
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-wrapper">
                        <h3>Horaire</h3>
                        <ul class="location list-unstyled mb-4">
                            <li class="d-flex mb-3">
                                <i class="far fa-clock mt-1 me-3"></i>
                                <div>
                                    <strong>Lundi - Samedi</strong><br>
                                    9h - 19h
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="far fa-clock mt-1 me-3"></i>
                                <div>
                                    <strong>Dimanche</strong><br>
                                    14h - 19h
                                </div>
                            </li>
                        </ul>
                        
                        <h3>Suivez-nous</h3>
                        <ul class="social-icon list-unstyled d-flex">
                            <li class="me-3"><a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="me-3"><a href="#" class="text-white"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" class="text-white"><i class="fab fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="copy-right text-center py-3 mt-4 w-full">
                <p class="mb-0">© 2023 FlyFret International Group. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <div class="whatsapp-button">
        <a href="#" class="whatsapp-btn" id="whatsappButton">
            <i class="fab fa-whatsapp fa-lg"></i>
        </a>
        
        <select id="whatsappSelect" class="form-select d-none">
            <option value="">Sélectionnez une ville</option>
            <option value="+33751551845">Paris</option>
            <option value="+33751455595">Lyon</option>
            <option value="+33751455595">Nancy</option>
        </select>
        
        <a href="#" class="messenger-btn" target="_blank">
            <i class="fab fa-facebook-messenger fa-lg"></i>
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // WhatsApp Button Functionality
        document.getElementById("whatsappButton").addEventListener("click", function(event) {
            event.preventDefault();
            const selectBox = document.getElementById("whatsappSelect");
            
            if (selectBox.classList.contains("d-none")) {
                selectBox.classList.remove("d-none");
            } else {
                selectBox.classList.add("d-none");
            }
        });
        
        document.getElementById("whatsappSelect").addEventListener("change", function() {
            const numero = this.value.trim();
            if (numero) {
                const message = encodeURIComponent("Bonjour, je vous contacte via WhatsApp !");
                const lienWhatsApp = "https://api.whatsapp.com/send?phone=" + numero + "&text=" + message;
                window.location.href = lienWhatsApp;
                this.classList.add("d-none");
            }
        });
    </script>
</body>
</html>