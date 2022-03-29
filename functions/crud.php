<?php

  //Obter todos os distritos
  function getDistritos() {
    $query = "SELECT * FROM Distrito;";
    $result = array();
   $result = getQuery($query);
    return $result;
  }
  
  

  //Obter todos os distritos
  
  function getFreguesias()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Freguesia;";
    $result = array();
    $result = getQuery($query);
     return $result;
  }
  
  
    //Obter todos os Concelhos
  function getConcelhos()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Concelho;";
    $result = array();
    $result = getQuery($query);
     return $result;
  }
  
    
  function getAllUsers()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Utilizador";
    $result = array();
    $result = getQuery($query);
     return $result;
  }
  
  
  function getAllVolunters()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Voluntarios";
    $result = array();
    $result = getQuery($query);
     return $result;
  }
  
  
  function getAllInstitutions()
  {
    $conn = getConnection();
    $query = "SELECT * FROM Instituicao";;
    $result = array();
    $result = getQuery($query);
     return $result;
  }
  function existsVoluntarioID($id){
    $conn = getConnection();
    $query = "SELECT * FROM Voluntario WHERE id_U = '{$id}'"; 
    $exists = existsQuery($query);
    return $exists;
  }

  

  function existsInstitutoID($id){
    $conn = getConnection();
    $query = "SELECT * FROM Instituicao WHERE id_U = '{$id}'"; 
    $exists = existsQuery($query);
    return $exists;
    
  }
  
  
  function getVoluntario($id)
  {
    $conn = getConnection();
    $query = "SELECT * FROM Utilizador,Voluntario  WHERE id = '{$id}' AND id_u ='{$id}'"; 
    $result = array();
    $result = getQuery($query);
     return $result;
  }
  
  function getInstitution($id)
  {
    $conn = getConnection();
    $query = "SELECT * FROM Utilizador,Instituicao  WHERE id = '{$id}' AND id_u ='{$id}'"; 
    $result = array();
    $result = getQuery($query);
     return $result;
  }

  
  function getDonationByInstitute($id)
  {
    $conn = getConnection();
    $query = "SELECT * FROM Alimento WHERE inst_id = '{$id}'"; 
    $result = array();
    $result = getQuery($query);
     return $result;
  }
  
  
  
  //função que adiciona uma doação
  function addDonation($idInstitute,$name, $tipo, $quantidade ){ 
    $conn = getConnection();
    $query = "INSERT INTO Alimento( inst_id, id, tipo_doacao, quantidade) VALUES (" . $idInstitute . ", NULL ," .  $name . "," . $tipo . "," . $quantidade . ");"; 
    $result = array();
    $result = setQuery($query);
     return $result;
  } 
  
  
  
    function userExistsByEmail($email){
      $conn = getConnection();
      $query = "SELECT * FROM Utilizador WHERE email = \"{$email}\""; 

      $exists = existsQuery($query);
      return $exists;
    }
  
  
    function userExistsByName($name){
      $conn = getConnection();
      $query = "SELECT * FROM Utilizador WHERE email = '{$name}'";  
      $exists = existsQuery($query);
      return $exists;
    }
  
  
    function userExistsByCondC($conducao){
      $conn = getConnection();
      $query = "SELECT * FROM Voluntario WHERE carta_conducao = '{$conducao}'";
      $exists = existsQuery($query);
      return $exists;
    }

    function updateValuesVoluntario($values, $id){
      $conn = getConnection();
      $query = "UPDATE Voluntario SET " ;

    foreach($values as $key=>$value){
        $query .= $key . "=" . $value;
    }

    $query .= "WHERE id_U = {$id}"; 

    $result =setQuery($query);
    return $result;
    }
function updateValuesUtilizador($values, $id){
      $conn = getConnection();
      $query = "UPDATE Instituto SET " ;
    
      foreach($values as $key=>$value){
    
        $query .= $key . "=" . $value;
    
    
      }

      $query .= "WHERE id = {$id}"; 
      $result =setQuery($query);
      return $result;
    
    }


function updateValuesInstituto($values, $id){
  $conn = getConnection();
  $query = "UPDATE Instituto SET " ;

  foreach($values as $key=>$value){
    $query .= $key . "=" . $value;
  }

  $query .= "WHERE id_U = {$id}"; 

  $result =setQuery($query);
  return $result;

}

    ?>
      