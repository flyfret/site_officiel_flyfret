<!DOCTYPE html>
<html lang="en">
  <>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Tableau de bord Admin</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">



    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.c
    ss" />
  </head>
  <style>
 
  
</style>

  <body>
    <div class="wrapper">
    <!-- Sidebar (Menu de navigation) -->
      <div class="sidebar" background-color="#fff">
        <div class="sidebar-logo" style="position: relative;" >
             <!-- Logo dans le menu -->
          <div class="logo-header" data-background-color="#fff">
            <a href="index.html" class="logo">
              <img
              src="assets/img/logo (2).png" alt="Logo" class="login-logo" 
                alt="navbar brand"
                class="navbar-brand"
                height="50"
              />
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
         
        </div>
        <!-- Contenu du menu -->
        <div class="sidebar-wrapper scrollbar scrollbar-inner"id="wap">
          <div class="sidebar-content"id="das">
            <!-- Liste des éléments du menu -->
            <ul class="nav nav-secondary">
            <li class="nav-item active">
              
    <a href="{{ route('index') }}" class="menu-item" aria-expanded="false">
        <div id="menuItem">
            <i class="fas fa-home"></i> <!-- Icône pour le tableau de bord -->
            <p>Tableau de bord</p><!-- Texte du menu -->
            

        </div>
    </a>
</li>         
<li>
    <br>
    <li class="nav-section">
        <!-- Icône de séparation pour la section Logistique -->
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Logistique</h4>
    </li>

    <!-- Section pour le dépôt des colis -->
    <li class="nav-item active">
        <a href="{{ route('index') }}" class="menu-item" data-bs-toggle="collapse" href="#submenu1" aria-expanded="false">
            <div id="menuItem">
                <!-- Icône représentant un carton pour le dépôt des colis -->
                <i class="fas fa-box"></i>
                <p>Dépôt colis</p> <!-- Titre du menu pour déposer un colis -->
            </div>
        </a>
    </li>

    <!-- Section pour la liste des bordereaux -->
    <li class="nav-item active"><br>
        <a href="{{ route('index') }}" class="menu-item" data-bs-toggle="collapse" href="#submenu1" aria-expanded="false">
            <div id="menuItem">
                <!-- Icône représentant un tableau pour afficher la liste des bordereaux -->
                <i class="fas fa-table"></i>
                <p>Liste des bordereaux</p> <!-- Titre du menu pour la liste des bordereaux -->
            </div>
        </a>
    </li>

    <!-- Section pour afficher le statut des bordereaux -->
    <li class="nav-item active"><br>
        <a href="{{ route('index') }}" class="menu-item" data-bs-toggle="collapse" href="#submenu1" aria-expanded="false">
            <div id="menuItem">
                <!-- Icône représentant une liste de tâches pour voir le statut des bordereaux -->
                <i class="fas fa-clipboard-list"></i>
                <p>Statut des bordereaux</p> <!-- Titre du menu pour le statut des bordereaux -->
            </div>
        </a>
    </li>

    <!-- Section pour le suivi des colis -->
    <li class="nav-item active"><br>
        <a href="{{ route('index') }}" class="menu-item" data-bs-toggle="collapse" href="#submenu1" aria-expanded="false">
            <div id="menuItem">
                <!-- Icône représentant un camion pour suivre les colis -->
                <i class="fas fa-truck"></i>
                <p>Suivi de colis</p> <!-- Titre du menu pour suivre l'acheminement des colis -->
            </div>
        </a>
    </li>

    <!-- Section pour le retrait des colis -->
    <li class="nav-item active"><br>
        <a href="{{ route('index') }}" class="menu-item" data-bs-toggle="collapse" href="#submenu1" aria-expanded="false">
            <div id="menuItem">
                <!-- Icône représentant un carton pour le retrait des colis -->
                <i class="fas fa-box"></i>
                <p>Retrait colis</p> <!-- Titre du menu pour le retrait des colis -->
            </div>
        </a>
    </li>

    <li class="nav-section">
        <!-- Icône de séparation pour la section Comptabilité -->
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Comptabilité</h4>
    </li>

    <!-- Section pour la gestion des factures -->
    <li class="nav-item active"><br>
        <a href="{{ route('index') }}" class="menu-item" data-bs-toggle="collapse" href="#submenu1" aria-expanded="false">
            <div id="menuItem">
                <!-- Icône représentant une facture pour les factures -->
                <i class="fas fa-file-invoice-dollar"></i>
                <p>Facture</p> <!-- Titre du menu pour générer une facture -->
            </div>
        </a>
    </li>

    <!-- Section pour voir le statut des paiements -->
    <li class="nav-item active"><br>
        <a href="{{ route('index') }}" class="menu-item" data-bs-toggle="collapse" href="#submenu1" aria-expanded="false">
            <div id="menuItem">
                <!-- Icône représentant une carte de crédit pour le statut des paiements -->
                <i class="fas fa-credit-card"></i>
                <p>Statut du paiement</p> <!-- Titre du menu pour consulter le statut des paiements -->
            </div>
        </a>
    </li>

    <!-- Section pour afficher le reçu de paiement -->
    <li class="nav-item active"><br>
        <a href="{{ route('index') }}" class="menu-item" data-bs-toggle="collapse" href="#submenu1" aria-expanded="false">
            <div id="menuItem">
                <!-- Icône représentant une facture pour le reçu de paiement -->
                <i class="fas fa-file-invoice-dollar"></i>
                <p>Reçu de paiement</p> <!-- Titre du menu pour afficher un reçu de paiement -->
            </div>
        </a>
    </li>

    
    
