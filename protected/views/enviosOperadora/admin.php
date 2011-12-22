<?php
if(isset($_POST['fechaInicio']) && isset($_POST['fechaFin'])){
$_SESSION["ofecha1"]=$_POST['fechaInicio'];
$_SESSION["ofecha2"]=$_POST['fechaFin'];
}

Yii::app()->clientScript->registerCoreScript('jquery');
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/highcharts.js', CClientScript::POS_HEAD);
$this->breadcrumbs=array(
	'Envíos por Operadora'=>array('/enviosOperadora'),
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
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('infosms-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Envíos por Operadora</h1>

<?php
if($_SESSION["ofecha1"] != "" && $_SESSION["ofecha2"] != ""){
echo "<h5><strong>Desde:</strong> ".$_SESSION["ofecha1"]." &nbsp;&nbsp;&nbsp;<strong> Hasta: </strong>".$_SESSION["ofecha2"]."</h5>";
}
?>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search'); ?>
</div><!-- search-form -->

<?php
$link = mysql_connect("localhost", "admin", "Xurpas123");
$bd=explode(';', Yii::app()->db->connectionString);
$bd2=explode('=', $bd[1]);
mysql_select_db($bd2[1], $link);
if(isset(Yii::app()->user->nivel) && Yii::app()->user->nivel==2){
if(isset($_SESSION["ofecha1"]) && isset($_SESSION["ofecha2"]) && $_SESSION["ofecha1"] != "" && $_SESSION["ofecha2"] != ""){
	$fecha_2=explode('-', $_SESSION["ofecha2"]);
$result = mysql_query("select 
    date_format(`e`.`createtime`,'%Y-%m-%d') AS `fecha`,
    ifnull((case when (`t`.`id` = 2) then count(0) end),0) AS `Claro`,
    ifnull((case when (`t`.`id` = 1) then count(0) end),0) AS `Movistar`,
                       CASE WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 1 THEN 'Ene'
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 2 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Feb')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 3 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Marz')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 4 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Abr')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 5 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Mayo')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 6 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Jun')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 7 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Jul')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 8 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Agost')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 9 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Sept')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 10 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Oct')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 11 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Nov')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 12 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Dic') end as mes, 
                       DAY(date_format(`e`.`createtime`,'%Y-%m-%d')) as dia 
  from 
    (`".Yii::app()->db->tablePrefix."mensaje` `e` join `system_operadora` `t` on((`e`.`operadoraid` = `t`.`id`))) 
  where 
    (`e`.`estadoid` = 1) and 
    date_format(`e`.`createtime`,'%Y-%m-%d') BETWEEN '".$_SESSION["ofecha1"]."' and '".$fecha_2[0].'-'.$fecha_2[1].'-'.($fecha_2[2]+1)."'
	and `e`.`operadoraid`=".Yii::app()->user->dependid."	
  group by 
    date_format(`e`.`createtime`,'%Y-%m-%d')", $link) or die(mysql_error());
}
else{
	$result = mysql_query("select 
    date_format(`e`.`createtime`,'%Y-%m-%d') AS `fecha`,
    ifnull((case when (`t`.`id` = 2) then count(0) end),0) AS `Claro`,
    ifnull((case when (`t`.`id` = 1) then count(0) end),0) AS `Movistar`,
                       CASE WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 1 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Ene')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 2 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Feb')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 3 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Marz')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 4 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Abr')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 5 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Mayo')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 6 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Jun')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 7 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Jul')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 8 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Agost')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 9 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Sept')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 10 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Oct')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 11 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Nov')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 12 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Dic') end as mes, 
                       DAY(date_format(`e`.`createtime`,'%Y-%m-%d')) as dia 
  from 
    (`".Yii::app()->db->tablePrefix."mensaje` `e` join `system_operadora` `t` on((`e`.`operadoraid` = `t`.`id`))) 
  where 
    (`e`.`estadoid` = 1) and `e`.`operadoraid`=".Yii::app()->user->dependid."
  group by 
    date_format(`e`.`createtime`,'%Y-%m-%d')", $link) or die(mysql_error());
}
}
else{
	if(isset($_SESSION["ofecha1"]) && isset($_SESSION["ofecha2"]) && $_SESSION["ofecha1"] != "" && $_SESSION["ofecha2"] != ""){
	$fecha_2=explode('-', $_SESSION["ofecha2"]);
$result = mysql_query("select 
    date_format(`e`.`createtime`,'%Y-%m-%d') AS `fecha`,
    ifnull((case when (`t`.`id` = 2) then count(0) end),0) AS `Claro`,
    ifnull((case when (`t`.`id` = 1) then count(0) end),0) AS `Movistar`,
                       CASE WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 1 THEN 'Ene'
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 2 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Feb')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 3 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Marz')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 4 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Abr')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 5 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Mayo')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 6 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Jun')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 7 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Jul')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 8 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Agost')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 9 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Sept')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 10 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Oct')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 11 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Nov')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 12 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Dic') end as mes, 
                       DAY(date_format(`e`.`createtime`,'%Y-%m-%d')) as dia 
  from 
    (`".Yii::app()->db->tablePrefix."mensaje` `e` join `system_operadora` `t` on((`e`.`operadoraid` = `t`.`id`))) 
  where 
    (`e`.`estadoid` = 1) and 
    date_format(`e`.`createtime`,'%Y-%m-%d') BETWEEN '".$_SESSION["ofecha1"]."' and '".$fecha_2[0].'-'.$fecha_2[1].'-'.($fecha_2[2]+1)."'	
  group by 
    date_format(`e`.`createtime`,'%Y-%m-%d')", $link) or die(mysql_error());
}
else{
	$result = mysql_query("select 
    date_format(`e`.`createtime`,'%Y-%m-%d') AS `fecha`,
    ifnull((case when (`t`.`id` = 2) then count(0) end),0) AS `Claro`,
    ifnull((case when (`t`.`id` = 1) then count(0) end),0) AS `Movistar`,
                       CASE WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 1 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Ene')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 2 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Feb')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 3 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Marz')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 4 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Abr')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 5 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Mayo')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 6 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Jun')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 7 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Jul')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 8 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Agost')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 9 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Sept')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 10 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Oct')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 11 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Nov')
                            WHEN MONTH(date_format(`e`.`createtime`,'%Y-%m-%d')) = 12 THEN concat(DAY(date_format(`e`.`createtime`,'%Y-%m-%d')), ' de ', 'Dic') end as mes, 
                       DAY(date_format(`e`.`createtime`,'%Y-%m-%d')) as dia 
  from 
    (`".Yii::app()->db->tablePrefix."mensaje` `e` join `system_operadora` `t` on((`e`.`operadoraid` = `t`.`id`))) 
  where 
    (`e`.`estadoid` = 1) 
  group by 
    date_format(`e`.`createtime`,'%Y-%m-%d')", $link) or die(mysql_error());
}
}

