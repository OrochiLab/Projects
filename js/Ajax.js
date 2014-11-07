 function createRequestObject() {
         
    var request_type;
    var browser = navigator.appName;
 
    if(browser == "Microsoft Internet Explorer"){
 
        request_type = new ActiveXObject("Microsoft.XMLHTTP");
 
    }else{
 
        request_type = new XMLHttpRequest();
 
    }
 
return request_type;
 
}

function PDF(nomAdmin,prenomAdmin,ID_Etudiant){

	alert(nomAdmin);
	var data ='PDF=' +true+ '&ID_Etudiant=' +ID_Etudiant;
    xhr = createRequestObject();
    xhr.open('post', '../Projects/Metier/Pdf_admin.class.php', true);
    xhr.onreadystatechange = goPDF;                                 
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);
}

function goPDF(){

	if(xhr.readyState == 4){
        if(xhr.status == 200){
            alert('katwsal');
        }
    }
}