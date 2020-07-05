var sub1=Array.from(document.querySelectorAll('.napad'));
var sub2=Array.from(document.querySelectorAll('.vezni'));
var sub3=Array.from(document.querySelectorAll('.odbrana'));
var sub4=Array.from(document.querySelectorAll('.golman'));

var curr=0;
var temp1="";
var pos=0;
var temp2="";
var help=0;
var formation=new Array(3);
var igraci= new Array (11);// imena igraca
var igraci2= new Array (11);//bez space
var igraciid= new Array (11);//id igraca
var formation=new Array(3);
var igraci= new Array (11);// imena igraca
var igraci2= new Array (11);//bez space
var igraciid= new Array (11);//id igraca
var selectt=0;
var listplayers= new Array (11);
 listplayers=new Array(11);
 var playerr;
//textIgraca
function napravi(e){
var napad1=document.getElementsByClassName("napad1");
var napad2=document.getElementsByClassName("napad2");
var napad3=document.getElementsByClassName("napad3");

var odbrana1=document.getElementsByClassName("odbrana1");
var odbrana2=document.getElementsByClassName("odbrana2");
var odbrana3=document.getElementsByClassName("odbrana3");
var odbrana4=document.getElementsByClassName("odbrana4");
var odbrana5=document.getElementsByClassName("odbrana5");

var vezni1=document.getElementsByClassName("vezni1");
var vezni2=document.getElementsByClassName("vezni2");
var vezni3=document.getElementsByClassName("vezni3");
var vezni4=document.getElementsByClassName("vezni4");
var vezni5=document.getElementsByClassName("vezni5");

var golman1=document.getElementsByClassName("golman1");
//napad1[0].style.top="60px";
var a=napad3[0].style.top;
console.log(a);
/*
document.getElementsByClassName('napad1txt')[0].style.top=parseInt( napad1[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('napad2txt')[0].style.top=parseInt( napad2[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('napad3txt')[0].style.top=parseInt( napad3[0].style.top.replace(/px/,""))+20+"px";

document.getElementsByClassName('odbrana1txt')[0].style.top=parseInt( odbrana1[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('odbrana2txt')[0].style.top=parseInt( odbrana2[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('odbrana3txt')[0].style.top=parseInt( odbrana3[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('odbrana4txt')[0].style.top=parseInt( odbrana4[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('odbrana5txt')[0].style.top=parseInt( odbrana5[0].style.top.replace(/px/,""))+20+"px";

document.getElementsByClassName('vezni1txt')[0].style.top=parseInt( vezni1[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('vezni2txt')[0].style.top=parseInt( vezni2[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('vezni3txt')[0].style.top=parseInt( vezni3[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('vezni4txt')[0].style.top=parseInt( vezni4[0].style.top.replace(/px/,""))+20+"px";
document.getElementsByClassName('vezni5txt')[0].style.top=parseInt( vezni5[0].style.top.replace(/px/,""))+20+"px";

document.getElementsByClassName('golman1txt')[0].style.top=parseInt( golman1[0].style.top.replace(/px/,""))+20+"px";
*/
}
function select(e){
  curr=1;
  if(e.className.includes("napad")){
    selectt=1;
    document.querySelector('.veznii').style.display="none";
    document.querySelector('.odbrambeni').style.display="none";
    document.querySelector('.napadaci').style.display="block";
    document.querySelector('.golmani').style.display="none";
      if(e.className.includes("1")){
        temp2="1";
      }else if(e.className.includes("2")){
        temp2="2";
      }else if (e.className.includes("3")) {
        temp2="3";
      }
      help=1;
  }
  else if(e.className.includes("vezni")){
    selectt=2;
    document.querySelector('.veznii').style.display="block";
    document.querySelector('.napadaci').style.display="none";
    document.querySelector('.odbrambeni').style.display="none";
    document.querySelector('.golmani').style.display="none";
      if(e.className.includes("1")){
        temp2="1";
      }else if(e.className.includes("2")){
        temp2="2";
      }else if (e.className.includes("3")) {
        temp2="3";
      }else if (e.className.includes("4")) {
        temp2="4";
      }else if (e.className.includes("5")) {
        temp2="5";
      }
      help=2;
  }else if(e.className.includes("odbrana")){
    selectt=3;
    document.querySelector('.odbrambeni').style.display="block";
    document.querySelector('.napadaci').style.display="none";
    document.querySelector('.veznii').style.display="none";
    document.querySelector('.golmani').style.display="none";

    if(e.className.includes("1")){
      temp2="1";
    }else if(e.className.includes("2")){
      temp2="2";
    }else if (e.className.includes("3")) {
      temp2="3";
    }else if(e.className.includes("4")){
      temp2="4";
    }else if (e.className.includes("5")) {
      temp2="5";
    }
    help=3;
  }else{
    selectt=4;
    document.querySelector('.odbrambeni').style.display="none";
    document.querySelector('.napadaci').style.display="none";
    document.querySelector('.veznii').style.display="none";
    document.querySelector('.golmani').style.display="block";
    temp2=1;
  }


}

