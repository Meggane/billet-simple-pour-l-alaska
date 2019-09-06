class Menu {
    openMenu() {
        if (navUl.css("visibility") == "visible") {
            navUl.css("visibility", "hidden");
        } else {
            navUl.css("visibility", "visible");
        }
    }
}

let menu = new Menu();