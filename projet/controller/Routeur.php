<?php
require_once 'ControleurAccueil.php';
require_once 'ControleurTestOriginal.php';
require_once 'ControleurTestFrancais.php';
require_once 'ControleurModifierPokemon.php';
require_once 'ControleurHistorisation.php';
require_once 'ControleurAfficherPokemon.php';
require_once 'ControleurAPI.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlTestFr;
    private $ctrlTestOrig;
    private $ctrlModifPkmn;
    private $ctrlHisto;
    private $ctrlAffiPkmn;
    private $ctrlAPI;

    /* Construit une instance de Routeur */
    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlTestFr = new ControleurTestFrancais();
        $this->ctrlTestOrig = new ControleurTestOriginal();
        $this->ctrlModifPkmn = new ControleurModifierPokemon();
        $this->ctrlHisto = new ControleurHistorisation();
        $this->ctrlAffiPkmn = new ControleurAfficherPokemon();
        $this->ctrlAPI = new ControleurAPI();
    }

    /* Permet de gérer les routes d’accès aux différentes pages et fonctions */
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                $act = $_GET['action'];
                switch ($act) {
                    case 'testFrancais' : $this->ctrlTestFr->testFrancais(); break;
                    case 'testOriginal' : $this->ctrlTestOrig->testOriginal(); break;
                    case 'modifyPokemon' : $this->ctrlModifPkmn->modifie(); break;
                    case 'historique' : $this->ctrlHisto->historique(); break;
                    case 'printPokemon' : $this->ctrlAffiPkmn->affiche(); break;
                    case 'API' : $this->ctrlAPI->request(); break;
                    default : $this->ctrlAccueil->accueil(); break;
                }
            }
            else {
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    /* Renvoie une vue Erreur en cas de souci avec le Routeur */
    private function erreur($msgErreur) {
        $vue = new Vue('Erreur');
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}

?>