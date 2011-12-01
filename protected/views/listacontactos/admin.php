<?php
$this->breadcrumbs=array(
	'Listacontactos'=>array('/listacontactos'),
	'Admin',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'contacto-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'contactoid',
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        'nombres',
        array(
            'name' => 'telefono',
            'htmlOptions' => array('style' => 'width:80px'),
        ),

    ),
));
?>