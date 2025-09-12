<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>L'Application de flyfret</title>
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

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <style>
    #wa{
      background-color: #8022f4;
      
      }
      p{
        color: #fff;
      }
      #fast {
    color: #fff !important; /* Change la couleur en blanche */
     }
      #wa p:hover{
      color: #fff;
      
     }
     #wa p{
      color: #fff !important;
     }
     hr{
      color: #ffffff;
      border: 1px solid #ffffff;
      
     }
     #bord{
      border-bottom: #ffffff !important;
     }
    
     h1{
      font-size: 24px;
      color: #8022f4
     }
     


  </style>
  <body>
    <div class="wrapper" id="wra">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="white" id="wa">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="white">
            <a href="index.html" class="logo">
            <img
              src="assets/img/logo (2).png" alt="Logo" class="login-logo" 
                alt="navbar brand"
                class="navbar-brand"
                height="50"
              />
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
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content" >
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-users" id="fast"></i>
                  <p>Gestion des clients</p>
                  <span id="caret"></span>
                </a>
                <hr>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="components/avatars.html">
                        <span class="sub-item-fluid " style="color: #e9e7e7">Dépot de colis</span>
                      </a>
                    </li>
                    <hr id="bord">
                    <li>
                      <a href="components/avatars.html">
                        <span class="sub-item-fluid"  style="color: #e9e7e7">Retrait de colis</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <br><br>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                  <i class="fas fa-file-alt" id="fast"></i>
                  <p>Gestion des Bordereaux</p>
                  <span id="caret"></span>
                </a>
                <hr>
                <div class="collapse" id="sidebarLayouts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="sidebar-style-2.html">
                        <span class="sub-item-fluid"  style="color: #e9e7e7">Liste des bordereaux</span>
                      </a>
                    </li>
                    <hr id="bord">
                    <li>
                      <a href="icon-menu.html">
                        <span class="sub-item-fluid"  style="color: #e9e7e7">Statut des bordereaux</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <br><br>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#forms">
                  <i class="fas fa-search" id="fast"></i>
                  <p>Suivi de colis</p>
                </a>
                <hr>
              </li>
              <br><br><br><br><br><br>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-cog" id="fast"></i>
                  <p>Paramètre</p>
                </a>
             
        
                <style>
      .chart {
       display: flex;
       justify-content: space-between;
       align-items: center;
       position: relative;
       top: -150px;
       margin: 0 0px;
       border: 1px solid rgb(236, 227, 227);
       box-shadow: #e9e7e7;
       border-radius: 10px;
       border-left:none;
       padding: 0 200px;
       }
   
.donut-chart {
    width: 200px;
    height: 150px;
    border-radius: 50%;
    background: conic-gradient(#E701F6 40%,  #f2b5f7 40% 70%, #7B01F7 70%);
   
}

.chart-legend {
    list-style: none;
}

.chart-legend li {
    margin-bottom: 40px;
    display: flex;
    align-items: center;
    
}

.chart-legend .rose {
   color: #E701F6;
   font-weight: bold;
}
.chart-legend .rose-1 {
    color:  #f2b5f7;
    font-weight: bold;
 }
 .chart-legend .viollet {
    color: #7B01F7;
    font-weight: bold;
 }


.chart-legend .color {
    width: 50px;
    height: 50px;
    margin-right: 30px;
    
    

}

.color.en-cours {
    background-color: #E701F7;

}
.cours{
  color: #E701F7;
  font-size: 28px;
  font-weight: bold;
}

.color.arriver {
    background-color: #f2b5f7;   
}
.arrive{
  color: #f2b5f7;
  font-size: 28px;
  font-weight: bold;
}

.color.disponible {
    background-color: #7B01F7;
}
.disponible{
  color: #7B01F7;
  font-size: 28px;
  font-weight: bold;
}

/* Personnalisation des flèches */
#caret {
  display: inline-block;
  width: 12px;  /* Taille de la flèche */
  height: 12px;
  border-top: 3px solid #fff; /* Couleur de la flèche */
  border-right: 3px solid #fff;
  transform: rotate(136deg); /* Orientation de la flèche */
  margin-left: 5px; /* Espacement entre la flèche et le texte */
  transition: transform 0.3s ease; /* Animation au clic */
}

