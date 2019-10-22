<?php
$loginName = "login_connexion";
$passwordName = "password_connexion";
$incorrectLoginName = "incorrect_login_connexion";
$incorrectPasswordName = "incorrect_password_connexion";
?>

	<div id="connexion_form">
		<div class="container">
			<div class="row main">
				
				<div class="presentation_forms_paysage main-login main-center">
					<form class="form-horizontal" method="post" action="../../Controller/UsersController.php">
                        <a class="closebtn_form" href="javascript:void(0)" id="closebtn" onclick="form.closeFormConnexion()">&times;</a>
						<h2 class="title_form">Connexion</h2>

                        <?php include "structureForms.php" ?>

                        <div id="incorrect_connexion">Le pseudo ou le mot de passe est incorrect</div>

						<div class="form-group">
							<input id="tag_connexion_submit" type="submit" class="btn btn-primary btn-lg btn-block login-button" VALUE="Connexion">
						</div>
					</form>
                    <div id="registration_link" onclick="form.openFormRegistration()">
                        <a href="#">Pas encore membre ?</a>
                    </div>
				</div>
			</div>
		</div>
	</div>

<script src="../../Public/js/connexion.js"></script>
