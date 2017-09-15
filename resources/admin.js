$(document).ready(function() {
		var current_page=document.getElementById("current_page").innerHTML;
				
		console.log("oldal: "+current_page)
		var d = document.getElementById(current_page);
		d.className += " active";
		
		
		var current_place=document.getElementById("current_place").innerHTML;
		
		console.log("hely: "+current_place)
		var e = document.getElementById(current_place);
		e.className += " active";
});

function search_by_name() {
   
}