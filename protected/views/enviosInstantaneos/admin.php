<?php

Yii::app()->clientScript->registerCoreScript('jquery');
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/highcharts.js', CClientScript::POS_HEAD);

$this->breadcrumbs=array(
	'Envíos Instantáneos'=>array('/enviosInstantaneos'),
	'Reporte',
);

$this->menu=array(
array('label'=>'Exportar a PDF', 'url'=>array('pdf')),
array('label'=>'Exportar a Excel', 'url'=>array('excel')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
");
?>




<h1>Envíos Instantáneos </h1>             
<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search'); ?>
</div><!-- search-form -->
<!--GRAFICOS-->
<script type="text/javascript">
		
            var chart;
            $(document).ready(function() {
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        zoomType: 'x',
                        spacingRight: 20
                    },
                    title: {
                        text: 'Histórico de Envíos de SMS'
                    },
                    subtitle: {
                        text: document.ontouchstart === undefined ?
                            'Haga clic y arrastre en el área de trazado para acercar' :
                            'Arrastrar el cursor sobre el grafico para ver detalle'
                    },
                    xAxis: {
                        type: 'datetime',
                        maxZoom: 14 * 24 * 3600000, // fourteen days
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Cantidad de Envíos'
                        },
                        min: 2.6,
                        startOnTick: false,
                        showFirstLabel: false
                    },
                    tooltip: {
                        formatter: function() {
                            var point = this.points[0];
                            return '<b>'+ point.series.name +'</b><br/>'+
                                Highcharts.dateFormat('%A %e de %B de %Y', this.x) + ':<br/>'+
                                Highcharts.numberFormat(point.y, 2);
                        },
                        shared: true					
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: [0, 0, 0, 300],
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, 'rgba(2,0,0,0)']
                                ]
                            },
                            lineWidth: 1,
                            marker: {
                                enabled: false,
                                states: {
                                    hover: {
                                        enabled: true,
                                        radius: 5
                                    }
                                }
                            },
                            shadow: false,
                            states: {
                                hover: {
                                    lineWidth: 1						
                                }
                            }
                        }
                    },
				
                    series: [{
                            type: 'area',
                            name: 'Cantidad de Envíos',
                            pointInterval: 24 * 3600 * 1000,
						
<?php
$link = mysql_connect("localhost", "admin", "Xurpas123");
$bd=explode(';', Yii::app()->db->connectionString);
$bd2=explode('=', $bd[1]);
mysql_select_db($bd2[1], $link);

if(isset(Yii::app()->user->nivel) && Yii::app()->user->nivel==2){
	$result1 = mysql_query("select DATE_FORMAT(createtime, '%Y-%m-%d') as fecha, count(*) as conteo
from `".Yii::app()->db->tablePrefix."mensaje`
where operadoraid=".Yii::app()->user->dependid."
group by DATE_FORMAT(createtime, '%Y-%m-%d')", $link) or die(mysql_error());
}
else{
$result1 = mysql_query("select DATE_FORMAT(createtime, '%Y-%m-%d') as fecha, count(*) as conteo
from `".Yii::app()->db->tablePrefix."mensaje`
group by DATE_FORMAT(createtime, '%Y-%m-%d')", $link) or die(mysql_error());
}

//$_GET['fecha1']=isset($_GET['fecha1'])?date("Y-m-d",strtotime($_GET['fecha1'])):"";
//$_GET['fecha2']=isset($_GET['fecha2'])?date("Y-m-d",strtotime($_GET['fecha2'])):"";
$x = 0;
$i = 0;
if (mysql_num_rows($result1)) {
    while ($cliente = @mysql_fetch_array($result1)) {
        if ($x == 0) {
            $fecha1 = $cliente['fecha'];
        }
        $valores[] = $cliente['fecha'] . ", " . $cliente['conteo'];
        $x = 1;
        $i++;
    }
}
$fecha = explode("-", $fecha1);
?>
						
                    pointStart: Date.UTC(<?php echo $fecha[0]; ?>, <?php echo (int) $fecha[1] - 1; ?>, <?php echo $fecha[2]; ?>),
                    data: [
<?php
$fecha2 = explode(", ", $valores[$i - 1]);
$j = 0;
$a = 0;
while ($fecha1 <= $fecha2[0]) {

    $valor = explode(", ", $valores[$j]);
    if ($a == 1) {
        echo ", ";
    }
    if ($fecha1 == $valor[0]) {

        echo $valor[1];
        $j++;
    } else {
        echo 0;
    }

    $fecha1 = date("Y-m-d", strtotime("$fecha1 + 1 days"));
    $a = 1;
}
?>						
							
                    ]
                }]
        });
				
				
    });
				
        </script>
<div id="container" style="margin: 0 auto"></div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(    
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(        
        'Fecha',
		'Usuario',
		'Telefono',
		'Operadora',
		'Mensaje',
		'Estado',
    ),
));


?>