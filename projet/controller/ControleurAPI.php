<?php
require_once 'view/Vue.php';

class ControleurAPI {

    public $data;
    public bool $template = false;

    /* Créé la vue API */
    public function request() {
        $goal = $_GET["goal"];
        if (isset($goal)) {
            if ($goal == 'typeList') {
                $data = Type::TypeList();
            } else if ($goal = 'getType' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $data = Pokemon::getFromType($id);
            }
        }

        $vue = new Vue("API");
        $vue->generer(array('data' => $data), false);
    }
}

?>