@extends('layouts.app')
@section('title', 'Contactez FlyFret - Transport international de colis')
@section('ChildContent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary-color: #8022F4;
        --secondary-color: #F20CF3;
        --white: #ffffff;
        --dark-purple: #8022F4;
        --light-bg: #f9f5ff;
    }
    
    .contact-header {
        background: #8022F4;
        padding: 100px 0 60px;
        color: var(--white);
        text-align: center;
        position: relative;
        overflow: hidden;
        background-image: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        background-blend-mode: overlay;
    }
    
    .contact-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    
    .contact-header p {
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.9;
    }
    
    .contact-section {
        padding: 80px 0;
    }
    
    .contact-card {
        background: var(--white);
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.1);
        height: 100%;
        transition: all 0.3s ease;
        border: 1px solid rgba(138, 43, 226, 0.1);
    }
    
    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(138, 43, 226, 0.2);
    }
    
    .contact-icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 20px;
    }
    
    .contact-title {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: var(--dark-purple);
    }
    
    .contact-info {
        margin-bottom: 30px;
    }
    
    .contact-info p {
        margin-bottom: 5px;
    }
    
    .contact-info strong {
        color: var(--dark-purple);
    }
    
    .social-links {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 20px;
    }
    
    .social-links a {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    
    .social-links a:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.3);
    }
    
    .form-section {
        padding: 80px 0;
        background: var(--light-bg);
    }
    
    .contact-form {
        background: var(--white);
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.1);
    }
    
    .form-control {
        height: 50px;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 0 15px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(128, 34, 244, 0.2);
    }
    
    textarea.form-control {
        height: 150px;
        padding: 15px;
        resize: vertical;
    }
    
    .submit-btn {
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        color: var(--white);
        border: none;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.3);
    }
    
    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
    
    .map-section {
        padding: 0 0 80px;
    }
    
    .map-container {
        height: 500px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    
    /* Styles pour les messages d'alerte */
    .alert-container {
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 1050;
        min-width: 350px;
        animation: slideInRight 0.5s ease-out;
    }
    
    .alert-success {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .alert-error {
        background: linear-gradient(135deg, #dc3545, #e83e8c);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .alert-icon {
        font-size: 1.5rem;
        margin-right: 10px;
    }
    
    /* Barre de progression pour la disparition */
    .alert-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 4px;
        background: rgba(255, 255, 255, 0.5);
        width: 100%;
        transform-origin: left;
        animation: progressBar 4s linear forwards;
    }
    
    /* Animation pour la barre de progression */
    @keyframes progressBar {
        0% {
            transform: scaleX(1);
        }
        100% {
            transform: scaleX(0);
        }
    }
    
    /* Animation d'entrée */
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    /* Animation de sortie */
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    .alert-hiding {
        animation: slideOutRight 0.5s ease-in forwards;
    }
    
    @media (max-width: 991.98px) {
        .contact-header h1 {
            font-size: 2.5rem;
        }
        
        .alert-container {
            left: 20px;
            right: 20px;
            min-width: auto;
        }
    }
    
    @media (max-width: 767.98px) {
        .contact-header {
            padding: 80px 0 40px;
        }
        
        .contact-header h1 {
            font-size: 2rem;
        }
        
        .contact-title {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 575.98px) {
        .contact-header h1 {
            font-size: 1.8rem;
        }
        
        .contact-header p {
            font-size: 1rem;
        }
        
        .contact-card {
            padding: 30px;
        }
        
        .contact-form {
            padding: 30px;
        }
        
        .map-container {
            height: 300px;
        }
        
        .alert-container {
            top: 80px;
            left: 10px;
            right: 10px;
        }
    }
</style>

<!-- Messages d'alerte -->
@if(session('success'))
<div class="alert-container" id="successAlert">
    <div class="alert-success">
        <i class="fas fa-check-circle alert-icon"></i>
        <strong>Succès !</strong> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" onclick="closeAlert('successAlert')" style="float: right; background: none; border: none; color: white; font-size: 1.2rem; cursor: pointer;"></button>
        <div class="alert-progress"></div>
    </div>
</div>
@endif

@if(session('error'))
<div class="alert-container" id="errorAlert">
    <div class="alert-error">
        <i class="fas fa-exclamation-triangle alert-icon"></i>
        <strong>Attention !</strong> {{ session('error') }}
        <button type="button" class="btn-close btn-close-white" onclick="closeAlert('errorAlert')" style="float: right; background: none; border: none; color: white; font-size: 1.2rem; cursor: pointer;"></button>
        <div class="alert-progress"></div>
    </div>
</div>
@endif

<!-- Contact Header -->
<section class="contact-header">
    <div class="container">
        <h1>Contactez FlyFret</h1>
        <p>Notre équipe est à votre disposition pour répondre à toutes vos questions sur nos services de transport international</p>
    </div>
</section>

<!-- Contact Info Section -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="contact-card text-center">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 class="contact-title">Téléphone</h3>
                    <div class="contact-info">
                        <p><strong>France</strong></p>
                        <p>+33 5 54 54 31 71</p>
                        <p><strong>Côte d'Ivoire</strong></p>
                        <p>+225 27 22 30 48 19</p>
                        <p>+225 05 94 94 65 65</p>
                    </div>
                    <p>Contactez-nous directement par téléphone</p>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="contact-card text-center">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="contact-title">Email</h3>
                    <div class="contact-info">
                        <p><strong>service.client@fly-fret.com</strong></p>
                    </div>
                    <p>Envoyez-nous un email pour toute demande</p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/p/Exp%C3%A9dition-de-colis-by-Fly-Fret-100090511771224/?_rdr "><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/flyfret/"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/0594946565"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="contact-card text-center">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="contact-title">Bureaux</h3>
                    <div class="contact-info">
                        <p><strong>France</strong></p>
                        <p>Lyon, Paris, Nancy</p>
                        <p><strong>Côte d'Ivoire</strong></p>
                        <p>Abidjan</p>
                        <p><strong>États-Unis</strong></p>
                    </div>
                    <p>Retrouvez-nous dans nos agences</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form">
                    <h2 class="text-center mb-5" style="font-size: 2rem; color: #8022F4;">Envoyez-nous un message</h2>
                    <form method="POST" action="{{ route('contact.send') }}" id="contactForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Votre nom" value="{{ old('name') }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Votre email" value="{{ old('email') }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <input type="text" name="subject" class="form-control" placeholder="Sujet" value="{{ old('subject') }}" required>
                        @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <textarea name="message" class="form-control" placeholder="Votre message" required>{{ old('message') }}</textarea>
                        @error('message')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="text-center">
                            <button type="submit" class="submit-btn" id="submitBtn">
                                <span id="btnText">Envoyer le message</span>
                                <div id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.76457405623!2d2.276994724188026!3d48.8589465815324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C%20France!5e0!3m2!1sfr!2sus!4v1623259877892!5m2!1sfr!2sus" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    
    // Gestion de la soumission du formulaire
    if (contactForm) {
        contactForm.addEventListener('submit', function() {
            // Désactiver le bouton et afficher le spinner
            submitBtn.disabled = true;
            btnText.textContent = 'Envoi en cours...';
            btnSpinner.classList.remove('d-none');
        });
    }
    
    // Auto-dismiss des alertes après 4 secondes
    autoDismissAlerts();
});

// Fonction pour fermer une alerte manuellement
function closeAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
        alert.classList.add('alert-hiding');
        setTimeout(() => {
            alert.remove();
        }, 500);
    }
}

// Fonction pour la disparition automatique des alertes
function autoDismissAlerts() {
    const alerts = document.querySelectorAll('.alert-container');
    
    alerts.forEach(function(alert) {
        // Disparaît automatiquement après 4 secondes
        setTimeout(() => {
            if (alert.parentNode) {
                alert.classList.add('alert-hiding');
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 500);
            }
        }, 4000); // 4 secondes
    });
}

// Réactiver le bouton si la page est rechargée (cas d'erreur de validation)
window.addEventListener('pageshow', function(event) {
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    
    if (submitBtn && submitBtn.disabled) {
        submitBtn.disabled = false;
        btnText.textContent = 'Envoyer le message';
        if (btnSpinner) {
            btnSpinner.classList.add('d-none');
        }
    }
});
</script>

@endsection