// Example: Ensure no script disables the form fields
document.addEventListener('DOMContentLoaded', function() {
  // Assurez-vous qu'aucun script ne désactive les champs de formulaire
  const formControls = document.querySelectorAll('.form-control');
  formControls.forEach(function(control) {
    control.disabled = false;
    control.readOnly = false;
  });
});
