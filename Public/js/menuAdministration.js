class MenuAdministration {

	openSubMenuAdministration() {

		if (subMenuAdministration.style.visibility == "visible") {
			subMenuAdministration.style.visibility = "hidden";
		} else {
			subMenuAdministration.style.visibility = "visible";
			if (document.getElementById("connexion_form").style.visibility == "visible" || document.getElementById("registration_form").style.visibility == "visible") {
				subMenuAdministration.style.visibility = "hidden";
				if (administration.addEventListener("click", function () {
					if (subMenuAdministration.style.visibility == "visible") {
						subMenuAdministration.style.visibility = "hidden";
					} else {
						subMenuAdministration.style.visibility = "visible";
					};
				}));
			}
		}
	}
}
