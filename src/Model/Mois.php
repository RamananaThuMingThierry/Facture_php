<?php

    namespace App\Model;

    final class Mois{

        /**
         * @var int 
         **/
        private $id;

        /**
         * @var string
         **/
        private $NomMois;

        /**
         * @var float
         */
        private $NouvelIndex;

        /**
         * @var float
         */
        private $AncienIndex;

        /**
         * @var int
         */
        private $status;

        /**
         * @var int
         */
        private $IdMois;

        /**
         * @var int
         */
        private $IdPortes;

        public function setId(int $id): self
        {
            $this->id = $id;
            return $this;
        }

        public function getId(): ?int{
            return $this->id;
        }

        public function setNomMois(string $NomMois):self
        {
            $this->NomMois = $NomMois;
            return $this;
        }

        public function getNomMois(): ?string
        {
            return $this->NomMois;
        }

        public function setNouvelIndex(float $NouvelIndex): self
        {
            $this->NouvelIndex = $NouvelIndex;
            return $this;
        }

        public function getNouvelIndex(): ?float{
            return $this->NouvelIndex;
        }

        public function setAncienIndex(float $AncienIndex): self{
            $this->AncienIndex = $AncienIndex;
            return $this;
        }

        public function getAncienIndex(): ?float{
            return $this->AncienIndex;
        }

        public function getIndexConsommer(float $NouvelIndex, float $AncienIndex): float{
            return ($NouvelIndex - $AncienIndex);
        }
    }