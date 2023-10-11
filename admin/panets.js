const druzyny=[]; //tablica druzyny
var eventstatus //TUTAJ JEST TENTEGES ŻE JEST FLAGA OD TEGO CZY JEST WŁĄCZONE - 1 CZY WYŁĄCZONE - 0 
function startevent(){ //funkcja która działa po naciścięciu start konkursu

  if(eventstatus==1){
    alert("Konkurs już aktywny")
  }
else{
 // console.log(eventstatus)  
// alert("TWOJA DUPA W HANNOWERZE OPIERDALA 4 WIERZE"); //taki żarcik 😊
    ilosc_druzyn=Number(prompt("Podaj liczbe druzyn min 2 max 4)",4)) // PROMPT do podania liczby druzyn
    for(let i=1;i<=ilosc_druzyn;i++){                                 //Pentla od nazw drużyn
    druzyny.push(prompt("Podaj nazwę drużyny "+ i, "Drużyna " +i))    //wprowadza dane do tablicy
}   
console.log(druzyny)

if(confirm("Czy na pewno chcesz kontynuować?") == true ){
  eventstatus=1                 //przypisywanie do eventstatus jeden że konkurs aktywny

  //ajax
}
else{
    alert("Nie przesłałeś danych do PLANSZA.PHP")
}
}
}

function stopevent(){
  if(eventstatus==1){
  if(confirm("Czy na pewno chcesz przerwać konkurs zakończyć konkurs")==true){ //Prosty if żeby nie było missclicków
  eventstatus=undefined;//USTAWIENIA NA undefined 
  druzyny.length = 0 // CZYSZCZENIE TABLICY
  alert("Udało Ci się zrestartować konkurs")} //alert sukces
  else{ 
    alert("Konkurs dalej trwa") // jęzeli ktoś nacinie anuluj
  }
}else{
  alert("Konkurs nie trwa (XD)") 
}
}
function sprawdzstan(){
  if(eventstatus==1){
    alert("Konkurs aktywny")
  }
  else{
    alert("Konkurs nie jest aktywny")
  }
}





