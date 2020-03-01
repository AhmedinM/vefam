function emailBlur(x) {
 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 if(x.value.match(mailformat)){
	 var temp=document.getElementById('email');
	 temp.innerHTML="Good";
	 temp.style.backgroundColor="#98eb34";
	 temp.style.color="white";
	 temp.style.left="39%";
 }
 else {
	 var temp=document.getElementById('email');
	 document.getElementById('emaill').value="";
	 temp.innerHTML="Wrong";
	 temp.style.backgroundColor="red";
	 temp.style.color="white";
	 temp.style.left="40%";
 }
}
///////email gore , potvrdi lozinku dole
function potvrdilBlur(x) {
 	 var lozinka=document.getElementById('inLozinka');
	 	 var potvrdil=document.getElementById('inpoLozinka');
		 var x=lozinka.value.toString();
		 var y=potvrdil.value.toString();
if(y.length>7){
 if(x==y){
	 var temp=document.getElementById('potvrdaLozinke');
	 temp.innerHTML="Good";
	 temp.style.backgroundColor="#98eb34";
	 temp.style.color="white";
	 temp.style.left="40%";
 }
 else {
	 var temp=document.getElementById('potvrdaLozinke');
	 document.getElementById('inpoLozinka').value="";
	 temp.innerHTML="Passwords are not the same";
	 temp.style.backgroundColor="red";
	 temp.style.color="white";
	 temp.style.left="39%";
 }
					}
	else{
			 var temp=document.getElementById('potvrdaLozinke');
			  document.getElementById('inpoLozinka').value="";
	 temp.innerHTML="Passwords are not the same";
	 temp.style.backgroundColor="red";
	 temp.style.color="white";
	 temp.style.left="39%";
	}
}
////pasword input check
function passwBlur(x){
var passformat=  /^[A-Za-z]\w{7,14}$/;
var y=document.getElementById('inLozinka').value.toString();
if(y.length>7){
 if(x.value.match(passformat)){
	 var temp=document.getElementById('passspan');
	 temp.innerHTML="Good";
	 temp.style.backgroundColor="#98eb34";
	 temp.style.color="white";
	 temp.style.left="40%";
 }
 else {
	 var temp=document.getElementById('passspan');
	  document.getElementById('inLozinka').value="";
	 temp.innerHTML="Wrong";
	 temp.style.backgroundColor="red";
	 temp.style.color="white";
	 temp.style.left="40%";
 }	
}
else {
	 	 var temp=document.getElementById('passspan');
		  document.getElementById('inLozinka').value="";
	 temp.innerHTML="At least 8 characters and 4 letters";
	 temp.style.backgroundColor="red";
	 temp.style.color="white";
	 temp.style.left="39%";
}
}
///////username on blur dolje
function usernameBlur(x){
var usernameformat=  /^[A-Za-z]\w{7,20}$/;
var y=x.value.toString();
if(y.length>3){
	 var temp=document.getElementById('usernspan');
	 temp.innerHTML="Good";
	 temp.style.left="40%";
	 temp.style.backgroundColor="#98eb34";
	 temp.style.color="white";
}
else {
	 	 var temp=document.getElementById('usernspan');
		  document.getElementById('username').value="";
	 temp.innerHTML="At least 4 characters";
	 temp.style.backgroundColor="red";
	 temp.style.color="white";
	 temp.style.left="39%";
}
}