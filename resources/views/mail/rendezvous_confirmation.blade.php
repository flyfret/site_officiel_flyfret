<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Rendez-vous</title>
    <style>
        body {
            background: #f8faff;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #22223b;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 480px;
            margin: 40px auto;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(123, 1, 247, 0.10);
            padding: 32px 28px;
            text-align: center;
        }
        .logo {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 12px;
            letter-spacing: -1px;
        }
        .logo .fly { color: #7B01F7; }
        .logo .fret { color: #F10CF3; }
        h1 {
            color: #7B01F7;
            font-size: 1.5rem;
            margin-bottom: 18px;
        }
        .checkmark {
            font-size: 3.5rem;
            color: #7B01F7;
            margin-bottom: 18px;
        }
        .details {
            background: #f3e8ff;
            border-radius: 12px;
            padding: 18px 0;
            margin: 18px 0;
            font-size: 1.08rem;
        }
        .details strong {
            color: #7B01F7;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.98rem;
            color: #888;
        }
        .btn {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 28px;
            background: linear-gradient(135deg, #7B01F7, #F10CF3);
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: background 0.2s;
        }
        .btn:hover {
            background: linear-gradient(135deg, #F10CF3, #7B01F7);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <span class="fly">Fly</span><span class="fret">Fret</span>
        </div>
        <div class="checkmark">✔️</div>
        <h1>Votre rendez-vous est confirmé !</h1>
        <p>Bonjour <strong>{{ $prenom }} {{ $nom }}</strong>,</p>
        <div class="details">
            <div><strong>Date :</strong> {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</div>
            <div><strong>Heure :</strong> {{ $heure }}</div>
        </div>
        <p>Nous vous remercions pour votre confiance.<br>
        Un conseiller FlyFret vous attendra à l'agence choisie.</p>
        <a href="https://recette.flyfret.net" class="btn">Visiter notre site</a>
        <div class="footer">
            &copy; {{ date('Y') }} FlyFret. Tous droits réservés.
        </div>
    </div>
</body>
</html>