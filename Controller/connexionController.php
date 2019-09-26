<?php

require_once __DIR__ . "/pageController.php";
include __DIR__ . "/variableController.php";

if (!empty($_POST['login_connexion']) && !empty($_POST['password_connexion']))
{
    $user = $users->get(htmlspecialchars($_POST["login_connexion"]));

    if ($users->get($_POST["login_connexion"]))
    {

        if (isset($_POST["password_connexion"]) && password_verify(htmlspecialchars($_POST['password_connexion']), $user->password()))
        {

            echo "Success";
            session_start();
            $_SESSION["login"] = $user->login();
            $_SESSION["email"] = $user->email();
            $_SESSION["id"] = $user->id();
            $_SESSION["admin"] = $user->admin();
        }

        else {
            echo "Failed";

        }

    } else {
        echo "Failed";

    }
}