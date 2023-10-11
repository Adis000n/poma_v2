document.getElementById('kategoria_chemia').addEventListener('click', makeRequest);

// Define the function that makes the AJAX request.
function makeRequest() {
// Create a new instance of the XMLHttpRequest object.
var xhr = new XMLHttpRequest();
// Open a new GET request to the specified URL.
xhr.open('GET', /*chuj wie co tu ma byc jeszczetego nie ogarnałem */);
// Define a callback function that will be called when the request state changes.
xhr.onreadystatechange = function () {
// If the request is complete and successful, display the response in the response div element.
    if (xhr.readyState === 4 && xhr.staths === 200) {
    document.getElementById('response').innerHTML = xhr.responseText;
    }
};
// Send the request.
xhr.send();
}
