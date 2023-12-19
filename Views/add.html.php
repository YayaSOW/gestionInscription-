<div class="bod">
        <fieldset class="container1">
            <legend align="center">Nouvelle Demande</legend>
            <form action="<?=WEBROOT?>" method="post">
                <div class="click01">
                    <div><span class="etat1">Type</span></div>
                    <select name="type" id="">
                        <option value="Suspension">Suspension</option>
                        <option value="Annulation">Annulation</option>
                    </select>
                </div>
                <div class="deux">
                    <div class="lo">
                        <div><span class="etat1" class="etat2">Motif</span></div>
                        <div class="text">
                            <textarea name="motif" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                        <div class="val">
                            <button type="reset">Annuler</button>
                            <button type="submit" name="action" value="form-add-demande">Enregistrer</button>
                        </div>
                </div>
        </form>
        </fieldset>
    </div>