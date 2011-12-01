<?php
$flashChart = Yii::createComponent('application.extensions.yiiopenflashchart.EOFC2');
$data = null; // here we need to clean up any previous data for charts

// SKETCH - my favourite :)
$flashChart->begin('Sketch Chart');
$flashChart->setTitle('Sketchometer','{color:#880a88;font-size:15px;padding-bottom:20px;}');

$data['1']['Day']['date'] = 'Oct \'09';
$data['1']['Day']['count'] = '321';
$data['2']['Day']['date'] = 'Nov \'09';
$data['2']['Day']['count'] = 345;
$data['3']['Day']['date'] = 'Dec \'09';
$data['3']['Day']['count'] = 500;

$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');

$flashChart->setLegend('x','Dato');
$flashChart->setLegend('y','Skritt', '{color:#AA0aFF;font-size:12px;}');

$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,600,100)));

$flashChart->renderData('sketch', array(
	'colour' => '#81AC00',
	'outline_colour' => '#567300',
	'offset' => 5,
	'fun_factor' => 7,
));
$flashChart->render(200,300);
?>