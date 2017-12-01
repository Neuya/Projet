<?php
    echo '<p>L"utilisateur a été créee</p>';
    require_once (File::build_path(array('Modele','ModelUtilisateur.php')));
    require File::build_path(array('Vues','utilisateur','list.php'));
?>