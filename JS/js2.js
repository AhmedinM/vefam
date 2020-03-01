var curr=0;
var temp1="";
var pos=0;
var temp2="";
var help=0;


function form(e){

  if(e.className.includes("Prva")){
        var niz=Array.from(document.querySelectorAll('.vezni'));
        var niz2=Array.from(document.querySelectorAll('.napad'));
        niz[4].style.display="inline-block";


        for(var i=0;i<niz.length;i++){
          if(i===0){
            niz[i].style.display="none";
          }else{
            niz[i].style.display="inline-block";
          }
          niz[i].style.marginLeft="37px";
          niz[i].style.marginTop="100px";
        }
        for(var i=0;i<niz2.length;i++){
          if(i===2){
            niz2[i].style.display="none";
          }else{
            niz2[i].style.display="inline-block";
          }
          niz2[i].style.marginLeft="115px";
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
          var niz=Array.from(document.querySelectorAll('.odbrana'));
          var niz3=Array.from(document.querySelectorAll('.napad'));
          var niz2=Array.from(document.querySelectorAll('.vezni'));

          for (var i = 0; i < niz.length; i++) {
            niz[i].style.display="inline-block";
            niz[i].style.marginLeft= "20px";
            niz[i].style.marginTop= "80px";
          }

          for(var i=0;i<niz2.length;i++){
            if(i===0 || i===4){
              niz2[i].style.display="none";
            }else{
              niz2[i].style.display="inline-block";
            }
            niz2[i].style.marginLeft="70px";
          }

          for (var i = 0; i < niz3.length; i++) {
            if(i===0){
              niz3[i].style.display="none";
            }else{
              niz3[i].style.display="inline-block";
            }

            niz3[i].style.marginLeft="115px";
            niz3[1].style.right="0vh";
          }

  }else{

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
    niz2[1].style.marginLeft="309px";
    niz2[1].style.right="15vh";


  }
}


function select(e){
  curr=1;
  if(e.className.includes("napad")){
    document.querySelector('.veznii').style.display="none";
    document.querySelector('.odbrambeni').style.display="none";
    document.querySelector('.napadaci').style.display="block";
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
  }else{
    document.querySelector('.odbrambeni').style.display="block";
    document.querySelector('.napadaci').style.display="none";
    document.querySelector('.veznii').style.display="none";

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
  }

}

function switcheroo(e){

  if(curr===1){
    if(help===1){
      if(temp2==="1"){
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
    }
    temp2="";
    help=0;
    curr=0;
  }
}
