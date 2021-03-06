<ul class="nav nav-pills pull-right">
<?php if ($estado=='REGISTRO') : ?>
    <li>
        <a href="<?=$_base?>/dte/dte_compras/rcv_diferencias/<?=$periodo?>/<?=$DteTipo->codigo?>" title="Descargar diferencias del período <?=$periodo?> entre el RC del SII y el IEC de LibreDTE">
            <span class="fa fa-download"></span> Diferencias
        </a>
    </li>
<?php endif; ?>
    <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="fas fa-university"></span> Ver resumen RC<span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?=$_base?>/dte/dte_compras/rcv_resumen/<?=$periodo?>">
                     Registrados
                </a>
            </li>
            <li>
                <a href="<?=$_base?>/dte/dte_compras/rcv_resumen/<?=$periodo?>/PENDIENTE">
                    Pendientes
                </a>
            </li>
            <li>
                <a href="<?=$_base?>/dte/dte_compras/rcv_resumen/<?=$periodo?>/NO_INCLUIR">
                    No incluídos
                </a>
            </li>
            <li>
                <a href="<?=$_base?>/dte/dte_compras/rcv_resumen/<?=$periodo?>/RECLAMADO">
                    Reclamados
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="<?=$_base?>/dte/dte_compras/rcv_resumen/<?=$periodo?>/<?=$estado?>" title="Volver al resumen del RC de <?=$periodo?>">
            Volver al resumen
        </a>
    </li>
</ul>
<h1>Detalle RC período <?=$periodo?> <small>estado: <?=$estado?></small></h1>
<p>Esta es la página del detalle del registro de compras para <?=$DteTipo->tipo?> del período <?=$periodo?> de la empresa <?=$Emisor->razon_social?>.</p>
<?php
foreach ($detalle as &$d) {
    $d['detRutDoc'] = num($d['detRutDoc']).'-'.$d['detDvDoc'];
    unset($d['dhdrCodigo'], $d['dcvCodigo'], $d['dcvEstadoContab'], $d['detCodigo'], $d['detTipoDoc'], $d['detDvDoc'], $d['cambiarTipoTran'], $d['totalDtoiMontoImp'], $d['totalDinrMontoIVANoR']);
}
$keys = array_keys($detalle[0]);
foreach ($keys as &$k) {
    if (substr($k,0,3)=='det') {
        $k = substr($k, 3);
    }
}
array_unshift($detalle, $keys);
new \sowerphp\general\View_Helper_Table($detalle, 'rc_detalle_'.$periodo.'_'.$DteTipo->codigo.'_'.$estado, true);
?>
<link rel="stylesheet" type="text/css" href="<?=$_base?>/css/jquery.dataTables.css" />
<script type="text/javascript" src="<?=$_base?>/js/jquery.dataTables.js"></script>
<script type="text/javascript"> $(document).ready(function(){ dataTable("#<?='rc_detalle_'.$periodo.'_'.$DteTipo->codigo.'_'.$estado?>"); }); </script>
