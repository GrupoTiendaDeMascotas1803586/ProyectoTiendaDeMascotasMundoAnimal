
<?php
//$RutaAbsoluta = "\GrupoTiendaDeMascotas1803586\views\index.php"; //https://www.php.net/manual/es/regexp.reference.escape.php
//$RutaRelativa = "../index.php";

//Carga las librerias importadas del composer
require(__DIR__ .'/../../vendor/autoload.php');
//__DIR__ => D:\laragon\www\GrupoTiendaDeMascotas1803586\views\partials
?>
<?php
$dotenv = Dotenv\Dotenv::create(__DIR__ ."../../../"); //Cargamos el archivo .env de la raiz del sitio
$dotenv->load(); //Carga las variables del archivo .env

$baseURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/".getenv('ROOT_FOLDER');
//https://localhost/GrupoTiendaDeMascotas1803586/
$adminlteURL = $baseURL."/vendor/almasaeed2010/adminlte";
//https://localhost/GrupoTiendaDeMascotas1803586/vendor/almasaeed2010/adminlte

<?php
require('../../../vendor/autoload.php');
?>
<?php
$dotenv = Dotenv\Dotenv::create("../../../");
$dotenv->load();

$baseURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/".getenv('ROOT_FOLDER');
//https://localhost/ProyectoTiendaDeMascotasMundoAnimal/
$adminlteURL = $baseURL."/vendor/almasaeed2010/adminlte";
//https://localhost/ProyectoTiendaDeMascotasMundoAnimal/vendor/almasaeed2010/adminlte
?>