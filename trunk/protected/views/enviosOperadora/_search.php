<div class="wide form">
<?php 
$cs = Yii::app()->getClientScript();
$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>

<div class="row jui"> 
<strong>Desde:&nbsp;&nbsp;</strong>
        <?php		
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(            
            'name' => 'fechaInicio',
            'language' => 'es',            
            'value' => array(),
                 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
                  'options'=>array(
                      'showAnim' => 'slide',
                      'dateFormat'=>'yy-mm-dd',
                      'showButtonPanel' => true,
                      'defaultDate'=>"-4w",
                      'changeMonth'=>true,
                      'numberOfMonths'=>3,
                      'onSelect'=>'js:function(selectedDate){
                        var option = this.id == "fechaInicio" ? "minDate" : "maxDate",
					instance = $(this).data("datepicker"),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				$("#fechaInicio,#fechaFin").not(this).datepicker("option", option, date );
                        }'
                  ),
                )
        );
        ?>
<strong>&nbsp;&nbsp;hasta:</strong>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'fechaFin',
            'language' => 'es',
            'value' => array(),
            'htmlOptions' => array('size' => 10, 'style' => 'width:80px !important'),
            'options'=>array(
                      'showAnim' => 'slide',
                      'dateFormat'=>'yy-mm-dd',
                      'showButtonPanel' => true,
                      'defaultDate'=>"-4w",
                      'changeMonth'=>true,
                      'numberOfMonths'=>3,
                      'onSelect'=>'js:function(selectedDate){
                        var option = this.id == "fechaInicio" ? "minDate" : "maxDate",
					instance = $(this).data("datepicker"),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				$("#fechaInicio,#fechaFin").not(this).datepicker("option", option, date );
                        }'
                  ),
                )
        );
        ?>

    </div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<?php
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile('/css/chosen.css');
        $cs->registerScriptFile('/js/chosen.jquery.js',CClientScript::POS_END);
        $cs->registerScript(
                    "manageGrupo", "jQuery().ready(function(){
                        $('select.cbogrupo').chosen();
                        $('select.cbogrupo').change(function(){
                            if($.trim($(this).val())==''){
                                $('.chzn-container').remove();
                                $('#grupoInicial').val('');
                                $('select.cbogrupo').removeClass('chzn-done').chosen();
                            }else{
                                $('#grupoInicial').val($(this).val().join(','));
                            }
                        });
            });",CClientScript::POS_END);
?>