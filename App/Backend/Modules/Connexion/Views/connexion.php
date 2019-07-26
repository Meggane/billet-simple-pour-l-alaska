<div id="connexion_form">
	<div class="container">
		<div class="row main">		
			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="../../../../Backend/Modules/Connexion/Views/connexion_post.php">						
					<a href="javascript:void(0)" id="closebtn" onclick="form.closeFormConnexion()">&times;</a>
					<h2 class="title_form">Connexion</h2>						
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
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-lock"></i></span>
								<input type="password" class="form-control" name="password" id="password"  placeholder="Mot de passe"/>
							</div>
						</div>
					</div>

					<div class="form-group ">
						<input type="submit" class="btn btn-primary btn-lg btn-block login-button" VALUE="Connexion">
					</div>
				</form>
                <div id="registration_link" onclick="form.openFormRegistration()">
                    <a href="#">Pas encore membre ?</a>
                </div>
			</div>
		</div>
	</div>		
</div>
