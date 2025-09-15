<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #8022F4;
            --secondary-color: #F20CF3;
        }
        
        body {
            font-family: 'Roboto', 'Poppins', sans-serif;
            color: #1A1A2E;
            background-color: #F9F7FF;
            overflow-x: hidden;
        }
        
        .form-hero {
            background: linear-gradient(135deg, rgba(123, 1, 247, 0.1) 0%, rgba(241, 12, 243, 0.1) 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
        }
        
        .form-hero::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(123, 1, 247, 0.15) 0%, rgba(123, 1, 247, 0) 70%);
            border-radius: 50%;
        }
        
        .form-hero::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -50px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(241, 12, 243, 0.15) 0%, rgba(241, 12, 243, 0) 70%);
            border-radius: 50%;
        }
        
        @keyframes float {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
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
        
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(123, 1, 247, 0.10);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }
        
        @media (max-width: 767.98px) {
            .form-hero {
                padding: 40px 0;
            }
            .form-container {
                border-radius: 12px;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Icônes flottantes décoratives -->
    <i class="fas fa-calendar-alt floating-icon text-purple-500"></i>
    <i class="fas fa-clock floating-icon text-pink-500"></i>
    <i class="fas fa-truck floating-icon text-purple-500"></i>
    <i class="fas fa-envelope floating-icon text-pink-500"></i>

    <section class="form-hero flex items-center justify-center min-h-screen">
        <div class="form-container p-8">
            <!-- Logo et titre -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gradient">FlyFret</h1>
                <p class="text-gray-500 mt-1">Votre partenaire logistique pour un transport aérien rapide et sécurisé
                </p>
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

            <!-- Formulaire -->
            <form action="{{ route('inscription.client.store') }}" method="POST" class="w-full space-y-4">
                @csrf

                <!-- Ligne alignée pour Nom et Prénom -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Champ Nom -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input type="text" id="nom" name="nom" required
                            class="w-full p-3 border border-gray-300 rounded-md form-input
                            @error('nom') border-red-500 @enderror"
                            placeholder="Votre nom" value="{{ old('nom') }}">

                        @error('nom')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Champ Prénom -->
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                        <input type="text" id="prenom" name="prenom" required
                            class="w-full p-3 border border-gray-300 rounded-md form-input
                            @error('prenom') border-red-500 @enderror"
                            placeholder="Votre prénom" value="{{ old('prenom') }}">

                        @error('prenom')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Champ Contact -->
                <div>
                    <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Contact</label>
                    <input type="text" id="telephone" name="telephone" required
                        class="w-full p-3 border border-gray-300 rounded-md form-input
                        @error('telephone') border-red-500 @enderror"
                        placeholder="Votre numéro" value="{{ old('telephone') }}">

                    @error('telephone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Champ Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full p-3 border border-gray-300 rounded-md form-input
                        @error('email') border-red-500 @enderror"
                        placeholder="exemple@flyfret.com" value="{{ old('email') }}">

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
                        placeholder="••••••••">

                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Champs cachés pour les informations du colis -->
                <input type="hidden" name="mode_expedition" value="{{ request('mode_expedition') }}">
                <input type="hidden" name="ville_expedition" value="{{ request('ville_expedition') }}">
                <input type="hidden" name="ville_retrait" value="{{ request('ville_retrait') }}">
                <input type="hidden" name="type_colis" value="{{ request('type_colis') }}">
                <input type="hidden" name="quantite" value="{{ request('quantite') }}">
                <input type="hidden" name="valeur_marchande" value="{{ request('valeur_marchande') }}">
                <input type="hidden" name="prixTotal" value="{{ request('prixTotal') }}">
                <input type="hidden" name="prixExpress" value="{{ request('prixExpress') }}">
                <input type="hidden" name="devise" value="{{ request('devise') }}">
                <input type="hidden" name="type_expedition" value="{{ request('offre', request('type_expedition')) }}">

                <!-- Bouton S'inscrire -->
                <button type="submit"
                    class="w-full p-3 btn-primary text-white rounded-md font-semibold uppercase mt-4">
                    S'INSCRIRE
                </button>
            </form>

            <!-- Lien de connexion -->
            <div class="text-center mt-6 pt-6 border-t border-gray-200">
                <p class="text-gray-600 text-sm">
                    Déjà un compte ?
                    <a href="{{ route('connexion.client.form', [
                        'mode_expedition' => request('mode_expedition'),
                        'ville_expedition' => request('ville_expedition'),
                        'ville_retrait' => request('ville_retrait'),
                        'type_colis' => request('type_colis'),
                        'quantite' => request('quantite'),
                        'valeur_marchande' => request('valeur_marchande'),
                        'prixTotal' => request('prixTotal'),
                        'prixExpress' => request('prixExpress'),
                        'type_expedition' => request('offre', request('type_expedition'))
                    ]) }}"
                        class="font-semibold hover:underline">Connectez-vous</a>
                </p>
            </div>
        </div>
    </section>
</body>

</html>