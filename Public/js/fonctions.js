let form = new Form();

let registration = new Registration();
registration.checkFields();
registration.registrationAjax();

let connexion = new Connexion();
connexion.connexionAjax();

let menu = new Menu();