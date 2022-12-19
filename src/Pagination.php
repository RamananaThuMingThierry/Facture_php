<?php

    namespace App;

    use \PDO;
    use \Exception;
    use App\Connexion;
    use App\URL;

    class Pagination{

        /** Déclaration des variables */
        private $query;

        private $querycount;

        private $pdo;

        private $perPage;

        private $count;

        private $items;

        /** --------------- Constructeur -----------------**/
        public function __construct(
                            string $query,
                            string $querycount,
                            ?\PDO $pdo = null,
                            int $perPage = 12)
        {
            $this->query = $query;
            $this->querycount = $querycount;
            $this->pdo = $pdo ?: Connection::getPDO();
            $this->perPage = $perPage;
        }

        private function getCurrentPage(): int{
            return URL::getPositiveInt('page', 1);
        }

        private function getPages(): int{
            if($this->count === null){
                $this->count = (int)$this->pdo
                    ->query($this->querycount)
                    ->fetch(PDO::FETCH_NUM)[0];
            }
            //dd($this->count);
            return ceil($this->count / $this->perPage);
        }

        /** ------------- Listes des éléments ------------------ **/
        public function getItems(string $classeMapping): array{
            if($this->items === null){
                $currentPage = $this->getCurrentPage();
                $pages = $this->getPages();
                
                if($currentPage > $pages){
                    throw new Exception('Cette page n\'existe pas!');
                }
                $offset = $this->perPage * ($currentPage - 1);
                //dd($offset);
                $this->items = $this->pdo
                    ->query($this->query)
                    ->fetchAll(PDO::FETCH_CLASS, $classeMapping);
            }   
            return $this->items;  
        }

        public function previousLink(string $link): ?string{
            $currentPage = $this->getCurrentPage();
            if($currentPage <= 1) return null;
            if($currentPage > 2) $link .= "?page=". ($currentPage - 1);
            return <<<HTML
                <a href="{$link}" class="btn btn-primary">&laquo; Précédente</a>
HTML;
        }
        
        public function nextLink(string $link): ?string{
            $currentPage = $this->getCurrentPage();
            $pages = $this->getPages();
            if($currentPage >= $pages) return null;
            $link .= "?page=". ($currentPage + 1);
            return <<<HTML
                <a href="{$link}" class="btn btn-primary ml-auto">Suivante &raquo;</a>
HTML;
        }

    }