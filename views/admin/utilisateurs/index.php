<?php

?>

<div class="row">
    <div class="col-sm-12 elevation-1 d-flex justify-content-between pt-2 pb-2 mt-2 mb-2 bg-white">
        <h4>Gestions des utilisateurs</h4>
        <div class="btn-group">
            <a href="<?= $router->url("admin_mois_add") ?>" type="button" class="btn btn-success"><i class="fas fa-plus"></i></a>
            <button type="button" class="btn btn-info"><i class="fas fa-eye text-white"></i></button>
            <button type="button" class="btn btn-warning"><i class="fas fa-pen text-white"></i></button>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 bg-white">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom et Prénom</th>
                        <th>E-mail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

