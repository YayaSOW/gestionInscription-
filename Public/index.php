<?php
    define("WEBROOT","http://localhost:8000/");
    define("DB","../bd(Base Donnee)/ges_inscription.json");
    require_once("../bd(Base Donnee)/convert.php");
    require_once("../Model(repository)/demande.model.php");
    $anneeEncours=getAnneeEncours();
    $etudiantConnect=connexion("etudiant@gmail.com","passer123");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande</title>
    <link rel="stylesheet" href="<?=WEBROOT?>style.css">
</head>
<body>
    <?php
    require_once("../Views/partial/nav.html.php");
    if (isset($_GET["action"])) {
        if ($_GET["action"]=="add") {
            require_once("../Views/add.html.php");
        }elseif ($_GET["action"]=="liste") {
            $demandes=getDemandeByEtudiantAndAnneeEncours(1,$anneeEncours["id"]);
            require_once("../Views/liste.html.php");
        }
    }
else{
    if (isset($_POST["action"])) {
        if ($_POST["action"]=="form-filtre-demande") {
            $etat=$_POST["etat"];
            // $new=$etat;
            $demandes=getDemandeByEtudiantAndAnneeEncours(1,$anneeEncours["id"],$etat);
            require_once("../Views/liste.html.php");
        // var_dump( $_POST["etat"]=$etat);
        }
        // form-add-demande
        if ($_POST["action"]=="form-add-demande") {
            $newDemande=[
                "id"=>bin2hex(random_bytes(2)),
                "type"=>$_POST["type"],
                // "date"=>"12/01/2023",
                // "date"=>new DateTime("2000-01-12"),
                "date"=>date("d-m-Y"),
                "motif"=>$_POST["motif"],
                "etudiant_id"=>$etudiantConnect["id"],
                "annee_id"=>$anneeEncours["id"],
                "etat"=>"Encours"
            ];
            addDemande($newDemande);
            $demandes=getDemandeByEtudiantAndAnneeEncours(1,$anneeEncours["id"]);
            require_once("../Views/liste.html.php");
    
        }
    }else{
        $demandes=getDemandeByEtudiantAndAnneeEncours(1,$anneeEncours["id"]);
        require_once("../Views/liste.html.php");
    }
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
