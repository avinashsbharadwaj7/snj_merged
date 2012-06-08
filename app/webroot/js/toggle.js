// JavaScript Document
function toggle_search(a)  { 
     var e = document.getElementById(a); 
	 document.getElementById('daterange').style.display = "none";
	 document.getElementById('quarter').style.display = "none";
	 document.getElementById('year').style.display = "none";
	 document.getElementById('time').style.display = "none";
	 if (a != "select") {
       e.style.display = "block" 
	 }
} 