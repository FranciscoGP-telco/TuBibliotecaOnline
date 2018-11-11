window.onload = function() {
  

  //Start of the events attached to the page
  window.addEventListener("resize", topButtons);
  document.getElementById("menuButton").addEventListener("click", sideMenu);
  document.getElementById("userButton").addEventListener("click", userMenu);


  //Start of the functions for the page behaviour
  //Function to show or hide the buttons of the top menu by its size
  function topButtons(){
    var windowWidth = window.innerWidth;
    var buttons = document.getElementById("toNarrow");
    if(windowWidth > 760){
      buttons.classList.remove("w3-hide");
      buttons.classList.add("w3-show");
    } else {
      buttons.classList.add("w3-hide");
      buttons.classList.remove("w3-show");
    }
  }//end of function topButtons()

  //Function to show or hide the side Menu
  function sideMenu(){
    var sideBar = document.getElementById("sideBar");
    if (sideBar.classList.contains("w3-show")){
      sideBar.classList.add("w3-hide");
      sideBar.classList.remove("w3-show");
    } else {
      sideBar.classList.add("w3-show");
      sideBar.classList.remove("w3-hide");
    }
  }//End of function sideMenu()

  
  //Function to show or hide the side Menu
  function userMenu(){
    var userBar = document.getElementById("userBar");
    if (userBar.classList.contains("w3-show")){
      userBar.classList.add("w3-hide");
      userBar.classList.remove("w3-show");
    } else {
      userBar.classList.add("w3-show");
      userBar.classList.remove("w3-hide");
    }
  }//End of function sideMenu()
};