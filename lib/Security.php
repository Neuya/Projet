<?php

class Security{
    
    public static function chiffrer($texte_en_clair) {
        $texte_en_clair=Security::getSeed().$texte_en_clair;
        $texte_chiffre = hash('sha256', $texte_en_clair);
        return $texte_chiffre;
    }

   /* $mot_passe_en_clair = 'apple';
    $mot_passe_chiffre = chiffrer($mot_passe_en_clair);
    echo $mot_passe_chiffre;*/
    //affiche '3a7bd3e2360a3d29eea436fcfb7e44c735d117c42d1c1835420b6b9942dd4f1b'

    private static $seed = 'zeNUIrolbT';

    public static function getSeed() {
       return self::$seed;
    }
    
    
    
}