</li>



<style>

    /* Style des éléments du menu */
    .mu-item {
        display: inline-block; /* Affiche les éléments du menu côte à côte */
        text-align: center; /* Centre le texte */
        position: relative; /* Position relative pour le positionnement des éléments internes */
        padding: 10px; /* Ajoute de l'espace autour du texte */
        cursor: pointer; /* Change le curseur pour une main lors du survol */
        transition: color 0.3s ease; /* Animation douce pour la couleur */
        text-decoration: none; /* Enlève la décoration par défaut du lien */
    }
   

    .icon-rose {
    background-color: #f10cf3; /* Couleur rose */
    color: #fff;
}
.icon-secondary{
  background-color:rgb(128, 34, 244);
  color: #fff;
}
.btn-rose{
  background-color: #8022f4;
  color: #fff;
}
.bg-rose{
  background-color: #8022f4;
  color: #fff;
}
.btn-outline-secondary {
  
  color: #8022f4 !important; /* Couleur du texte */
  border-color: #8022f4 !important; /* Couleur de la bordure */
}

.btn-outline-secondary:hover {
  background-color: #8022f4 !important; /* Couleur au survol */
  color: #ffffff !important; /* Texte au survol */
  border-color: #f10cf3 !important; /* Bordure au survol */
}





 

.pagination-container {
  background-color: #f8f9fa;
  padding: 10px 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#prevButton:disabled,
#nextButton:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

#currentPage {
  font-size: 1.2rem;
  font-weight: 500;
}


    /* Effet après le texte de chaque élément du menu */
    .menu-item::after {
        content: ''; /* Crée un élément vide après chaque menu item */
        position: absolute; /* Positionne l'élément par rapport à l'élément parent */
        bottom: 0; /* Place l'élément au bas de l'élément du menu */
        left: 50%; /* Centre l'élément horizontalement */
        width: 0; /* Largeur initiale de l'élément */
        height: 3px; /* Hauteur de l'élément */
        background-color: rgba(148, 0, 211, 0.5); /* Couleur de l'élément */
        transition: width 0.3s ease, height 0.3s ease, opacity 0.3s ease; /* Animation douce pour les changements */
        transform: translateX(-50%); /* Centre l'élément horizontalement */
        z-index: 20; /* Place l'élément au-dessus des autres éléments */
        opacity: 0; /* Cache l'élément au départ */
    }

    /* Effet lors du survol de l'élément ou après un clic */
    .menu-item:hover::after, .menu-item.clicked::after {
        width: 100%; /* Étend l'élément à toute la largeur de l'élément du menu */
        height: 100%; /* Augmente la hauteur */
        opacity: 0.2; /* Rend l'élément partiellement visible */
    }

    
    
</style>

<script>
  
    /* Ajoute un événement de clic sur chaque élément du menu */
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', function() {
            this.classList.add('clicked'); /* Ajoute la classe 'clicked' lorsque l'élément est cliqué */
        });
    });
