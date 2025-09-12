<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            /* Nouveau fond inspiré de .form-hero */
            background: linear-gradient(135deg, rgba(123, 1, 247, 0.1) 0%, rgba(241, 12, 243, 0.1) 100%);
            background-color: #F9F7FF;
            overflow-x: hidden;
        }
        /* Ajout des icônes flottantes */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .floating-icon {
            position: absolute;
            z-index: 0;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
            pointer-events: none;
        }
        .floating-icon:nth-child(1) {
            top: 10%;
            left: 5%;
            font-size: 3rem;
            animation-delay: 0s;
        }
        .floating-icon:nth-child(2) {
            top: 30%;
            right: 8%;
            font-size: 2.5rem;
            animation-delay: 1s;
        }
        .floating-icon:nth-child(3) {
            bottom: 20%;
            left: 10%;
            font-size: 3.5rem;
            animation-delay: 2s;
        }
        .floating-icon:nth-child(4) {
            bottom: 40%;
            right: 5%;
            font-size: 2rem;
            animation-delay: 3s;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #8022F4 0%, #F10CF3 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(128, 34, 244, 0.3);
        }
        
        .form-input {
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            border-color: #8022F4;
            box-shadow: 0 0 0 3px rgba(128, 34, 244, 0.1);
        }
        
        .remember-checkbox {
            accent-color: #8022F4;
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #8022F4, #F10CF3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        a {
            color: #8022F4;
        }
        
        a:hover {
            color: #F10CF3;
        }
    </style>
    <!-- Ajoute FontAwesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen flex items-center justify-center p-4" style="position:relative;">
    <!-- Icônes flottantes décoratives -->
    <i class="fas fa-calendar-alt floating-icon text-purple-500"></i>
    <i class="fas fa-clock floating-icon text-pink-500"></i>
    <i class="fas fa-truck floating-icon text-purple-500"></i>
    <i class="fas fa-envelope floating-icon text-pink-500"></i>

    <div class="container max-w-sm w-full bg-white p-8 rounded-lg shadow-xl">
        <!-- Logo et titre -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gradient">FlyFret</h1>
            <p class="text-gray-500 mt-1">Votre partenaire logistique pour un transport aérien rapide et sécurisé</p>
        </div>

        <!-- Message de succès -->
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- Erreurs -->
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <!-- Formulaire connexion -->
        <form action="{{ route('login.client.submit') }}" method="POST" class="w-full space-y-4">
            @csrf

            <!-- Champ Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                <input type="email" id="email" name="email" required
                    class="w-full p-3 border border-gray-300 rounded-md form-input
                    @error('email') border-red-500 @enderror"
                    placeholder="Votre email"
                    value="{{ old('email') }}">

                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-3 border border-gray-300 rounded-md form-input
                    @error('password') border-red-500 @enderror"
                    placeholder="Votre mot de passe">

                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champs cachés pour les données de colis -->
            <input type="hidden" name="mode_expedition" value="{{ request('mode_expedition', '') }}">
            <input type="hidden" name="type_colis" value="{{ request('type_colis', '') }}">
            <input type="hidden" name="prixTotal" value="{{ request('prixTotal', '') }}">
            <input type="hidden" name="ville_expedition" value="{{ request('ville_expedition', '') }}">
            <input type="hidden" name="ville_retrait" value="{{ request('ville_retrait', '') }}">
            <input type="hidden" name="prixExpress" value="{{ request('prixExpress', '') }}">
            <input type="hidden" name="type_expedition" value="{{ request('type_expedition', '') }}">
            <input type="hidden" name="devise" value="{{ request('devise', '') }}">

            <!-- Champ caché pour l'URL précédente -->
            <input type="hidden" name="previous_url" value="{{ session('url.intended', url()->previous()) }}">

            <!-- Bouton Se connecter -->
            <button type="submit" class="w-full p-3 btn-primary text-white rounded-md font-semibold uppercase mt-4">
                SE CONNECTER
            </button>
        </form>

        <!-- Lien d'inscription -->
        <div class="text-center mt-6 pt-6 border-t border-gray-200">
            <p class="text-gray-600 text-sm">
                Pas encore de compte ?
                <a href="{{ route('inscription.client.form', [
                    'mode_expedition' => request('mode_expedition'),
                    'ville_expedition' => request('ville_expedition'),
                    'ville_retrait' => request('ville_retrait'),
                    'type_colis' => request('type_colis'),
                    'prixTotal' => request('prixTotal'),
                    'devise' => request('devise'),
                    'prixExpress' => request('prixExpress'),
                    'type_expedition' => request('type_expedition')
                ]) }}" class="font-semibold hover:underline">Inscrivez-vous</a>
            </p>
        </div>
    </div>

</body>

</html>