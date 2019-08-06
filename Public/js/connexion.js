class Connexion {
    connexionValid() {
        connexionSubmit.click(function() {
            if (login.style.borderColor == "red" || password.style.borderColor == "red" || login.value == "" || password.value == "") {
                if (login.style.borderColor == "red" || login.value == "") {
                    incorrectConnexion.style.display = "flex";
                } else {
                    incorrectConnexion.style.display = "none";
                }

                if (password.style.borderColor == "red" || password.value == "") {
                    incorrectConnexion.style.display = "flex";
                } else {
                    incorrectConnexion.style.display = "none";
                }

                return false;
            } else {
                return true;
            }
        });
    }
}