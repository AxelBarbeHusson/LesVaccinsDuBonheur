<?php

$errors = array();
$success = false;

//if (!empty ($_GET['Id_Users']) && is_numeric($_GET['Id_Users'])) {

    //debug($citys);
    //if (!empty($users)) {
        if (!empty($_POST['submitted'])) {
            //debug($_POST);
            $nom = isset($_POST['nom']) ? clean($_POST['nom']) : "";
            $prenom = isset($_POST['prenom']) ? clean($_POST['prenom']) : "";
            $mail = isset($_POST['mail']) ? clean($_POST['mail']) : "";
            $mdp = isset($_POST['mdp']) ? clean($_POST['mdp']) : "";
            $errors = textWalid($errors, $nom, 'nom', 2, 200);
            $errors = textWalid($errors, $prenom, 'prenom', 2, 200);


            // no error
            if (count($errors) == 0) {
                // insert into
                $id = $_SESSION['login']['id'];
                $success = true;

                $sql = "UPDATE t_users
               SET USENOM = :nom, USEPRENOM = :prenom, USEMAIL = :mail, USEPASSWORD = :password, modifAt = NOW()
               WHERE Id_Users = $id";
                $query = $pdo->prepare($sql);
                $query->bindValue(':nom', $nom, PDO::PARAM_STR);
                $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                $query->bindValue(':mail', $mail, PDO::PARAM_STR);
                $query->bindValue(':password', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);

                $query->execute();


            }
        }





    debug($_SESSION);
    $id = $_SESSION['login']['id'];

//Select=colonne; FROM= table; WHERE -> col1 = valeur; AND col2 = valeur2; ORDER BY = col ASC/DESC ; LIMIT = combien;
    $sql = "SELECT * FROM t_users 
            WHERE Id_Users = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetch();

    ?>
    <form method="post" action="">
        <fieldset>
            <div>
                <label for="nom">Votre nom :</label>
                <input type="text" id="nom" name="nom" value="">

            </div>
            <div>
                <label for="prenom">Votre prenom :</label>
                <input type="text" id="prenom" name="prenom" value="">

            </div>
            <div>
                <label for="mail">Votre mail :</label>
                <input type="email" id="mail" name="mail" value="">

            </div>
            <div>
                <label for="mdp">Votre mot de passe :</label>
                <input type="password" id="mdp" name="mdp" value="">

            </div>

            <div>
                <input class="blue_button" name="submitted" type="submit" value="Envoyer"/>
                <input class="blue_button" type="reset" value="Effacer"/>
            </div>
        </fieldset>
        <input type="hidden" name="test"/>
    </form>


