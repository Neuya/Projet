<?php
    echo '<p>Le produit a été créee</p>';
    require_once (File::build_path(array('Modele','ModelProduit.php')));
    require File::build_path(array('Vues','produit','list.php'));
?>