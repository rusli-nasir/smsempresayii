<?php $this->beginContent('//layouts/main'); ?>

<div class="container">

    <?php if ($this->panel) { ?>

        <div class="span-4">

            <?php if (!Yii::app()->user->isGuest) { ?>

                <div class="mainmenu">
                    <?php
                    $rol=  Rol::model()->findByPk(Yii::app()->user->rol);
                    $modulos=explode(',',$rol->modulos);
                    ?>

                    <?php

                    $this->widget('zii.widgets.CMenu', array(
                        'id' => 'qm0',
                        'htmlOptions' => array('class' => 'qmmc'),
                        'items' => array(
                            array('label' => Yii::t('App', 'Groups'), 'url' => array('/grupo/admin'), 'visible' => in_array('grupo', $modulos),
                                'items' => array(
                                    array('label' => Yii::t('App', 'Create'), 'url' => array('/grupo/create')),
                                    array('label' => Yii::t('App', 'Manage'), 'url' => array('/grupo/admin')),
                            )),
                            array('label' => Yii::t('App', 'Contacts'), 'url' => array('/contacto/admin'), 'visible' => in_array('contacto', $modulos),
                                'items' => array(
                                    array('label' => Yii::t('App', 'Import CSV'), 'url' => array('/importcsv/default/index')),
                                    array('label' => Yii::t('App', 'Create'), 'url' => array('/contacto/create')),
                                    array('label' => Yii::t('App', 'Manage'), 'url' => array('/contacto/admin')),
                            )),
                            array('label' => 'Enviar SMS', 'url' => array('/envio/admin'), 'visible' => in_array('envio', $modulos), 'items' => array(
                                    array('label' => Yii::t('App', 'Envio Instantaneo'), 'url' => array('/envio/create/?type=1')),
                                    array('label' => Yii::t('App', 'Envio Programado'), 'url' => array('/envio/create/?type=2')),
                                    array('label' => Yii::t('App', 'Conversaciones'), 'url' => array('/conversacion/admin')),


                                ),),
                            array('label' => 'Keywords', 'url' => array('/infosms/admin'), 'visible' => in_array('keywords', $modulos), 'items' => array(
                                    array('label' => Yii::t('App', 'Encuestas'), 'url' => array('/encuesta/admin')),
                                    array('label' => Yii::t('App', 'InfoSMS'), 'url' => array('/infosms/admin/')),
									array('label' => Yii::t('App', 'Variables'), 'url' => array('/varkeywords/admin/')),
                                ),),
                            array('label' => Yii::t('App', 'Administracion'), 'url' => array('#'), 'visible' => in_array('administracion', $modulos),
                                'items' => array(
                                    array('label' => Yii::t('App', 'Estados'), 'url' => array('/estado/admin'),'visible' =>(Yii::app()->user->nivel==1)),
                                    array('label' => Yii::t('App', 'Niveles de Usuario'), 'url' => array('/nivel/admin'),'visible' =>(Yii::app()->user->nivel==1)),
                                    array('label' => Yii::t('App', 'Roles'), 'url' => array('/rol/admin')),
                                    array('label' => Yii::t('App', 'Usuarios'), 'url' => array('/usuario/admin')),
                                    array('label' => Yii::t('App', 'Variables'), 'url' => array('/variable/admin')),
                            )),
                            array('label' => Yii::t('App', 'Report'), 'url' => array('/enviosInstantaneos/admin'), 'visible' => in_array('reportes', $modulos),'items' => array(
                                    array('label' => Yii::t('App', 'Historico de Envios'), 'url' => array('/enviosInstantaneos/admin')),
                                    array('label' => Yii::t('App', 'Envio por Operador'), 'url' => array('/EnviosOperadora/admin'),'visible' =>(Yii::app()->user->nivel<3)),
                                    array('label' => Yii::t('App', 'Conversaciones'), 'url' => array('/conversaciones/admin')),
									array('label' => Yii::t('App', 'Keywords'), 'url' => array('/enviosKeywords/admin')),
                                    array('label' => Yii::t('App', 'Notificaciones'), 'url' => array('/envionotificacion/admin')),
                                )),
                            array('label' => Yii::t('App', 'Contact us'), 'url' => array('/site/contact'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ));
                }
                ?>

            </div>

            <!-- mainmenu -->



        </div>

        <div class="span-20 last">



            <?php if (isset($this->breadcrumbs) && count($this->breadcrumbs) > 0) { ?>

                <div class="blockbread">

                    <div class="breadcrumbleft"></div>

                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink' => CHtml::link('<img src="/images/home.png" style="margin-top: 5px;" alt="breadcrumb" original="/images/home.png">', Yii::app()->homeUrl, array('class' => 'root')),
                        'links' => $this->breadcrumbs,
                        'separator' => '<div class="arrowbread"></div>'
                    ));
                    ?><!-- breadcrumbs -->

                    <div class="breadcrumbright"></div>
                    <?php if (isset($this->menu) && count($this->menu) > 0) { ?>
                        <div class="navgroup2">
                            <ul id="side_nav" class="main-nav">
                                <li class="create">
                                    <a id="createlink" href="javascript:void(0);" class=""><span style="padding-right: 24px;">Operaciones</span></a>
                                    <div id="createdrop" class="d-container" style="display: none; ">
                                        <h3 class="d-top"></h3>
                                        <div class="d-content">
                                            <?php
                                            $this->widget('zii.widgets.CMenu', array(
                                                'id' => 'side_nav',
                                                'items' => $this->menu,
                                                'htmlOptions' => array('class' => 'main-drop clearfix'),
                                            ));
                                            ?>  </div>

                                        <div class="d-bot">
                                            <div class="d-bot-inner"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php
                            $cs = Yii::app()->getClientScript();
                            $cs->registerScript(
                                    "operations", "//Inicializando
                                var constancho=30;
                                $('.d-container').css('left',(constancho+7)*(-1));
                                var ancho=jQuery('#createlink').width()+constancho;
                                $('.d-content').width(ancho);
                                $('.d-bot,.d-top').width(ancho+4);
                                /*
                                jQuery('#createlink').toggle(function () {
                                    $(this).addClass('over');
                                    $('#createdrop').slideDown('medium');
                                },function () {
                                    $('#createdrop').slideUp('fast',function(){
                                        $('#createlink').removeClass('over');
                                    });
                                });*/
                                var timestart=null,over=false;
                                jQuery('#createlink').hover(function(){
                                    clearTimeout(timestart);
                                    over=true;
                                    $(this).addClass('over');
                                    $('#createdrop').slideDown('medium');
                                },function(){
                                    over=false;
                                    timestart=setTimeout(function(){
                                        $('#createdrop').slideUp('fast',function(){
                                            $('#createlink').removeClass('over');
                                        });
                                    },1000);
                                });
                                jQuery('#createdrop').mouseover(function(e){
                                    clearTimeout(timestart);
                                }).mouseout(function(e){
                                    if(!over){
                                        timestart=setTimeout(function(){
                                            $('#createdrop').slideUp('fast',function(){
                                                $('#createlink').removeClass('over');
                                            });
                                        },1000);
                                    }
                                });
                        ", CClientScript::POS_READY
                            );
                            ?>



                        </div><!-- sidebar -->

                    <?php } ?>

                    <div class="clear"></div>

                </div>



            <?php } ?>



            <div id="content">

                <?php echo $content; ?>

            </div><!-- content -->

        </div>

    <?php } else { ?>

        <div id="content">

            <?php echo $content; ?>

        </div><!-- content -->

    <?php } ?>

</div>



<?php $this->endContent(); ?>