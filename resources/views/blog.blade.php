@extends('layouts.app')
@section('title', 'FlyFret - Blog') 
@section('ChildContent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #8022F4; /* Violet */
            --secondary-color: #F20CF3; /* Rose vif */
            --dark-color: #2c3e50;
            --light-color: #f8f9fa;
            --white: #ffffff;
            --black: #000000;
            --light-gray: #f5f5f6;
            --medium-gray: #e1e2e1;
            --dark-gray: #8022F4;
        }
      
        .blog-hero {
            background: linear-gradient(#8022F4, #F20CF3), 
                url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            padding: 120px 0 80px;
            color: white;
            text-align: center;
            margin-bottom: 60px;
        }
        
        .blog-hero h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .blog-hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }
        
        .section-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 4px;
            background: var(--secondary-color);
        }
        
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }
        
        .content-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            background: #000;
            overflow: hidden;
        }
        
        .video-wrapper video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .card-body {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
            line-height: 1.4;
        }
        
        .card-text {
            color: var(--dark-gray);
            margin-bottom: 20px;
            flex-grow: 1;
        }
        
        .card-meta {
            font-size: 0.85rem;
            color: var(--dark-gray);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
        }
        
        .card-meta i {
            margin-right: 5px;
            color: var(--secondary-color);
        }
        
        .badge-category {
            background-color: var(--secondary-color);
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .testimonials-section {
            background: var(--light-gray);
            padding: 80px 0;
            margin-top: 60px;
        }
        
        .testimonials-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            position: relative;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
        }
        
        .testimonial-card:before {
            content: '"';
            font-size: 5rem;
            color: var(--medium-gray);
            position: absolute;
            top: 10px;
            left: 20px;
            line-height: 1;
            opacity: 0.3;
        }
        
        .testimonial-text {
            font-style: italic;
            color: var(--dark-gray);
            position: relative;
            z-index: 1;
            padding-left: 20px;
            margin-bottom: 20px;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            margin-top: 20px;
            padding-left: 20px;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }
        
        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .author-info h4 {
            font-size: 1rem;
            margin: 0;
            color: var(--primary-color);
        }
        
        .author-info p {
            font-size: 0.85rem;
            color: var(--dark-gray);
            margin: 3px 0 0;
        }
        
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 60px 0;
            text-align: center;
            color: white;
        }
        
        .cta-title {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        
        .cta-btn {
            display: inline-block;
            background: var(--white);
            color: var(--primary-color);
            padding: 12px 30px;
            border-radius: 4px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .cta-btn:hover {
            background: rgba(255, 255, 255, 0.9);
            color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        /* Services Section */
        .services-section {
            padding: 80px 0;
            background-color: var(--light-color);
        }
        
        .service-card {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
            text-align: center;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .service-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }
        
        .service-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        /* Blog Sidebar */
        .blog-sidebar {
            padding-left: 30px;
        }
        
        .sidebar-widget {
            background: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        
        .widget-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-gray);
        }
        
        .recent-post {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .recent-post:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .recent-post-img {
            width: 80px;
            height: 60px;
            border-radius: 4px;
            overflow: hidden;
            margin-right: 15px;
        }
        
        .recent-post-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .recent-post-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .recent-post-title a {
            color: var(--dark-color);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .recent-post-title a:hover {
            color: var(--secondary-color);
        }
        
        .recent-post-date {
            font-size: 0.75rem;
            color: var(--dark-gray);
        }
        
        .tag-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .tag-cloud a {
            display: inline-block;
            padding: 5px 12px;
            background-color: var(--light-gray);
            color: var(--dark-color);
            border-radius: 20px;
            font-size: 0.8rem;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .tag-cloud a:hover {
            background-color: var(--secondary-color);
            color: white;
        }
        
        /* Responsive Styles */
        @media (max-width: 1200px) {
            .content-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }
        
        @media (max-width: 992px) {
            .blog-hero {
                padding: 100px 0 70px;
            }
            
            .blog-hero h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .testimonials-container {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
            
            .blog-sidebar {
                padding-left: 0;
                margin-top: 50px;
            }
        }
        
        @media (max-width: 768px) {
            .blog-hero {
                padding: 80px 0 60px;
            }
            
            .blog-hero h1 {
                font-size: 2.2rem;
            }
            
            .blog-hero p {
                font-size: 1.1rem;
                padding: 0 20px;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .section-title {
                font-size: 1.7rem;
                margin-bottom: 30px;
            }
            
            .testimonials-section {
                padding: 60px 0;
            }
            
            .testimonial-card {
                padding: 25px;
            }
            
            .testimonial-text {
                font-size: 0.95rem;
            }
        }
        
        @media (max-width: 576px) {
            .blog-hero {
                padding: 70px 0 50px;
            }
            
            .blog-hero h1 {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .testimonial-card {
                padding: 20px 15px;
                max-width: 100%;
            }
            
            .testimonial-card:before {
                font-size: 4rem;
                left: 10px;
            }
            
            .testimonial-text {
                padding-left: 10px;
            }
            
            .testimonial-author {
                padding-left: 10px;
            }
            
            .author-avatar {
                width: 45px;
                height: 45px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <h1>Expertise Logistique & Conseils Import-Export</h1>
            <p>Découvrez comment FlyFret révolutionne le transport international avec des solutions sur mesure pour vos besoins en fret aérien, maritime et transferts financiers.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="section-title">Nos derniers articles</h2>
                
                <div class="content-grid">
                    <!-- Article 1 -->
                    <div class="content-card">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="Fret aérien">
                        <div class="card-body">
                            <span class="badge-category">Fret aérien</span>
                            <h3 class="card-title">Optimiser vos envois par voie aérienne avec FlyFret</h3>
                            <p class="card-text">Découvrez nos stratégies exclusives pour réduire vos coûts de 20% tout en garantissant des délais de livraison ultra-rapides grâce à notre réseau de partenaires aériens premium.</p>
                            <div class="card-meta">
                                <span><i class="far fa-clock"></i> 12 min de lecture</span>
                                <span><i class="far fa-calendar-alt"></i> 15 Juin 2023</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">Lire l'article</a>
                        </div>
                    </div>
                    
                    <!-- Article 2 -->
                    <div class="content-card">
                        <img src="https://images.unsplash.com/photo-1549923746-c502d488b3ea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top" alt="Fret maritime">
                        <div class="card-body">
                            <span class="badge-category">Fret maritime</span>
                            <h3 class="card-title">Notre guide expert du fret maritime 2023</h3>
                            <p class="card-text">FlyFret vous révèle les meilleures pratiques pour vos envois maritimes : choix des conteneurs, optimisation des coûts, gestion des Incoterms et suivi en temps réel.</p>
                            <div class="card-meta">
                                <span><i class="far fa-clock"></i> 18 min de lecture</span>
                                <span><i class="far fa-calendar-alt"></i> 2 Juin 2023</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">Lire l'article</a>
                        </div>
                    </div>
                    
                    <!-- Article 3 -->
                    <div class="content-card">
                        <div class="video-wrapper">
                            <video controls >
                                <source src="{{ asset('assets/video/v2.mp4') }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture de vidéos.
                            </video>
                        </div>
                        <div class="card-body">
                            <span class="badge-category">Tutoriel</span>
                            <h3 class="card-title">Checklist FlyFret : Préparer une expédition internationale</h3>
                            <p class="card-text">Notre équipe d'experts partage les 10 étapes indispensables pour garantir le succès de vos opérations d'import-export et éviter les erreurs courantes.</p>
                            <div class="card-meta">
                                <span><i class="far fa-clock"></i> 8 min</span>
                                <span><i class="far fa-calendar-alt"></i> 20 Mai 2023</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Article 4 -->
                    <div class="content-card">
                        <img src="{{ asset('assets/img/int-transfert.jpg')}}" class="card-img-top" alt="Transfert d'argent">
                        <div class="card-body">
                            <span class="badge-category">Solutions financières</span>
                            <h3 class="card-title">Transferts internationaux : l'expertise FlyFret</h3>
                            <p class="card-text">Comparatif exclusif des solutions FlyFret pour vos transferts d'argent à l'international avec nos taux compétitifs et notre transparence sur les frais.</p>
                            <div class="card-meta">
                                <span><i class="far fa-clock"></i> 10 min de lecture</span>
                                <span><i class="far fa-calendar-alt"></i> 5 Mai 2023</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">Lire l'article</a>
                        </div>
                    </div>
                    
                    <!-- Article 5 -->
                    <div class="content-card">
                        <img src="{{ asset('assets/img/visa.jpg')}}" class="card-img-top" alt="Assistance voyage">
                        <div class="card-body">
                            <span class="badge-category">Assistance voyage</span>
                            <h3 class="card-title">Assistance voyage d'affaires en Afrique avec FlyFret</h3>
                            <p class="card-text">Notre service premium vous assiste pour préparer vos déplacements professionnels : conseils pour les visas, logistique, et protocole d'affaires avec notre réseau local.</p>
                            <div class="card-meta">
                                <span><i class="far fa-clock"></i> 15 min de lecture</span>
                                <span><i class="far fa-calendar-alt"></i> 22 Avril 2023</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">Lire l'article</a>
                        </div>
                    </div>
                    
                    <!-- Article 6 -->
                    <div class="content-card">
                        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="Achats internationaux">
                        <div class="card-body">
                            <span class="badge-category">E-commerce</span>
                            <h3 class="card-title">Acheter à l'international : le guide FlyFret</h3>
                            <p class="card-text">Nous vous aidons dans vos achats sur des sites comme SHEIN, Amazon, Zara et autres, avec notre service d'assistance et de conseils pour vos commandes internationales.</p>
                            <div class="card-meta">
                                <span><i class="far fa-clock"></i> 9 min de lecture</span>
                                <span><i class="far fa-calendar-alt"></i> 10 Avril 2023</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-3">Lire l'article</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4 blog-sidebar">
                <!-- About Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">FlyFret en bref</h4>
                    <p><strong>✈️ FlyFret - Expédiez plus vite, dépensez moins !</strong></p>
                    <p>Votre partenaire logistique de confiance, partout dans le monde. Avec FlyFret, dites adieu aux délais interminables et aux coûts imprévisibles.</p>
                    <p>Nous transformons vos besoins d'expédition en une solution simple, rapide et économique.</p>
                    <div class="video-wrapper mt-3">
                        <video controls >
                            <source src="{{ asset('assets/video/v1.mp4') }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos.
                        </video>
                    </div>
                </div>
                
                <!-- Services Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">Nos services premium</h4>
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-plane"></i></div>
                        <h5 class="service-title">Fret express</h5>
                        <p>Délais garantis avec suivi 24/7 pour vos envois urgents</p>
                    </div>
                    <div class="service-card mt-3">
                        <div class="service-icon"><i class="fas fa-ship"></i></div>
                        <h5 class="service-title">Fret maritime optimisé</h5>
                        <p>Solutions économiques pour vos gros volumes avec optimisation des coûts</p>
                    </div>
                    <div class="service-card mt-3">
                        <div class="service-icon"><i class="fas fa-handshake"></i></div>
                        <h5 class="service-title">Assistance douanière</h5>
                        <p>Conseils et accompagnement dans les processus de douane pour vos marchandises</p>
                    </div>
                </div>
                
                <!-- Recent Posts Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">Articles récents</h4>
                    <div class="recent-post">
                        <div class="recent-post-img">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Recent Post">
                        </div>
                        <div>
                            <h5 class="recent-post-title"><a href="#">Optimiser vos envois par fret aérien</a></h5>
                            <div class="recent-post-date">15 Juin 2023</div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="recent-post-img">
                            <img src="https://images.unsplash.com/photo-1549923746-c502d488b3ea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Recent Post">
                        </div>
                        <div>
                            <h5 class="recent-post-title"><a href="#">Guide complet du fret maritime</a></h5>
                            <div class="recent-post-date">2 Juin 2023</div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="recent-post-img">
                            <img src="{{ asset('assets/img/int-transfert.jpg')}}" alt="Recent Post">
                        </div>
                        <div>
                            <h5 class="recent-post-title"><a href="#">Transferts d'argent internationaux</a></h5>
                            <div class="recent-post-date">5 Mai 2023</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title">Nos clients témoignent</h2>
            
            <div class="testimonials-container">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <p class="testimonial-text">"Grâce à FlyFret, nous avons réduit nos délais de livraison de 30 % tout en gardant un budget maîtrisé. Leur expertise en fret aérien est inégalée sur le marché africain."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80" alt="Client testimonial">
                        </div>
                        <div class="author-info">
                            <h4>Amélie Dupont</h4>
                            <p>Directrice Logistique, PharmaCôte</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <p class="testimonial-text">"Un service impeccable et un suivi parfait pour nos exportations agricoles. FlyFret a simplifié nos procédures douanières et nous fait gagner un temps précieux chaque semaine."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Client testimonial">
                        </div>
                        <div class="author-info">
                            <h4>Jean Koffi</h4>
                            <p>CEO, AgroExport CI</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <p class="testimonial-text">"Le service transfert d'argent de FlyFret nous fait économiser des milliers d'euros chaque mois. Rapidité, transparence des frais et conseillers disponibles 24/7."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Client testimonial">
                        </div>
                        <div class="author-info">
                            <h4>Fatou Diop</h4>
                            <p>Directrice Financière, TextileSénégal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h3 class="cta-title">Prêt à expédier vos marchandises en toute confiance ?</h3>
            <p style="max-width: 600px; margin: 0 auto 30px; opacity: 0.9;">Contactez un expert FlyFret dès aujourd'hui et bénéficiez d'une analyse gratuite de vos flux logistiques.</p>
            <a href="{{ route('contact') }}" class="cta-btn">Demander une consultation</a>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('.content-card, .testimonial-card, .service-card').forEach(card => {
                observer.observe(card);
            });
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
@endsection