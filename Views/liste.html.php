<div class="bod">
        <fieldset class="container">
            <legend align="center">Mes Demandes</legend>
            <form action="<?=WEBROOT?>" method="post" class="click1">
                <span class="etat">Etat</span>
                <select name="etat" id="">
                    <option value="All"><?=$etat?></option>
                    <option value="Accepte">Acceptée</option>
                    <option value="Encours">En Cours</option>
                    <option value="Rejeter">Rejeter</option>
                </select>
                <button type="submit" name="action" value="form-filtre-demande">Ok</button>
            </form>
            <div class="tab">
                <div class="table">
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Etat</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($demandes as $value): ?>
                            <tr>
                                <td><?=$value["date"]?></td>
                                <td><?=$value["type"]?></td>
                                <td><?=$value["etat"]?></td>
                                <td><a href="wire 3 Etudiant.html">Détails?</a></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
                <div class="page">
                <a href="wire 1 Etudiant.html" class="li">
                    <span>&laquo; Precedent &raquo;</span>
                </a>
                <div class="link">
                    <a href="wire 1 Etudiant.html" class="active">1</a>
                    <a href="wire 1,1 Etudiant.html" class="">2</a>
                    <a href="wire 1,2 Etudiant.html" class="">3</a>
                    <a href="wire 1,3 Etudiant.html" class="">4</a>
                </div>
                <a href="wire 1,1 Etudiant.html" class="li">
                    <span>&laquo; Suivant &raquo;</span>
                </a>
            </div>
        </fieldset>
    </div>
