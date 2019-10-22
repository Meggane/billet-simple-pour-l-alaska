class Connexion {
    connexionAjax() {
        $(document).ready(function () {
            $("#tag_connexion_submit").click(function(e) {
                e.preventDefault();
                $.post(
                    '../../Controller/UsersController.php',
                    {
                        login_connexion : $("#login_connexion").val(),
                        password_connexion : $("#password_connexion").val()
                    },

                    function(data) {
                        if(data == "Success") {
                            $("#incorrect_connexion").css("display", "none");
                            setTimeout(self.location.href="",1000);
                        } else {
                            $("#incorrect_connexion").css("display", "flex");
                        }
                    },
                    "text"
                );
            });
        });
    }
}