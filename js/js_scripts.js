//JavaScript Document

function screenMessage(messageToDisplay){
	alert(messageToDisplay);
}

function confirmScreenMessage(messageToDisplay){
	var confirmValue=confirm(messageToDisplay);
	return confirmValue;
}

//----------------------------------------------------
//Counter for delete contacts page
var counter=0;
var textColor="rgb(150, 150, 150)";
var selected=false;


function getCounter(){
	return counter;
}

function incCounter(){
	counter++;
}

function decCounter(){
	counter--;
}

function displayCounter(id){
	if(id!='none'){
		sel=document.getElementById(id);
		if(sel.checked) incCounter();
		if(!sel.checked) decCounter();
	}
	setCounterColor();

	count=document.getElementById('counter');
	count.innerHTML=getCounter()+" "+"elementi selezionati";
	count.style.color=textColor;
}

function selectAll(totCheckbox){
	actionType=document.getElementById('globalChange').checked;
	for(i=0; i<totCheckbox; i++){
		sel=document.getElementById('sel'+i);
		if(actionType==false){
			sel.checked=false;
			counter=0;
			setCounterColor()
		}
		else{
			sel.checked=true;
			counter=totCheckbox;
			setCounterColor()
		}
	}
	count=document.getElementById('counter');
	count.innerHTML=getCounter()+" "+"elementi selezionati";
	count.style.color=textColor;
}

function setCounterColor(){
	if(getCounter()==0)textColor="rgb(150, 150, 150)";
	if(getCounter()>0)textColor="rgb(0, 200, 0)";
	if(getCounter()>5)textColor="rgb(200, 180, 0)";
	if(getCounter()>10)textColor="rgb(210, 150, 0)";
	if(getCounter()>15)textColor="rgb(200, 0, 0)";
}

//End of counter for delete contacts page
//----------------------------------------------------