<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .payment-form {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 360px;
            text-align: center;
        }

        .payment-form h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #333;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 40px 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border 0.3s;
            
        }

        .input-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .error-message {
            color: red;
            font-size: 14px;
            display: none;
            margin-bottom: 10px;
            text-align: left;
        }

        .payment-form button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .payment-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="payment-form">
        <h2>Formulaire de Paiement--- {{ $id }}</h2>
        <form id="paymentForm">
            <div class="input-group">
                <input type="text" id="cardNumber" placeholder="Numéro de carte" maxlength="19" required>
                <i class="fas fa-credit-card"></i>
            </div>
            <p class="error-message" id="errorCard">Veuillez entrer un numéro de carte valide.</p>

            <div class="input-group">
                <input type="text" id="expiryDate" placeholder="MM/AA" maxlength="5" required>
                <i class="fas fa-calendar-alt"></i>
            </div>
            <p class="error-message" id="errorExpiry">Veuillez entrer une date valide.</p>

            <div class="input-group">
                <input type="text" id="cvv" placeholder="CVV" maxlength="3" required>
                <i class="fas fa-lock"></i>
            </div>
            <p class="error-message" id="errorCVV">Veuillez entrer un CVV valide.</p>

            <div class="input-group">
                <input type="text" id="cardHolder" placeholder="Nom du titulaire" required>
                <i class="fas fa-user"></i>
            </div>
            <p class="error-message" id="errorName">Veuillez entrer un nom valide.</p>

            <button type="submit">Payer</button>
        </form>
    </div>

    <script>
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const cardNumber = document.getElementById('cardNumber');
            const expiryDate = document.getElementById('expiryDate');
            const cvv = document.getElementById('cvv');
            const cardHolder = document.getElementById('cardHolder');

            const errorCard = document.getElementById('errorCard');
            const errorExpiry = document.getElementById('errorExpiry');
            const errorCVV = document.getElementById('errorCVV');
            const errorName = document.getElementById('errorName');

            let valid = true;

            // Vérification du numéro de carte (format : 16 chiffres)
            const cardRegex = /^[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}$/;
            if (!cardRegex.test(cardNumber.value)) {
                errorCard.style.display = 'block';
                valid = false;
            } else {
                errorCard.style.display = 'none';
            }

            // Vérification de la date d'expiration (MM/AA)
            const expiryRegex = /^(0[1-9]|1[0-2])\/[0-9]{2}$/;
            if (!expiryRegex.test(expiryDate.value)) {
                errorExpiry.style.display = 'block';
                valid = false;
            } else {
                errorExpiry.style.display = 'none';
            }

            // Vérification du CVV (3 chiffres)
            const cvvRegex = /^[0-9]{3}$/;
            if (!cvvRegex.test(cvv.value)) {
                errorCVV.style.display = 'block';
                valid = false;
            } else {
                errorCVV.style.display = 'none';
            }

            // Vérification du nom du titulaire (au moins 2 caractères)
            if (cardHolder.value.trim().length < 2) {
                errorName.style.display = 'block';
                valid = false;
            } else {
                errorName.style.display = 'none';
            }

            if (valid) {
                alert('Paiement réussi!');
            }
        });

        // Formatage automatique du numéro de carte
        document.getElementById('cardNumber').addEventListener('input', function(event) {
            let value = event.target.value.replace(/\D/g, ''); // Supprime tout sauf les chiffres
            value = value.replace(/(.{4})/g, '$1 ').trim(); // Ajoute un espace tous les 4 chiffres
            event.target.value = value;
        });

        // Formatage automatique de la date d'expiration
        document.getElementById('expiryDate').addEventListener('input', function(event) {
            let value = event.target.value.replace(/\D/g, '');
            if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            event.target.value = value;
        });
    </script>

</body>
</html>
