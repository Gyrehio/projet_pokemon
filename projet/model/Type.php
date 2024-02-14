<?php
require_once "model/Modele.php";

class Type implements Modele, \JsonSerializable {

    private int $id;
    private string $nom;

    /* Constructeur d'une instance de Type */
    public function __construct(int $i, string $n) {
        $this->id = $i;
        $this->nom = $n;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
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

    /* Construit le tableau contenant tous les Types associés à chaque Pokémon, nécessaire pour l'affichage de la vue TestFrancais */
    public static function getAllOriginal() {
        $arr = [];
        $pdo = Type::getBdd('pokemon');
        $qry = 'SELECT * from pokemon ORDER BY pok_name ASC';
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $arr[$record[0]] = Type::getOneOriginal($record[0]);
        }
        return $arr;
    }

    /* Construit la/les instance(s) de Type associée(s) à un Pokémon avec l'id donnée, nécessaire pour l'affichage de la vue TestOriginal */
    public static function getOneOriginal(int $id) {
        $arr = [];
        $pdo = Type::getBdd('pokemon');
        $qry = 'select t.type_id, t.type_name from pokemon p join pokemon_types pt on p.pok_id = pt.pok_id join types t on pt.type_id = t.type_id where p.pok_id = '.$id;
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $type = new Type($record[0], $record[1]);
            array_push($arr, $type);
        }
        return $arr;
    }

    /* Construit le tableau contenant tous les Types associés à chaque Pokémon, nécessaire pour l'affichage de la vue TestFrancais */
    public static function getAllFrancais() {
        $arr = [];
        $pdo = Type::getBdd('pokemonFR');
        $qry = 'SELECT * from pokemon ORDER BY pok_name ASC';
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $arr[$record[0]] = Type::getOneFrancais($record[0]);
        }
        return $arr;
    }

    /* Construit la/les instance(s) de Type associée(s) à un Pokémon avec l'id donnée, nécessaire pour l'affichage de la vue TestFrancais */
    public static function getOneFrancais(int $id) {
        $arr = [];
        $pdo = Type::getBdd('pokemonFR');
        $qry = 'select t.type_id, t.type_name from pokemon p join pokemon_types pt on p.pok_id = pt.pok_id join types t on pt.type_id = t.type_id where p.pok_id = '.$id;
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $type = new Type($record[0], $record[1]);
            array_push($arr, $type);
        }
        return $arr;
    }

    public static function typeList() {
        $arr = [];
        $pdo = Type::getBdd('pokemonFR');
        $qry = 'select * from types';
        $stt = $pdo->query($qry);
        while ($record = $stt->fetch(PDO::FETCH_NUM)) {
            $type = new Type($record[0], $record[1]);
            array_push($arr, $type);
        }
        return $arr;
    }

    public function jsonSerialize(): array {
        return ['id' => $this->getId(), 'nom' => $this->getNom()];
    }
}

?>