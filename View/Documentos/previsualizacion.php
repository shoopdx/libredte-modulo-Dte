<h1>Previsualización DTE</h1>
<?php
foreach (['MntExe', 'MntNeto', 'MntIVA', 'MntTotal'] as $m) {
    if ($resumen[$m]) {
        $resumen[$m] = num($resumen[$m], $Dte->esExportacion() ? 2 : 0);
    }
}
$resumen['TpoDoc'] = $DteTmp->getDte()->tipo;
$resumen['FchDoc'] = \sowerphp\general\Utility_Date::format($resumen['FchDoc']);
$resumen['CdgSIISucur'] = $Emisor->getSucursal($resumen['CdgSIISucur'])->sucursal;
unset($resumen['NroDoc'], $resumen['TasaImp']);
new \sowerphp\general\View_Helper_Table([
    ['Documento', 'Fecha emisión', 'Sucursal', 'RUT receptor', 'Razón social receptor', 'Exento', 'Neto', 'IVA', 'Total'],
    $resumen
]);
?>
<div class="row">
    <div class="col-md-3">
        <a class="btn btn-primary btn-lg btn-block" href="../dte_tmps/cotizacion/<?=$DteTmp->receptor?>/<?=$DteTmp->dte?>/<?=$DteTmp->codigo?>" role="button">
            <span class="fa fa-dollar" style="font-size:24px"></span>
            Cotización
        </a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary btn-lg btn-block" href="../dte_tmps/pdf/<?=$DteTmp->receptor?>/<?=$DteTmp->dte?>/<?=$DteTmp->codigo?>" role="button">
            <span class="fa fa-file-pdf-o" style="font-size:24px"></span>
            Previsualizar PDF
        </a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary btn-lg btn-block" href="../dte_tmps/xml/<?=$DteTmp->receptor?>/<?=$DteTmp->dte?>/<?=$DteTmp->codigo?>" role="button">
            <span class="fa fa-file-code-o" style="font-size:24px"></span>
            Previsualizar XML
        </a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary btn-lg btn-block" href="generar/<?=$DteTmp->receptor?>/<?=$DteTmp->dte?>/<?=$DteTmp->codigo?>" role="button" onclick="return Form.checkSend('¿Está seguro de querer generar el DTE?')">
            <span class="fa fa-send-o" style="font-size:24px"></span>
            Generar DTE
        </a>
    </div>
</div>
