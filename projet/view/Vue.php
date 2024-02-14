<?php

class Vue {

    private $fichier;

    private $titre;

    /* Construit une instance de Vue correspondant à l'action entrée en paramètre */
    public function __construct($action) {
        $this->fichier = 'view/vue'.$action.'.php';
    }

    /* Permet la mise en place du gabarit sur chaque vue, ainsi que de données liées à un type de vue en particulier */
    public function generer($donnees, $presenceGabarit = true) {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        if ($presenceGabarit) {
            $vue = $this->genererFichier('view/gabarit.php', array(
                'titre' => $this->titre,
                'contenu' => $contenu
            ));
            echo $vue;
        } else {
            echo $contenu;
        }
        
    }

    /* Permet d'écrire le code contenu dans un fichier donné en paramètre */
    public function genererFichier($file, $data) {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            throw new Exception('Fichier '.$file.' introuvable');
        }
    }

    
}

?>