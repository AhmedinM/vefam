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
     formation=[4,3,3];
var igraci= new Array (11);// imena igraca
var igraci2= new Array (11);//bez space
var igraciid= new Array (11);//id igraca

function form(e){

  if(e.className.includes("Prva")){
	    formation=[4,4,2];
        var niz=Array.from(document.querySelectorAll('.vezni'));
        var niz2=Array.from(document.querySelectorAll('.napad'));
        niz[4].style.display="inline-block";


        for(var i=0;i<niz.length;i++){
          if(i===0){
            niz[i].style.display="none";
          }else{
            niz[i].style.display="inline-block";
          }
          niz[i].style.marginLeft="30px";
        }
        for(var i=0;i<niz2.length;i++){
          if(i===2){
            niz2[i].style.display="none";
          }else{
            niz2[i].style.display="inline-block";
          }
          niz2[i].style.marginLeft="90px";
            niz2 [1].style.right="0vh";
        }

        var niz3=document.querySelector('.odbrana');

        for(var i=0;i<niz3.length;i++){

          if(i===4){
            niz3[i].style.display="none";
          }else{
            niz3[i].style.display="inline-block";
          }

          niz3[i].style.marginLeft="30px";

        }

        }else if(e.className.includes("Druga")){
		 formation=[5,3,2];
          var niz=Array.from(document.querySelectorAll('.odbrana'));
          var niz3=Array.from(document.querySelectorAll('.napad'));
          var niz2=Array.from(document.querySelectorAll('.vezni'));

          for (var i = 0; i < niz.length; i++) {
            niz[i].style.display="inline-block";
            niz[i].style.marginLeft= "20px";
          }

          for(var i=0;i<niz2.length;i++){
            if(i===0 || i===4){
              niz2[i].style.display="none";
            }else{
              niz2[i].style.display="inline-block";
            }
            niz2[i].style.marginLeft="50px";
          }

          for (var i = 0; i < niz3.length; i++) {
            if(i===0){
              niz3[i].style.display="none";
            }else{
              niz3[i].style.display="inline-block";
            }

            niz3[i].style.marginLeft="80px";
            niz3[1].style.right="0vh";
          }

  }else{
    formation=[5,4,1];
    var niz1=Array.from(document.querySelectorAll('.odbrana'));
    var niz2=Array.from(document.querySelectorAll('.napad'));
    var niz3=Array.from(document.querySelectorAll('.vezni'));

    for (var i = 0; i < niz1.length; i++) {
      niz1[i].style.display="inline-block";
      niz1[i].style.marginLeft="20px";
    }

    for (var i = 0; i < niz3.length; i++) {
      niz3[i].style.display="inline-block";
      niz3[i].style.marginLeft="20px";
    }

    niz2[0].style.display="none";
    niz2[2].style.display="none";
    niz2[1].style.display="inline-block";
    niz2[1].style.marginLeft="240px";
    niz2[1].style.right="15vh";


  }
}


function select(e){
  curr=1;
  if(e.className.includes("napad")){
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
    document.querySelector('.odbrambeni').style.display="none";
    document.querySelector('.napadaci').style.display="none";
    document.querySelector('.veznii').style.display="none";
    document.querySelector('.golmani').style.display="block";
  }


}

