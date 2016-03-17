window.onload = function(){
	alert ("kohal");
	var beadid = document.getElementsByClassName("bead");
	var i;
	for (i = 0; i < beadid.length; i++){
	beadid[i].addEventListener("click", function(){
		if (this.style.cssFloat == "left") {
		this.style.cssFloat = "right";
		}
		else {this.style.cssFloat = "left"}
		});
	}
	
	

	