document.addEventListener('DOMContentLoaded',function(){  //wczytanie fukcji podczas gdy cała strona się załaduje (chyba) podkurwiłem kod ze starego B)
    function hideAdm(){                                   // Funkcja hideADM podczas gdy document.getElementById('hideMe').addEventListener('click',hideAdm); się spełni
        document.getElementById('ADMIN').style.display = 'none';    // Żeby nie było widać XD
    }
    function showAdm(){ //FUNKCJA showADM aktywowana gdy document.getElementById('ShowAdm').addEventListener('click',showAdm); się spełn
        document.getElementById('ADMIN').style.display = 'block'; // żeby było widać XD
    }
    document.getElementById('hideMe').addEventListener('click',hideAdm); // ODCZYT NACIŚNIĘCIA PRZYCISKU HIDE NA PLANSZA PHP
    document.getElementById('ShowAdm').addEventListener('click',showAdm);// ODCZYT NACIŚNIĘCIA  IKONY NA PLANSZA PHP
    
    });
