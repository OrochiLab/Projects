<?php
require_once('Metier/Database.class.php');
require_once('Metier/EtudiantManager.class.php');
require_once('Metier/DemandeManager.class.php');

if(isset($_SESSION['cne']))
{	
		$etudiant = EtudiantManager::getById(((isset($_POST['cne']))?$_POST['cne']:$_SESSION['cne']));
		
		if(isset($_POST['btn']))
		{		
		$resultat = DemandeManager::passerDemande($etudiant->getCne());
		$alert_type = (explode("#",$resultat)[0]=='Rouge')?"alert":((explode("#",$resultat)[0]=='Orange')?"warning":"success");
		$resultat = explode('#',$resultat)[1];
		}
		
		$demandes = DemandeManager::getByEtudiant($etudiant);
		
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
								<i class="icon-white icon-bell"></i> Bienvenue <strong><?php echo $etudiant->getNom().' '.$etudiant->getPrenom(); ?></strong> dans votre espace etudiant, quelques informations à savoir à propos des demandes :<br/><br/>
								- Une demande par semaine ( pour éviter l'abus de demandes )<br/>
								- Une attestation validée par mois au maximum
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
								?>
								
								<table class="large-12" >
									<thead>
										<tr>
											<th width="150">Num Demande</th>
											<th width="150">Date demande</th>
											<th width="150">Etat de la demande</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									for($i=0;$i<count($demandes);$i++)
									{
									?>
									<tr>
										<td>#<?php echo $demandes[$i]->getId(); ?></td>
										<td><?php echo $demandes[$i]->getDate_Demande(); ?></td>
										<td><?php  $val = $demandes[$i]->getValidation()->getReponse(); echo (isset($val)?($demandes[$i]->getValidation()->getReponse().' le '.$demandes[$i]->getValidation()->getDate_Validation()):"En Attente"); ?></td>
									</tr>
									<?php
									}
									?>
									</tbody>
								</table>
								 <form method="post" action="#">
								 <li class="cta-button"><a><button class="button small" type="submit" name="btn"><i class="icon-white icon-list-alt"></i> Demander une attestation</button></a></li>
								</form>
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