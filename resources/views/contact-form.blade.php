<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact - FlyFret</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .email-header {
            background: linear-gradient(rgba(123, 1, 247, 0.85), rgba(123, 1, 247, 0.85));
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        
        .email-body {
            padding: 30px;
        }
        
        .message-details {
            background: #f9f5ff;
            border-left: 4px solid #8a2be2;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 0 4px 4px 0;
        }
        
        .detail-row {
            margin-bottom: 10px;
        }
        
        .detail-label {
            font-weight: 600;
            color: #4b0082;
            display: inline-block;
            width: 80px;
        }
        
        .message-content {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            border-left: 3px solid #ddd;
            white-space: pre-line;
        }
        
        .email-footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777777;
            background: #f5f5f5;
        }
        
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 0;
                border-radius: 0;
            }
            
            .email-body {
                padding: 20px;
            }
            
            .detail-label {
                display: block;
                width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Nouveau message de contact</h1>
        </div>
        
        <div class="email-body">
            <div class="message-details">
                <div class="detail-row">
                    <span class="detail-label">Nom:</span>
                    <span>{{ $data['name'] }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Sujet:</span>
                    <span>{{ $data['subject'] }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date:</span>
                    <span>{{ now()->format('d/m/Y H:i') }}</span>
                </div>
            </div>
            
            <h3 style="margin-top: 0; color: #4b0082;">Message :</h3>
            <div class="message-content">
                {{ $data['message'] }}
            </div>
            
            <p style="margin-top: 25px;">
                <a href="mailto:{{ $data['email'] }}" style="background: #8a2be2; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;">
                    Répondre à {{ $data['name'] }}
                </a>
            </p>
        </div>
        
        <div class="email-footer">
            <p>Cet email a été envoyé depuis le formulaire de contact de FlyFret</p>
            <p>&copy; {{ date('Y') }} FlyFret. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>