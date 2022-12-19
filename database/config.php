<?php

    use App\Connection;

    require dirname(__DIR__) .'/vendor/autoload.php';

    $faker = Faker\Factory::create('fr_FR');

    $pdo = Connection::getPDO();

    /** 
     * Vide tous les tables de la base de données
     */
    $pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
    $pdo->exec('TRUNCATE TABLE Sous_compteur');
    $pdo->exec('TRUNCATE TABLE portes');
    $pdo->exec('TRUNCATE TABLE mois');
    $pdo->exec('TRUNCATE TABLE Utilisateurs');
    $pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

    /**
     * Tableau
     */
    $portes = [];
    $mois = [];

    /**
     * Remplir les données dans la table portes
     */
    
     $this->beginTransaction();
    $query = $pdo->prepare("INSERT INTO portes SET NumeroPorte = :NumeroPorte");
    for($i = 1 ; $i <= 11 ; $i++){
        $query->execute([
            'NumeroPorte' => $i
        ]);    
    }
    $this->commit();

    /**
     * Remplir les données dans la table mois
     */

    for($i = 0; $i < 5 ; $i++){
        $pdo->exec("INSERT INTO mois SET name='{$faker->name}', 
                                         slug='{$faker->slug}'
                 ");
        $categories[] = $pdo->lastInsertId();
    }

    /**
     * Remplir les données dans la table post_catégorie
     */

     foreach($posts as $post){
        $randomCategorie = $faker->randomElements($categories, rand(0, count($categories)));
        foreach($randomCategorie as $categorie){
            $pdo->exec("INSERT INTO post_categorie SET post_id = $post, categorie_id = $categorie");
        }
     }

     // Remplir les données dans la table users

     $password = password_hash('admin', PASSWORD_BCRYPT);
     $pdo->exec("INSERT INTO Utilisateur SET username='admin', password='$password'");
