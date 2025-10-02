<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation de Rendez-vous - FlyFret</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f8f9fa;
        }
        .header {
            background: linear-gradient(135deg, #8022F4 0%, #E100FF 100%);
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            color: white;
            margin: 0;
            font-size: 24px;
        }
        .content {
            background: white;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .detail-item {
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .detail-item:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #8022F4;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            color: #6c757d;
            font-size: 14px;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FlyFret - Confirmation de Rendez-vous</h1>
        </div>
        
        <div class="content">
            <h2>Bonjour {{ $details['nom_complet'] }},</h2>
            
            <p>Votre rendez-vous a été confirmé avec succès. Voici le récapitulatif :</p>
            
            <div class="details">
                <div class="detail-item">
                    <span class="label">Date :</span> {{ \Carbon\Carbon::parse($details['date'])->format('d/m/Y') }}
                </div>
                <div class="detail-item">
                    <span class="label">Heure :</span> {{ $details['heure'] }}
                </div>
                <div class="detail-item">
                    <span class="label">Agence :</span> {{ $details['agence'] }}
                </div>
                <div class="detail-item">
                    <span class="label">Motif :</span> {{ $details['motif'] }}
                </div>
                @if($details['autre_motif'])
                <div class="detail-item">
                    <span class="label">Détails :</span> {{ $details['autre_motif'] }}
                </div>
                @endif
            </div>

            <div class="warning">
                <strong>📅 Important :</strong>
                <p>Veuillez vous présenter à l'agence <strong>{{ $details['agence'] }}</strong> 10 minutes avant l'heure prévue.</p>
                <p>N'oubliez pas de vous munir de vos documents d'identité.</p>
            </div>

            <p>Si vous avez besoin de modifier ou d'annuler votre rendez-vous, veuillez nous contacter au plus tôt.</p>
            
            <p>Cordialement,<br>
            <strong>L'équipe FlyFret</strong></p>
        </div>
        
        <div class="footer">
            <p>FlyFret &copy; {{ date('Y') }} - Tous droits réservés</p>
            <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
        </div>
    </div>
</body>
</html>