function trie () {
	var nom = document.contact.nom.value; 
	alert(nom);
 
	//création de la variable contenant les valeurs à passer à la deuxième page PHP
		//idNom est l'identifiant de la valeur par la méthode du formulaire (GET ou POST)
		//c'est cet identifiant qui est utilisé dans la deuxième page PHP
	var data = "idNom=" + nom;
 
 
	//fonction permettant d'afficher le résultat renvoyé par la deuxième page PHP
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4) {		//ligne obligatoire
			if (xhr.status == 200) {	//ligne obligatoire
 
				//récupération du block dans lequel afficher le résultat de la deuxième page PHP
				//en utilisant xhr.responseText (qui récupère le contenu des echo PHP)
				document.getElementById('tel').value = xhr.responseText;
			}
		}
	};	//ne pas oublier le point-virgule en fin
 
	//ouverture du fichier donné (deuxième page PHP) selon la méthode du formulaire
		//true définit le mode asynchrone de la demande
	xhr.open("POST", "page2.php", true);
 
	//ligne obligatoire lors d'une ouverture de fichier en méthode POST
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
	//ligne obligatoire dont la variable doit obligatoirement être définie en méthode POST (cf ligne 32)
		//xhr.send(null) pour une méthode GET
	xhr.send(data);
}