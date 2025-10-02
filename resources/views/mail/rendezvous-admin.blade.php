<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouveau Rendez-vous - FlyFret</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #8022F4; color: white; padding: 20px; text-align: center; }
        .content { background: #f8f9fa; padding: 20px; }
        .details { background: white; padding: 15px; margin: 15px 0; border-left: 4px solid #8022F4; }
        .label { font-weight: bold; color: #8022F4; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouveau Rendez-vous FlyFret</h1>
        </div>
        
        <div class="content">
            <h2>Un nouveau rendez-vous a été pris :</h2>
            
            <div class="details">
                <p><span class="label">Client :</span> {{ $rendezVous->prenom }} {{ $rendezVous->nom }}</p>
                <p><span class="label">Email :</span> {{ $rendezVous->email }}</p>
                <p><span class="label">Date :</span> {{ \Carbon\Carbon::parse($rendezVous->date)->format('d/m/Y') }}</p>
                <p><span class="label">Heure :</span> {{ $rendezVous->heure }}</p>
                <p><span class="label">Agence :</span> {{ $rendezVous->agence }}</p>
                <p><span class="label">Motif :</span> {{ $rendezVous->motif }}</p>
                @if($rendezVous->autre_motif)
                <p><span class="label">Détails :</span> {{ $rendezVous->autre_motif }}</p>
                @endif
                <p><span class="label">Date de réservation :</span> {{ $rendezVous->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <p><strong>Action requise :</strong> Préparer l'accueil du client.</p>
        </div>
    </div>
</body>
</html>