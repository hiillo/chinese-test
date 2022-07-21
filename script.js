var container = document.getElementById('form');
var count = container.getElementsByTagName('fieldset').length;
const base = [];
const answers = [];
function insertAfter(newNode, existingNode) {
 existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}
for (let i = 0; i < count; i++) {
 answers[i] = container.getElementsByTagName('input')[i];
 let thing = container.getElementsByTagName('fieldset')[i];
 let input = document.createElement("input");
 input.setAttribute("type", "hidden");
 input.setAttribute("id", i);
 input.setAttribute("name", i);
 input.setAttribute("value", "NOTSET");
 thing.after(input);
}
alert(document.getElementById('0').value);

for (let i = 0; i < count; i++) {
 var thing = [];
 for(let ia = 0; ia<4; ia++){
  thing[ia] = false;
 }
 base[i] = thing;
}


function create(var1, var2){
 return document.getElementById('form').getElementsByTagName('fieldset')[var1].getElementsByTagName('input')[var2];
}

for(let i = 0; i < count; i++){
 for(let ia = 0; ia<4; ia++){
  console.log(base[i][ia]);
  create(i, ia).addEventListener("click", fill.bind(null, i, ia));
 }
}

function fill(val, value2){
	if(scroll(base[val]) === true){
	 console.log("uncolour");
		uncolour1(val);
		create(val, value2).style.background = "blue";
		document.getElementById(val).value = value2;
  console.log(document.getElementById(val).value);

		
	}else{
		create(val, value2).style.background = "blue";
	}
}

function scroll(input){
 for(let i = 0; i<input.length; i++){
  if(input[i] === false){
   return true;
  }
  else{return false;}
 }
}

function uncolour1(value){
 for(let i = 0; i<4; i++){
  base[value][i] = false
  create(value, i).style.background = "white";
  
 }
}