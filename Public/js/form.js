class Form {
	openFormRegistration() {
		registrationForm.style.visibility = "visible";
		connexionForm.style.visibility = "hidden";
	}

	openFormConnexion() {
		connexionForm.style.visibility = "visible";
		registrationForm.style.visibility = "hidden";
		if (navUl.style.visibility == "visible") {
			navUl.style.visibility = "hidden";
		}
	}

	closeFormRegistration() {
		registrationForm.style.visibility = "hidden";
	}

	closeFormConnexion() {
		connexionForm.style.visibility = "hidden";
	}
}