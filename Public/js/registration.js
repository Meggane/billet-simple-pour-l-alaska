class Registration {
    checkFields() {
        login.blur(function () {
            if (login.val().length < 3) {
                login.css("borderColor", "red");
                incorrectLogin.css("display", "flex");
                incorrectLogin.html("Le pseudo doit comporter au moins 3 caractères");
            } else {
                login.css("borderColor", "initial");
                incorrectLogin.css("display", "none");
            }
        });

        password.blur(function() {
            let regexPasswordMaj = /[A-Z]/;
            let regexPasswordMin = /[a-z]/;
            let regexPasswordNumber = /[0-9]/;
            if (password.val().length < 6 || !password.val().match(regexPasswordMaj) || !password.val().match(regexPasswordMin) || !password.val().match(regexPasswordNumber)) {
                password.css("borderColor", "red");
                incorrectPassword.css("display", "flex");
            } else {
                password.css("borderColor", "initial");
                incorrectPassword.css("display", "none");
            }
        });

        confirmPassword.blur(function() {
            if (password.val() !== confirmPassword.val()) {
                confirmPassword.css("borderColor", "red");
                incorrectConfirmPassword.css("display", "flex");
            } else {
                confirmPassword.css("borderColor", "initial");
                incorrectConfirmPassword.css("display", "none");
            }
        });

        email.blur(function () {
            let regexEmail = /^([A-Za-z0-9]+)@+([a-z0-9]+)\.([a-z]{2,6})$/;
            if (!email.val().match(regexEmail)) {
                email.css("borderColor", "red");
                incorrectEmail.css("display", "flex");
                incorrectEmail.html("Veuillez indiquer un email valide");
            } else {
                email.css("borderColor", "initial");
                incorrectEmail.css("display", "none");
            }
        });
    }

    registrationAjax() {
        $(document).ready(function () {
            $("#tag_registration_submit").click(function (e) {
                e.preventDefault();
                $.post(
                    '../../Controller/UsersController.php',
                    {
                        login: $("#login").val(),
                        password: $("#password").val(),
                        confirm_password: $("#confirm_password").val(),
                        email: $("#email").val()
                    },

                    function (data) {
                        if (data == "Success") {
                            $("#incorrect_login").css("display", "none");
                            $("#incorrect_email").css("display", "none");
                            setTimeout(self.location.href = "", 1000);
                        } else if (data == "Failed login and email") {
                            $("#incorrect_login").css("display", "flex");
                            $("#incorrect_login").html("Le pseudo est déjà pris");
                            $("#incorrect_email").css("display", "flex");
                            $("#incorrect_email").html("Cet email est déjà utilisé");
                        } else if (data == "Failed login") {
                            $("#incorrect_login").css("display", "flex");
                            $("#incorrect_email").css("display", "none");
                            $("#incorrect_login").html("Le pseudo est déjà pris");
                        } else if (data == "Failed email") {
                            $("#incorrect_email").css("display", "flex");
                            $("#incorrect_login").css("display", "none");
                            $("#incorrect_email").html("Cet email est déjà utilisé");
                        }
                    },
                    "text"
                );
            });
        });
    }
}