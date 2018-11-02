window.onload = function() {
  document.getElementById("menuButton").addEventListener("click", function(){
    document.getElementById("leftMenu").style.display = "block";
  });

  document.getElementById("closeButton").addEventListener("click", function(){
    document.getElementById("leftMenu").style.display = "none";
  });
};