<?php
  class DB {
    protected static function execQuery($sql) {
      $connection = new PDO("mysql:host=localhost;dbname=id7548059_tubibliotecaonline;charset=utf8", "id7548059_francisco", "gp4649c2");
      $result = null;
      try {
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($connection)) $result = $connection->query($sql);
      } catch (PDOException $error) {
        echo $error->getMessage();
      }
      $connection = null; 
      return $result;
    }
    
    public static function getBook($ISBN) {
      $sql = "SELECT B.ISBN, B.NAME AS TITLE, B.GENRE, B.PLOT, A.NAME AS AUTHOR, P.NAME AS PUBLISHER\n"
      . "FROM BOOKS B, AUTHOR A, PUBLISHERS P \n"
      . "WHERE B.ID_PUBLISHER = P.ID_PUBLISHER AND A.ID_AUTHOR = B.ID_AUTHOR AND ISBN='".$ISBN."'";
      $result = self::execQuery ($sql);
      $row = null;
      if(isset($result)){
      $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }

    public static function getRecientBooks($USER) {
      $sql = "SELECT B.ISBN AS ISBN, B.NAME AS TITLE, A.NAME AS AUTHOR, L.ADD_DATE AS ADD_DATE\n"
      . "FROM USERS U, BOOKS B, LIBRARY L, AUTHOR A\n"
      . "WHERE U.NICK = L.NICK AND L.ISBN = B.ISBN AND B.ID_AUTHOR = A.ID_AUTHOR AND U.NICK = '".$USER."'\n"
      . "ORDER BY ADD_DATE ASC \n"
      . "LIMIT 4 ";
      $result = self::execQuery ($sql);
      $BOOKS = null;
      if(isset($result)){
        $BOOKS = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $BOOKS;
    }

    public static function getUserLibrary($USER) {
      $sql = "SELECT L.ISBN AS ISBN, B.NAME AS TITLE, B.GENRE AS GENRE, P.NAME AS PUBLISHER  \n"
      . "FROM LIBRARY L, BOOKS B, PUBLISHERS P \n"
      . "WHERE L.ISBN = B.ISBN AND B.ID_PUBLISHER = P.ID_PUBLISHER AND L.NICK = '".$USER."'\n"
      . "ORDER BY TITLE ASC";
      $result = self::execQuery ($sql);
      $library = null;
      if(isset($result)){
        $library = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $library;
    }

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
    }

    public static function getAuthors() {
      $sql = "SELECT ID_AUTHOR, NAME FROM `AUTHOR` ORDER BY ID_AUTHOR ASC";
      $result = self::execQuery ($sql);
      $authors = null;
      if(isset($result)){
        $authors = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $authors;    
    }

    public static function getPublishers() {
      $sql = "SELECT ID_PUBLISHER, NAME FROM `PUBLISHERS` ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $publishers = null;
      if(isset($result)){
        $publishers = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $publishers;
    }

    public static function getBooks($title) {
      $sql = "SELECT NAME, ISBN FROM `BOOKS` WHERE NAME LIKE '%".$title."%' ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $books = null;
      if(isset($result)){
        $books = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $books;
    }

    public static function getAuthorsByName($name) {
      $sql = "SELECT ID_AUTHOR, NAME FROM `AUTHOR` WHERE NAME LIKE '%".$name."%' ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $authors = null;
      if(isset($result)){
        $authors = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $authors;
    }

    public static function getAuthorsById($id) {
      $sql = "SELECT * FROM `AUTHOR` WHERE ID_AUTHOR = ".$id."";
      $result = self::execQuery ($sql);
      $row = null;
      if(isset($result)){
      $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }

    public static function bookInLibrary($nick, $ISBN) {
      $sql = "SELECT COUNT(*) AS ONLIBRARY FROM `library` WHERE NICK='".$nick."' AND ISBN='".$ISBN."'";
      $result = self::execQuery ($sql);
      $row = null;
      if(isset($result)){
        $row = $result->fetch(PDO::FETCH_ASSOC);
      }
    return $row;
    }

    public static function validateUser($user, $pass) {
      $sql = "SELECT PASS FROM `USERS` WHERE NICK LIKE '".$user."' ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $userLogin = false;
      $row = null;
      if(isset($result)){
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row["PASS"] === md5($pass)){
          $userLogin = true;
        }
      }
    return $userLogin;
    }

    public static function listUsers() {
      $sql = "SELECT NICK, EMAIL FROM `USERS`";
      $result = self::execQuery ($sql);
      $users = false;
      if(isset($result)){
        $users = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $users;
    }

    public static function listAuthors() {
      $sql = "SELECT ID_AUTHOR, NAME FROM `author` ORDER BY ID_AUTHOR DESC";
      $result = self::execQuery ($sql);
      $authors = false;
      if(isset($result)){
        $authors = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $authors;
    }

    public static function insertBook($ISBN, $publisher, $AUTHOR, $title, $genre, $plot) {
      $sql = "INSERT INTO `BOOKS` (`ISBN`, `ID_PUBLISHER`, `ID_AUTHOR`, `NAME`, `GENRE`, `PLOT`) VALUES ('".$ISBN."', '".$publisher."', '".$AUTHOR."', '".$title."', '".$genre."', '".$plot."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }

    public static function insertUser($nick, $name, $subname, $pass, $email) {
      $pass = md5($pass);
      $sql = "INSERT INTO `USERS` (`NICK`, `NAME`, `SUBNAME`, `USERTYPE`, `PASS`, `EMAIL`) VALUES ('".$nick."', '".$name."', '".$subname."', 'USUARIO', '".$pass."', '".$email."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }

    public static function insertAuthor($name, $bio, $year, $month, $day) {
      $sql = "INSERT INTO `AUTHOR` (`ID_AUTHOR`, `NAME`, `BIOGRAPHY`, `YEAROFBIRTH`) VALUES (NULL, '".$name."', '".$bio."', '".$year."-".$month."-".$day."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }

    public static function insertLibrary($nick, $ISBN) {
      $sql = "INSERT INTO `LIBRARY` (`NICK`, `ISBN`) VALUES ('".$nick."', '".$ISBN."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }
    public static function deleteBookFromLibrary($ISBN, $nick) {
      $sql = "DELETE FROM `LIBRARY` WHERE `library`.`NICK` = '".$nick."' AND `library`.`ISBN` = '".$ISBN."'";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }

  }
?>
