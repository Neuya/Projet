<?php

foreach ($tab_commande as $v)
{

    $idCommande = $v->getIdCommande();
    echo "<p><div class='bouton_cliquable'><a href='index.php?action=read&controller=commande&id=$idCommande'>Consulter la commande n°=$idCommande</a></div></p>";
    
}

?> 