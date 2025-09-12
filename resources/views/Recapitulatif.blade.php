<div style="background-color:#fdf8fd; box-shadow:3px 2px 3px#e3ccfa; padding-bottom:50px">
                <h5 class="section-subtitle">Type de colis :</h5>
                <div class="input-group" >
                    <div class="radio-group d-flex gap-3">
                        <span class="input-group-text"><i class="fas fa-shopping-bag" style="color: #7B01F7; font-size:22px"></i></span>
                          <label class="btn ">
                              <input type="radio" name="typeColis" value="maritime" >Divers
                          </label>
                      </div>
                      <div class="radio-group d-flex gap-3">
                          <span class="input-group-text"><i class="fas fa-box" style="color: #7B01F7; font-size:22px"></i></span>
                          <label class="btn ">
                              <input type="radio" name="typeColis" value="aerienne">Marchandises
                          </label>
                      </div>
                      </div>
                </div>
                  <br>
                  <br>
                  <br>
                  <div style="background-color:#fdf8fd; box-shadow:3px 2px 3px#e3ccfa; padding-bottom:50px">
                <h5 class="section-subtitle" >Mode de transport :</h5>
                <div class="input-group" >
                   <div class="radio-group d-flex gap-3">
              <span class="input-group-text"><i class="fas fa-ship" style="color: #7B01F7; font-size:22px"></i></span>
                <label class="btn ">
                    <input type="radio" name="maritime" value="maritime" > Voie maritime
                </label>
            </div>
            <div class="radio-group d-flex gap-3">
                <span class="input-group-text"><i class="fas fa-plane" style="color: #7B01F7; font-size:22px"></i></span>
                <label class="btn ">
                    <input type="radio" name="aerienne" value="aerienne"> Voie aérienne
                </label>
            </div>
            </div>
                </div>
                
            
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary prev" style="background-color:#2d2930; opacity:0.4; color:#eeecec"><i class="fas fa-arrow-left" ></i> Précédent</button>
                    <button type="button" class="btn btn-primary next"><i class="fas fa-arrow-right"></i> Suivant</button>
                </div>
            </div>   





<div class="step-content hidden" id="step-5">
    <h4 class="section-title text-center"  style="color: #E701F6">Votre Récapitulatif</h4>
    <p class="section-subtitle text-center">Vérifiez vos informations avant de continuer.</p>
    
    <div class="form-group">
        <label><i class="fas fa-map-marker-alt"></i> <strong>Lieu d'expédition :</strong></label>
        <select class="form-control" id="expedition-summary" name="expedition-summary" required>
            <option>Abidjan</option>
            <option>Paris</option>
            <option>Lyon</option>
            <option>Nancy</option>
        </select>
    </div>

    <div class="form-group">
        <label><i class="fas fa-location-arrow"></i> <strong>Lieu de destination :</strong></label>
        <select class="form-control" id="destination-summary" name="destination-summary" required>
            <option>Abidjan</option>
            <option>Paris</option>
            <option>Lyon</option>
            <option>Nancy</option>
        </select>
    </div>
    <br>
    <div style="background-color:#fdf8fd; box-shadow:3px 2px 3px#e3ccfa; padding-bottom:50px">
    <h5 class="section-subtitle">Type de colis :</h5>
    <div class="input-group" >
        <div class="radio-group d-flex gap-3">
            <span class="input-group-text"><i class="fas fa-shopping-bag" style="color: #7B01F7; font-size:22px"></i></span>
              <label class="btn ">
                  <input type="radio" name="typeColis-summary" value="maritime" >Divers
              </label>
          </div>
          <div class="radio-group d-flex gap-3">
              <span class="input-group-text"><i class="fas fa-box" style="color: #7B01F7; font-size:22px"></i></span>
              <label class="btn ">
                  <input type="radio" name="typeColis-summary" value="aerienne">Marchandises
              </label>
          </div>
          </div>
    </div>
       <br>
       <br>
       <br>
       <div style="background-color:#fdf8fd; box-shadow:3px 2px 3px#e3ccfa; padding-bottom:50px">
    <h5 class="section-subtitle">Mode de expedition :</h5>
    <div class="input-group">
       <div class="radio-group d-flex gap-3">
  <span class="input-group-text"><i class="fas fa-ship" style="color: #7B01F7; font-size:22px"></i></span>
    <label class="btn ">
        <input type="radio" name="transport-mode-summary" value="maritime" > Voie maritime
    </label>
</div>
<div class="radio-group d-flex gap-3">
    <span class="input-group-text"><i class="fas fa-plane" style="color: #7B01F7; font-size:22px"></i></span>
    <label class="btn ">
        <input type="radio" name="transport-mode-summary" value="aerienne"> Voie aérienne
    </label>
