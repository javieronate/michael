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

$arrColumnas=array();
foreach ($this->modelo->resultadoBusqueda['0'] as  $key => $valor) {
    $poner=1;
    for ($x = 0; $x < count($this->modelo->arrCamposDeValidacion); $x++) {
        if ($key==$this->modelo->arrCamposDeValidacion[$x]['id']) $poner=0;
    }
    if ($poner==1) $arrColumnas[]=$key;
}
// $this->modelo->ensenarArreglo($arrColumnas,'arrColumnas');

$decimales=($this->modelo->estructuraReporte['valorRepresentar']=='cuantos') ? '0' : '2';

echo "<table class='table table-bordered table-hover table-striped table-condensed'>";

    // títulos de columnas
    echo "<thead><tr>";
        for($x=0;$x<count($this->modelo->arrColumnas);$x++){
            if ($this->modelo->arrColumnas[$x]['visible']==1){
                echo "<th colspan='1' class='tituloListaMini'>";
                    echo mb_strtoupper(utf8_encode($this->modelo->arrColumnas[$x]['despliegue']), 'UTF-8');
                echo "</th>";
            }
        }
    echo "</tr></thead>";
    echo "<tbody>";
    // datos a presentar
    //$clase='';
	for ($y=0;$y<count($this->modelo->resultadoBusqueda);$y++){
        echo "<tr>";
            $clase='';
            for ($x=0;$x<count($this->modelo->arrColumnas);$x++){
                if ($this->modelo->arrColumnas[$x]['tipo']=="etiqueta" and
                    $this->modelo->resultadoBusqueda[$y][$this->modelo->arrColumnas[$x]['nombre']]=='Total') $clase='info';
                if ($this->modelo->arrColumnas[$x]['visible']==1) {

                        if ($this->modelo->arrColumnas[$x]['tipo']=="etiqueta"){
                            echo "<td colspan='1' class='". $clase. "'>";
                                if($y>0 and $this->modelo->resultadoBusqueda[$y-1][ $this->modelo->arrColumnas[$x]['nombre'] ]==$this->modelo->resultadoBusqueda[$y][ $this->modelo->arrColumnas[$x]['nombre'] ]){
                                   echo "&nbsp;";
                                }else{
                                    echo (utf8_encode($this->modelo->resultadoBusqueda[$y][ $this->modelo->arrColumnas[$x]['nombre'] ]));
                                }
                            echo "</td>";
                        }else if($this->modelo->arrColumnas[$x]['tipo']=="resultado"){
                            echo "<td colspan='1' align='right' class='". $clase. "'>";
                                 echo (number_format($this->modelo->resultadoBusqueda[$y][ $this->modelo->arrColumnas[$x]['nombre'] ],$decimales));
                            echo "</td>";
                        }
                    echo "</td>";
                }
            }
        echo "</tr>";

        //if ($clase=='inputMini'){
        //    $clase='inputMiniColor';
        //}else{
        //    $clase='inputMini';
        //}
    }
    echo "</tbody>";

echo "</table>";





