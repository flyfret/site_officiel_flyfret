<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .payment-container {
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .payment-methods button {
            width: 48%;
            padding: 10px;
            margin: 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .payment-methods{
            display: flex;
            justify-content: space-between;
        }
        .active {
            background-color: rgb(123, 1, 247);
            color: white;
        }
        .hidden {
            display: none;
        }
        .form-group {
            margin: 10px 0;
        }
        input ,select{
            width: 95%;
            padding: 9px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        select {
            width: 100%;
        }
        .pay-button {
            width: 100%;
            padding: 10px;
            background-color: rgb(123, 1, 247);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .warning {
            background: rgba(123, 1, 247,0.3);
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            margin:10px 0;        
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>Payer avec</h2>
        <div class="payment-methods">
            <button id="mobileMoneyBtn" class="active">Mobile Money</button>
            <button id="cardBtn">Carte de crédit</button>
        </div>
        <form id="paymentForm" method="POST" action="{{ route('paiements.store') }}">
        @csrf 
            <div id="mobileMoneyFields">
                <div class="form-group">
                    <label for="phone">Numéro de téléphone</label>
                    <input type="text" id="phone" placeholder="07 XX XX XX XX">
                </div>
                <div class="form-group">
                    <label for="provider">Opérateur</label>
                    <select id="provider">
                        <option>Orange Money</option>
                        <option>MTN MoMo</option>
                        <option>MOOV Money</option>
                        <option>Wave</option>
                    </select>
                </div>
            </div>
            <div id="cardFields" class="hidden">
                <div class="form-group">
                    <label for="cardNumber">Numéro de carte</label>
                    <input type="text" id="cardNumber" placeholder="XXXX XXXX XXXX XXXX">
                </div>
                <div class="form-group">
                    <label for="expiry">Date d'expiration</label>
                    <input type="text" id="expiry" placeholder="MM/AA">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" placeholder="XXX">
                </div>
            </div>

            <div class="warning">
                <p>⚠️ Avant de continuer, assurez-vous d'avoir le montant nécessaire sur votre compte Mobile Money.</p>
            </div>

            <button type="submit" class="pay-button">Payer</button>
        </form>
    </div>
    <script>
        
    document.getElementById("mobileMoneyBtn").addEventListener("click", function() {
        document.getElementById("mobileMoneyFields").classList.remove("hidden");
        document.getElementById("cardFields").classList.add("hidden");
        this.classList.add("active");
        document.getElementById("cardBtn").classList.remove("active");
    });
    
    document.getElementById("cardBtn").addEventListener("click", function() {
        document.getElementById("cardFields").classList.remove("hidden");
        document.getElementById("mobileMoneyFields").classList.add("hidden");
        this.classList.add("active");
        document.getElementById("mobileMoneyBtn").classList.remove("active");
    });
    </script>
</body>
</html>
