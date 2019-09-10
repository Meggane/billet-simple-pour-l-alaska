class Connexion {
    connexionNotValid() {
        connexionSubmit.click(function () {
            if (loginConnexion.val().match(/[a-z0-9A-Z]{3,}/) && passwordConnexion.val().match(/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.[!@#\$%\^&\*\?]{0,})(?=.{6,})/)) {
                return true;
            } else {
                return false;
            }
        });
    }
}