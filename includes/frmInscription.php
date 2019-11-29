<?php
if (!isset($nom)) $nom = "";
if (!isset($prenom)) $prenom = "";
if (!isset($date)) $date = "";

if (!isset($mail)) $mail = "";
if (!isset($role)) $role = "";

?>




<form method="post" class="form-wrap" action="index.php?page=inscriptions">
    <h2>Inscription</h2>
    <div>
        <label for="nom">Nom&nbsp;: </label>
        <input type="text" id="nom" name="nom" value="<?= $nom ?>"/>
    </div>
    <div>
        <label for="prenom">Prénom&nbsp;: </label>
        <input type="text" id="prenom" name="prenom" value="<?= $prenom ?>"/>
    </div>
    <div>
        <label for="date">Date de naissance :</label>
        <input type="date" id="date" name="date" value="<?= $date ?>"/>
    </div>
    <div>
        <label for="mail">Mail&nbsp;: </label>
        <input type="text" id="mail" name="mail" value="<?= $mail ?>"/>
    </div>
    <div>
        <label for="mdp">Mot de passe&nbsp;: </label>
        <input type="password" id="mdp" name="mdp"/>
    </div>

    <div>
        <input type="hidden"  value="<?php $role = 'Users'?>">
    </div>
    <div>

        <input type="radio">
        <a target="_blank" href="index.php?page=cgu">Accepté les CGU</a><span> & </span><a target="_blank" href="index.php?page=mentionsLegales">les Mentions légales</a>
    </div>
    <div>
        <input type="submit" value="Envoyer">
        <input type="reset" value="Reset">
    </div>
    <input type="hidden" name="maurice"/>
</form>