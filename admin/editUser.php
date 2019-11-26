<?php
include('./pdo.php');
include('../functions/textWalid.php');
include('../functions/clean.php');
include('../functions/debug.php');
$title = 'Add user';

$errors = array();
$success = false;



//pré remplissage
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    //request
    $sql = "SELECT * FROM t_users
            WHERE Id_Users = $id ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetch();
    debug($users);
    echo 'ICI';
    if(empty($users)) {
        die('404');
    } else {
        // Traitement du formulaire
        if (!empty($_POST['submitted'])) { // formulaire soumis ?
            //Faille XSS
            $nom = clean($_POST['nom']);
            $prenom = clean($_POST['prenom']);
            $mail = clean($_POST['mail']);
            $psw = clean($_POST['psw']);


        //    $errors = textWalid($errors, $nom, 'nom', 2, 100);
        //    $errors = textWalid($errors, $district, 'district', 2, 100);
//    $errors = charValidate($errors, $code, 'code',3);
            if(!empty($code)) {
                if(mb_strlen($code) != 3 ) {
                    $errors['code'] = 'Veuillez rentrer 3 caractères';
                }
            } else {
                $errors['code'] = 'Veuillez renseigner ce champ';
            }


            //no error
            if(count($errors) ==0) {
                //insert into
                $success = true;
                //die('ok bro');
                $sql = "UPDATE t_users
                SET USENOM = :name,
                    USEPRENOM = :prenom,
                    USEMAIL = :mail,
                    USEPASSWORD=  :psw
                WHERE Id_Users = $id";
                $query = $pdo->prepare($sql);
                $query->bindValue(':name', $nom, PDO::PARAM_STR);
                $query->bindValue(':prenom', strtoupper($code), PDO::PARAM_STR);
                $query->bindValue(':mail', $district, PDO::PARAM_STR);
                $query->bindValue(':psw', $population, PDO::PARAM_INT);
                $query->execute();
                $msg = "Utilisateur maj";
                $sujet = "Validation de l'ajout de l'utilisateur";
            }

        }
    }
} else {
    die('404');
}

?>

    <h1>maj utilisateur</h1>
<?php if ($success) { ?>
    <p class="sucess">Bravo !</p>
<?php } else { ?>
    <form action="" method="post" novalidate>
        <label for="nom">Nom de la ville*</label>
        <input type="text" id="nom" name="nom" value="<?php if (isset($_POST['nom'])) { echo $_POST['nom']; } else { echo $users['Name']; } ?>">
        <span class="error"><?php if (!empty ($errors['nom'])) {
                echo $errors['nom'];
            } ?>
                </span>
        <label for="code">Code*</label>
        <input type="text" id="code" name="code" value="<?php if (isset($_POST['code'])) { echo $_POST['code']; } else { echo $city['CountryCode']; } ?>">
        <span class="error"><?php if (!empty ($errors['code'])) {
                echo $errors['code'];
            } ?>
                </span>
        <label for="district">District*</label>
        <input type="text" id="district" name="district"
               value="<?php if (isset($_POST['district'])) { echo $_POST['district']; } else { echo $city['District']; } ?>">
        <span class="error"><?php if (!empty ($errors['district'])) {
                echo $errors['district'];
            } ?>
                </span>
        <label for="district">Population*</label>
        <input type="number" id="population" name="population"
               value="<?php if (isset($_POST['population'])) { echo $_POST['population']; } else { echo $city['Population']; } ?>">
        <span class="error"><?php if (!empty ($errors['population'])) {
                echo $errors['population']; } ?>
    </span>
        <input type="submit" name="submitted" value="Envoyer">
    </form>
    <?php debug($_POST);
} ?>


<?php include('inc/footer.php');?>

