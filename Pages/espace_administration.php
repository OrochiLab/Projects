


<!-- S'authentifier-->
		<div  class="large-12 colums" width="500" data-reveal>
			<br/><br/>
			<h4>Connexion</h4>
			<br/>
			<div class="row">
				<div class="large-3 columns">
					<form data-abide role="form" method="post" action="?page=Espace_de_gestion_administrateur" novalidate>
					  <div class="name-field">
					    <label>Votre Login <small>obligatoire</small>
					      <input type="text" name="login" required pattern="^[a-zA-Z0-9]+$">
					    </label>
					    <small class="error">Le login ne doit contenir que des caractaires alphanumerique.</small>
					  </div>
					  <div class="name-field">
					    <label>Votre Password <small>obligatoire</small>
					      <input type="password" name="password" id="password" required pattern="^[0-9a-zA-Z]+$">
					    </label>
					    <small class="error">Le mot de passe ne doit contenir que des caractaires alphanumerique.</small>
					  </div>
					  <button type="submit">Valider</button>
					</form>
				</div>
			</div>
		</div>
		<!-- S'authentifier-->