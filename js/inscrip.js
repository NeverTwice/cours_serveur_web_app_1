/*
<div id="inscrip">
    <div id="inscrip_aplat"></div>
    <div id="inscrip_loader"></div>
    <div id="inscrip_conteneur">
        <div id="incrip_relative">
            <div id="inscrip_close"></div>
                <div id="inscrip_contenu">
                    
                </div>   
        </div>
    </div>
</div>
*/

$(document).ready(function(){
    
    inscrip.init();
    
});

inscrip = {
    
    init : function() {
        inscrip.opacity = 0.2;
        $('a[rel="inscrip"]').click(function(){
            
            inscrip.lien = $(this).attr("href");
            inscrip.open(inscrip.lien);
            return false;
        });
    },
    
    open : function(lien){
        
        inscrip.lien = lien;
        $("body").append('<div id="inscrip"><div id="inscrip_aplat"></div><div id="inscrip_loader"></div> <div id="inscrip_conteneur"><div id="incrip_relative"><div id="inscrip_close"></div><div id="inscrip_contenu"></div></div></div></div>'); 
        $("#inscrip_conteneur").hide();
        $("#inscrip_loader").hide().fadeIn();
        $("#inscrip_aplat").css("opacity",0).fadeTo(500,inscrip.opacity);
        
    
    inscrip.img = new Image();
    inscrip.img.src = inscrip.lien;
    inscrip.timer = window.setInterval(inscrip.load,100);
     
    },
     

    load : function(){
     
        if(inscrip.img.complete){
            window.clearInterval(inscrip.timer);
            inscrip.anim();  
        }
        
    },
    
    anim : function(){
        $("#inscrip_conteneur").show();
    
        inscrip.largeur = inscrip.img.width;
        inscrip.hauteur = inscrip.img.height;
        $("#inscrip_contenu").append('<div class="col-lg-12" ><div id="form"><form method="POST" action="inscription.php"><div class="form-group"><label for="exampleInputEmail1">Name</label><input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"></div<div class="form-group"><label for="exampleInputEmail1">Surname</label><input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Surname"></div><div class="form-group"><label for="exampleInputEmail1">Email</label><input type="email" class="form-control" id="email" name="email" placeholder="Enter email"></div><div class="form-group"><label for="exampleInputPassword1">Password</label><input type="password" class="form-control" name="pwd" id="pwd"></div><div class="form-group"><label for="exampleInputPassword1">Confirm Password</label><input type="password" class="form-control" name="pwd2" id="pwd"></div><div class="checkbox"><label><input type="checkbox"> Check me out</label></div><button type="submit" class="btn btn-default">Sinscrire</button></form></div></div>');
        $("#inscrip_conteneur").animate({width: inscrip.largeur, height: inscrip.hauteur},500);
}
    
    
    
    
    
    
    
}
                