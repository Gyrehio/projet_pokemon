<?php
require_once 'view/Vue.php';

class ControleurHistorisation {

    /* Créé la vue Historisation */
    public array $modifier;
    public array $voir;
    public array $autres;

    public function historique() {
        $modifier = [];
        $voir = [];
        $autres = [];

        $xml = simplexml_load_file(__DIR__.'/../others/histo.xml');
        foreach ($xml->operation as $op) {
            //print_r($op);
            switch ($op->type) {
                case "other":
                    $autres[(String)$op->horodate] = htmlspecialchars_decode($op->desc);
                    break;
                case "modify":
                    $modifier[(String)$op->horodate] = htmlspecialchars_decode($op->desc);
                    break;
                case "display":
                    $voir[(String)$op->horodate] = htmlspecialchars_decode($op->desc);
                    break;
            }
        }

        $vue = new Vue("Historisation");
    $vue->generer(array('modifier' => $modifier, 'voir' => $voir, 'autres' => $autres));
    }
}

?>