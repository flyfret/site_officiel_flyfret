@extends('tamplates')
@section('content')

<style>
    .shipping-history {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    .page-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }
    
    .page-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }
    
    .page-subtitle {
        color: #666;
        font-size: 1rem;
        font-weight: 400;
    }
    
    .summary-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .summary-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .summary-title svg {
        width: 20px;
        height: 20px;
    }
    
    .table-container {
        overflow-x: auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th {
        background-color: #f8fafc;
        color: #64748b;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 1rem 1.5rem;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }
    
    td {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #e2e8f0;
        color: #1e293b;
        font-size: 0.875rem;
    }
    
    tr:last-child td {
        border-bottom: none;
    }
    
    tr:hover td {
        background-color: #f8fafc;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .status-delivered {
        background-color: #ecfdf5;
        color: #059669;
    }
    
    .status-pending {
        background-color: #fef3c7;
        color: #d97706;
    }
    
    .status-shipped {
        background-color: #dbeafe;
        color: #8022F4;
    }
    
    .action-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    .action-btn:hover {
        opacity: 0.9;
    }
    
    .view-btn {
        background-color: #e0e7ff;
        color: #8022F4;
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
        gap: 0.5rem;
    }
    
    .pagination-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    .pagination-btn:hover {
        background-color: #f1f5f9;
    }
    
    .pagination-btn.active {
        background-color: #4f46e5;
        color: white;
    }
    
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 3rem 0;
        text-align: center;
    }
    
    .empty-state svg {
        width: 120px;
        height: 120px;
        margin-bottom: 1.5rem;
        color: #cbd5e1;
    }
    
    .empty-state h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }
    
    .empty-state p {
        color: #64748b;
        margin-bottom: 1.5rem;
        max-width: 400px;
    }
    
    .primary-btn {
        background-color: #8022F4;
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .primary-btn:hover {
        background-color: #8022F4;
    }
</style>

<div class="shipping-history">
    <div class="page-header">
        <h1 class="page-title">Historique d'envoi</h1>
        <p class="page-subtitle">Consultez l'historique de tous vos envois</p>
    </div>
    
    {{-- <div class="summary-card">
        <h2 class="summary-title">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Récapitulatif des envois
        </h2>
        
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem;">
            <div style="background: #f0fdf4; padding: 1rem; border-radius: 8px;">
                <div style="font-size: 0.875rem; color: #64748b; margin-bottom: 0.5rem;">Total envoyés</div>
                <div style="font-size: 1.5rem; font-weight: 700; color: #16a34a;">24</div>
            </div>
            
            <div style="background: #eff6ff; padding: 1rem; border-radius: 8px;">
                <div style="font-size: 0.875rem; color: #64748b; margin-bottom: 0.5rem;">En transit</div>
                <div style="font-size: 1.5rem; font-weight: 700; color: #2563eb;">5</div>
            </div>
            
            <div style="background: #fef2f2; padding: 1rem; border-radius: 8px;">
                <div style="font-size: 0.875rem; color: #64748b; margin-bottom: 0.5rem;">Retardés</div>
                <div style="font-size: 1.5rem; font-weight: 700; color: #dc2626;">2</div>
            </div>
            
            <div style="background: #fff7ed; padding: 1rem; border-radius: 8px;">
                <div style="font-size: 0.875rem; color: #64748b; margin-bottom: 0.5rem;">Livrés ce mois</div>
                <div style="font-size: 1.5rem; font-weight: 700; color: #ea580c;">17</div>
            </div> 
        </div>
    </div> --}}
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Date d'envoi</th>
                    <th>Destinataire</th>
                    <th>Type de colis</th>
                    <th>Lieu de d'expedition</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($envois as $envoi)
                    <tr>
                        <td>#SH-{{ $envoi->id }}</td>
                        <td>{{ $envoi->created_at->format('d M Y') }}</td>
                        <td>
                            @if($envoi->destinataire)
                                {{ $envoi->destinataire->prenom_destinataire }} {{ $envoi->destinataire->nom_destinataire }}
                            @else
                                Destinataire inconnu
                            @endif
                        </td>
                        <td>{{ $envoi->type_colis }}</td>
                        <td>{{ $envoi->ville_depart }}</td>
                        <td><button class="action-btn view-btn">Détails</button></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                <h3>Aucun envoi trouvé</h3>
                                <p>Vous n'avez pas encore effectué d'envoi. Lorsque vous enverrez un colis, il apparaîtra ici.</p>
                                <a href="" class="primary-btn">Nouvel envoi</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- Uncomment if you want to show empty state -->
        <!--
        <div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <h3>Aucun envoi trouvé</h3>
            <p>Vous n'avez pas encore effectué d'envoi. Lorsque vous enverrez un colis, il apparaîtra ici.</p>
            <button class="primary-btn">Nouvel envoi</button>
        </div>
        -->
    </div>
    
    <div class="pagination">
        <div class="pagination-btn">&lt;</div>
        <div class="pagination-btn active">1</div>
        <div class="pagination-btn">2</div>
        <div class="pagination-btn">3</div>
        <div class="pagination-btn">...</div>
        <div class="pagination-btn">8</div>
        <div class="pagination-btn">&gt;</div>
    </div>
</div>

@endsection