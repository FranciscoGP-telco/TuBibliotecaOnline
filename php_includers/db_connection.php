<?php
  class DB {
    protected static function execQuery($sql) {
      $connection = new PDO("mysql:host=localhost;dbname=id7548059_tubibliotecaonline;charset=utf8", "francisco", "gp4649c2");
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
      . "FROM books B, author A, publishers P \n"
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
      $books = null;
      if(isset($result)){
        $books = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $books;    
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
      $sql = "SELECT ID_AUTHOR, NAME FROM `author` ORDER BY ID_AUTHOR ASC";
      $result = self::execQuery ($sql);
      $authors = null;
      if(isset($result)){
        $authors = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $authors;    
    }

    public static function getPublishers() {
      $sql = "SELECT ID_PUBLISHER, NAME FROM `publishers` ORDER BY NAME ASC";
      $result = self::execQuery ($sql);
      $publishers = null;
      if(isset($result)){
        $publishers = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $publishers;
    }

    public static function validateUser($user, $pass) {
      $sql = "SELECT PASS FROM `users` WHERE NICK LIKE '".$user."' ORDER BY NAME ASC";
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

    public static function insertBook($ISBN, $publisher, $author, $title, $genre, $plot) {
      $sql = "INSERT INTO `books` (`ISBN`, `ID_PUBLISHER`, `ID_AUTHOR`, `NAME`, `GENRE`, `PLOT`) VALUES ('".$ISBN."', '".$publisher."', '".$author."', '".$title."', '".$genre."', '".$plot."')";
      $executed = false;
      $result = self::execQuery ($sql);
      if(isset($result)){
        $executed = true;
      }
      return $executed;
    }
  }
?>
