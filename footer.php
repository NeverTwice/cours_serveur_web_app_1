    <div class="row">
        <div class="col-lg-12">
            <footer>
                <p id="footertext">Tous droits réservés © The Ravers 2015</p>
            </footer>
        </div>    
    </div>
</div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/npm.js"></script>
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="js/zoombox.js"></script>
    <script type="text/javascript" src="js/pop-up.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/moment.js"></script>
    <script type="text/javascript" src="js/mybox.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
    var x=document.getElementById("demo");
    function getLocation()
      {
      if (navigator.geolocation)
        {
        navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
      else{x.innerHTML="Geolocation is not supported by this browser.";}
      }

    function showPosition(position)
      {
      lat=position.coords.latitude;
      lon=position.coords.longitude;
      latlon=new google.maps.LatLng(lat, lon)
      mapholder=document.getElementById('mapholder')
      mapholder.style.height='250px';
      mapholder.style.width='500px';

      var myOptions={
      center:latlon,zoom:14,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      mapTypeControl:false,
      navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
      };
      var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
      var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
      }

    function showError(error)
      {
      switch(error.code) 
        {
        case error.PERMISSION_DENIED:
          x.innerHTML="User denied the request for Geolocation."
          break;
        case error.POSITION_UNAVAILABLE:
          x.innerHTML="Location information is unavailable."
          break;
        case error.TIMEOUT:
          x.innerHTML="The request to get user location timed out."
          break;
        case error.UNKNOWN_ERROR:
          x.innerHTML="An unknown error occurred."
          break;
        }
      }
    </script>
    </body>
</html>