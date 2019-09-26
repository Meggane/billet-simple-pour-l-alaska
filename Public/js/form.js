class Form {
	openFormRegistration() {
		registrationForm.css("visibility", "visible");
		connexionForm.css("visibility", "hidden");
	}

	openFormConnexion() {
		$("#connexion_form").css("visibility", "visible");
		$("#registration_form").css("visibility", "hidden");
		if (navUl.css("visibility") == "visible" && mobileMenu.css("display") == "flex") {
			navUl.css("visibility", "hidden");
		}
	}

	closeFormRegistration() {
		registrationForm.css("visibility", "hidden");
	}

	closeFormConnexion() {
		connexionForm.css("visibility", "hidden");
	}
}