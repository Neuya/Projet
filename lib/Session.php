<?php

class Session {
    public static function is_user($login) {
        return (!empty($_SESSION['pseudoUtil']) && ($_SESSION['PseudoUtil'] == $login));
    }
}
