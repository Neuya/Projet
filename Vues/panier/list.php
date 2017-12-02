<?php

require_once (File::build_path(array('Modele','ModelProduit.php')));


if(empty($tab_panier))
{
    echo "Il n'y a aucun article dans votre panier, il vous faut d'abord en ajouter via la liste des produits.";
}

$TotalPanier = 0;

foreach ($tab_panier as $v)
{
    $v_Produit= ModelProduit::getProduitbyId($v->getIdProduit());
    $v_QuantitePanier= htmlspecialchars($v->getQuantite());
    
    $v_nomProduit= htmlspecialchars($v_Produit->getNomProduit());
    $v_couleurProduit= htmlspecialchars($v_Produit->getCouleur());
    $IDurl= rawurlencode($v_Produit->getIdProduit());
    $prixSs = $v_Produit->getPrixProd() * $v->getQuantite();
    $TotalPanier=$TotalPanier+$prixSs;
    
    echo "<div id='prodPanier'><a href='index.php?action=read&id=$IDurl'>$v_nomProduit de couleur $v_couleurProduit quantité : $v_QuantitePanier Sous total : $prixSs €</a></div>";
    echo "<div id='retirerPanier'><a href='index.php?action=deletedPanier&controller=panier&idProduit=$IDurl'>Retirer du panier</a></div>";
    echo "<a href='index.php?action=incrementeQuant&controller=panier&idProduit=$IDurl'>+++++++</a>";
    echo "<br><a href='index.php?action=decrementeQuant&controller=panier&idProduit=$IDurl'>------------</a>";
   
}

echo "<p>Total de votre panier : $TotalPanier</p>";
echo "<div class='bouton_cliquable'><a href='index.php?action=create&controller=commande'>Acheter</a>";

?>
