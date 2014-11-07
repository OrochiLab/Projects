


<!-- S'authentifier-->
	<div  class="large-12" data-reveal>
		<br/><br/>

		<h4>Espace Etudiant</h4>
		<p class="lead"></p>
		<div class="row">

			<div class="large-3 columns">
				<form data-abide role="form" method="POST" action='?page=Espace_de_gestion_etudiant'>
				  <div class="name-field">
				    <label>Votre CNE <small> obligatoire</small>
				      <input type="password" id="cne" name="cne" required="required" pattern="^[0-9]{10}$">
				    </label>
				    <small class="error">le CNE se compose de 10 chiffre.</small>
				  </div>
				  <button class="button small" type="submit">Soumettre</button>
				</form>
			</div>
	
		</div>
	</div>
	
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <script type="text/javascript" src="js/news.js"></script>
    <script type="text/javascript" src="js/Ajaxification.js"></script>
	<!-- S'authentifier-->

