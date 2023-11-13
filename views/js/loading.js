// Fonction pour masquer l'écran de chargement
function hideLoader() {
    // Sélectionne l'élément HTML avec la classe "loader-container"
    var loaderContainer = document.querySelector('.loader-container');
    // Définit l'animation 'hide-loader' sur l'élément loaderContainer pendant 0.5 secondes
    loaderContainer.style.animation = 'hide-loader 0.5s forwards';
    // Après 500ms (0.5 seconde), masque l'élément en changeant sa propriété 'display' à 'none'
    setTimeout(function () {
        loaderContainer.style.display = 'none';
    }, 500); // Ajout d'un délai de 500ms pour laisser le temps à l'animation de se terminer
}
// Événement qui se déclenche lorsque la page est entièrement chargée
window.addEventListener('load', function () {
    // Appelle la fonction hideLoader avec un délai supplémentaire de 1500ms (1.5 secondes) après le chargement complet de la page
    setTimeout(hideLoader, 1500);
});