<?php
require_once('Metier/Database.class.php');
require_once('Metier/EtudiantManager.class.php');
require_once('Metier/DemandeManager.class.php');

if(isset($_SESSION['cne']))
{	
		$etudiant = EtudiantManager::getById(((isset($_POST['cne']))?$_POST['cne']:$_SESSION['cne']));
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
						
							<ul class="pricing-table">
								<div data-alert class="alert-box">
								<!-- Your content goes here -->
								Bienvenue <strong><?php echo $etudiant->getNom().' '.$etudiant->getPrenom(); ?></strong> dans votre espace etudiant!
								</div>
								<table class="large-12">
									<thead>
										<tr>
											<th width="150">Num Demande</th>
											<th width="150">Date demande</th>
											<th width="150">Etat de la demande</th>
											<th width="150">Commentaire</th>
										</tr>
									</thead>
									<tbody>
									<tr>
										<td>#1</td>
										<td>06/11/2014 20:22</td>
										<td>Validé le 06/11/2014/ 20:23</td>
										<td>Commentaire.........................................................</td>
									</tr>
									</tbody>
								</table>
							
								<li class="cta-button"><a class="button small" href="#" data-reveal-id="myModal_2">Demander une attestation	</a></li>
							
							</ul>
							
							
						
				</div>
			</section>
			  <a class="exit-off-canvas"></a>
		  </div>
		</div>
		<style type="text/css">
			#myModal_2{
					margin: 0 auto;
				    position:absolute;
				    top:10px;
				    max-width: 450px;
				    -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.4);
				    box-shadow: 0 0 10px rgba(0,0,0,0.4);
			}
		</style>
		
		<!-- Affichage des demandes & et l'envoie d'une-->
		<div id="myModal_2" class="reveal-modal" data-reveal>
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