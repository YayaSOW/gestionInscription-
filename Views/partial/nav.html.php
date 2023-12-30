    <nav>
        <div class="nav">
            <div class="im">
                <img src="<?=WEBROOT?>/img/petit.jpg" alt="" class="petit">
                <div class="sp">
                    <span class="nom"><?=$_SESSION["userConnect"]["nom"]." ".$_SESSION["userConnect"]["prenom"]?></span>
                    <span class="date"><?=$_SESSION["anneeEncours"]["libelle"]?></span>
                </div>
            </div>
            <div class="etu">
                <img src="<?=WEBROOT?>/img/logo (2).png" alt="" class="logo">
                <span class="etudiant"><?=$_SESSION["userConnect"]["role"]?></span>
            </div>
        </div>
        <?php if($_SESSION['userConnect']["role"] == "ROLE_ETUDIANT"): ?>
            <legend align="center"><?=$_SESSION["anneeEncours"]["libelle"]?></legend>
        <?php endif?>
            <div class="demande">
                <!-- Demande des etudiants -->
                <?php if($_SESSION['userConnect']["role"] == "ROLE_ETUDIANT"): ?>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/demande.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=liste" class="dee">
                        <span >Demande</span>
                    </a>
                </div>
                <?php endif?>

                <!-- Demande de AC -->
                <?php if($_SESSION['userConnect']["role"] == "ROLE_AC"): ?>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/demande.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=liste-ac" class="dee">
                        <span >Demande</span>
                    </a>
                </div> 
                <?php endif?>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/a.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=add" class="dee">
                        <span >Nouveau</span>
                    </a>
                </div>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/deco.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=logout" class="dee">
                        <span >Deconnexion</span>
                    </a>
                </div>
            </div>
    </nav>