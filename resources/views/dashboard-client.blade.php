@extends('tamplates')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Tableaux de bord</h3>

                </div>
                <!--<div class="ms-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                    <a href="#" class="btn btn-primary btn-round">Add Customer</a>
                  </div>-->
            </div>
            <style>
                body {
                    background-color: #f8f9fa;
                }

                .dashboard-card {
                    background: white;
                    border-radius: 10px;
                    padding: 20px;
                    text-align: center;
                    transition: 0.3s;
                    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                }

                .dashboard-card:hover {
                    transform: scale(1.05);
                    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
                }

                .dashboard-card i {
                    font-size: 40px;
                    margin-bottom: 10px;
                    color: #8022F4;
                }

                .dashboard-card p {
                    font-weight: bold;
                    margin: 0;
                    color: #333;
                }

                .btn-rose {
                    color: #F20CF3;
                }
            </style>


            <div class="container mt-5">
                <div class="row g-4">

                    <!--Suivi de colis -->
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card text-center">
                            <i class="fa-solid fa-truck-moving fa-3x" style="color: #f10cf3;"></i>
                            <p>SUIVI DE COLIS</p>
                            <a href="suivi_colis.html" class="btn btn-rose btn-sm">Voir Détail</a>
                        </div>
                    </div>

                    <!-- Historique des envois -->
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card text-center">
                            <i class="fa-solid fa-clock-rotate-left fa-3x" style="color: #f10cf3;"></i>
                            <p>HISTORIQUE DES ENVOIS</p>
                            <a href="historique_envois.html" class="btn btn-rose btn-sm">Voir Détail</a>
                        </div>
                    </div>

                    <!-- Historique des paiements -->
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card text-center">
                            <i class="fa-solid fa-money-bill-wave"style="color: #f10cf3;"></i>
                            <p>HISTORIQUE DES PAIEMENTS</p>
                            <a href="historique_paiements.html" class="btn btn-rose btn-sm">Voir Détail</a>
                        </div>
                    </div>

                    <!-- Club de fidélité -->
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card text-center">
                            <i class="fa-solid fa-medal fa-3x" style="color: #f10cf3;"></i>
                            <p>CLUB DE FIDÉLITÉ</p>
                            <a href="club_fidelite.html" class="btn btn-rose btn-sm">Voir Détail</a>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Dernières activités</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Envoi de colis</td>
                                            <td>12 Février 2025</td>
                                        </tr>
                                        <tr>
                                            <td>Historique de paiement</td>
                                            <td>11 Février 2025</td>
                                        </tr>
                                        <tr>
                                            <td>Rejoindre le club fidélité</td>
                                            <td>10 Février 2025</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Inclusion de Chart.js pour générer le graphique -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctx = document.getElementById('statsChart').getContext('2d');
                var statsChart = new Chart(ctx, {
                    type: 'bar', // Choisir le type de graphique (bar, line, etc.)
                    data: {
                        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'], // Labels pour les mois
                        datasets: [{
                            label: 'Activités sur la plateforme',
                            data: [12, 19, 3, 5, 2, 3], // Données pour chaque mois
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @endsection
