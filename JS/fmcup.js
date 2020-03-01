function openTab(event, tabName){
  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");
  for(i=0; i< tabcontent.length; i++){
    tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for(i=0; i<tablinks.length; i++){
      tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    document.getElementById(tabName).style.display="block";
    evt.currentTarget.className +=" active";
}

var dugme1 = document.getElementById("dugme1");
var dugme2 = document.getElementById("dugme2");
var tab1 = document.getElementById("table");
var tab2 = document.getElementById("cup");

dugme1.addEventListener("click",function(){
  tab2.style.display = "none";  
  tab1.style.display = "block";
});
dugme2.addEventListener("click",function(){
  tab1.style.display = "none";
  tab2.style.display = "block";
});