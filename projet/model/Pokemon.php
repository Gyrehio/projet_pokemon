<?php
require_once "model/Modele.php";
require_once "model/Type.php";

class Pokemon implements Modele, \JsonSerializable {

    private int $id;
    private string $nom;
    private int $taille;
    private int $poids;
    private array $types;

    /* Constructeur d'une instance de Pokemon */
    public function __construct(int $i, string $n, int $h, int $p, array $t) {
        $this->id = $i;
        $this->nom = $n;
        $this->taille = $h;
        $this->poids = $p;
        $this->types = $t;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getTaille() {
        return $this->taille;
    }

    public function getPoids() {
        return $this->poids;
    }

    public function getTypes() {
        return $this->types;
    }

    /* Permet de se connecter à PHPMyAdmin */
    public static function getBdd($db) {
        $sgbd = "mysql"; 
        $host = "mariadb";
        $port = "3306";
        $charset = "UTF8";
        $user = "root"; // Entrez ici l'identifiant pour accéder à PHPMyAdmin
        $pass = "password"; // Entrez ici le mot de passe pour accéder à PHPMyAdmin
        try {
            $pdo = new PDO("$sgbd:host=$host;port=$port;dbname=$db;charset=$charset", $user, $pass, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    /* Construit le tableau contenant tous les Pokémons triés par ordre alphabétique, nécessaire pour l'affichage de la vue TestOriginal */
    public static function getAllOriginal() {
        $arr = [];
        $pdo = Pokemon::getBdd("pokemon");
        $qry = 'SELECT * from pokemon  WHERE pok_weight != 0 && pok_height != 0 ORDER BY pok_name ASC';
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $arr[$record[0]] = Pokemon::getOneOriginal($record[0]);
        }
        return $arr;
    }

    /* Construit une instance de la classe Pokémon à partir d'un id donné, nécessaire pour l'affichage de la vue TestOriginal */
    public static function getOneOriginal(int $id) {
        $pdo = Pokemon::getBdd('pokemon');
        $qry = 'select * from pokemon where pok_id = '.$id;
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $pkmn = new Pokemon($record[0], $record[1], $record[2], $record[3], Type::getOneOriginal($record[0]));
        }
        return $pkmn;
    }

    /* Construit le tableau contenant tous les Pokémons triés par ordre alphabétique, nécessaire pour l'affichage de la vue TestFrancais */
    public static function getAllFrancais() {
        $arr = [];
        $pdo = Pokemon::getBdd("pokemonFR");
        $qry = 'SELECT * from pokemon WHERE pok_weight != 0 && pok_height != 0 ORDER BY pok_name ASC';
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $arr[$record[0]] = Pokemon::getOneFrancais($record[0]);
        }
        return $arr;
    }

    /* Construit une instance de la classe Pokémon à partir d'un id donné, nécessaire pour l'affichage de la vue TestFrancais */
    public static function getOneFrancais(int $id) {
        $pdo = Pokemon::getBdd('pokemonFR');
        $qry = 'select * from pokemon where pok_id = '.$id;
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $pkmn = new Pokemon($record[0], $record[1], $record[2], $record[3], Type::getOneFrancais($record[0]));
        }
        return $pkmn;
    }

    public static function getFromType(int $id) {
        $tab = array_filter(Pokemon::getAllFrancais(), function($pok) use ($id) {
            foreach ($pok->types as $tabTypes) {
                if ($tabTypes->getId() == $id) return true;
            }
            return false;
        });
        return array_values($tab);
    }

    public function jsonSerialize(): array {
        return ['id' => $this->getId(), 'nom' => $this->getNom(), 'taille' => $this->getTaille(), 'poids' => $this->getPoids(), 'types' => $this->getTypes()];
    }
}

?>