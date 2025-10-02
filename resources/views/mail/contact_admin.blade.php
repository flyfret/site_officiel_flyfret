<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouveau Message de Contact - FlyFret</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #8022F4 0%, #E100FF 100%);
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            color: white;
        }
        .content {
            background: white;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .alert-badge {
            background: #ffeb3b;
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .details-grid {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .detail-row {
            display: flex;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: bold;
            color: #8022F4;
            min-width: 100px;
        }
        .detail-value {
            flex: 1;
        }
        .message-content {
            background: white;
            border: 1px solid #e9ecef;
            padding: 20px;
            border-radius: 8px;
            margin: 15px 0;
            line-height: 1.8;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            color: #6c757d;
            font-size: 14px;
        }
        .action-required {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .reply-btn {
            display: inline-block;
            background: #8022F4;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FlyFret - Nouveau Message</h1>
        </div>
        
        <div class="content">
            <div class="alert-badge">
                📧 NOUVEAU MESSAGE DE CONTACT
            </div>

            <h2>Informations du contact :</h2>
            
            <div class="details-grid">
                <div class="detail-row">
                    <span class="detail-label">Nom :</span>
                    <span class="detail-value">{{ $data['name'] }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email :</span>
                    <span class="detail-value">
                        <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Sujet :</span>
                    <span class="detail-value">{{ $data['subject'] }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Reçu le :</span>
                    <span class="detail-value">{{ now()->format('d/m/Y à H:i') }}</span>
                </div>
            </div>

            <h3>Message :</h3>
            <div class="message-content">
                {!! nl2br(e($data['message'])) !!}
            </div>

            <div class="action-required">
                <strong>📋 ACTION REQUISE :</strong>
                <p>• Répondre à l'email dans les plus brefs délais</p>
                <p>• Traiter la demande du client</p>
                <p>• Suivre le processus de support client</p>
                
                <a href="mailto:{{ $data['email'] }}?subject=RE: {{ $data['subject'] }}" class="reply-btn">
                    📨 Répondre à {{ $data['name'] }}
                </a>
            </div>

            <p><em>Cet email a été généré automatiquement suite à un nouveau message via le formulaire de contact.</em></p>
        </div>
        
        <div class="footer">
            <p>FlyFret &copy; {{ date('Y') }} - Tous droits réservés</p>
        </div>
    </div>
</body>
</html>