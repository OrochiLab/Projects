<style type="text/css">
#stat td,#stat th
{
text-align:center;
}
</style>

<?php
if(isset($_SESSION['login']))
{

?>	<script type="text/javascript" ></script>
	<div class="row"><br></div>
	<div data-alert class="alert-box">
	  <!-- Your content goes here -->
	  <i class="icon-white icon-bell"></i> Bienvenue <strong><?php echo htmlspecialchars($_SESSION['nom'].' '.$_SESSION['prenom']);?></strong> a votre espace d'administration!
	  </div>
	<div>
		<div class="large-12 colums">
		
			<table id="stat" class="medium-6" style="float:left;">
			  <thead>
			    <tr>
			      <th width="800" rowspan="3" style="text-align:center">Fillières</th>
				  <th colspan="3">Total</th>
				</tr>
				<tr>
					<th colspan="2">Traités</th>
					<th width="150" rowspan="2">Non traités</th>
				</tr>
				<tr>
					<th width="150">Acceptés</th>
					<th width="150">Refusés</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php 
			  		$statistiques = DemandeManager::statistiques();
					foreach($statistiques as $filiere=>$demandes)
					{
			  ?>
			    <tr>
			      <th rowspan="3">
					<?php echo $demandes['nom_fil']; ?>
				  </th>
			      <td><?php echo $demandes['accepte']; ?></td>
			      <td><?php echo $demandes['refus']; ?></td>
			      <td rowspan="2"><?php echo $demandes['nontraite']; ?></td>
			    </tr>
				<tr>
					<td colspan="2"><?php echo $demandes['traite']; ?></td>
				</tr>
				<tr>
					<td colspan="3" id="<?php echo $filiere.'total'; ?>"><?php echo $demandes['total']; ?></td>
				</tr>
			  <?php
					}
			  ?>
			  </tbody>
			</table>

			
			  <!--<div class="medium-3 columns">
				<div id="canvas-holder" class="small-2 large-4 columns">
				  		<div style="width:1100%">
							<canvas id="canvas" height="550" width="550"></canvas>
						</div>
				  	</div>

			  </div>
			  <div class="medium-3 columns">
			  	
			  </div>-->
			  <div class="medium-6" style="float:right;text-align:center;">
			  <h5>Répartition des demandes par filière</h5>
				<div id="canvas-holder" class="small-2 large-4 columns" >
					<canvas id="graphe-stat" width="500" height="300" />
				</div>
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
<script type="text/javascript" src="jquery.js"></script>
				<script>

						$(document).ready(function(){
						var valeurs = [
								{
									value: parseInt($('#GItotal').html()),
									color:"#F7464A",
									highlight: "#FF5A5E",
									label: "Genie Informatique"
								},
								{
									value: parseInt($('#GEtotal').html()),
									color: "#46BFBD",
									highlight: "#5AD3D1",
									label: "Genie Electrique\n"
								},
								{
									value: parseInt($('#GPtotal').html()),
									color: "#FDB45C",
									highlight: "#FFC870",
									label: "Genie Procedès"
								},
								{
									value: parseInt($('#GRTtotal').html()),
									color: "#949FB1",
									highlight: "#A8B3C5",
									label: "Genie Réseaux Télécoms"
								}

							];
						
						/*var radarChartData = {
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
						};*/
						window.onload = function(){

							var context = document.getElementById("graphe-stat").getContext("2d");
							window.myPie = new Chart(context).Pie(valeurs);
							/*window.myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData, {
								responsive: true
							});*/
						}
						});
				</script>