function switcheroo(e){
  var aa=formation[0];
	var bb=formation[1];
	var cc=parseInt(temp2);
  if(selectt==1){

   if(listplayers[aa+bb+cc]!=null){
    var temp=document.getElementById(listplayers[aa+bb+cc]) ;
     temp.style.display="block";
   }
   listplayers[aa+bb+cc]=e.getAttribute('id');
   console.log(listplayers[aa+bb+cc]);
    playerr=e.currentTarget;
    console.log(e);
    e.style.display="none";
    selectt=0;
  }
  if(selectt==2){
    if(listplayers[aa+cc]!=null){
      var temp=document.getElementById(listplayers[aa+cc]) ;
       temp.style.display="block";
   }
    listplayers[aa+cc]=e.getAttribute('id');
    e.style.display="none";
    selectt=0;
  }
  if(selectt==3){
    if(listplayers[cc]!=null){
      var temp=document.getElementById(listplayers[cc]) ;
       temp.style.display="block";
   }
    listplayers[cc]=e.getAttribute('id');
    e.style.display="none";
    selectt=0;
  }
  if(selectt==4){
    if(listplayers[0]!=null){
      var temp=document.getElementById(listplayers[0]) ;
       temp.style.display="block";
  }
    listplayers[0]=e.getAttribute('id');
    e.style.display="none";
    selectt=0;
  }
if (help===1){ //help je pomocnainformacija o tome je li kliknuti fudbaler napadac , odbrambeni , centar ili golman
	var a=formation[0];
	var b=formation[1];
	var c=parseInt(temp2);
	igraci[a+b+c]=e.innerHTML;
  //igraci2[a+b+c]=e.innerHTML.replace(" ",""); // uklanjanje space
  igraci2[a+b+c] = e.innerHTML.replace(/ /g,'');
  igraci2[a+b+c] = igraci2[a+b+c].replace('|','');
  var br=a+b+c;
	igraciid[br]=document.getElementsByName(igraci2[br])[0].value; //trazenje id u input po inputName
  var name0=br.toString();
  var name1="player";
  /*Mijenjanje imena igraca ispod slike dresa------>>>*/
  var name2="napad";
  var name21=name2.concat(temp2);
  var name22=name21.concat("txt");
  var value=e.innerHTML;
  var pos=value.indexOf(" ");
  value=value.substr(0,pos);
  var space=" ";
  if (pos>10)
  {
    value=value.substr(0,10);
  }
  document.getElementsByClassName(name22)[0].innerHTML=value;
  /*<-----  ------- ------ Mijenjanje imena igraca ispod slike dresa */
  var name=name1.concat(name0);
  //console.log(document.getElementsByName("player1")[0].value);
  document.getElementsByName(name)[0].value=igraciid[br]; //smjestanje u formu id igraca
}
else if (help===2){
	var a=formation[0];
	 var c=parseInt(temp2);
   var br=a+c;
	igraci[br]=e.innerHTML;
  //igraci2[a+c-1]=e.innerHTML.replace(" ","");
  igraci2[br] = e.innerHTML.replace(/ /g,'');
  igraci2[br] = igraci2[br].replace('|','');
	igraciid[br]=document.getElementsByName(igraci2[br])[0].value; //trazenje id u input po inputName
	var name0=br.toString();
	var name1="player";
  /*Mijenjanje imena igraca ispod slike dresa------>>>*/
  var name2="vezni";
  var name21=name2.concat(temp2);
  var name22=name21.concat("txt");
  var value=e.innerHTML;
  var pos=value.indexOf(" ");
  value=value.substr(0,pos);
  var space=" ";
  if (pos<6){
    value=space.concat(value);
    value=space.concat(value);
    value=space.concat(value);
  }
  else if (pos>10)
  {
    value=value.substr(0,10);
  }
  document.getElementsByClassName(name22)[0].innerHTML=value;
  /*<-----  ------- ------ Mijenjanje imena igraca ispod slike dresa */
	var name=name1.concat(name0);
	document.getElementsByName(name)[0].value=igraciid[br]; //smjestanje u formu id igraca
}
else if (help===3){
	var c=parseInt(temp2);
	igraci[c]=e.innerHTML;
  //igraci2[c]=e.innerHTML.replace(" ","");
  igraci2[c] = e.innerHTML.replace(/ /g,'');
  igraci2[c] = igraci2[c].replace('|','');
	var br=c;
	igraciid[br]=document.getElementsByName(igraci2[br])[0].value; //trazenje id u input po inputName
	var name0=br.toString();
	var name1="player";
  /*Mijenjanje imena igraca ispod slike dresa------>>>*/
  var name2="odbrana";
  var name21=name2.concat(temp2);
  var name22=name21.concat("txt");
  var value=e.innerHTML;
  var pos=value.indexOf(" ");
  value=value.substr(0,pos);
  var space=" ";
  if (pos<6){
    value=space.concat(value);
    value=space.concat(value);
    value=space.concat(value);
  }
  else if (pos>10)
  {
    value=value.substr(0,10);
  }
  document.getElementsByClassName(name22)[0].innerHTML=value;
  /*<-----  ------- ------ Mijenjanje imena igraca ispod slike dresa */
	var name=name1.concat(name0);
	document.getElementsByName(name)[0].value=igraciid[br]; //smjestanje u formu id igraca
}
else
{
    igraci[0]=e.innerHTML;
		igraci2[0] = e.innerHTML.replace(/ /g,'');
		igraci2[0] = igraci2[0].replace('|','');
    var br=0;
    igraciid[0]=document.getElementsByName(igraci2[br])[0].value; //trazenje id u input po inputName
		br=11;
		var name0=br.toString();
		var name1="player";
    /*Mijenjanje imena igraca ispod slike dresa------>>>*/
    var name2="golman";
    var name21=name2.concat(temp2);
    var name22=name21.concat("txt");
    var value=e.innerHTML;
    var pos=value.indexOf(" ");
    value=value.substr(0,pos);
    var space=" ";
    if (pos<6){
      value=space.concat(value);
      value=space.concat(value);
      value=space.concat(value);
    }
    else if (pos>10)
    {
      value=value.substr(0,10);
    }
    document.getElementsByClassName(name22)[0].innerHTML=value;
    /*<-----  ------- ------ Mijenjanje imena igraca ispod slike dresa */
		var name=name1.concat(name0);
		document.getElementsByName(name)[0].value=igraciid[0];

}



    temp2="";
    help=0;
    curr=0;
  }
