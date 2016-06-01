<?php
$total=$estadisticas["total"];
$vista=(isset($estadisticas["vista"]))? $estadisticas["vista"]:0;
$link=(isset($estadisticas["link"]))? $estadisticas["link"]:0;
$aplicar=(isset($estadisticas["aplicar"]))? $estadisticas["aplicar"]:0;
$entrevista=(isset($estadisticas["entrevista"]))? $estadisticas["entrevista"]:0;

$vistaporcentaje=($vista>0)? $vista*100/$total:0;
$linkporcentaje=($link>0)? $link*100/$total:0;
$aplicarporcentaje=($aplicar>0)? $aplicar*100/$total:0;
$entrevistaporcentaje=($entrevista>0)? $entrevista*100/$total:0;

?>
<p>
<i class="fa fa-eye"></i>&nbsp;<?php echo Yii::t('strings','tooltip_veroferta') ?>&nbsp;:<?php echo $vista."/".$total?> 
<?php

    $this->widget(
    'booster.widgets.TbProgress',
    array(
    'context' => Util::colorPorcentaje($vistaporcentaje), // 'success', 'info', 'warning', or 'danger'
	'content' => $vista,
    'percent' => $vistaporcentaje,
	'striped' => true,
    )
    );
	 
?>
</p>
<p>
<i class="fa fa-external-link"></i>&nbsp;<?php echo Yii::t('strings','tooltip_linkoferta') ?>&nbsp;:<?php echo $link."/".$total?> 
<?php

    $this->widget(
    'booster.widgets.TbProgress',
    array(
    'context' => Util::colorPorcentaje($linkporcentaje), // 'success', 'info', 'warning', or 'danger'
	'content' => $link,
    'percent' => $linkporcentaje,
	'striped' => true,
    )
    );
	 
?>
</p>
<p>
<i class="fa fa-hand-o-up"></i>&nbsp;<?php echo Yii::t('strings','tooltip_aplicar') ?>&nbsp;:<?php echo $aplicar."/".$total?> 
<?php

    $this->widget(
    'booster.widgets.TbProgress',
    array(
    'context' => Util::colorPorcentaje($aplicarporcentaje), // 'success', 'info', 'warning', or 'danger'
	'content' => $aplicar,
    'percent' => $aplicarporcentaje,
	'striped' => true,
    )
    );
	 
?>
</p>
<p>
<i class="icon-groups-friends"></i>&nbsp;<?php echo Yii::t('strings','tooltip_entrevista') ?>&nbsp;:<?php echo $entrevista."/".$total?> 
<?php

    $this->widget(
    'booster.widgets.TbProgress',
    array(
    'context' => Util::colorPorcentaje($entrevistaporcentaje), // 'success', 'info', 'warning', or 'danger'
	'content' => $entrevista,
    'percent' => $entrevistaporcentaje,
	'striped' => true,
    )
    );
	 
?>
</p>