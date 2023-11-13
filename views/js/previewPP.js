const avatarInput = document.querySelector('input[name="avatar"]');
const avatarPreview = document.getElementById('avatar-preview');

avatarInput.addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      avatarPreview.src = e.target.result;
      avatarPreview.style.display = 'block'; // Affiche l'élément img
    }
    reader.readAsDataURL(file);
  } else {
    avatarPreview.style.display = 'none'; // Masque l'élément img
  }
});