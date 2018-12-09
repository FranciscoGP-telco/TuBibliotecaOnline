window.onload = function() {
  //load of the function for the menu buttons
  topButtons();

  //events attached to the page They resize the web and activate the menu
  window.addEventListener("resize", topButtons);
  document.getElementById("menuButton").addEventListener("click", sideMenu);
  
  //If the cookie 'cookie' exists, disable de advice
  if(Cookies.get('cookie') == 'yes'){
    document.getElementById("cookies").classList.add("w3-hide");
  };

  //Event to close the advice for the cookies
  document.getElementById("cookiebutton").addEventListener("click", setAdviceCookie);

  //Start of the functions for the page behaviour
  //Function to show or hide the buttons of the top menu by its size
  function topButtons(){
    var windowWidth = window.innerWidth;
    var buttons = document.getElementById("toNarrow");
    //if the width pass 760px, show the full menu
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

  //Function to set the cookie to stop advice the user with the cookies
  function setAdviceCookie(){
    Cookies.set('cookie', 'yes', { expires: 365});
    document.getElementById("cookies").classList.add("w3-hide");
  }//End of function setAdviceCookie()

  //end of the functions for the page behaviour

  //Script only avaliable in the page "books". used to search books
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
      //jquery ajax function, calling searchbook.php page for the information
      $.post("searchbook.php",
      {
        title: document.getElementById("titleSearch").value
      },
      function(data, status){
        //showing the results in the table, parsing the JSON date from the PHP and adding it
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
  }//End of the scripts in page "books"

  //Script only avaliable in the page "publishers". Use to the search of publishers
  if(window.location.href.indexOf("publishers") > 0) {
    document.getElementById("buttonsearchpublishers").addEventListener("click", function(){
      var publisherTable = document.getElementById("publisherTable"),
          publisherTableSize = 0;

      publisherTableSize = publisherTable.rows.length;
      //Deleting of the rows in the results table
      if(publisherTableSize >= 0){
        for(i=0; i < publisherTableSize; i++){
          publisherTable.deleteRow(0);
        }
      }
      //jquery ajax function, calling searchpublisher.php page for the information
      $.post("searchpublisher.php",
      {
        name: document.getElementById("publisherSearch").value
      },
      function(data, status){
        if(status == "success"){
            //showing the results in the table, parsing the JSON date from the PHP and adding it
            var results = JSON.parse(data),
            row = "";
            for (var i = 0; i < results.length; i++) {
              row = publisherTable.insertRow();
              row.insertCell(0).innerHTML = "<a class= 'normalTextCenter' href='publisher.php?id="+results[i].ID_PUBLISHER+"'>"+results[i].NAME+"<a/>";
              row.insertCell(1).innerHTML = "<a>"+results[i].PHONE+"<a/>";
              row.insertCell(2).innerHTML = "<a href='mailto:"+results[i].EMAIL+"'>"+results[i].EMAIL+"<a/>";
            }
        }
      });
    });
  }//End of the scripts in page "publishers"

  //Script only avaliable in the page "authors". Use to the search of authors
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
       //jquery ajax function, calling searchpublisher.php page for the information
      $.post("searchauthor.php",
      {
        name: document.getElementById("authorsearch").value
      },
      function(data, status){
        if(status == "success"){
            //showing the results in the table, parsing the JSON date from the PHP and adding it
            var results = JSON.parse(data),
            row = "";
            for (var i = 0; i < results.length; i++) {
              row = authorTable.insertRow();
              row.insertCell(0).innerHTML = "<a class= 'normalTextCenter' href='author.php?id="+results[i].ID_AUTHOR+"'>"+results[i].NAME+"<a/>";
            }
        }
      });
    });
  }//End of the scripts in page "authors"

  //Scripts only avaliables in page "book". Use to add books to the library in the book page
  if(window.location.href.indexOf("book.php") > 0){
    document.getElementById("addBook").addEventListener("click", function(){
      //Checking the actual user from the cookies
      var finalUser = Cookies.get('login'),
          isbn = document.getElementById("isbn").value;  
      //jquery ajax function to send the information to add the book.
      $.post("addlibrary.php",
      {
        nick: finalUser,
        isbn: isbn
      },
      function(data, status){
        if(data == "1" && status == "success"){
          //reload the page to refresh the resuls
          location.reload();
        }
      });
    });
  }//End of the scripts in page "book"



  //Scripts only avaliables in the page checkin and firstuser
  if(window.location.href.indexOf("checkin") > 0 || window.location.href.indexOf("firstuser") > 0){
    var userType = "";
    //Depends of the page, the user will be an admin or a normal user
    if (window.location.href.indexOf("firstuser") > 0){
      userType = "ADMIN";
    } else {
      userType = "USUARIO"
    }

    //Function to check if the nick is correct
    function checkNick(nick) {
      var correct = false;
      //deleting the spaces from the begging and ending, and transform the name to lowercase
      nick = nick.trim();
      nick = nick.toLowerCase();
      //If is a number or the length doesn't match, show the error
      if (isNaN(nick)){
        if (nick.length >= 3 && nick.length <= 20){
          correct = true;
          //jquery ajax function, used to check if the name is in use with the DB information
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
          //If is correct the information, hide the error span
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

    //function to check if the email is correct
    function checkEmail(email) {
      var correct = false,
          emailPattern =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      //deleting the spaces from the begging and ending, and transform the name to lowercase
      email = email.trim();
      email = email.toLowerCase();
      //Checking the email pattern
      if (emailPattern.test(email)){
        correct = true;
        //jquery ajax function, used to check if the email is in use with the DB information
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
                correct = false;
              }
            }
          }
      });
      //If is correct the information, hide the error span
        if(correct){
          document.getElementById("emailerror").innerHTML = "";
          document.getElementById("emailerror").classList.add("w3-hide");  
        }
      } else {
        document.getElementById("emailerror").innerHTML = "Debes introducir un correo correcto";
        document.getElementById("emailerror").classList.remove("w3-hide");
        correct = false;
      }    
      return correct;
    }//end function checkEmail(email)
    
    //function to check if the name is correct
    function checkName(name) {
      var correct = false,
          namePattern = /^[a-zA-Z]{3,30}$/;
      //deleting the spaces
      name = name.trim();
      //Checking the pattern
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

    //function to check if the subname is correct
    function checkSubname(subname) {
      var correct = false,
          subnamePattern = /^[a-zA-Z]{3,30}$/;
      //deleting the spaces
      subname = subname.trim();
      if (subname.length==0){
        correct = true;
        document.getElementById("subnameerror").innerHTML = "";
        document.getElementById("subnameerror").classList.add("w3-hide");  
      } else {
        //Checking the pattern
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

    //Function to check the length of the pass
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

    //Function to double check the pass
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


    //blur event to call the functions to check the parameters
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
    //End of blur events

    //Click event to add the user. Before its checks all the previous comprobations
    document.getElementById("adduser").addEventListener("click", function(){
      //array to store all the results
      var arrayResults = [],
          totalResult = 0;
      //Checking the results
      arrayResults[0] = checkNick(document.getElementById("nickform").value);
      arrayResults[1] = checkEmail(document.getElementById("emailform").value);
      arrayResults[2] = checkName(document.getElementById("nameform").value);
      arrayResults[3] = checkSubname(document.getElementById("subnameform").value);
      arrayResults[4] = checkPass(document.getElementById("passform").value);
      arrayResults[5] = checkConfirmPass(document.getElementById("passconfirmform").value);
      //and counting it
      for (var i = 0; i < arrayResults.length; i++){
        if(arrayResults[i]){
          totalResult++;
        }
      }

      //If all is correct, calling the jquery ajax function to post the information
      if(totalResult == 6){
          $.post("formadduser.php",
          {
            nick: document.getElementById("nickform").value,
            email: document.getElementById("emailform").value,
            name: document.getElementById("nameform").value,
            subname: document.getElementById("subnameform").value,
            pass: document.getElementById("passform").value,
            userType: userType
          }, 
          //Showing the results
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
  }//End of Scripts in the page checkin and firstuser

  //Scripts only avaliables in the page addbook
  if(window.location.href.indexOf("addbook") > 0){
    
    //Function to check if the ISBN is correct
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
    
    //Function to check if the title is correct
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

    //Function to check if the genre is correct
    function checkGenre(genre) {
      var correct = false;
      genre = genre.trim();
      if (isNaN(genre)){
        if (genre.length >= 4 && genre.length <= 20){
          correct = true;
          document.getElementById("genreerror").innerHTML = "";
          document.getElementById("genreerror").classList.add("w3-hide");
        } else {
          document.getElementById("genreerror").innerHTML = "El género debe contenter entre 4 y 20 caracteres";
          document.getElementById("genreerror").classList.remove("w3-hide");
        }
      } else {
        document.getElementById("genreerror").innerHTML = "El género no puede ser númerico";
        document.getElementById("genreerror").classList.remove("w3-hide");
    }
      return correct;
    }//end function checkTitle(title)

    //Function to check if the plot is correct
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

    //blur event to call the functions to check the parameters
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
    //end of blur events

    //Click event to add the new book
    document.getElementById("addnewbook").addEventListener("click", function(){
      //array to store all the results
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
      //if everithing is correct, calling formaddbook.php to add the book
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
            //showing the results
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
  }//End of scripts in page addbook

  //Scripts only avaliables in the page addauthor
  if(window.location.href.indexOf("addauthor") > 0){
        
    //Fuction to check if the author is correct
    function checkAuthor(author) {
      var correct = false;
      author = author.trim();
      if (author.length >= 3 && author.length <= 100){
        correct = true;
          //Jquery Ajax function to get all the authors and check if is not in the DB
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

    //Function to check if the Biography is correct
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

    //Function to check if the date is correct
    function checkBirth(birth) {
      var correct = false,
        //creating two objects "date" to later compare it 
        currentDate = new Date(),
        splitDate = birth.split("-"),
        authorDate = new Date(splitDate[0], splitDate[1], splitDate[2]);
      //the author must be older than 16 years
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

    //blur events to call the functions to check the parameters
    document.getElementById("authorform").addEventListener("blur", function(){
      checkAuthor(this.value);
    });

    document.getElementById("bioform").addEventListener("blur", function(){
      checkBio(this.value);
    });

    document.getElementById("dateform").addEventListener("blur", function(){
      checkBirth(this.value);
    });
    //End of blur events

    //Click event to add the author
    document.getElementById("addnewauthor").addEventListener("click", function(){
      //array to store all the results
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
      //If everything os ok, calling the addauthor page
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
            //showing the results
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
  }//End of scripts on page addauthor

  //Scripts only avaliables in the page addpublisher
  if(window.location.href.indexOf("addpublisher") > 0){
    //Function to check the publisher
    function checkPublisher(publisher) {
      var correct = false;
      publisher = publisher.trim();
      publisher = publisher.toLowerCase();
      if (publisher.length >= 3 && publisher.length <= 50){
        correct = true;
        //Ajax jquery function to check if the publisher are in the DB
        $.ajax({
          async: false,
          type: "GET" ,
          url: "getpublishers.php",
          success: function(data) {
            var results = JSON.parse(data);
            for (var i = 0; i < results.length; i++) {
              if (publisher.localeCompare(results[i].NAME) == 0){
                correct = false;
              }
            }
          }
        });
        //Showing the results
        if (correct){
          document.getElementById("nameerror").innerHTML = "";
          document.getElementById("nameerror").classList.add("w3-hide");  
        } else {
          document.getElementById("nameerror").innerHTML = "La editorial ya está en la base de datos";
          document.getElementById("nameerror").classList.remove("w3-hide");  
        }
      } else {
        document.getElementById("nameerror").innerHTML = "El nombre debe tener entre 3 y 50 caracteres";
        document.getElementById("nameerror").classList.remove("w3-hide");
      }
      return correct;
    }//end function checkPublisher(publisher)

    //Function to check the email
    function checkEmail(email) {
      var correct = false,
          emailPattern =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      email = email.trim();
      email = email.toLowerCase();
      //checking the pattern
      if (emailPattern.test(email)){
        //ajax function to check if the email is in the DB
        $.ajax({
          async: false,
          type: "GET" ,
          url: "getpublishers.php",
          success: function(data) {
            correct = true;
            var results = JSON.parse(data);
            for (var i = 0; i < results.length; i++) {
              if (email.localeCompare(results[i].EMAIL) == 0){
                document.getElementById("emailerror").innerHTML = "El Correo electrónico ya está en uso";
                document.getElementById("emailerror").classList.remove("w3-hide");     
                correct = false;
              }
            }
          }
        });
        //Showing the results
        if(correct){
          document.getElementById("emailerror").innerHTML = "";
          document.getElementById("emailerror").classList.add("w3-hide");    
        }
      } else {
        document.getElementById("emailerror").innerHTML = "Debes introducir un correo correcto";
        document.getElementById("emailerror").classList.remove("w3-hide");
      }
      return correct;    
    }//end function checkEmail(email)
    
    //Function to check if the address is correct
    function checkAddress(address) {
      var correct = false;
      address = address.trim();
      if (address.length >= 10 && address.length <= 1000){
        correct = true;
        document.getElementById("addresserror").innerHTML = "";
        document.getElementById("addresserror").classList.add("w3-hide");  
      } else {
        document.getElementById("addresserror").innerHTML = "La dirección debe tener entre 10 y 1000 caracteres";
        document.getElementById("addresserror").classList.remove("w3-hide");
      }
      return correct;
    }//end function checkAddress(address)
    
    //function to check if the phone is correct
    function checkPhone(phone) {
      var correct = false;
      phone = phone.trim();
      //checking if is a number and the length
      if (!isNaN(phone)){
        if (phone.length == 9){
          correct = true;
          document.getElementById("phoneerror").innerHTML = "";
          document.getElementById("phoneerror").classList.add("w3-hide");  
        } else {
          document.getElementById("phoneerror").innerHTML = "El telefono debe tener 9 números";
          document.getElementById("phoneerror").classList.remove("w3-hide");
        }
      } else {
        document.getElementById("phoneerror").innerHTML = "El telefono debe ser númerico";
        document.getElementById("phoneerror").classList.remove("w3-hide");
      }

      return correct;
    }//end function checkAddress(address)

    //blur events to call the functions to check the parameters
    document.getElementById("nameform").addEventListener("blur", function(){
      checkPublisher(this.value);
    });

    document.getElementById("emailform").addEventListener("blur", function(){
      checkEmail(this.value);
    });

    document.getElementById("addressform").addEventListener("blur", function(){
      checkAddress(this.value);
    });


    document.getElementById("phoneform").addEventListener("blur", function(){
      checkPhone(this.value);
    });
    //End of blur events

    //Click event to check if everything is correct and add the publisher
    document.getElementById("addnewpublisher").addEventListener("click", function(){
      //array to store the results
      var arrayResults = [],
          totalResult = 0;
      arrayResults[0] = checkPublisher(document.getElementById("nameform").value);
      arrayResults[1] = checkAddress(document.getElementById("addressform").value);
      arrayResults[2] = checkEmail(document.getElementById("emailform").value);
      arrayResults[3] = checkPhone(document.getElementById("phoneform").value);

      for (var i = 0; i < arrayResults.length; i++){
        if(arrayResults[i]){
          totalResult++;
        }
      }

      //If everything is correct, calling the php page to add the publisher
      if(totalResult == 4){
        $.post("formaddpublisher.php",
        {
          name: document.getElementById("nameform").value,
          address: document.getElementById("addressform").value,
          email: document.getElementById("emailform").value,
          phone: document.getElementById("phoneform").value
        },
        function(data, status){
          //showing the results
          if(data == "1" && status == "success"){
            document.getElementById("addpublishercorrect").classList.remove("w3-hide");
            document.getElementById("addpublishererror").classList.add("w3-hide");
          } else {
            document.getElementById("addpublishercorrect").classList.add("w3-hide");
            document.getElementById("addpublishererror").classList.remove("w3-hide");
          }
        });
      }
    }); 
  }//End of scripts in page addpublisher
};

//function to get the data for delete a book from the library
function deleteBookLibrary(ISBN){
  //getting the user for the cookies
  var user = Cookies.get('login'),
    split = user.split(','),
    finalUser = split[0].replace("login=", ""); 
    document.getElementById("advicedelete").classList.remove("w3-hide");

    //confirmation of the opetation
    document.getElementById("rollbackDelete").addEventListener("click", function(){
      document.getElementById("advicedelete").classList.add("w3-hide");
    });
    document.getElementById("confirmDelete").addEventListener("click", function(){
      document.getElementById("advicedelete").classList.add("w3-hide");
      //calling the php page to delete the book from the library
      $.post("deletelibrary.php",
      {
        ISBN: ISBN,
        user: finalUser
      },
      function(data, status){
        if(data == "1" && status == "success"){
          //Refresh the page to show the results
          location.reload();
        }
      });
    });
}//End of function deleteBookLibrary(ISBN)

//Function for delete a user
function deleteUser(nick){
  document.getElementById("advicedelete").classList.remove("w3-hide");

  //confirmation of the operation
  document.getElementById("rollbackDelete").addEventListener("click", function(){
    document.getElementById("advicedelete").classList.add("w3-hide");
  });

  document.getElementById("confirmDelete").addEventListener("click", function(){
    document.getElementById("advicedelete").classList.add("w3-hide");
    //calling the php page to delete the user
    $.post("deleteuser.php",
    {
      nick: nick
    },
    function(data, status){
      if(data == "1" && status == "success"){
        //Refresh the page to show the results
        location.reload();
      }
    });
  });
}//end of function deleteUser(nick)

//Function for update the information of a user
function updateUser(nick){
  document.getElementById("adviceupdate").classList.remove("w3-hide");
  
  //confirmation of the operation
  document.getElementById("rollbackUpdate").addEventListener("click", function(){
    document.getElementById("adviceupdate").classList.add("w3-hide");
  });

  document.getElementById("confirmUpdate").addEventListener("click", function(){
    document.getElementById("adviceupdate").classList.add("w3-hide");
    //calling the php page to update the data
    $.post("updateuser.php",
    {
      nick: nick,
      name: document.getElementById("name_"+nick).value,
      subname: document.getElementById("subname_"+nick).value,
      usertype: document.getElementById("type_"+nick).value,
      email: document.getElementById("email_"+nick).value
    },
    function(data, status){
      if(data == "1" && status == "success"){
        //Refresh the page to show the results
        location.reload();
      }
    });
  });
}//end of function updateUser(nick)

//Function for delete a book
function deleteBook(ISBN){
  document.getElementById("advicedelete").classList.remove("w3-hide");
  
  //confirmation of the operation
  document.getElementById("rollbackDelete").addEventListener("click", function(){
    document.getElementById("advicedelete").classList.add("w3-hide");
  });

  document.getElementById("confirmDelete").addEventListener("click", function(){
    document.getElementById("advicedelete").classList.add("w3-hide");
    //calling the php page to delete the book
    $.post("deletebook.php",
    {
      ISBN: ISBN
    },
    function(data, status){
      if(data == "1" && status == "success"){
        //Refresh the page to show the results
        location.reload();
      }
    });
  });
}//end of function deleteBook(ISBN)

//Function for update the information of books
function updateBook(ISBN){
  document.getElementById("adviceupdate").classList.remove("w3-hide");

  //confirmation of the operation
  document.getElementById("rollbackUpdate").addEventListener("click", function(){
    document.getElementById("adviceupdate").classList.add("w3-hide");
  });

  //calling the php page to update the data
  document.getElementById("confirmUpdate").addEventListener("click", function(){
    document.getElementById("adviceupdate").classList.add("w3-hide");
    $.post("updatebook.php",
    {
      ISBN: ISBN,
      name: document.getElementById("name_"+ISBN).value,
      genre: document.getElementById("genre_"+ISBN).value
    },
    function(data, status){
      if(data == "1" && status == "success"){
        //Refresh the page to show the results
        location.reload();
      }
    });
  });
}//end of function updateBook(ISBN)

//Function for delete an author
function deleteAuthor(id){
  document.getElementById("advicedelete").classList.remove("w3-hide");
 
  //confirmation of the operation
  document.getElementById("rollbackDelete").addEventListener("click", function(){
    document.getElementById("advicedelete").classList.add("w3-hide");
  });

  document.getElementById("confirmDelete").addEventListener("click", function(){
    document.getElementById("advicedelete").classList.add("w3-hide");
    //calling the php page to delete the book
    $.post("deleteauthor.php",
    {
      id: id
    },
    function(data, status){
      if(data == "1" && status == "success"){
        //Refresh the page to show the results
        location.reload();
      } else {
        //advice in the case that the author have books in the DB
        document.getElementById("advice").classList.remove("w3-hide");
        document.getElementById("closeAdvice").addEventListener("click", function(){
          document.getElementById("advice").classList.add("w3-hide");
        });
      }
    });
  });
}//end of function deleteAuthor(id)

//Function for update the information of authors
function updateAuthor(id){
  document.getElementById("adviceupdate").classList.remove("w3-hide");
 
  //confirmation of the operation
  document.getElementById("rollbackUpdate").addEventListener("click", function(){
    document.getElementById("adviceupdate").classList.add("w3-hide");
  });

  document.getElementById("confirmUpdate").addEventListener("click", function(){
    document.getElementById("adviceupdate").classList.add("w3-hide");
    //calling the php page to update the author data
    $.post("updateauthor.php",
    {
      id: id,
      name: document.getElementById("name_"+id).value,
      date: document.getElementById("date_"+id).value
    },
    function(data, status){
      if(data == "1" && status == "success"){
        //Refresh the page to show the results
        location.reload();
      }
    });
  });
}//end of function updateAuthor(id)

//Function for delete a publisher
function deletePublisher(id){
  document.getElementById("advicedelete").classList.remove("w3-hide");

  //confirmation of the operation
  document.getElementById("rollbackDelete").addEventListener("click", function(){
    document.getElementById("advicedelete").classList.add("w3-hide");
  });


  document.getElementById("confirmDelete").addEventListener("click", function(){
    document.getElementById("advicedelete").classList.add("w3-hide");
    //calling the php page to delete the book
    $.post("deletepublisher.php",
    {
      id: id
    },
    function(data, status){
      if(data == "1" && status == "success"){
        //Refresh the page to show the results
        location.reload();
      } else {
        //advice in the case that the publisher have books in the DB
        document.getElementById("advice").classList.remove("w3-hide");
        document.getElementById("closeAdvice").addEventListener("click", function(){
          document.getElementById("advice").classList.add("w3-hide");
        });
      }
    });
  });
}//end of function deletePublisher(id)

//Function for update the information of authors
function updatePublisher(id){
  document.getElementById("adviceupdate").classList.remove("w3-hide");

  //confirmation of the operation
  document.getElementById("rollbackUpdate").addEventListener("click", function(){
    document.getElementById("adviceupdate").classList.add("w3-hide");
  });

  document.getElementById("confirmUpdate").addEventListener("click", function(){
    document.getElementById("adviceupdate").classList.add("w3-hide");
    //calling the php page to update the publisher data
    $.post("updatepublisher.php",
    {
      id: id,
      name: document.getElementById("name_"+id).value,
      address: document.getElementById("address_"+id).value,
      phone: document.getElementById("phone_"+id).value,
      email: document.getElementById("email_"+id).value
    },
    function(data, status){
      if(data == "1" && status == "success"){
        //Refresh the page to show the results
        location.reload();
      }
    });
  });
}//end of function updatePublisher(id)
