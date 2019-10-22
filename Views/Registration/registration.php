<?php
$loginName = "login";
$passwordName = "password";
$incorrectLoginName = "incorrect_login";
$incorrectPasswordName = "incorrect_password";
?>

<div id="registration_form">
    <div class="container">
        <div class="row main">
            <div class="presentation_forms_paysage main-login main-center">
                <form class="form-horizontal" method="post" action="../../Controller/UsersController.php">
                    <a class="closebtn_form" href="javascript:void(0)" id="closebtn" onclick="form.closeFormRegistration()">&times;</a>
                    <h2 class="title_form">Inscription</h2>

                    <?php include __DIR__ . "/../Connexion/structureForms.php" ?>

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

                    <div id="email_registration" class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="Email"/>
                            </div>
                            <p id="incorrect_email">Veuillez indiquer un email valide</p>
                        </div>
                    </div>

                    <div id="submit_registration" class="form-group ">
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

<script src="../../Public/js/registration.js"></script>