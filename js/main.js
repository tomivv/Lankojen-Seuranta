
  	function button(){
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
	  		
	  		document.getElementById('tuloste').innerHTML = "";
			document.getElementById('tuloste').innerHTML += "<thead>" + "<tr> <th>Lanka" + "</th> <th>Väri" + "</th> <th>Värikoodi" + "</th> <th>Paino" + "</th> </tr>" + "</thead>";
	    	
	    	var r = JSON.parse(this.responseText);
	   		
			if (r.length == 0) {
				document.getElementById('tuloste').innerHTML += "<h4> Ei Tuloksia </h4>";
	   		}else{
	   			for (i = 0; i < r.length; i++) {
	   				if (parseInt(r[i].Varikoodi) < 100) {
	   					document.getElementById('tuloste').innerHTML += "<tr> <td>" + r[i].Lanka +  "</td> <td>" + r[i].Vari + "</td> <td> 0" + r[i].Varikoodi + "</td> <td>" + r[i].Paino + "g </td> </tr>";	
	   				} else{
	   					document.getElementById('tuloste').innerHTML += "<tr> <td>" + r[i].Lanka +  "</td> <td>" + r[i].Vari + "</td> <td>" + r[i].Varikoodi + "</td> <td>" + r[i].Paino + "g </td> </tr>";
	   				}
	   			}
			}
  		}
  	};

  	
	var url = "";

	
	if (document.getElementById('parametri').value == "") {
		url = 'iface.php?empty';
	}
	else{
		url = 'iface.php?param=' + document.getElementById('parametri').value;
	}
	    
	
	xhttp.open("GET", url, true);
	xhttp.send();
};

window.onload = function () {
    if (document.readyState == "complete") {
       if (window.location.href == "http://localhost/Lankojen_Seuranta/") {
       		button();
       }
    }
}

function save(){
	window.location.href = "http://localhost/Lankojen_Seuranta//save.php";
};

function del(){
	window.location.href = "http://localhost/Lankojen_Seuranta/poista.php";
};

function index(){
	window.location.href = "http://localhost/Lankojen_Seuranta/";
};
