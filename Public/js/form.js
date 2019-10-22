class Form {
	openFormRegistration() {
		registrationForm.css("visibility", "visible");
		connexionForm.css("visibility", "hidden");
	}

	openFormConnexion() {
		connexionForm.css("visibility", "visible");
		registrationForm.css("visibility", "hidden");
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