</script>
            
                                
              
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <!-- Zone principale de l'en-tête -->
        <div class="main-header"style="background-color: #8022f4;top: -5px; height:9.5%">
          <div class="main-header-logo">
            <!-- Logo en haut de la page -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <!-- Boutons pour ouvrir et fermer la barre latérale -->
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i><!-- Icône pour fermer la barre latérale -->
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
          
       <!-- Barre de navigation -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
         >
            <div class="container-fluid">
              <!-- Barre de recherche (visible uniquement sur grand écran) -->
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center" >
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="messageDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                  <!--<i class="fa fa-envelope"></i>-->
                  </a>
                  <ul
                    class="dropdown-menu messages-notif-box animated fadeIn"
                    aria-labelledby="messageDropdown"
                  > 
                  <li>
                      <div
                        class="dropdown-title d-flex justify-content-between align-items-center"
                      >
                      <!--Messages
                        <a href="#" class="small">Mark all as read</a>
                      </div>
                    </li>
                    <li>
                      <div class="message-notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/jm_denis.jpg"
                                alt="Img Profile"
                              />
                            </div>
                            <div class="notif-content">
                              <span class="subject">Jimmy Denis</span>
                              <span class="block"> How are you ? </span>
                              <span class="time">5 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/chadengle.jpg"
                                alt="Img Profile"
                              />
                            </div>
                            <div class="notif-content">
                              <span class="subject">Chad</span>
                              <span class="block"> Ok, Thanks ! </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/mlane.jpg"
                                alt="Img Profile"
                              />
                            </div>
                            <div class="notif-content">
                              <span class="subject">Jhon Doe</span>
                              <span class="block">
                                Ready for the meeting today...
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/talha.jpg"
                                alt="Img Profile"
                              />
                            </div>
                            <div class="notif-content">
                              <span class="subject">Talha</span>
                              <span class="block"> Hi, Apa Kabar ? </span>
                              <span class="time">17 minutes ago</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </li>-->
                    <!--<li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all messages<i class="fa fa-angle-right"></i>
                      </a>-->
                    </li>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                <!--<a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                  <i class="fa fa-bell"></i>
                    <span class="notification">4</span>
                  </a>-->
                  <ul
                    class="dropdown-menu notif-box animated fadeIn"
                    aria-labelledby="notifDropdown"
                  >
                  <!--<li>
                      <div class="dropdown-title">
                        You have 4 new notification
                      </div>
                    </li>-->
                    <!--<li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="notif-icon notif-primary">
                              <i class="fa fa-user-plus"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> New user registered </span>
                              <span class="time">5 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-success">
                              <i class="fa fa-comment"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Rahmad commented on Admin
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img
                                src="assets/img/profile2.jpg"
                                alt="Img Profile"
                              />
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Reza send messages to you
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-danger">
                              <i class="fa fa-heart"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> Farrah liked Admin </span>
                              <span class="time">17 minutes ago</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </li>-->
                    <!--<li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li>-->
                  </ul>
                </li>
                      

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="assets/img/pro.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username" style="color: #fff;">
                      <span class="op-7">Salut,</span>
                      <span class="fw-bold">kanoute</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="assets/img/pro.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>kanoute</h4>
                            <p class="text-muted">saligmail.com</p>
                            <a
                              href="profile.html"
                              class="btn btn-xs btn-secondary btn-sm"
                              >Voir Profile</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Modifier</a>
                        
                       
                        <a class="dropdown-item" href="#">Deconnexion</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

         <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              
              <!--<div class="ms-md-auto py-2 py-md-0">
                
                <a href="#" class="btn btn-secondary btn-round">Ajouter utilisateurs</a>
              </div>-->
            </div>
            <div class="row" >
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                      <div class="icon-big text-center icon-rose bubble-shadow-small">
                        <i class="fas fa-box"></i>
                    </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category"style="color: #8022f4;">Nombre de dépôt</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">

                  <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center  icon-rose bubble-shadow-small"
                        >
                        <i class="fas fa-hand-holding-usd"></i> <!-- Icône pour symboliser un paiement manuel -->

                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Nombre de facture</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>


                    
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                         class="icon-big text-center icon-rose bubble-shadow-small"
                        >
                        <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Nombre de réçu</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                      <div
                          class="icon-big text-center icon-rose bubble-shadow-small"
                      >
                          <i class="fas fa-dolly"></i> <!-- Icône pour le retrait de colis -->
                      </div>

                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Nombre de retrait</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                
            <div class="card" >
                  <div class="card-header"style="background-color: #8022f4;">
                    <div class="card-title" style="color: #fff;">Les derniers connectés</div>
                  </div>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead >
                          <tr >
                            <th>#</th>
                          
                            <th>Mail</th>
                            <th>Heure</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>f</td>
                            <td>f</td>
                            <td>texte</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div>
          
          <div class="col-md-12" style="width: 96%; margin-left:30px;">
  <div class="card">
    <div class="card-header" style="background-color: #f10cf3;">
      <div class="d-flex align-items-center">
        <h4 class="card-title" style="color:white; font-family: 'Montserrat', sans-serif;">
          Liste des utilisateurs ajoutés
        </h4>
        <button
          class="btn btn-rose btn-round ms-auto"
          data-bs-toggle="modal"
          data-bs-target="#addUserModal"
        >
          <i class="fa fa-plus"></i>
          Ajouter utilisateur
        </button>
      </div>
    </div>

    <div class="card-body">
      <!-- Modal pour ajouter un utilisateur -->
      <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
            <h5 class="modal-title">
    <span class="fw-mediumbold">Ajouter</span>
    <span class="fw-light">un utilisateur</span>
