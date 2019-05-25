//Get the modal
var modalp = document.getElementById('myModal');

//get the button that opens the modal
var btnp = document.getElementById("myBtn");

//get the <span> element that closes the modal
var spanpp = document.getElementsByClassName("close")[0];

//when the user clicks on the button, open the modal
btnp.onclick = function(){
	modalp.style.display = "block";
}
//when the user clicks on <span> (x), close the modal
spanpp.onclick = function(){
	modalp.style.display = "none";
}
//when the user clicks anywhere outside of the modal, close italics
window.onclick = function(event){
	if(event.target == modalp){
		modalp.style.display = "none";
	}
}