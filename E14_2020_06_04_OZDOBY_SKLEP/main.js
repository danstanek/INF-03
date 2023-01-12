function f(wybor) {
	let wynik = document.getElementById("wynik");
	console.log(wybor)
	if(wybor == "c") wynik.innerHTML = "Wybrałeś choinkę. Cena 10 zł";
	if(wybor == "m") wynik.innerHTML = "Wybrałeś mikołaja. Cena 12 zł";
	if(wybor == "r") wynik.innerHTML = "Wybrałeś renifera. Cena 8 zł";
}
