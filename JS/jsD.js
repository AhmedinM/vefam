console.log(document.querySelector('#spic').innerHTML);

var temp=0;
var sw="";

function klik(e){

if(temp===0){
  e.parentNode.style.backgroundColor="red";
  sw=e.innerHTML;
  console.log(sw);
  temp=1;
  console.log(temp);
}else{
  var igr=Array.from(document.querySelectorAll('a'));
  for (var i = 0; i < igr.length; i++) {
    if(igr[i].innerHTML===sw && temp===1){
      igr[i].innerHTML=e.innerHTML;
      igr[i].parentNode.style.backgroundColor="";
    }
  }
  e.innerHTML=sw;
  temp=0;
  sw="";
}
}

function formacija(e){
  document.querySelector('.sredina1').style.display="none";
  document.querySelector('.sredina5').style.display="none";
  document.querySelector('.odbrana3').style.display="none";
  document.querySelector('.odbrana1').style.left="28%";
  document.querySelector('.odbrana2').style.left="44%";
  document.querySelector('.odbrana4').style.left="62%";

}

function klik2(e){

  if(temp===1){
  var igr=Array.from(document.querySelectorAll('a'));
  for (var i = 0; i < igr.length; i++) {
      if(igr[i].innerHTML===sw && temp===1){
        igr[i].innerHTML=e.innerHTML;
        igr[i].parentNode.style.backgroundColor="";
      }
  }

  e.innerHTML=sw;
  temp=0;
  sw="";
}else{
  temp=1;
  e.parentNode.style.backgroundColor="black";
  sw=e.innerHTML;
}


}
