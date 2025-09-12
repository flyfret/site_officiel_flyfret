@extends('layouts.app')

@section('title', 'Paiement réussi - FlyFret')

@section('ChildContent')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-header bg-success text-white rounded-top-4 py-4 text-center">
                        <h2 class="mb-0">
                            <i class="fas fa-check-circle me-2"></i> Paiement effectué avec succès
                        </h2>
                    </div>
                    <div class="card-body text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 6rem;"></i>
                        </div>
                        <h3 class="mb-3 fw-bold">Merci pour votre confiance !</h3>
                        <p class="lead text-muted">{{ $message ?? 'Votre transaction a bien été enregistrée.' }}</p>

                        @if(isset($transaction_id))
                            <div class="alert alert-success mt-5 text-start px-4 py-3 shadow-sm rounded-3">
                                <h5 class="alert-heading mb-2"><i class="fas fa-info-circle me-2"></i> Informations de transaction</h5>
                                <hr>
                                <p class="mb-1"><strong>ID de transaction :</strong> {{ $transaction_id }}</p>
                                <p class="mb-0"><i class="fas fa-envelope me-1"></i> Un email de confirmation vous a été envoyé.</p>
                            </div>
                        @endif

                        <div class="mt-5 d-flex flex-column flex-md-row justify-content-center gap-3">
                            <a href="{{ route('home') }}" class="btn btn-success btn-lg px-4 shadow-sm">
                                <i class="fas fa-home me-2"></i> Retour à l'accueil
                            </a>
                            <a href="#" onclick="window.print()" class="btn btn-outline-secondary btn-lg px-4 shadow-sm">
                                <i class="fas fa-print me-2"></i> Imprimer le reçu
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center py-3">
                        <small>&copy; {{ now()->year }} FlyFret - Tous droits réservés</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
