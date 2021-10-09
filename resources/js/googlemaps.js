function initMap() {
  // [START maps_places_autocomplete_creation]
  const center = { lat: 50.064192, lng: -130.605469 };
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
    types: ["establishment"],
  };
  const autocomplete = new google.maps.places.Autocomplete(input, options);

  // [END maps_places_autocomplete_creation]
  // Set initial restriction to the greater list of countries.
  // [START maps_places_autocomplete_countries_multiple]
  autocomplete.setComponentRestrictions({
    country: ["it"]
  });
}