<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyFret - Détails des Colis</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1d4ed8;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --white: #ffffff;
            --success-color: #10b981;
            --error-color: #ef4444;
        }

        /* Styles spécifiques à la page Détails des Colis */
        .card-container {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 1rem;
            overflow: hidden;
            background-color: white;
            margin: 1rem auto;
            max-width: 900px;
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 1rem;
            color: var(--white);
        }
        
        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
            text-align: center;
        }
        
        .back-btn {
            transition: all 0.3s ease;
            transform-origin: left center;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            display: inline-flex;
            align-items: center;
        }
        
        .back-btn:hover {
            transform: translateX(-4px);
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        /* Styles pour le contenu des colis */
        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--dark-color);
        }
        
        .section-title i {
            color: var(--primary-color);
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .info-item {
            background-color: white;
            padding: 0.75rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        
        .info-label {
            font-weight: 500;
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.25rem;
        }
        
        .info-value {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .package-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1.5rem;
        }
        
        .package-table th {
            text-align: left;
            padding: 0.5rem;
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
            color: #6b7280;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .package-table td {
            padding: 0.5rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }
        
        .package-table tr:last-child td {
            border-bottom: none;
        }
        
        .package-table tr:hover td {
            background-color: #f9fafb;
        }
        
        .package-type {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .package-dimensions {
            font-size: 0.75rem;
            color: #9ca3af;
            margin-top: 0.25rem;
        }
        
        .offre-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
            overflow: hidden;
            position: relative;
            border: 1px solid #e5e7eb;
            padding: 0.1rem;
            font-size: 0.875rem;
        }
        
        .offre-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .offre-card.selected {
            border: 2px solid var(--primary-color);
            background-color: rgba(37, 99, 235, 0.03);
            transform: scale(1.01);
            box-shadow: 0 20px 25px -5px rgba(123, 1, 247, 0.1), 0 10px 10px -5px rgba(123, 1, 247, 0.04);
        }
        
        .offre-card.selected::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 40px 40px 0;
            border-color: transparent var(--primary-color) transparent transparent;
        }
        
        .offre-card.selected::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 4px;
            right: 4px;
            color: white;
            font-size: 0.75rem;
            z-index: 1;
        }
        
        .total-section {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 2px solid var(--primary-color);
            text-align: right;
        }
        
        .total-label {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
        }
        
        .total-price {
            font-size: 1.75rem;
            font-weight: 800;
            margin-top: 0.5rem;
            color: var(--primary-color);
        }
        
        .btn1 {
            padding: 0.875rem 1.75rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.9375rem;
            text-align: center;
            border: 1px solid transparent;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(123, 1, 247, 0.1), 0 2px 4px -1px rgba(123, 1, 247, 0.06);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(123, 1, 247, 0.1), 0 4px 6px -1px rgba(123, 1, 247, 0.05);
        }
        
        .btn-outline {
            background-color: white;
            border: 1px solid #e5e7eb;
            color: var(--dark-color);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        
        .btn-outline:hover {
            background-color: #f3f4f6;
            border-color: #d1d5db;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .unit-price {
            font-size: 0.75rem;
            color: var(--primary-color);
            font-weight: 500;
        }

        /* Style pour la carte de conservation */
        .storage-card {
            background-color: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .storage-icon {
            background-color: #e0f2fe;
            color: #0369a1;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        
        .storage-text {
            margin-left: 1rem;
            flex-grow: 1;
        }
        
        .storage-title {
            font-weight: 600;
            color: #0369a1;
        }
        
        .storage-desc {
            font-size: 0.875rem;
            color: #0284c7;
            margin-top: 0.25rem;
        }
        
        .storage-price {
            font-weight: 700;
            color: #0369a1;
            font-size: 1.125rem;
        }
        
        /* Styles pour les réductions */
        .discount-badge {
            background-color: var(--success-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }
        
        .original-price {
            text-decoration: line-through;
            color: #9ca3af;
            font-size: 1.25rem;
            margin-right: 0.5rem;
        }
        
        .discount-info {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .discount-icon {
            background-color: #dcfce7;
            color: var(--success-color);
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        
        .discount-text {
            margin-left: 1rem;
            flex-grow: 1;
        }
        
        .discount-title {
            font-weight: 600;
            color: var(--success-color);
        }
        
        .discount-desc {
            font-size: 0.875rem;
            color: #16a34a;
            margin-top: 0.25rem;
        }
        
        .discount-amount {
            font-weight: 700;
            color: var(--success-color);
            font-size: 1.125rem;
        }
        
        /* Responsive adjustments */
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
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .btn {
                width: 100%;
                padding: 1rem;
            }
            
            .package-table {
                display: block;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .storage-card {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .storage-price {
                margin-top: 0.5rem;
                margin-left: 3.5rem; /* icon width + margin */
            }
            
            .discount-info {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .discount-amount {
                margin-top: 0.5rem;
                margin-left: 3.5rem;
            }
        }
        
        @media (max-width: 575.98px) {
            .whatsapp-btn, .messenger-btn {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <main class="py-4">
        <div class="container mx-auto px-4">
            <div class="card-container">
                <!-- En-tête -->
                <div class="page-header">
                    <div class="flex items-center justify-between">
                        <button onclick="window.history.back()" class="back-btn">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Retour
                        </button>

                        <h1>Détails des Colis</h1>

                        <!-- Logo ou élément visuel -->
                        <div class="w-10 h-10 bg-white bg-opacity-10 rounded-full flex items-center justify-center">
                            <i class="fas fa-box-open text-white"></i>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="p-6 sm:p-8">
                    <?php
                        // Décodage des données des colis
                        $colisParam = $_GET['type_colis'] ?? '';
                        $colisJson = urldecode($colisParam);
                        $colisData = json_decode($colisJson, true) ?? [];

                        // Si $colisData est vide, utiliser les paramètres individuels
                        if (empty($colisData)) {
                            $colisData = [
                                [
                                    'type' => $_GET['type'] ?? 'Colis standard',
                                    'quantite' => $_GET['quantite'] ?? 1,
                                    'valeur_marchande' => $_GET['valeur'] ?? 0,
                                ],
                            ];
                        }

                        // Récupération des prix unitaires
                        $prixUnitaireData = [];
                        if (isset($_GET['prixUnitaire'])) {
                            $prixUnitaireJson = urldecode($_GET['prixUnitaire']);
                            $prixUnitaireData = json_decode($prixUnitaireJson, true) ?? [];
                        }

                        // Déterminer la devise en fonction de la ville de départ
                        $villeDepart = $_GET['ville_expedition'] ?? '';
                        $estFrance = in_array($villeDepart, ['Paris', 'Lyon', 'Nancy']);
                        $estAbidjan = $villeDepart === 'Abidjan';
                        
                        // Utiliser la devise d'affichage passée en paramètre ou déterminer automatiquement
                        $deviseAffichage = $_GET['devise_affichage'] ?? ($estFrance ? 'EUR' : 'XOF');
                        $tauxConversion = 655; // Taux de conversion XOF/EUR

                        // Vérifier si l'option de conservation est sélectionnée
                        $storageOption = isset($_GET['storage_option']) && $_GET['storage_option'] === '1';
                        $prixConservation = $storageOption ? 1 : 0; // 1 EUR pour la conservation

                        // Récupération des informations de réduction
                        $discountApplied = isset($_GET['discountApplied']) && $_GET['discountApplied'] === 'true';
                        $discountPercentage = intval($_GET['discountPercentage'] ?? 0);
                        $discountCode = $_GET['discountCode'] ?? '';
                        $prixTotalAvecReduction = floatval($_GET['prixTotalAvecReduction'] ?? 0);
                        $prixExpressAvecReduction = floatval($_GET['prixExpressAvecReduction'] ?? 0);

                        // Calcul des totaux
                        $nombreColis = count($colisData);
                        $poidsTotal = 0;
                        $valeurTotale = 0;
                        $quantiteTotale = 0;
                        $prixTotalColis = 0;

                        foreach ($colisData as $index => $colis) {
                            $quantite = intval($colis['quantite'] ?? 1);
                            $quantiteTotale += $quantite;
                            $valeur = floatval($colis['valeur_marchande'] ?? 0);
                            $valeurTotale += $valeur * $quantite;

                            $typeColis = $colis['type'] ?? '';
                            $prixUnitaire = $prixUnitaireData[$typeColis] ?? ($colis['prix_unitaire'] ?? 0);
                            
                            // Pour le calcul, on garde les prix dans leur devise d'origine
                            $prixTotalColis += $prixUnitaire * $quantite;
                        }

                        // Variables pour les offres
                        $prixTotal = $_GET['prixTotal'] ?? $prixTotalColis;
                        $prixExpress = $_GET['prixExpress'] ?? ($estFrance ? $prixTotal + 2 : $prixTotal + (2 * $tauxConversion));
                        
                        // Si une réduction est appliquée, utiliser les prix avec réduction
                        if ($discountApplied) {
                            $prixTotalStandard = $prixTotalAvecReduction;
                            $prixTotalExpress = $prixExpressAvecReduction;
                        } else {
                            $prixTotalStandard = $prixTotal;
                            $prixTotalExpress = $prixExpress;
                        }
                        
                        // Formatage des prix selon la devise d'affichage
                        $formatPrix = function($montant) use ($deviseAffichage) {
                            return number_format($montant, 2, ',', ' ') . ' ' . $deviseAffichage;
                        };

                        // Initialiser la variable $offreSelectionnee
                        $offreSelectionnee = $_GET['offre'] ?? 'standard';
                    ?>

                    <!-- Section Détails de l'expédition -->
                    <div class="mb-10">
                        <h2 class="section-title">
                            <i class="fas fa-shipping-fast"></i>
                            Détails de l'expédition
                        </h2>

                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Mode de transport</div>
                                <div class="info-value"><?php echo htmlspecialchars($_GET['mode_expedition'] ?? 'Non spécifié'); ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Ville de départ</div>
                                <div class="info-value"><?php echo htmlspecialchars($villeDepart); ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Ville de destination</div>
                                <div class="info-value"><?php echo htmlspecialchars($_GET['ville_retrait'] ?? 'Non spécifié'); ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Devise d'affichage</div>
                                <div class="info-value">
                                    <span class="badge bg-primary"><?php echo $deviseAffichage; ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Afficher la carte de conservation uniquement si l'option est sélectionnée -->
                        <?php if($storageOption): ?>
                        <div class="storage-card">
                            <div class="flex items-center">
                                <div class="storage-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="storage-text">
                                    <div class="storage-title">Conservation des colis</div>
                                    <div class="storage-desc">Vos colis seront conservés avant expédition</div>
                                </div>
                            </div>
                            <div class="storage-price">+<?php echo $formatPrix($prixConservation); ?></div>
                        </div>
                        <?php endif; ?>

                        <!-- Afficher les informations de réduction si applicable -->
                        <?php if($discountApplied): ?>
                        <div class="discount-info">
                            <div class="flex items-center">
                                <div class="discount-icon">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <div class="discount-text">
                                    <div class="discount-title">Réduction appliquée</div>
                                    <div class="discount-desc">Code: <?php echo $discountCode; ?> (-<?php echo $discountPercentage; ?>%)</div>
                                </div>
                            </div>
                            <div class="discount-amount">-<?php echo $discountPercentage; ?>%</div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Section Détails des colis -->
                    <div class="mb-10">
                        <h2 class="section-title">
                            <i class="fas fa-box-open"></i>
                            Colis <span class="text-gray-500 font-normal ml-2">(<?php echo $quantiteTotale; ?>)</span>
                        </h2>

                        <div class="overflow-x-auto">
                            <table class="package-table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Quantité</th>
                                        <th>Prix unitaire</th>
                                        <th>Valeur Marchande</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($colisData as $index => $colis): ?>
                                        <?php
                                            $typeColis = $colis['type'] ?? '';
                                            $prixUnitaire = $prixUnitaireData[$typeColis] ?? ($colis['prix_unitaire'] ?? 0);
                                            $quantite = intval($colis['quantite'] ?? 1);
                                            $valeur = floatval($colis['valeur_marchande'] ?? 0);
                                            
                                            // Convertir le prix unitaire si nécessaire
                                            if ($deviseAffichage === 'XOF' && $estFrance) {
                                                $prixUnitaire = $prixUnitaire * $tauxConversion;
                                            } elseif ($deviseAffichage === 'EUR' && $estAbidjan) {
                                                $prixUnitaire = $prixUnitaire / $tauxConversion;
                                            }
                                            
                                            $totalColis = $prixUnitaire * $quantite;
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="package-type"><?php echo htmlspecialchars($typeColis); ?></div>
                                                <div class="package-dimensions">Type de colis</div>
                                            </td>
                                            <td class="font-medium"><?php echo $quantite; ?></td>
                                            <td>
                                                <?php echo $formatPrix($prixUnitaire); ?>
                                                <div class="unit-price">Prix unitaire</div>
                                            </td>
                                            <td class="font-medium"><?php echo $formatPrix($valeur); ?></td>
                                            <td class="font-semibold"><?php echo $formatPrix($totalColis); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Section Options de livraison -->
                    <div class="mb-10">
                        <h2 class="section-title">
                            <i class="fas fa-rocket"></i>
                            Options de livraison
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Offre Standard -->
                            <div class="offre-card bg-white <?php echo $offreSelectionnee === 'standard' ? 'selected' : ''; ?>" id="offreStandard">
                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-3">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mr-3">
                                                <i class="fas fa-truck text-blue-600"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900">Standard</h3>
                                                <span class="text-xs text-blue-600 font-medium">Économique</span>
                                            </div>
                                        </div>
                                        <div>
                                            <?php if($discountApplied): ?>
                                                <span class="original-price"><?php echo $formatPrix($prixTotal); ?></span>
                                            <?php endif; ?>
                                            <span class="text-blue-600 font-bold text-xl"><?php echo $formatPrix($prixTotalStandard); ?></span>
                                            <?php if($discountApplied): ?>
                                                <span class="discount-badge">-<?php echo $discountPercentage; ?>%</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-4">Solution économique pour les envois non urgents</p>
                                    <ul class="space-y-2 mb-4">
                                        <li class="flex items-center text-sm text-gray-600">
                                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                            <span>Délai estimé: 5-7 jours ouvrés</span>
                                        </li>
                                        <li class="flex items-center text-sm text-gray-600">
                                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                            <span>Suivi de colis inclus</span>
                                        </li>
                                    </ul>
                                    <button class="w-full bg-blue-50 hover:bg-blue-100 text-blue-600 font-medium py-2 px-4 rounded-lg transition-colors duration-300">
                                        Choisir cette offre
                                    </button>
                                </div>
                            </div>

                            <!-- Offre Express -->
                            <div class="offre-card bg-white <?php echo $offreSelectionnee === 'express' ? 'selected' : ''; ?>" id="offreExpress">
                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-3">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-full bg-purple-50 flex items-center justify-center mr-3">
                                                <i class="fas fa-bolt text-purple-600"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900">Express</h3>
                                                <span class="text-xs text-purple-600 font-medium">Recommandé</span>
                                            </div>
                                        </div>
                                        <div>
                                            <?php if($discountApplied): ?>
                                                <span class="original-price"><?php echo $formatPrix($prixExpress); ?></span>
                                            <?php endif; ?>
                                            <span class="text-purple-600 font-bold text-xl"><?php echo $formatPrix($prixTotalExpress); ?></span>
                                            <?php if($discountApplied): ?>
                                                <span class="discount-badge">-<?php echo $discountPercentage; ?>%</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-4">Service prioritaire pour une livraison rapide</p>
                                    <ul class="space-y-2 mb-4">
                                        <li class="flex items-center text-sm text-gray-600">
                                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                            <span>Délai estimé: 2-3 jours ouvrés</span>
                                        </li>
                                        <li class="flex items-center text-sm text-gray-600">
                                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                            <span>Suivi en temps réel</span>
                                        </li>
                                        <li class="flex items-center text-sm text-gray-600">
                                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                            <span>Assurance prioritaire</span>
                                        </li>
                                    </ul>
                                    <button class="w-full bg-purple-50 hover:bg-purple-100 text-purple-600 font-medium py-2 px-4 rounded-lg transition-colors duration-300">
                                        Choisir cette offre
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="total-section">
                        <div class="total-label">Total TTC</div>
                        <div class="total-price" id="totalPrice">
                            <?php if($discountApplied && $offreSelectionnee == 'standard'): ?>
                                <span class="original-price"><?php echo $formatPrix($prixTotal); ?></span>
                            <?php elseif($discountApplied && $offreSelectionnee == 'express'): ?>
                                <span class="original-price"><?php echo $formatPrix($prixExpress); ?></span>
                            <?php endif; ?>
                            <span id="totalPriceValue">
                                <?php echo $offreSelectionnee == 'standard' ? $formatPrix($prixTotalStandard) : $formatPrix($prixTotalExpress); ?>
                            </span>
                            <?php if($discountApplied): ?>
                                <span class="discount-badge">-<?php echo $discountPercentage; ?>%</span>
                            <?php endif; ?>
                        </div>
                        <?php if($storageOption): ?>
                        <div class="text-sm text-gray-500 mt-1">
                            (inclut <?php echo $formatPrix($prixConservation); ?> pour la conservation)
                        </div>
                        <?php endif; ?>
                        <?php if($discountApplied): ?>
                        <div class="text-sm text-success-600 font-medium mt-1">
                            Économisez <?php echo $formatPrix($offreSelectionnee == 'standard' ? $prixTotal - $prixTotalStandard : $prixExpress - $prixTotalExpress); ?> avec le code <?php echo $discountCode; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-8">
                        <button id="btnContinuer" class="btn1 btn-primary">
                            <i class="fas fa-arrow-right mr-2"></i>
                            Continuer vers le paiement
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const offreStandard = document.getElementById('offreStandard');
            const offreExpress = document.getElementById('offreExpress');
            const btnContinuer = document.getElementById('btnContinuer');
            const totalPriceElement = document.getElementById('totalPrice');
            const totalPriceValueElement = document.getElementById('totalPriceValue');
            
            let offreSelectionnee = '<?php echo $offreSelectionnee; ?>';
            const prixStandard = parseFloat('<?php echo $prixTotalStandard; ?>'.replace(/\s/g, '').replace(',', '.'));
            const prixExpress = parseFloat('<?php echo $prixTotalExpress; ?>'.replace(/\s/g, '').replace(',', '.'));
            const prixStandardOriginal = parseFloat('<?php echo $prixTotal; ?>'.replace(/\s/g, '').replace(',', '.'));
            const prixExpressOriginal = parseFloat('<?php echo $prixExpress; ?>'.replace(/\s/g, '').replace(',', '.'));
            const devise = '<?php echo $deviseAffichage; ?>';
            const discountApplied = <?php echo $discountApplied ? 'true' : 'false'; ?>;
            const discountPercentage = <?php echo $discountPercentage; ?>;
            const discountCode = '<?php echo $discountCode; ?>';

            // Formatage des prix pour l'affichage
            function formatPrice(price) {
                return price.toLocaleString('fr-FR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }) + ' ' + devise;
            }

            // Gestion des options de livraison
            function selectOffre(offre) {
                // Retirer la sélection actuelle
                document.querySelectorAll('.offre-card').forEach(card => {
                    card.classList.remove('selected');
                });

                // Ajouter la sélection à l'offre choisie
                if (offre === 'standard') {
                    offreStandard.classList.add('selected');
                    updateTotalPrice(prixStandard, prixStandardOriginal, 'standard');
                } else if (offre === 'express') {
                    offreExpress.classList.add('selected');
                    updateTotalPrice(prixExpress, prixExpressOriginal, 'express');
                }

                offreSelectionnee = offre;

                // Mettre à jour les paramètres dans l'URL (sans recharger la page)
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('type_expedition', offre);
                urlParams.set('prixTotal', offre === 'standard' ? prixStandard : prixExpress);
                window.history.replaceState({}, '', `${location.pathname}?${urlParams.toString()}`);
            }

            // Mettre à jour l'affichage du prix total
            function updateTotalPrice(price, originalPrice, offreType) {
                totalPriceValueElement.textContent = formatPrice(price);
                
                if (discountApplied) {
                    let originalPriceHtml = `<span class="original-price">${formatPrice(originalPrice)}</span>`;
                    totalPriceElement.innerHTML = originalPriceHtml + totalPriceElement.innerHTML;
                }
            }

            // Écouteurs d'événements pour les offres
            offreStandard.addEventListener('click', () => selectOffre('standard'));
            offreExpress.addEventListener('click', () => selectOffre('express'));

            // Écouteur d'événement pour le bouton Continuer
            btnContinuer.addEventListener('click', () => {
                if (!offreSelectionnee) {
                    showAlert('Veuillez choisir une offre avant de continuer.', 'error');
                    return;
                }

                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('offre', offreSelectionnee);
                urlParams.set('type_expedition', offreSelectionnee);
                urlParams.set('prixTotal', offreSelectionnee === 'standard' ? prixStandard : prixExpress);
                urlParams.set('devise', devise);
                if (discountApplied) {
                    urlParams.set('discountApplied', 'true');
                    urlParams.set('discountPercentage', discountPercentage);
                    urlParams.set('discountCode', discountCode);
                }
                
                // Redirection vers la page d'authentification
                window.location.href = `/authentification?${urlParams.toString()}`;
            });

            // Fonction pour afficher des alertes stylisées
            function showAlert(message, type = 'success') {
                const alert = document.createElement('div');
                alert.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg text-white font-medium ${
                    type === 'error' ? 'bg-red-500' : 'bg-green-500'
                }`;
                alert.textContent = message;
                document.body.appendChild(alert);

                setTimeout(() => {
                    alert.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                    setTimeout(() => alert.remove(), 300);
                }, 3000);
            }

            // Sélection par défaut de l'offre standard
            selectOffre('<?php echo $offreSelectionnee; ?>');
        });
    </script>
</body>
</html>