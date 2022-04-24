<?php

use phpDocumentor\Reflection\PseudoTypes\False_;

if(!isLoggedIn() || !isLoggedInVoluntario()){ 
    header('Location: index.php');
    exit();
    }

$erros = array();
$missing = array();
$data = array();
$utilizador = array();

    if(isset($_SESSION['id'])){

        $data = getVoluntario($_SESSION['id']);
        print_r($data);
    }

//Caso tenha sido feito um pedido Post
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // e caso a variavel submit esteja assignada
    if(array_key_exists('submit',$_POST)){

    if(empty($_POST['dias'])){
    array_push($missing, 'dias');    
    
    }else{
        $utilizador['dias'] = htmlspecialchars($_POST['dias']);
        $utilizador['dias'] = stripcslashes($utilizador['dias']);
    }   
   
    if(empty($_POST['hora_inicial'])){
        array_push($missing ,"hora_inicial");
    } else{
        $utilizador['hora_inicial'] = htmlspecialchars($_POST['hora_inicial']);
        $utilizador['hora_inicial'] = stripcslashes($utilizador['hora_inicial']);  
    }
    
     // e caso a variavel Cconducao não esteja assignada
      if(empty($_POST['hora_final'])){
        array_push($missing ,"hora_final");
    }else{
        $voluntario['hora_final'] = htmlspecialchars($_POST['hora_final']);
        $voluntario['hora_final']  = stripcslashes(  $voluntario['hora_final'] );
       
    }
    }

    // se não houver erros ou valores vazios
    if(empty($missing) && empty($erros)){
        $utilizador['codigo_distrito'] = htmlspecialchars($_POST['codigo_distrito']);
        $utilizador['codigo_concelho'] = htmlspecialchars($_POST['codigo_distrito']);
        $utilizador['codigo_freguesia'] = htmlspecialchars($_POST['codigo_freguesia']);
        $utilizador['codigo_distrito'] = strip_tags($utilizador['codigo_distrito']);
        $utilizador['codigo_concelho'] = strip_tags($utilizador['codigo_concelho']);
        $utilizador['codigo_freguesia'] = strip_tags($utilizador['codigo_freguesia']);
    //para cada valor do pos tratar e adicionar a uma array associativa
    $result = updateValuesUtilizador($utilizador,$_SESSION['id']);
    $result2 = updateValuesVoluntario($voluntario,$_SESSION['id']);
        if($result && $result2){
            //caso o resultado seja positivo ir para o index
            session_start();
        
             header('Location: index.php');
                 die();

          }else{
              //caso contrario adicionar a array erros
          $erros['submit'] = TRUE;

        }
    }
    // fazer chamada a função para registar
    }
?>

<article class="form-group container">
    <br>

    <!--  verificar se existem erros ou dados em falta -->
    <?php if (count($erros) >0  || count($missing) >0){ echo "
<p class=\"alerta\">Registro Invalido, por favor corrija os dados</p>";}
if(isset($erros['pass'])) echo "<p class=\"alerta\">". $erros['pass'] ."</p>";  // secalhar no futuro metemos um foreach dos erros
 ?>

    <div class=" justify-content-center">
        <form action="" method="POST" id="registro">

            <!--  verificar se esta em falta o nome -->
            <h3>Disponibilidade</h3>
            <div class=" row">
                <div class="col">
                    <div>
                        <label for="dias">Dia</label>
                    </div>
                    <select width=300 style="width: 450px" size="7" multiple>
                        <option value="1">Segunda-feira</option>
                        <option value="2">Terça-feira</option>
                        <option value="3">Quarta-feira</option>
                        <option value="4">Quinta-feira</option>
                        <option value="5">Sexta-feira</option>
                        <option value="6">Sábado</option>
                        <option value="7">Domingo</option>
                    </select>
                </div>
                <div class="col">
                    <label for="hora_inicial">Hora inicial
                        <?php if (in_array('hora_inicial', $missing)) 
                        echo " hora_inicial em falta";?>
                    </label>
                    <input type="time" class="form-control  <?php if (in_array('hora_inicial', $missing)) 
                        echo " isIis-invalid";?>" id="hora_inicial" name="hora_inicial"
                        value="<?php echo $data[0]['hora_inicial'] ?>">

                    <label for="hora_final">Hora final:
                        <?php if (in_array('hora_final', $missing)) 
                        echo " hora_final em falta";?>
                    </label>
                    <input type="time" class="form-control  <?php if (in_array('hora_final', $missing)) 
                        echo " isIis-invalid";?>" id="hora_final" name="hora_final"
                        value="<?php echo $data[0]['hora_final'] ?>">
                </div>
            </div>
            <h3 style="margin-top: 10px">Área Geográfica</h3>
            <div class="row">

                <div class="col">
                    <label for="dist" class="">
                        Distrito
                    </label>
                    <select name="codigo_distrito" class="form-control" id="dist">
                        <?php

                    $distritos = getDistritos();
                    if($distritos > 0 ){
                        foreach($distritos as $key => $valor ){
                        $option =  "<option ";
                            if($valor == $data[0]['codig_distrito']){
                                $option .= " selected='selected' ";
                            }
                        echo  $option ." value=" . $valor['cod_distrito'] . ">". $valor['nome']   . "</option>" ; 
                        }
                    }
                    ?>
                    </select>

                </div>
                <div class="col">

                    <label for="conc" class="">
                        Concelho
                    </label>
                    <select name="codigo_concelho" class="form-control" id="conc">
                        <?php

                    $concelho = getConcelhos();
                    if($concelho > 0 ){
                    foreach($concelho as $valor ){
                        $option =  "<option ";
                        if($valor == $data[0]['codigo_concelho']){
                            $option .= " selected='selected' ";
                        }
                    echo  $option ." value=" . $valor['codigo_concelho'] . ">". $valor['nome']   . "</option>" ; 
                    

                    }
                }

                ?>
                    </select>
                </div>
                <div class="col">


                    <label for="freg" class="">
                        Freguesia
                    </label>
                    <select name="codigo_freguesia" class="form-control" id="freg">
                        <?php

                        $freguesias = getFreguesias();
                        if($freguesias > 0 ){
                            foreach($freguesias as $freg ){
                                $option =  "<option ";
                                if($freg == $data[0]['codigo_freguesia']){
                                    $option .= " selected='selected' ";
                                }
                            echo  $option ." value=" . $freg['cod_freguesia'] . ">". $freg['nome']   . "</option>" ; 
                            }
        


                        }


                        ?>
                    </select>


                </div>
            </div>


            <div style="margin-top: 20px" class="row justify-content-center">

                <button type="submit" class="btn btn-primary btn-lg" form="registro" name="submit"
                    value="submit">Registar</button>


            </div>
    </div>
    </form>



    </div>



</article>