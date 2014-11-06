


<!-- S'authentifier-->
		<div  class="row large-12 colums" width="500" data-reveal>
			<h2>Connexion</h2>
			<p class="lead">Renseignements obligatoires.</p>
			<div class="row">
				<div class="large-6 columns">
					<form data-abide role="form" method="post" action="Pages/informations_administrateur.php" novalidate>
					  <div class="name-field">
					    <label>Votre Login <small>obligatoire</small>
					      <input type="text" name="login" required pattern="[a-zA-Z0-9]+">
					    </label>
					    <small class="error">Le login ne doit contenir que des caractaires alphanumerique.</small>
					  </div>
					  <div class="name-field">
					    <label>Votre Password <small>obligatoire</small>
					      <input type="password" name="password" id="password" required pattern="[0-9a-zA-Z]+">
					    </label>
					    <small class="error">Le mot de passe ne doit contenir que des caractaires alphanumerique.</small>
					  </div>
					  <button type="submit">Valider</button>
					</form>
				</div>
			</div>
		</div>
		<!-- S'authentifier-->