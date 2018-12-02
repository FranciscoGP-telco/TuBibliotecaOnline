window.onload = function() {
  topButtons();

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


  //Script only avaliable in the page books
  if(window.location.href.indexOf("books") > 0) {
    document.getElementById("searchBooks").addEventListener("click", function(){
      var bookTable = document.getElementById("searchBooksTable"),
      bookTableSize = 0;

      bookTableSize = bookTable.rows.length;
      //Deleting of the rows in the results table
      if(bookTableSize >= 0){
        for(i=0; i < bookTableSize; i++){
          bookTable.deleteRow(0);
        }
      }
      $.post("searchbook.php",
      {
        title: document.getElementById("titleSearch").value
      },
      function(data, status){
        if(status == "success"){
            var results = JSON.parse(data),
            row = "";
            for (var i = 0; i < results.length; i++) {
              row = bookTable.insertRow();
              row.insertCell(0).innerHTML = "<a class= 'normalTextCenter' href='book.php?ISBN="+results[i].ISBN+"'>"+results[i].NAME+"<a/>";
            }
        }
      });
    });
  }

  //Scripts only avaliables in the page addbook
  if(window.location.href.indexOf("addbook") > 0){
    function checkISBN(ISBN) {
      var correct = false,
          error = "El ISBN debe contener 10 o 13 digitos";
      ISBN = ISBN.trim();
      if (!isNaN(ISBN)){
        if (ISBN.length == 10 || ISBN.length == 13){
          correct = true;
          document.getElementById("ISBNerror").innerHTML = "";
          document.getElementById("ISBNerror").classList.add("w3-hide");
        } else {
          document.getElementById("ISBNerror").innerHTML = error;
          document.getElementById("ISBNerror").classList.remove("w3-hide");
        }
      } else {
          document.getElementById("ISBNerror").innerHTML = error;
          document.getElementById("ISBNerror").classList.remove("w3-hide");
      }
      return correct;
    }//end function checkISBN(ISBN)
    
    function checkTitle(title) {
      var correct = false,
          error = "Debes introducir un titulo";
      title = title.trim();
      if (title.length >= 1){
        correct = true;
        document.getElementById("titleerror").innerHTML = "";
        document.getElementById("titleerror").classList.add("w3-hide");
      } else {
        document.getElementById("titleerror").innerHTML = error;
        document.getElementById("titleerror").classList.remove("w3-hide");
      }
      return correct;
    }//end function checkTitle(title)


    function checkGenre(genre) {
      var correct = false,
          errorNumber = "El género no puede ser númerico",
          errorLength = "El género debe contenter entre 4 y 20 caracteres";
      genre = genre.trim();
      if (isNaN(genre)){
        if (genre.length >= 4 && genre.length <= 20){
          correct = true;
          document.getElementById("genreerror").innerHTML = "";
          document.getElementById("genreerror").classList.add("w3-hide");
        } else {
          document.getElementById("genreerror").innerHTML = errorLength;
          document.getElementById("genreerror").classList.remove("w3-hide");
        }
      } else {
        document.getElementById("genreerror").innerHTML = errorNumber;
        document.getElementById("genreerror").classList.remove("w3-hide");
    }
      return correct;
    }//end function checkTitle(title)


    function checkPlot(plot) {
      var correct = false,
          error = "El argumento debe tener entre 10 y 10.000 caracteres";
      plot = plot.trim();
      if (plot.length >= 10 && plot.length <= 10000){
        correct = true;
        document.getElementById("ploterror").innerHTML = "";
        document.getElementById("ploterror").classList.add("w3-hide");
      } else {
        document.getElementById("ploterror").innerHTML = error;
        document.getElementById("ploterror").classList.remove("w3-hide");
      }
      return correct;
    }//end function checkPlot(plot)

    document.getElementById("ISBNform").addEventListener("blur", function(){
      checkISBN(this.value);
    });

    document.getElementById("titleform").addEventListener("blur", function(){
      checkTitle(this.value);
    });

    document.getElementById("genreform").addEventListener("blur", function(){
      checkGenre(this.value);
    });

    document.getElementById("plotform").addEventListener("blur", function(){
      checkPlot(this.value);
    });

    document.getElementById("addnewbook").addEventListener("click", function(){
      var arrayResults = [],
          totalResult = 0;
      arrayResults[0] = checkISBN(document.getElementById("ISBNform").value);
      arrayResults[1] = checkTitle(document.getElementById("titleform").value);
      arrayResults[2] = checkGenre(document.getElementById("genreform").value);
      arrayResults[3] = checkPlot(document.getElementById("plotform").value);
      for (var i = 0; i < arrayResults.length; i++){
        if(arrayResults[i]){
          totalResult++;
        }
      }
      if(totalResult == 4){
          $.post("formaddbook.php",
          {
            ISBN: document.getElementById("ISBNform").value,
            title: document.getElementById("titleform").value,
            genre: document.getElementById("genreform").value,
            plot: document.getElementById("plotform").value,
            publisher: document.getElementById("publisherform").value,
            author: document.getElementById("authorform").value
          },
          function(data, status){
            console.log(data);
            if(data == "1" && status == "success"){
              document.getElementById("addbookcorrect").classList.remove("w3-hide");
              document.getElementById("addbookerror").classList.add("w3-hide");
            } else {
              document.getElementById("addbookcorrect").classList.add("w3-hide");
              document.getElementById("addbookerror").classList.remove("w3-hide");
            }
          });
        }
    }); 
  }
};