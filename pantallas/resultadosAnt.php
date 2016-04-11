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
$decimales=($this->modelo->estructuraReporte['valorRepresentar']=='cuantos') ? '0' : '2';

//$this->fx->ensenarArreglo($arrColumnas,'arrColumnas');

echo "<table width='100%' border='0'>";

    // títulos de columnas
    echo "<tr>";
        for($x=0;$x<count($this->modelo->arrColumnas);$x++){
            if ($this->modelo->arrColumnas[$x]['visible']==1){
                echo "<td colspan='1' class='tituloListaMini'>";
                    echo ($this->modelo->arrColumnas[$x]['despliegue']);
                echo "</td>";
            }
        }
    echo "</tr>";

    // datos a presentar
    $clase='inputMiniColor';
    for ($y=0;$y<count($this->modelo->resultadoBusqueda);$y++){
        echo "<tr>";
            for ($x=0;$x<count($this->modelo->arrColumnas);$x++){
                if ($this->modelo->arrColumnas[$x]['tipo']=="etiqueta" and
                    $this->modelo->resultadoBusqueda[$y][ $this->modelo->arrColumnas[$x]['nombre'] ]=='Total') $clase='totalMini';
                if ($this->modelo->arrColumnas[$x]['visible']==1) {
                        if ($this->modelo->arrColumnas[$x]['tipo']=="etiqueta"){
                            echo "<td colspan='1' class='".$clase."' >";
                                echo ($this->modelo->resultadoBusqueda[$y][ $this->modelo->arrColumnas[$x]['nombre'] ]);
                            echo "</td>";
                        }else if($this->modelo->arrColumnas[$x]['tipo']=="resultado"){
                            echo "<td colspan='1' class='".$clase."' align='right'>";
                                echo (number_format($this->modelo->resultadoBusqueda[$y][ $this->modelo->arrColumnas[$x]['nombre'] ],$decimales));
                            echo "</td>";
                        }
                    echo "</td>";
                }
            }
        echo "</tr>";

        if ($clase=='inputMini'){
            $clase='inputMiniColor';
        }else{
            $clase='inputMini';
        }
    }
echo "</table>";





