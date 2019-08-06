<div id="connexion_form">
	<div class="container">
		<div class="row main">		
			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="../../../../Backend/Modules/Connexion/Views/connexion_post.php">						
					<a href="javascript:void(0)" id="closebtn" onclick="form.closeFormConnexion()">&times;</a>
					<h2 class="title_form">Connexion</h2>						
					
					<?php include __DIR__ . "/form.php" ?>

					<div class="form-group ">
						<input id="tag_connexion_submit" type="submit" class="btn btn-primary btn-lg btn-block login-button" onclick="connexion.connexionValid()" VALUE="Connexion">
					</div>
				</form>
                <div id="registration_link" onclick="form.openFormRegistration()">
                    <a href="#">Pas encore membre ?</a>
                </div>
			</div>
		</div>
	</div>		
</div>

<script src="../../../../../Public/js/connexion.js"></script>