/* Lorsque le menu est ouvert */
.collapsing + .nav-collapse > #caret,
.show + .nav-collapse > #caret {
  transform: rotate(135deg); /* Inversion pour simuler l'ouverture */
}



     </style>
                <!--<div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav1">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav1">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav2">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav2">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 1</span>
                      </a>
                    </li>
                  </ul>
                </div>-->
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
            <div class="logo-header" data-background-color="white">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/log.png"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
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
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
               <div>
                <h1>TABLEAU DE BORD</h1>
               </div>
              </nav>
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
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
                          placeholder="Recherche ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                <!--<li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="messageDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-envelope"></i>
                  </a>
                  <ul
                    class="dropdown-menu messages-notif-box animated fadeIn"
                    aria-labelledby="messageDropdown"
                  >
                    <li>
                      <div
                        class="dropdown-title d-flex justify-content-between align-items-center"
                      >
                        Messages
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
                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all messages<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>-->
                <!--<li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
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
                  </a>
                  <ul
                    class="dropdown-menu notif-box animated fadeIn"
                    aria-labelledby="notifDropdown"
                  >
                    <li>
                      <div class="dropdown-title">
                        You have 4 new notification
                      </div>
                    </li>
                    <li>
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
                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>-->
                <!--<li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <i class="fas fa-layer-group"></i>
                  </a>
                  <div class="dropdown-menu quick-actions animated fadeIn">
                    <div class="quick-actions-header">
                      <span class="title mb-1">Quick Actions</span>
                      <span class="subtitle op-7">Shortcuts</span>
                    </div>
                    <div class="quick-actions-scroll scrollbar-outer">
                      <div class="quick-actions-items">
                        <div class="row m-0">
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div class="avatar-item bg-danger rounded-circle">
                                <i class="far fa-calendar-alt"></i>
                              </div>
                              <span class="text">Calendar</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-warning rounded-circle"
                              >
                                <i class="fas fa-map"></i>
                              </div>
                              <span class="text">Maps</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div class="avatar-item bg-info rounded-circle">
                                <i class="fas fa-file-excel"></i>
                              </div>
                              <span class="text">Reports</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-success rounded-circle"
                              >
                                <i class="fas fa-envelope"></i>
                              </div>
                              <span class="text">Emails</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-primary rounded-circle"
                              >
                                <i class="fas fa-file-invoice-dollar"></i>
                              </div>
                              <span class="text">Invoice</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-secondary rounded-circle"
                              >
                                <i class="fas fa-credit-card"></i>
                              </div>
                              <span class="text">Payments</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li> -->

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="assets/img/prof.png"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Salut</span>
                      <span class="fw-bold">Nene</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="assets/img/prof.png"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>Hizrian</h4>
                            <p class="text-muted">hello@example.com</p>
                            <a
                              href="profile.html"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">My Balance</a>
                        <a class="dropdown-item" href="#">Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

        <div class="container" >
          <div class="page-inner"style="position:relative; left:15%; ">
            
            <div class="row mt-4" >
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round" style="border-radius: 30%; top:46px; background-color:#f10cf3; box-shadow:3px 4px rgb(177, 174, 174)  " >
                  <div class="card-body">
                    <div class="col-icon"style="position: relative; left: 45%; transform: translateX(-50%); top:-40px; border-radius: 30%;">
                      <div
                        class="icon-big text-center icon-primary bubble-shadow-small" style=" background-color:#fff; border-radius: 50%; border:1px solid rgb(122, 120, 120);"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="40" height="40" fill="none" stroke="black" stroke-width="16">
                        <path d="M288 16L0 304h96v192h128V352h128v144h128V304h96L288 16z"/>
                      </svg>
                      
                      </div>
                    </div>
                    <div class="row align-items-center" style="position: relative; right: 15%; transform: translateX(50%);">
                      <div class="col col-stats ms-3 ms-sm-0 mb-6" style="width: 100px; height: 130px; ">
                        <div class="numbers">
                        <p class="card-category" style="color:#ffffff; font-weight:bold; font-size:45px; position: relative; right:15px;">
    {{ $nombre_colis }}
</p>
<h4 class="card-title" style="color:#ffffff; font-size:20px; position: relative; right:10px;">
    Dépot
