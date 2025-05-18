<?php

    class Jeu extends Produit
    {
        private $age_max = null;
        function __construct($id, $nom, $edition, $auteur, $date_sortie, $prix, $age_min, $age_max = null)
        {
            parent::__construct($id, $nom, $edition, $auteur, $date_sortie, $prix, $age_min);
            $this->age_max = $age_max;
        }
    }
?>