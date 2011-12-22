<?php
if(isset($_POST['Conversaciones']) && $_POST['Conversaciones'] != ""){
$_SESSION["id_conversacion"]=$_POST['Conversaciones'];
}
Yii::app()->clientScript->registerCoreScript('jquery');
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/highcharts.js', CClientScript::POS_HEAD);

$this->breadcrumbs=array(
	'Conversaciones'=>array('/conversaciones'),
	'Reporte',
);
$this->menu=array(
array('label'=>'Exportar a PDF', 'url'=>array('pdf')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
");
?>


<h1>Conversaciones</h1>
<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button'));?>
<div class="search-form" <?php if(isset($_SESSION['id_conversacion']) && $_SESSION['id_conversacion'] != ""){ echo "style=\"display:none\"";} ?>>
<?php $this->renderPartial('_search'); ?>
</div><!-- search-form -->
<!--GRAFICOS-->

<?php
if(isset($_SESSION['id_conversacion']) && $_SESSION['id_conversacion'] != ""){
$link = mysql_connect("localhost", "admin", "Xurpas123");
$bd=explode(';', Yii::app()->db->connectionString);
$bd2=explode('=', $bd[1]);
mysql_select_db($bd2[1], $link);

$result = mysql_query("select 
    `t`.`id` AS `id`,
    `t`.`nombre` AS `nombre`,
    `t`.`envioid` AS `envioid`,
    `t`.`asunto` AS `asunto`,
    `t`.`horaenvio` AS `horaenvio`,
    `t`.`fecha` AS `fecha`,
    `t`.`fecha2` AS `fecha2`,
    IFNULL(count(*), 0) as mensajes
  from 
    `".Yii::app()->db->tablePrefix."envios_conversacion` `t`
	where
	id=".$_SESSION["id_conversacion"]." and operadoraid=".Yii::app()->user->dependid." 
  group by 
    `t`.`id`,`t`.`nombre`,`t`.`fecha`,`t`.`fecha2`,`t`.`asunto`,`t`.`horaenvio`,`t`.`envioid`,`t`.`operadoraid`", $link) or die(mysql_error());

$i = 0;
while ($rowEmp = mysql_fetch_assoc($result)) {


    $datos1[] = floatval($rowEmp['mensajes']); //$rowEmp['conteo'];
    $datos2[] = "'" . $rowEmp['asunto'] . "'";
    $datos4[] = $rowEmp['fecha'];

    $cant = floatval($rowEmp['mensajes']);
    $nombre = $rowEmp['asunto'];

    $resultdetalle = mysql_query("select 
    `t`.`id` AS `id`,
    `t`.`nombre` AS `nombre`,
    `t`.`envioid` AS `envioid`,
    `t`.`asunto` AS `asunto`,
    `t`.`horaenvio` AS `horaenvio`,
    `t`.`fecha` AS `fecha`,
    `t`.`fecha2` AS `fecha2`,
    ifnull((case when (`t`.`estado` = 1) then count(0) end),0) AS `Enviados`,
    ifnull((case when (`t`.`estado` = 2) then count(0) end),0) AS `No_Enviados`,
    ifnull((case when (`t`.`estado` = 3) then count(0) end),0) AS `Pendientes` 
  from 
    `".Yii::app()->db->tablePrefix."envios_conversacion` `t` 
	where
	id=".$_SESSION["id_conversacion"]." and `envioid`=".$rowEmp['envioid']." and operadoraid=".Yii::app()->user->dependid."
  group by 
    `t`.`id`,`t`.`nombre`,`t`.`fecha`,`t`.`fecha2`,`t`.`asunto`,`t`.`horaenvio`,`t`.`envioid`,`t`.`operadoraid`", $link) or die(mysql_error());


    $enviados = 0;
    $noenviados = 0;
    $pendientes = 0;
    while ($rowdetalle = mysql_fetch_assoc($resultdetalle)) {
        $enviados = ($rowdetalle['Enviados']>0)?$rowdetalle['Enviados']:0.001;
        $noenviados = ($rowdetalle['No_Enviados']>0)?$rowdetalle['No_Enviados']:0.001;
        $pendientes = ($rowdetalle['Pendientes']>0)?$rowdetalle['Pendientes']:0.001;
    }
    

    $slash[] = "{y: $cant, 
			color: colors[$i],
			drilldown: {
				name: '$nombre',
				categories: ['Enviados', 'No Enviados', 'Pendientes'],
				data: [$enviados, $noenviados, $pendientes],
				color: colors[$i]
			}						
		}";
    $i++;
}
}
?>

<?php if(isset($_SESSION['id_conversacion']) && $_SESSION['id_conversacion'] != ""){?>
<script type="text/javascript">
var chart;
            $(document).ready(
            function() {
				
                var colors = Highcharts.getOptions().colors,
                categories = [<?php echo implode($datos2, ','); ?>], //nombre de las conversaciones
                name = 'Estado de las Conversaciones	',
                data = [
<?php
echo implode($slash, ',');
?>
                                                                ];
						

                                                                function setChart(name, categories, data, color) {
                                                                    chart.xAxis[0].setCategories(categories);
                                                                    chart.series[0].remove();
                                                                    chart.addSeries({
                                                                        name: name,
                                                                        data: data,
                                                                        color: color || 'white'
                                                                    });
                                                                }
				
                                                                chart = new Highcharts.Chart({
                                                                    chart: {
                                                                        renderTo: 'container', 
                                                                        type: 'column'
                                                                    },
                                                                    title: {
                                                                        text: 'Estado de las Conversaciones '
                                                                    },
                                                                    subtitle: {
                                                                        text: 'Click en la barra para visualizar el detalle del estado de los mensajes de cada conversacion. Click nuevamente para regresar.'
                                                                    },
                                                                    xAxis: {
                                                                        categories: categories							
                                                                    },
                                                                    yAxis: {
                                                                        title: {
                                                                            text: 'Cantidad de mensajes'
                                                                        }
                                                                    },
                                                                    plotOptions: {
                                                                        column: {
                                                                            cursor: 'pointer',
                                                                            point: {
                                                                                events: {
                                                                                    click: function() {
                                                                                        var drilldown = this.drilldown;
                                                                                        if (drilldown) { // drill down
                                                                                            setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                                                                        } else { // restore
                                                                                            setChart(name, categories, data);
                                                                                        }
                                                                                    }
                                                                                }
                                                                            },
																			
                                                                            dataLabels: {																				
                                                                                enabled: true,
                                                                                color: colors[0],
                                                                                style: {
                                                                                    fontWeight: 'bold'
                                                                                },
                                                                                formatter: function() {                                                                                    
                                                                                    return Math.floor(this.y) +' sms';
                                                                                }																				
																				
                                                                            }					
                                                                        }
                                                                    },
                                                                    tooltip: {
                                                                        formatter: function() {
                                                                            var point = this.point,
                                                                            s = this.x +':<b>'+ this.y +' mensajes</b><br/>';
                                                                            if (point.drilldown) {
                                                                                s += 'Click para visualizar la conversacion '+ point.category +' ';
                                                                            } else {
                                                                                s += 'Click para regresar';
                                                                            }
                                                                            return s;
                                                                        }
                                                                    },
                                                                    series: [{
                                                                            name: name,
                                                                            data: data,
                                                                            color: 'white'
                                                                        }], 
                                                                    exporting:{
                                                                        enabled: false
						

                                                                    }
                                                                });
				
				
                                                            });
			
			
				
</script>

<div id="container" style="margin: 0 auto"></div>
<?php } ?>
<?php
if(isset($_SESSION['id_conversacion']) && $_SESSION['id_conversacion'] != ""){
$this->widget('zii.widgets.grid.CGridView', array(    
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(                
		'asunto',
		'horaenvio',
		'fecha',
		'fecha2',
		'Enviado',
		'No_Enviados',
		'Pendientes',		
    ),
));
}