<?php

define('DB_SERVIDOR','localhost');
define('DB_NOME', 'asw09');
define('DB_USUARIO', 'asw09');
define('DB_PASSWORD','aswgrupo09');

//funções relacionadas com 

function getConnection(){

    $conn = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_PASSWORD, DB_NOME);
    mysqli_set_charset($conn,"utf8");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      return $conn;
    
  }

  function getQuery($query){
    $conn = getConnection();
    $result = mysqli_query($conn, $query);
    $data = array();
    if(mysqli_num_rows($result) > 0){
      $data = array();
      
      foreach ($result as $key => $value) {
        $data[$key] = $value;
      }
      
      mysqli_free_result($result);
     
    }
     mysqli_close($conn);

    return $data;
  }
  function getOneResultQuery($query){
    $conn = getConnection();
    $result = mysqli_query($conn, $query);
    $data = array();
    if(mysqli_num_rows($result) ==1 ){
      $data = array();
      
      $data = mysql_fetch_assoc($result);
      mysqli_free_result($result);
     

  

    } 
    
    mysqli_close($conn);
    return $data;
  }
  
  function existsQuery($query){
    $conn = getConnection();
    $result = mysqli_query($conn, $query);
    $bool = true;
    if(mysqli_num_rows($result) > 0){
      $bool = true;
      
    }else{
      $bool = false;
    }
    return $bool;
    mysqli_close($conn);
  }

  function setQuery($query)
  {
    $conn = getConnection();

    mysqli_query($conn,$query);

    $rows= mysqli_affected_rows($conn);

    if ($rows > 0) {
     $result = true;
    } else {
      echo "Error updating record: " . mysqli_error($conn);
      $result = false;
    }

    mysqli_close($conn);
    return $result;
  }
