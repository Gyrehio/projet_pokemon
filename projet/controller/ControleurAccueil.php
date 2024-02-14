<?php
require_once 'view/Vue.php';

class ControleurAccueil {

    /* Créé la vue Accueil */
    public function accueil() {
        $vue = new Vue("Accueil");
        $vue->generer(array());
    }
}

?>