//xhr object
    var xhr = false;  
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
//initialise boolean to check when to execute submit
var success = false;
function checksearch(datasource, divId, search) {   
    



    if (datasource == 'display.php') {
        
	    var place = document.getElementById(divId);
	    var url = "display.php?searchfield=" + search;
	    xhr.open("POST", url, true);
	    xhr.setRequestHeader("Content-Type", "application/x-www-form- urlencoded");
	    xhr.onreadystatechange = function() {
		   
			if (xhr.readyState == 4 && xhr.status == 200) {
			place.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	    xhr.send(url);

}else if (datasource == 'assignreference.php') {
    
    
        var place = document.getElementById(divId);
	    var url = "assignreference.php?searchfield=" + search;
	    xhr.open("POST", url, true);
	    xhr.setRequestHeader("Content-Type", "application/x-www-form- urlencoded");
	    xhr.onreadystatechange = function() {
		    //alert(xhr.readyState);
			if (xhr.readyState == 4 && xhr.status == 200) {
			place.innerHTML = xhr.responseText;
		    } // end if
	    } // end anonymous call-back function
	    xhr.send(url);
    
    }

    
    
}





