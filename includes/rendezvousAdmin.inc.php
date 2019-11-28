<?php

$title = 'Les rendez-vous';
$sql   = "SELECT * FROM t_test";
$query = $pdo->prepare($sql);
$query->execute();
$vaccins = $query->fetchAll();
//debug($vaccins);
?>

<h1>Rendez-vous</h1>
<?php foreach ($vaccins as $vaccin) { ?>
    <div class="vaccin">
        <h2><?php echo $vaccin['USENOM']; ['USEPRENOM'] ?></h2>
        <p>Email :       <?= $vaccin['USEMAIL']; ?></p>
        <p>Téléphone :   <?= $vaccin['USEPHONE']; ?></p>
        <p>Code postal : <?= $vaccin['USECPOSTAL']; ?></p>
        <p>Adresse :     <?= $vaccin['USEAPOSTAL']; ?></p>
        <p>Ville :       <?= $vaccin['USEVILLE']; ?></p>
        <p>Message :     <?= $vaccin['USEMESSAGE']; ?></p>
        <p>Sujet :       <?= $vaccin['USESUJET']; ?></p>
        <p>Date du Rdv : <?= $vaccin['USEDATE']; ?></p>
    </div>
<?php } ?>
