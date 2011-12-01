<div class="leftpanel">
    <h1>¿Qué es SMS Empresa?</h1>
    <p>Es una herramienta muy completa y parametrizable, que permitirá a las empresas atender de manera ágil y flexible a sus clientes.
        <br /><br />Brindando excelentes niveles de servicios, soporte e integrando diversas tecnologías.
    </p>
</div>
<div class="rightpanel">
    <h1>Servicios</h1>
    <div class="sub">
        <p><strong>Autogestión Web</strong>
            Los clientes tendrán acceso a una plataforma web, la cual manejará perfiles de usuario y seguridad con control de acceso.
        </p>
        <p><strong>Manejo de Contactos</strong>
            Los usuarios de la aplicación podrán administrar sus contactos, ingresando su información incluyendo números de teléfonos, para luego manejar envíos ya sea
            individuales o masivos, así como agregarlos en grupos.
        </p>
        <p><strong>Manejo de Grupos</strong>
            Los clientes podrán crear, editar y eliminar grupos de manera ordenada. Estos grupos podrán ser usados y administrados a discreción del usuario por el mismo
            a través de la autogestión web.
        </p>
    </div>
    <div class="sub" id="subrigth">
        <p><strong>Envío de Textos Masivos</strong>
            A través de autogestión vía acceso web, los clientes podrán configurar envíos masivos de textos parametrizables por ellos mismos.
        </p>

        <p><strong>Generación de Keywords</strong>
            Permite que los usuarios envíen la palabra clave al short-code indicado para suscribirse a una lista, para participar en concursos, sondeos o encuestas interactivas.
        </p>

        <p><strong>Reportes en Línea</strong>
            La herramienta cuenta con un sistema de confirmación de envío, entrega y error experimentado por cada Operador.<br /><br />
            También cuenta con la facilidad de tener historiales de tráficos ya sean diarios o mensuales, ordenados por Operador.
        </p>
    </div>

</div>
<div class="clear"></div>
<?php
Yii::app()->clientScript->registerCoreScript('jquery');
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/js/jquery.corner.js?v2.11', CClientScript::POS_END);
$cs->registerScript(
        "main", "$('.leftpanel,.rightpanel').corner('5px');", CClientScript::POS_END);
?>