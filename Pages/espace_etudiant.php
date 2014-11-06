


<!-- S'authentifier-->
	<div  class="row large-12 colums" width="500" data-reveal>
		<h2>Espace Etudiant</h2>
		<p class="lead"></p>
		<div class="row">
			<div class="large-6 columns">
				<form data-abide role="form" method="POST" action='Pages/informations_etudiant.php' novalidate>
				  <div class="name-field">
				    <label>Votre CNE <small>obligatoire</small>
				      <input type="password" id="cne" name="cne" required pattern="[0-9]{10}">
				    </label>
				    <small class="error">le CNE se compose de 10 chiffre.</small>
				  </div>
				  <button type="submit">Soumettre</button>
				</form>
			</div>
		</div>
	</div>
	<!-- S'authentifier-->