</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
    <!-- Formulaire d'ajout d'utilisateur -->
    <form action="{{ route('dashboard.addUser') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" id="nomField" required />
        </div>

        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" id="prenomField" required />
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required />
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required />
        </div>

        <div class="form-group" id="contactField">
            <label>Contact</label>
            <input type="text" name="contact" class="form-control" placeholder="Contact" />
        </div>

        <div class="form-group">
            <label>Type d'utilisateur</label>
            <select name="type_user" class="form-control" id="typeUser" required>
                <option value="">-- Sélectionner --</option>
                <option value="logisticien">Logistique</option>
                <option value="comptable">Comptable</option>
                <option value="administrateur">Administrateur</option>
            </select>
        </div>

        <div class="modal-footer border-0">
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
        </div>
    </form>
</div>



<script>
    document.getElementById('typeUser').addEventListener('change', function () {
        const type = this.value;
        const isAdmin = type === 'administrateur';

        // Afficher ou masquer les champs pour l'administrateur
        document.getElementById('nomField').style.display = isAdmin ? 'none' : 'block';
        document.getElementById('prenomField').style.display = isAdmin ? 'none' : 'block';
        document.getElementById('contactField').style.display = isAdmin ? 'none' : 'block';

        // Désactiver les champs non nécessaires
        document.querySelector('[name="nom"]').required = !isAdmin;
        document.querySelector('[name="prenom"]').required = !isAdmin;
        document.querySelector('[name="contact"]').required = !isAdmin;
    });
</script>


               
          </div>
        </div>
      </div>

      <!-- Affichage des messages d'erreur et de succès -->
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <!-- Formulaire de réinitialisation des tentatives -->
      <div class="card mb-4">
      <div class="card-header">
    <h4>Réinitialiser les tentatives de connexion</h4>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('resetAttempts') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email de l'utilisateur :</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control" 
                placeholder="Email" 
                value="{{ old('email') }}" 
                required>
        </div>

        <!-- Section pour afficher les informations utilisateur -->
        <div id="user-info" class="mt-3" style="display: none;">
            <h5></h5>
            <p><strong></strong> <span id="user-name"></span></p>
            <p><strong>utilisateur</strong> <span id="user-role"></span></p>
        </div>

        <div class="form-group mt-3">
            <label for="password">Nouveau mot de passe (optionnel) :</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-control" 
                placeholder="Nouveau mot de passe">
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Réinitialiser</button>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    document.getElementById('email').addEventListener('input', function () {
        const email = this.value;

        if (email) {
            fetch("{{ route('getUserInfo') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('user-info').style.display = 'block';
                    document.getElementById('user-name').textContent = data.name;
                    document.getElementById('user-role').textContent = data.role;
                } else {
                    document.getElementById('user-info').style.display = 'none';
                }
            })
            .catch(error => console.error('Erreur :', error));
        } else {
            document.getElementById('user-info').style.display = 'none';
        }
    });
</script>


      <!-- Tableau des utilisateurs -->
      <!-- Tableau des utilisateurs -->
