<?php
  //Class with all the DB functions
  class DB {
    //Function only avaliable for the rest of the functions in the class 
    protected static function execQuery($sql) {
      //Conection with the MySQL
      $connection = new PDO("mysql:host=localhost;dbname=id7548059_tubibliotecaonline;charset=utf8", "id7548059_francisco", "gp4649c2");
      $result = null;
      try {
        //Trying the connection and executing the query
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($connection)) $result = $connection->query($sql);
        //Catching all the error that can come from the queries
      } catch (PDOException $error) {
        print_r("Ha ocurrido el siguiente error: ".$error->getMessage()." Por favor, ponte en contacto con el administrado de la aplicación: ");
      }
      //closing the connection to the DB
      $connection = null; 
      return $result;
    }//End of function execQuery($sql)
    
    //Function to geet the book with a concrete ISBN
    public static function getBook($ISBN) {
      $sql = "SELECT B.ISBN, B.NAME AS TITLE, B.GENRE, B.PLOT, A.NAME AS AUTHOR, P.NAME AS PUBLISHER, P.ID_PUBLISHER AS ID_PUBLISHER\n"
      . "FROM BOOKS B, AUTHOR A, PUBLISHERS P \n"
      . "WHERE B.ID_PUBLISHER = P.ID_PUBLISHER AND A.ID_AUTHOR = B.ID_AUTHOR AND ISBN='".$ISBN."'";
      $result = self::execQuery ($sql);
      $row = null;
      //Due to the filter is the primary key, we only have one result. We use fetch
      if(isset($result)){
      $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }//end function getBook($ISBN)

    //Function to get all the books
    public static function getAllBooks() {
      $sql = "SELECT ISBN, NAME, GENRE\n"
      . "FROM BOOKS";
      $result = self::execQuery ($sql);
      $books = null;
      if(isset($result)){
        $books = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $books;
    }//end function getAllBooks() 

    //Function to get the 4 books most recent
    public static function getRecientBooks($USER) {
      $sql = "SELECT B.ISBN AS ISBN, B.NAME AS TITLE, A.NAME AS AUTHOR, L.ADD_DATE AS ADD_DATE\n"
      . "FROM USERS U, BOOKS B, LIBRARY L, AUTHOR A\n"
      . "WHERE U.NICK = L.NICK AND L.ISBN = B.ISBN AND B.ID_AUTHOR = A.ID_AUTHOR AND U.NICK = '".$USER."'\n"
      . "ORDER BY ADD_DATE ASC \n"
      . "LIMIT 4 ";
      $result = self::execQuery ($sql);
      $books = null;
      if(isset($result)){
        $books = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $books;
    }//end function getRecientBooks($USER)

    //Function to get the library of a user
    public static function getUserLibrary($USER) {
      $sql = "SELECT L.ISBN AS ISBN, B.NAME AS TITLE, B.GENRE AS GENRE, P.NAME AS PUBLISHER, P.ID_PUBLISHER AS ID_PUBLISHER  \n"
      . "FROM LIBRARY L, BOOKS B, PUBLISHERS P \n"
      . "WHERE L.ISBN = B.ISBN AND B.ID_PUBLISHER = P.ID_PUBLISHER AND L.NICK = '".$USER."'\n"
      . "ORDER BY TITLE ASC";
      $result = self::execQuery ($sql);
      $library = null;
      if(isset($result)){
        $library = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $library;
    }//end function getUserLibrary($USER)

    //Function to get the books more addedd to the libraries
    public static function getPopularBooks() {
      $sql = "SELECT COUNT(L.ISBN) AS TOTAL, L.ISBN AS ISBN, B.NAME AS TITLE\n"
      . "FROM LIBRARY L, BOOKS B\n"
      . "WHERE L.ISBN = B.ISBN\n"
      . "GROUP BY ISBN\n"
      . "ORDER BY ADD_DATE ASC \n";
      $result = self::execQuery ($sql);
      $books = null;
      if(isset($result)){
        $books = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $books;    
    }//end function getPopularBooks() 

    //Function to get all the authors in the DB
    public static function getAuthors() {
      $sql = "SELECT ID_AUTHOR, NAME FROM `AUTHOR` ORDER BY ID_AUTHOR ASC";
      $result = self::execQuery ($sql);
      $authors = null;
      if(isset($result)){
        $authors = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $authors;    
    }//end function getAuthors()

    //Function to get all the publishers in the DB
    public static function getPublishers() {
      //Using lower to later compare with the user input
      $sql = "SELECT ID_PUBLISHER, LOWER(NAME) AS NAME, LOWER(EMAIL) AS EMAIL, ADDRESS, PHONE FROM `PUBLISHERS` ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $publishers = null;
      if(isset($result)){
        $publishers = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $publishers;
    }//end function getPublishers()

    //Function to find all the publishers by name
    public static function getPublishersByName($name) {
      $sql = "SELECT ID_PUBLISHER, NAME, EMAIL, PHONE FROM `PUBLISHERS` WHERE NAME LIKE '%".$name."%' ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $publishers = null;
      if(isset($result)){
        $publishers = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $publishers;
    }//end function getPublishersByName($name)

    //Function to find all the books by name
    public static function getBooks($title) {
      $sql = "SELECT NAME, ISBN FROM `BOOKS` WHERE NAME LIKE '%".$title."%' ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $books = null;
      if(isset($result)){
        $books = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $books;
    }//end function getBooks($title)

    //Function to find all the authors by name
    public static function getAuthorsByName($name) {
      $sql = "SELECT ID_AUTHOR, NAME FROM `AUTHOR` WHERE NAME LIKE '%".$name."%' ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $authors = null;
      if(isset($result)){
        $authors = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $authors;
    }//end function getAuthorsByName($name) 

    //Function to get a publisher by the ID
    public static function getPublisherById($id) {
      $sql = "SELECT ID_PUBLISHER, NAME, EMAIL, PHONE, ADDRESS FROM `PUBLISHERS` WHERE ID_PUBLISHER = ".$id."";
      $result = self::execQuery ($sql);
      $row = null;
      //Due to the filter is the primary key, we only have one result. We use fetch
      if(isset($result)){
        $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }//end function getPublisherById($id)

    //Function to get an author by the ID
    public static function getAuthorsById($id) {
      $sql = "SELECT * FROM `AUTHOR` WHERE ID_AUTHOR = ".$id."";
      $result = self::execQuery ($sql);
      $row = null;
      //Due to the filter is the primary key, we only have one result. We use fetch
      if(isset($result)){
        $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }//end function getAuthorsById($id) 

    //Function to check if a book is in a library
    public static function bookInLibrary($nick, $ISBN) {
      $sql = "SELECT COUNT(*) AS ONLIBRARY FROM `LIBRARY` WHERE NICK='".$nick."' AND ISBN='".$ISBN."'";
      $result = self::execQuery ($sql);
      $row = null;
      //Due to the filter is the primaries keys, we only have one result. We use fetch
      if(isset($result)){
        $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }//end function bookInLibrary($nick, $ISBN)

    //Fuction to validate the user in the login page
    public static function validateUser($user, $pass) {
      $sql = "SELECT PASS FROM `USERS` WHERE NICK LIKE '".$user."' ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $userLogin = false;
      $row = null;
      //Due to the filter is the primary key, we only have one result. We use fetch
      if(isset($result)){
        $row = $result->fetch(PDO::FETCH_ASSOC);
        //if is correct, we return the result as true
        if($row["PASS"] === md5($pass)){
          $userLogin = true;
        }
      }
    return $userLogin;
    }//end function validateUser($user, $pass)

    //Function to list all the users in the DB
    public static function listUsers() {
      $sql = "SELECT NICK, EMAIL, NAME, SUBNAME, USERTYPE, PASS FROM `USERS`";
      $result = self::execQuery ($sql);
      $users = false;
      if(isset($result)){
        $users = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $users;
    }// end function listUsers()

    //Function to count the users in the DB. Used to the first start of the page
    public static function numUsers(){
      $sql = "SELECT COUNT(*) AS NUMUSERS FROM `USERS`";
      $result = self::execQuery ($sql);
      $row = null;
      //Due to the filter is the primary key, we only have one result. We use fetch
      if(isset($result)){
        $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }//end function numUsers()

    //Function to check if the user is a admin
    public static function userIsAdmin($user) {
      $sql = "SELECT USERTYPE FROM `USERS` WHERE NICK = '".$user."'";
      $result = self::execQuery ($sql);
      $row = null;
      //Due to the filter is the primary key, we only have one result. We use fetch
      if(isset($result)){
        $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }//end function userIsAdmin($user)

    //Function to list all the authors
    public static function listAuthors() {
      $sql = "SELECT ID_AUTHOR, NAME, YEAROFBIRTH FROM `author` ORDER BY ID_AUTHOR DESC";
      $result = self::execQuery ($sql);
      $authors = false;
      if(isset($result)){
        $authors = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $authors;
    }//end function listAuthors() 

    //Function to insert a book in the DB
    public static function insertBook($ISBN, $publisher, $AUTHOR, $title, $genre, $plot) {
      $sql = "INSERT INTO `BOOKS` (`ISBN`, `ID_PUBLISHER`, `ID_AUTHOR`, `NAME`, `GENRE`, `PLOT`) VALUES ('".$ISBN."', '".$publisher."', '".$AUTHOR."', '".$title."', '".$genre."', '".$plot."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function insertBook($ISBN, $publisher, $AUTHOR, $title, $genre, $plot)

    //Function to insert a user in the DB
    public static function insertUser($nick, $name, $subname, $userType,  $pass, $email) {
      //Codification the password using MD5
      $pass = md5($pass);
      $sql = "INSERT INTO `USERS` (`NICK`, `NAME`, `SUBNAME`, `USERTYPE`, `PASS`, `EMAIL`) VALUES ('".$nick."', '".$name."', '".$subname."', '".$userType."', '".$pass."', '".$email."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function insertUser($nick, $name, $subname, $userType,  $pass, $email) 

    //Function to insert a author in the DB
    public static function insertAuthor($name, $bio, $year, $month, $day) {
      $sql = "INSERT INTO `AUTHOR` (`ID_AUTHOR`, `NAME`, `BIOGRAPHY`, `YEAROFBIRTH`) VALUES (NULL, '".$name."', '".$bio."', '".$year."-".$month."-".$day."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function insertAuthor($name, $bio, $year, $month, $day) 

    //Function to insert a publisher in the DB
    public static function insertPublisher($name, $address, $phone, $email) {
      $sql = "INSERT INTO `PUBLISHERS` (`ID_PUBLISHER`, `NAME`, `ADDRESS`, `PHONE`, `EMAIL`) VALUES (NULL, '".$name."', '".$address."', '".$phone."', '".$email."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function insertPublisher($name, $address, $phone, $email)

    //Function to insert a book in the library
    public static function insertLibrary($nick, $ISBN) {
      $sql = "INSERT INTO `LIBRARY` (`NICK`, `ISBN`) VALUES ('".$nick."', '".$ISBN."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function insertLibrary($nick, $ISBN) 

    //Function to update the users data
    public static function updateUser($nick, $name, $subname, $usertype, $email) {
      $sql = "UPDATE `USERS` SET `NAME` = '".$name."', `SUBNAME` = '".$subname."', `USERTYPE` = '".$usertype."', `EMAIL` = '".$email."'  WHERE `NICK` = '".$nick."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function updateUser($nick, $name, $subname, $usertype, $email)

    //Function to update the books data
    public static function updateBook($ISBN, $name, $genre) {
      $sql = "UPDATE `BOOKS` SET `NAME` = '".$name."', `GENRE` = '".$genre."' WHERE `ISBN` = '".$ISBN."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function updateBook($ISBN, $name, $genre)

    //Function to update the publishers data
    public static function updatePublisher($id, $name, $address, $phone, $email) {
      $sql = "UPDATE `PUBLISHERS` \n"
      ."SET `NAME` = '".$name."', `ADDRESS` = '".$address."', `PHONE` = '".$phone."', `EMAIL` = '".$email."' \n"
      ."WHERE `ID_PUBLISHER` = '".$id."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end updatePublisher($id, $name, $address, $phone, $email)

    //Function to update the authors data
    public static function updateAuthor($id, $name, $date) {
      $sql = "UPDATE `AUTHOR` \n"
      ."SET `NAME` = '".$name."', `YEAROFBIRTH` = '".$date."' \n"
      ."WHERE `ID_AUTHOR` = '".$id."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function updateAuthor($id, $name, $date)

    //Function to delete a book from a library
    public static function deleteBookFromLibrary($ISBN, $nick) {
      $sql = "DELETE FROM `LIBRARY` WHERE `library`.`NICK` = '".$nick."' AND `library`.`ISBN` = '".$ISBN."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function deleteBookFromLibrary($ISBN, $nick)

    //Function to delete a user
    public static function deleteUser($nick) {
      $sql = "DELETE FROM `USERS` WHERE `NICK` = '".$nick."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function deleteUser($nick) 

    //Function to delete a books
    public static function deleteBook($ISBN) {
      $sql = "DELETE FROM `BOOKS` WHERE `ISBN` = '".$ISBN."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function deleteBook($ISBN)

     //Function to delete a publisher
    public static function deletePublisher($id) {
      $sql = "DELETE FROM `PUBLISHERS` WHERE `ID_PUBLISHER` = '".$id."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function deletePublisher($id)

    //Function to delete an author
    public static function deleteAuthor($id) {
      $sql = "DELETE FROM `AUTHOR` WHERE `ID_AUTHOR` = '".$id."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }//end function deleteAuthor($id)
  }
?>
