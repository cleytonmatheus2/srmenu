<!DOCTYPE html>
<html lang='en'>
   <head>
      <title>Find Location</title>
      <meta charset='utf-8' />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
 
    <script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=API_KEY_HERE" type="text/javascript"></script>

<button id="resultados">RESULTADO</button>
<span id="response"></span>



<div id="container">
      <div id="map"></div>
      <div id="sidebar">
        <h3 style="flex-grow: 0">Request</h3>
        <pre style="flex-grow: 1" id="request"></pre>
        <h3 style="flex-grow: 0">Response</h3>
        <pre style="flex-grow: 1" id="response"></pre>
      </div>
    </div>





<script>

let btn = document.querySelector("#resultados");

btn.addEventListener("click", initMap)

function initMap() {
  
  // initialize services
  
  const service = new google.maps.DistanceMatrixService();
  // build request
  const origin = '32050370';
  const destination = '32050650';
  const request = {
    origins: [origin],
    destinations: [destination],
    travelMode: google.maps.TravelMode.DRIVING,
    unitSystem: google.maps.UnitSystem.METRIC,
    avoidHighways: false,
    avoidTolls: false,
  };

//   // put request on page
//   document.getElementById("request").innerText = JSON.stringify(
//     request,
//     null,
//     2,
//   );



  // get distance matrix response
  service.getDistanceMatrix(request).then((response) => {

    console.log(response.rows[0].elements[0].duration.text);

    console.log(response);
    // put response
    document.getElementById("response").innerText = JSON.stringify(
      response,
      null,
      2,
    );




    
  });
}


</script>


   </body>
</html>
