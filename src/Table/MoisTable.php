<?php

    namespace App\Table;

    use \PDO;
    use App\Pagination;
    use App\Table\Exception\NotFoundException;
    use App\Model\{Mois};

    /** La classe MoisTable ne peut pas être hérité par une autre classe car il a été déclarer final */
    final class MoisTable extends Table{

        protected $table = "post";
        protected $class = Mois::class;

        /**
         * @var array
         */
        public function findPaginated() : array{
            
            $paginatedQuery = new PaginatedQuery(
                "SELECT * FROM {$this->table} ORDER BY created_at DESC",
                "SELECT COUNT(id) FROM {$this->table}",
                $this->pdo
            );
        
            $posts = $paginatedQuery->getItems(Post::class);

            (new CategorieTable($this->pdo))->hydratePosts($posts);

            return [$paginatedQuery, $posts];
        }

        public function add(Mois $mois): void
        {
            $this->pdo->beginTransaction();
            
            $query = $this->pdo->prepare("INSERT INTO {$this->table} SET NomMois = :NomMois, AncienIndex = :AncienIndex, NouvelIndex = :NouvelIndex");
            $ok = $query->execute([
                'name' => $post->getName(),
                'slug' => $post->getSlug(),
                'created_at' => $post->getCreatedAt()->format('Y-m-d H:i:s'),
                'content' => $post->getContent()
            ]);

            if($ok === false){
                throw new \Exception("Impossible de créer l'article N° dans la table {$this->table}");
            }
            $post->setId($this->pdo->lastInsertId());
        
            $id = $this->pdo->lastInsertId();
            $query = $this->pdo->prepare("INSERT INTO post_categorie SET post_id = ?, categorie_id = ?");
            foreach($categories as $categorie){
                $query->execute([$id, $categorie]);
            }
            $this->pdo->commit();
        
        }

        public function update(Post $post, array $categories): void
        {
            $this->pdo->beginTransaction();
            $query = $this->pdo->prepare("UPDATE {$this->table} SET name = :name, slug = :slug, created_at = :created_at, content = :content WHERE id = :id");
            $ok = $query->execute([
                'id' => $post->getId(),
                'name' => $post->getName(),
                'slug' => $post->getSlug(),
                'content' => $post->getContent(),
                'created_at' => $post->getCreatedAt()->format('Y-m-d H:i:s')
            ]);


            if($ok === false){
                throw new \Exception("Impossible de modifier l'article N° #$id dans la table {$this->table}");
            }

            $this->pdo->exec("DELETE FROM post_categorie WHERE post_id = " . $post->getId());
            $query = $this->pdo->prepare("INSERT INTO post_categorie SET post_id = ?, categorie_id = ?");
            foreach($categories as $categorie){
                $query->execute([$post->getId(), $categorie]);
            }
            $this->pdo->commit();
        }

        public function delete(int $id){
            $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
            $ok = $query->execute(['id' => $id]);
            if($ok === false){
                throw new \Exception("Impossible de supprimer l'enregistrement $id dans la table {$this->table}");
            }
        }
    }