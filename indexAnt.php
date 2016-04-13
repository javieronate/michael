<?php
/**
 *
 * Reporteador Becalos
 *
 * PHP Version 5.6.10
 *
 * @copyright 2015 Javier Oñate / Dédalo (http://www.dedalo.com.mx)
 *
 * Inicio de módulo de reportes
 *
 * @var mysqli
 *
 * @author  Javier Oñate Mendía (Dédalo)
 */

//function __autoload($class_name)
//{
//    require_once “./clases/”.$class_name.“.php”;
//}

$directorioRaiz=__DIR__;
include_once "clases/ControladorReporteador.php";
//include_once ("clases/ModeloReporteador.php");
//include_once ("clases/FxFormularios.php");
include_once "includes/conf.php";

session_start();

$db = new mysqli(SERVIDOR, USUARIO, CLAVE, BASE, PUERTO_MYSQL);
if (isset($_POST)) {
	if (isset($_POST['accion']) && $_POST['accion']=='salir' ) {
		session_unset();
		session_destroy();
		$_SESSION = array();
	}
}

if (!isset($_SESSION['controlador'])) {
	$_SESSION['controlador']= new ControladorReporteador();
	$_SESSION['controlador']->ponerConexionMysql($db);
	$_SESSION['controlador']->llenarCatalogosModelo();
}else{
	$_SESSION['controlador']->ponerConexionMysql($db);
	//$_SESSION['controlador']->llenarCatalogosModelo();
}
if (isset($_POST['accion']))  $_SESSION["controlador"]->evaluarPost($_POST);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Formularios</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="includes/estilos.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery.js" ></script>
    </head>

    <body link='White' vlink='White' alink='White' bgcolor='#FFFFFF'>
        <form action="index.php" method="post" name="<?php echo (NOMBRE_FORMULARIO);?>" target="_self" enctype="multipart/form-data">
            <input type="hidden" name="accion" value="">
            <input type="hidden" name="subaccion" value="">
            <input type="hidden" name="registroActivo" value="">
            <input type="hidden" name="item" value="">
            <input type="hidden" name="subItem" value="">
            <input type="hidden" name="permisos" value="">
    		<?php $_SESSION["controlador"]->mostrarPantalla();?>
		</form>
	</body>
</html>
