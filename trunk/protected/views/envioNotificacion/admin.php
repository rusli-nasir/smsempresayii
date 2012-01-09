<?php
if (isset($_POST['grupoInicial'])) {
    $_SESSION["ids_gupos"] = $_POST['grupoInicial'];
}
if (isset($_POST['fechaInicio']) && isset($_POST['fechaFin'])) {
    $_SESSION["fecha1"] = $_POST['fechaInicio'];
    $_SESSION["fecha2"] = $_POST['fechaFin'];
}

Yii::app()->clientScript->registerCoreScript('jquery');
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/highcharts.js', CClientScript::POS_HEAD);

$this->breadcrumbs = array(
    Yii::t('App', 'Envio Notificacion') => array('/envioNotificacion/admin/'),
    'Reporte',
);
$this->menu = array(
    array('label' => 'Exportar a PDF', 'url' => array('pdf')),
    array('label' => 'Exportar a Excel', 'url' => array('excel')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
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




<h1><?= Yii::t('App', 'Envio Notificacion') ?></h1>
<?php
if ($_SESSION["ids_gupos"] != "") {
    ?>
    <br />
    <h5>
        <strong>
            Grupos:</strong>
        <?php
        //Llamado del grupo
        $command = Yii::app()->db->createCommand();
        $grupos=$command->select('nombre')->from('{{grupo}} g')->where('grupoid IN('. $_SESSION["ids_gupos"] .')')->queryScalar();
        echo $grupos;
        ?>
    </h5>
    <?php
}
if ($_SESSION["fecha1"] != "" && $_SESSION["fecha2"] != "") {
    echo "<h5><strong>Desde:</strong> " . $_SESSION["fecha1"] . " &nbsp;&nbsp;&nbsp;<strong> Hasta: </strong>" . $_SESSION["fecha2"] . "</h5>";
}
?>

<?php echo CHtml::link('Búsqueda Avanzada', '#', array('class' => 'search-button')); ?>
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
                text: 'Histórico de Notificaciones SMS'
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
/////////////////////////////////////////////
//Construir consultas con esquema parametrizado
$where="E.tipoenvio IN(5,6)";
$sql = "SELECT DATE_FORMAT(createtime, '%Y-%m-%d') as fecha, count(*) as conteo
      FROM {{mensaje}} M
      INNER JOIN {{envio}} E ON(E.id=M.envioid)
      WHERE ".$where."
      GROUP BY DATE_FORMAT(createtime, '%Y-%m-%d')";
if ($_SESSION["fecha1"] == "" && $_SESSION["fecha2"] == "" && $_SESSION["ids_gupos"] != "") {
$sql = "SELECT DATE_FORMAT(M.createtime, '%Y-%m-%d') as fecha,count(*) as conteo
      FROM {{mensaje}} M
      INNER JOIN {{usuario}} U ON(U.id = M.usuarioid)
      INNER JOIN system_operadora O ON(O.id = M.operadoraid)
      INNER JOIN {{estado}} ES on(ES.id = M.estadoid)
      INNER JOIN {{envio}} E on(E.id = M.envioid)
      WHERE ".$where." AND grupoid IN (" . $_SESSION["ids_gupos"] . ")
      GROUP BY DATE_FORMAT(M.createtime, '%Y-%m-%d')";
}
if ($_SESSION["fecha1"] != "" && $_SESSION["fecha2"] != "" && $_SESSION["ids_gupos"] == "") {
    $fecha_2 = explode('-', $_SESSION["fecha2"]);
    $sql = "SELECT DATE_FORMAT(M.createtime, '%Y-%m-%d') as fecha,count(*) as conteo
      FROM {{mensaje}} M
      INNER JOIN {{usuario}} U on(U.id = M.usuarioid)
      INNER JOIN system_operadora O on(O.id = M.operadoraid)
      INNER JOIN {{estado}} ES on(ES.id = M.estadoid)
      INNER JOIN {{envio}} E on(E.id = M.envioid)
      WHERE ".$where." AND DATE_FORMAT(M.createtime, '%Y-%m-%d') BETWEEN '" . $_SESSION["fecha1"] . "' AND '" . $fecha_2[0] . '-' . $fecha_2[1] . '-' . ($fecha_2[2]) . "'
      GROUP BY DATE_FORMAT(M.createtime, '%Y-%m-%d')";
}
if ($_SESSION["fecha1"] != "" && $_SESSION["fecha2"] != "" && $_SESSION["ids_gupos"] != "") {
    $fecha_2 = explode('-', $_SESSION["fecha2"]);
    $sql = "SELECT DATE_FORMAT(M.createtime, '%Y-%m-%d') as fecha, count(*) as conteo
      FROM {{mensaje}} M
      INNER JOIN {{usuario}} U on(U.id = M.usuarioid)
      INNER JOIN system_operadora O on(O.id = M.operadoraid)
      INNER JOIN {{estado}} ES on(ES.id = M.estadoid)
      INNER JOIN {{envio}} E on(E.id = M.envioid)
      WHERE ".$where." AND grupoid IN (" . $_SESSION["ids_gupos"] . ") AND DATE_FORMAT(M.createtime, '%Y-%m-%d') BETWEEN '" . $_SESSION["fecha1"] . "' and '" . $fecha_2[0] . '-' . $fecha_2[1] . '-' . ($fecha_2[2]) . "'
      GROUP BY DATE_FORMAT(M.createtime, '%Y-%m-%d')";
}
if (isset(Yii::app()->user->nivel) && Yii::app()->user->nivel == 2) {
    if ($_SESSION["fecha1"] != "" && $_SESSION["fecha2"] != "" && $_SESSION["ids_gupos"] != "") {
        $fecha_2 = explode('-', $_SESSION["fecha2"]);
        $sql = "SELECT DATE_FORMAT(M.createtime, '%Y-%m-%d') as fecha, count(*) as conteo
      FROM {{mensaje}} M
      INNER JOIN {{usuario}} U on(U.id = M.usuarioid)
      INNER JOIN system_operadora O on(O.id = M.operadoraid)
      INNER JOIN {{estado}} ES on(ES.id = M.estadoid)
      INNER JOIN {{envio}} E on(E.id = M.envioid)
      WHERE ".$where." AND grupoid in (" . $_SESSION["ids_gupos"] . ") and DATE_FORMAT(M.createtime, '%Y-%m-%d') BETWEEN '" . $_SESSION["fecha1"] . "' and '" . $fecha_2[0] . '-' . $fecha_2[1] . '-' . ($fecha_2[2]) . "' and operadoraid=" . Yii::app()->user->dependid . "
      GROUP BY DATE_FORMAT(M.createtime, '%Y-%m-%d')";
    }

    if ($_SESSION["fecha1"] != "" && $_SESSION["fecha2"] != "" && $_SESSION["ids_gupos"] == "") {
        $fecha_2 = explode('-', $_SESSION["fecha2"]);
        $sql = "SELECT DATE_FORMAT(M.createtime, '%Y-%m-%d') as fecha,count(*) as conteo
      FROM {{mensaje}} M
      INNER JOIN {{usuario}} U on(U.id = M.usuarioid)
      INNER JOIN system_operadora O on(O.id = M.operadoraid)
      INNER JOIN {{estado}} ES on(ES.id = M.estadoid)
      INNER JOIN {{envio}} E on(E.id = M.envioid)
      WHERE ".$where." AND DATE_FORMAT(M.createtime, '%Y-%m-%d') BETWEEN '" . $_SESSION["fecha1"] . "' and '" . $fecha_2[0] . '-' . $fecha_2[1] . '-' . ($fecha_2[2]) . "' and operadoraid=" . Yii::app()->user->dependid . "
      GROUP BY DATE_FORMAT(M.createtime, '%Y-%m-%d')";
    }

    if ($_SESSION["fecha1"] == "" && $_SESSION["fecha2"] == "" && $_SESSION["ids_gupos"] != "") {
        $sql = "SELECT DATE_FORMAT(M.createtime, '%Y-%m-%d') as fecha,count(*) as conteo
      FROM {{mensaje}} M
      INNER JOIN {{usuario}} U on(U.id = M.usuarioid)
      INNER JOIN system_operadora O on(O.id = M.operadoraid)
      INNER JOIN {{estado}} ES on(ES.id = M.estadoid)
      INNER JOIN {{envio}} E on(E.id = M.envioid)
      WHERE ".$where." AND grupoid in (" . $_SESSION["ids_gupos"] . ") and operadoraid=" . Yii::app()->user->dependid . "
      GROUP BY DATE_FORMAT(M.createtime, '%Y-%m-%d')";
    }

    if ($_SESSION["fecha1"] == "" && $_SESSION["fecha2"] == "" && $_SESSION["ids_gupos"] == "") {
        $sql = "SELECT DATE_FORMAT(createtime, '%Y-%m-%d') as fecha, count(*) as conteo
      FROM {{mensaje}} M
      INNER JOIN {{envio}} E ON(E.id=M.envioid)
      WHERE ".$where." AND operadoraid=" . Yii::app()->user->dependid . "
      GROUP BY DATE_FORMAT(createtime, '%Y-%m-%d')";
    }
}
//Con esto eliminamos las dos conexiones adicionales que se habian creado
$command=Yii::app()->db->createCommand($sql);
$clientes=$command->queryAll();

//$_GET['fecha1']=isset($_GET['fecha1'])?date("Y-m-d",strtotime($_GET['fecha1'])):"";
//$_GET['fecha2']=isset($_GET['fecha2'])?date("Y-m-d",strtotime($_GET['fecha2'])):"";
$x = 0;
$i = 0;
if (count($clientes)>0) {
    foreach($clientes as $cliente) {
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