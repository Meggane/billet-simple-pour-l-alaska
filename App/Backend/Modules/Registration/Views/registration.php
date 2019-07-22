<?php

require_once "../../../../../Model/PDOFactory.php";

require_once "../../../../../Model/UsersManagerPDO.php";

$db = PDOFactory::getMysqlConnexion();
$manager = new UsersManagerPDO($db);

if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]) && isset($_POST["email"]) && !empty($_POST["password"]) && $_POST["password"] == $_POST["confirm_password"]) {
    if (strlen($_POST["login"]) < 3 || strlen($_POST["password"]) < 6 || !preg_match("/([A-Z]+)([a-z]+)([0-9])/", $_POST["password"]) || !preg_match("/^([A-Za-z0-9]+)+\@([A-Za-z0-9]+)+\.[A-Za-z]{2,4}$/", $_POST["email"])) {
        $previousPage = $_SERVER["HTTP_REFERER"];
        header("Location: registration.php");
    } else {
        $user = new Users([
                'login' => $_POST['login'],
                'password' => password_hash($_POST["password"], PASSWORD_DEFAULT),
                "email" => $_POST['email']
            ]);

        if (isset($_POST['id'])) {
            $user->setId($_POST['id']);
        }

        if ($user->isValid()) {
            $manager->save($user);
            $previousPage = $_SERVER["HTTP_REFERER"];
            header("Location: $previousPage");
            include __DIR__ . "/../../Connexion/Views/connexion_post.php";
        } else {
            $errors = $user->errors();
        }
    }
}
?>


<div id="registration_form">
	<div class="container">
		<div class="row main">
			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="../../../../../App/Backend/Modules/Registration/Views/registration.php">
					<a href="javascript:void(0)" id="closebtn" onclick="form.closeFormRegistration()">&times;</a>
					<h2>Inscription</h2>
					<div class="form-group">
						<label for="login" class="cols-sm-2 control-label">Pseudo</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="login" id="login"  placeholder="Pseudo"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-at"></i></span>
								<input type="email" class="form-control" name="email" id="email"  placeholder="Email"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-lock"></i></span>
								<input type="password" class="form-control" name="password" id="password"  placeholder="Mot de passe"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="confirm_password" class="cols-sm-2 control-label required">Confirm Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-lock"></i></span>
								<input type="password" class="form-control" name="confirm_password" id="confirm_password"  placeholder="Confirmation mot de passe"/>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Je m'inscris">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>