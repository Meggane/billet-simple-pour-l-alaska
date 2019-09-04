<div id="registration_form">
    <div class="container">
        <div class="row main">

            <div class="main-login main-center">
                <form class="form-horizontal" method="post" action="../../../../../Controller/UsersController.php">

                    <a href="javascript:void(0)" id="closebtn" onclick="form.closeFormRegistration()">&times;</a>
                    <h2 class="title_form">Inscription</h2>

                    <div class="form-group">
                        <label for="login" class="cols-sm-2 control-label">Pseudo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="login" id="login"  placeholder="Pseudo"/>
                            </div>
                            <p id="incorrect_login">Le pseudo doit comporter au moins 3 caractères</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Mot de passe"/>
                            </div>
                            <p id="incorrect_password">Le mot de passe doit comporter au moins une majuscule, une minuscule et un chiffre</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password" class="cols-sm-2 control-label required">Confirm Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password"  placeholder="Confirmation mot de passe"/>
                            </div>
                            <p id="incorrect_confirm_password">Les mots de passe doivent être identiques</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="Email"/>
                            </div>
                            <p id="incorrect_email">Veuillez indiquer un email valide</p>
                        </div>
                    </div>

                    <div class="form-group ">
                        <input id="tag_registration_submit" type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Je m'inscris">
                    </div>
                </form>
                <div id="connexion_link" onclick="form.openFormConnexion()">
                    <a href="#">Déjà membre ?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../../../../Public/js/registration.js"></script>