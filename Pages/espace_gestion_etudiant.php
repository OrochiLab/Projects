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
									<li>Demande de modification de données</li>
									<li>Demande de certificat</li>
								</ul>
							</div>
						</div>
			</div>
		</div>
		</section>
		  <a class="exit-off-canvas"></a>
	  </div>
	</div>

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