var positions = [
	// druzyna 1
	[
		[42.5,43.5], [34.59,43.1], [28.1,43.1], [28.3,36.6], [28.5,30.2], [34.9,30.2], [41.8,30.2], [41.8,24], [41.8,17.5], [35.1,17.5], [28.5,17.7], [20.3,17.7]
	],
	// druzyna 2
	[
		[51.5,38.5], [59.6,38.1], [66.2,38.1], [65.8,31.5], [65.6,25.1], [59.2,25.1], [52.7,25.3], [52.5,18.9], [52.3,12.5], [59,12.5], [65.8,12.7], [74,12.9]
	],
	// druzyna 3
	[
		[42.5,42.4], [34.8,42.6], [28.2,42.6], [28.6,49], [28.6,55.4], [35,55.4], [41.7,55.4], [41.9,61.7], [41.8,68], [35.2,68], [28.5,67.8], [19.9,68]
	],
	// druzyna 4
	[
		[51.6,37.5], [59.5,37.5], [66.1,37.5], [65.9,43.9], [65.6,50.3], [59.4,50.5], [52.7,50.3], [52.5,56.6], [52.3,63.1], [59.1,63.1], [65.7,62.9], [74.8,62.9]
	]
]
document.addEventListener('DOMContentLoaded',function(){
class pawn{
    constructor(id){
        this.item = document.getElementsByClassName(id)[0]
        this.item.style.display = 'block';
        this.arr = [];
        this.iteration = 0;
        this.arrInString ='';
    }
    
    updatePosX(valX){
        this.x = valX/2;
        this.roundPos()
        this.draw();
    }
    updatePosY(valY){
        this.y = valY/2;
        this.roundPos()
        this.draw()
    }
    testPosX(valX){
        this.x = valX;
        this.roundPos()
        this.draw();
    }
    testPosY(valY){
        this.y = valY;
        this.roundPos()
        this.draw()
    }
    draw(){
        this.roundPos()
        this.item.style.left = String(this.x)+'%';
        this.item.style.top = String(this.y)+'%';
    }
    addToArr(x,y){
        this.roundPos()
        this.arr[this.iteration]=[String(x),String(y)];
        this.iteration+=1
        console.log(this.x,this.y);
    }
    exportArr(){
        for(var r=0;r<this.arr.length;r+=1){
            this.arrInString+='['+String(this.arr[r])+'], ';
        }
        console.log(this.arrInString.substring(0,this.arrInString.length-2));
    }
    xButton(move){
        this.x+=move;
        this.draw()
    }
    yButton(move){
        this.y+=move;
        this.draw()
    }

    roundPos(){
        this.x = Math.round(this.x*100)/100
        this.y = Math.round(this.y*100)/100
    }

}
document.getElementById('TEST').addEventListener('click',runTest)

document.getElementsByClassName('buttonSlider')[0].addEventListener('click',()=>{
    activePawn.xButton(-0.2);
})
document.getElementsByClassName('buttonSlider')[1].addEventListener('click',()=>{
    activePawn.xButton(0.2);
})
document.getElementsByClassName('buttonSlider')[2].addEventListener('click',()=>{
    activePawn.yButton(-0.2);
})
document.getElementsByClassName('buttonSlider')[3].addEventListener('click',()=>{
    activePawn.yButton(0.2);
})

function play() {
  var audio = document.getElementById("audio");
  audio.volume=1;
  audio.play();
}
pos = 0;
function runTest(){
    pawn1 = new pawn('yellow');
    pawn2 = new pawn('green');
    pawn3 = new pawn('red');
    pawn4 = new pawn('blue');
    pawn1.testPosX(positions[0][pos][0]);
    pawn1.testPosY(positions[0][pos][1]);
    pawn2.testPosX(positions[1][pos][0]);
    pawn2.testPosY(positions[1][pos][1]);
    pawn3.testPosX(positions[2][pos][0]);
    pawn3.testPosY(positions[2][pos][1]);
    pawn4.testPosX(positions[3][pos][0]);
    pawn4.testPosY(positions[3][pos][1]);
    pos==positions[0].length-1? pos=0:pos+=1;
    // pos+=1;
}});

