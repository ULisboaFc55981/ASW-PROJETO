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

  //Obter todos os distritos
  function getDistritos()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Distrito;";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
  }
  
  

  //Obter todos os distritos
  
  function getFreguesias()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Freguesia;";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
  }
  
  
    //Obter todos os Concelhos
  function getConcelhos()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Concelho;";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
  }
  
  

  
  function getAllUsers()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Utilizador";
    $result = mysqli_query($conn, $query);
  
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
  }
  
  
  function getAllVolunters()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Voluntarios";
    $result = mysqli_query($conn, $query);
  
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
  }
  
  
  function getAllInstitutions()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Instituicao";;
    $result = mysqli_query($conn, $query);
  
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
  }
  function existsVoluntarioID($id){
    $conn = getConnection();
    $query = "SELECT * FROM Voluntario WHERE id_U = '{$id}'"; 
    $result = mysqli_query($conn, $query);
    $exists = false;
  
    if (mysqli_num_rows($result) > 0) {
     $exists = true;
    } 
    mysqli_close($conn);
    return $exists;
  }

  

  function existsInstitutoID($id){
    $conn = getConnection();
    $query = "SELECT * FROM Instituicao WHERE id_U = '{$id}'"; 
    $result = mysqli_query($conn, $query);
    $exists = false;
  
    if (mysqli_num_rows($result) > 0) {
     $exists = true;
    } 
    mysqli_close($conn);
    return $exists;
    
  }
  
  
  function getVoluntario($id)
  {
    $conn = getConnection();
    $query = "SELECT * FROM Voluntario WHERE id_U = '{$id}'"; 
    $result = mysqli_query($conn, $query);
  
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
  }
  
  function getInstitution($id)
  {
    $conn = getConnection();
    $query = "SELECT * FROM Instituicao WHERE id_U = '{$id}'"; 
    $result = mysqli_query($conn, $query);
  
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
  }
  
  
  function getDonationByInstitute($id)
  {
    $conn = getConnection();
    $query = "SELECT * FROM Alimento WHERE inst_id = '{$id}'"; 
    $result = mysqli_query($conn, $query);
  
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "Não existe Instituição com id" . $id;
    }
    mysqli_close($conn);
    return $column;
  }
  
  
  
  //função que adiciona uma doação
  function addDonation($idInstitute,$name, $tipo, $quantidade ){ 
    $conn = getConnection();
    $query = "INSERT INTO Alimento( inst_id, id, tipo_doacao, quantidade) VALUES (" . $idInstitute . ", NULL ," .  $name . "," . $tipo . "," . $quantidade . ");"; 
    $result = mysqli_query($conn,$query);
  
    $sucess =false;
  
    if ($result) {
      echo "Um novo registo inserido com sucesso";
      mysqli_close($conn);
       $sucess = True;
    } else {
      echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
      mysqli_close($conn);
    
    } 
    mysqli_free_result($result);
    mysqli_close($conn); 
    return   $sucess ;
  } 
  
  
  
    function userExistsByEmail($email){
      $conn = getConnection();
      $query = "SELECT * FROM Utilizador WHERE email = \"{$email}\""; 
  
      $result = mysqli_query($conn,$query);
      $sucess =false; 
      if (mysqli_num_rows($result) > 0) {
        $sucess = True;
        }
  
        mysqli_free_result($result);
        mysqli_close($conn); 
        return   $sucess ;
    }
  
  
    function userExistsByName($name){
      $conn = getConnection();
      $query = "SELECT * FROM Utilizador WHERE email = '{$name}'";  
  
      $result = mysqli_query($conn,$query);
      $sucess =false;   
      if (mysqli_num_rows($result) > 0) {
        $sucess = True;
        }
  
        mysqli_free_result($result);
        mysqli_close($conn); 
        return   $sucess ;
    }
  
  
    function userExistsByCondC($conducao){
      $conn = getConnection();
      $query = "SELECT * FROM Voluntario WHERE carta_conducao = '{$conducao}'";
  
      $result = mysqli_query($conn,$query);
      $sucess =false;  
      if (mysqli_num_rows($result) > 0) {
        $sucess = True;
        }
        mysqli_free_result($result);
        mysqli_close($conn); 
        return   $sucess ;
  
  
  
    }
    ?>
      
