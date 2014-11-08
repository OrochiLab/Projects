


<!-- S'authentifier-->
		<div  class="large-12 colums" width="500" data-reveal>
			<br/><br/>
			<?php
			if(!isset($_SESSION['type']))
			{
			?>
			<div class="row">
				<div class="large-12 columns"  style="text-align:center">
					<form data-abide role="form" method="post" action="?page=Espace_de_gestion_administrateur" novalidate>
					<fieldset>
						<legend>Espace Administration</legend>
					  <div class="name-field large-3" style="margin:auto;">
					    <label>Votre Login <small>obligatoire</small>
					      <input type="text" name="login" required pattern="^[a-zA-Z0-9]+$">
					    </label>
					    <small class="error">Le login ne doit contenir que des caractaires alphanumerique.</small>
					  
					 
					    <label>Votre Password <small>obligatoire</small>
					      <input type="password" name="password" id="password" required pattern="^[0-9a-zA-Z]+$">
					    </label>
					    <small class="error">Le mot de passe ne doit contenir que des caractaires alphanumerique.</small>
						<button class="button tiny" type="submit">Valider</button>
					  </div>
					  
					</fieldset>
					</form>
				</div>
			</div>
			<?php
			}
			else
			{
			?>
			<div data-alert class="alert-box alert radius" style="opacity:0.8">
			Erreur, Vous êtes déjà connecté.<br/>
			<a href="?page=accueil">Retour</a>
			</div>
			<?php
			}
			?>
		</div>
		<!-- S'authentifier-->