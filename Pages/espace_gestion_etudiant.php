<?php
require_once('Metier/Database.class.php');
require_once('Metier/EtudiantManager.class.php');
require_once('Metier/DemandeManager.class.php');
require_once('Metier/CorrectionManager.class.php');

if(isset($_SESSION['cne']))
{	
		$etudiant = EtudiantManager::getById($_SESSION['cne']);
			
		
		if(isset($_POST['btn']))
		{
		$resultat = CorrectionManager::demanderCorrection($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['daten'],$_POST['email'],$etudiant->getCne());
		$alert_type = ((explode("#",$resultat)[0]=='Orange')?"warning":"success");
		$resultat= explode("#",$resultat)[1];
		}
?>
  	  	<div class="off-canvas-wrap" data-offcanvas>
		
		
		  <div class="inner-wrap">
		    
			
		    <section class="main-section">
		      <!-- content goes here -->
				<div class="large-12">
				
					
					<!--<div class="panel">
						<h1>Bienvenue ...</h1>
					</div>-->
					
							<div class="row"><br></div>
						<?php
						if(isset($etudiant))
						{
						?>
							<ul class="pricing-table">
								<div data-alert class="alert-box">
								<!-- Your content goes here -->
								Bienvenue <strong><?php echo $etudiant->getNom().' '.$etudiant->getPrenom(); ?></strong> dans votre espace etudiant!
								</div>
								<?php
								if(isset($_POST['btn']))
								{
								?>
								<div data-alert class="alert-box <?php echo $alert_type; ?> radius">
								<?php echo $resultat; ?>
								<a href="#" class="close">&times;</a>
								</div>
								<?php
								}
								else
								{
								?>
								<blockquote>Vous avez la possibilité de consulter vos informations,
								lister les demandes d'attestations et leurs état, et en faire des nouvelles.<cite>Cordialement, Administrateur</cite>
								</blockquote>
								<?php
								}
								?>
								<li class="title">Vos informations :</li>
								<li class="bullet-item">CNE : <?php echo $etudiant->getCne(); ?></li>
								<li class="bullet-item">CIN : <?php echo $etudiant->getCin(); ?></li>
								<li class="bullet-item">Nom & Prenom : <?php echo $etudiant->getNom().' '.$etudiant->getPrenom(); ?></li>
								<li class="bullet-item">Date de naissance : <?php echo $etudiant->getDate_Naissance(); ?></li>
								<li class="bullet-item">Filière : <?php echo $etudiant->getFiliere()->getLibelle(); ?></li>
								<li class="cta-button"><a class="button small" href="#" data-reveal-id="myModal_1">Demande de modification de données</a></li>
							
							</ul>
							
							
						<?php
						}
						else
						{
						?>
						<div data-alert class="alert-box alert radius" style="opacity:0.8">
						CNE incorrect, étudiant introuvable dans la base de donnée.<br/>
						<a href="?page=etudiant">Retour</a>
						</div>
						
						<?php
						}
						?>
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
			<h4>Demande de correction</h4>
			<div class="row collapse">
				<div class="large-12 columns">
					<form data-abide role="form" method="post" action="#">
					  <div class="name-field">
					    <label>Votre Nom<small></small>
					      <input type="text" name ="nom" pattern="[a-zA-Z]+" required="required" value="<?php echo $etudiant->getNom(); ?>">
					    </label>
					    <small class="error">votre nom doit absolument être composé de caractères aplhabétiques.</small>
					  </div>
					  <div class="name-field">
					    <label>Votre Prenom<small></small>
					      <input type="text" name="prenom" pattern="[a-zA-Z]+" required="required" value="<?php echo $etudiant->getPrenom();?>">
					    </label>
					    <small class="error">votre nom doit absolument être composé de caractères aplhabétiques.</small>
					  </div>
					  <div class="name-field">
					    <label>Votre Date de naissance
					      <input type="date" name="daten" id="cne" required="required" value="<?php echo $etudiant->getDate_Naissance();?>">
					    </label>
					    <small class="error">Veuillez entrer une date correcte.</small>
					  </div>
					  <div class="name-field">
					    <label>Votre CIN* <small>*Carte Identitée Nationale.</small>
					      <input type="text" name="cin" id="cin" pattern="^[a-zA-Z0-9]+$" required="required" value="<?php echo $etudiant->getCin();?>">
					    </label>
					    <small class="error">votre CIN doit absolument être composé d'une combinaison des caractères alphanumeriques.</small>
					  </div>
					  <div class="email-field">
					    <label>Votre Email <small>Exemple@exemple.com</small>
					      <input type="email" name="email">
					    </label>
					    <small class="error">votre Email doit absolument respecte la frome suivante exemple@exemple.com</small>
					  </div>
					  <button class="button small" type="submit" name="btn">Envoyer</button>
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

<?php
}
else
{?>
						<div data-alert class="alert-box alert radius" style="opacity:0.8">
						Erreur 404 : Access Denied<br/>
						<a href="?page=accueil">Retour</a>
						</div>
<?php
}
?>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <script type="text/javascript" src="js/news.js"></script>
    <script type="text/javascript" src="js/Ajaxification.js"></script>