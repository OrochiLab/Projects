<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Gestion scolaire</title>
	<script type="text/javascript" src="jquery.js" ></script>
</head>
<body>

	<?php
	
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
	
	
	<script type="text/javascript">
        $(document).ready(function(){
            console.log("JQuery actif ");
        });
    </script>
</body>
</html>