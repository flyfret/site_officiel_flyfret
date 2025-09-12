<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement confirmé - FlyFret</title>
    <style type="text/css">
        /* Base styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f7f7f7;
        }
        
        /* Container */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        /* Header */
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #eeeeee;
        }
        
        .logo {
            max-width: 180px;
            height: auto;
        }
        
        /* Content */
        .content {
            padding: 30px 20px;
        }
        
        h1 {
            color: #2c3e50;
            font-size: 24px;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
        }
        
        p {
            margin-bottom: 20px;
            font-size: 16px;
            color: #555555;
        }
        
        .highlight {
            font-weight: bold;
            color: #2c3e50;
        }
        
        /* Button */
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        
        .tracking-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #27ae60;
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        
        .tracking-button:hover {
            background-color: #219653;
        }
        
        /* Tracking info */
        .tracking-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin: 25px 0;
            text-align: center;
            border-left: 4px solid #27ae60;
        }
        
        .tracking-number {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #7f8c8d;
            border-top: 1px solid #eeeeee;
        }
        
        .signature {
            margin-top: 30px;
            font-style: italic;
            color: #7f8c8d;
        }
        
        /* Responsive */
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 10px;
            }
            
            .content {
                padding: 20px 10px;
            }
            
            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header with logo -->
        <div class="header">
            <img src="https://flyfret.com/logo.png" alt="FlyFret Logo" class="logo">
        </div>
        
        <!-- Main content -->
        <div class="content">
            <h1>Paiement confirmé ✅</h1>
            
            <p>Bonjour,</p>
            
            <p>Nous avons bien reçu votre paiement et votre colis est maintenant en cours de préparation.</p>
            
            <!-- Tracking info box -->
            <div class="tracking-info">
                <p>Votre numéro de suivi :</p>
                <p class="tracking-number">{{ $numeroSuivi }}</p>
                <p>Conservez ce numéro pour suivre votre colis.</p>
            </div>
            
            <!-- Tracking button -->
            <div class="button-container">
                <a href="{{ $lienSuivi }}" class="tracking-button">Suivre mon colis</a>
            </div>
            
            <p>Vous recevrez une notification à chaque étape importante de l'acheminement de votre colis.</p>
            
            <p class="signature">Merci pour votre confiance,<br>L'équipe FlyFret</p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>© {{ date('Y') }} FlyFret. Tous droits réservés.</p>
            <p>
                <a href="https://flyfret.com/contact" style="color: #3498db; text-decoration: none;">Contactez-nous</a> | 
                <a href="https://flyfret.com/conditions" style="color: #3498db; text-decoration: none;">Conditions générales</a>
            </p>
        </div>
    </div>
</body>
</html>