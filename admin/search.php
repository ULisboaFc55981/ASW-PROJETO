
<?php 
$data= array();
//if(!isLoggedIn()){ 
  //  header( "Location: /asw/admin/index.php?page=login" );
//}
if(isset($POST['search'])){ 
  
  
    if($POST['search']==='all'){
    
    $data = getAllUsers();

    }

}else{

    header( "Location: /asw/admin/index.php");
}

print_r($data);
?>






<article class="row mt-5">
    <div class="col ml-5">
        
    <h1>Procura</h1>
    <table class="table table-striped table-hover">
      <!--- 
        ?>-->
    <tr>
          <td class="table-light">...</td>
    </tr>
    </table>
    </div>
    </article>
</body>






    
