window.onload = function() {
  topButtons();

  //Start of the events attached to the page
  window.addEventListener("resize", topButtons);
  document.getElementById("menuButton").addEventListener("click", sideMenu);


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

  //Script only avaliable in the page authors
  if(window.location.href.indexOf("authors") > 0) {
    document.getElementById("authorsearchbutton").addEventListener("click", function(){
      var authorTable = document.getElementById("authorsearchtable"),
      authorTableSize = 0;

      authorTableSize = authorTable.rows.length;
      //Deleting of the rows in the results table
      if(authorTableSize >= 0){
        for(i=0; i < authorTableSize; i++){
          authorTable.deleteRow(0);
        }
      }
      $.post("searchauthor.php",
      {
        name: document.getElementById("authorsearch").value
      },
      function(data, status){
        if(status == "success"){
            var results = JSON.parse(data),
            row = "";
            for (var i = 0; i < results.length; i++) {
              row = authorTable.insertRow();
              row.insertCell(0).innerHTML = "<a class= 'normalTextCenter' href='author.php?id="+results[i].ID_AUTHOR+"'>"+results[i].NAME+"<a/>";
            }
        }
      });
    });
  }

  //Scripts only avaliables in the page checkin
  if(window.location.href.indexOf("checkin") > 0){
    
    function checkNick(nick) {
      var correct = false;
      nick = nick.trim();
      nick = nick.toLowerCase();
      if (isNaN(nick)){
        if (nick.length >= 3 && nick.length <= 20){
          correct = true;
          $.get("getusers.php", 
            function(data, status){
              if(status == "success"){
                  var results = JSON.parse(data);
                  for (var i = 0; i < results.length; i++) {
                    if (nick.localeCompare(results[i].NICK) == 0){
                      correct = false;
                      document.getElementById("nickerror").innerHTML = "El nick ya está en uso";
                      document.getElementById("nickerror").classList.remove("w3-hide");            
                    }
                  }
              }
          });
          if(correct){
            document.getElementById("nickerror").innerHTML = "";
            document.getElementById("nickerror").classList.add("w3-hide");  
          }
        } else {
          document.getElementById("nickerror").innerHTML = "El nick debe tener entre 3 y 20 caracteres";
          document.getElementById("nickerror").classList.remove("w3-hide");
        }
      } else {
          document.getElementById("nickerror").innerHTML = "El nick no puede ser un número";
          document.getElementById("nickerror").classList.remove("w3-hide");
      }
      return correct;
    }//end function checkNick(nick)

    function checkEmail(email) {
      var correct = false,
        emailPattern =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      email = email.trim();
      email = email.toLowerCase();
      if (emailPattern.test(email)){
        $.ajax({
          async: false,
          type: "GET" ,
          url: "getusers.php",
          success: function(data) {
            var results = JSON.parse(data);
            for (var i = 0; i < results.length; i++) {
              if (email.localeCompare(results[i].EMAIL) == 0){
                document.getElementById("emailerror").innerHTML = "El Correo electrónico ya está en uso";
                document.getElementById("emailerror").classList.remove("w3-hide");     
                return false;
              }
            }
          }
      });
      return true;
      } else {
        document.getElementById("emailerror").innerHTML = "Debes introducir un correo correcto";
        document.getElementById("emailerror").classList.remove("w3-hide");
        return false;
      }    
    }//end function checkEmail(email)
    

    function checkName(name) {
      var correct = false,
        namePattern = /^[a-zA-Z]{3,30}$/;
      name = name.trim();
      if (namePattern.test(name)){
        correct = true;
        document.getElementById("nameerror").innerHTML = "";
        document.getElementById("nameerror").classList.add("w3-hide");  
      } else {
        document.getElementById("nameerror").innerHTML = "Debes introducir un nombre correcto";
        document.getElementById("nameerror").classList.remove("w3-hide");
      }
      return correct;
    }//end function checkName(name)

    function checkSubname(subname) {
      var correct = false,
        subnamePattern = /^[a-zA-Z]{3,30}$/;
        subname = subname.trim();
      if (subname.length==0){
        correct = true;
        document.getElementById("subnameerror").innerHTML = "";
        document.getElementById("subnameerror").classList.add("w3-hide");  
      } else {
        if (subnamePattern.test(subname)){
          correct = true;
          document.getElementById("subnameerror").innerHTML = "";
          document.getElementById("subnameerror").classList.add("w3-hide");  
        } else {
          document.getElementById("subnameerror").innerHTML = "Debes introducir un apellido correcto";
          document.getElementById("subnameerror").classList.remove("w3-hide");
        }
      }
      return correct;
    }//end function checkSubname(subname)

    function checkPass(pass) {
      var correct = false;
      if (pass.length >= 6 && pass.length <= 20){
        correct = true;
        document.getElementById("passerror").innerHTML = "";
        document.getElementById("passerror").classList.add("w3-hide");  
      } else {
        document.getElementById("passerror").innerHTML = "La contraseña debe contener entre 6 y 20 caracteres";
        document.getElementById("passerror").classList.remove("w3-hide");
        }
      return correct;
    }//end function checkPass(pass)

    function checkConfirmPass(confirmPass) {
      var correct = false;
      if (confirmPass.localeCompare(document.getElementById("passform").value) == 0){
        correct = true;
        document.getElementById("passcheckerror").innerHTML = "";
        document.getElementById("passcheckerror").classList.add("w3-hide");  
      } else {
        document.getElementById("passcheckerror").innerHTML = "La contraseñas deben coincidir";
        document.getElementById("passcheckerror").classList.remove("w3-hide");
        }
      return correct;
    }//end function checkPass(pass)


    document.getElementById("nickform").addEventListener("blur", function(){
      checkNick(this.value);
    });

    document.getElementById("emailform").addEventListener("blur", function(){
      checkEmail(this.value);
    });

    document.getElementById("nameform").addEventListener("blur", function(){
      checkName(this.value);
    });

    document.getElementById("subnameform").addEventListener("blur", function(){
      checkSubname(this.value);
    });

    document.getElementById("passform").addEventListener("blur", function(){
      checkPass(this.value);
    });

    document.getElementById("passconfirmform").addEventListener("blur", function(){
      checkConfirmPass(this.value);
    });

    document.getElementById("adduser").addEventListener("click", function(){
      var arrayResults = [],
          totalResult = 0;
      arrayResults[0] = checkNick(document.getElementById("nickform").value);
      arrayResults[1] = checkEmail(document.getElementById("emailform").value);
      arrayResults[2] = checkName(document.getElementById("nameform").value);
      arrayResults[3] = checkSubname(document.getElementById("subnameform").value);
      arrayResults[4] = checkPass(document.getElementById("passform").value);
      arrayResults[5] = checkConfirmPass(document.getElementById("passconfirmform").value);
      for (var i = 0; i < arrayResults.length; i++){
        if(arrayResults[i]){
          totalResult++;
        }
      }

      if(totalResult == 6){
          $.post("formadduser.php",
          {
            nick: document.getElementById("nickform").value,
            email: document.getElementById("emailform").value,
            name: document.getElementById("nameform").value,
            subname: document.getElementById("subnameform").value,
            pass: document.getElementById("passform").value
          },
          function(data, status){
            if(data == "1" && status == "success"){
              document.getElementById("divuserform").classList.add("w3-hide");
              document.getElementById("divusercreate").classList.remove("w3-hide");
            } else {
              document.getElementById("addusererror").classList.remove("w3-hide");
            }
          });
        }
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

  //Scripts only avaliables in the page addauthor
  if(window.location.href.indexOf("addauthor") > 0){
        
    function checkAuthor(author) {
      var correct = false;
      author = author.trim();
      if (author.length >= 3 && author.length <= 100){
        correct = true;
          $.ajax({
            async: false,
            type: "GET" ,
            url: "getauthors.php",
            success: function(data) {
              var results = JSON.parse(data);
              for (var i = 0; i < results.length; i++) {
                if (author.localeCompare(results[i].NAME) == 0){
                  correct = false;
                }
              }
            }
        });
        if (correct){
          document.getElementById("nameerror").innerHTML = "";
          document.getElementById("nameerror").classList.add("w3-hide");  
        } else {
          document.getElementById("nameerror").innerHTML = "El autor ya esta en la base de datos";
          document.getElementById("nameerror").classList.remove("w3-hide");  
        }
      } else {
        document.getElementById("nameerror").innerHTML = "El nombre debe tener entre 3 y 100 caracteres";
        document.getElementById("nameerror").classList.remove("w3-hide");
      }
      return correct;
    }//end function checkAuthor(title)


    function checkBio(bio) {
      var correct = false;
      bio = bio.trim();
      if (isNaN(bio)){
        if (bio.length >= 20 && bio.length <= 10000){
          correct = true;
          document.getElementById("bioerror").innerHTML = "";
          document.getElementById("bioerror").classList.add("w3-hide");
        } else {
          document.getElementById("bioerror").innerHTML = "La biografía debe tener entre 20 y 10000 caracteres";
          document.getElementById("bioerror").classList.remove("w3-hide");
        }
      } else {
        document.getElementById("bioerror").innerHTML = "La biografia no puede ser un número";
        document.getElementById("bioerror").classList.remove("w3-hide");
    }
      return correct;
    }//end function checkTitle(title)


    function checkBirth(birth) {
      var correct = false,
        currentDate = new Date(),
        splitDate = birth.split("-"),
        authorDate = new Date(splitDate[0], splitDate[1], splitDate[2]);

      if ((currentDate.getUTCFullYear() - authorDate.getUTCFullYear()) <= 16) {
        document.getElementById("dateerror").innerHTML = "El autor no puede tener menos de 16 años";
        document.getElementById("dateerror").classList.remove("w3-hide");
      } else {
        document.getElementById("dateerror").innerHTML = "";
        document.getElementById("dateerror").classList.add("w3-hide");
        correct = true;
      }
      return correct;
    }//end function checkBirth(birth)

    document.getElementById("authorform").addEventListener("blur", function(){
      checkAuthor(this.value);
    });

    document.getElementById("bioform").addEventListener("blur", function(){
      checkBio(this.value);
    });

    document.getElementById("dateform").addEventListener("blur", function(){
      checkBirth(this.value);
    });


    document.getElementById("addnewauthor").addEventListener("click", function(){
      var arrayResults = [],
          totalResult = 0,
          birth = document.getElementById("dateform").value;
      arrayResults[0] = checkAuthor(document.getElementById("authorform").value);
      arrayResults[1] = checkBio(document.getElementById("bioform").value);
      arrayResults[2] = checkBirth(document.getElementById("dateform").value);
      for (var i = 0; i < arrayResults.length; i++){
        if(arrayResults[i]){
          totalResult++;
        }
      }
      if(totalResult == 3){
        var splitDate = birth.split("-");

          $.post("formaddauthor.php",
          {
            name: document.getElementById("authorform").value,
            bio: document.getElementById("bioform").value,
            year: splitDate[0],
            month: splitDate[1],
            day: splitDate[2]
          },
          function(data, status){
            if(data == "1" && status == "success"){
              document.getElementById("addauthorcorrect").classList.remove("w3-hide");
              document.getElementById("addauthorerror").classList.add("w3-hide");
            } else {
              document.getElementById("addauthorcorrect").classList.add("w3-hide");
              document.getElementById("addauthorerror").classList.remove("w3-hide");
            }
          });
        }
    }); 
  }

  //Scripts only avaliables in the page book
  if(window.location.href.indexOf("book.php") > 0){
    document.getElementById("addBook").addEventListener("click", function(){
      
      var user = decodeURIComponent(document.cookie),
      split = user.split(','),
      finalUser = split[0].replace("login=", "");  

      $.post("addlibrary.php",
      {
        user: finalUser,
        isbn: document.getElementById("isbn").value
      },
      function(data, status){
        if(data == "1" && status == "success"){
          console.log(data);
        }
      });
    });
  }
};

function deleteBook(ISBN){
  var user = decodeURIComponent(document.cookie),
    split = user.split(','),
    finalUser = split[0].replace("login=", ""); 
    document.getElementById("advicedelete").classList.remove("w3-hide");

    document.getElementById("rollbackDelete").addEventListener("click", function(){
      document.getElementById("advicedelete").classList.add("w3-hide");
    });
    document.getElementById("confirmDelete").addEventListener("click", function(){
      document.getElementById("advicedelete").classList.add("w3-hide");
      $.post("deletelibrary.php",
      {
        ISBN: ISBN,
        user: finalUser
      },
      function(data, status){
        console.log(data);
        if(data == "1" && status == "success"){
        }
      });
    });
};
