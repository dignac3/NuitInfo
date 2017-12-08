function initialize() {
  var panorama = new google.maps.StreetViewPanorama(
    document.getElementById('pano'), {
      position: {lat: 48.865497197140144, lng: 2.3308277119940612},
      visible: true,
      fullscreenControl: false,
      keyboardShortcuts: false,
      zoomControl : false,
      panControl: false,
      addressControl: false,
      linksControl : false,
      clickToGo: false
    });

    panorama.addListener('pano_changed', function() {
      var panoCell = document.getElementById('pano-cell');
      panoCell.innerHTML = panorama.getPano();

    });



    panorama.addListener('position_changed', function() {
      var positionCell = document.getElementById('position-cell');
      positionCell.firstChild.nodeValue = panorama.getPosition() + '';

    });

    panorama.addListener('pov_changed', function() {
      var headingCell = document.getElementById('heading-cell');
      var pitchCell = document.getElementById('pitch-cell');
      headingCell.firstChild.nodeValue = panorama.getPov().heading + '';
      pitchCell.firstChild.nodeValue = panorama.getPov().pitch + '';
    });
  }
