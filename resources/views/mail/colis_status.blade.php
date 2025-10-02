<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Statut de votre colis</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 20px; text-align: center; }
        .content { background: #fff; padding: 20px; }
        .footer { background: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; }
        .tracking-number { font-size: 18px; font-weight: bold; color: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Flyfret - Suivi de Colis</h2>
        </div>
        
        <div class="content">
            @if($role === 'expediteur')
                <p>Bonjour {{ $client->prenom_cli }} {{ $client->nom_cli }},</p>
                <p>Votre colis a été enregistré avec succès dans notre système.</p>
            @else
                <p>Bonjour {{ $client->prenom_cli }} {{ $client->nom_cli }},</p>
                <p>Un colis vous est destiné et a été enregistré dans notre système.</p>
            @endif
            
            <p><strong>Numéro de suivi :</strong> <span class="tracking-number">{{ $colis->num_details_colis }}</span></p>
            <p><strong>Statut actuel :</strong> {{ $colis->status }}</p>
            <p><strong>Type de colis :</strong> {{ $colis->type_colis }}</p>
            <p><strong>Quantité :</strong> {{ $colis->quantite }}</p>
            
            <p>Vous pouvez suivre l'état de votre colis à tout moment en utilisant votre numéro de suivi sur notre plateforme.</p>

            <a href="{{ route('suiviColis') }}" class="tracking-button">
                Suivre mon colis
            </a>

            <p>Cordialement,<br>L'équipe Flyfret</p>
        </div>
        
        <div class="footer">
            <p>© {{ date('Y') }} Flyfret. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>