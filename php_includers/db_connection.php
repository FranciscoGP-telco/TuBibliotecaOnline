<?php
  class DB {
    protected static function execQuery($sql) {
      $connection = new PDO("mysql:host=localhost;dbname=id7548059_tubibliotecaonline", "francisco", "gp4649c2");
      $result = null;
      try {
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($connection)) $result = $connection->query($sql);
      } catch (PDOException $error) {
        echo "Error de conexión a la base de datos: " . $error->getMessage();
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
      $row = null;
      if(isset($result)){
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
      }
    return $row;    
    }      
  }
?>
