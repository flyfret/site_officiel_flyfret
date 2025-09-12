<header class="header-section sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="/assets/images/logo.png" alt="FlyFret Logo" class="img-fluid logo-img">
            </a>
            
            <!-- Bouton toggler mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Contenu du menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Liens de navigation centrés -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-2">
                        <a class="nav-link {{ request()->routeIs('apropos') ? 'active' : '' }}" href="{{route('apropos')}}">À propos</a>
                    </li>
                    
                    <li class="nav-item dropdown px-lg-2">
                        <a 
                            class="nav-link dropdown-toggle {{ request()->routeIs('index12') || request()->routeIs('suiviColis') ? 'active' : '' }}" 
                            id="expeditionDropdown" 
                            href="{{ route('index12') }}"
                            role="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                        >
                            EXPEDITION
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="expeditionDropdown">
                            <li><a class="dropdown-item {{ request()->routeIs('index12') ? 'active' : '' }}" href="{{route('index12')}}">Envoyer votre colis</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('suiviColis') ? 'active' : '' }}" href="{{ route('suiviColis') }}">Suivre votre colis</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item px-lg-2">
                        <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{route('blog')}}">BLOG</a>
                    </li>
                    
                    <li class="nav-item px-lg-2">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{route('contact')}}">CONTACT</a>
                    </li>
                </ul>
                
                <!-- Boutons alignés à droite -->
                <div class="d-flex align-items-center ms-lg-3">
                    <a href="{{ route('colis.index') }}" id="btn-devis" class="btn btn-gradient-custom me-2 d-none d-lg-inline-flex align-items-center justify-content-center">
                        Obtenez devis <span class="arrow ms-2">➔</span>
                    </a>
                    
                    @guest
                        <a href="{{ route('login.client.submit') }}" class="btn btn-gradient-custom d-none d-lg-inline-flex align-items-center justify-content-center" id="btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i> Connexion
                        </a>
                    @endguest
                    
                    @auth
                        <div class="dropdown profile-dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="{{ route('historique_colis') }}" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ $user->photo ?? 'https://ui-avatars.com/api/?name='.urlencode($client->nom_cli).'&background=7B01F7&color=fff' }}" alt="Profile" class="profile-img rounded-circle me-2" style="width:32px;height:32px;object-fit:cover;">
                                <span class="profile-name">{{ $client->nom_cli }}</span>
                            </a>
                            <ul class="dropdown-menu profile-menu" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="{{ route('historique_colis') }}"><i class="fas fa-user"></i> Mon Profil</a></li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>

