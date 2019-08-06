class Registration {
    checkFields() {
        login.addEventListener("blur", function () {
            if (login.value.length < 3) {
                login.style.borderColor = "red";
            } else {
                login.style.borderColor = "initial";
            }
        });

        password.addEventListener("blur", function() {
            let regexPasswordMaj = /[A-Z]/;
            let regexPasswordMin = /[a-z]/;
            let regexPasswordNumber = /[0-9]/;
            if (password.value.length < 6 || !password.value.match(regexPasswordMaj) || !password.value.match(regexPasswordMin) || !password.value.match(regexPasswordNumber)) {
                password.style.borderColor = "red";
            } else {
                password.style.borderColor = "initial";
            }
        });

        confirmPassword.addEventListener("blur", function() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.style.borderColor = "red";
            } else {
                confirmPassword.style.borderColor = "initial";
            }
        });

        email.addEventListener("blur", function () {
            let regexEmail = /^([A-Za-z0-9]+)@+([a-z0-9]+)\.([a-z]{2,6})$/;
            if (!email.value.match(regexEmail)) {
                email.style.borderColor = "red";
            } else {
                email.style.borderColor = "initial";
            }
        });
    }

    registrationValid() {
        registrationSubmit.click(function() {
            if (login.style.borderColor == "red" || password.style.borderColor == "red" || confirmPassword.style.borderColor == "red" || login.value == "" || password.value == "" || confirmPassword.value == "" || email.value == "") {
                if (login.style.borderColor == "red" || login.value == "") {
                    incorrectLogin.style.display = "flex";
                } else {
                    incorrectLogin.style.display = "none";
                }

                if (password.style.borderColor == "red" || password.value == "") {
                    incorrectPassword.style.display = "flex";
                } else {
                    incorrectPassword.style.display = "none";
                }

                if (confirmPassword.style.borderColor == "red" || confirmPassword.value == "") {
                    incorrectConfirmPassword.style.display = "flex";
                } else {
                    incorrectConfirmPassword.style.display = "none";
                }

                if (email.style.borderColor == "red" || email.value == "") {
                    incorrectEmail.style.display = "flex";
                } else {
                    incorrectEmail.style.display = "none";
                }

                return false;
            } else {
                return true;
            }
        });
    }
}