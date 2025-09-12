@extends('layouts.app')
@section('title', 'À propos de FlyFret - Transport international de colis') 
@section('ChildContent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Custom CSS -->
<style>
    :root {
        --primary-color: #8a2be2;  /* Violet plus vif */
        --secondary-color: #ff69b4;  /* Rose vif */
        --white: #ffffff;
        --dark-purple: #8a2be2;  /* Indigo */
    }
    
    /* Page Header - Version améliorée */
    .page-header {
        background: rgba(138, 43, 226, 0.8);
        background-size: cover;
        background-position: center;
        background-blend-mode: overlay;
        padding: 120px 0 70px;
        background-image: url('https://images.unsplash.com/photo-1434626881859-194d67b2b86f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
        color: var(--white);
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .page-header h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 25px;
        text-shadow: 0 2px 8px rgba(0,0,0,0.4);
        position: relative;
        z-index: 2;
    }
    
    .page-header p {
        font-size: 1.3rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.95;
        position: relative;
        z-index: 2;
        line-height: 1.6;
    }
    
    /* About Section */
    .about-section {
        padding: 80px 0;
    }
    
    .about-content {
        display: flex;
        align-items: center;
        gap: 40px;
    }
    
    .about-text {
        flex: 1;
    }
    
    .about-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(138, 43, 226, 0.2);
    }
    
    .about-image img {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease;
    }
    
    .about-image:hover img {
        transform: scale(1.05);
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 30px;
        color: var(--dark-purple);
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 50%;
        height: 4px;
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        border-radius: 2px;
    }
    
    /* Mission Section */
    .mission-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8e6fa, #fff0f5);
    }
    
    .mission-card {
        background: var(--white);
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.1);
        text-align: center;
        border: 1px solid rgba(138, 43, 226, 0.1);
    }
    
    .mission-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 20px;
    }
    
    /* Stats Section */
    .stats-section {
        padding: 80px 0;
    }
    
    .stat-card {
        border: 1px solid #232526;
        box-shadow: 0 2px 16px rgba(0,0,0,0.10);
        min-height: 120px;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--primary-color);
    }
      
    .stat-card .display-4 {
        font-size: 2.5rem;
    }
    .stat-label {
        font-size: 1.2rem;
        color: #555;
    }
    
    /* Values Section */
    .values-section {
        padding: 80px 0;
    }
    
    .value-card {
        background: var(--white);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.1);
        margin-bottom: 30px;
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid rgba(138, 43, 226, 0.1);
    }
    
    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(138, 43, 226, 0.2);
    }
    
    .value-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin: 0 auto 25px;
    }
    
    .value-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: var(--dark-purple);
        text-align: center;
    }
    
    .value-card p {
        color: #555;
        margin-bottom: 20px;
        text-align: center;
    }
    
    /* Team Section */
    .team-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #fff0f5, #f8e6fa);
    }
    
    .team-card {
        background: var(--white);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.1);
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(138, 43, 226, 0.2);
    }
    
    .team-image {
        height: 250px;
        overflow: hidden;
    }
    
    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .team-card:hover .team-image img {
        transform: scale(1.1);
    }
    
    .team-info {
        padding: 25px;
        text-align: center;
    }
    .team-info h4 {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-purple);
    }
    .team-info p {
        color: var(--primary-color);
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    .team-name {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-purple);
    }
    
    .team-position {
        color: var(--primary-color);
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    /* Services Section */
    .services-section {
        padding: 80px 0;
    }
    
    .service-card {
        background: var(--white);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.1);
        margin-bottom: 30px;
        transition: all 0.3s ease;
        text-align: center;
        height: 100%;
    }
    
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(138, 43, 226, 0.2);
    }
    .service-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: var(--dark-purple);
    }
    .service-card p {
        color: #555;
        margin-bottom: 20px;
        line-height: 1.6;
        font-size: 1rem;
    }
    .service-icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 20px;
    }
    
    /* CTA Section */
    .cta-section {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--dark-purple), var(--primary-color));
        color: var(--white);
        text-align: center;
    }
    
    .cta-section h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .cta-section p {
        font-size: 1.5rem;
        max-width: 700px;
        margin: 0 auto 30px;
    }
    
    .cta-btn {
        display: inline-block;
        padding: 12px 30px;
        background: var(--white);
        color: var(--dark-purple);
        border-radius: 30px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        text-decoration: none;
        margin: 10px;
    }
    
    .cta-btn:hover {
        background: rgba(255, 255, 255, 0.9);
        color: var(--dark-purple);
        transform: translateY(-3px);
    }
    
    .cta-btn.secondary {
        background: transparent;
        border: 2px solid var(--white);
        color: var(--white);
    }
    
    .cta-btn.secondary:hover {
        background: rgba(255, 255, 255, 0.1);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 991.98px) {
        .about-content {
            flex-direction: column;
        }
        
        .about-text {
            margin-bottom: 30px;
        }
        
        .page-header h1 {
            font-size: 2.8rem;
        }
    }
    
    @media (max-width: 767.98px) {
        .page-header {
            padding: 90px 0 50px;
        }
        
        .page-header h1 {
            font-size: 2.3rem;
        }
        
        .page-header p {
            font-size: 1.1rem;
            padding: 0 20px;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 575.98px) {
        .page-header h1 {
            font-size: 2rem;
        }
        
        .page-header p {
            font-size: 1rem;
        }
        
        .cta-section h2 {
            font-size: 1.8rem;
        }
        
        .cta-btn {
            display: block;
            margin: 10px auto;
            max-width: 200px;
        }
    }
</style>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>FlyFret International Group</h1>
        <p>Votre partenaire de confiance pour le transport international de colis entre la Côte d'Ivoire, la France et les États-Unis</p>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <h2 class="section-title">Notre Histoire</h2>
        <div class="about-content">
            <div class="about-text">
                <p>Lancée en février 2023, FlyFret est née d'une volonté simple : offrir une alternative efficace et humaine au transport classique entre la Côte d'Ivoire et l'Europe.</p>
                <p>D'abord centrée sur le fret aérien entre Abidjan et Paris, l'entreprise s'est rapidement développée, avec l'ouverture d'antennes à Lyon, Nancy, puis aux États-Unis via un service maritime étendu.</p>
                <p>Face à une forte demande, nous avons également lancé des services complémentaires : assistance visa, formation à la commande en ligne, et livraison à domicile.</p>
                <p>Aujourd'hui, FlyFret est portée par une équipe jeune, dynamique et engagée pour offrir une logistique fluide, transparente et centrée sur le client.</p>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Équipe FlyFret">
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission-section">
    <div class="container">
        <div class="mission-card">
            <div class="mission-icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <h2 class="section-title text-center">Notre Mission</h2>
            <p class="lead text-center">Rendre le transport international simple, rapide et accessible à tous, qu'il s'agisse de colis personnels, commerciaux, ou de projets logistiques d'envergure.</p>
            <p class="text-center">FlyFret, c'est aussi un service de proximité, une assistance visa complète, et des solutions digitales pour former et accompagner nos clients dans leurs besoins d'import-export.</p>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center g-4" style="backdrop-filter: blur(2px); background:  border-radius: 18px;">
            <div class="col-12 col-md-5 mb-4 mb-md-0">
                <div class="expertise-card p-4 rounded shadow text-center h-100 d-flex flex-column justify-content-center" style="background: #2d2f31cc;">
                    <h4 class="mb-0" style="font-weight:600; font-size:1.25rem; color:#ffff;">
                        <i class="fas fa-globe-africa me-2" style="color:#ffff;"></i>
                        Une expertise cumulée de plusieurs années dans la logistique internationale
                    </h4>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card p-4 rounded shadow-sm text-center h-100" style="background: #2d2f31cc;">
                    <div class="display-4 fw-bold mb-2" style="color:#ffff;">
                        <i class="fas fa-users me-2"></i>+200
                    </div>
                    <div class="stat-label" style="font-size:1.1rem; color:#e0e0e0;">Clients satisfaits</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card p-4 rounded shadow-sm text-center h-100" style="background: #2d2f31cc;">
                    <div class="display-4 fw-bold mb-2" style="color:#ffff;">
                        <i class="fas fa-box-open me-2"></i>+1000
                    </div>
                    <div class="stat-label" style="font-size:1.1rem; color:#e0e0e0;">Colis livrés</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Nos Valeurs</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Sécurité</h3>
                    <p>Nous veillons à ce que chaque colis arrive à destination dans les meilleures conditions. Notre système de suivi et nos procédures douanières garantissent la traçabilité et la sécurité de chaque envoi.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Rapidité</h3>
                    <p>Le temps est précieux. FlyFret mise sur une organisation agile et un réseau logistique fiable pour livrer vos colis en temps record, avec des délais maîtrisés et une réactivité immédiate.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Fiabilité</h3>
                    <p>Nous respectons nos engagements. FlyFret reste votre partenaire de confiance, travaillant avec des transporteurs agréés pour vous garantir une constance dans la qualité de nos services.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Proximité</h3>
                    <p>Chaque client est accompagné comme un partenaire. Notre service client est à votre écoute 7j/7 pour vous conseiller, vous rassurer et vous assister à chaque étape.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Nos Services</h2>
        <div class="row">
            <div class="col-md-4" style="margin-bottom: 20px;">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-plane"></i>
                    </div>
                    <h3>Transport Express</h3>
                    <p>Envoi rapide de colis par voie aérienne pour une livraison en temps record entre la Côte d'Ivoire, la France et les États-Unis.</p>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 20px;">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-ship"></i>
                    </div>
                    <h3>Transport Maritime</h3>
                    <p>Solution économique pour les envois volumineux ou moins urgents, avec un suivi rigoureux de votre marchandise.</p>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 20px;">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-passport"></i>
                    </div>
                    <h3>Assistance Visa</h3>
                    <p>Accompagnement personnalisé pour l'obtention de visa France, avec un suivi rigoureux de votre dossier.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Formation</h3>
                    <p>Formation à la commande en ligne et accompagnement dans vos projets d'import-export.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Livraison</h3>
                    <p>Livraison à domicile ou en point relais dans tous les États américains et les principales villes desservies.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Support Client</h3>
                    <p>Assistance 7j/7 via WhatsApp, email ou en agence pour répondre à toutes vos questions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Notre Équipe</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Équipe logistique">
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Pôle Logistique</h4>
                        <p class="team-position">Réception, conditionnement et livraison</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Équipe visa">
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Pôle Assistance Visa</h4>
                        <p class="team-position">Accompagnement personnalisé</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Équipe digitale">
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Pôle Digital & Formation</h4>
                        <p class="team-position">Communication et plateformes</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1573497620053-ea5300f94f21?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Service client">
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Pôle Relation Client</h4>
                        <p class="team-position">Accueil et fidélisation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Prêt à expédier avec nous ?</h2>
        <p>FlyFret s'occupe de tout : transport express par avion ou économique par bateau, assistance visa, formation et livraison à domicile.</p>
        <div>
            <a href="{{route('colis.index')}}" class="cta-btn">Envoyer un colis</a>
            <a href="{{route('contact')}}" class="cta-btn secondary">Contactez-nous</a>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
    // Animation for stats counting
    document.addEventListener('DOMContentLoaded', function() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        statNumbers.forEach(stat => {
            const target = +stat.innerText.replace('+', '').replace('%', '');
            const increment = target / 100;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    clearInterval(timer);
                    stat.innerText = target + (stat.innerText.includes('+') ? '+' : (stat.innerText.includes('%') ? '%' : ''));
                } else {
                    stat.innerText = Math.floor(current) + ( stat.innerText.includes('+') ? '+' : (stat.innerText.includes('%') ? '%' : ''));
                }
            }, 20);
        });
    });
</script>

@endsection