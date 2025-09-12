<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mise à jour de votre colis</title>
</head>
<body>
    <p>Bonjour,</p>

    <p>Le statut de votre colis <strong>{{ $numeroSuivi }}</strong> a été mis à jour.</p>

    <p>
        Vous pouvez suivre son état en cliquant sur le lien ci-dessous : <br>
        <a href="{{ $lienSuivi }}" target="_blank" style="color:blue;">Suivre mon colis</a>
    </p>

    <p>Merci d'avoir choisi FlyFret.</p>
</body>
</html>
