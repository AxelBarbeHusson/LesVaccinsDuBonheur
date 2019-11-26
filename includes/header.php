<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
        $bonjour = $_SESSION['prenom'] . " " . $_SESSION['nom'];
    }
} else {
    unset($bonjour);
}
?>
<body>

<header class="page-header">
    <div class="wrap">
      <div class="log">
        <img id="logo" src="assets/img/logov2.png" alt="logo">
        <h4 id="titre">Carnax<br>Les vaccins connectés</h4>
      </div>
      <div class="icones">
        <div class="">
          <img src="assets/img/tel.png" alt="">
          <p>Téléphone: 02 35 63 14 14</p>
        </div>
        <div class="">
          <img src="assets/img/iconemail.png" alt="">
          <p>E Mail: carnax@outlook.com</p>
        </div>

      </div>
    </div>
      <div class="clear"></div>

        <nav>
            <ul class="nav navbar">
                <li><a href="index.php?page=acceuil">Home</a></li>
                <li><a href="index.php?page=rendezVous" title="">Rendez-vous</a></li>
                <li><a href="index.php?page=etatvaccins" title="">Etat Vaccins</a></li>
                <li><a href="index.php?page=vaccinspourvoyage" title="">Vaccins pour voyages</a></li>
                <li><a target="_blank"
                   href="https://solidarites-sante.gouv.fr/IMG/pdf/calendrier_vaccinal_maj_17avril2019.pdf">Liens
                    vaccins</a></li>
                <li><a href="index.php?page=login">Login</a></li>
                <li><a>Inscriptions</a></li>
                <?php




        if (ifLogged()) {

            echo '<li><a>Mon compte</a></li>';
            echo '<li class="nav-item"><a href="index.php?page=logout" class="nav-link js-scroll-trigger">Logout</a></li>';
        } elseif (idAdmin()) {

                    echo '<li><a href="index.php?page=admin" >Pannel Admin</a></li>';
                    echo '<li><a href="index.php?page=logout" >Logout</a></li>';
                }

        ?>
            </ul>

        </nav>


    <div class="clear"></div>

    <section >
        <img id="imagemed" src="assets/img/medimg.jpg" alt="">

    </section>

</header>
<div>