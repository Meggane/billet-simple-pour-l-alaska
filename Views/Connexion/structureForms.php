<div class="form-group">
    <label for="<?= $loginName ?>" class="cols-sm-2 control-label">Pseudo</label>
    <div class="cols-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
            <input type="text" class="form-control" name="<?= $loginName ?>" id="<?= $loginName ?>"  placeholder="Pseudo"/>
        </div>
        <p id="<?= $incorrectLoginName ?>">Le pseudo doit comporter au moins 3 caractères</p>
    </div>
</div>

<div class="form-group">
    <label for="<?= $passwordName ?>" class="cols-sm-2 control-label">Password</label>
    <div class="cols-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" name="<?= $passwordName ?>" id="<?= $passwordName ?>"  placeholder="Mot de passe"/>
        </div>
        <p id="<?= $incorrectPasswordName ?>">Le mot de passe doit comporter au moins 6 caractères dont une majuscule, une minuscule et un chiffre</p>
    </div>
</div>
