<?php
require_once __DIR__ . "/BackController.php";

class UsersController extends BackController {

    public function __construct($app, $db) {
        parent::__construct($app, $db);
    }

    public function createUser() {
        include __DIR__ . "/variableController.php";
        if (isset($_POST["login"]) || isset($_POST["email"])) {
            $userLogin = $users->get($_POST["login"]);
            $userEmail = $users->getAllEmail($_POST["email"]);

            if ($userLogin && $userEmail) {
                echo "Failed login and email";
            } else if ($userLogin) {
                echo "Failed login";
            } else if ($userEmail) {
                echo "Failed email";
            } else {
                if (htmlspecialchars($_POST["password"]) == htmlspecialchars($_POST["confirm_password"])) {
                    if (strlen(htmlspecialchars($_POST["login"])) >= 3 && strlen(htmlspecialchars($_POST["password"])) >= 6 && preg_match("/[A-Z]/", htmlspecialchars($_POST["password"])) && preg_match("/[a-z]/", htmlspecialchars($_POST["password"])) && preg_match("/[0-9]/", htmlspecialchars($_POST["password"])) && preg_match("/^([A-Za-z0-9]+)+\@([A-Za-z0-9]+)+\.[A-Za-z]{2,4}$/", htmlspecialchars($_POST["email"]))) {
                        $user = new Users([
                                'login' => htmlspecialchars($_POST['login']),
                                'password' => password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT),
                                "email" => htmlspecialchars($_POST['email'])
                            ]);


                        if (isset($_POST['id'])) {
                            $user->setId(htmlspecialchars($_POST['id']));
                        }

                        if ($user->isValid()) {
                            $users->save($user);

                            session_start();
                            $_SESSION["login"] = $user->login();
                            $_SESSION["email"] = $user->email();
                            $_SESSION["id"] = $user->id();
                            $_SESSION["admin"] = $user->admin();
                            echo "Success";
                        }
                    }
                }
            }
        }
    }

	public function deleteUser() {
        include __DIR__ . "/variableController.php";

        if (isset($_GET["delete-user"])) {
            session_destroy();
            $users->delete(htmlspecialchars((int) $_GET["delete-user"]));
            echo "<script>location.href='../Pages/index.php';</script>";
            exit;
        }
    }

    public function updateUser() {
        include __DIR__ . "/variableController.php";
        if (isset($_GET["login"])) {
            $user = $users->get(htmlspecialchars($_GET["login"]));
        }

        if (isset($_POST["password_infoUser"]) && isset($_POST["confirm_password_infoUser"])) {
            $users->updatePassword($user->id());
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit();
        }
    }

    public function connexionUser() {
        include __DIR__ . "/variableController.php";

        if (!empty($_POST['login_connexion']) && !empty($_POST['password_connexion'])) {
            $user = $users->get(htmlspecialchars($_POST["login_connexion"]));

            if ($users->get($_POST["login_connexion"])) {
                if (isset($_POST["password_connexion"]) && password_verify(htmlspecialchars($_POST['password_connexion']), $user->password())) {
                    session_start();
                    $_SESSION["login"] = $user->login();
                    $_SESSION["email"] = $user->email();
                    $_SESSION["id"] = $user->id();
                    $_SESSION["admin"] = $user->admin();
                    echo "Success";
                } else {
                    echo "Failed";
                }
            } else {
                echo "Failed";
            }
        }
    }
}

require_once __DIR__ . "/pageController.php";