<div id="connexion_form">
    <div class="container">
        <div class="row main">

            <div class="main-login main-center">
                <form class="form-horizontal" method="post" action="../../../../../Controller/UsersController.php">

                    <a href="javascript:void(0)" id="closebtn" onclick="form.closeFormConnexion()">&times;</a>
                    <h2 class="title_form">Connexion</h2>

                    <div class="form-group">
                        <label for="login_connexion" class="cols-sm-2 control-label">Pseudo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="login_connexion" id="login_connexion"  placeholder="Pseudo"/>
                            </div>
                            <p id="incorrect_login_connexion">Le pseudo doit comporter au moins 3 caractères</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_connexion" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="password_connexion" id="password_connexion"  placeholder="Mot de passe"/>
                            </div>
                            <p id="incorrect_password_connexion">Le mot de passe doit comporter au moins une majuscule, une minuscule et un chiffre</p>
                        </div>
                    </div>

                    <div id="incorrect_connexion">Le pseudo ou le mot de passe sont incorrect</div>

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