function switcheroo(e){
if (help===1){
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
  var name=name1.concat(name0);
  //console.log(document.getElementsByName("player1")[0].value);
  document.getElementsByName(name)[0].value=igraciid[br]; //smjestanje u formu id igraca
}
else if (help===2){
	var a=formation[0];
	 var c=parseInt(temp2);
	 var d=c-1;
	 
	igraci[a+d]=e.innerHTML;
  //igraci2[a+d]=e.innerHTML.replace(" ","");
  igraci2[a+d] = e.innerHTML.replace(/ /g,'');
  igraci2[a+d] = igraci2[a+c-1].replace('|','');
  var br=a+d;
	igraciid[br]=document.getElementsByName(igraci2[br])[0].value; //trazenje id u input po inputName
	var name0=br.toString();
	var name1="player";
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
	var name=name1.concat(name0);
	document.getElementsByName(name)[0].value=igraciid[br]; //smjestanje u formu id igraca
}
else 
{
		igraci[0]=e.innerHTML;
		igraci2[0] = e.innerHTML.replace(/ /g,'');
		igraci2[0] = igraci2[c].replace('|','');
		igraciid[0]=document.getElementsByName(igraci2[br])[0].value; //trazenje id u input po inputName
		var br=11;
		var name0=br.toString();
		var name1="player";
		var name=name1.concat(name0);
		document.getElementsByName(name)[0].value=igraciid[0];

}
 if(curr===1){
    if(help===1){
      if(temp2==="1"){
        if(sub1[0].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.npd');
          ap.appendChild(node);
        }
        console.log(temp2);
        var t=document.querySelector('.napad1');
        var tt=e.innerHTML;
		
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"

        t.appendChild(node);
        e.remove();
      }
      else if (temp2==="2") {
        if(sub1[1].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.npd');
          ap.appendChild(node);
        }
        console.log(temp2);
        var t=document.querySelector('.napad2');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
      }else if (temp2==="3") {
        if(sub1[2].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.npd');
          ap.appendChild(node);
        }
        console.log(temp2);
        var t=document.querySelector('.napad3');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
      }



    }else if(help===2){
      if(temp2==="1"){
        if(sub2[0].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.vzn');
          ap.appendChild(node);
        }
        console.log(temp2);
        var t=document.querySelector('.vezni1');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
      }else if (temp2==="2") {
        if(sub2[1].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.vzn');
          ap.appendChild(node);
        }
        var t=document.querySelector('.vezni2');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
      }else if (temp2==="3") {
        if(sub2[2].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.vzn');
          ap.appendChild(node);
        }
        var t=document.querySelector('.vezni3');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
      }
      else if (temp2==="4") {
        if(sub2[3].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.vzn');
          ap.appendChild(node);
        }
        var t=document.querySelector('.vezni4');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
      }else if (temp2==="5") {
        if(sub2[4].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.vzn');
          ap.appendChild(node);
        }
        var t=document.querySelector('.vezni5');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
      }
    }else if(help===3){
      if(temp2==="1"){
        if(sub3[0].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.odb');
          ap.appendChild(node);
        }
        var t=document.querySelector('.odbrana1');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
      }else if (temp2==="2") {
        if(sub3[1].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.odb');
          ap.appendChild(node);
        }
        var t=document.querySelector('.odbrana2');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();

      }else if (temp2==="3") {
        if(sub3[2].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.odb');
          ap.appendChild(node);
        }
        var t=document.querySelector('.odbrana3');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();

      }else if (temp2==="4") {
        if(sub3[3].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.odb');
          ap.appendChild(node);
        }
        var t=document.querySelector('.odbrana4');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();

      }else if (temp2==="5") {
        if(sub3[4].innerHTML.includes("<h6")){
          console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
          console.log("ostr");
          var a=Array.from(document.querySelectorAll('h6'))[0];
          var ew=a.innerHTML;
          a.remove();
          var node=document.createElement("li");
          node.innerHTML=ew;
          var ap=document.querySelector('.odb');
          ap.appendChild(node);
        }
        var t=document.querySelector('.odbrana5');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();

      }
    }else{
      if(sub4[0].innerHTML.includes("<h6")){
        console.log(Array.from(document.querySelectorAll('h6'))[0].innerHTML);
        console.log("ostr");
        var a=Array.from(document.querySelectorAll('h6'))[0];
        var ew=a.innerHTML;
        a.remove();
        var node=document.createElement("li");
        node.innerHTML=ew;
        var ap=document.querySelector('.gk');
        ap.appendChild(node);
      }
      var t=document.querySelector('.golman1');
        var tt=e.innerHTML;
        var node=document.createElement("h6");
        node.innerHTML=tt;
        node.style.align="center";
        node.style.color="white";
        node.style.marginTop="48px";
        node.style.marginLeft="13px";
        node.style.fontSize="20px;"
        t.appendChild(node);
        e.remove();
    }
    temp2="";
    help=0;
    curr=0;
  }
}
