<?php
    session_start(); 
    define("WEBROOT","http://localhost:7000/");
    define("DB","../bd(Base Donnee)/ges_inscription.json");
    require_once("../bd(Base Donnee)/convert.php");
    require_once("../Model(repository)/demande.model.php");
    $etat = 'All';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande</title>
    <link rel="stylesheet" href="<?=WEBROOT?>/style/style.css">
    <link rel="stylesheet" href="<?=WEBROOT?>/style/connexion.css">
</head>
<body>
    <?php
    if (isset($_REQUEST["action"])) {
        require_once("../Views/partial/nav.html.php");
        if($_REQUEST["action"]=="form-login"){
            $login=$_POST['email'];
            $password=$_POST['password'];
            $userConnect=connexion($login,$password);
            // var_dump($userConnect);
            if ($userConnect==null) {
                header("location:".WEBROOT);
            }else{
                $_SESSION["userConnect"]=$userConnect;
                $_SESSION["anneeEncours"]=getAnneeEncours();
                if ($_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT") {
                    $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
                    // header("location:".WEBROOT."?action=liste");
                    require_once("../Views/demandes/liste.html.php");
                    }elseif ($_SESSION["userConnect"]["role"]=="ROLE_AC") {
                        // header("location:".WEBROOT."?action=liste-ac");
                        $demandes=getAllDemandes($_SESSION["anneeEncours"]["id"]);
                        require_once("../Views/demandes/liste.ac.html.php");
                    }else{
                        $classes=getAllClasses();
                        require_once("../Views/demandes/RP/liste_class.rp.html.php");
                    }
            }
        }      
        elseif ($_REQUEST["action"]=="add") {
            require_once("../Views/demandes/add.html.php");
        }elseif ($_REQUEST["action"]=="liste-ac") {
            $demandes=getAllDemandes($_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/liste.ac.html.php");
        }
        elseif ($_REQUEST["action"]=="detail-demande") {
            $demandeId = $_GET["demande_id"];
            $demande = getDemandeById($_SESSION["anneeEncours"]["id"],$demandeId );
            require_once("../Views/demandes/detail.html.php");
        }
        elseif ($_REQUEST["action"]=="liste") {
            $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/liste.html.php");
        }
        elseif ($_REQUEST["action"]=="listeclass") {
            $classes=getAllClasses();
            // $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/RP/liste_class.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="listeprof") {
            // $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/RP/liste_prof.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="traitedemande") {
            // $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/RP/traiter_demande.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="creerclass") {
            // $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/RP/creer_class.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="valide_ajout_class") {
            $newClass=[
                "id"=>newId(getAllClasses()),
                "filiere"=> $_REQUEST["filiere"],
                "niveau"=> $_REQUEST["niveau"],
                "libelle"=> $_REQUEST["libelle"]
            ];
            ajoutClass($newClass);
            $classes=getAllClasses();
            // header("location:".WEBROOT."?action=listeclass");
            require_once("../Views/demandes/RP/creer_class.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="ajoutprof") {
            // $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/RP/ajout_prof.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="affecterclass") {
            // $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/RP/affecter_class.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="affectermodule") {
            // $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/RP/affecter_module.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="listemodule") {
            // $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"]);
            require_once("../Views/demandes/RP/liste_module.rp.html.php");
        }
        elseif ($_REQUEST["action"]=="logout") {
            unset($_SESSION["userConnect"]);
            unset($_SESSION["anneeEncours"]);
            session_destroy();
            header("location:".WEBROOT);
        }
        elseif ($_REQUEST["action"]=="form-filtre-demande") {
                $etat=$_REQUEST["etat"]; 
                // $new=$etat;
                if ($_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT") {
                    $demandes=getDemandeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"],$_SESSION["anneeEncours"]["id"],$etat);
                    require_once("../Views/demandes/liste.html.php");
                    }elseif($_SESSION["userConnect"]["role"]=="ROLE_AC"){
                        $demandes=getAllDemandes($_SESSION["anneeEncours"]["id"],$etat);
                        require_once("../Views/demandes/liste.ac.html.php");
                    }
                
                // var_dump( $_POST["etat"]=$etat);
        }
        // form-add-demande
        elseif ($_REQUEST["action"]=="form-add-demande") {
            $newDemande=[
                "id"=>bin2hex(random_bytes(2)),
                "type"=>$_REQUEST["type"],
                // "date"=>"12/01/2023",
                // "date"=>new DateTime("2000-01-12"),
                "date"=>date("d-m-Y"),
                "motif"=>$_REQUEST["motif"],
                "etudiant_id"=>$etudiantConnect["id"],
                "annee_id"=>$anneeEncours["id"],
                "etat"=>"Encours"
            ];
            addDemande($newDemande);
            $demandes=getDemandeByEtudiantAndAnneeEncours(1,$anneeEncours["id"]);
            // require_once("../Views/demandes/liste.html.php");
            header("location:".WEBROOT."?action=liste");
        }
        }
    // }
    //
    else{ 
        // $demandes=getDemandeByEtudiantAndAnneeEncours(1,$anneeEncours["id"]);
        require_once("../Views/security/login.html.php");
}


    // if (isset($_POST["action"])) {
    //     $demand=getAllDemandes();
    //     if ($_POST["action"]=="form-filtre-demande") {
    //         if ($_POST["etat"]=="Accepte") {
    //             foreach ($demand as $value) {
    //                 if ($value["etat"]=="Accepte") {
                        
    //                 }
    //             }
    //         }
    //     }
    // }
    ?>

</body>
</html>
