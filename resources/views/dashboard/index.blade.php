@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="cards-container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Colis expédiés</h3>
            <div class="card-icon primary">
                <i class="fas fa-box"></i>
            </div>
        </div>
        <div class="card-value">{{ $shipmentsCount }}</div>
        <div class="card-footer {{ $shipmentsTrend >= 0 ? 'positive' : 'negative' }}">
            <i class="fas fa-arrow-{{ $shipmentsTrend >= 0 ? 'up' : 'down' }}"></i>
            <span>{{ abs($shipmentsTrend)) }}% ce mois-ci</span>
        </div>
    </div>
    
    <!-- Autres cartes similaires avec données dynamiques -->
</div>

<div class="shipments-table">
    <table>
        <thead>
            <tr>
                <th>N° de suivi</th>
                <th>Destinataire</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentShipments as $shipment)
            <tr>
                <td>{{ $shipment->tracking_number }}</td>
                <td>{{ $shipment->recipient_name }}</td>
                <td>{{ $shipment->created_at->format('d/m/Y') }}</td>
                <td>
                    <span class="status-badge {{ $shipment->status }}">
                        {{ ucfirst($shipment->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection