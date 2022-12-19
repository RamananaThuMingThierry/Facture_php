<?php

?>

<div class="row">
    <div class="mx-auto col-lg-6 col-md-6 mt-2 pt-4 pl-4 pr-4 elevation-1 bg-white">
        <h3 class="text-muted text-center">Modifier un index</h3>
        <hr>

        <form action="" method="POST">
            <div class="form-group">
                <label for="data" class="control-label sr-only">Date de création</label>
                <input type="date" class="form-control rounded-0" name="date" id="data" value="" />
            </div>

            <div class="form-group">
                <label for="moisID" class="control-label sr-only">Mois</label>
                <select name="moisID" class="form-control rounded-0" id="moisID">
                    <option value=""></option>
                </select>
            </div>

            <div class="form-group">
                <label for="dernier_consommation" class="control-label sr-only">Dernière consommation</label>
                <input type="text" autocomplete="off"  value="" name="dernier_consommation" id="dernier_consommation" class="form-control rounded-0" placeholder="Dernière consommation">
            </div>

            <div class="form-group">
                <label for="nouvel_consommation" class="control-label sr-only">Nouveau consommation</label>
                <input type="text" autofocus autocomplete="off"  value="" name="nouvel_consommation" id="nouvel_consommation" class="form-control rounded-0 @error('nouvel_consommation') is-invalid @enderror" placeholder="Nouveau consommation">
            </div>
            <hr>

            <div class="form-group d-flex justify-content-end">
                <input type="submit" value="Ajouter" class="btn btn-primary rounded-0"  type="button">
                <a type="button" class="btn btn-danger ml-1 rounded-0" data-dismiss="modal" href="#" aria-label="Close">Annuler</a>
            </div>
        </form>
    </div>
</div>