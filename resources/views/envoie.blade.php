@extends('layouts.app')
@section('title', 'FlyFret - Accueil')
@section('ChildContent')
    <style>
        :root {
            --primary-color: ##8022F4;
            --primary-light: #F20CF3;
            --secondary-color: #F20CF3;
            --dark-color: #2d3748;
            --light-color: #f7fafc;
            --white: #ffffff;
            --gray-light: #edf2f7;
            --gray: #e2e8f0;
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --danger-color: #f56565;
        }

        /* Hero Section */
        .hero-section {
            background:
                linear-gradient(#8022F4, #F20CF3),
                url('/assets/images/im.jpg');
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
            box-shadow: inset 0 0 0 1000px rgba(0,0,0,0.1);
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/assets/images/pattern.svg') repeat;
            opacity: 0.08;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            padding: 0 20px;
        }
        .hero-content h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }
        .hero-content .sub-title {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.92);
        }

        /* Page Title */
        .page-title {
            text-align: center;
            margin: 60px 0 40px;
        }
        .page-title h1 {
            color: var(--dark-color);
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        .title-divider {
            width: 90px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            margin: 20px auto 30px;
            border: none;
            border-radius: 2px;
        }

        /* Form Styles */
        .form-container {
            max-width: 1200px;
            margin: 0 auto 60px;
            padding: 0 20px;
        }
        .form-column {
            background: var(--white);
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            border: 1px solid var(--gray);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .form-column:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        fieldset {
            border: 1px solid var(--gray);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            transition: border-color 0.3s;
        }
        fieldset:hover {
            border-color: var(--primary-light);
        }
        legend {
            font-weight: 700;
            color: var(--primary-color);
            padding: 0 15px;
            font-size: 1.1rem;
            background: var(--white);
        }
        .form-group {
            margin-bottom: 22px;
            position: relative;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark-color);
            font-size: 0.97rem;
        }
        .form-group input {
            width: 100%;
            padding: 13px 16px;
            border: 2px solid var(--gray);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            background-color: var(--light-color);
        }
        .form-group input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(123, 1, 247, 0.13);
            outline: none;
            background-color: var(--white);
        }
        .error-message {
            color: var(--danger-color);
            font-size: 0.87rem;
            margin-top: 6px;
            display: none;
            font-weight: 500;
        }
        .is-invalid {
            border-color: var(--danger-color) !important;
        }
        /* Checkbox Styles */
        .terms-checkbox {
            margin: 25px 0;
            display: flex;
            align-items: flex-start;
        }
        .terms-checkbox input[type="checkbox"] {
            margin-right: 10px;
            margin-top: 3px;
            accent-color: var(--primary-color);
            width: 18px;
            height: 18px;
            min-width: 18px;
        }
        .terms-checkbox label {
            font-size: 0.95rem;
            color: var(--dark-color);
            line-height: 1.4;
            cursor: pointer;
        }
        .terms-checkbox a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }
        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        /* Buttons */
        .submit-button {
            text-align: center;
            margin-top: 35px;
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.10);
        }
        .btn-primary:hover {
            background-color: #8022F4;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(123, 1, 247, 0.18);
        }
        .btn-secondary {
            background-color: var(--white);
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            padding: 14px 32px;
            font-weight: 600;
            border-radius: 50px;
            font-size: 1.05rem;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .btn-secondary:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px #8022F4;
        }
        .btn-alternate {
            background-color: var(--warning-color);
            color: var(--white);
            border: none;
            padding: 14px 32px;
            font-weight: 600;
            border-radius: 50px;
            font-size: 1.05rem;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.10);
            margin-left: 15px;
        }
        .btn-alternate:hover {
            background-color: #dd6b20;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(237, 137, 54, 0.18);
        }
        
        /* Styles pour boutons désactivés */
        .btn-disabled {
            background-color: #cccccc !important;
            color: #666666 !important;
            cursor: not-allowed !important;
            opacity: 0.7;
            box-shadow: none !important;
        }
        .btn-disabled:hover {
            transform: none !important;
            box-shadow: none !important;
        }
        
        .button-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* Alert Styles */
        .alert {
            padding: 18px;
            margin-bottom: 30px;
            border-radius: 10px;
            font-size: 1rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .alert-success {
            background-color: #f0fff4;
            color: #2f855a;
            border: 2px solid #c6f6d5;
        }
        .alert-danger {
            background-color: #fff5f5;
            color: #c53030;
            border: 2px solid #fed7d7;
        }
        .alert ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .hero-section { height: 300px; }
            .hero-content h1 { font-size: 2.5rem; }
        }
        @media (max-width: 767.98px) {
            .form-column { padding: 20px; }
            .hero-section { height: 220px; }
            .hero-content h1 { font-size: 1.7rem; }
            .page-title h1 { font-size: 1.3rem; }
            .button-group {
                flex-direction: column;
                gap: 10px;
            }
            .btn-alternate {
                margin-left: 0;
            }
        }
        @media (max-width: 575.98px) {
            .form-column { padding: 10px; }
            .hero-section { height: 140px; }
            .hero-content h1 { font-size: 1.1rem; }
            .btn-primary, .btn-secondary, .btn-alternate { width: 100%; }
        }
    </style>

    <section class="hero-section">
        <div class="hero-content">
            <h1>EXPEDITION</h1>
            <span class="sub-title">Expédition > Envoyer votre colis</span>
        </div>
    </section>

    <!-- Page Title -->
    <div class="page-title">
        <h1>Envoyez votre colis rapidement et facilement</h1>
        <hr class="title-divider">
    </div>

    <!-- Messages d'alerte -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Section -->
    <div class="form-container">
        <form id="expeditionForm" action="{{ route('envoie.paiement') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Section Expéditeur -->
                <div class="col-lg-6">
                    <div class="form-column">
                        <fieldset>
                            <legend><i class="fas fa-user"></i> Informations de l'expéditeur</legend>
                            <div class="form-group">
                                <label for="sender-name">Nom *</label>
                                <input type="text" id="sender-name" name="nom_expediteur" value="{{ $client->nom_cli ?? old('nom_expediteur') }}" required
                                       pattern="[A-Za-zÀ-ÿ\s\-']+" title="Seules les lettres, espaces, traits d'union et apostrophes sont autorisés">
                                <div class="error-message" id="sender-name-error">Veuillez entrer un nom valide (lettres seulement)</div>
                            </div>

                            <div class="form-group">
                                <label for="sender-surname">Prénom *</label>
                                <input type="text" id="sender-surname" name="prenom_expediteur" value="{{ $client->prenom_cli ?? old('prenom_expediteur') }}" required
                                       pattern="[A-Za-zÀ-ÿ\s\-']+" title="Seules les lettres, espaces, traits d'union et apostrophes sont autorisés">
                                <div class="error-message" id="sender-surname-error">Veuillez entrer un prénom valide (lettres seulement)</div>
                            </div>

                            <div class="form-group">
                                <label for="sender-email">Email *</label>
                                <input type="email" id="sender-email" name="email_expediteur" value="{{ $client->Email_cli ?? old('email_expediteur') }}" required
                                       pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                <div class="error-message" id="sender-email-error">Veuillez entrer une adresse email valide</div>
                            </div>

                            <div class="form-group">
                                <label for="sender-address">Adresse *</label>
                                <input type="text" id="sender-address" name="adresse_expediteur" value="{{ $client->adresse ?? old('adresse_expediteur') }}" required
                                       minlength="5" maxlength="255">
                                <div class="error-message" id="sender-address-error">L'adresse doit contenir entre 5 et 255 caractères</div>
                            </div>

                            <div class="form-group">
                                <label for="sender-contact">Contact *</label>
                                <input type="tel" id="sender-contact" name="contact_expediteur" value="{{ $client->contact_cli ?? old('contact_expediteur') }}" required
                                       pattern="[\+0-9\s\-]+" minlength="8" maxlength="20">
                                <div class="error-message" id="sender-contact-error">Veuillez entrer un numéro de téléphone valide (8-20 chiffres)</div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                
                <!-- Section Destinataire -->
                <div class="col-lg-6">
                    <div class="form-column">
                        <fieldset>
                            <legend><i class="fas fa-box"></i> Informations du destinataire</legend>
                            <div class="form-group">
                                <label for="receiver-name">Nom *</label>
                                <input type="text" id="receiver-name" name="nom_destinataire" value="{{ old('nom_destinataire') }}" required
                                       pattern="[A-Za-zÀ-ÿ\s\-']+" title="Seules les lettres, espaces, traits d'union et apostrophes sont autorisés">
                                <div class="error-message" id="receiver-name-error">Veuillez entrer un nom valide (lettres seulement)</div>
                            </div>

                            <div class="form-group">
                                <label for="receiver-surname">Prénom *</label>
                                <input type="text" id="receiver-surname" name="prenom_destinataire" value="{{ old('prenom_destinataire') }}" required
                                       pattern="[A-Za-zÀ-ÿ\s\-']+" title="Seules les lettres, espaces, traits d'union et apostrophes sont autorisés">
                                <div class="error-message" id="receiver-surname-error">Veuillez entrer un prénom valide (lettres seulement)</div>
                            </div>

                            <div class="form-group">
                                <label for="receiver-email">Email *</label>
                                <input type="email" id="receiver-email" name="email_destinataire" value="{{ old('email_destinataire') }}" required
                                       pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                <div class="error-message" id="receiver-email-error">Veuillez entrer une adresse email valide</div>
                            </div>

                            <div class="form-group">
                                <label for="receiver-address">Adresse *</label>
                                <input type="text" id="receiver-address" name="adresse_destinataire" value="{{ old('adresse_destinataire') }}" required
                                       minlength="5" maxlength="255">
                                <div class="error-message" id="receiver-address-error">L'adresse doit contenir entre 5 et 255 caractères</div>
                            </div>

                            <div class="form-group">
                                <label for="receiver-contact">Contact *</label>
                                <input type="tel" id="receiver-contact" name="contact_destinataire" value="{{ old('contact_destinataire') }}" required
                                       pattern="[\+0-9\s\-]+" minlength="8" maxlength="20">
                                <div class="error-message" id="receiver-contact-error">Veuillez entrer un numéro de téléphone valide (8-20 chiffres)</div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <!-- Hidden Fields -->
            @php
                $colisSession = session('colisData', []);
                $typeColisData = [];
                if (isset($colisSession['type_colis'])) {
                    $decoded = is_array($colisSession['type_colis'])
                        ? $colisSession['type_colis']
                        : json_decode($colisSession['type_colis'], true);
                    $typeColisData = is_array($decoded) ? $decoded : [];
                } elseif (request('type_colis')) {
                    $decoded = is_array(request('type_colis'))
                        ? request('type_colis')
                        : json_decode(request('type_colis'), true);
                    $typeColisData = is_array($decoded) ? $decoded : [];
                }
                $typeColisValue = json_encode($typeColisData, JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS);
                
                // Récupérer les valeurs des champs cachés
                $modeExpedition = session('colisData.mode_expedition') ?? request('mode_expedition', '');
                $villeRetrait = session('colisData.ville_retrait') ?? request('ville_retrait', '');
                $villeExpedition = session('colisData.ville_expedition') ?? request('ville_expedition', '');
                $typeExpedition = session('colisData.type_expedition') ?? request('type_expedition', '');
                $prixTotal = session('colisData.prixTotal') ?? request('prixTotal', 0);
                $prixExpress = session('colisData.prixExpress') ?? request('prixExpress', 0);
                $devise = session('colisData.devise') ?? request('devise', 'XOF');
                
                // Vérifier si la devise est EUR et multiplier par 656 si c'est le cas
                if ($devise === 'EUR') {
                    $prixTotal = $prixTotal * 656;
                    $prixExpress = $prixExpress * 656;
                }
            @endphp

            <input type="hidden" name="type_colis" value="{{ $typeColisValue }}">
            <input type="hidden" name="mode_expedition" value="{{ $modeExpedition }}">
            <input type="hidden" name="ville_retrait" value="{{ $villeRetrait }}">
            <input type="hidden" name="ville_expedition" value="{{ $villeExpedition }}">
            <input type="hidden" name="type_expedition" value="{{ $typeExpedition }}">
            <input type="hidden" name="prixTotal" value="{{ $prixTotal }}">
            <input type="hidden" name="prixExpress" value="{{ $prixExpress }}">
            <input type="hidden" name="devise" value="{{ $devise }}">
            <input type="hidden" name="payment_method" id="paymentMethod" value="online">


             <!-- Conditions générales checkbox -->
            <div class="form-column">
                <div class="terms-checkbox">
                    <input type="checkbox" id="acceptTerms" name="accept_terms" required>
                    <label for="acceptTerms">
                        J'accepte les <a href="{{ route('conditions.generales') }}" target="_blank">conditions générales</a> de FlyFret
                    </label>
                </div>
                <div class="error-message" id="terms-error">Vous devez accepter les conditions générales pour continuer</div>
            </div>

            <!-- Buttons -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="submit-button">
                        <div class="button-group">
                            <button type="submit" id="payNowBtn" class="btn btn-primary btn-lg btn-disabled" disabled>
                                <i class="fas fa-save"></i> Payer Maintenant
                            </button>
                            <button type="button" id="alternatePaymentBtn" class="btn btn-alternate btn-lg btn-disabled" disabled style="background-color: #9a49f9;">
                                <i class="fas fa-money-bill-wave"></i> Payer en espèces
                            </button>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="javascript:history.back()" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer les éléments
            const acceptTermsCheckbox = document.getElementById('acceptTerms');
            const payNowBtn = document.getElementById('payNowBtn');
            const alternatePaymentBtn = document.getElementById('alternatePaymentBtn');
            
            // Fonction pour mettre à jour l'état des boutons
            function updateButtonsState() {
                if (acceptTermsCheckbox.checked) {
                    payNowBtn.disabled = false;
                    alternatePaymentBtn.disabled = false;
                    payNowBtn.classList.remove('btn-disabled');
                    alternatePaymentBtn.classList.remove('btn-disabled');
                } else {
                    payNowBtn.disabled = true;
                    alternatePaymentBtn.disabled = true;
                    payNowBtn.classList.add('btn-disabled');
                    alternatePaymentBtn.classList.add('btn-disabled');
                }
            }
            
            // Écouter les changements sur la checkbox
            acceptTermsCheckbox.addEventListener('change', updateButtonsState);
            
            // Initialiser l'état des boutons
            updateButtonsState();

            // Validation des champs en temps réel
            const validateField = (field) => {
                const errorElement = document.getElementById(field.id + '-error');
                if (!field.checkValidity()) {
                    field.classList.add('is-invalid');
                    if (errorElement) errorElement.style.display = 'block';
                    return false;
                } else {
                    field.classList.remove('is-invalid');
                    if (errorElement) errorElement.style.display = 'none';
                    return true;
                }
            };

            // Ajouter les écouteurs d'événements pour la validation en temps réel
            document.querySelectorAll('#expeditionForm input').forEach(input => {
                input.addEventListener('input', function() {
                    validateField(this);
                });
                
                input.addEventListener('blur', function() {
                    validateField(this);
                });
            });

            // Gestion du bouton "Payer autrement"
            if (alternatePaymentBtn) {
                alternatePaymentBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Vérifier si les conditions sont acceptées
                    if (!acceptTermsCheckbox.checked) {
                        showErrorAlert("Vous devez accepter les conditions générales pour continuer");
                        return;
                    }
                    
                    // Changer la méthode de paiement
                    document.getElementById('paymentMethod').value = 'alternate';
                    
                    // Valider tous les champs avant soumission
                    let isValid = true;
                    const requiredFields = document.querySelectorAll('#expeditionForm [required]');
                    
                    requiredFields.forEach(field => {
                        if (!validateField(field)) {
                            isValid = false;
                        }
                    });
                    
                    if (!isValid) {
                        // Faire défiler jusqu'au premier champ invalide
                        const firstInvalid = document.querySelector('.is-invalid');
                        if (firstInvalid) {
                            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        return;
                    }
                    
                    // Afficher un indicateur de chargement
                    const originalText = alternatePaymentBtn.innerHTML;
                    alternatePaymentBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
                    alternatePaymentBtn.disabled = true;
                    
                    // Créer un formulaire dynamique pour soumettre les données
                    const form = document.getElementById('expeditionForm');
                    const formData = new FormData(form);
                    
                    // Envoyer les données via AJAX
                    fetch("{{ route('envoie.store') }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        }
                    })
                    .then(async response => {
                        const contentType = response.headers.get('content-type');
                        if (contentType && contentType.includes('application/json')) {
                            return response.json();
                        }
                        return response.text().then(text => {
                            throw new Error(text || 'Réponse inattendue du serveur');
                        });
                    })
                    .then(data => {
                        if (data.success && data.redirect_url) {
                            // Rediriger vers la page de confirmation
                            window.location.href = data.redirect_url;
                        } else {
                            // Afficher les erreurs de validation
                            showErrorAlert(data.message || 'Une erreur est survenue lors du traitement');
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        showErrorAlert(error.message || 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.');
                    })
                    .finally(() => {
                        // Restaurer le bouton
                        alternatePaymentBtn.innerHTML = originalText;
                        alternatePaymentBtn.disabled = false;
                    });
                });
            }
            
            function showErrorAlert(message) {
                // Supprimer les anciennes alertes
                const oldAlerts = document.querySelectorAll('.alert.alert-danger');
                oldAlerts.forEach(alert => alert.remove());
                
                // Créer une nouvelle alerte
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger';
                alertDiv.innerHTML = `
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-circle mt-1 mr-2"></i>
                        <div>
                            <strong>Erreur</strong>
                            <div class="text-sm">${message}</div>
                        </div>
                    </div>
                `;
                
                // Insérer l'alerte après le hero section
                const heroSection = document.querySelector('.hero-section');
                if (heroSection) {
                    heroSection.insertAdjacentElement('afterend', alertDiv);
                } else {
                    document.body.prepend(alertDiv);
                }
                
                // Faire défiler vers le haut pour voir l'erreur
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                
                // Supprimer automatiquement après 10 secondes
                setTimeout(() => {
                    alertDiv.remove();
                }, 10000);
            }
        });
    </script>
@endsection