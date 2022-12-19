<?php 

    require '../vendor/autoload.php';

    define('DEBUG_TIME', microtime(true));

    $router = new App\Router(dirname(__DIR__) . '/views');

    /**
     * Pour généréer les erreurs
     */
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    if(isset($_GET['page']) && $_GET['page'] === '1'){
        $uri = explode('?', $_SERVER["REQUEST_URI"])[0];
        $get = $_GET;
        unset($get['page']);
        $query = http_build_query($get);
        if(!empty($query)){
            $uri = $uri . '?'. $query;
        }
        http_response_code(301);
        header('Location: '.$uri);
        exit();
    }

    $router
        // ->get('/','/post/index', 'home')
        // ->get('/blog/categorie/[*:slug]-[i:id]','/categorie/show', 'categorie')
        // ->get('/blog/[*:slug]-[i:id]','/post/show', 'post')
        /** Authentification */

        // ->match('/login', 'auth/login', 'login')

        // ->match('/register', 'auth/register', 'register')

        /** Utilisateur */

        // ->match('/admin/users', 'admin/users/index', 'admin_users')

        // ->match('/admin/users/[i:id]/edit','admin/users/edit', 'admin_user_edit') // Modifier un utilisateur
        
        // ->post('/admin/users/[i:id]/delete','admin/users/delete', 'admin_user_delete') // Supprimer un utilisateur
        
        /** Utilisateurs **/
        ->get('/admin/utilisateurs', 'admin/utilisateurs/index', 'admin_utilisateur')

        /** Mois **/
        ->get('/admin/mois', 'admin/mois/index', 'admin_mois')
        ->match('/admin/mois/add', 'admin/mois/add', 'admin_mois_add')
        ->match('/admin/mois/edit', 'admin/mois/edit', 'admin_mois_edit')
        ->get('/admin/mois/delete', 'admin/mois/delete', 'admin_mois_delete') // Changer en post ce get
        
        /** Sous Compteur **/
        ->get('/admin/sous_compteur', 'admin/sous_compteur/index', 'admin_sous_compteur')

        // ->match('/admin/post/add', 'admin/post/add', 'admin_post_add') // Ajouter une nouveau article dans la table post

        // ->get('/admin/post/[i:id]/view','admin/post/view', 'admin_post_view') // Voir un article de la table post
        
        // ->match('/admin/post/[i:id]/edit','admin/post/edit', 'admin_post_edit') // Modifier un article de la table post
        
        // ->post('/admin/post/[i:id]/delete','admin/post/delete', 'admin_post_delete') // Supprimer un article de la table post
        
        // /** Catégories **/
    
        // ->get('/admin/categorie', 'admin/categorie/index', 'admin_categories')

        // ->match('/admin/categorie/add', 'admin/categorie/add', 'admin_categorie_add') // Ajouter une nouveau article dans la table categorie

        // ->get('/admin/categorie/[i:id]/view','admin/categorie/view', 'admin_categorie_view') // Voir un article de la table categorie
        
        // ->match('/admin/categorie/[i:id]/edit','admin/categorie/edit', 'admin_categorie_edit') // Modifier un article de la table categorie
        
        // ->post('/admin/categorie/[i:id]/delete','admin/categorie/delete', 'admin_categorie_delete') // Supprimer un article de la table categorie

        ->run();
