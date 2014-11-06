<?php 
	// redevinition du nave
?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion Scolaire | Etudiants</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  	  	<div class="off-canvas-wrap" data-offcanvas>
		  <div class="inner-wrap">
		    <nav class="tab-bar">

		      <section class="middle tab-bar-section">
		        <h1 class="title">Ensa Khouribga 2014</h1>
		      </section>

		      <section class="right-small">
		        <a class="right-off-canvas-toggle menu-icon" ><span></span></a>
		      </section>
		    </nav>

		    <!-- Profil menu in the right corner -->
		    <aside class="right-off-canvas-menu">
		      <ul class="off-canvas-list">
		        <li><label>Profil</label></li>
		        <li><img src="img/test.jpg"></li>
		        <li><a href="#">Nom : NOMETUDIANT</a></li>
		        <li><a href="#">Date last connection : xx/xx/xxxx</a></li>
			    
		        <li><a href="#">nbr de connexion:xxx </a></li>
		      </ul>
		    </aside>

		    <section class="main-section">
		      <!-- content goes here -->
		     <div class="row">
				<div class="large-12 columns">
					<div class="panel">
						<h1>Salut {$_SESSION[Nom]} !</h1>
					</div>
						<div class="row"><br></div>

							<div data-alert class="row alert-box">
							  <!-- Your content goes here -->
							  Bienvenue a votre espace etudiant!
							  </div>
							<div class="row">
								<blockquote> Ecole Nationale des Sciences Appliquées Khouribga 2014.<cite>M<sup>ed</sup> Amine & Mouad</cite></blockquote>
							</div>
							<div class="row">
								<div class="large-12 colums">
									<ul class="">
										<li><a  href="#" data-reveal-id="myModal_1">Demande de modification de données</a></li>
										<li><a  href="#" data-reveal-id="myModal_2">Demande de certificat</a></li>
									</ul>
								</div>
							</div>
				</div>
			</div>
			</section>
			  <a class="exit-off-canvas"></a>
		  </div>
		</div>
		<style type="text/css">
			#myModal_1{
					margin: 0 auto;
				    position:absolute;
				    top:10px;
				    max-width: 450px;
				    -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.4);
				    box-shadow: 0 0 10px rgba(0,0,0,0.4);
			}
		</style>
		<!-- Demande modifications des données-->
		<div id="myModal_1"class="reveal-modal" width="100px" data-reveal>
			<h2>Demande modifications</h2>
			<p class="lead">Renseignements obligatoires.</p>
			<div class="row collapse">
				<div class="large-12 columns">
					<form data-abide role="form" novalidate action="">
					  <div class="name-field">
					    <label>Votre Nom complet <small></small>
					      <input type="text" name ="nom" pattern="[a-zA-Z]+">
					    </label>
					    <small class="error">votre nom doit absolument être composé de caractaires aplhabétiques.</small>
					  </div>
					  <div class="name-field">
					    <label>Votre Prenom <small></small>
					      <input type="text" name="prenom" pattern="[a-zA-Z]+">
					    </label>
					    <small class="error">votre nom doit absolument être composé de caractaires aplhabétiques.</small>
					  </div>
					  <div class="name-field">
					    <label>Votre CNE* <small>*Code National Etudiant.</small>
					      <input type="text" name="cne" id="cne" pattern="[0-9]{10}">
					    </label>
					    <small class="error">votre CNE doit absolument être composé de 10 chiffres.</small>
					  </div>
					  <div class="name-field">
					    <label>Votre CIN* <small>*Carte Identitée Nationale.</small>
					      <input type="text" name="cin" id="cin" pattern="[a-zA-Z0-9]+" >
					    </label>
					    <small class="error">votre CIN doit absolument être composé d'un combinaison des caractaires alphanumeriques.</small>
					  </div>
					  <div class="email-field">
					    <label>Votre Email <small>Exemple@exemple.com</small>
					      <input type="email" name="email">
					    </label>
					    <small class="error">votre Email doit absolument respecte la frome suivante exemple@exemple.com</small>
					  </div>
					  <button type="submit">Envoyer</button>
					</form>
				</div>
				<a class="close-reveal-modal">&#215;</a>
			</div>
		</div>
		<!-- Demande modifications des données-->

		<!-- Affichage des demandes & et l'envoie d'une-->
		<div id="myModal_2" class="reveal-modal">
			<p>liste des demandes avec le choix de d'envoyer une demandes</p>
		</div>
		<!-- Affichage des demandes & et l'envoie d'une-->

  </body>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <script type="text/javascript" src="js/news.js"></script>
    <script type="text/javascript" src="js/Ajaxification.js"></script>
  </body>
</html>