</h4>

                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3" >
                <div class="card card-stats card-round"style="border-radius: 30%; left:50%; top:46px; background-color:#8022f4;  box-shadow:3px 4px  rgb(177, 174, 174) ">
                  <div class="card-body">
                    <div class="col-icon" style="position: relative; left: 45%; transform: translateX(-50%); top:-40px;">
                      <div
                        class="icon-big text-center icon-info bubble-shadow-small" style=" background-color:#fff;  border-radius: 50%; border:1px solid rgb(122, 120, 120);"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40" height="40" fill="none" stroke="black" stroke-width="16">
                        <!-- Chariot -->
                        <path d="M160 400a48 48 0 1 1-48-48 48 48 0 0 1 48 48zm0 0M416 400a48 48 0 1 1-48-48 48 48 0 0 1 48 48zm0 0M144 352h256a16 16 0 0 1 14.9 10.1l40.9 108.8a16 16 0 0 1-15.5 21.1H103.7a16 16 0 0 1-15.5-21.1l40.9-108.8A16 16 0 0 1 144 352z" />
                        
                        <!-- Boîte sur le chariot -->
                        <path d="M256 32h128v128h-48v48H208V80h48zm0 0M80 240h112a16 16 0 0 1 16 16v32h192v-32a16 16 0 0 1 16-16h112v32h-96v96h32v48H160v-48h32v-96H96zm0 0" />
                      </svg>
                      
                      
                      </div>
                    </div>
                    
                    <div class="row align-items-center"style="position: relative; right: 15%; transform: translateX(50%);">
                      
                      <div class="col col-stats ms-3 ms-sm-0"style="width: 100px; height:130px; "  >
                        <div class="numbers " >
                          <p class="card-category" style="color:#ffffff; font-weight:bold; font-size:45px;  position: relative; right:15px;  ">{{  $nombre_retrait}}</p>
                          <h4 class="card-title" style="color:#ffffff; font-size:20px; position: relative; right:10px; ">Retrait</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
             
            b</div>
          
          
          </div>
        </div>
        
        <style>
    /* Tooltip */
    .tooltip {
        position: absolute;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 8px 12px;
        border-radius: 5px;
        font-size: 14px;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.2s ease-in-out, transform 0.2s ease-in-out, background-color 0.3s;
        transform: translateY(5px);
        pointer-events: none;
    }
</style>

<!-- Tooltip -->
<div id="tooltip" class="tooltip"></div>

<!-- Graphique -->
<style>
  .chart-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: flex-start;
      width: 100%;
      max-width: 900px;
      margin: auto;
      padding: 20px;
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      position: relative;
      top:-110px;
  }

  .chart-section, .table-section {
      flex: 1;
      min-width: 300px;
      text-align: center;
      margin: 10px;
  }

  .filter-bar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin-bottom: 15px;
  }

  .filter-bar input, .filter-bar button {
      padding: 8px;
      border-radius: 5px;
      border: 2px solid #8022f4;
      outline: none;
  }

  .filter-bar button {
      background: #8022f4;
      color: white;
      cursor: pointer;
      font-weight: bold;
      transition: background 0.3s;
  }
  
  .filter-bar button:hover {
      background: #5a0db3;
  }

  .chart-legend {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 10px;
      font-weight: bold;
  }

  .chart-legend span {
      width: 12px;
      height: 12px;
      display: inline-block;
      margin-right: 5px;
      border-radius: 50%;
  }

  .table-section {
      background: white;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  table {
      width: 100%;
      border-collapse: collapse;
  }

  th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
  }

  th {
      background: #8022f4;
      color: white;
  }

  tr:nth-child(even) {
      background: #f9f9f9;
  }

  @media (max-width: 768px) {
      .chart-container {
          flex-direction: column;
          align-items: center;
      }
      .chart-section, .table-section {
          width: 100%;
          min-width: auto;
      }
      .card-stats {
            border-radius: 20px;
            box-shadow: 3px 4px rgba(177, 174, 174, 0.5);
            text-align: center;
            padding: 20px;
        }
        .icon-big {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 1px solid #7a7878;
            background-color: #fff;
            margin: auto;
        }
        .card-category {
            font-size: 45px;
            font-weight: bold;
            margin: 10px 0;
        }
        .card-title {
            font-size: 20px;
        }
  }
