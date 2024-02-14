<?php
require_once 'view/Vue.php';

class ControleurAfficherPokemon {

    /* Créé la vue Afficher Pokémon */
    public function affiche() {
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        if ($dom->load(__DIR__.'/../others/histo.xml') === false) {
            die("Fichier XML non trouvé");
        } else {
            $racine = $dom->getElementsByTagName('operations')->item(0);
            $operation = $dom->createElement('operation');
            $type = $dom->createElement('type',"display");
            $horodate = $dom->createElement('horodate',date('Y-m-d H:i:s'));
            $desc = $dom->createElement('desc','Récupération de tous les types de Pokémon en base');
            $operation->appendChild($type);
            $operation->appendChild($horodate);
            $operation->appendChild($desc);
            $racine->appendChild($operation);
            $fp = fopen(__DIR__."/../others/histo.xml","w");
            fwrite($fp, $dom->saveXML());
            fclose($fp);
            $result = true;
        }

        $vue = new Vue("AfficherPokemon");
        $vue->generer(array());
    }
}

?>