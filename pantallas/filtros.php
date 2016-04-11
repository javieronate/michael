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


echo "<table border='0'>";
    echo "<tr>";
        echo "<td colspan='4'>";
            echo "<strong>&nbsp;FILTROS: </strong>";
        echo "</td>";
//        echo "<td colspan='1' class=''>";
//            $this->fx->ponerBoton('agregarFiltro',NULL,NULL,'Agregar filtro',NULL,NULL,NULL,'botonTexto',0);
//        echo "</td>";
    echo "</tr>";



	echo "<tr>";
		echo "<td colspan='3' valign='top' align='left' width='80%'>";
			echo "<table class='table table-bordered' >";
				echo "<thead>";




					echo "<tr class='tituloListaMini'>";
					echo "<th width='100px' style='text-align:center;'>";
					$this->fx->ponerBoton('agregarFiltro',NULL,NULL,'<i class="fa fa-plus fa-2x" title="Agregar filtro" style="color:lightgreen;"></i>',NULL,NULL,NULL,'',0);
					echo "</th>";
					echo "<th width='100px' style='text-align:center;'>";
					echo "CAMPO";
					echo "</th>";
					echo "<th  width='600px' style='text-align:center;'>";
					echo "VALORES";
					echo "</th>";
					echo "</tr>";
				echo '</thead>';
				echo '<tbody>';
					$textoADesplegar="";
					for ($x=0;$x<count($this->modelo->arrFiltros);$x++){
					$nombreMenuCampo="campo_".$x;
					$nombreValorCampo="valor_".$x;
					$textoADesplegar="";
					for($y=0;$y<count($this->modelo->arrFiltros["$x"]['valor']);$y++){
						if(strlen($textoADesplegar)>0) $textoADesplegar.="; ";
						$textoADesplegar.=$this->modelo->arrFiltros["$x"]['valor']["$y"]['nombre'];
					}
					echo "<tr>";
						echo "<td colspan='1'  valign='top' align='center'>";
							$this->fx->ponerBoton('borrarFiltro',NULL,"$x",'<i class="fa fa-trash fa-2x red" title="Quitar filtro"></i>',NULL,NULL,NULL,'botonTexto',0);
						echo "</td>";
						echo "<td colspan='1' valign='top'>";
							$this->fx->ponerMenu($nombreMenuCampo, 'Campo', $this->modelo->arrListaCatalogos , NULL, $this->modelo->arrFiltros["$x"]['campo'],'seleccionarCampoFiltro','',"$x",'',1);
						echo "</td>";
						echo "<td colspan='1' valign='top'>";
							echo "$textoADesplegar";
						echo "</td>";
					echo "</tr>";
					}
			echo "</table>";
		echo "</td>";

		echo "<td colspan='1' valign='top' align='right'>";
			if($this->ensenarComboFiltro==1){
					echo "<table class='table'>";
						echo "<tr>";
							echo "<td colspan='1' valign='top' align='right'>";
							//ponerInput('input','nombre','50','100',$this->modelo->arrReporte['nombre'],'inputNormal')
								$this->fx->ponerInput('input','acotarOpciones','30','30',$this->modelo->strAcotarOpciones,'inputNormal',null,1,null,'acotarOpciones',null,null);
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td colspan='1' valign='top' align='right'>";
								$this->fx->ponerMenuMultiple('itemsSeleccionados',NULL,$this->modelo->arrComboFiltro,NULL,NULL,NULL,NULL,NULL,'inputMini',0,1,8);
								echo "<br>";
								$this->fx->ponerBoton('agregarValores',NULL,"0",'Agregar valores',NULL,NULL,NULL,'btn btn-default btn-sm btn-block',0);
							echo "</td>";
						echo "</tr>";
					echo "</table>";
			
			}else{
				echo " ";
			}
		echo "</td>";
		echo '</tbody>';
	echo "</tr>";
echo "</table>";
