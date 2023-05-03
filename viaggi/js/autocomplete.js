// Con JS si possono prendere gli elementi dall'html e modificarli o aggiungerci roba
const partenza = $('#partenza'); // Prendo l'elemento con ID="text_field" dall'html
const destinazione = $('#destinazione');
const locations = $('#locations'); // Prendo l'elemento con ID="locations" dall'html

const API_KEY = '85e7830e45024676b0e84da4294b2685' // Salvo l'API key di geoapify

//getCurrentPosition();

// Aggiungiamo un listener di tipo "input" alla textField e gli bindiamo una funzione senza nome che verrà runnata ogni volta che cambia qualcosa in questo listener
partenza.keypress(() => {
    const url = 'https://api.geoapify.com/v1/geocode/autocomplete?text='+partenza.val()+'&apiKey='+API_KEY+'&lang=it' // Mi preparo l'URL su cui fare la richiesta

    const request = new XMLHttpRequest();   // Istanzio l'oggetto per fare richieste 
    request.open('GET', url)    // Apriamo una richiesta get con l'url salvato sopra
    request.send();     // Mandiamo la richiesta

    // request.onload viene triggerato quando otteniamo una risposta dall'url
    request.onload = () => {
        //TODO controllare che request.status abbia un codice di successo e non 404 e tutti i vari controlli
        jsonResponse = JSON.parse(request.response) // Otteniamo la risposta e la parsiamo in un JSON
        console.log(jsonResponse);
        locations.empty(); // Questo serve a cancellare tutti i sottoelementi della div con id="locations"
        
        jsonResponse['features'].forEach(element => {  // Andiamo dentro ogni oggetto 'feature' del JSON
            var placeNode = document.createElement('li') // Creiamo un elemento con il tag <li>
            placeNode.innerHTML = element['properties']['formatted']   // Aggiungiamo questo testo nel paragrafo
            locations.append(placeNode)    // Aggiungiamo il paragrafo nell'html
            placeNode.click( function () {
                partenza.value=placeNode.textContent;
                locations.empty();
            });
        });
    }
});

destinazione.keypress(() => {
    const url = 'https://api.geoapify.com/v1/geocode/autocomplete?text='+destinazione.val()+'&apiKey='+API_KEY+'&lang=it' // Mi preparo l'URL su cui fare la richiesta

    const request = new XMLHttpRequest();   // Istanzio l'oggetto per fare richieste 
    request.open('GET', url)    // Apriamo una richiesta get con l'url salvato sopra
    request.send();     // Mandiamo la richiesta

    // request.onload viene triggerato quando otteniamo una risposta dall'url
    request.onload = () => {
        //TODO controllare che request.status abbia un codice di successo e non 404 e tutti i vari controlli
        jsonResponse = JSON.parse(request.response) // Otteniamo la risposta e la parsiamo in un JSON
        console.log(jsonResponse);
        locations.empty(); // Questo serve a cancellare tutti i sottoelementi della div con id="locations"
        
        jsonResponse['features'].forEach(element => {  // Andiamo dentro ogni oggetto 'feature' del JSON
            var placeNode = document.createElement('li') // Creiamo un elemento con il tag <li>
            placeNode.innerHTML = element['properties']['formatted']   // Aggiungiamo questo testo nel paragrafo
            locations.append(placeNode)    // Aggiungiamo il paragrafo nell'html
            placeNode.click( function () {
                destinazione.value=placeNode.textContent;
                locations.empty();
            });
        });
    }
});

function getCurrentPosition() {
    const url = 'https://api.geoapify.com/v1/ipinfo?apiKey='+API_KEY;

    const request = new XMLHttpRequest();   // Istanzio l'oggetto per fare richieste 
    request.open('GET', url);   // Apriamo una richiesta get con l'url salvato sopra
    request.send();     // Mandiamo la richiesta

    request.onload = () => {    
        //TODO controllare che request.status abbia un codice di successo e non 404 e tutti i vari controlli
        jsonResponse = JSON.parse(request.response) // Otteniamo la risposta e la parsiamo in un JSON
        locations.replaceChildren() // Questo serve a cancellare tutti i sottoelementi della div con id="locations"
        
        element=jsonResponse['city']
        var placeNode = document.createElement('a') // Creiamo un elemento con il tag <p>
        placeNode.setAttribute("href", "#");
        placeNode.classList.add("d-block");
        placeNode.classList.add("text-white");
        placeNode.classList.add("text-center");
        placeNode.classList.add("text-decoration-none");
        placeNode.innerHTML = element['name']  // Aggiungiamo questo testo nel paragrafo
        locations.append(placeNode)    // Aggiungiamo il paragrafo nell'html
        placeNode.addEventListener('click', function () {
            partenza.value=placeNode.textContent;
            locations.replaceChildren();
        });
    };
}

function autocomplete(input) {

    const url = 'https://api.geoapify.com/v1/geocode/autocomplete?text='+input.value+'&apiKey='+API_KEY+'&lang=it' // Mi preparo l'URL su cui fare la richiesta

    const request = new XMLHttpRequest();   // Istanzio l'oggetto per fare richieste 
    request.open('GET', url)    // Apriamo una richiesta get con l'url salvato sopra
    request.send();     // Mandiamo la richiesta

    // request.onload viene triggerato quando otteniamo una risposta dall'url
    request.onload = () => {
        //TODO controllare che request.status abbia un codice di successo e non 404 e tutti i vari controlli
        jsonResponse = JSON.parse(request.response) // Otteniamo la risposta e la parsiamo in un JSON
        console.log(jsonResponse);
        locations.empty(); // Questo serve a cancellare tutti i sottoelementi della div con id="locations"
        
        jsonResponse['features'].forEach(element => {  // Andiamo dentro ogni oggetto 'feature' del JSON
            var placeNode = document.createElement('li') // Creiamo un elemento con il tag <li>
            placeNode.innerHTML = element['properties']['formatted']   // Aggiungiamo questo testo nel paragrafo
            locations.append(placeNode)    // Aggiungiamo il paragrafo nell'html
            placeNode.click( function () {
                partenza.value=placeNode.textContent;
                locations.empty();
            });
        });
    }
}