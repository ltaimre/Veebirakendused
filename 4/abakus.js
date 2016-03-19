window.onload = function() {
    var i=0;
    var beadid = document.getElementsByClassName("bead");
    var len = beadid.length;

    for ( ;i<len; ++i) beadid[i].onclick = function() {slide(this)};

    function slide(beadid)  {
		var side = getComputedStyle(beadid,null).cssFloat;
			if (side == "right") {
			beadid.style.cssFloat = "left";
				} else {
			beadid.style.cssFloat = "right";
			}
			}
			
}

	