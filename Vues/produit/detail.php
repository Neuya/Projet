
        <?php
        
            $vCouleur= htmlspecialchars($v->getCouleur());
            $vNomProduit= htmlspecialchars($v->getNomProduit());
            $vIdProduit= htmlspecialchars($v->getIdProduit());
            $vQuantite = htmlspecialchars($v->getQuantiteProdStock());
            echo '<p> Couleur du produit ' . $vCouleur . '.</p>';
            echo '<p> Libellé du produit ' . $vNomProduit . '</p>';
            echo '<p> Quantité en stock  ' . $vQuantite .'</p>';
            
            
          
				
           
           
            echo "<form method='get' action='index.php'>";
            echo "<fieldset>";
            echo "<input type='hidden' name='action' value='create'>";
            echo "<input type='hidden' name='controller' value='panier'>";
            echo "<input type='hidden' name='idProduit' value='$vIdProduit'>";
             
            echo "<label for='quantite'>Quantité souhaitée : </label>";
            echo "<input id='quantiteAjout' type='number' value='1' min='1' max='$vQuantite' name='quantite' id='quantite' required/>";
            
            echo "<p>";
            echo "<div class='bouton_cliquable'><input type='submit' value='Ajouter au panier'></div>";
            echo "</p>";
            echo "</fieldset>";
            echo "</form>";
            
            
            
            echo "<div id='retourListProd'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div>";
        ?>
 

