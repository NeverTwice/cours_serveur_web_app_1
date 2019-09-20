function newrequest(){
    var request=new XMLHttpRequest();
    if(request==0)
        request=new ActiveXObject("Microsoft.XMLHTTP");
    return request;
}

function supprimerMessage(id){
    
    var query=newrequest();
   
    query.onreadystatechange = function(){
            
            if(query.ReadyState==4 && query.status==200){
               alert("bon");               
        }
        }
    var ide=id;
    query.open("GET","supprimer.php?id="+ide);
    query.send();
    
    

}

function supprimerCommentaire(id){
    
    var query=newrequest();
   
    query.onreadystatechange = function(){
            
            if(query.ReadyState==4 && query.status==200){
               alert("bon");               
        }
        }
    var ide=id;
    query.open("GET","supprimer_com.php?id="+ide);
    query.send();
    
    

}