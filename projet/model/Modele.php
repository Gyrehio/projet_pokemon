<?php

interface Modele {

    public static function getBdd($db);
    public static function getAllOriginal();
    public static function getOneOriginal(int $id);
    public static function getAllFrancais();
    public static function getOneFrancais(int $id);
}


?>