<?php
require_once 'view/Vue.php';
require_once 'model/Pokemon.php';

class ControleurModifierPokemon {

    private array $data;
    private bool $result;

    /* Créé la vue Modifier Pokémon */
    public function modifie() {
        $data = Pokemon::getAllFrancais();
        $result = false;

        if (isset($_POST["idPokemon"]) && isset($_POST["taillePokemon"]) && isset($_POST["poidsPokemon"])
        && $_POST["taillePokemon"] > -1 && $_POST["taillePokemon"] <= 500
        && $_POST["poidsPokemon"] > -1 && $_POST["poidsPokemon"] <= 9999) {
            $pdo = Pokemon::getBdd("pokemonFR");
            $qry = 'SELECT * from pokemon where pok_id = '.$_POST["idPokemon"];
            $stt = $pdo->query($qry);
            while ($record = $stt->fetch(PDO::FETCH_NUM)) {
                $nom = $record[1];
                $oldTaille = $record[2];
                $oldPoids = $record[3];
            }
            $qry = 'UPDATE pokemon set pok_height = :t, pok_weight = :p where pok_id = :n';
            $stt = $pdo->prepare($qry);
            $params = [':t'=>$_POST["taillePokemon"],':p'=>$_POST["poidsPokemon"],':n'=>$_POST["idPokemon"]];
            $stt->execute($params);
            
            $dom = new DOMDocument();
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            if ($dom->load(__DIR__.'/../others/histo.xml') === false) {
                die("Fichier XML non trouvé");
            } else {
                $racine = $dom->getElementsByTagName('operations')->item(0);
                $operation = $dom->createElement('operation');
                $type = $dom->createElement('type',"modify");
                $horodate = $dom->createElement('horodate',date('Y-m-d H:i:s'));
                $desc = $dom->createElement('desc',
                "La taille (".$oldTaille.'->'.$_POST["taillePokemon"].
                ") et le poids (".$oldPoids.'->'.$_POST["poidsPokemon"]
                .") de ".$nom." [id=".$_POST["idPokemon"]."] modifiés.");
                $operation->appendChild($type);
                $operation->appendChild($horodate);
                $operation->appendChild($desc);
                $racine->appendChild($operation);
                $fp = fopen(__DIR__."/../others/histo.xml","w");
                fwrite($fp, $dom->saveXML());
                fclose($fp);
                $result = true;
            }
        } 

        $vue = new Vue("ModifierPokemon");
        $vue->generer(array('data' => $data, 'result' => $result));
    }
}

?>