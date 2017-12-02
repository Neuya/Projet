<html>
	<body>
		<form method="get" action='index.php'>
			<fieldset>      
				<legend>Créer votre compte</legend>
					<p>     
                        <input type='hidden' name='action' value='created'>
                        <input type='hidden' name='controller' value='utilisateur'>
						<label for="nom">Nom</label> :
						<input type="text" placeholder="Ex : jean" name="nom" id="nom" required/>
					</p>
					<p>
						<label for="prenom">Prenom</label> :
						<input type="text" placeholder="Ex : Stylo" name="prenom" id="prenom" required/>
					</p>
                                        <p>
						<label for="pseudo">Pseudonyme</label> :
						<input type="text" placeholder="Ex : Rubis" name="pseudo" id="pseudo" required/>
					</p>
					<p>
						<label for="age">age</label> :
						<input type="text" placeholder="Ex : bleu" name="age" id="age" required/>
					</p>
                                        <p>
						<label for="ville">ville</label> :
						<input type="text" placeholder="Ex : 2" name="ville" id="ville" required/>
					</p>
					<p>
						<label for="mdp">mot de passe</label> :
						<input type="text" placeholder="Ex : 2" name="mdp" id="mdp" required/>
					</p>
					<p>
						<label for="mdp2">confirmez mot de passe</label> :
						<input type="text" placeholder="Ex : 2" name="mdp2" id="mdp2" required/>
					</p>
					<p>
						<input type="submit" value="Envoyer" />
					</p>
			</fieldset> 
		</form>	
	</body>
</html>