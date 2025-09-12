@extends('layouts.app')
@section('title', 'flyFret - Authentification') 
@section('ChildContent')

    @php
        // Extraction des paramètres de la requête
        $queryParams = request()->query();
        $colisData = [];
        
        if (isset($queryParams['type_colis'])) {
            $colisJson = urldecode($queryParams['type_colis']);
            $colisData = json_decode($colisJson, true) ?? [];
        }
        
        if (empty($colisData)) {
            $colisData = [
                [
                    'type_colis' => $queryParams['type_colis'] ?? 'Colis standard',
                    'quantite' => $queryParams['quantite'] ?? 1,
                    'valeur_marchande' => $queryParams['valeur'] ?? 0,
                    'prix_unitaire' => $queryParams['prix_unitaire'] ?? 0,
                    'total' => $queryParams['type_expedition'] === 'express' 
                        ? $queryParams['prixExpress'] 
                        : $queryParams['prixTotal']
                ]
            ];
        }
        
        $villeDepart = $queryParams['ville_expedition'] ?? '';
        $estFrance = in_array($villeDepart, ['Paris', 'Lyon', 'Nancy']);
        $estAbidjan = $villeDepart === 'Abidjan';
        
        // Correction ici : on récupère la devise de la requête si présente, sinon on déduit
        $deviseAffichage = $queryParams['devise'] ?? ($estFrance ? 'EUR' : 'XOF');
        $tauxConversion = 655;
        
        $quantiteTotale = 0;
        $valeurTotale = 0;
        $prixTotalColis = 0;

        foreach ($colisData as $colis) {
            $quantite = intval($colis['quantite'] ?? 1);
            $quantiteTotale += $quantite;
            $valeur = floatval($colis['valeur_marchande'] ?? 0);
            $valeurTotale += $valeur * $quantite;
            $prixUnitaire = $colis['prix_unitaire'] ?? 0;
            $prixTotalColis += $prixUnitaire * $quantite;
        }

        if ($estAbidjan) {
            $prixTotalColis = $prixTotalColis / $tauxConversion;
        }

        $prixTotal = $queryParams['prixTotal'] ?? $prixTotalColis;
        $prixExpress = is_numeric($prixTotal) ? $prixTotal  : '--';
        
        $commonParams = [
            'mode_expedition' => $queryParams['mode_expedition'] ?? '',
            'ville_expedition' => $villeDepart,
            'ville_retrait' => $queryParams['ville_retrait'] ?? '',
            'prixTotal' => $prixTotal,
            'prixExpress' => $prixExpress,
            'type_colis' => json_encode($colisData),
            'prixUnitaire' => urlencode(json_encode(array_column($colisData, 'prix_unitaire', 'type'))),
            'type_expedition' => $queryParams['type_expedition'] ?? 'null',
            'devise' => $deviseAffichage // Correction ici : toujours transmettre la devise
        ];

    @endphp

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f9f7ff 0%, #f0f4ff 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .auth-container {
            flex: 1;
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }
        
        .auth-card {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .section-title h2 {
            color: #7b01f7;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .section-title p {
            color: #666;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .option-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }
        
        .option-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            flex: 1;
            min-width: 300px;
            max-width: 350px;
            display: flex;
            flex-direction: column;
        }
        
        .option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: rgba(123, 1, 247, 0.2);
        }
        
        .option-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, rgba(123, 1, 247, 0.1) 0%, rgba(241, 12, 243, 0.1) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #7b01f7;
        }
        
        .option-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        
        .option-card p {
            color: #666;
            margin-bottom: 25px;
            flex-grow: 1;
        }
        
        .btn-option {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #7b01f7, #f10cf3);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(123, 1, 247, 0.3);
            color: white;
        }
        
        .btn-option i {
            margin-right: 8px;
        }
        
        .connected-message {
            text-align: center;
            padding: 50px 20px;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .connected-message h2 {
            color: #7b01f7;
            margin-bottom: 20px;
        }
        
        .btn-primary {
            background-color: #7b01f7;
            border-color: #7b01f7;
            padding: 10px 20px;
            border-radius: 8px;
        }
        
        .btn-primary:hover {
            background-color: #6a00d8;
            border-color: #6a00d8;
        }
        
        @media (max-width: 767.98px) {
            .option-cards {
                flex-direction: column;
                align-items: center;
            }
            
            .option-card {
                max-width: 100%;
            }
        }
    </style>

    <div class="auth-container">
        <div class="auth-options">
            <div class="section-title">
                <h2>Identification</h2>
                <p>Choisissez votre méthode d'authentification pour continuer</p>
            </div>
            
            <div class="option-cards">
                <!-- Option 1: Déjà Client -->
                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3>Déjà Client</h3>
                    <p>Heureux de vous revoir ! Connectez-vous pour accéder à votre compte.</p>
                    <a href="{{ route('connexion.client.form', $commonParams) }}" class="btn-option">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </a>
                </div>
                
                <!-- Option 2: Nouveau Client -->
                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3>Nouveau Client</h3>
                  
                    <p>Créez un compte pour bénéficier d'avantages exclusifs et suivre vos envois.</p>
                    <a href="{{ route('inscription.client.form', $commonParams) }}" class="btn-option">
                        <i class="fas fa-user-edit"></i> S'inscrire
                    </a>
                </div>
                
                <!-- Option 3: Sans compte -->
                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <h3>Continuer sans compte</h3>
                    <p>Passez commande sans créer de compte. Vous pourrez en créer un plus tard.</p>
                    <a href="{{ route('envoie', $commonParams) }}" class="btn-option">
                        <i class="fas fa-arrow-right"></i> Continuer
                    </a>
                </div>
            </div>
        </div>

        <!-- Bouton de retour -->
        <div class="text-center mt-4">
            <a href="/" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const optionCards = document.querySelectorAll('.option-card');
            
            optionCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 150);
            });
        });
    </script>
@endsection