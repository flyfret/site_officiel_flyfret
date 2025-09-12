@extends('layouts.app')

@section('content')
<div class="container text-center my-5">
    <h1 class="text-success">Paiement Réussi !</h1>
    <p>{{ $message }}</p>
    <a href="{{ route('index1') }}" class="btn btn-primary">Retour à l'accueil</a>
    
    <style>
    .container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .text-success {
        color: #28a745 !important;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
</div>
@endsection
