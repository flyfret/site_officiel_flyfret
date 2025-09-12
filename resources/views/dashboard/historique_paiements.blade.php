@extends('dashboard.profile')
@section('title', 'Historique des Paiements')
@section('contentChild')

    <style>
        /* Styles de base */
        .content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .section-title {
            font-size: 1.5rem;
            color: #8022F4;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
            align-items: flex-end;
        }
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .form-control {
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.9rem;
        }
        .btn-filter {
            background: linear-gradient(135deg, #8022F4 0%, #F10CF3 100%);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-filter:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(128, 34, 244, 0.2);
        }
        .table-responsive {
            overflow-x: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .table-payments {
            width: 100%;
            border-collapse: collapse;
        }
        .table-payments th, .table-payments td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        .table-payments th {
            background: #f8f9fa;
            color: #8022F4;
            font-weight: 600;
            position: sticky;
            top: 0;
        }
        .table-payments tr:hover {
            background-color: #f9f5ff;
        }
        .payment-status {
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        .payment-status.completed {
            background-color: #e6f7ee;
            color: #10b981;
        }
        .payment-status.pending {
            background-color: #fff4e6;
            color: #f59e0b;
        }
        .payment-status.failed {
            background-color: #fee2e2;
            color: #ef4444;
        }
        .payment-status.refunded {
            background-color: #e0f2fe;
            color: #0ea5e9;
        }
        .btn-details, .btn-receipt {
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-size: 0.8rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: all 0.2s;
        }
        .btn-details {
            background-color: #ede9fe;
            color: #7c3aed;
            border: 1px solid #ddd6fe;
        }
        .btn-details:hover {
            background-color: #ddd6fe;
        }
        .btn-receipt {
            background-color: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
            margin-left: 0.5rem;
        }
        .btn-receipt:hover {
            background-color: #d1fae5;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 1.5rem;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            animation: modalFadeIn 0.3s;
        }
        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }
        .modal-title {
            font-size: 1.25rem;
            color: #8022F4;
        }
        .close {
            color: #aaa;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .close:hover {
            color: #555;
        }
        .modal-footer {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
            text-align: right;
        }
        .btn-secondary {
            background-color: #f3f4f6;
            color: #4b5563;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-secondary:hover {
            background-color: #e5e7eb;
        }
        @media (max-width: 768px) {
            .filters { flex-direction: column; }
            .modal-content { width: 95%; margin: 10% auto; }
        }
    </style>

<div class="content">
    <section class="payment-history">
        <h2 class="section-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            Historique des Paiements
        </h2>
        <div class="filters">
            <div class="filter-group">
                <label for="date-filter">Filtrer par date :</label>
                <select id="date-filter" class="form-control">
                    <option value="all">Toutes les dates</option>
                    <option value="today">Aujourd'hui</option>
                    <option value="week">Cette semaine</option>
                    <option value="month">Ce mois</option>
                    <option value="year">Cette année</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="status-filter">Filtrer par statut :</label>
                <select id="status-filter" class="form-control">
                    <option value="all">Tous les statuts</option>
                    <option value="completed">Complétés</option>
                    <option value="pending">En attente</option>
                    <option value="failed">Échoués</option>
                    <option value="refunded">Remboursés</option>
                </select>
            </div>
            <button class="btn-filter">Appliquer</button>
        </div>
        <div class="table-responsive">
            <table class="table-payments" id="paymentsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Mode de paiement</th>
                        <th>Facture</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="paymentsTbody">
                    <!-- Les lignes seront générées par JS -->
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Modal pour les détails du paiement -->
<div id="paymentDetailsModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Détails du Paiement</h5>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body" id="paymentDetailsContent">
            <div class="loading-spinner">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="animate-spin">
                    <line x1="12" y1="2" x2="12" y2="6"></line>
                    <line x1="12" y1="18" x2="12" y2="22"></line>
                    <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                    <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                    <line x1="2" y1="12" x2="6" y2="12"></line>
                    <line x1="18" y1="12" x2="22" y2="12"></line>
                    <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                    <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                </svg>
                <span>Chargement des détails...</span>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-secondary">Fermer</button>
        </div>
    </div>
</div>

<script>
    // Exemple de données JS (remplace par tes vraies données côté backend)
    const paiements = [
        {
            num_paiement: 101,
            Date_paiement: '2025-06-17T10:30:00',
            Montant: 150.00,
            mode_paiement: 'Carte bancaire',
            num_fact: 'F2025-001',
            statut: 'completed'
        },
        {
            num_paiement: 102,
            Date_paiement: '2025-06-15T14:10:00',
            Montant: 80.50,
            mode_paiement: 'Espèces',
            num_fact: 'F2025-002',
            statut: 'pending'
        },
        {
            num_paiement: 103,
            Date_paiement: '2025-05-30T09:00:00',
            Montant: 200.00,
            mode_paiement: 'Virement',
            num_fact: 'F2025-003',
            statut: 'failed'
        }
    ];

    // Génère le tableau
    function renderTable(data) {
        const tbody = document.getElementById('paymentsTbody');
        tbody.innerHTML = '';
        if (!data.length) {
            tbody.innerHTML = `<tr>
                <td colspan="7" class="text-center" style="padding: 2rem; color: #6b7280;">
                    Aucun paiement trouvé.
                </td>
            </tr>`;
            return;
        }
        data.forEach(paiement => {
            tbody.innerHTML += `
                <tr data-status="${paiement.statut}" data-date="${paiement.Date_paiement.substr(0,10)}">
                    <td>${paiement.num_paiement}</td>
                    <td>${formatDate(paiement.Date_paiement)}</td>
                    <td>${paiement.Montant.toLocaleString('fr-FR', {minimumFractionDigits:2})} €</td>
                    <td>${paiement.mode_paiement}</td>
                    <td>${paiement.num_fact}</td>
                    <td>
                        <span class="payment-status ${paiement.statut}">
                            ${statusLabel(paiement.statut)}
                        </span>
                    </td>
                    <td>
                        <button class="btn-details" data-payment-id="${paiement.num_paiement}">Détails</button>
                        <button class="btn-receipt" data-payment-id="${paiement.num_paiement}">Reçu</button>
                    </td>
                </tr>
            `;
        });
    }

    function formatDate(dateString) {
        const d = new Date(dateString);
        return d.toLocaleDateString('fr-FR', { day: '2-digit', month: '2-digit', year: 'numeric', hour:'2-digit', minute:'2-digit' });
    }
    function statusLabel(status) {
        switch(status) {
            case 'completed': return 'Complété';
            case 'pending': return 'En attente';
            case 'failed': return 'Échoué';
            case 'refunded': return 'Remboursé';
            default: return status;
        }
    }

    // Filtres
    function filterPayments() {
        const dateValue = document.getElementById('date-filter').value;
        const statusValue = document.getElementById('status-filter').value;
        const today = new Date();
        let filtered = paiements.slice();

        // Filtre statut
        if (statusValue !== 'all') {
            filtered = filtered.filter(p => p.statut === statusValue);
        }
        // Filtre date
        if (dateValue !== 'all') {
            filtered = filtered.filter(p => {
                const paymentDate = new Date(p.Date_paiement);
                switch(dateValue) {
                    case 'today':
                        return paymentDate.toDateString() === today.toDateString();
                    case 'week':
                        const weekStart = new Date(today);
                        weekStart.setDate(today.getDate() - today.getDay());
                        return paymentDate >= weekStart;
                    case 'month':
                        return paymentDate.getMonth() === today.getMonth() && paymentDate.getFullYear() === today.getFullYear();
                    case 'year':
                        return paymentDate.getFullYear() === today.getFullYear();
                }
            });
        }
        renderTable(filtered);
        bindActions();
    }

    // Modal
    function openModal(paymentId) {
        const modal = document.getElementById('paymentDetailsModal');
        const modalContent = document.getElementById('paymentDetailsContent');
        modalContent.innerHTML = `<div class="loading-spinner" style="text-align: center; padding: 2rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8022F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="animate-spin">
                <line x1="12" y1="2" x2="12" y2="6"></line>
                <line x1="12" y1="18" x2="12" y2="22"></line>
                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                <line x1="2" y1="12" x2="6" y2="12"></line>
                <line x1="18" y1="12" x2="22" y2="12"></line>
                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
            </svg>
            <div style="margin-top: 1rem; color: #8022F4;">Chargement des détails...</div>
        </div>`;
        modal.style.display = 'block';
        setTimeout(() => {
            const paiement = paiements.find(p => p.num_paiement == paymentId);
            modalContent.innerHTML = `
                <div class="payment-details">
                    <div class="detail-row"><span class="detail-label">Numéro de paiement:</span><span class="detail-value">${paiement.num_paiement}</span></div>
                    <div class="detail-row"><span class="detail-label">Date:</span><span class="detail-value">${formatDate(paiement.Date_paiement)}</span></div>
                    <div class="detail-row"><span class="detail-label">Montant:</span><span class="detail-value">${paiement.Montant.toLocaleString('fr-FR', {minimumFractionDigits:2})} €</span></div>
                    <div class="detail-row"><span class="detail-label">Mode de paiement:</span><span class="detail-value">${paiement.mode_paiement}</span></div>
                    <div class="detail-row"><span class="detail-label">Facture:</span><span class="detail-value">${paiement.num_fact}</span></div>
                    <div class="detail-row"><span class="detail-label">Statut:</span><span class="payment-status ${paiement.statut}">${statusLabel(paiement.statut)}</span></div>
                </div>
                <style>
                    .payment-details { display: grid; gap: 1rem; }
                    .detail-row { display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0; }
                    .detail-label { font-weight: 500; color: #555; }
                    .detail-value { color: #222; }
                </style>
            `;
        }, 600);
    }
    function closeModal() {
        document.getElementById('paymentDetailsModal').style.display = 'none';
    }
    function bindActions() {
        document.querySelectorAll('.btn-details').forEach(btn => {
            btn.onclick = function() { openModal(this.getAttribute('data-payment-id')); }
        });
        document.querySelectorAll('.btn-receipt').forEach(btn => {
            btn.onclick = function() { alert('Affichage du reçu pour paiement #' + this.getAttribute('data-payment-id')); }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        renderTable(paiements);
        bindActions();
        document.querySelector('.btn-filter').onclick = filterPayments;
        document.querySelector('.close').onclick = closeModal;
        document.querySelector('.btn-secondary').onclick = closeModal;
        window.onclick = function(event) {
            if (event.target === document.getElementById('paymentDetailsModal')) closeModal();
        }
    });
</script>

@endsection