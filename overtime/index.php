<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mechaniczna POmarańcza - OVERTIME</title>
</head>
<script>
     document.addEventListener('DOMContentLoaded', () => {
       const ws = new WebSocket('ws://172.26.0.1:3000/ws');
    

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
<body> 
    <div class="overtimed" id="overtime1">
        <!-- <div class="tytul" id="tytul1">Drużyna 1:</div> -->
        <div class="nazwa" id="nazwa1" style="color:rgb(0, 148, 255)">Drużyna 1</div>
        <br><br><br><br><br>
        <p class="pkt">punkty: <div class="ile" id="score1">-</div></p>
    </div><div class="overtimed" id="overtime2">
        <!-- <div class="tytul" id="tytul2">Drużyna 2:</div> -->
        <div class="nazwa" id="nazwa2" style="color:red">Drużyna 2</div>
        <br><br><br><br><br>
        <p class="pkt">punkty: <div class="ile" id="score2">-</div></p>
    </div>  
</body>
</html>