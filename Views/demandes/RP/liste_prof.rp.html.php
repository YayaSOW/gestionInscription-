<div class="bod">
        <fieldset class="container">
            <legend align="center">Liste Des Professeurs</legend>
            <div class="click1">
                <span class="etat">Module</span>
                <select name="Etat" id="">
                    <option value=""></option>
                    <option value="">Java</option>
                    <option value="">Python</option>
                    <option value="">Worpress</option>
                </select>
                <button type="submit">Ok</button>
            </div>
            <div class="tab">
                <div class="table">
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Grade</th>
                            <th>Module</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>Wane</td>
                            <td>Baila</td>
                            <td>Web Developer</td>
                            <td>Java</td>
                            <td>
                                <span><a href="<?=WEBROOT?>?action=affecterclass">Classe|</a></span>
                                <span><a href="<?=WEBROOT?>?action=affectermodule">Module|</a></span>
                                <span><a href="<?=WEBROOT?>?action=listemodule">Lister</a></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Niang</td>
                            <td>Aly</td>
                            <td>Freelancer</td>
                            <td>Python</td>
                            <td>
                                <span><a href="wire 5 RP.html">Classe|</a></span>
                                <span><a href="wire 6 RP.html">Module|</a></span>
                                <span><a href="wire 7 RP.html">Lister</a></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Diallo</td>
                            <td>Seckou</td>
                            <td>R Digit</td>
                            <td>Worpress</td>
                            <td>
                                <span><a href="wire 5 RP.html">Classe|</a></span>
                                <span><a href="wire 6 RP.html">Module|</a></span>
                                <span><a href="wire 7 RP.html">Lister</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="Creer">
                    <a href="<?=WEBROOT?>?action=ajoutprof"><button type="submit">Ajouter un Professeur</button></a>
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