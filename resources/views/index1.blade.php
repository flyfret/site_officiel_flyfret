@extends('layouts.app')
@section('title', 'FlyFret - Accueil')
@section('ChildContent')
@php
    $currentRoute = request()->route()->getName();
    $expeditionRoutes = ['index12', 'suiviColis'];
    $isExpeditionActive = in_array($currentRoute, $expeditionRoutes);
@endphp

<!-- Hero Slider with Carousel -->
<section class="hero-slider" style=" min-height: 80vh; position: relative; overflow: hidden; background-color: #2d2f31;">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel"> <!-- Added carousel-fade for smooth transition -->
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        
        <!-- Slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="min-height: 80vh; background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/assets/images/slider/slider-1.jpg') center/cover no-repeat;">
                <div class="container h-100 d-flex align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="mb-4" style="font-size: 2.5rem; line-height: 1.3; color: #fff; font-weight: 700;">
                                FlyFret - Votre partenaire logistique entre <br> la Côte d'Ivoire et la France
                            </h1>
                            <p class="lead mb-5" style="font-size: 1.25rem; color: rgba(255,255,255,0.9);">
                                Un service d'expédition rapide, sécurisé et parfaitement adapté à vos besoins personnels et professionnels
                            </p>
                            <div class="slider-btns-responsive">
                                <a href="/envoi-colis" class="slider-btn slider-btn-primary">Envoyer un colis</a>
                                <a href="{{route('suiviColis')}}" class="slider-btn slider-btn-secondary">Suivre l'acheminement</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-item" style="min-height: 80vh; background: linear-gradient(rgba(123, 1, 247, 0.3), rgba(123, 1, 247, 0.3)), url('/assets/images/slider/imageAccueil.jpg') center/cover no-repeat;">
                <div class="container h-100 d-flex align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="mb-4" style="font-size: 2.5rem; line-height: 1.3; color: #fff; font-weight: 700;">
                                Excellence logistique entre <br> la Côte d'Ivoire et la France
                            </h1>
                            <p class="lead mb-5" style="font-size: 1.25rem; color: rgba(255,255,255,0.9);">
                                Solutions sur mesure pour vos envois internationaux avec suivi en temps réel
                            </p>
                            <div class="slider-btns-responsive">
                                <a href="/envoi-colis" class="slider-btn slider-btn-primary">Envoyer un colis</a>
                                <a href="{{route('suiviColis')}}" class="slider-btn slider-btn-secondary">Suivre l'acheminement</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 (Added) -->
            <div class="carousel-item" style="min-height: 80vh; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/images/slider/bateau.jpg') center/cover no-repeat;">
                <div class="container h-100 d-flex align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="mb-4" style="font-size: 2.5rem; line-height: 1.3; color: #fff; font-weight: 700;">
                                Livraison rapide et sécurisée <br> pour tous vos colis
                            </h1>
                            <p class="lead mb-5" style="font-size: 1.25rem; color: rgba(255,255,255,0.9);">
                                Des solutions adaptées à chaque besoin, avec un suivi précis et un accompagnement personnalisé
                            </p>
                            <div class="slider-btns-responsive">
                                <a href="/envoi-colis" class="slider-btn slider-btn-primary">Envoyer un colis</a>
                                <a href="{{route('suiviColis')}}" class="slider-btn slider-btn-secondary">Suivre l'acheminement</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Offers Section -->
