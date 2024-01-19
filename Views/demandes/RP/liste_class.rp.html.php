<div class="bod">
        <fieldset class="container">
            <legend align="center">Liste Des Classes</legend>
            <div class="click0">
                <div class="filtre">
                    <span class="etat">Nom & Prenom Prof</span>
                    <input type="text">
                    <button type="submit">Ok</button>
                </div>
            </div>
            <div class="tab">
                <div class="table">
                    <table>
                        <tr>
                            <th>Libelle</th>
                            <th>Filiere</th>
                            <th>Niveau</th>
                        </tr>
                        <?php foreach ($classes as $classe) : ?>
                        <tr>
                            <td><?=$classe["libelle"]?></td>
                            <td><?=$classe["filiere"]?></td>
                            <td><?=$classe["niveau"]?></td>                        
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="Creer">
                    <a href="<?=WEBROOT?>?action=creerclass"><button type="submit">Creer Une Classe</button></a>
                </div>
            </div>
            <div class="page">
                <a href="wire 1 Etudiant.html" class="li">
                    <span>&laquo; Precedent &raquo;</span>
                </a>
                <div class="link">
                    <a href="" class="active">1</a>
                    <a href="" class="">2</a>
                    <a href="" class="">3</a>
                </div>
                <a href="wire 1,1 Etudiant.html" class="li">
                    <span>&laquo; Suivant &raquo;</span>
                </a>
            </div>
        </fieldset>
</div>
