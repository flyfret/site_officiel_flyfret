<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" background-color="#fff">
            <div class="sidebar-logo" style="position: relative;">
                <!-- Logo dans le menu -->
                <div class="logo-header" data-background-color="#fff">
                    <a href="index.html" class="logo">
                        <img src="assets/img/logo (2).png" alt="Logo" class="login-logo" alt="navbar brand"
                            class="navbar-brand" height="50" />
                    </a>
                    <div class="nav-toggle">
                        <!-- Boutons pour afficher/masquer le menu -->
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>

                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner" style="background-color: #8022f4;">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">


                        <br>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="{{route('suivi')}}">
                                <i class="fa-solid fa-box"style="color: #fff;"></i>
                                <p style=" color:#fff ;font-weight:bold;">SUIVI DE COLIS</p>

                            </a>

                        </li><br>
                        <hr style="color: #fff; opacity:5;">
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="{{route('envoie')}}">
                                <i class="fas fa-pen-square" style="color: #fff;"></i>
                                <p style=" color:#fff ;font-weight:bold;"> ENVOI DE COLIS</p>

                        </li> <br>
                        <hr style="color: #fff; opacity:5;">


                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#maps">
                                <i class="fa-solid fa-gift" style="color: #fff;"></i>

                                <p style=" color:#fff ;font-weight:bold;">CLUB DE FIDÉLITÉ</p>

                            </a>

                        </li> <br>
                        <hr style="color: #fff; opacity:5;">
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="www.google.com">
                                <i class="fa-solid fa-box-archive" style="color: #fff;"></i>

                                <p style=" color:#fff ;font-weight:bold;">HISTORIQUE DES ENVOIS</p>

                            </a>

                        </li><br>
                        <hr style="color: #fff; opacity:5;">
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#tables">
                                <i class="fa-solid fa-money-bill-wave" style="color: #fff;"></i>

                                <p style=" color:#fff ;font-weight:bold;">HISTORIQUE DES <br> PAIEMENTS</p>

                            </a>

                        </li>


                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>

                            <!-- Assurez-vous que Bootstrap est bien chargé -->


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="userDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="Profile Image"
                                            class="avatar-img rounded-circle">
                                    </div>
                                    <span class="ms-2 fw-bold">{{ session('client')->nom_cli ?? 'Utilisateur' }}</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" id="dropdownMenu"
                                    aria-labelledby="userDropdown">
                                    <li class="px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-lg">
                                                <img src="{{ asset('assets/img/profile.jpg') }}" alt="Profile Image"
                                                    class="avatar-img rounded-circle" width="50">
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{ session('client')->nom_cli ?? 'Utilisateur' }}
                                                </h6>
                                                <p class="text-muted small mb-0">
                                                    {{ session('client')->Email_cli ?? 'email inconnu' }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('profil') }}">Voir le profil</a></li>
                                    <li>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#editProfileModal">
                                            <i class="fas fa-edit"></i> Modifier le profil
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a></li>
                                </ul>
                            </li>


                            <!-- Modal de modification du profil -->
                            <div class="modal fade" id="editProfileModal" tabindex="-1"
                                aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProfileModalLabel">Modifier le profil</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                        <p>{{ $error }}</p>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <form action="{{ route('update.profile') }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="nom" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" id="nom"
                                                        name="nom" value="{{ session('client')->nom_cli ?? '' }}"
                                                        required>
                                                    @error('nom')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="prenom" class="form-label">Prénom</label>
                                                    <input type="text" class="form-control" id="prenom"
                                                        name="prenom"
                                                        value="{{ session('client')->prenom_cli ?? '' }}" required>
                                                    @error('prenom')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Téléphone</label>
                                                    <input type="tel" class="form-control" id="telephone"
                                                        name="telephone"
                                                        value="{{ session('client')->contact_cli ?? '' }}" required>
                                                    @error('telephone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email"
                                                        value="{{ session('client')->Email_cli ?? '' }}" required>
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">mot de passe</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" autocomplete="off">
                                                    @error('password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary">Enregistrer les
                                                        modifications</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Bootstrap CSS -->

                            <!-- Bootstrap JS (Popper.js inclus) -->


                            <!-- CSS pour personnaliser le modal -->
                            <style>
                                /* Supprimer ou ajuster la transparence du fond */
                                .modal-backdrop {
                                    background-color: rgba(0, 0, 0, 0) !important;
                                    /* Ajuster la transparence */
                                    z-index: 1040 !important;
                                    /* Assure que l'overlay soit sous le modal */
                                }



                                /* Assure que le modal soit bien au-dessus de l'overlay */
                                .modal {
                                    z-index: 1050 !important;
                                }

                                .modal-body input {
                                    pointer-events: auto !important;
                                    /* Activer les interactions */
                                    background-color: #fff !important;
                                    /* Assurer un fond clair */
                                    border: 1px solid #ced4da !important;
                                    /* Assurer une bordure visible */
                                }

                                /* Boutons bien visibles */
                                .modal-footer button {
                                    z-index: 1051 !important;
                                }
                            </style>

                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>



            @yield('content')


            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">

                    <div class="copyright"
                        style="display: flex; justify-content: center; align-items: center; width: 100%; text-align: center;">
                        <i class="fa fa-heart heart text-danger" style="margin-right: 10px;"></i>
                        <a href="http://www.themekita.com" target="_blank"
                            style="text-decoration: none; color: inherit;">FlyFret International Group</a>
                    </div>


                </div>

            </footer>
        </div>


        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>


    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>
</body>

</html>
