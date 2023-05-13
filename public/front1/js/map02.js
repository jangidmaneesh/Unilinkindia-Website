function initialize() {
  var myLatlng = new google.maps.LatLng(40.491699, -79.872388); 
  var MY_MAPTYPE_ID = 'custom_style';
  
  var featureOpts = [
    {
      stylers: [
        { hue: '#014473' },
        { visibility: 'simplified' },
        { gamma: 0.5 },
        { weight: 2 }
      ]
    }
  ];
  
  var mapOptions = {
    zoom: 18,
    center: myLatlng,
    disableDefaultUI: true,
	mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    },
    mapTypeId: MY_MAPTYPE_ID
  }
  var map = new google.maps.Map(document.getElementById('map-canvas02'), mapOptions);
  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">InRhythm Solutions</h1>'+
      '<div id="bodyContent">'+
      '<p>235 Alpha Drive, Suite 300 Pittsburgh, PA 15238-2940</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'InRhythm, Inc'
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
  
  
  var styledMapOptions = {
    name: 'Custom Style'
  };

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
  
}

google.maps.event.addDomListener(window, 'load', initialize);