<?php
include 'functions/dbconnections.php';

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
$searchErr = '';
$result='';
if(isset($_POST['save'])){
   
        $search = $_POST['pesquisa'];
        $conn = getConnection();
        $queryUser = ("select * from Utilizador where nome like '{$search}' or id like {$search}");
        $result = mysqli_query($conn,  $queryUser);
        $data = array();
        if(mysqli_num_rows($result) > 0){
            $data = array();
            
                foreach ($result as $key => $value) {
                $data[$key] = $value;
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        echo "Erro: search failed" . $queryUser . "<br>" . mysqli_error($conn);
        $searchErr = "Porfavor digite um dado";
        return $data;   
} 
?>
 
<body>
    <div class="container">
    <h3>Pesquisa de base de dados</h3>
    <br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email"><b>Search Employee Information:</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="search here">
            </div>
            <div class="col-sm-2">
              <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
        <div class="form-group">
            <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
    <br/><br/>
    <h3><u>Search Result</u></h3><br/>
    <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Employee Name</th>
            <th>Phone No</th>
            <th>Age</th>
            <th>Department</th>
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$data)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($data as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['email'];?></td>
                        <td><?php echo $value['tipo'];?></td>
                        <td><?php echo $value['telefone'];?></td>
                        <td><?php echo $value['pass'];?></td>
                        <td><?php echo $value['nome'];?></td>
                        <td><?php echo $value['codigo_distrito'];?></td>
                        <td><?php echo $value['codigo_concelho'];?></td>
                        <td><?php echo $value['codigo_freguesia'];?></td> 
                        <td><?php echo $value['rating'];?></td> 

                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