</style>


<div class="chart-container">
  <section class="chart-section">
      <div class="filter-bar">
          <input type="date" id="filter-date">
          <input type="text" id="filter-city" placeholder="Ville">
          <button onclick="filterResults()">Filtrer</button>
      </div>
      
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="250" height="250">
          <circle cx="20" cy="20" r="15.5" fill="none" stroke="#e0e0e0" stroke-width="3" />
          <circle id="arc-en-cours" cx="20" cy="20" r="15.5" fill="none" stroke="#8022f4" stroke-width="3"
                  stroke-dasharray="30 100" stroke-linecap="round" />
          <circle id="arc-arrive" cx="20" cy="20" r="15.5" fill="none" stroke="#f10cf3" stroke-width="3"
                  stroke-dasharray="40 100" stroke-linecap="round" />
          <circle id="arc-disponible" cx="20" cy="20" r="15.5" fill="none" stroke="#f2b5f7" stroke-width="3"
                  stroke-dasharray="30 100" stroke-linecap="round" />
      </svg>

      <div class="chart-legend">
          <span style="background:#8022f4;"></span> En cours
          <span style="background:#f10cf3; margin-left: 10px;"></span> Arrivé
          <span style="background:#f2b5f7; margin-left: 10px;"></span> Disponible
      </div>
  </section>

  <section class="table-section">
      <table>
          <thead>
              <tr>
                  <th>Date</th>
                  <th>Ville</th>
                  <th>Statut</th>
              </tr>
          </thead>
          <tbody id="table-body">
              <tr><td>2025-02-28</td><td>Paris</td><td>En cours</td></tr>
              <tr><td>2025-02-27</td><td>Lyon</td><td>Arrivé</td></tr>
              <tr><td>2025-02-26</td><td>Nancy</td><td>Disponible</td></tr>
          </tbody>
      </table>
  </section>
</div>

<script>

function getTableData() {
    let count = { "En cours": 0, "Arrivé": 0, "Disponible": 0 };

    // Sélectionner toutes les lignes du tableau
    document.querySelectorAll("#table-body tr").forEach(row => {
        let statut = row.cells[2].textContent.trim(); // Récupérer la colonne "Statut"
        if (count.hasOwnProperty(statut)) {
            count[statut]++;
        }
    });

    return count;
}

function calculatePercentages(count) {
    let total = count["En cours"] + count["Arrivé"] + count["Disponible"];
    if (total === 0) return { "En cours": 0, "Arrivé": 0, "Disponible": 0 };

    return {
        "En cours": (count["En cours"] / total) * 100,
        "Arrivé": (count["Arrivé"] / total) * 100,
        "Disponible": (count["Disponible"] / total) * 100
    };
}

function updateChart() {
    let count = getTableData(); // Récupérer les données de la table
    let percentages = calculatePercentages(count); // Calculer les pourcentages

    // Modifier les valeurs de stroke-dasharray pour chaque arc
    document.getElementById("arc-en-cours").setAttribute("stroke-dasharray", `${percentages["En cours"]} 100`);
    document.getElementById("arc-arrive").setAttribute("stroke-dasharray", `${percentages["Arrivé"]} 100`);
    document.getElementById("arc-disponible").setAttribute("stroke-dasharray", `${percentages["Disponible"]} 100`);
}

// Exécuter la mise à jour au chargement
document.addEventListener("DOMContentLoaded", updateChart);


function filterResults() {
    let dateFilter = document.getElementById("filter-date").value;
    let cityFilter = document.getElementById("filter-city").value.toLowerCase();
    let rows = document.querySelectorAll("#table-body tr");

    rows.forEach(row => {
        let date = row.cells[0].textContent;
        let city = row.cells[1].textContent.toLowerCase();
        let matchDate = dateFilter === "" || date.includes(dateFilter);
        let matchCity = cityFilter === "" || city.includes(cityFilter);

        row.style.display = matchDate && matchCity ? "" : "none";
    });

    updateChart(); // Mise à jour du diagramme après filtrage
}

</script>

</main>
</div>

        <footer class="footer">
          <!--<div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
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
                  data-color="dark"
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
