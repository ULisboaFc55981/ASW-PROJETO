
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$LocalDirectory = dirname(__FILE__);

include_once './config/init.php';
include_once './config/db.php';
include_once './config/settings.php';
include_once './function.php';
if(isset($_GET['page'])){
$content = changePage($_GET['page']);
}else{
$content = 'content';
}
echo '<!DOCTYPE html>';
echo '<html lang="<?php echo $htmlLang ?>">';

include './header.php';

include './nav.php';

include $content . '.php';

include './footer.php';

?>