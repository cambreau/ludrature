<?php
    abstract class Produit
    {
        private $id;
        private $nom;
        private $edition;
        private $auteur;
        private $date_sortie;
        private $prix;
        private $age_min;

        public function __construct($id, $nom, $edition, $auteur, $date_sortie, $prix, $age_min, $age_max = null)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->edition = $edition;
            $this->auteur = $auteur;
            $this->date_sortie = $date_sortie;
            $this->prix = $prix;
            $this->age_min = $age_min;
        }
    }
?>