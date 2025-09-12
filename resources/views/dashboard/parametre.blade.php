@extends('dashboard.profile')
@section('title', 'Historique des colis')
@section('contentChild')        
        <!-- Contenu -->
    <div class="content">
        <h2 class="section-title"><i class="fas fa-user-cog"></i> Paramètres du compte</h2>

        <!-- Onglet Informations personnelles -->
        <div class="tab-content active" id="infos-tab">
            <form class="settings-form" method="POST" action="{{ route('client.update') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="nom_cli" class="form-control" value="{{ old('nom_cli', $client->nom_cli) }}">
                </div>

                <div class="form-group">
                    <label for="firstname">Prénom d'utilisateur</label>
                    <input type="text" id="firstname" name="prenom_cli" class="form-control" value="{{ old('prenom_cli', $client->prenom_cli) }}">
                </div>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="Email_cli" class="form-control" value="{{ old('Email_cli', $client->Email_cli) }}">
                </div>

                <div class="form-group">
                    <label for="phone">Contact</label>
                    <input type="tel" id="phone" name="contact_cli" class="form-control" value="{{ old('contact_cli', $client->contact_cli) }}">
                </div>

                <div class="form-group">
                    <label for="address">Adresse</label>
                    <textarea id="address" name="adresse_expediteur" class="form-control" rows="3">{{ old('adresse_expediteur', optional($client->expediteur)->adresse_expediteur) }}</textarea>
                </div>

                <button type="submit" class="btn">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
@endsection