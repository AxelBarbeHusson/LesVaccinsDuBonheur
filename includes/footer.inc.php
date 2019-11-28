<?php
$date = date('Y');
?>
</div>
<div class="clear">

</div>
<footer class="page-footer">
    <div class="wrap">

        <div class="columns">
            <div class="column">
                <h3 class="column-title">Contactez-nous</h3>
                <!--        <img src="img/footer-logo.png" alt="Wonder" ><br><br>-->
                <address>
                    <strong>Nfactory School</strong><br>
                    24 Place Saint Marc, <br>
                    76000, Rouen.<br>
                </address>
                <ul class="social-icons">
                    <li><a href="#" class="facebook"></a></li>
                    <li><a href="#" class="twitter"></a></li>
                </ul>
            </div>


            <div class="column">
                <h3 class="column-title">Latest Tweets</h3>
                <ul class="tweets">
                    <li><a href="#">@Corgi_</a> Site très pratique </li>
                    <li><a href="#">@Caniche_</a> Je recommande pour toute la famille</li>
                    <li><a href="#">@Cocker_</a> Super pour préparer son voyage</li>
                </ul>
            </div>

            <div class="column">
                <h3 class="column-title">Derniers posts</h3>
                <ul class="post-list">
                    <li><a href="#">Les vaccins c'est trop bien</a></li>
                    <li><a href="#">La santé ça fait plaisir</a></li>
                </ul>
            </div>


            <!--  --><div class="clear">

            </div>
        </div><!-- .columns -->

        <div class="bottom-bar">
            <p>&copy; <?= $date ?> - NFactory Corp.</p>
            <nav>
                <ul class="footernav">
                    <li><a href="index.php?page=acceuil">Home</a></li>
                    <li><a href="index.php?page=rendezVous" title="">Rendez-vous</a></li>
                    <li><a href="index.php?page=etatvaccins" title="">Etat Vaccins</a></li>
                    <li><a href="index.php?page=vaccinspourvoyage" title="">Vaccins pour voyages</a></li>
                    <li><a href="index.php?page=cgu">CGU</a></li>
                    <a target="_blank" href="https://solidarites-sante.gouv.fr/IMG/pdf/calendrier_vaccinal_maj_17avril2019.pdf">Liens vaccins</a>
                </ul>

            </nav>

        </div>

    </div>
</footer>
<script src="assets/js/jquery.js" type="text/javascript"></script>

<script type="text/javascript">
    var macouleur=""
</script>
<script src="assets/js/pluie.js" type="text/javascript"></script>
</body>
</html>
