@extends('layouts.app')

@section('content')
    <h2>Liste des lots</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom du lot</th>
                <th>Montant total à encaisser</th>
                <th>Montant total payé</th>
                <th>Reste à payer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lotsData as $lot)
                <tr>
                    <td>{{ $lot['nom_lot'] }}</td>
                    <td>{{ number_format($lot['montant_total_encaisse'], 0, ',', ' ') }} F CFA</td>
                    <td>{{ number_format($lot['montant_total_paye'], 0, ',', ' ') }} F CFA</td>
                    <td>{{ number_format($lot['reste_total'], 0, ',', ' ') }} F CFA</td>
                    <td>
                        <a href="{{ route('lots.details', $lot['nom_lot']) }}" class="btn btn-primary btn-sm">
                            Voir détails
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Aucun lot trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
