@php
    $currentRoute = request()->route()->getName();
    $expeditionRoutes = ['index12', 'suiviColis'];
    $isExpeditionActive = in_array($currentRoute, $expeditionRoutes);
@endphp

<header class="header-section">
    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/images/logo.png') }}" alt="FlyFret" class="logo-img me-2" height="40">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" id="customNavbarToggler" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Principal -->
            <div class="collapse navbar-collapse" id="mainNavbar" style="display: none;">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <!-- Autres liens avant Nos Services -->
                    <li class="nav-item">
                        <a class="nav-link {{ $currentRoute === 'apropos' ? 'active' : '' }}" 
                           href="{{ route('apropos') }}">
                            À propos
                        </a>
                    </li>
                    <!-- Nos Services (menu déroulant) -->
                    <li class="nav-item dropdown mega-menu">
                        <a class="nav-link dropdown-toggle {{ $isExpeditionActive ? 'active' : '' }}" 
                           href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            EXPEDITION
                        </a>
                        <div class="dropdown-menu mega-menu-content shadow">
                            <div class="container">
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <a class="dropdown-item {{ $currentRoute === 'index12' ? 'active' : '' }}" 
                                           href="{{ route('index12') }}">
                                             Envoyer votre colis
                                        </a>
                                        <a class="dropdown-item {{ $currentRoute === 'suiviColis' ? 'active' : '' }}" 
                                           href="{{ route('suiviColis') }}">
                                            Suivre votre colis
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Blog -->
                    <li class="nav-item">
                        <a class="nav-link {{ $currentRoute === 'blog' ? 'active' : '' }}" 
                           href="{{ route('blog') }}">
                            Blog
                        </a>
                    </li>
                    <!-- Contact -->
                    <li class="nav-item">
                        <a class="nav-link {{ $currentRoute === 'contact' ? 'active' : '' }}" 
                           href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>
                </ul>

                <!-- Côté droit (version desktop) -->
                <div class="d-none d-lg-flex align-items-center">
                    <!-- Bouton CTA -->
                    <a href="{{ route('rendezvous.index') }}" class="btn btn-primary-gradient me-3">
                        <i class="fas fa-calendar-alt me-2"></i> Prenez rendez-vous
                    </a>

                    <!-- Utilisateur -->
                    @auth
                        <div class="dropdown profile-dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    @else
                        <a href="{{ route('login.client.submit') }}" class="btn btn-outline-primary">
                            <i class="fas fa-sign-in-alt me-2"></i> Connexion
                        </a>
                    @endauth
                </div>
                
                <!-- Boutons mobiles dans le menu déplié -->
                <div class="d-lg-none mt-3 p-3 border-top">
                    <div class="d-grid gap-2">
                        <a href="{{ route('rendezvous.index') }}" class="btn btn-primary-gradient">
                            <i class="fas fa-calendar-alt me-2"></i> Prenez rendez-vous
                        </a>
                        @auth
                            <a href="{{ route('historique_colis') }}" class="btn btn-outline-primary">
                                <i class="fas fa-user me-2"></i> Mon profil
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="d-grid">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login.client.submit') }}" class="btn btn-outline-primary">
                                <i class="fas fa-sign-in-alt me-2"></i> Connexion
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<style>
    :root {
        --primary-color: #0056b3;
        --secondary-color: #00a0e1;
        --dark-color: #2d3748;
        --light-color: #f8f9fa;
        --white: #ffffff;
    }

    .header-section {
        width: 100%;
        background: #fff;
        z-index: 1050;
        position: sticky;
        top: 0;
        left: 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    /* Main Navbar */
    .navbar {
        padding: 0.8rem 0;
        transition: all 0.3s;
    }

    .navbar.scrolled {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 0.5rem 0;
    }

    .logo-img {
        transition: all 0.3s;
    }

    /* Nav Links */
    .nav-link {
        font-weight: 500;
        padding: 0.5rem 1rem;
        position: relative;
        color: var(--dark-color);
    }

    .nav-link.active {
        color: var(--primary-color) !important;
    }

    .nav-link.active:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 1rem;
        right: 1rem;
        height: 2px;
        background: var(--primary-color);
    }

    /* Mega Menu */
    .mega-menu .dropdown-menu {
        width: 320px;
        max-width: 95vw;
        border: none;
        border-radius: 0;
        margin-top: 0;
        padding: 1.2rem 0.5rem;
        box-sizing: border-box;
        overflow-x: auto;
    }

    .mega-menu-content .container,
    .mega-menu-content .row,
    .mega-menu-content .col-md-4 {
        width: 100%;
        padding: 0;
        margin: 0;
    }

    .dropdown-item {
        white-space: normal;
        word-break: break-word;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        margin: 0.2rem 0.5rem;
        transition: all 0.2s;
        font-size: 1rem;
        max-width: 100%;
        box-sizing: border-box;
    }

    .mega-menu-content {
        border-top: 3px solid var(--primary-color);
    }

    .dropdown-header {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .dropdown-item:hover,
    .dropdown-item.active {
        background-color: rgba(0, 86, 179, 0.1);
        color: var(--primary-color);
    }

    .dropdown-item.active {
        font-weight: 500;
    }

    /* Profile Dropdown */
    .profile-dropdown {
        position: relative;
    }

    .profile-img {
        transition: all 0.3s;
    }

    .profile-name {
        font-weight: 500;
    }

    .profile-menu {
        min-width: 200px;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-top: 3px solid var(--primary-color);
    }

    .profile-menu .dropdown-item {
        padding: 0.5rem 1rem;
    }

    .profile-menu .dropdown-item i {
        width: 20px;
        margin-right: 10px;
        text-align: center;
    }

    /* Affichage du dropdown */
    .dropdown-menu {
        display: none;
        position: absolute;
        left: 0;
        top: 100%;
        z-index: 1000;
        min-width: 220px;
        background: #fff;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    .dropdown-menu.show {
        display: block;
    }
    @media (max-width: 991.98px) {
        .dropdown-menu {
            position: static;
            box-shadow: none;
            min-width: 100%;
        }
    }

    /* Buttons */
    .btn-primary-gradient {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 6px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s;
        box-shadow: 0 2px 10px rgba(0, 86, 179, 0.2);
    }

    .btn-primary-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 86, 179, 0.3);
    }

    .btn-outline-primary {
        border-width: 2px;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            padding: 1rem 0;
        }
        
        .mega-menu .dropdown-menu {
            width: auto;
            max-width: 100vw;
            padding: 1rem 0.5rem;
        }
        
        .dropdown-item {
            margin: 0;
        }
        
        /* Styles pour les boutons mobiles */
        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
        }
        
        /* Menu déplié sur mobile */
        #mainNavbar {
            max-height: calc(100vh - 60px);
            overflow-y: auto;
        }
    }
</style>

<!-- Bootstrap JS obligatoire -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.querySelector('.navbar');
    // Sticky header on scroll
    window.addEventListener('scroll', function () {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Gestion du menu burger mobile
    const toggler = document.getElementById('customNavbarToggler');
    const menu = document.getElementById('mainNavbar');
    let menuOpen = false;

    toggler.addEventListener('click', function () {
        menuOpen = !menuOpen;
        menu.style.display = menuOpen ? 'block' : 'none';
        toggler.setAttribute('aria-expanded', menuOpen ? 'true' : 'false');
        
        // Empêcher le défilement de la page lorsque le menu est ouvert
        document.body.style.overflow = menuOpen ? 'hidden' : '';
    });

    // Ferme le menu quand on clique sur un lien du menu
    menu.querySelectorAll('.nav-link, .btn').forEach(link => {
        link.addEventListener('click', function () {
            menuOpen = false;
            menu.style.display = 'none';
            toggler.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        });
    });

    // Ferme le menu si on clique en dehors
    document.addEventListener('click', function(e) {
        if (menuOpen && !menu.contains(e.target) && !toggler.contains(e.target)) {
            menuOpen = false;
            menu.style.display = 'none';
            toggler.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    });

    // --- DROPDOWN "Nos Services" responsive ---
    const dropdownToggle = document.getElementById('servicesDropdown');
    const dropdownMenu = dropdownToggle?.nextElementSibling;

    if (dropdownToggle && dropdownMenu) {
        // Pour mobile/tablette : affiche le menu au survol ou au toucher
        function showDropdown() {
            dropdownMenu.classList.add('show');
            dropdownToggle.classList.add('show');
            dropdownToggle.setAttribute('aria-expanded', 'true');
        }
        function hideDropdown() {
            dropdownMenu.classList.remove('show');
            dropdownToggle.classList.remove('show');
            dropdownToggle.setAttribute('aria-expanded', 'false');
        }

        // Survol souris
        dropdownToggle.addEventListener('mouseenter', showDropdown);
        dropdownToggle.addEventListener('mouseleave', hideDropdown);
        dropdownMenu.addEventListener('mouseenter', showDropdown);
        dropdownMenu.addEventListener('mouseleave', hideDropdown);

        // Touch (mobile/tablette)
        dropdownToggle.addEventListener('touchstart', function(e) {
            if (!dropdownMenu.classList.contains('show')) {
                showDropdown();
                e.preventDefault();
            } else {
                hideDropdown();
                e.preventDefault();
            }
        });

        // Fermer si on clique ailleurs
        document.addEventListener('click', function(e) {
            if (!dropdownMenu.contains(e.target) && !dropdownToggle.contains(e.target)) {
                hideDropdown();
            }
        });
    }

    // --- DROPDOWN "Profil" responsive ---
    const profileDropdownToggle = document.querySelector('.profile-dropdown .dropdown-toggle');
    const profileDropdownMenu = document.querySelector('.profile-dropdown .dropdown-menu');

    if (profileDropdownToggle && profileDropdownMenu) {
        // Pour desktop : affiche le menu au survol
        function showProfileDropdown() {
            if(window.innerWidth >= 992) {
                profileDropdownMenu.classList.add('show');
                profileDropdownToggle.classList.add('show');
                profileDropdownToggle.setAttribute('aria-expanded', 'true');
            }
        }
        
        function hideProfileDropdown() {
            if(window.innerWidth >= 992) {
                profileDropdownMenu.classList.remove('show');
                profileDropdownToggle.classList.remove('show');
                profileDropdownToggle.setAttribute('aria-expanded', 'false');
            }
        }

        // Survol souris (desktop)
        profileDropdownToggle.addEventListener('mouseenter', showProfileDropdown);
        profileDropdownToggle.addEventListener('mouseleave', hideProfileDropdown);
        profileDropdownMenu.addEventListener('mouseenter', showProfileDropdown);
        profileDropdownMenu.addEventListener('mouseleave', hideProfileDropdown);

        // Pour mobile/tablette : gestion au clic (comportement Bootstrap par défaut)
        profileDropdownToggle.addEventListener('click', function(e) {
            if(window.innerWidth < 992) {
                // Laisser Bootstrap gérer le toggle
                return;
            }
            e.preventDefault(); // Empêche le lien de naviguer
        });

        // Fermer si on clique ailleurs
        document.addEventListener('click', function(e) {
            if (!profileDropdownMenu.contains(e.target) && !profileDropdownToggle.contains(e.target)) {
                hideProfileDropdown();
            }
        });
    }
});
</script>