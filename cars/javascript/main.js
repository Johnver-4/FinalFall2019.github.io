function myFunction(){
var dropdown = document.getElementsByClassName("dropbtn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
  }
}

function swapStyleSheet(sheet) 
{
    document.getElementById("pagestyle").setAttribute("href", sheet);  
}

function initate() 
{
    var style1 = document.getElementById("lightmode");
    var style2 = document.getElementById("darkmode");
    var style3 = document.getElementById("funky");

    style1.onclick = swapStyleSheet("lightmode.css");
    style2.onclick = swapStyleSheet("darkmode.css");
	  style3.onclick = swapStyleSheet("funkymode.css");
}

window.onload = initate;