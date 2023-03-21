function zmiana(x) {
   if (x == "klasa") {
      document.getElementById("klasa").style.display = "block";
      document.getElementById("zawod").style.display = "none";
   }
   if (x == "zawod") {
      document.getElementById("zawod").style.display = "block";
      document.getElementById("klasa").style.display = "none";
   }
}