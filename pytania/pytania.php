<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pytania - Mechaniczna pomarańcza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../grafika/favicon/favicon.ico" type="image/x-icon">
</head>
<style>
        body, html {
    height: 100%;
    background-color: black;
    }

    * {
    box-sizing: border-box;
    }

    .bg-image {
    /* The image used */
    background-image: url("../grafika/logo_poma2.jpg");
    background-color: rgba(0, 0, 0, 0.8) ;
    /* Add the blur effect */
    filter: blur(10px);
    -webkit-filter: blur(10px);

    /* Full height */
    height: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.35;
    }

    /* Position text in the middle of the page/image */
    .bg-text {
    background-color: rgb(255,255,255); /* Fallback color */ 
    color: orangered;
    font-weight: bold;
    border: 7px solid orange;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 85%;
    padding: 20px;
    text-align: center;
    border-radius: 5px;
    }
    #stats{
        display: flex;
        flex-direction: row;
        justify-content: center;
        justify-content: space-around;
    }
    h3{
        color: rgb(100, 100, 100);
    }
    #timer{
        border: 4px solid orangered;
        color: darkorange;
        margin-top: 20px !important;
        width: 50%;
        margin: auto;
    }
    #time{
        color: rgb(70,70,70);
    }




</style>
<body>
    <div class="bg-image"></div>

    <div class="bg-text">
    <div id="stats">
        <div id="druzyna"><h2>Nr drużyny:</h2><h3 id="druzyna-data">1</h3></div>
        <hr class="border border-warning border-3 opacity-100" >
        <div id="poziom"><h2>Poziom trudności:</h2><h3 id="poziom-data">1</h3></div>
        <hr class="border border-warning border-3 opacity-100" >
        <div id="kategoria"><h2>Kategoria:</h2><h3 id="poziom-data">NIGGER</h3></div>
    </div>
    <hr class="border border-warning border-3 opacity-100" >
    <h1>Pytanie:</h1>
    <img src="../baza_pytania/chemia/poziom_2/c1.jpg" width="50%">
    <h1>Poprawna odpwiedź:</h1>
    <img src="../baza_pytania/chemia/poziom_2/co1.jpg" width="20%">
    <div id="timer"><h1>Pozostały czas:</h1><h2 id="time">30</h2></div>
    </div>
</body>

</html>
