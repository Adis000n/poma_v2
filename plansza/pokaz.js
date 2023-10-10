let suwakX = document.getElementById("myX");
let wartoscSuwakaX = document.getElementById("wartoscSuwakaX");

let suwakY = document.getElementById("myY");
let wartoscSuwakaY = document.getElementById("wartoscSuwakaY");

// Funkcja do aktualizacji wartości suwaka X
function aktualizujSuwakX() {
    wartoscSuwakaX.textContent = suwakX.value;
}

// Funkcja do aktualizacji wartości suwaka Y
function aktualizujSuwakY() {
    wartoscSuwakaY.textContent = suwakY.value;
}

// Dodajemy nasłuchiwanie zdarzenia zmiany wartości suwaka X
suwakX.addEventListener("input", aktualizujSuwakX);

// Dodajemy nasłuchiwanie zdarzenia zmiany wartości suwaka Y
suwakY.addEventListener("input", aktualizujSuwakY);