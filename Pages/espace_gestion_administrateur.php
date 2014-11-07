<?php
if(isset($_SESSION['login']))
{

?>	<script type="text/javascript" ></script>
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
			<div class="row">
			  <div class="medium-3 columns">
				<div id="canvas-holder" class="small-2 large-4 columns">
				  		<div style="width:1100%">
							<canvas id="canvas" height="550" width="550"></canvas>
						</div>
				  	</div>

			  </div>
			  <div class="medium-3 columns">
			  	
			  </div>
			  <div class="medium-5 columns">
				<div id="canvas-holder" class="small-2 large-4 columns">
					<canvas id="chart-area-1" width="400" height="400"/>
				</div>
			  </div>
			</div>

			<div class="row">

			</div>
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
				<script>

						var pieData = [
								{
									value: 300,
									color:"#F7464A",
									highlight: "#FF5A5E",
									label: "Red"
								},
								{
									value: 50,
									color: "#46BFBD",
									highlight: "#5AD3D1",
									label: "Green"
								},
								{
									value: 100,
									color: "#FDB45C",
									highlight: "#FFC870",
									label: "Yellow"
								},
								{
									value: 40,
									color: "#949FB1",
									highlight: "#A8B3C5",
									label: "Grey"
								},
								{
									value: 120,
									color: "#4D5360",
									highlight: "#616774",
									label: "Dark Grey"
								}

							];
						var radarChartData = {
							labels: ["Demandes Traitées", "Demandes Non-Traitées","Demandes Refusées"],
							datasets: [
								{
									label: "Génie Informatique",
									fillColor: "rgba(248,34,3,0.2)",
									strokeColor: "rgba(248,34,3,0.2)",
									pointColor: "rgba(248,34,3,0.2)",
									pointStrokeColor: "#fff",
									pointHighlightFill: "#fff",
									pointHighlightStroke: "rgba(220,220,220,1)",
									data: [65,59,79]
								},

								{
									label: "Génie Réseaux Télècom",
									fillColor: "rgba(250,80,205,0.2)",
									strokeColor: "rgba(250,80,205,0.2)",
									pointColor: "rgba(250,80,205,0.2)",
									pointStrokeColor: "#fff",
									pointHighlightFill: "#fff",
									pointHighlightStroke: "rgba(151,187,205,1)",
									data: [28,48,50]
								},

																{
									label: "Génie Electrique",
									fillColor: "rgba(73,11,240,0.2)",
									strokeColor: "rgba(73,11,240,0.2)",
									pointColor: "rgba(73,11,240,0.2)",
									pointStrokeColor: "#fff",
									pointHighlightFill: "#fff",
									pointHighlightStroke: "rgba(151,187,205,1)",
									data: [8,4,5]
								},

								{
									label: "Génie Procedé",
									fillColor: "rgba(35,184,216,0.2)",
									strokeColor: "rgba(35,184,216,0.2)",
									pointColor: "rgba(35,184,216,0.2)",
									pointStrokeColor: "#fff",
									pointHighlightFill: "#fff",
									pointHighlightStroke: "rgba(151,187,205,1)",
									data: [20,25,10]
								}
							]
						};
						window.onload = function(){
							var ctx_1 = document.getElementById("chart-area-1").getContext("2d");
							window.myPie = new Chart(ctx_1).Pie(pieData);
							window.myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData, {
								responsive: true
							});
						}
				</script>