// page d'inscription
// Sélectionnez l'élément du formulaire avec l'ID "inscription"
var formulaire = document.getElementById("inscription");
// Créez un nouvel objet XMLHttpRequest
var xhr = new XMLHttpRequest();
// Vérifiez si l'élément du formulaire existe
if (formulaire) {
    // Ajoutez un écouteur d'événement pour le formulaire lorsqu'il est soumis
    formulaire.addEventListener("submit", function (e) {
        // Empêchez le comportement par défaut du formulaire (rechargement de la page)
        e.preventDefault();
        // Créez un objet FormData à partir du formulaire pour collecter les données du formulaire
        var data = new FormData(this);
        // Configurez une fonction pour gérer les changements d'état de la requête XMLHttpRequest
        xhr.onreadystatechange = function () {
            // Vérifiez si la requête est terminée (readyState 4)
            if (xhr.readyState == 4) {
                // Vérifiez si la réponse du serveur est OK (statut 200)
                if (xhr.status == 200) {
                    // Analysez la réponse JSON du serveur
                    var result = JSON.parse(xhr.response);
                    // Si la réponse indique le succès
                    if (result.success) {
                        // Redirigez l'utilisateur vers la page de connexion
                        window.location.href = "./connexion.php";
                    } else {
                        // Affichez un message d'erreur dans le premier élément avec la classe "fich"
                        document.getElementsByClassName("fich")[0].innerHTML = result.msg;
                    }
                } else {
                    // En cas d'erreur de requête, affichez une alerte
                    alert("Erreur lors de la requête");
                }
            }
        };
        // Configurez la requête HTTP POST vers le script du serveur "../controllers/form.php"
        xhr.open("POST", "../controllers/form.php", true);
        // Envoyez les données du formulaire au serveur
        xhr.send(data);
        // Empêchez le formulaire de soumettre les données de manière traditionnelle
        return false;
    });
}

// page de login
var loginForm = document.getElementById("connexion");
var xhr = new XMLHttpRequest();
if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();
        var data = new FormData(this);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var result = JSON.parse(xhr.response);
                    if (result.success) {
                        window.location.href = "../index.php";
                    } else {
                        document.getElementsByClassName("fish")[0].innerHTML = result.msg;
                    }
                } else {
                    alert("Erreur lors de la requête");
                }
            }
        };
        xhr.open("POST", "../controllers/login.php", true);
        xhr.send(data);
        return false;
    });
}
//page de modification de compte
var modiformulaire = document.getElementById("modify");
var xhr = new XMLHttpRequest();
if (modiformulaire) {
    modiformulaire.addEventListener("submit", function (e) {
        e.preventDefault();
        var data = new FormData(this);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var result = JSON.parse(xhr.response);
                    if (result.success) {
                        window.location.href = "./connecter.php";
                    } else {
                        document.getElementsByClassName("fich")[0].innerHTML = result.msg;
                    }
                } else {
                    alert("Erreur lors de la requête");
                }
            }
        };
        xhr.open("POST", "../controllers/formModA.php", true);
        xhr.send(data);
        return false;
    });
}
//page de modification du mot de passe
var modifPassword = document.getElementById("modify_password");
var xhr = new XMLHttpRequest();
if (modifPassword) {
    modifPassword.addEventListener("submit", function (e) {
        e.preventDefault();
        var data = new FormData(this);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var result = JSON.parse(xhr.response);
                    if (result.success) {
                        window.location.href = "./connexion.php";
                    } else {
                        document.getElementsByClassName("fich")[0].innerHTML = result.msg;
                    }
                } else {
                    alert("Erreur lors de la requête");
                }
            }
        };
        xhr.open("POST", "../controllers/formNewP.php", true);
        xhr.send(data);
        return false;
    });
}
//page de création de commentaire
var formC = document.getElementById("create_com");
var xhr = new XMLHttpRequest();
if (formC) {
    formC.addEventListener("submit", function (e) {
        e.preventDefault();
        var data = new FormData(this);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var result = JSON.parse(xhr.response);
                    if (result.success) {
                        window.location.reload;
                    } else {
                        document.getElementsByClassName("fich")[0].innerHTML = result.msg;
                    }
                } else {
                    alert("Erreur lors de la requête");
                }
            }
        };
        xhr.open("POST", "../controllers/formCom.php", true);
        xhr.send(data);
        return false;
    });
}