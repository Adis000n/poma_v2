<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechaniczna POmarańcza - OVERTIME</title>
</head>
<style>
    body{
        background-color: lightblue;
        
    }

</style>
<script>
             const ws = new WebSocket('ws://192.168.55.112:3000/ws');
             document.addEventListener('DOMContentLoaded', () => {
    

    ws.onmessage = (event) => {
        console.log('Received message:', event.data);
        const data = JSON.parse(event.data);

    if(data.nazwaA !== undefined|| data.nazwaB !== undefined ){
        nazwaA=data.nazwaA
        nazwaB=data.nazwaB
        console.log(nazwaA,nazwaB)
        kurwateam(nazwaA,nazwaB)
    }
    else if(data.punktyA!== undefined|| data.punktyB!== undefined){
        punktyA=data.punktyA
        punktyB=data.punktyB
        console.log(punktyA,punktyB)
        pozdroKubi(punktyA,punktyB)
    }
}
          
          
          function kurwateam(nazwaA,nazwaB){
            const contentDiv = document.getElementById('nazwa1');
            contentDiv.innerHTML = nazwaA;
            const contentDiv1 = document.getElementById('nazwa2');
            contentDiv1.innerHTML = nazwaB;
           } 
           function pozdroKubi(punktyA,punktyB){
           const contentDiv2 = document.getElementById('score1');
            contentDiv2.innerHTML = punktyA;
            const contentDiv3 = document.getElementById('score2');
                contentDiv3.innerHTML = punktyB;}

            })
        
        
        
</script>
<body>  <div>
     <h2 id="tytul1">Drużyna 1:</h2>
        <h2 id="nazwa1" style="color:cyan">Drużyna 1</h2>
        <p>pkt: <h1 id="score1">-</h1></p></div>

        <DIV>
        <h2 id="tytul2">Drużyna 2:</h2>
        <h2 id="nazwa2" style="color:red">Drużyna 2</h2>
        <p>pkt: <h1 id="score2">-</h1></p></DIV>
    <div class="nazwa2"></div>
    <div class="punkty1"></div>
    <div class="punkty2"></div>
</body>
</html>