$i = 0;
while ($row = mysql_fetch_assoc($result)) {
    $datos1[] = intval($row['Movistar']);
    $datos2[] = intval($row['Claro']);
    $datos3[] = "'" . $row['mes'] . "'";
}
?>

<script type="text/javascript">
		
            var chart;
            $(document).ready(function() {
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        defaultSeriesType: 'column'
                    },
                    title: {
                        text: 'Reporte de Envíos Diarios de SMS.'
                    },
                    subtitle: {
                        text: 'Total de Envíos por dia a moviles de cada operadora.'
                    },
                    xAxis: {
                        categories: [
<?php echo implode($datos3, ','); ?>
                                                                ]
                                                            },
                                                            yAxis: {
                                                                min: 0,
                                                                title: {
                                                                    text: 'Cantidad de mensajes (unidades)'
                                                                }
                                                            },
                                                            legend: {
                                                                layout: 'vertical',
                                                                backgroundColor: '#FFFFFF',
                                                                align: 'left',
                                                                verticalAlign: 'top',
                                                                x: 100,
                                                                y: 70,
                                                                floating: true,
                                                                shadow: true
                                                            },
                                                            tooltip: {
                                                                formatter: function() {
                                                                    return ''+
                                                                        this.x +': '+ this.y +' SMS';
                                                                }
                                                            },
                                                            plotOptions: {
                                                                column: {
                                                                    pointPadding: 0.2,
                                                                    borderWidth: 0
                                                                }
                                                            },
                                                            series: [{
                                                                    name: 'Movistar',
                                                                    data: [ <?php echo implode($datos1, ','); ?>]
				
                                                                }, {
                                                                    name: 'Claro',
                                                                    data: [<?php echo implode($datos2, ','); ?>]
				
                                                                }]
                                                        });
				
				
                                                    });
				
        </script>
        
        <div id="container" style="margin: 0 auto"></div>




<?php
if(isset(Yii::app()->user->nivel) && Yii::app()->user->nivel==2){
	if(Yii::app()->user->dependid==1){
	$this->widget('zii.widgets.grid.CGridView', array(    
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(        
        'fecha',
		'Movistar',	
    ),
));
	}
	else{
		if(Yii::app()->user->dependid==2){
		$this->widget('zii.widgets.grid.CGridView', array(    
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(        
        'fecha',
		'Claro',	
    ),
));
		}
	}
}
else{
$this->widget('zii.widgets.grid.CGridView', array(    
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(        
        'fecha',
		'Movistar',
		'Claro',		
    ),
));
}
?>