</div>
    </div>
    </div>
      <br>
      <br>
    <div class="form-row">
        <!-- Section Expéditeur -->
        <form action="expediteur_action.php" method="POST" style="width: 48%; display: inline-block; padding: 10px; background-color: #f4f4f4; border-radius: 5px;">
    <fieldset>
        <legend style="color:#7B01F7; font-size:16px">📌 Informations de l'expéditeur</legend>
        
        <div class="form-group">
            <label for="sender-name"><i class="fas fa-user"></i> Nom</label>
            <input type="text" id="sender-name" name="sender-name" class="form-control" placeholder="Nom de l'expéditeur">
        </div>

        <div class="form-group">
            <label for="sender-surname"><i class="fas fa-user-tag"></i> Prénom</label>
            <input type="text" id="sender-surname" name="sender-surname" class="form-control" placeholder="Prénom de l'expéditeur">
        </div>

        <div class="form-group">
            <label for="sender-email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" id="sender-email" name="sender-email" class="form-control" placeholder="Email de l'expéditeur">
        </div>

        <div class="form-group">
            <label for="sender-city"><i class="fas fa-city"></i> Ville</label>
            <input type="text" id="sender-city" name="sender-city" class="form-control" placeholder="Ville de l'expéditeur">
        </div>

        <div class="form-group">
            <label for="sender-address"><i class="fas fa-map-marker-alt"></i> Adresse</label>
            <input type="text" id="sender-address" name="sender-address" class="form-control" placeholder="Adresse de l'expéditeur">
        </div>

        <div class="form-group">
            <label for="sender-contact"><i class="fas fa-phone"></i> Contact</label>
            <input type="number" id="sender-contact" name="sender-contact" class="form-control" placeholder="Numéro de téléphone de l'expéditeur">
        </div>

        <div class="form-group">
            <label for="sender-postal-code"><i class="fas fa-mail-bulk"></i> Code postal</label>
            <input type="text" id="sender-postal-code" name="sender-postal-code" class="form-control" placeholder="Code postal de l'expéditeur">
        </div>

        <div class="form-group">
            <label for="sender-date"><i class="fas fa-calendar-alt"></i> Date d'envoi</label>
            <input type="date" id="sender-date" name="sender-date" class="form-control">
        </div>
    </fieldset>
</form>

<form action="{{ route('store') }}" method="POST" style="width: 48%; display: inline-block; padding: 10px; background-color: #f4f4f4; border-radius: 5px;">

    @csrf 
    <fieldset>
        <legend style="color:#7B01F7; font-size:16px">📦 Informations du destinataire</legend>

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


    <div class="form-actions text-center mt-4">
        <button type="button" class="btn btn-secondary prev" style="background-color:#2d2930; opacity:0.4; color:#eeecec"><i class="fas fa-arrow-left" ></i> Précédent</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Obtenir un devis</button>
    </div>
</div>
          
 </form>
    </div>
        
        @endsection



            <!--<div class="form-group">
                    <label><i class="fas fa-map-marker-alt"></i> <strong>Lieu d'expédition :</strong></label>
                    <select class="form-control"  name="expedition" required>
                        <option >Abidjan</option>
                        <option>Paris</option>
                        <option>Lyon</option>
                        <option>Nancy</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label><i class="fas fa-location-arrow"></i> <strong>Lieu de destination :</strong></label>
                    <select class="form-control" name="destination" required>
                        <option>Abidjan</option>
                        <option>Paris</option>
                        <option>Lyon</option>
                        <option>Nancy</option>
                    </select>
                </div>
                   <br>
                   <div style="background-color:#fdf8fd; box-shadow:3px 2px 3px#e3ccfa; padding-bottom:50px">
                <h5 class="section-subtitle">Type de colis :</h5>
                <div class="input-group" >
                    <div class="radio-group d-flex gap-3">
                        <span class="input-group-text"><i class="fas fa-shopping-bag" style="color: #7B01F7; font-size:22px"></i></span>
                          <label class="btn ">
                              <input type="radio" name="typeColis" value="maritime" >Divers
                          </label>
                      </div>
                      <div class="radio-group d-flex gap-3">
                          <span class="input-group-text"><i class="fas fa-box" style="color: #7B01F7; font-size:22px"></i></span>
                          <label class="btn ">
                              <input type="radio" name="typeColis" value="aerienne">Marchandises
                          </label>
                      </div>
                      </div>
                </div>
                  <br>
                  <br>
                  <br>
                  <div style="background-color:#fdf8fd; box-shadow:3px 2px 3px#e3ccfa; padding-bottom:50px">
                <h5 class="section-subtitle" >Mode de transport :</h5>
                <div class="input-group" >
                   <div class="radio-group d-flex gap-3">
              <span class="input-group-text"><i class="fas fa-ship" style="color: #7B01F7; font-size:22px"></i></span>
                <label class="btn ">
                    <input type="radio" name="maritime" value="maritime" > Voie maritime
                </label>
            </div>
            <div class="radio-group d-flex gap-3">
                <span class="input-group-text"><i class="fas fa-plane" style="color: #7B01F7; font-size:22px"></i></span>
                <label class="btn ">
                    <input type="radio" name="aerienne" value="aerienne"> Voie aérienne
                </label>
            </div>
            </div>
                </div>-->