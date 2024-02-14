<?php
require_once 'view/Vue.php';
require_once 'model/Pokemon.php';

class ControleurTestFrancais {

    private array $data;

    /* Créé la vue Test Français */
    public function testFrancais() {
        $data = Pokemon::getAllFrancais();

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
                $desc = $dom->createElement('desc','Récupération des tous les Pokemon et leurs types en base (Français).');
                $operation->appendChild($type);
                $operation->appendChild($horodate);
                $operation->appendChild($desc);
                $racine->appendChild($operation);
                $fp = fopen(__DIR__."/../others/histo.xml","w");
                fwrite($fp, $dom->saveXML());
                fclose($fp);
                $result = true;
            }

        $vue = new Vue('TestFrancais');
        $vue->generer(array('data' => $data));
    }
}

?>