<?php
require_once('Metier/DemandeManager.class.php');
require_once('Metier/AdministrateurManager.class.php');
require_once('Metier/EtudiantManager.class.php');

session_start();
if(isset($_POST['cne']))
{	
		
	$etudiant = EtudiantManager::getById(((isset($_POST['cne']))?$_POST['cne']:$_SESSION['cne']));
	SessionManager::Connecter($etudiant);
}
if(isset($_POST['login']) and isset($_POST['password']))
{
	$administrateur = AdministrateurManager::getByLogin($_POST['login'],$_POST['password']);
	SessionManager::Connecter($administrateur);
}




if(!isset($_GET['page']))
	$_GET['page']='accueil';
	
if($_GET['page']=='Deconnexion')
{
	$_SESSION = array();
	session_destroy();
}

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
	<div class="row large-12">
  		<nav class="top-bar foundation-bar" data-topbar>
				<ul class="title-area">
					<li class="name">
					<h1><a href="?page=accueil">ENSA Khouribga</a></h1>
					</li>
				</ul>
			
			<section class="top-bar-section">
				<ul class="right">
					<?php
					if(isset($_SESSION['type']))
					{
					?>
					<li class="divider"></li>
						<?php
						if($_SESSION['type']=='Etudiant')
						{
						?>
					<li <?php if($_GET['page']=='espace_demandes_etudiant') echo 'class="active"' ?>><a href="?page=espace_demandes_etudiant">Demandes d'attestation</a></li>
						<?php
						}
						else
						{
						?>
						<li class="has-dropdown"><a href="#">Demandes des étudiants</a>
						<ul class="dropdown">
						<li><a href="?page=espace_validation_demandes">Demandes d'attestation</a></li>
						<li><a href="#">Demandes de correction</a></li>
						</ul>
						</li>
						<?php
						}
						?>
						
					<li class="divider"></li>
					<li class=" <?php if($_GET['page']!='espace_demandes_etudiant' ) echo 'active' ?> has-dropdown"><a href="?page=<?php echo ($_SESSION['type']=='Etudiant')?'Espace_de_gestion_etudiant':'Espace_de_gestion_administrateur'?>"><?php echo $_SESSION['type'].' : '.htmlspecialchars($_SESSION['nom'].' '.$_SESSION['prenom']);?></a>
					<ul class="dropdown">
                    <li><a href="?page=Deconnexion">Se Deconnecter</a></li>
					</ul>
					</li>
					<?php
					}
					else
					{
					?>
					<li class="divider"></li>
					<li <?php if($_GET['page']=='etudiant') echo 'class="active"' ?>><a href="?page=etudiant">Espace Etudiant</a></li>
					<li class="divider"></li>
					<li <?php if($_GET['page']=='administration') echo 'class="active"' ?>><a href="?page=administration">Espace Administration</a></li>
					<?php
					}
					?>
				</ul>
				</section>
				
			</nav>
	</div>
	<div class="row">
	<div class="large-12">
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

				case 'espace_demandes_etudiant':
				include('/Pages/espace_demandes_etudiant.php');
				break;
				
				case 'espace_validation_demandes':
				include('/Pages/espace_validation_demandes.php');
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
	</div>
	</div>
	<!-- fouter -->
<div id="footer">
	<footer class="row">
		<div class="large-12"><hr>
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
	<script type="text/javascript" src="js/Chart.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
	<script type="text/javascript" src="jquery.js" ></script>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script type="text/javascript">
     $(document).foundation();
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
