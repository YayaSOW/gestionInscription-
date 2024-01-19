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
                <!-- Autorisation des etudiants -->
                <?php if($_SESSION['userConnect']["role"] == "ROLE_ETUDIANT"): ?>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/demande.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=liste" class="dee">
                        <span >Demande</span>
                    </a>
                </div>
                <?php endif?>

                <!-- Autorisation de AC -->
                <?php if($_SESSION['userConnect']["role"] == "ROLE_AC"): ?>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/demande.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=liste-ac" class="dee">
                        <span >Demande</span>
                    </a>
                </div> 
                <?php endif?>
                <?php if(($_SESSION['userConnect']["role"] == "ROLE_AC") or ($_SESSION['userConnect']["role"] == "ROLE_ETUDIANT")): ?>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/a.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=add" class="dee">
                        <span >Nouveau</span>
                    </a>
                </div>
                <?php endif?>
                <!-- Autorisation de RP -->
                <?php if($_SESSION['userConnect']["role"] == "ROLE_RP"): ?>
                <div class="de">
                    <img src="../img/cl.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=listeclass" class="dee">
                        <span>Lister Les Classes</span>
                    </a>
                </div>
                <div class="de">
                    <img src="../img/pr.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=listeprof" class="dee">
                        <span >Lister Les Professeur</span>
                    </a>
                </div>
                <div class="de">
                    <img src="../img/demande.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=traitedemande" class="dee">
                        <span >Traiter Les Démandes</span>
                    </a>
                </div>
                <?php endif?>
                <div class="de">
                    <img src="<?=WEBROOT?>/img/deco.jpg" alt="" class="logo1">
                    <a href="<?=WEBROOT?>?action=logout" class="dee">
                        <span >Deconnexion</span>
                    </a>    
                </div>
            </div>
    </nav>