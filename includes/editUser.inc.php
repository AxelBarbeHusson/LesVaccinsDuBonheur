<?php

$errors = array();
$success = false;
if (!empty($_SESSION['login']['role'] === 'Admin')) {



        // request
        $sql = "SELECT * FROM t_users";
        $query = $pdo->prepare($sql);
        $query->execute();
        $editUsers = $query->fetch();

        if (!empty($editUsers)) {

            if (!empty($_POST['submitted'])) {
                // Faille XSS
                //debug($_POST);
                $nom = clean($_POST['nom']);
                $prenom = clean($_POST['prenom']);
                $mail = clean($_POST['mail']);

                // no error
                if (count($errors) == 0) {
                    // insert into
                    $success = true;
                    // UPDATE SQL
                    $sql = "UPDATE t_users
          SET USENOM = :nom, USEPRENOM = :prenom, USEMAIL = :mail";
                    $query = $pdo->prepare($sql);
                    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
                    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                    $query->bindValue(':mail', $mail, PDO::PARAM_STR);
                    $query->execute();

                }
            }

        } else {
            die('404');

    }

    ?>

    <?php if ($success) { ?>
        <p>Bravo ma biche</p>
    <?php } else {


        ?>
        <form class="form-wrap" action="" method="post">
            <fieldset>
                <label for="nom">Nom à modifier*</label>
                <input type="text" id="nom" name="nom" value="<?php if (!empty($_POST['nom'])) {
                    echo $_POST['nom'];
                }
                ?>">
                <span class="error"><?php if (!empty($errors['nom'])) {
                        echo $errors['nom'];
                    } ?></span>

                <label for="prenom">Prenom à modifier*</label>
                <input type="text" id="prenom" name="prenom" value="<?php if (!empty($_GET['prenom'])) {
                    echo $_GET['prenom'];
                }
                ?>">
                <span class="error"><?php if (!empty($errors['prenom'])) {
                        echo $errors['prenom'];
                    } ?></span>

                <label for="mail">Mail à modifier*</label>
                <input type="text" id="mail" name="mail" value="<?php if (!empty($_GET['mail'])) {
                    echo $_GET['mail'];
                } ?>">
                <span class="error"><?php if (!empty($errors['mail'])) {
                        echo $errors['mail'];
                    } ?></span>

            </fieldset>
            <input type="submit" name="submitted" value="Envoyer">

        </form>
    <?php }
} else {
    echo "Erreur 403, vous n'avez pas accès a cette fonctionnalité";
} ?>