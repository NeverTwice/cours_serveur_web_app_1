<script>
    
 function newXmlHttpRequest(){
    if(windows.XMLHttpRequest)
        return new XMLHttpRequest();
        return new ActiveXObject("Microsoft.XMLHTTP");
}

function supprimerMessage(){

	var request = newXmlHttpRequest();

	request.onreadystatechange = function(){

	if(request.readyState == 4 && request.status == 200){

		document.getElementById('container_profil').innerHTML = request.responseText;

	}   
        
}
	
	request.open("GET","supprimer.php?id="+id);	
	request.send();
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</script>