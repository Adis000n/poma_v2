const xhr = new XMLHttpRequest();
xhr.open("POST", "../plansza/plansza4.php", true);
xhr.send(druzyny);
xhr.addEventListener("load", () => {
    //tutaj możemy też sprawdzać inne statusy - np. 404, 500
    if (xhr.status === 200) {
        console.log("UDAŁO SIĘ POŁĄCZYĆ ALBO BARDZIEJ WPIERDOLIĆ DANE NA SERWER");
        console.log(xhr.send);
    }
});

xhr.addEventListener("error", () => {
    alert("Niestety nie udało się nawiązać połączenia");
});
xhr.open("GET", "../plansza/plansza4.php", true);
xhr.send(druzyny);