$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });


    var myIndex = 0;
	carousel();

	function carousel() {
	    var i;
	    var x = document.getElementsByClassName("cover-img");
	    var y = document.getElementsByClassName("header-titulo");
	    for (i = 0; i < x.length; i++) {
	       x[i].style.display = "none";  
	       y[i].style.display = "none";  
	    }
	    myIndex++;
	    if (myIndex > x.length) {myIndex = 1}    
	    x[myIndex-1].style.display = "block";  
		y[myIndex-1].style.display = "block";  
	    setTimeout(carousel, 10000); // Change image every 2 seconds
	}



});




