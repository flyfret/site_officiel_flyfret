<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Devis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .offre-bloc {
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
            cursor: pointer;
        }

        .offre-bloc:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .offre-selectionnee {
            border: 3px solid #8022F4;
            background-color: #f3f4f6;
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body class="bg-gradient-to-r from-purple-50 to-blue-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-2xl overflow-hidden">
            <!-- En-tête -->
            <div class="bg-gradient-to-r from-purple-600 to-blue-600 p-6">
                <h1 class="text-2xl font-bold text-white text-center">Détails du Devis</h1>
            </div>

            <!-- Contenu -->
            <div class="p-6">
                <!-- Flex pour aligner les détails du colis et les offres -->
                <div class="flex flex-wrap -mx-2">
                    <!-- Détails du produit (50%) -->
                    <div class="w-full md:w-1/2 px-2 mb-6">
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <h2 class="text-xl font-bold text-purple-600 mb-4">Détails du Produit</h2>
                            <table class="w-full">
                                <tbody>
                                    <tr>
                                        <td class="font-medium p-2">Mode de Transport</td>
                                        <td class="p-2" id="mode"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium p-2">Ville de Départ</td>
                                        <td class="p-2" id="depart"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium p-2">Ville de Destination</td>
                                        <td class="p-2" id="destination"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium p-2">Type de Colis</td>
                                        <td class="p-2" id="type"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium p-2">Quantité</td>
                                        <td class="p-2" id="quantite"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium p-2">Valeur Marchande</td>
                                        <td class="p-2" id="valeur"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Offre Standard (25%) -->
                    <div class="w-full md:w-1/4 px-2 mb-6">
                        <div class="offre-bloc bg-white p-6 rounded-lg border border-gray-200" id="offreStandard">
                            <h2 class="text-xl font-bold text-purple-600 mb-4">Offre Standard</h2>
                            <div class="text-center">
                                <p class="text-3xl font-bold text-purple-600">{{ $prixTotal }} €</p>
                                <p class="text-sm text-gray-600">Prix total standard</p>
                            </div>
                            <button class="w-full bg-green-500 text-white p-2 rounded-md mt-4">
                                Choisir cette offre
                            </button>
                        </div>
                    </div>

                    <!-- Offre Express (25%) -->
                    <div class="w-full md:w-1/4 px-2 mb-6">
                        <div class="offre-bloc bg-white p-6 rounded-lg border border-gray-200" id="offreExpress">
                            <h2 class="text-xl font-bold text-purple-600 mb-4">Offre Express</h2>
                            <div class="text-center">
                                <p class="text-3xl font-bold text-purple-600">{{ $prixExpress }} €</p>
                                <p class="text-sm text-gray-600">Prix total avec express</p>
                            </div>
                            <button class="w-full bg-blue-500 text-white p-2 rounded-md mt-4">
                                Choisir cette offre
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="flex space-x-4 mt-6">
                    <button id="btnRendezVous" class="w-1/2 bg-purple-600 text-white p-3 rounded-md hover:bg-purple-700 transition duration-300" disabled>
                        Prise de Rendez-vous
                    </button>
                    <button id="btnContinuer" class="w-1/2 bg-green-600 text-white p-3 rounded-md hover:bg-green-700 transition duration-300" disabled>
                        Continuer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Récupérer les paramètres de l'URL
        const urlParams = new URLSearchParams(window.location.search);

        // Vérifier si les paramètres sont présents
        if (urlParams.size === 0) {
            alert('Aucune donnée de devis trouvée. Veuillez revenir à la page précédente.');
        } else {
            // Afficher les données du devis
            document.getElementById('mode').textContent = urlParams.get('mode') || 'Non spécifié';
            document.getElementById('depart').textContent = urlParams.get('depart') || 'Non spécifié';
            document.getElementById('destination').textContent = urlParams.get('destination') || 'Non spécifié';
            document.getElementById('type').textContent = urlParams.get('type') || 'Non spécifié';
            document.getElementById('quantite').textContent = urlParams.get('quantite') || 'Non spécifié';
            document.getElementById('valeur').textContent = urlParams.get('valeur') ? `${urlParams.get('valeur')} €` : 'Non spécifié';
            document.getElementById('prixTotal').textContent = urlParams.get('prixTotal') ? `${urlParams.get('prixTotal')} €` : 'Non spécifié';
            document.getElementById('prixExpress').textContent = urlParams.get('prixExpress') ? `${urlParams.get('prixExpress')} €` : 'Non spécifié';
        }

        // Gestion des offres
        const offreStandard = document.getElementById('offreStandard');
        const offreExpress = document.getElementById('offreExpress');
        const btnRendezVous = document.getElementById('btnRendezVous');
        const btnContinuer = document.getElementById('btnContinuer');
        let offreSelectionnee = null;

        offreStandard.addEventListener('click', () => {
            selectionnerOffre(offreStandard, 'standard');
        });

        offreExpress.addEventListener('click', () => {
            selectionnerOffre(offreExpress, 'express');
        });

        function selectionnerOffre(offre, type) {
            offreStandard.classList.remove('offre-selectionnee');
            offreExpress.classList.remove('offre-selectionnee');
            offre.classList.add('offre-selectionnee');
            offreSelectionnee = type;
            btnRendezVous.disabled = false;
            btnContinuer.disabled = false;
        }

        btnRendezVous.addEventListener('click', () => {
            if (!offreSelectionnee) {
                alert('Veuillez choisir une offre avant de continuer.');
                return;
            }
            window.location.href = `/rendezvous?offre=${offreSelectionnee}`;
        });

        btnContinuer.addEventListener('click', () => {
            if (!offreSelectionnee) {
                alert('Veuillez choisir une offre avant de continuer.');
                return;
            }
            window.location.href = `/authentification?offre=${offreSelectionnee}`;
        });
    </script>
</body>

</html>