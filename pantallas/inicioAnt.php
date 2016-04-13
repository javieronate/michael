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

echo "<table width='100%' border='0'>";
    echo "<tr>";
        echo "<td colspan='2' class='tituloCabeza' align='center'>";
            echo "Reportes inicio";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
//         echo "<td colspan='1' class='inputNormal'>";
//             echo "Seleccione reporte";
//         echo "</td>";
        echo "<td colspan='2' class='inputNormal' align ='center'>";
            echo "Seleccione reporte:  ";
            $this->fx->ponerMenu('reporte', 'Reportes', $this->modelo->arrReportes , NULL, $this->reporteSeleccionado,'seleccionarReporte','','','inputNormal',1);
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td colspan='1' class=''>";
            include 'filtros.php';
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td colspan='1' class=''>";
            $this->fx->ponerBoton('buscar',NULL,NULL,'Buscar',NULL,NULL,NULL,'botonTexto',0);
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            $this->fx->ponerBoton('salir',NULL,NULL,'Salir',NULL,NULL,NULL,'botonTexto',0);
        echo "</td>";
    echo "</tr>";
echo "</table>";
echo "<br>";
echo "<table width='100%' border='0'>";
    echo "<tr>";
        echo "<td colspan='2' class=''>";
            if (count($this->modelo->resultadoBusqueda)>0) include 'resultados.php';
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td colspan='2' class=''>";
            //include 'debug.php';
        echo "</td>";
    echo "</tr>";
echo "</table>";
