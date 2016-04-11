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

print "<pre>";
    echo "<br>post  <BR>";
    print_r($_POST);
print "</pre>";

print "<pre>";
    echo "<br>arrJoins  <BR>";
    print_r($this->modelo->arrColumnas);
print "</pre>";

print "<pre>";
echo "<br>estructuraReporte  <BR>";
print_r($this->modelo->estructuraReporte);
print "</pre>";
