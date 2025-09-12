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
            margin-bottom: 30px;
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
            width: 0%;
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
            margin-top: 20px;
        }

        .reward-card {
            background-color: var(--light-color);
            border-radius: var(--border-radius);
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
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

        
        .section-title {
            color: var(--dark-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-color);
        }

        /* Form Styles */
        .settings-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .form-help {
            font-size: 0.8rem;
            color: #7f8c8d;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: var(--secondary-color);
        }

        .btn-danger {
            background-color: var(--accent-color);
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .tab.active {
            border-bottom-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .password-toggle {
            position: relative;
        }

        .password-toggle .toggle-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #7f8c8d;
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

                /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 700px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--light-color);
        }

        .modal-title {
            color: var(--dark-color);
            font-size: 1.5rem;
        }

        .close-btn {
            color: #aaa;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
        }

        .close-btn:hover {
            color: var(--dark-color);
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .details-table th, .details-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--light-color);
        }

        .details-table th {
            background-color: var(--light-color);
            color: var(--dark-color);
            width: 30%;
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

            .modal-content {
                width: 95%;
                margin: 10% auto;
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
            <img src="{{ $client->photo ?? 'https://ui-avatars.com/api/?name='.urlencode($client->nom_cli).'&background=7B01F7&color=fff' }}" 
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
                    {{-- <li><a href="#" class="active"><i class="fas fa-user"></i> Profil</a></li> --}}
                    <li><a href="{{ route('historique_colis') }}" class="active"><i class="fas fa-box"></i> Colis</a></li>
                    <li><a href="{{ route('ProgrammeFidelite') }}"><i class="fas fa-gift"></i> Fidélité</a></li>
                    <li><a href="{{ route('paiements.clients') }}"><i class="fas fa-credit-card"></i> Mes Paiements</a></li>
                    <li><a href="{{ route('dashboard.parametres') }}"><i class="fas fa-cog"></i> Paramètres</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                </ul>
                <button class="btn" style="margin-top:20px;width:100%;" onclick="window.history.back();">
                    <i class="fas fa-arrow-left"></i> Retour en arrière
                </button>
            </aside>

            <!-- Contenu -->
            @yield('contentChild')
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

            // Gestion des clics sur les cartes de récompense
            const rewardCards = document.querySelectorAll('.reward-card:not(.locked)');
            rewardCards.forEach(card => {
                card.addEventListener('click', function() {
                    const rewardTitle = this.querySelector('h3').textContent;
                    alert(`Vous avez sélectionné la récompense : ${rewardTitle}\nCette récompense sera appliquée à votre prochain envoi.`);
                });
            });

            // Simulation d'ajout de points
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

                    // Ajouter une entrée dans l'historique
                    if (newPoints > currentPoints) {
                        const pointsEarned = newPoints - currentPoints;
                        const historyTable = document.querySelector('.packages-table tbody');
                        const newRow = document.createElement('tr');
                        
                        const today = new Date();
                        const dateStr = today.toLocaleDateString('fr-FR');
                        
                        newRow.innerHTML = `
                            <td>${dateStr}</td>
                            <td>Activité bonus</td>
                            <td>+${pointsEarned}</td>
                        `;
                        
                        historyTable.insertBefore(newRow, historyTable.firstChild);
                    }
                }
            }

            // Ajouter des points toutes les 15 secondes (simulation)
            setInterval(addRandomPoints, 15000);
        });


        // JavaScript pour les interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer les éléments du modal
            const modal = document.getElementById('packageModal');
            const closeBtn = document.querySelector('.close-btn');
            const detailsLinks = document.querySelectorAll('.details-link');

            // Fonction pour ouvrir le modal avec les détails du colis
            function openModal(packageId) {
                
                // Mettre à jour le contenu du modal avec les données du colis
                document.getElementById('tracking-number').textContent = package.trackingNumber;
                document.getElementById('package-name').textContent = package.packageName;
                document.getElementById('package-date').textContent = package.date;
                document.getElementById('recipient').textContent = package.recipient;
                
                // Mettre à jour le statut avec la bonne classe CSS
                const statusElement = document.getElementById('status');
                statusElement.innerHTML = '';
                const statusSpan = document.createElement('span');
                statusSpan.className = `status status-${package.status.toLowerCase().replace(' ', '-')}`;
                statusSpan.textContent = package.status;
                statusElement.appendChild(statusSpan);
                
                // Mettre à jour les autres champs
                document.getElementById('full-text').textContent = package.fullText;
                document.getElementById('detail-number').textContent = package.detailNumber;
                document.getElementById('package-type').textContent = package.packageType;
                document.getElementById('quantity').textContent = package.quantity;
                document.getElementById('value').textContent = package.value;
                document.getElementById('full-status').textContent = package.fullStatus;
                document.getElementById('sender-id').textContent = package.senderId;
                document.getElementById('receiver-id').textContent = package.receiverId;
                
                // Afficher le modal
                modal.style.display = 'block';
            }

            // Fonction pour fermer le modal
            function closeModal() {
                modal.style.display = 'none';
            }

            // Ajouter les écouteurs d'événements
            detailsLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const packageId = this.getAttribute('data-id');
                    openModal(packageId);
                });
            });

            closeBtn.addEventListener('click', closeModal);

            // Fermer le modal si on clique en dehors
            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        });
    </script>
</body>
</html>