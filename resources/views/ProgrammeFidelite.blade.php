<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Client</title>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Variables */
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Base Styles */
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .profile-header {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 20px;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
            border: 3px solid var(--primary-color);
        }

        .profile-info h1 {
            color: var(--dark-color);
            margin-bottom: 5px;
        }

        .profile-info p {
            color: #7f8c8d;
            margin-bottom: 10px;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 20px;
        }

        /* Sidebar */
        .sidebar {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-menu li {
            margin-bottom: 10px;
        }

        .nav-menu a {
            display: block;
            padding: 10px 15px;
            color: var(--dark-color);
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
        }

        .nav-menu a:hover, .nav-menu a.active {
            background-color: var(--primary-color);
            color: white;
        }

        .nav-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Content */
        .content {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
        }

        .section-title {
            color: var(--dark-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-color);
        }

        /* Packages History */
        .packages-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .packages-table th, .packages-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--light-color);
        }

        .packages-table th {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        .packages-table tr:hover {
            background-color: #f9f9f9;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            text-align: center;
        }

        .status-delivered {
            background-color: var(--success-color);
            color: white;
        }

        .status-pending {
            background-color: var(--warning-color);
            color: white;
        }

        .status-transit {
            background-color: var(--primary-color);
            color: white;
        }

        /* Loyalty Program */
        .loyalty-program {
            display: flex;
            flex-direction: column;
        }

        .progress-container {
            margin-bottom: 20px;
        }

        .progress-bar {
            height: 20px;
            background-color: var(--light-color);
            border-radius: 10px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .rewards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .reward-card {
            background-color: var(--light-color);
            border-radius: var(--border-radius);
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .reward-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .reward-card i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .reward-card h3 {
            margin-bottom: 5px;
            color: var(--dark-color);
        }

        .reward-card p {
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .reward-card.locked {
            opacity: 0.6;
            position: relative;
        }

        .reward-card.locked::after {
            content: '\f023';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            color: var(--accent-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-picture {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .rewards {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .rewards {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- En-tête du profil -->
        <header class="profile-header">
            <img src="{{ $user->photo ?? 'https://ui-avatars.com/api/?name='.urlencode($client->nom_cli).'&background=7B01F7&color=fff' }}" 
                 alt="Photo de profil" class="profile-picture">
            <div class="profile-info">
                <h1>{{ $client->nom_cli }}</h1>
                <p>Membre depuis: {{ $client->created_at->format('d/m/Y') }}</p>
                <span class="badge">Client Fidèle</span>
            </div>
        </header>

        <!-- Contenu principal -->
        <main class="main-content">
            <!-- Sidebar -->
            <aside class="sidebar">
                <ul class="nav-menu">
                    <li><a href="#" class="active"><i class="fas fa-user"></i> Profil</a></li>
                    <li><a href="#"><i class="fas fa-box"></i> Colis</a></li>
                    <li><a href="#"><i class="fas fa-gift"></i> Fidélité</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                </ul>
            </aside>

            <!-- Contenu -->
            <div class="content">


                <!-- Programme de fidélité -->
                <section class="loyalty-program">
                    <h2 class="section-title"><i class="fas fa-medal"></i> Programme de Fidélité</h2>
                    
                    <div class="progress-container">
                        <h3>Vos Points: 450/1000</h3>
                        <div class="progress-bar">
                            <div class="progress" id="loyalty-progress" style="width: 45%"></div>
                        </div>
                        <div class="progress-info">
                            <span>Bronze</span>
                            <span>Prochain niveau: 550 points</span>
                        </div>
                    </div>

                    <h3>Vos Récompenses</h3>
                    <div class="rewards">
                        <div class="reward-card">
                            <i class="fas fa-shipping-fast"></i>
                            <h3>Livraison Gratuite</h3>
                            <p>Débloqué à 100 points</p>
                        </div>
                        <div class="reward-card">
                            <i class="fas fa-percentage"></i>
                            <h3>5% de Réduction</h3>
                            <p>Débloqué à 250 points</p>
                        </div>
                        <div class="reward-card">
                            <i class="fas fa-gift"></i>
                            <h3>Cadeau Surprise</h3>
                            <p>Débloqué à 500 points</p>
                        </div>
                        <div class="reward-card locked">
                            <i class="fas fa-star"></i>
                            <h3>10% de Réduction</h3>
                            <p>Débloquez à 1000 points</p>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        // JavaScript pour les interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Animation de la barre de progression
            const progressBar = document.getElementById('loyalty-progress');
            
            // Simuler un chargement progressif
            setTimeout(() => {
                progressBar.style.width = '45%';
            }, 500);

            // Gestion des clics sur les liens de détails
            const detailLinks = document.querySelectorAll('.details-link');
            detailLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const trackingNumber = this.closest('tr').querySelector('td').textContent;
                    alert(`Détails du colis ${trackingNumber}\nCette fonctionnalité sera implémentée prochainement.`);
                });
            });

            // Simulation de données dynamiques
            function updatePackageStatus() {
                const statusCells = document.querySelectorAll('.status');
                statusCells.forEach(cell => {
                    if (cell.classList.contains('status-pending')) {
                        // 50% de chance de changer le statut
                        if (Math.random() > 0.5) {
                            cell.classList.remove('status-pending');
                            cell.classList.add('status-transit');
                            cell.textContent = 'En Transit';
                        }
                    } else if (cell.classList.contains('status-transit')) {
                        // 30% de chance de livrer
                        if (Math.random() > 0.7) {
                            cell.classList.remove('status-transit');
                            cell.classList.add('status-delivered');
                            cell.textContent = 'Livré';
                        }
                    }
                });
            }

            // Mettre à jour les statuts toutes les 10 secondes (simulation)
            setInterval(updatePackageStatus, 10000);

            // Ajouter des points de fidélité aléatoires (simulation)
            function addRandomPoints() {
                const pointsInfo = document.querySelector('.progress-container h3');
                const currentText = pointsInfo.textContent;
                const regex = /(\d+)\/1000/;
                const match = currentText.match(regex);
                
                if (match) {
                    const currentPoints = parseInt(match[1]);
                    const newPoints = currentPoints + Math.floor(Math.random() * 20);
                    const progressPercentage = Math.min(100, (newPoints / 1000) * 100);
                    
                    pointsInfo.textContent = `Vos Points: ${newPoints}/1000`;
                    progressBar.style.width = `${progressPercentage}%`;
                    
                    // Mettre à jour le texte "Prochain niveau"
                    const nextLevelText = document.querySelector('.progress-info span:last-child');
                    const pointsToNextLevel = 1000 - newPoints;
                    
                    if (newPoints >= 1000) {
                        nextLevelText.textContent = 'Niveau maximum atteint!';
                        // Débloquer la dernière récompense
                        const lockedReward = document.querySelector('.reward-card.locked');
                        if (lockedReward) {
                            lockedReward.classList.remove('locked');
                            lockedReward.querySelector('i').style.color = 'var(--primary-color)';
                        }
                    } else {
                        nextLevelText.textContent = `Prochain niveau: ${pointsToNextLevel} points`;
                    }
                }
            }

            // Ajouter des points toutes les 15 secondes (simulation)
            setInterval(addRandomPoints, 15000);
        });
    </script>
</body>
</html>