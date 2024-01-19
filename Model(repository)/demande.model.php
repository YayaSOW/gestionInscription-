<?php
    function getAllClasses() : array {
        return fromJsonToArray("classes");
    }

    function getAllAnnees() : array {
        return fromJsonToArray("annees");
    }

    function getAllData(string $key) : array {
        return fromJsonToArray($key);
    }
    function getAllUsers() : array {
        return getAllData("users");
    }

    function getAllUsersByRole(string $role) : array {
        $users = getAllUsers();
        $etudiants=[];
        foreach($users as $user){
            if ($user["role"]==$role) {
                $etudiants[] = $user;
            }
        }
        return $etudiants;     
    }

    function getDataById(array $data,int $id) : array|null {
        foreach($data as $value){
            if ($value["id"]==$id) {
                return $value;
            }
        }
        return null;
    }

    function getClassById(int $id) : array|null {
        $classes = getAllClasses();
        return getDataById($classes,$id);
        
    }

    function getAllEtudiants() : array {
        $etudiants = getAllUsersByRole("ROLE_ETUDIANT");
        $etudiantClasse=[];
        foreach($etudiants as $etudiant){
            $classe = getClassById($etudiant["classe_id"]);
            $etudiantClasse[] = array_merge($classe,$etudiant);
        }
        return $etudiantClasse;
    }
    function getEtudiantById(int $id) : array|null {
        $etudiants = getAllEtudiants();
        return getDataById($etudiants,$id);
    }
    function getAllDemandes(int|null $anneeId=null,string $etat="All") : array {
        $demandes = getAllData("demandes");
        if ($anneeId==null)return $demandes; 
            $demandeEtu = [];
            foreach ($demandes as $demande) {
                $etudiant = getEtudiantById($demande["etudiant_id"]);
                if ($demande["annee_id"]==$anneeId) {
                    if ($etat=='All') {
                        $demandeEtu[] = array_merge($etudiant ,$demande) ;
                    }else{
                        if ($demande["etat"]==$etat) {
                            $demandeEtu[] = array_merge($etudiant ,$demande) ;
                        }
                    }
                }
            }
        return $demandeEtu;
    }

    function getDemandeById($anneeId,$id){
        $demandes = getAllDemandes($anneeId);
        return getDataById($demandes,$id);
    }


    function connexion(string $login,string $password) : array|null {
        $users=getAllUsers();
        foreach ($users as $user){
            if ($user["login"]==$login && $user["password"]==$password) {
                return $user;
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
        $demandes=getAllDemandes($anneeId);
        $demandeEtu=[];
        foreach ($demandes as $value){
            if ($etat=="All") {
                if ($value["etudiant_id"]==$etudianId) {
                    $demandeEtu[]=$value;
                }
            }else{
                if ($value["etudiant_id"]==$etudianId && $value["etat"]==$etat) { 
                    $demandeEtu[]=$value;
                }
            } 
            };
        return $demandeEtu;
    };

    function addDemande(array $demande) : void {
        fromArrayToJson("demandes",$demande);
    }

    function newId(array $tab) : int {
        $newId=count($tab)+1;
        return $newId;
    }
    // function ajoutClass(array $newclass ) {
    //     $allData=fromJsonToArray();
    //     $class=getAllClasses();
    //     $class[] = $newclass;
    //     $allData["classes"] = $class;
    //     fromArrayToJson($allData);
    // }
    function ajoutClass(array $demande) : void {
        fromArrayToJson("classes",$demande);
    }
?>