function change()
{
	document.body.style.backgroundColor = "black";
	document.getElementById("logo").style.color="black";
	document.getElementById("menu").style.color="black";
	document.getElementById("nav").style.color="black";
	document.getElementById("disc").style.color="black";
	document.getElementById("button").style.color="black";
	document.getElementById("1").style.color="black";
	document.getElementById("footer").style.color="black";
}

function opis() 
{
  var para = document.createElement("P");
  para.innerHTML = "Witaj przybyszu! Jeżeli jakimś cudem dotarłeś do tej części odmentów internetu, to z pewnością interesuje cię tematyka rysunkowa. 	Jeżeli nie, to nie uciekaj, może odkryjesz nowe hobby!";
  document.getElementById("disc").appendChild(para);
}

if (window.localStorage && window.sessionStorage){
	function Save()
	{
		var Content = document.getElementById("Textarea").value; 
		var Content2 = document.getElementById("Imie").value; 
		var Content3 = document.getElementById("Nazwisko").value; 
		var Content4 = document.getElementById("Email").value;
        localStorage.setItem("Content", Content);
		sessionStorage.setItem("Content2", Content2);
		sessionStorage.setItem("Content3", Content3);
		sessionStorage.setItem("Content3", Content3);	
		sessionStorage.setItem("Content4", Content4);	
	}
}

if (window.localStorage && window.sessionStorage){
	function Load()
	{
		var Content = localStorage.getItem("Content");
		var Content2 = sessionStorage.getItem("Content2");
		var Content3 = sessionStorage.getItem("Content3");
		var Content4 = sessionStorage.getItem("Content4");
        document.getElementById("Textarea").value = Content;
        document.getElementById("Imie").value = Content2;
        document.getElementById("Nazwisko").value = Content3;
        document.getElementById("Email").value = Content4;
	}
}
function Clean()
{
	 var Content = document.getElementById("textarea").value;
        localStorage.clear();
}

function dancing(event, pixel){
		$(event.target).animate({top: pixel + 'px'}, function(){
		dancing(event, -pixel);
	});
}
