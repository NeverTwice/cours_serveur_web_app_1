$(document).ready(function(){
    
    mybox.init();
});

mybox = {
    
    init : function(){
            mybox.opacite = 0.70;
            mybox.duree = 1000;
            mybox.largeur = 400;
            mybox.hauteur = 200;
        $("a[rel='mybox']").click(function(){
            
            mybox.lien = $(this).attr("href");
            mybox.open(mybox.lien);
        });   
        
        $(window).resize(mybox.redim);
    },
    
    open : function(mybox.lien){
     
        mybox.lien = mybox.lien;
        $('#contenu').append('<div id="mybox"> <div id="mybox_aplat"></div><div id="mybox_loader"></div><div id="mybox_conteneur"><div id="mybox_relative"><div id="mybox_close"></div><div id="mybox_contenu"></div></div></div></div>');
        $('#mybox_conteneur').hide();
        $('#mybox_loader').hide().fadeIn();
        $('#mybox_aplat').css('opacity',0).fadeTo(500,mybox.opacite);
        
        mybox.img = new Image();
        mybox.img.src = mybox.lien;
        mybox.timer = window.setInterval(mybox.load,100); //sur quoi et en milisecondes
        
        $("#mybox_close").click(mybox.close);
        $("#mybox_aplat").click(mybox.close);
    },
    
    load : function(){
        if(mybox.img.complete){
            window.clearInterval(mybox.timer); //evité de répéter l'affichage de l'alert car timer pas arrêté
            
            mybox.anim();
        }
            
            
    },
    
    anim : function(){
        $('#mybox_conteneur').show();
        
        $('#mybox_contenu').css('width',mybox.largeur+"px").css('height',mybox.hauteur+'px');
        
        mybox.largeur = mybox.img.width;
        mybox.hauteur = mybox.img.height;

        mybox.redim();
        
        $('#mybox_loader').fadeOut();
        $('#mybox_contenu').append('<img src="'+mybox.lien+'"/>');
        $('#mybox_contenu img').hide();
        $('#mybox_contenu').animate({width:mybox.largeur} , mybox.duree/2).animate({height:mybox.hauteur},mybox.duree/2, "easeOutQuad", function(){; // 500 car deux anims differentes. Easing - type d'annim et Callback - appeler une autre fonction
                $('#mybox_contenu img').fadeIn();                                                                                                                                     
        
    });
        
    },
    
    redim : function(){
            
        $('#mybox_conteneur').css("left",(mybox.windowW()-mybox.largeur)/2+"px");
        $('#mybox_conteneur').css("top",(mybox.scrollY+(mybox.windowH()-mybox.hauteur)/2)+"px");
        
    },
    
    close : function(){
        $('#mybopx').fadeOut(500,function(){
            $('#mybox').remove();
        })
        
    },
    
    windowH : function(){
            if (window.innerHeight) return window.innerHeight; //positioner la boite
        else{ return $(window).height();}
    },
    
    windowW : function(){
            if (window.innerWidth) return window.innerWidth;
        else{ return $(window).width();}
    
    },
    
    scrollY : function(){
        scrOfY = 0;
        if(typeof(window.pageYOffset) == 'number'){
            scrOfY = window.pageYOffset;
        }else if (document.body && (document.body.scrollTop)){
            scrOfY = document.body.scrollTop;
        }else if (document.documentElement && (document.documentElement.scrollTop)){
            scrOfY = document.documentElement.scrollTop;
        }
        return scrOfY;
        alert(scrOfY);
            
          
    }
}