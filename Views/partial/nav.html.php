    <nav>
        <div class="nav">
            <div class="im">
                <img src="<?=WEBROOT?>/img/petit.jpg" alt="" class="petit">
                <div class="sp">
                    <span class="nom"><?=$etudiantConnect["nom"]." ".$etudiantConnect["prenom"]?></span>
                    <span class="date"><?=$anneeEncours["nom"]?></span>
                </div>
            </div>
            <div class="etu">
                <img src="<?=WEBROOT?>/img/logo (2).png" alt="" class="logo">
                <span class="etudiant">Etudiant</span>
            </div>
        </div>
            <legend align="center">L2 GLRS-A</legend>
            <div class="demande">
                <div class="de">
                    <img src="<?=WEBROOT?>/img/demande.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=liste" class="dee">
                        <span >Demande</span>
                    </a>
                </div>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/a.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=add" class="dee">
                        <span >Nouveau</span>
                    </a>
                </div>
            </div>
    </nav>