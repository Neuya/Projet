<?php

$vCouleur= htmlspecialchars($v->getCouleur());
$vNomProduit= htmlspecialchars($v->getNomProduit());
$vIdProduit= htmlspecialchars($v->getIdProduit());
$vQuantite = $_GET['quantite'];
$vPrixUn=$v->getPrixProd();
$vPrix= htmlspecialchars($vPrixUn*$vQuantite);

            

echo "Confirmez vous l'achat de : $vNomProduit $vCouleur en $vQuantite exemplaires ?";
echo "<p>Cela vous coutera : $vPrix € TTC</p>";

echo "<p><div id='ajouter'><a href='index.php?action=created&controller=panier&idProduit=$vIdProduit&quantite=$vQuantite'>Confirmer</a></div></p>";
echo "<p><div class='bouton_cliquable'><a href='index.php?action=read&controller=produit&id=$vIdProduit'>Retour à la description du produit</a></div>";
echo "<div id='retourListProd'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div>";
?>