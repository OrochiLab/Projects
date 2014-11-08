<?php
require_once('Metier/DemandeManager.class.php');
require_once('Metier/AdministrateurManager.class.php');
require_once('Metier/EtudiantManager.class.php');

session_start();
if(isset($_POST['cne']))
{	
		
	$etudiant = EtudiantManager::getById(((isset($_POST['cne']))?$_POST['cne']:$_SESSION['cne']));
	if(isset($etudiant))
		SessionManager::Connecter($etudiant);
}
if(isset($_POST['login']) and isset($_POST['password']))
{
	$administrateur = AdministrateurManager::getByLogin($_POST['login'],$_POST['password']);
	if(isset($administrateur))
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
	<link rel="stylesheet" href="css/bootstrap-icons.css" />
	
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
	<?php 
	include_once('/includes/header.php');
	?>
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
				
				case 'espace_validation_corrections':
				include('/Pages/espace_validation_corrections.php');
				break;
				
				case 'details_etudiant':
				include('/Pages/details_etudiant.php');
				break;
				
				default:
				include('/Pages/accueil.php');
				break;
			}
		}
		
	?>
	</div>
	</div>
	<!-- fouter -->
	<?php
	include_once('/includes/footer.php');
	?>
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
<script type="text/javascript" src="js/Ajax.js"></script>
  </body>
</html>
