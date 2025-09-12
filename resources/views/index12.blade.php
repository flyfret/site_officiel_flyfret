@extends('layouts.app')
@section('title', 'flyFret - Page en travaux') 
@section('ChildContent')

<!-- Custom CSS -->
<style>
    /* Hero Section */
    .hero-section {
        background-size: cover;
        background-position: center;
        position: relative;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        overflow: hidden;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(123, 1, 247, 0.5), rgba(241, 12, 243, 0.5));
    }
    .hero-content {
        position: relative;
        z-index: 2;
    }
    .hero-section h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    .sub-title {
        font-size: 1.5rem;
        font-weight: 400;
        display: block;
        margin-bottom: 20px;
    }
    /* Guide Section */
    .guide-section {
        padding: 80px 0;
        background-color: var(--light-color);
    }
    .guide-section h2 {
        text-align: center;
        color: var(--primary-color);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .guide-section .subtitle {
        text-align: center;
        color: #666;
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto 40px;
    }
    .guide-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        height: 100%;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .guide-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    .icon-circle {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 2.2rem;
    }
    .guide-card h5 {
        font-size: 1.3rem;
        color: var(--dark-color);
        margin-bottom: 15px;
    }
    .guide-card p {
        color: #666;
    }
    /* Expedition Section */
    .expedition-section {
        padding: 80px 0;
        text-align: center;
    }
    .expedition-section h2 {
        color: var(--primary-color);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 40px;
    }
    .choice-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }
    .choice-box {
        background: white;
        border-radius: 12px;
        padding: 40px 30px;
        width: 300px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .choice-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    .choice-box i {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 20px;
    }
    .choice-box h4 {
        font-size: 1.3rem;
        color: var(--dark-color);
        margin-bottom: 20px;
    }
    .btn-professional {
        display: inline-block;
        padding: 10px 25px;
        background: var(--primary-color);
        color: white;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .btn-professional:hover {
        background: var(--secondary-color);
        color: white;
        transform: scale(1.05);
    }
    .whatsapp-btn:hover, .messenger-btn:hover {
        transform: scale(1.1);
    }

    /* Nouveaux styles pour la boîte large responsive */
    .wide-choice-box {
        background: white;
        border-radius: 12px;
        padding: 40px 30px;
        width: 100%;
        max-width: 630px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 auto;
    }
    .wide-choice-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    .wide-choice-box i {
        font-size: 4rem;
        color: var(--primary-color);
        margin-bottom: 20px;
    }
    .wide-choice-box h4 {
        font-size: 1.7rem;
        color: var(--dark-color);
        margin-bottom: 20px;
        text-align: center;
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
        .hero-section {
            height: 50vh;
        }
        .hero-section h1 {
            font-size: 2.5rem;
        }
        .sub-title {
            font-size: 1.2rem;
        }
    }
    @media (max-width: 767.98px) {
        .hero-section {
            height: 40vh;
        }
        .hero-section h1 {
            font-size: 2rem;
        }
        .guide-section h2, .expedition-section h2 {
            font-size: 2rem;
        }
        .choice-container {
            flex-direction: column;
            align-items: center;
        }
        .wide-choice-box {
            padding: 30px 20px;
            width: 90%;
        }
        .wide-choice-box i {
            font-size: 3rem;
        }
        .wide-choice-box h4 {
            font-size: 1.4rem;
        }
    }
    @media (max-width: 575.98px) {
        .hero-section {
            height: 35vh;
        }
        .hero-section h1 {
            font-size: 1.8rem;
        }
        .sub-title {
            font-size: 1rem;
        }
        .wide-choice-box {
            padding: 25px 15px;
        }
        .wide-choice-box i {
            font-size: 2.5rem;
        }
        .wide-choice-box h4 {
            font-size: 1.2rem;
        }
        .btn-professional {
            padding: 8px 20px;
            font-size: 0.9rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section" style="background-image: url('/assets/images/im.jpg');">
    <div class="hero-content">
        <h1 class="display-4">EXPÉDITION</h1>
        <span class="sub-title">Expédition &gt; Envoyer votre colis</span>
    </div>
</section>

<!-- Section Comment ça marche -->
<section class="guide-section">
    <div class="container">
        <h2>Comment ça marche ?</h2>
        <p class="subtitle">Envoyer un colis n'a jamais été aussi simple :</p>
        <div class="row gy-4">
            <div class="col-md-4">
                <div class="guide-card">
                    <div class="icon-circle">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h5>Choisissez votre destination</h5>
                    <p>Déterminez les lieux d'envoi et de réception de votre colis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="guide-card">
                    <div class="icon-circle">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h5>Complétez les informations</h5>
                    <p>Indiquez le type, le poids et le mode d'expédition de votre colis.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="guide-card">
                    <div class="icon-circle">
                        <i class="fas fa-search-location"></i>
                    </div>
                    <h5>Validez et suivez</h5>
                    <p>Obtenez votre numéro de suivi et suivez votre colis en temps réel.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Expédition -->
<section class="expedition-section">
    <div class="container">
        <h2>Envoyez vos colis en quelques clics !</h2>
        <div class="choice-container">
            <div class="wide-choice-box">
                <i class="fas fa-shipping-fast"></i>
                <h4>Expédier un colis</h4>
                <a href="{{ route('colis.index') }}" class="btn-professional">Expédier</a>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
    // WhatsApp Button Functionality (sécurisé)
    if(document.getElementById("whatsappButton")) {
        document.getElementById("whatsappButton").addEventListener("click", function(event) {
            event.preventDefault();
            const selectBox = document.getElementById("whatsappSelect");
            if (selectBox.classList.contains("d-none")) {
                selectBox.classList.remove("d-none");
            } else {
                selectBox.classList.add("d-none");
            }
        });
    }
    if(document.getElementById("whatsappSelect")) {
        document.getElementById("whatsappSelect").addEventListener("change", function() {
            const numero = this.value.trim();
            if (numero) {
                const message = encodeURIComponent("Bonjour, je vous contacte via WhatsApp !");
                const lienWhatsApp = "https://api.whatsapp.com/send?phone=" + numero + "&text=" + message;
                window.location.href = lienWhatsApp;
                this.classList.add("d-none");
            }
        });
    }
</script>
@endsection