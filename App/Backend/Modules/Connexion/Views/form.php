<div class="form-group">
    <label for="login" class="cols-sm-2 control-label">Pseudo</label>
    <div class="cols-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
            <input type="text" class="form-control" name="login" id="login"  placeholder="Pseudo"/>
        </div>
        <p id="incorrect_login">Le pseudo doit comporter au moins 6 caractères</p>
    </div>
</div>

<div class="form-group">
    <label for="password" class="cols-sm-2 control-label">Password</label>
    <div class="cols-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" name="password" id="password"  placeholder="Mot de passe"/>
        </div>
        <p id="incorrect_password">Le mot de passe doit comporter au moins une majuscule, un minuscule et un chiffre</p>
    </div>
</div>

<div id="incorrect_connexion">Le pseudo ou le mot de passe sont incorrect</div>
