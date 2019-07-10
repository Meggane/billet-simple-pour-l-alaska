<div id="registration_form">
	<div class="container">
		<div class="row main">
			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="#">
					<a href="javascript:void(0)" id="closebtn" onclick="form.closeFormRegistration()">&times;</a>
					<h2>Inscription</h2>
					<div class="form-group">
						<label for="pseudo" class="cols-sm-2 control-label">Pseudo</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="pseudo" id="pseudo"  placeholder="Pseudo"/>
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