<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prise de Rendez-vous</title>
    <link rel="stylesheet" href="assets/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body style="background-image: url('assets/images/img1.jpg');">
    <div class="container" >
      <h2>Prendre un Rendez-vous</h2>
      @if(session('success'))
    <div class="alert alert-success" style="color:red;">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
        <div style="color: red;">
            <p><strong>{{ session('error') }}</strong></p>
        </div>
    @endif

    <form id="appointment-form" method="POST" action="{{ route('rendez_vous.store') }}">
    @csrf
    <div class="form-group">
        <div>
            <label for="Nom">Nom*</label>
            <input type="text" id="Nom" name="Nom" placeholder="Entrez votre nom" required />
        </div>
        <div>
            <label for="Prénom">Prénom*</label>
            <input type="text" id="Prénom" name="Prénom" placeholder="Entrez votre prénom" required />
        </div>
    </div>

    <div class="form-group">
        <div class="">
            <label for="Email">Email*</label>
            <input type="email" id="Email" name="Email" placeholder="Entrez votre email" required />
        </div>
    </div>

    <div class="form-group">
        <div>
            <label for="date">Date*</label>
            <input type="date" id="date" name="date" placeholder="Entrez une date " required />
        </div>
         <div>
            <label for="time">Heure*</label>
            <select id="time" name="time"  required>
              <option value="">Sélectionner une heure</option>
              <option value="09:00">09:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>

            </select>
          </div> 
    </div>

    

    <div class="">
    <label for="Motif_du_rendez_vous">Motif du rendez-vous*</label>
    <select id="Motif_du_rendez_vous" name="Motif_du_rendez_vous" required>
        <option value="">Sélectionner un sujet</option>
        <option value="Déposer un colis">Déposer un colis</option>
        <option value="Rétirer un colis">Rétirer un colis</option>
        <option value="autres">Autres</option>
    </select>
   


</div>
<label for="message">Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Entrez votre message"></textarea> 


    <input type="submit" value="Prendre Rendez-vous" />
</form>

    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const dateInput = document.getElementById("date");
        
        dateInput.addEventListener("input", function () {
          const selectedDate = new Date(this.value);
          const day = selectedDate.getDay(); // 0 = Dimanche, 6 = Samedi
          
          if (day === 0 ) {
            Swal.fire({
                icon: 'warning',
                title: 'Jour non disponible 🚫',
                text: 'Les rendez-vous ne sont disponibles que du lundi au vendredi.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#007bff',
                customClass: {
                    title: 'swal-title-small',
                    popup: 'swal-popup-small',
                    confirmButton: 'swal-button-small'
                }
            });
            this.value = ""; // Réinitialiser la date
          }
        });
      });
    </script>
  </body>
</html>
