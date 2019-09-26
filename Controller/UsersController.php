<?php

require_once __DIR__ . "/pageController.php";
require_once __DIR__ . "/BackController.php";

class UsersController extends BackController {

    public function __construct($app, $db) {
        parent::__construct($app, $db);
    }

    public function createUser() {
        include __DIR__ . "/variableController.php";

        if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]) && isset($_POST["email"]) && !empty($_POST["password"]) && htmlspecialchars($_POST["password"]) == htmlspecialchars($_POST["confirm_password"]))
        {
            if (strlen(htmlspecialchars($_POST["login"])) >= 3 || strlen(htmlspecialchars($_POST["password"])) >= 6 || preg_match("/[A-Z]/", htmlspecialchars($_POST["password"])) || preg_match("/[a-z]/", htmlspecialchars($_POST["password"])) || preg_match("/[0-9]/", htmlspecialchars($_POST["password"])) || preg_match("/^([A-Za-z0-9]+)+\@([A-Za-z0-9]+)+\.[A-Za-z]{2,4}$/", htmlspecialchars($_POST["email"]))) {
                $user = new Users(
                    [
                        'login' => htmlspecialchars($_POST['login']),
                        'password' => password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT),
                        "email" => htmlspecialchars($_POST['email'])
                    ]
                );

                if (isset($_POST['id']))
                {
                    $user->setId(htmlspecialchars($_POST['id']));
                }

                if ($user->isValid())
                {
                    $users->save($user);

                    session_start();
                    $_SESSION["login"] = $user->login();
                    $_SESSION["email"] = $user->email();
                    $_SESSION["id"] = $user->id();
                    $_SESSION["admin"] = $user->admin();
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
            }
        }
    }

	public function deleteUser() {
        include __DIR__ . "/variableController.php";

        if (isset($_GET["delete-user"])) {
            session_destroy();
            $users->delete(htmlspecialchars((int) $_GET["delete-user"]));
            header("Location: ../../Views/Pages/index.php");
        }
    }

    public function updateUser() {
        include __DIR__ . "/variableController.php";
        if (isset($_GET["login"])) {
            $user = $users->get(htmlspecialchars($_GET["login"]));
        }

        if (isset($_POST["password_infoUser"]) && !empty($_POST["password_infoUser"]) && isset($_POST["confirm_password_infoUser"]) && htmlspecialchars($_POST["password_infoUser"]) == htmlspecialchars($_POST["confirm_password_infoUser"]) && preg_match("/[A-Z]+/", htmlspecialchars($_POST["password_infoUser"])) && preg_match("/[a-z]+/", htmlspecialchars($_POST["password_infoUser"])) && preg_match("/[0-9]+/", htmlspecialchars($_POST["password_infoUser"]))) {
            $passwordCrypt = password_hash(htmlspecialchars($_POST["password_infoUser"]), PASSWORD_DEFAULT);

            $q = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
            $q->bindValue(":password", $passwordCrypt);
            $q->bindValue(":id", $user->id(), PDO::PARAM_INT);
            $q->execute();

            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit();
        }
    }

    public function connexionUser() {

    }
}

$usersController = new usersController("PDO", PDOFactory::getMysqlConnexion());
$createUser = $usersController->createUser();
$deleteUser = $usersController->deleteUser();
$updateUser = $usersController->updateUser();
$connexionUser = $usersController->connexionUser();