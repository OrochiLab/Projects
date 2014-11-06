<?php
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion Scolaire | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  <?php
  	if (isset($_GET['page']) and $_GET['page'] != 'Espace_de_gestion_etudiant') {
  ?>
  		<nav class="top-bar foundation-bar" data-topbar>
		  <ul class="title-area">
		    <li class="name">
		     <span data-tooltip class="has-tip" title="Try resizing your browser to see how the grid stacks"><h1 class="show-for-small-only"><a href="#">Small screen</a></h1></span>
		     <span data-tooltip class="has-tip" title="Try resizing your browser to see how the grid stacks"><h1 class="show-for-medium-only"><a href="#">Medium Screen</a></h1></span>
		     <span data-tooltip class="has-tip" title="Try resizing your browser to see how the grid stacks"><h1 class="show-for-large-only"><a href="#">Large screen</a></h1></span>
		    </li>
		  </ul>
		</nav>
  <?php	# code...
  	}
  ?>
	<?php
	require('config.inc.php');
	
		if(isset($_GET['page']))
		{
			$page = $_GET['page'];
			switch($page)
			{
				case 'accueil':
				include('/Pages/accueil.php');
				break;
				
				case 'etudiant':
				include('/Pages/espace_etudiant.php');
				break;
				
				case 'administration':
				include('/Pages/espace_administration.php');
				break;
				
				case 'Espace_de_gestion_administrateur':
				include('/Pages/espace_gestion_administrateur.php');
				break;

				case 'Espace_de_gestion_etudiant':
				include('/Pages/espace_gestion_etudiant.php');
				break;

				default:
				include('/Pages/accueil.php');
				break;
			}
		}
		else
		{
			include('/Pages/accueil.php');
		}
	?>
	<!-- fouter -->
<div id="footer">
	<footer class="row">
		<div class="large-12 columns"><hr>
			<div class="row">
				<div class="large-6 columns">
					<p><small>© Copyright  Med Amine OUASMINE & Mouad MORABIT 2014.</small></p>
				</div>
				<div class="large-6 columns">
					<ul class="inline-list right">
						<li><a href="#">Contacts</a></li>
						<li><a href="#">Ensa Khouribga</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Googles +</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer><div>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script type="text/javascript">
	 $(window).bind("load", function () {
    var footer = $("#footer");
    var pos = footer.position();
    var height = $(window).height();
    height = height - pos.top;
    height = height - footer.height();
    if (height > 0) {
        footer.css({
            'margin-top': height + 'px'
        });
    }
});
</script>
  </body>
</html>
