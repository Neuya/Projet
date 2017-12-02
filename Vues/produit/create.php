<html>
	
	<body>
		<form method="get" action='index.php'>
                  


			<fieldset>
                           
				<legend>Créer votre produit</legend>
					<p>     
                                                <input type='hidden' name='action' value='created'>
						<label for="id">Numéro d'identification</label> :
						<input type="text" placeholder="Ex : 5" name="id" id="id" required/>
					</p>
					<p>
						<label for="nom">Libellé du produit</label> :
						<input type="text" placeholder="Ex : Stylo" name="nomproduit" id="nom" required/>
					</p>
					<p>
						<label for="couleur">Couleur</label> :
						<input type="text" placeholder="Ex : bleu" name="couleur" id="couleur" required/>
					</p>
                                        <p>
						<label for="quantite">Quantité</label> :
						<input type="text" placeholder="Ex : 2" name="quantite" id="quantite" required/>
					</p>
                                         <p>
						<label for="prix">Prix</label> :
						<input type="text" placeholder="Ex : 50" name="prix" id="prix" required/>
					</p>
					<p>
						<input type="submit" value="Envoyer" />
					</p>
			</fieldset> 
		</form>	
	</body>
</html>
