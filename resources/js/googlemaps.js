export default function initMap() {

  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 42, lng: 15 },
    zoom: 5.5,
    disableDefaultUI:true
  });
  const card = document.getElementById("pac-input");

  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

  // [START maps_places_autocomplete_creation]
  const center = { lat: 42, lng: 15 };
  // Create a bounding box with sides ~10km away from the center point
  const defaultBounds = {
    north: center.lat + 0.1,
    south: center.lat - 0.1,
    east: center.lng + 0.1,
    west: center.lng - 0.1,
  };
  const input = document.getElementById("pac-input");
  const options = {
    bounds: defaultBounds,
    componentRestrictions: { country: "it" },
    fields: ["address_components", "geometry", "icon", "name"],
    strictBounds: false,
    types: ["address"],
  };
  const autocomplete = new google.maps.places.Autocomplete(input, options);

  // [END maps_places_autocomplete_setbounds]
  //const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");

  //infowindow.setContent(infowindowContent);

  const marker = new google.maps.Marker({
    map,
    anchorPoint: new google.maps.Point(0, -29),
  });

  autocomplete.addListener("place_changed", () => {
    //infowindow.close();
    //marker.setVisible(false);

    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      //window.alert("No details available for input: '" + place.name + "'");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17); // Why 17? Because it looks good.
    }

    marker.setPosition(place.geometry.location);
    //marker.setVisible(true);

    const values = ['street_number','route','locality','country','postal_code'];

    values.forEach(element => {
      infowindowContent.children[element].value = '';
    });
    
    place.address_components.forEach(element => {
      let index = element.types[0];
      if(values.indexOf(index) !== -1){
        infowindowContent.children[index].value = element.short_name;
      }
    });
    
    //infowindow.open(map, marker);
  });

}