<div class="table-responsive">
    <table id="add-row" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Type d'utilisateur</th> <!-- Nouvelle colonne -->
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logisticiens as $user) <!-- Liste des logisticiens -->
                <tr>
                    <td>{{ $user->num_logist }}</td>
                    <td>{{ $user->nom_logist }}</td>
                    <td>{{ $user->prenom_logist }}</td>
                    <td>{{ $user->Email_logist }}</td>
                    <td>{{ $user->contact_logist }}</td>
                    <td>Logistique</td> <!-- Valeur statique pour logistique -->
                    <td>
                        <button class="btn btn-link btn-secondary btn-lg"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-link btn-danger"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            @endforeach
            @foreach($comptables as $user) <!-- Liste des comptables -->
                <tr>
                    <td>{{ $user->num_compta }}</td>
                    <td>{{ $user->nom_compta }}</td>
                    <td>{{ $user->prenom_compta }}</td>
                    <td>{{ $user->Email_compta }}</td>
                    <td>{{ $user->contact_compta }}</td>
                    <td>Comptable</td> <!-- Valeur statique pour comptable -->
                    <td>
                        <button class="btn btn-link btn-secondary btn-lg"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-link btn-danger"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            @endforeach
            @foreach($administrateurs as $user) <!-- Liste des administrateurs -->
                <tr>
                    <td>{{ $user->Id_admin }}</td>
                    <td>{{ $user->nom_admin }}</td>
                    <td>{{ $user->prenom_admin }}</td>
                    <td>{{ $user->Email_admin }}</td>
                    <td>{{ $user->contact_admin }}</td>
                    <td>Administrateur</td> <!-- Valeur statique pour administrateur -->
                    <td>
                        <button class="btn btn-link btn-secondary btn-lg"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-link btn-danger"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    </div>
  

  
 

                    <!-- Pagination -->
<div class="d-flex justify-content-center align-items-center mt-4 pagination-container">
  <button class="btn btn-outline-secondary rounded-pill px-4 me-3" id="prevButton" disabled>
    <i class="fa fa-chevron-left"></i> Précédent
  </button>
  <span id="currentPage" class="badge bg-rose text-white fs-6 px-3 py-2 rounded-pill">Page 1</span>
  <button class="btn btn-outline-secondary rounded-pill px-4 me-3" id="prevButton" disabled>
    Suivant <i class="fa fa-chevron-right"></i>
  </button>
</div>

<!-- Table -->







                  </div>
                </div>
              c</div>
        </div> 


        <!-- Script JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const rowsPerPage = 3; // Nombre de lignes par page
  const tableBody = document.querySelector("#add-row tbody");
  const rows = Array.from(tableBody.querySelectorAll("tr"));
  const totalRows = rows.length;
  const totalPages = Math.ceil(totalRows / rowsPerPage);

  let currentPage = 1;

  // Met à jour l'affichage des lignes et les boutons de pagination
  function updateTable() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    // Affiche uniquement les lignes de la page actuelle
    rows.forEach((row, index) => {
      row.style.display = index >= start && index < end ? "" : "none";
    });

    // Désactive les boutons en fonction de la page
    document.getElementById("prevButton").disabled = currentPage === 1;
    document.getElementById("nextButton").disabled = currentPage === totalPages;
    document.getElementById("currentPage").textContent = `Page ${currentPage}`;
  }

  // Action pour le bouton précédent
  document.getElementById("prevButton").addEventListener("click", function () {
    if (currentPage > 1) {
      currentPage--;
      updateTable();
    }
  });

  // Action pour le bouton suivant
  document.getElementById("nextButton").addEventListener("click", function () {
    if (currentPage < totalPages) {
      currentPage++;
      updateTable();
    }
  });

  // Initialisation de la table à la première page
  updateTable();
});
</script>

<!-- Style CSS -->
<style>
.pagination-container {
  background-color: #f8f9fa;
  padding: 10px 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#prevButton:disabled,
#nextButton:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

#currentPage {
  font-size: 1.2rem;
  font-weight: 500;
}
</style>

        

        <footer class="footer">
        <!--<div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                   <!<a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>-->
        </footer>
      </div>

      <!-- Custom template | don't include it in your project! -->
      <!--<div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>-->
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

    <!-- Bootstrap Notify -->
    
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
