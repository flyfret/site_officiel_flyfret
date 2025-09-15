<form action="destinataire_action.php" method="POST" style="width: 48%; display: inline-block; padding: 10px; background-color: #f4f4f4; border-radius: 5px;">
    <fieldset>
        <legend style="color:#8022F4; font-size:16px">📦 Informations du destinataire</legend>

        <div class="form-group">
            <label for="receiver-name"><i class="fas fa-user"></i> Nom</label>
            <input type="text" id="receiver-name" name="receiver-name" class="form-control" placeholder="Nom du destinataire">
        </div>

        <div class="form-group">
            <label for="receiver-surname"><i class="fas fa-user-tag"></i> Prénom</label>
            <input type="text" id="receiver-surname" name="receiver-surname" class="form-control" placeholder="Prénom du destinataire">
        </div>

        <div class="form-group">
            <label for="receiver-email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" id="receiver-email" name="receiver-email" class="form-control" placeholder="Email du destinataire">
        </div>

        <div class="form-group">
            <label for="receiver-city"><i class="fas fa-city"></i> Ville</label>
            <input type="text" id="receiver-city" name="receiver-city" class="form-control" placeholder="Ville du destinataire">
        </div>

        <div class="form-group">
            <label for="receiver-address"><i class="fas fa-map-marker-alt"></i> Adresse</label>
            <input type="text" id="receiver-address" name="receiver-address" class="form-control" placeholder="Adresse du destinataire">
        </div>

        <div class="form-group">
            <label for="receiver-contact"><i class="fas fa-phone"></i> Contact</label>
            <input type="number" id="receiver-contact" name="receiver-contact" class="form-control" placeholder="Numéro de téléphone du destinataire">
        </div>

        <div class="form-group">
            <label for="receiver-postal-code"><i class="fas fa-mail-bulk"></i> Code postal</label>
            <input type="text" id="receiver-postal-code" name="receiver-postal-code" class="form-control" placeholder="Code postal du destinataire">
        </div>

        <div class="form-group">
            <label for="receiver-date"><i class="fas fa-calendar-alt"></i> Date de réception</label>
            <input type="date" id="receiver-date" name="receiver-date" class="form-control">
        </div>
    </fieldset>
</form>

<div style="display: flex; justify-content: space-between; margin-top: 20px;">
    <button type="button" class="btn btn-secondary" style="background-color:#2d2930; opacity:0.4; color:#eeecec">
        <i class="fas fa-arrow-left"></i> Précédent
    </button>
    <button type="submit" class="btn btn-success">
        <i class="fas fa-arrow-right"></i> Suivant
    </button>
</div>
