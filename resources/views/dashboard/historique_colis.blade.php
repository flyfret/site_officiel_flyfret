@extends('dashboard.profile')
@section('title', 'Historique des colis')
@section('contentChild')

            <!-- Contenu -->
            <div class="content">
                <!-- Historique des colis -->
                <section>
                    <h2 class="section-title"><i class="fas fa-box-open"></i> Historique des Colis</h2>
                    <table class="packages-table">
                        <thead>
                            <tr>
                                <th>N° de Suivi</th>
                                <th>Nom colis</th>
                                <th>Destinataire</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                            <tbody>
                                @forelse($colis as $colisItem)
                                    <tr>
                                        <td>{{ $colisItem->numero_suivi ?? $colisItem->num_details_colis }}</td>
                                        <td>{{ $colisItem->type_colis }}</td>
                                        <td>
                                            {{ $colisItem->destinataire ? $colisItem->destinataire->nom_destinataire : 'N/A' }}
                                        </td>
                                        <td>{{ ucfirst($colisItem->status) }}</td>
                                        <td>
                                            <a href="{{ route('colis.details', $colisItem->num_details_colis) }}" class="details-link" data-id="{{ $colisItem->num_details_colis }}">Détails</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Aucun colis trouvé.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                    </table>
                </section>
            </div>
        </main>
    </div>

    <!-- Modal pour les détails du colis -->
    <div id="packageModal" class="modal" style="display:none;">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Détails du Colis</h2>
                <span class="close-btn" style="cursor:pointer;">&times;</span>
            </div>
            <table class="details-table">
                <tr>
                    <th>N° de Suivi</th>
                    <td id="tracking-number"></td>
                </tr>
                <tr>
                    <th>Type de colis</th>
                    <td id="package-type"></td>
                </tr>
                <tr>
                    <th>Quantité</th>
                    <td id="quantity"></td>
                </tr>
                <tr>
                    <th>Valeur marchande</th>
                    <td id="value"></td>
                </tr>
                <tr>
                    <th>Statut</th>
                    <td id="status"></td>
                </tr>
                <tr>
                    <th>Nom du lot</th>
                    <td id="lot-name"></td>
                </tr>
                <tr>
                    <th>Détail spécifique</th>
                    <td id="full-text"></td>
                </tr>
                <tr>
                    <th>Date de création</th>
                    <td id="created-at"></td>
                </tr>
                <tr>
                    <th>Date de mise à jour</th>
                    <td id="updated-at"></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        const colisData = @json($colis);

        document.querySelectorAll('.details-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const colisId = this.dataset.id;
                const colis = colisData.find(c => c.num_details_colis == colisId);
                if (!colis) return;

                document.getElementById('tracking-number').textContent = colis.numero_suivi ?? colis.num_details_colis ?? '';
                document.getElementById('package-type').textContent = colis.type_colis ?? '';
                document.getElementById('quantity').textContent = colis.quantite ?? '';
                document.getElementById('value').textContent = colis.valeur_marchande ? (colis.valeur_marchande + ' €') : '';
                document.getElementById('status').textContent = colis.status ?? '';
                document.getElementById('lot-name').textContent = colis.nom_lot ?? '';
                document.getElementById('full-text').textContent = colis.detail_specifique ?? '';
                document.getElementById('created-at').textContent = colis.created_at ? new Date(colis.created_at).toLocaleString('fr-FR') : '';
                document.getElementById('updated-at').textContent = colis.updated_at ? new Date(colis.updated_at).toLocaleString('fr-FR') : '';

                document.getElementById('packageModal').style.display = 'block';
            });
        });

        document.querySelector('#packageModal .close-btn').onclick = function() {
            document.getElementById('packageModal').style.display = 'none';
        };
        window.onclick = function(event) {
            if (event.target == document.getElementById('packageModal')) {
                document.getElementById('packageModal').style.display = 'none';
            }
        };
    </script>

@endsection