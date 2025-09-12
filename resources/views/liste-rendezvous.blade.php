<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Rendez-vous</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Styles personnalisés pour améliorer le design */
        .table-row:hover {
            background-color: #f9fafb;
            transition: background-color 0.2s ease;
        }

        .table-header {
            background-color: #4f46e5;
            color: white;
        }

        .table-header th {
            padding: 12px;
            font-weight: 600;
            text-align: left;
        }

        .table-cell {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .details-card {
            background-color: #f3f4f6;
            border-radius: 8px;
            padding: 12px;
            margin-top: 8px;
        }

        .details-card p {
            margin: 4px 0;
            color: #374151;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 24px;
        }

        .pagination a {
            margin: 0 4px;
            padding: 8px 12px;
            border-radius: 6px;
            background-color: #e0e7ff;
            color: #4f46e5;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .pagination a:hover {
            background-color: #c7d2fe;
        }

        .pagination .active {
            background-color: #4f46e5;
            color: white;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-purple-50 to-blue-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-6xl bg-white rounded-xl shadow-2xl overflow-hidden">
            <!-- En-tête -->
            <div class="bg-gradient-to-r from-purple-600 to-blue-600 p-6">
                <h1 class="text-2xl font-bold text-white text-center">Liste des Rendez-vous</h1>
            </div>

            <!-- Contenu -->
            <div class="p-6">
                <!-- Tableau des rendez-vous -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="table-header">
                            <tr>
                                <th class="p-3">Nom</th>
                                <th class="p-3">Prénom</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Motif</th>
                                <th class="p-3">Détails du Colis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rendezvous as $rdv)
                            <tr class="table-row">
                                <td class="table-cell">{{ $rdv->nom }}</td>
                                <td class="table-cell">{{ $rdv->prenom }}</td>
                                <td class="table-cell">{{ $rdv->email }}</td>
                                <td class="table-cell">{{ $rdv->date }}</td>
                                <td class="table-cell">{{ $rdv->motif }}</td>
                                <td class="table-cell">
                                    @if ($rdv->detailsColis)
                                    <div class="details-card">
                                        <p><strong>Mode de Transport :</strong> {{ $rdv->detailsColis->mode_transport }}</p>
                                        <p><strong>Ville de Départ :</strong> {{ $rdv->detailsColis->ville_depart }}</p>
                                        <p><strong>Ville de Destination :</strong> {{ $rdv->detailsColis->ville_destination }}</p>
                                        <p><strong>Type de Colis :</strong> {{ $rdv->detailsColis->type_colis }}</p>
                                        <p><strong>Quantité :</strong> {{ $rdv->detailsColis->quantite }}</p>
                                        <p><strong>Valeur Marchande :</strong> {{ $rdv->detailsColis->valeur_marchande ?? 'N/A' }}</p>
                                        <p><strong>Offre :</strong> {{ $rdv->detailsColis->offre_choisie }}</p>
                                    </div>
                                    @else
                                    <p class="text-red-500">Aucun détail de colis associé.</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    {{ $rendezvous->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>