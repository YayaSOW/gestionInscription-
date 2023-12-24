<?php
    function getAllClasses() : array {
        return fromJsonToArray("classes");
    }

    function getAllAnnees() : array {
        return fromJsonToArray("annees");
    }

    function getALLEtudiants() : array {
        $users = fromJsonToArray("users");
        $etudiants=[];
        foreach($users as $user){
            if ($user["role"]=="ROLE_ETUDIANT") {
                $etudiants[] = $user;
            }
        }
        return $etudiants;

    }

    function getAllDemandes() : array {
        return fromJsonToArray("demandes");
    }

    function connexion(string $login,string $password) : array|null {
        $etudiants=getALLEtudiants();
        foreach ($etudiants as $value){
            if ($value["login"]==$login && $value["password"]==$password) {
                return $value;
            };
        }
        return null;
    };

    function getAnneeEncours() : array|null {
        $annees=getAllAnnees();
        foreach ($annees as $value){
            if ($value["etat"]==1) {
                return $value;
            };
        }
        return null;
    };

    function getDemandeByEtudiantAndAnneeEncours(int $etudianId,int $anneeId, $etat="All") : array|null {
        $demandes=getAllDemandes();
        $demandeEtu=[];
        foreach ($demandes as $value){
            if ($etat=="All") {
                if ($value["etudiant_id"]==$etudianId && $value["annee_id"]==$anneeId) {
                    $demandeEtu[]=$value;
                }
            }else{
                if ($value["etudiant_id"]==$etudianId && $value["annee_id"]==$anneeId && $value["etat"]==$etat) { 
                    $demandeEtu[]=$value;
                }
            } 
            };
        return $demandeEtu;
    };

    function addDemande(array $demande) : void {
        fromArrayToJson("demandes",$demande);
    }
?>