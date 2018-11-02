window.onload = function() {
  document.getElementById("closeButton").addEventListener("click", function(){
    document.getElementById("mySidebar").style.display = "none";
    console.log("Cierro");
  });

  document.getElementById("menuButton").addEventListener("click", function(){
    document.getElementById("mySidebar").style.display = "block";
    console.log("Abro");
  });
};