<section class="section-padding" style="padding: 80px 0;">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 style="font-size: 2rem; color: #8022F4; margin-bottom: 15px;">DÉCOUVREZ NOS OFFRES !</h2>
            <p class="section-subtitle" style="font-size: 1.25rem; color: #6c757d; max-width: 700px; margin: 0 auto;">
                Destinations principales
            </p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="offer-card h-100 w-100">
                    <div class="offer-icon mb-3">
                        <i class="fas fa-plane fa-3x"></i>
                    </div>
                    <h3 style="font-size: 1.5rem; color: #8022F4;">📦 Abidjan ↔ Paris</h3>
                    <p style="font-size: 1.1rem; color: #555;">
                        Expédiez vos colis entre Abidjan et Paris avec un service optimisé, des délais maîtrisés et un suivi en temps réel.
                    </p>
                    <a href="#" class="cta-btn mt-auto">Voir les détails</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="offer-card h-100 w-100">
                    <div class="offer-icon mb-3">
                        <i class="fas fa-shipping-fast fa-3x"></i>
                    </div>
                    <h3 style="font-size: 1.5rem; color: #8022F4;">📦 Abidjan ↔ Lyon</h3>
                    <p style="font-size: 1.1rem; color: #555;">
                        Optez pour notre service premium avec assurance incluse pour garantir la sécurité de vos colis les plus précieux.
                    </p>
                    <a href="#" class="cta-btn mt-auto">Voir les détails</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="offer-card h-100 w-100">
                    <div class="offer-icon mb-3">
                        <i class="fas fa-truck fa-3x"></i>
                    </div>
                    <h3 style="font-size: 1.5rem; color: #8022F4;">📦 Abidjan ↔ Nancy</h3>
                    <p style="font-size: 1.1rem; color: #555;">
                        Bénéficiez d'un accompagnement complet pour vos envois vers Nancy.
                    </p>
                    <a href="#" class="cta-btn mt-auto">Voir les détails</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Next Departures Section -->
<section class="section-padding bg-light" style="padding: 80px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="/assets/images/achivement/2.png" alt="Prochains départs" class="img-fluid rounded-3 shadow" loading="lazy">
            </div>
            
            <div class="col-lg-6">
                <div class="departures-box p-5 rounded shadow-sm bg-white w-100">
                    <h2 class="mb-4" style="color: #8022F4; font-size: 1.8rem;">
                        <i class="fas fa-plane-departure me-2"></i>
                        PROCHAINS DÉPARTS DE COLIS !
                    </h2>
                    <p class="mb-4" style="font-size: 1.1rem; color: #555;">
                        <i class="fas fa-sync-alt me-2"></i>
                        Des départs réguliers pour mieux vous servir
                    </p>
                    
                    <div class="departure-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="me-4">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </div>
                            <div>
                                <h4 style="font-size: 1.25rem; color: #333;">Expéditions hebdomadaires Abidjan - France</h4>
                                <p style="color: #666;">
                                    <i class="fas fa-clock me-2"></i>
                                    Chaque mardi
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="departure-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="me-4">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-bolt"></i>
                                </div>
                            </div>
                            <div>
                                <h4 style="font-size: 1.25rem; color: #333;">Option express disponible</h4>
                                <p style="color: #666;">
                                    <i class="fas fa-shipping-fast me-2"></i>
                                    Livraison en 3 à 5 jours ouvrés selon la destination
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#" class="btn btn-primary mt-3 px-4 py-2">
                        <i class="fas fa-info-circle me-2"></i>En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5 bg-light" style="padding: 80px 0;">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 style="font-size: 2rem; color: #8022F4; margin-bottom: 15px;">TÉMOIGNAGES DE NOS CLIENTS</h2>
            <p class="section-subtitle" style="font-size: 1.25rem; color: #6c757d; max-width: 700px; margin: 0 auto;">
                Découvrez ce que nos clients disent de nos services
            </p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card h-100 w-100">
                    <div class="testimonial-rating mb-3 text-center">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text mb-4 text-center" style="font-style: italic; font-size: 1.1rem;">
                        "FlyFret a dépassé mes attentes ! Mon colis est arrivé à Paris en avance, intact et parfaitement scellé. Un service de qualité que je recommande à tous."
                    </p>
                    <div class="testimonial-author d-flex align-items-center justify-content-center">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Kouadio S." class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <h5 style="font-size: 1.1rem; margin-bottom: 0;">Kouadio S.</h5>
                            <small style="color: #777;">Acheteur international</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card h-100 w-100">
                    <div class="testimonial-rating mb-3 text-center">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p class="testimonial-text mb-4 text-center" style="font-style: italic; font-size: 1.1rem;">
                        "Première expérience avec FlyFret et très satisfaite. Le colis est arrivé intact et le prix était très compétitif par rapport aux autres transporteurs."
                    </p>
                    <div class="testimonial-author d-flex align-items-center justify-content-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Aïssata T." class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <h5 style="font-size: 1.1rem; margin-bottom: 0;">Aïssata T.</h5>
                            <small style="color: #777;">Étudiante en France</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="testimonial-card h-100 w-100">
                    <div class="testimonial-rating mb-3 text-center">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p class="testimonial-text mb-4 text-center" style="font-style: italic; font-size: 1.1rem;">
                        "Vraiment Flyfret vous êtes les meilleurs, rapidité du transfert des colis, à l'écoute du client. Chaque fin semaine mes colis sont devant moi et intact."
                    </p>
                    <div class="testimonial-author d-flex align-items-center justify-content-center">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Fabrice A." class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <h5 style="font-size: 1.1rem; margin-bottom: 0;">Fabrice A.</h5>
                            <small style="color: #777;">Client achat en ligne</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center g-4" style="backdrop-filter: blur(2px); background:  border-radius: 18px;">
            <div class="col-12 col-md-5 mb-4 mb-md-0">
                <div class="expertise-card p-4 rounded shadow text-center h-100 d-flex flex-column justify-content-center" style="background: #2d2f31cc;">
                    <h4 class="mb-0" style="font-weight:600; font-size:1.25rem; color:#fff;">
                        <i class="fas fa-globe-africa me-2" style="color:#ffffç;"></i>
                        Une expertise cumulée de plusieurs années dans la logistique internationale
                    </h4>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card p-3 rounded shadow-sm text-center h-100" style="background: #2d2f31cc;">
                    <div class="display-4 fw-bold mb-2" style="color:#ffff;">
                        <i class="fas fa-users me-2"></i>+200
                    </div>
                    <div class="stat-label" style="font-size:1.1rem; color:#e0e0e0;">Clients satisfaits</div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="stat-card p-3 rounded shadow-sm text-center h-100" style="background: #2d2f31cc;">
                    <div class="display-4 fw-bold mb-2" style="color:#ffff;">
                        <i class="fas fa-box-open me-2"></i>+1000
                    </div>
                    <div class="stat-label" style="font-size:1.1rem; color:#e0e0e0;">Colis livrés</div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Partners Section -->