<style>
    :root {
        --dark-color: #2d3748;
        --transition: all 0.2s;
        --primary-color: #7B01F7;
        --secondary-color: #F10CF3;
    }
    
    /* Style général */
    .navbar {
        padding: 15px 0;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    }
    
    /* Logo optimisé */
    .navbar-brand {
        height: 60px;
        display: flex;
        align-items: center;
        padding: 0;
        margin-right: 2rem;
    }
    
    .logo-img {
        height: 100%;
        width: auto;
        max-width: 180px;
        object-fit: contain;
        transition: all 0.3s ease;
    }
    
    /* Liens de navigation */
    .nav-link {
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 8px 15px;
        color: var(--dark-color);
        transition: var(--transition);
        position: relative;
    }
    
    .nav-link:hover,
    .nav-link:focus {
        color: var(--primary-color);
    }
    
    /* Style pour les liens actifs */
    .nav-link.active {
        color: var(--primary-color);
        font-weight: 600;
    }
    
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 12px;
        right: 12px;
        height: 2px;
        background-color: var(--primary-color);
        border-radius: 2px;
    }
    
    /* Style spécifique pour le dropdown Expedition */
    .nav-item.dropdown .nav-link.active {
        color: var(--primary-color);
    }
    
    .nav-item.dropdown .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 12px;
        right: 12px;
        height: 2px;
        background-color: var(--primary-color);
        border-radius: 2px;
    }
    
    /* Style pour les items dropdown actifs */
    .dropdown-item.active {
        background-color: #f8f9fa !important;
        color: var(--primary-color) !important;
        font-weight: 600;
    }
    
    /* Boutons - Style uniformisé */
    .btn-gradient-custom {
        background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
        color: #fff !important;
        border: none !important;
        border-radius: 8px !important;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 10px 22px;
        min-width: 160px;
        height: 40px;
        box-shadow: 0 2px 10px rgba(123,1,247,0.08);
        transition: all 0.2s;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-gradient-custom:hover, 
    .btn-gradient-custom:focus {
        background: linear-gradient(90deg, var(--secondary-color) 0%, var(--primary-color) 100%) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(241,12,243,0.13);
    }
    
    /* Style pour la flèche */
    .btn-gradient-custom .arrow {
        transition: transform 0.3s ease;
    }
    
    .btn-gradient-custom:hover .arrow {
        transform: translateX(3px);
    }
    
    /* Dropdown */
    .dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-radius: 8px;
        padding: 0.5rem 0;
        margin-top: 8px;
    }
    
    .dropdown-item {
        padding: 0.5rem 1.5rem;
        transition: all 0.2s;
        border-radius: 4px;
        margin: 0 5px;
        width: calc(100% - 10px);
    }
    
    .dropdown-item:hover {
        background-color: var(--primary-color) !important;
        color: #fff !important;
    }
    
    /* Profile dropdown */
    .profile-dropdown .dropdown-toggle {
        padding: 8px 12px;
        border-radius: 8px;
        transition: all 0.3s;
    }
    
    .profile-dropdown .dropdown-toggle:hover {
        background-color: rgba(123,1,247,0.1);
    }
    
    .profile-name {
        font-weight: 500;
    }
    
    /* Version mobile */
    @media (max-width: 991.98px) {
        .navbar-brand {
            height: 50px;
        }
        
        .navbar-collapse {
            padding-top: 1rem;
        }
        
        .nav-item {
            margin-bottom: 0.5rem;
        }
        
        .btn-gradient-custom {
            width: 100%;
            margin-bottom: 0.5rem;
            justify-content: center;
            border-radius: 8px !important;
            padding: 10px 20px;
            min-width: auto;
        }
        
        #btn-devis, #btn-login {
            display: flex !important;
        }
        
        .profile-dropdown {
            width: 100%;
        }
        
        .profile-dropdown .dropdown-toggle {
            justify-content: center;
            padding: 10px;
        }
        
        .nav-link.active::after {
            bottom: 0;
            left: 0;
            right: auto;
            width: 3px;
            height: 100%;
        }
    }
    
    @media (max-width: 575.98px) {
        .navbar-brand {
            height: 40px;
        }
        
        .profile-img {
            width: 28px !important;
            height: 28px !important;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du dropdown EXPEDITION pour mobile uniquement
    const expeditionDropdown = document.getElementById('expeditionDropdown');
    if(expeditionDropdown) {
        function isMobile() {
            return window.innerWidth < 992;
        }

        expeditionDropdown.addEventListener('click', function(e){
            if(isMobile()) {
                e.preventDefault();
                const dropdownMenu = this.nextElementSibling;
                if(dropdownMenu) {
                    dropdownMenu.classList.toggle('show');
                }
            }
            // Sinon, navigation normale vers "Envoyer votre colis"
        });

        // Ferme le menu si on clique ailleurs (mobile)
        document.addEventListener('click', function(e) {
            if(isMobile()) {
                if(!expeditionDropdown.contains(e.target) && !expeditionDropdown.nextElementSibling.contains(e.target)){
                    const dropdownMenu = expeditionDropdown.nextElementSibling;
                    if(dropdownMenu && dropdownMenu.classList.contains('show')) {
                        dropdownMenu.classList.remove('show');
                    }
                }
            }
        });

        // Ajoute la classe active au parent quand un sous-menu est cliqué
        document.querySelectorAll('#expeditionDropdown + .dropdown-menu .dropdown-item').forEach(item => {
            item.addEventListener('click', function() {
                expeditionDropdown.classList.add('active');
            });
        });

        // Vérifie l'URL au chargement pour activer le parent si nécessaire
        if(window.location.pathname.includes('envoyer-votre-colis') || 
           window.location.pathname.includes('suivre-votre-colis')) {
            expeditionDropdown.classList.add('active');
        }
    }
});
</script>