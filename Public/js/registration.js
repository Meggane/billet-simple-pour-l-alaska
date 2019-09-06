class Registration {
    checkFields() {
        login.blur(function () {
            if (login.val().length < 3) {
                login.css("borderColor", "red");
                incorrectLogin.css("display", "flex");
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
            } else {
                email.css("borderColor", "initial");
                incorrectEmail.css("display", "none");
            }
        });
    }

    registrationValid() {
        registrationSubmit.click(function() {
            if (login.css("borderColor") == "red" || password.css("borderColor") == "red" || confirmPassword.css("borderColor") == "red" || login.val() == "" || password.val() == "" || confirmPassword.val() == "" || email.val() == "") {
                return false;
            } else {
                return true;
            }
        });
    }
}