<section class="partners-section section-padding">
    <div class="container">
        <div class="section-title">
            <h2>Nos Partenaires</h2>
            <p class="section-subtitle" style="font-size: 1.125rem; color: #6c757d;padding-top: 1rem;">
                Nos partenaires de confiance
                FlyFret travaille avec des leaders mondiaux de la logistique pour garantir un service d'expédition fiable, rapide et sécurisé à chaque envoi.
            </p>
        </div>
        
        <div class="partners-grid">
            <div class="partner-card">
                <img src="/assets/images/icon/i1 (2).png" alt="Partenaire 1" loading="lazy">
            </div>
            <div class="partner-card">
                <img src="/assets/images/icon/ic2 (2).png" alt="Partenaire 2" loading="lazy">
            </div>
            <div class="partner-card">
                <img src="/assets/images/icon/ic3 .png" alt="Partenaire 3" loading="lazy">
            </div>
            <div class="partner-card">
                <img src="/assets/images/icon/ic4.png" alt="Partenaire 4" loading="lazy">
            </div>
            <div class="partner-card">
                <img src="/assets/images/icon/ic5.png" alt="Partenaire 5" loading="lazy">
            </div>
        </div>
    </div>
</section>

<style>
/* Global Styles */
:root {
    --primary-color: #8022F4;
    --secondary-color: #F20CF3;
    --dark-color: #2d2f31;
    --light-color: #f8f9fa;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Hero Slider with Carousel */
.hero-slider {
    position: relative;
}

.hero-slider .carousel {
    height: 100%;
}

.hero-slider .carousel-inner {
    height: 100%;
}

.hero-slider .carousel-item {
    height: 80vh;
    min-height: 80vh;
    background-position: center;
    background-size: cover;
    display: flex;
    align-items: center;
    transition: opacity 1s ease-in-out; /* Added for smooth transition */
}

.hero-slider .carousel-indicators {
    bottom: 30px;
}

.hero-slider .carousel-indicators button {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin: 0 8px;
    background-color: rgba(255,255,255,0.5);
    border: none;
}

.hero-slider .carousel-indicators button.active {
    background-color: var(--primary-color);
}

.hero-slider .carousel-control-prev,
.hero-slider .carousel-control-next {
    width: 50px;
    height: 50px;
    background-color: rgba(0,0,0,0.3);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    opacity: 1;
    transition: all 0.3s ease;
}

.hero-slider .carousel-control-prev {
    left: 30px;
}

.hero-slider .carousel-control-next {
    right: 30px;
}

.hero-slider .carousel-control-prev:hover,
.hero-slider .carousel-control-next:hover {
    background-color: var(--primary-color);
}

/* Buttons */
.slider-btn {
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    display: inline-block;
    margin: 0 10px;
    text-align: center;
    font-size: 1.1rem;
}

.slider-btn-primary {
    background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white !important;
    border: none;
}

.slider-btn-secondary {
    background: transparent;
    color: white !important;
    border: 2px solid white;
}

.slider-btn-secondary:hover {
    background: white;
    color: var(--primary-color) !important;
}

/* Cards */
.offer-card, .testimonial-card, .departures-box {
    background: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    width: 100%;
}

.offer-card:hover, .testimonial-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.offer-icon {
    color: var(--primary-color);
    margin-bottom: 20px;
    text-align: center;
}

.cta-btn {
    display: inline-block;
    padding: 10px 20px;
    background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white !important;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    width: 100%;
    max-width: 200px;
    margin: 0 auto;
    display: block;
}

.cta-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(123,1,247,0.3);
}

