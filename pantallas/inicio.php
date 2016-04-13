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

echo "<table class='table' border='0'>";
    echo "<tr>";
        echo "<td colspan='2' align ='center'>";
            echo "<strong> Login:</strong>";
        echo "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td colspan='1' class='inputNormal' align ='right' width='50%'>";
            echo "Usuario:  ";
		echo "</td>";
		echo "<td colspan='1' class='inputNormal' align ='left'>";
            $this->fx->ponerInput('input','usuario','30','30','','inputNormal');
        echo "</td>";
    echo "</tr>";


	echo "<tr>";
		echo "<td colspan='1' class='inputNormal' align ='right' width='50%'>";
			echo "Clave:  ";
		echo "</td>";
		echo "<td colspan='1' class='inputNormal' align ='left'>";
			$this->fx->ponerInput('input','clave','30','30','','inputNormal');
		echo "</td>";
	echo "</tr>";

    echo "<tr>";
        echo "<td colspan='2' class='' align='center'>";
            $this->fx->ponerBoton('login',NULL,NULL,'Login',NULL,NULL,NULL,'btn btn-primary',0);
//            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
//            $this->fx->ponerBoton('salir',NULL,NULL,'Limpiar',NULL,NULL,NULL,'btn btn-default',0);
//            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
//            $this->fx->ponerBoton('hojaCalculo',NULL,NULL,'Hoja de cálculo',NULL,NULL,NULL,'btn btn-default',0);
        echo "</td>";
    echo "</tr>";


echo "</table>";
