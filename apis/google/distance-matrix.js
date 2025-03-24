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

    // put response
    console.log(response);
    document.getElementById("response").innerText = 'Response in Console'
    // document.getElementById("response").innerText = JSON.stringify(
    //   response,
    //   null,
    //   2,
    // );




    
  });
}
