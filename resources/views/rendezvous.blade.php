<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre Rendez-vous | FlyFret</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/animejs/lib/anime.iife.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .floating-icon {
            position: fixed;
            opacity: 0.1;
            z-index: -1;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .form-hero {
            background: linear-gradient(135deg, #8022F4 0%, #E100FF 100%);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(128, 34, 244, 0.2);
        }
        
        .form-control {
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
            padding-left: 16px;  /* réduit le padding à gauche */
            padding-right: 48px; /* espace pour l'icône à droite */
            color: rgba(0, 0, 0, 0.6);
        }
        
        .form-control:focus {
            border-color: #8022F4;
            box-shadow: 0 0 0 3px rgba(128, 34, 244, 0.2);
        }
        
        .form-icon {
            position: absolute;
            right: 15px;
            top: 42px;
            left: auto;
            color: #8022F4;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #7B01F7 0%, #E100FF 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(123, 1, 247, 0.3);
        }
        
        .whatsapp-btn {
            background: #25D366;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease;
        }
        
        .whatsapp-btn:hover {
            transform: scale(1.1);
        }
        
        /* Personnalisation des éléments de formulaire */
       
        select.form-control option {
           
            color: #000000 !important;
        }
        
        /* Pour le placeholder (option vide) */
        select.form-control option[value=""] {
            color: #000 !important;
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr !important;
                gap: 1rem !important;
            }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <!-- Floating decorative icons -->
    <i data-feather="calendar" class="floating-icon text-purple-500" style="top: 10%; left: 5%;"></i>
    <i data-feather="clock" class="floating-icon text-pink-500" style="top: 20%; right: 8%;"></i>
    <i data-feather="truck" class="floating-icon text-purple-500" style="bottom: 15%; left: 7%;"></i>
    <i data-feather="mail" class="floating-icon text-pink-500" style="bottom: 25%; right: 5%;"></i>

    <!-- Main Container -->
    <div class="w-full max-w-4xl mx-auto">
        <!-- Form Hero Section -->
        <section class="form-hero p-8 md:p-12 text-white mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-center mb-6">Prenez rendez-vous avec FlyFret</h1>
            
            <!-- Formulaire -->
            <form id="rendezvousForm" class="bg-white rounded-xl p-6 md:p-8 shadow-xl">
                <!-- Nom et Prénom -->
                <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="form-group relative">
                        <label for="nom" class="block text-gray-700 font-medium mb-2">Nom <span class="text-red-500">*</span></label>
                        <input type="text" id="nom" name="nom" class="form-control w-full p-3 rounded-lg" placeholder="Votre nom" required>
                        <i data-feather="user" class="form-icon"></i>
                    </div>
                    <div class="form-group relative">
                        <label for="prenom" class="block text-gray-700 font-medium mb-2">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" id="prenom" name="prenom" class="form-control w-full p-3 rounded-lg" placeholder="Votre prénom" required>
                        <i data-feather="user" class="form-icon"></i>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group relative mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" class="form-control w-full p-3 rounded-lg" placeholder="exemple@email.com" required>
                    <i data-feather="mail" class="form-icon"></i>
                </div>

                <!-- Date et Heure -->
                <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="form-group">
                        <label for="date" class="block text-gray-700 font-medium mb-2">Date <span class="text-red-500">*</span></label>
                        <input type="date" id="date" name="date" class="form-control w-full p-3 rounded-lg" placeholder="Sélectionnez une date" required>
                        <i data-feather="calendar" class="form-icon"></i>
                    </div>
                    <div class="form-group relative">
                        <label for="heure" class="block text-gray-700 font-medium mb-2">Heure <span class="text-red-500">*</span></label>
                        <select id="heure" name="heure" class="form-control w-full p-3 rounded-lg appearance-none" required>
                            <option value="" selected style="color: #000">Sélectionnez une heure</option>
                            <option value="09:00">09:00 - 10:00</option>
                            <option value="10:00">10:00 - 11:00</option>
                            <option value="11:00">11:00 - 12:00</option>
                            <option value="13:00">13:00 - 14:00</option>
                            <option value="14:00">14:00 - 15:00</option>
                            <option value="15:00">15:00 - 16:00</option>
                            <option value="16:00">16:00 - 17:00</option>
                            <option value="17:00">17:00 - 18:00</option>
                        </select>
                        <i data-feather="clock" class="form-icon"></i>
                    </div>
                </div>
                
                <!-- Agence et Motif -->
                <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Agence -->
                    <div class="form-group relative">
                        <label for="agence" class="block text-gray-700 font-medium mb-2">Agence <span class="text-red-500">*</span></label>
                        <select id="agence" name="agence" class="form-control w-full p-3 rounded-lg appearance-none" required>
                            <option value="">Sélectionnez une agence</option>
                            <option value="Abidjan">Abidjan</option>
                            <option value="Paris">Paris</option>
                            <option value="Lyon">Lyon</option>
                            <option value="Nancy">Nancy</option>
                        </select>
                        <i data-feather="home" class="form-icon"></i>
                    </div>

                    <!-- Motif -->
                    <div class="form-group relative">
                        <label for="motif" class="block text-gray-700 font-medium mb-2">Motif du Rendez-vous <span class="text-red-500">*</span></label>
                        <select id="motif" name="motif" class="form-control w-full p-3 rounded-lg appearance-none" required>
                            <option value="">Sélectionnez un motif</option>
                            <option value="Déposer un colis">Déposer un colis</option>
                            <option value="Retirer un colis">Retirer un colis</option>
                            <option value="Autres">Autres</option>
                        </select>
                        <i data-feather="clipboard" class="form-icon"></i>
                    </div>
                </div>

                <!-- Précisez le motif (caché par défaut) -->
                <div id="autre-motif-group" class="form-group mb-6" style="display: none;">
                    <label for="autre_motif" class="block text-gray-700 font-medium mb-2">Précisez le motif <span class="text-red-500">*</span></label>
                    <input type="text" id="autre_motif" name="autre_motif" class="form-control w-full p-3 rounded-lg" placeholder="Votre motif" />
                </div>

                <!-- Bouton Soumettre -->
                <button type="submit" class="btn-primary w-full py-3 px-6 rounded-lg text-white font-medium text-lg flex items-center justify-center">
                    Confirmer le rendez-vous
                    <i data-feather="arrow-right" class="ml-2"></i>
                </button>
            </form>
        </section>
    </div>

    <!-- WhatsApp Button -->
    <div class="whatsapp-button fixed bottom-8 right-8 z-50">
        <a href="#" id="whatsappButton" class="whatsapp-btn">
            <i data-feather="message-circle"></i>
        </a>
    </div>

    <script>
        $(document).ready(function() {
            feather.replace();
            
            // Date min aujourd'hui
            const today = new Date();
            const dd = String(today.getDate()).padStart(2, '0');
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const yyyy = today.getFullYear();
            document.getElementById('date').min = `${yyyy}-${mm}-${dd}`;

            // Gérer la soumission du formulaire
            $('#rendezvousForm').submit(function(e) {
                e.preventDefault();
                
                // Afficher un loader SweetAlert
                Swal.fire({
                    title: 'Traitement en cours...',
                    text: 'Merci de patienter pendant la confirmation de votre rendez-vous.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Simuler une requête AJAX (à remplacer par votre véritable appel API)
                setTimeout(() => {
                    Swal.close();
                    Swal.fire({
                        icon: 'success',
                        title: 'Rendez-vous confirmé!',
                        html: `
                            <div class="text-center">
                                <i data-feather="check-circle" class="w-12 h-12 text-purple-500 mb-4 mx-auto"></i>
                                <p class="text-lg">Votre rendez-vous a bien été enregistré.</p>
                                <p class="mt-2 text-gray-600">Un email de confirmation vous a été envoyé.</p>
                            </div>
                        `,
                        confirmButtonText: 'Fermer',
                        confirmButtonColor: '#7B01F7',
                        customClass: {
                            popup: 'rounded-xl shadow-2xl',
                            confirmButton: 'px-6 py-2 rounded-lg font-medium'
                        }
                    }).then(() => {
                        $('#rendezvousForm')[0].reset();
                    });
                    feather.replace();
                }, 2000);
            });

            // Valider la date (pas de week-end)
            $('#date').on('change', function() {
                const selectedDate = new Date(this.value);
                const day = selectedDate.getDay(); // 0 = Dimanche, 6 = Samedi

                if (day === 0 || day === 6) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Jour non disponible',
                        html: `
                            <div class="text-center">
                                <i data-feather="calendar" class="w-10 h-10 text-yellow-500 mb-3 mx-auto"></i>
                                <p class="text-lg">Les rendez-vous ne sont disponibles que du lundi au vendredi.</p>
                            </div>
                        `,
                        confirmButtonText: 'Fermer',
                        confirmButtonColor: '#7B01F7',
                        customClass: {
                            popup: 'rounded-xl shadow-2xl',
                            confirmButton: 'px-6 py-2 rounded-lg font-medium'
                        }
                    });
                    this.value = "";
                }
            });

            // Afficher/masquer le champ "autre motif"
            $('#motif').on('change', function() {
                if ($(this).val() === 'Autres') {
                    $('#autre-motif-group').show();
                    $('#autre_motif').attr('required', true);
                } else {
                    $('#autre-motif-group').hide();
                    $('#autre_motif').val('');
                    $('#autre_motif').removeAttr('required');
                }
            });

            // WhatsApp Button Functionality
            $('#whatsappButton').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Contactez-nous sur WhatsApp',
                    html: `
                        <div class="text-center">
                            <i data-feather="message-circle" class="w-12 h-12 text-green-500 mb-4 mx-auto"></i>
                            <p class="mb-4">Choisissez une agence pour nous contacter :</p>
                            <select id="whatsappSelect" class="w-full p-3 border rounded-lg">
                                <option value="">Sélectionnez une agence</option>
                                <option value="+22512345678">Abidjan</option>
                                <option value="+3312345678">Paris</option>
                                <option value="+33412345678">Lyon</option>
                                <option value="+33312345678">Nancy</option>
                            </select>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Envoyer',
                    confirmButtonColor: '#25D366',
                    cancelButtonText: 'Annuler',
                    customClass: {
                        popup: 'rounded-xl shadow-2xl',
                        confirmButton: 'px-6 py-2 rounded-lg font-medium',
                        cancelButton: 'px-6 py-2 rounded-lg font-medium'
                    },
                    preConfirm: () => {
                        const numero = $('#whatsappSelect').val();
                        if (!numero) {
                            Swal.showValidationMessage('Veuillez sélectionner une agence');
                            return false;
                        }
                        return numero;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const message = encodeURIComponent("Bonjour, je vous contacte via WhatsApp !");
                        window.open(`https://api.whatsapp.com/send?phone=${result.value}&text=${message}`, '_blank');
                    }
                });
                feather.replace();
            });
        });
    </script>
</body>
</html>
