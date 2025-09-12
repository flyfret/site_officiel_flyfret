@extends('layouts.app')
@section('title', 'FlyFret - Accueil')
@section('ChildContent')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #8a2be2;
            --secondary-color: #ff69b4;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --gray: #6c757d;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
            --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --shadow-md: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --transition: all 0.3s ease;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.15) !important;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border-color: rgba(220, 53, 69, 0.3);
            color: var(--dark-color);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }

        /* Page Header */
        .page-header {
            background: rgba(138, 43, 226, 0.4);
            padding: 100px 0 60px;
            color: var(--white);
            text-align: center;
            position: relative;
            overflow: hidden;
            background-image: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
        }
        
        .page-header h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.2);
            letter-spacing: -0.5px;
        }
        
        .page-header p {
            font-size: 1.25rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.95;
            font-weight: 300;
        }
        
        /* Tracking Section */
        .tracking-section {
            padding: 40px 0;
        }
        
        .tracking-card {
            background: var(--white);
            border-radius: 16px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(138, 43, 226, 0.15);
            margin-bottom: 30px;
            border: none;
            max-width: 800px;
            margin: -100px auto 50px;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(138, 43, 226, 0.1);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
            display: block;
            font-size: 0.95rem;
        }
        
        .form-control-lg {
            height: 56px;
            border-radius: 12px;
            border: 2px solid rgba(138, 43, 226, 0.2);
            font-size: 1.1rem;
            padding-left: 50px;
            transition: var(--transition);
        }
        
        .form-control-lg:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(138, 43, 226, 0.15);
        }
        
        .form-control-lg::placeholder {
            color: #adb5bd;
            font-weight: 300;
        }
        
        .btn-track {
            background: linear-gradient(90deg, #7B01F7 0%, #F10CF3 100%);
            color: var(--white);
            border: none;
            border-radius: 12px;
            padding: 16px 40px;
            font-weight: 600;
            transition: var(--transition);
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(138, 43, 226, 0.3);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-track:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(138, 43, 226, 0.4);
            color: var(--white);
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
        }
        
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            z-index: 10;
            font-size: 1.2rem;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Results Section */
        .results-section {
            padding: 40px 0 80px;
        }
        
        .status-card {
            background: var(--white);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(138, 43, 226, 0.1);
            margin-bottom: 30px;
            border-left: 5px solid var(--primary-color);
        }
        
        .status-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .status-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .status-badge {
            background-color: rgba(138, 43, 226, 0.1);
            color: var(--primary-color);
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Progress Bar */
        .progress-container {
            width: 100%;
            margin: 40px 0;
            position: relative;
        }
        
        .progress-bar {
            height: 6px;
            background-color: var(--light-gray);
            border-radius: 3px;
            position: relative;
        }
        
        .progress {
            height: 100%;
            border-radius: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            width: 0;
            transition: width 1s ease;
        }
        
        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 30px;
            margin-top: 40px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: var(--light-gray);
        }
        
        .timeline-item {
            position: relative;
            padding-bottom: 30px;
        }
        
        .timeline-item:last-child {
            padding-bottom: 0;
        }
        
        .timeline-dot {
            position: absolute;
            left: -30px;
            top: 0;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--white);
            border: 4px solid var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
        }
        
        .timeline-item.active .timeline-dot,
        .timeline-item.completed .timeline-dot {
            border-color: var(--primary-color);
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        .timeline-content {
            background-color: var(--light-color);
            padding: 20px;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
        }
        
        .timeline-date {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .timeline-status {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 10px;
        }
        
        .timeline-text {
            margin: 0;
            color: var(--gray);
        }
        
        /* Package Details */
        .package-details {
            margin-top: 50px;
        }
        
        .package-details h4 {
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .detail-card {
            background: var(--white);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            border-left: 3px solid var(--primary-color);
            box-shadow: var(--shadow-sm);
        }
        
        .detail-card h5 {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 10px;
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--gray);
            min-width: 150px;
        }
        
        .detail-value {
            color: var(--dark-color);
        }
        
        /* Responsive */
        @media (max-width: 767.98px) {
            .page-header {
                padding: 100px 0 60px;
            }

            .page-header h1 {
                font-size: 2.2rem;
            }

            .page-header p {
                font-size: 1rem;
            }
            
            .tracking-card {
                padding: 30px;
                margin: -80px auto 30px;
                border-radius: 12px;
            }
            
            .form-control-lg {
                height: 50px;
                font-size: 1rem;
                padding-left: 45px;
            }
            
            .btn-track {
                padding: 14px 30px;
                font-size: 1rem;
            }
            
            .input-icon {
                font-size: 1rem;
                width: 20px;
                height: 20px;
            }
            
            .status-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .status-title {
                font-size: 1.5rem;
            }
            
            .detail-row {
                flex-direction: column;
            }
            
            .detail-label {
                margin-bottom: 5px;
            }
        }
    </style>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Suivi de colis</h1>
            <p>Entrez le numéro de suivi et le nom de l'expéditeur pour suivre votre colis</p>
        </div>
    </section>

    <!-- Tracking Section -->
    <section class="tracking-section">
        <div class="container">
            <div class="tracking-card">
                <form id="trackingForm" method="POST" action="{{ route('suivi.store') }}">
                    @csrf
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label for="trackingNumber" class="form-label">Numéro de colis</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-barcode"></i>
                                </span>
                                <input type="text" id="trackingNumber" name="trackingNumber" 
                                    class="form-control form-control-lg @error('trackingNumber') is-invalid @enderror" 
                                    placeholder="Ex: AL00001" 
                                    value="{{ old('trackingNumber') }}" required>
                            </div>
                            @error('trackingNumber')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="trackingName" class="form-label">Nom de l'expéditeur</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" id="trackingName" name="trackingName" 
                                    class="form-control form-control-lg @error('trackingName') is-invalid @enderror" 
                                    placeholder="Entrez le nom de l'expéditeur" 
                                    value="{{ old('trackingName') }}" required>
                            </div>
                            @error('trackingName')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-grid mt-2">
                        <button class="btn btn-track" type="submit">
                            <span id="searchText">Rechercher</span>
                            <span id="searchSpinner" class="spinner-border spinner-border-sm d-none"></span>
                            <i class="fas fa-search ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Erreur de recherche</strong>
                <p class="mt-2 mb-0">{{ session('error') }}</p>
                <p class="mt-2 mb-0">Veuillez vérifier les informations ou contacter notre service client.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(isset($colis) && $colis)
            <!-- Results Section -->
            <div class="status-card">
                <div class="status-header">
                    <span class="status-badge">
                        @if($colis->status === 'livré')
                            <i class="fas fa-check-circle"></i> Livré
                        @elseif($colis->status === 'en cours')
                            <i class="fas fa-truck-moving"></i> En cours
                        @elseif($colis->status === 'en attente')
                            <i class="fas fa-clock"></i> En attente
                        @elseif($colis->status === 'problème')
                            <i class="fas fa-exclamation-triangle"></i> Problème
                        @else
                            <i class="fas fa-info-circle"></i> {{ ucfirst($colis->status) }}
                        @endif
                    </span>
                </div>
                
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress" id="progressBar" style="width: 
                            @if($colis->status === 'livré') 100%
                            @elseif($colis->status === 'en cours') 66%
                            @elseif($colis->status === 'en attente') 33%
                            @else 0%
                            @endif">
                        </div>
                    </div>
                </div>
                
                <!-- Timeline -->
                <div class="timeline">
                    @foreach($timeline as $event)
                    <div class="timeline-item 
                        @if($loop->last) active
                        @elseif($event['status'] === 'Livré') completed
                        @endif">
                        <div class="timeline-dot">
                            <i class="{{ $event['icon'] }}"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-date">
                                <i class="far fa-clock"></i>
                                @if($event['date'] instanceof \DateTime)
                                    {{ $event['date']->format('d/m/Y H:i') }}
                                @else
                                    {{ \Carbon\Carbon::parse($event['date'])->format('d/m/Y H:i') }}
                                @endif
                            </div>
                            <h5 class="timeline-status">{{ $event['status'] }}</h5>
                            <p class="timeline-text">{{ $event['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Package Details -->
                <div class="package-details">
                    <h4><i class="fas fa-info-circle"></i> Détails du colis</h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-card">
                                <h5><i class="fas fa-user"></i> Expéditeur</h5>
                                <div class="detail-row">
                                    <div class="detail-label">Nom :</div>
                                    <div class="detail-value">
                                        {{ $colis->expediteur->nom_expediteur ?? 'Non spécifié' }}
                                    </div>
                                </div>
                                @if($colis->expediteur->contact_cli ?? false)
                                <div class="detail-row">
                                    <div class="detail-label">Téléphone :</div>
                                    <div class="detail-value">
                                        {{ $colis->expediteur->contact_cli }}
                                    </div>
                                </div>
                                @endif
                                @if($colis->expediteur->Email_cli ?? false)
                                <div class="detail-row">
                                    <div class="detail-label">Email :</div>
                                    <div class="detail-value">
                                        {{ $colis->expediteur->Email_cli }}
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="detail-card">
                                <h5><i class="fas fa-user-tag"></i> Destinataire</h5>
                                <div class="detail-row">
                                    <div class="detail-label">Nom :</div>
                                    <div class="detail-value">
                                        {{ $colis->destinataire->nom_destinataire ?? 'Non spécifié' }}
                                    </div>
                                </div>
                                @if($colis->destinataire->contact_cli ?? false)
                                <div class="detail-row">
                                    <div class="detail-label">Téléphone :</div>
                                    <div class="detail-value">
                                        {{ $colis->destinataire->contact_cli }}
                                    </div>
                                </div>
                                @endif
                                @if($colis->destinataire->Email_cli ?? false)
                                <div class="detail-row">
                                    <div class="detail-label">Email :</div>
                                    <div class="detail-value">
                                        {{ $colis->destinataire->Email_cli }}
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Détails du colis -->
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="detail-card">
                                <h5><i class="fas fa-barcode"></i> Informations de suivi</h5>
                                <div class="detail-row">
                                    <div class="detail-label">Numéro :</div>
                                    <div class="detail-value">{{ $colis->num_details_colis }}</div>
                                </div>
                                {{-- @if($colis->nom_lot)
                                <div class="detail-row">
                                    <div class="detail-label">Nom du lot :</div>
                                    <div class="detail-value">{{ $colis->nom_lot }}</div>
                                </div> --}}
                                @endif
                                <div class="detail-row">
                                    <div class="detail-label">Date d'envoi :</div>
                                    <div class="detail-value">
                                        @if($colis->created_at instanceof \DateTime)
                                            {{ $colis->created_at->format('d/m/Y H:i') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($colis->created_at)->format('d/m/Y H:i') }}
                                        @endif
                                    </div>
                                </div>
                                @if($colis->status === 'livré' && isset($colis->date_livraison))
                                <div class="detail-row">
                                    <div class="detail-label">Date de livraison :</div>
                                    <div class="detail-value">
                                        @if($colis->date_livraison instanceof \DateTime)
                                            {{ $colis->date_livraison->format('d/m/Y H:i') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($colis->date_livraison)->format('d/m/Y H:i') }}
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Notes supplémentaires -->
                    @if($colis->detail_specifique || $colis->instructions_speciales)
                    <div class="detail-card mt-3">
                        <h5><i class="fas fa-sticky-note"></i> Notes supplémentaires</h5>
                        @if($colis->detail_specifique)
                        <div class="detail-row">
                            <div class="detail-label">Détails :</div>
                            <div class="detail-value">{{ $colis->detail_specifique }}</div>
                        </div>
                        @endif
                        @if($colis->instructions_speciales)
                        <div class="detail-row">
                            <div class="detail-label">Instructions :</div>
                            <div class="detail-value">{{ $colis->instructions_speciales }}</div>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.getElementById('trackingForm').addEventListener('submit', function(e) {
            const btn = this.querySelector('button[type="submit"]');
            const searchText = document.getElementById('searchText');
            const spinner = document.getElementById('searchSpinner');
            
            searchText.textContent = 'Recherche en cours...';
            spinner.classList.remove('d-none');
            btn.disabled = true;
        });
        
        @if(isset($colis) && $colis)
        document.addEventListener('DOMContentLoaded', function() {
            const progressBar = document.getElementById('progressBar');
            if (progressBar) {
                setTimeout(() => {
                    progressBar.style.transition = 'width 1s ease';
                }, 500);
            }
            
            const resultsSection = document.querySelector('.status-card');
            if (resultsSection) {
                setTimeout(() => {
                    resultsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 300);
            }
        });
        @endif
        
        @if(isset($error))
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('trackingForm');
            if (form) {
                form.scrollIntoView({ behavior: 'smooth' });
                
                const btn = form.querySelector('button[type="submit"]');
                const searchText = document.getElementById('searchText');
                const spinner = document.getElementById('searchSpinner');
                
                searchText.textContent = 'Rechercher';
                spinner.classList.add('d-none');
                btn.disabled = false;
            }
        });
        @endif
    </script>
@endsection