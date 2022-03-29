<?php
define('THIS_FOLDER', realpath(__FILE__));
include './'.THIS_FOLDER.'/functions/auth.php';
include './'.THIS_FOLDER.'/functions/database.php';

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

function registertest(){
  $conn = getConnection();
  $query = "INSERT INTO Utilizador (email, tipo, telefone, pass, nome, codigo_distrito, codigo_concelho, codigo_freguesia) ";
  $query .= "VALUES ( \"teste@hotmail\" , \"Voluntario\" , 93929392 , \"teste\" , \"filipe\" , 1000, 01, 2122);";

  $result = mysqli_query($conn, $query);

  $sucess =false;
  if ($result ) {
    echo "Um novo registo inserido com sucesso";
    mysqli_close($conn);
    $sucess = True;
  } else {
    echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);

  }  
   mysqli_free_result($result);
   mysqli_close($conn);
   return   $sucess ;



}
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

     
    //  $query = "INSERT INTO Utilizador (email, tipo, telefone, pass, nome, codigo_distrito, codigo_concelho, codigo_freguesia) ";
    //  $query .= "VALUES ( \"teste@hotmail\" , \"Voluntario\" , 93929392 , \"teste\" , \"filipe\" , 1000, 01, 2122);";
    
    registertest();
      
      //$query2 = "INSERT INTO Voluntario (cc, carta_conducao, genero, dob, imgPath) VALUES ( " . $dados['cc'] . "," . $dados['Cconducao'] . "," . $dados['gen'] . "," . $dados['dob'] . "," . "/path/test". ");";
    
   
    
   
      //CREATE TABLE IF NOT EXISTS `Utilizador` (
       // `id` int(3) NOT NULL AUTO INCREMENT,
     //   `email` varchar(20) DEFAULT NULL,
     //   `tipo` char(1) NOT NULL,
     //   `telefone` decimal(9,0) DEFAULT NULL,
     //   `pass` varchar(15) NOT NULL,
     //   `nome` char(20) NOT NULL,
     //   `codigo_distrito` decimal(3,0) NOT NULL,
      //  `codigo_concelho` decimal(3,0) NOT NULL,
       // `codigo_freguesia` decimal(3,0) NOT NULL,
      //  `rating` int(1) DEFAULT NULL
     // ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
      

//CREATE TABLE IF NOT EXISTS `Voluntario` (
//  `id_U` int(3) NOT NULL,
//  `cc` varchar(15) DEFAULT NULL,
//  `carta_conducao` varchar(15) DEFAULT NULL,
//  `genero` char(1) DEFAULT NULL,
//  `dob` date DEFAULT NULL,
//  `imgPath` varchar(50) DEFAULT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=latin1;

$teste =getInstitution(52);

print_r($teste);

?>