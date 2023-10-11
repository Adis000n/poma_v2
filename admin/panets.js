const druzyny=[]; //tablica druzyny
  
function startevent(){ //funkcja która działa po naciścięciu start konkursu

  if(eventstatus==1){
    alert("Konkurs już aktywny")
  }
  else if(eventstatus==0){
    alert("TWOJA DUPA W HANNOWERZE OPIERDALA 4 WIERZE"); //taki żarcik 😊
    ilosc_druzyn=Number(prompt("Podaj liczbe druzyn min 2 max 4)",4)) // PROMPT do podania liczby druzyn
    for(let i=1;i<=ilosc_druzyn;i++){                                 //Pentla od nazw drużyn
    druzyny.push(prompt("Podaj nazwę drużyny "+ i, "Drużyna " +i))    //wprowadza dane do tablicy
} 

var eventstatus =true;                                                       //event status żeby potem do zakończ event był jako if
if(confirm("Czy na pewno chcesz kontynuować?") == true ){
    //ajax
}
else{
    alert("Nie przesłałeś danych do PLANSZY")
}
}
}
   
   




