@extends('layouts.app')
@section('title', 'FlyFret - Paiement en agence')
@section('ChildContent')

    <style>
        :root {
            --primary-color: #7b01f7;
            --primary-light: #9a49f9;
            --secondary-color: #d90ad9;
            --dark-color: #2d3748;
            --light-color: #f7fafc;
            --white: #ffffff;
            --gray-light: #edf2f7;
            --gray: #e2e8f0;
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --danger-color: #f56565;
            --info-color: #4299e1;
        }

        /* Hero Section */
        .hero-section {
            background:
                linear-gradient(rgba(123, 1, 247, 0.85), rgba(217, 10, 217, 0.85)),
                url('/assets/images/office.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            padding: 0 20px;
        }
        .hero-content h1 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .hero-content .sub-title {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.92);
        }

        /* Main Content */
        .payment-container {
            max-width: 800px;
            margin: 60px auto;
            padding: 0 20px;
        }
        .payment-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 40px;
            border: 1px solid var(--gray);
        }
        .payment-header {
            background: var(--primary-color);
            color: var(--white);
            padding: 25px;
            text-align: center;
        }
        .payment-header h2 {
            font-size: 1.8rem;
            margin: 0;
            font-weight: 700;
        }
        .payment-body {
            padding: 40px;
        }
        .payment-icon {
            font-size: 5rem;
            color: var(--primary-color);
            margin-bottom: 25px;
            text-align: center;
        }
        .payment-message {
            text-align: center;
            margin-bottom: 40px;
        }
        .payment-message h3 {
            font-size: 1.5rem;
            color: var(--dark-color);
            margin-bottom: 15px;
        }
        .payment-message p {
            font-size: 1.1rem;
            color: var(--dark-color);
            opacity: 0.8;
            line-height: 1.6;
        }
        .order-number {
            background: var(--gray-light);
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 30px 0;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }
        .agencies-list {
            margin-top: 40px;
        }
        .agencies-title {
            text-align: center;
            font-size: 1.3rem;
            color: var(--dark-color);
            margin-bottom: 25px;
            font-weight: 600;
        }
        .agency-card {
            border: 1px solid var(--gray);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        .agency-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(123, 1, 247, 0.1);
        }
        .agency-name {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        .agency-address, .agency-hours {
            margin-bottom: 8px;
            display: flex;
            align-items: flex-start;
        }
        .agency-address i, .agency-hours i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 14px 32px;
            font-weight: 600;
            border-radius: 50px;
            font-size: 1.05rem;
            transition: all 0.3s;
            display: inline-block;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.10);
        }
        .btn-primary:hover {
            background-color: #6a00d4;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(123, 1, 247, 0.18);
            color: var(--white);
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 2rem;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .hero-section { height: 250px; }
            .hero-content h1 { font-size: 2.2rem; }
        }
        @media (max-width: 767.98px) {
            .payment-body { padding: 25px; }
            .hero-section { height: 200px; }
            .hero-content h1 { font-size: 1.8rem; }
        }
        @media (max-width: 575.98px) {
            .payment-body { padding: 20px; }
            .hero-section { height: 180px; }
            .hero-content h1 { font-size: 1.5rem; }
        }
    </style>

    <div class="payment-container">
        <div class="payment-card">
            <div class="payment-header">
                <h2>Merci pour votre confiance</h2>
            </div>
            <div class="payment-body">
                <div class="payment-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                
                <div class="payment-message">
                    <h3>Votre commande a bien été enregistrée</h3> @auth
                        <h3>M. <span style="color: var(--primary-color);">{{ $client->nom_cli }}</span></h3>
                    @endauth
                    <p>Pour finaliser votre transaction, veuillez vous rendre dans l'une de nos agences avec votre numéro de commande.</p>
                </div>
                
                <div class="agencies-list">
                    <h4 class="agencies-title">Nos agences partenaires</h4>
                    
                    <div class="agency-card">
                        <div class="agency-name">Agence de Lyon</div>
                        <div class="agency-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Lyon, France</span>
                        </div>
                        <div class="agency-hours">
                            <i class="fas fa-clock"></i>
                            <span>Lundi-Samedi: 9h-19h | Dimanche: 14h-19h</span>
                        </div>
                        <div class="agency-contact">
                            <i class="fas fa-phone-alt"></i>
                            <span>+33 554543171</span>
                        </div>
                    </div>
                    
                    <div class="agency-card">
                        <div class="agency-name">Agence de Paris</div>
                        <div class="agency-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Paris, France</span>
                        </div>
                        <div class="agency-hours">
                            <i class="fas fa-clock"></i>
                            <span>Lundi-Samedi: 9h-19h | Dimanche: 14h-19h</span>
                        </div>
                        <div class="agency-contact">
                            <i class="fas fa-phone-alt"></i>
                            <span>+33 554543171</span>
                        </div>
                    </div>
                    
                    <div class="agency-card">
                        <div class="agency-name">Agence de Nancy</div>
                        <div class="agency-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Nancy, France</span>
                        </div>
                        <div class="agency-hours">
                            <i class="fas fa-clock"></i>
                            <span>Lundi-Samedi: 9h-19h | Dimanche: 14h-19h</span>
                        </div>
                        <div class="agency-contact">
                            <i class="fas fa-phone-alt"></i>
                            <span>+33 554543171</span>
                        </div>
                    </div>
                    
                    <div class="agency-card">
                        <div class="agency-name">Agence d'Abidjan</div>
                        <div class="agency-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Abidjan, Côte d'Ivoire</span>
                        </div>
                        <div class="agency-hours">
                            <i class="fas fa-clock"></i>
                            <span>Lundi-Samedi: 9h-19h | Dimanche: 14h-19h</span>
                        </div>
                        <div class="agency-contact">
                            <i class="fas fa-phone-alt"></i>
                            <span>+225 2722304819 / +225 0594946565</span>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <p>Pour toute question, contactez notre service client au <strong>+33 554543171</strong> (France) ou <strong>+225 2722304819</strong> (Côte d'Ivoire)</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">
                        <i class="fas fa-home"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection