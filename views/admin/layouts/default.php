<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once "styles.php"; ?>
    <title><?= isset($titre) ? e($titre) : "Facture du Bloc Verte"; ?></title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php require "navbar.php"; ?>

        <?php require_once "aside.php"; ?>
      
        <div class="content-wrapper" style="background-color:#ddd;">
            <section class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </section>
        </div>
              
        <?php require_once "footer.php"; ?>
    </div>

    <?php require "scrypt.php"; ?>
    
</body>
</html>

        