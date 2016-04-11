<?php
/**
 *
 * Reporteador Becalos
 *
 * PHP Version 5.6.10
 *
 * @copyright 2015 Javier Oñate / Dédalo (http://www.dedalo.com.mx)
 *
 */

/**
 *
 * Includes de las clases requeridas por el controller
 *
 */
include_once ("Modelo.php");
include_once ("Compania.php");
include_once ("FxFormularios.php");

/**
 *
 * Controlador del módulo de Reportes
 *
 * Clase controller del modelo MVC (Model - Vew - Controller)
 *
 * @package Reporteador
 * @author  Javier Oñate Mendía (Dédalo)
 *
 */
class Controlador
{
	/**
	 * Almacena objeto de tipo ModeloReporteador
	 */
    var $modelo;


 	/**
	 * Almacena objeto de tipo fx, que es un helper para elementos de formularios
	 */
    var $fx;

	/**
	 * Almacena variable que indica que pantallas acceder según el usuario logueado
	 */
	var $zona = 'login';
	var $pantalla = '';



	/**
	 * Almacena el id del reporte seleccionado por el usuario
	 */
    var $reporteSeleccionado;

	/**
	 * Almacena el índice del arreglo modelo->arrFiltros activo por la seleccion del usuario
	 */
	var $itemFiltroSeleccionado;

	/**
	 * Almacena el arreglo con los valores disponibles de acuerdo al item del arreglo de filtros
     * este arreglo puebla el menu desplegable de datos en la seccion de filtros
	 */
	//var $arrOpcionesFiltroSeleccionado=array();

	/**
	 * Bandera que indica si se despliega el campo de opción multiple con datos de filtrado o no
	 */
	var $ensenarComboFiltro=0;

	/**
	 *
	 * Constructor del Controller que:
	 *  Inicializa un modelo en la variable "modelo" dentro del controlador
	 *  Pone una conexión a la base de datos en el modelo
	 *  Inicializa la variable fx que es un helper de elementos de formulario
	 *
	 */
	function __construct()
    {
        $this->modelo = new Modelo();
        $this->fx=new FxFormularios();
    }

	/**
	 *  destructor de la clase
	 *  por ahora no se usa
	 */
	function __destruct()
    {

    }

	/**
	 *
	 *  función que recibe valores del post y evalúa las acciones a llevar a cabo
	 *
	 * @param $post
	 *
	 */
	function evaluarPost($post)
    {
        switch ($post['accion']){

	        case 'login':
		        $this->modelo->validarLogin($post['usuario'],$post['clave']);
				if(isset($this->modelo->arrUsuarioLogueado['id'])){
					$this->zona=$this->modelo->arrUsuarioLogueado['rol'];
					$this->pantalla = "pantallas/".$this->zona."/inicio.php";
				}
				break;

	        case 'compania':
		        $this->postCompania($post);
		        break;
        }
    }

	function postCompania($post)
	{
		switch ($post['subaccion']){
			case 'idrADescripcionPractica':
//				echo ($post['item']);
				$this->modelo->arrPracticaDescripcion = $this->modelo->buscarDescripcionPractica($post['item']);
				$this->pantalla = "pantallas/".$this->zona."/descripcionPractica.php";
				break;
		}
	}






	/**
	 *
	 * Recibe el objeto $db del tipo mysqli
     * generado en el index cada vez que se recibe un submit y lo envía al modelo
	 *
	 * @param $db
	 */
	function ponerConexionMysql($db)
	{
		$this->modelo->ponerConexion($db);
	}

	/**
	 *
	 *  Llama al archivo encargado de construir la pantalla para el usuario (sección View en le MVC)
	 *
	 */
	function mostrarPantalla()
    {
	    switch ($this->zona){
		    case 'login';
			    include 'pantallas/inicio.php';
			    break;
		    case 'admin':
			    include 'pantallas/admin/inicio.php';
			    break;
		    case 'enlace':
			    include 'pantallas/enlace/inicio.php';
			    break;
		    case 'compania':
			    //include 'pantallas/compania/inicio.php';
			    include $this->pantalla;

			    break;


	    }
//        include 'pantallas/inicio.php';
    }

	/**
	 *
     * Instruye al modelo que construya los arreglos de catalogos
     *
	 */
    function llenarCatalogosModelo()
	{
		$this->modelo->hacerArreglosBase();
	}

}

