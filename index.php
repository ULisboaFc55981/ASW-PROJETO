
<?php
define('BASE_DIR', realpath(__FILE__));
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$LocalDirectory = dirname(__FILE__);
if (!isset($_SESSION)) session_start();


include './functions/app.php';

include_once  './config/settings.php';
include  './functions/auth.php';
include './functions/dbconnections.php';
include './functions/crud.php';
$pageTittle = "Refood Fcul - ";

if(isset($_GET['page'])){
    
$content = changePage($_GET['page']);
$pageTittle .= $_GET['page'];
}else{
$content = 'content';
}
echo '<!DOCTYPE html>';
echo '<html lang="<?php echo $htmlLang ?>">';

include './header.php';

include    './nav.php';

include   './'.$content . '.php';

include  './footer.php';
 
?>