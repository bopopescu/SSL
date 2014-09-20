function checkcity(cityentered){
	var xmlhttp;
	var response = [];

	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}

	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("cityresponse").innerHTML=xmlhttp.responseText;

			for (var i=0; i<19; i++){
				response.push($('.city'+i).text());
			}
			// console.log(response);

			$('#city').autocomplete({
				source: response
			});
		}
	}
	xmlhttp.open("GET","cityresponse.php?cityget="+cityentered,true);
	xmlhttp.send();
}