/* Departures */
.icon-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.bg-primary {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
}

.bg-success {
    background: #28a745 !important;
}

/* Testimonials */
.testimonial-rating {
    color: #FFD700;
    font-size: 1.2rem;
}

.testimonial-text {
    text-align: center;
}

.testimonial-author {
    justify-content: center;
}

/* Responsive */
@media (max-width: 767.98px) {
    .hero-slider {
        min-height: 70vh;
        /* padding-top: 60px; */
    }
    
    .hero-slider .carousel-item {
        height: 70vh;
        min-height: 70vh;
    }
    
    h1 {
        font-size: 2rem !important;
    }
    
    .slider-btns-responsive {
        flex-direction: column;
    }
    
    .slider-btn {
        width: 100%;
        margin: 5px 0 !important;
    }
    
    .offer-card, .testimonial-card {
        padding: 20px;
    }
    
    .hero-slider .carousel-control-prev,
    .hero-slider .carousel-control-next {
        width: 40px;
        height: 40px;
    }
    
    .hero-slider .carousel-control-prev {
        left: 15px;
    }
    
    .hero-slider .carousel-control-next {
        right: 15px;
    }
}

@media (max-width: 991.98px) {
    .offer-card, .testimonial-card {
        max-width: 100%;
    }
}

/* Added for smooth carousel transition */
.carousel-fade .carousel-item {
    opacity: 0;
    transition-property: opacity;
    transform: none;
}

.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-start,
.carousel-fade .carousel-item-prev.carousel-item-end {
    opacity: 1;
}

.carousel-fade .active.carousel-item-start,
.carousel-fade .active.carousel-item-end {
    opacity: 0;
}

.carousel-fade .carousel-item-next,
.carousel-fade .carousel-item-prev,
.carousel-fade .carousel-item.active,
.carousel-fade .active.carousel-item-start,
.carousel-fade .active.carousel-item-prev {
    transform: none;
}
</style>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Initialize carousel with autoplay
document.addEventListener('DOMContentLoaded', function() {
    const heroCarousel = new bootstrap.Carousel(document.getElementById('heroCarousel'), {
        interval: 5000, // Change slide every 5 seconds
        ride: 'carousel',
        wrap: true
    });
    
    // Pause on hover
    const carouselElement = document.getElementById('heroCarousel');
    carouselElement.addEventListener('mouseenter', function() {
        heroCarousel.pause();
    });
    carouselElement.addEventListener('mouseleave', function() {
        heroCarousel.cycle();
    });
});
</script>
@endsection