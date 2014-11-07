<?php
if(isset($_SESSION['login']))
{

?>
	<div class="row"><br></div>
	<div data-alert class="alert-box">
	  <!-- Your content goes here -->
	  Bienvenue <strong><?php echo htmlspecialchars($_SESSION['nom'].' '.$_SESSION['prenom']);?></strong> a votre espace d'administration!
	  </div>
	<div>Liste des filières 2014
		<blockquote> Ecole Nationale des Sciences Appliquées Khouribga 2014.<cite>M<sup>ed</sup> Amine & Mouad</cite></blockquote>
	</div>
	<ul class="pricing-table">
								
								<li class="title">Quelques statistiques :</li>
								<li class="bullet-item">Nombre de demandes d'attestation traités :</li>
								<li class="bullet-item">Nombre de demandes de correction traités: </li>
								<li class="bullet-item">Répartition des demandes par filière : </li>
							
							</ul>
	<div>
		<div class="large-12 colums">
		
			<table>
			  <thead>
			    <tr>
			      <th width="800">Fillières</th>
			      <th width="150">Nombre de demandes</th>
			      <th width="150">Nombre de demandes Validées</th>
			      <th width="150">Nombres de demandes Non Validées</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php 
			  		// while de l'affichage
			  ?>
			    <tr>
			      <td>
			      	<h4><a>Génie Informatique Option Génie Logiciel. </a><br><small><a>Modules Programmation POO </a>:<a>Element1</a> <a>Element2</a> <a>Element2</a></small></h4>
			      </td>
			      <td>Close</td>
			      <td>Discussions: 147 <br> Messages: 3698</td>
			      <td></td>
			    </tr>
			  <?php

			  ?>
			  </tbody>
			</table>

		</div>
	</div>
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