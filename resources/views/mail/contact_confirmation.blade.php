<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation de Réception - FlyFret</title>
    <style>
        body { font-family: 'Poppins', Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #8022F4 0%, #E100FF 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f8f9fa; padding: 30px; border-radius: 0 0 10px 10px; }
        .confirmation-badge { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; text-align: center; margin: 20px 0; }
        .details { background: white; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FlyFret - Confirmation de Réception</h1>
        </div>
        
        <div class="content">
            <div class="confirmation-badge">
                <h3>✅ Votre message a bien été reçu !</h3>
            </div>

            <p>Bonjour <strong>{{ $data['name'] }}</strong>,</p>
            
            <p>Nous accusons réception de votre message et vous remercions de nous avoir contactés.</p>

            <div class="details">
                <p><strong>Récapitulatif de votre message :</strong></p>
                <p><strong>Sujet :</strong> {{ $data['subject'] }}</p>
                <p><strong>Date d'envoi :</strong> {{ $data['submitted_at'] }}</p>
                <p><strong>Votre message :</strong></p>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 10px;">
                    {{ nl2br(e($data['message'])) }}
                </div>
            </div>

            <p><strong>Prochaines étapes :</strong></p>
            <ul>
                <li>Notre équipe va examiner votre demande attentivement</li>
                <li>Nous vous répondrons dans les plus brefs délais</li>
                <li>Vous pouvez nous contacter directement au +33 5 54 54 31 71 pour toute urgence</li>
            </ul>

            <p><em>Cet email est une confirmation automatique, merci de ne pas y répondre.</em></p>
        </div>
        
        <div class="footer">
            <p><strong>FlyFret - Transport international de colis</strong></p>
            <p>📞 France : +33 5 54 54 31 71 | Côte d'Ivoire : +225 27 22 30 48 19</p>
            <p>📧 service.client@fly-fret.com</p>
            <p>&copy; {{ date('Y') }} FlyFret - Tous droits réservés</p>
        </div>
    </div>
</body>
</html>