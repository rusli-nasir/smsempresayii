<? $pdf = Yii::createComponent('application.extensions.MPDF53.mpdf');
$dataProvider = $_SESSION['datos_filtrados']->getData();
$contador=count($dataProvider);
$html.='
<style>
/* roScripts
Table Design by Mihalcea Romeo
www.roscripts.com
----------------------------------------------- */

table {
		border-collapse:collapse;
		background:#EFF4FB url(http://www.roscripts.com/images/teaser.gif) repeat-x;
		border-left:1px solid #686868;
		border-right:1px solid #686868;
		font:0.8em/145% \'Trebuchet MS\',helvetica,arial,verdana;
		color: #333;
}

td, th {
		padding:5px;
}

caption {
		padding: 0 0 .5em 0;
		text-align: left;
		font-size: 1.4em;
		font-weight: bold;
		text-transform: uppercase;
		color: #333;
		background: transparent;
}

/* =links
----------------------------------------------- */

table a {
		color:#950000;
		text-decoration:none;
}

table a:link {}

table a:visited {
		font-weight:normal;
		color:#666;
		text-decoration: line-through;
}

table a:hover {
		border-bottom: 1px dashed #bbb;
}

/* =head =foot
----------------------------------------------- */

thead th, tfoot th, tfoot td {
		background:#333 url(http://www.roscripts.com/images/llsh.gif) repeat-x;
		color:#fff
}

tfoot td {
		text-align:right
}

/* =body
----------------------------------------------- */

tbody th, tbody td {
		border-bottom: dotted 1px #333;
}

tbody th {
		white-space: nowrap;
}

tbody th a {
		color:#333;
}

.odd {}

tbody tr:hover {
		background:#fafafa
}
</style>
<div style="width:100%; text-align:center; font-family:\'MS Serif\', \'New York\', serif"><h2>Envíos por Operadora</h2></div>
<br />
Total Resultados: '.$contador.'
<table class="detail-view2" repeat_header="1" cellpadding="1" cellspacing="1"
width="100%" border="0" style="font-size:16px">
<thead>
<tr class="principal">
<th class="principal" width="7%">&nbsp;FECHA</td>';

if(isset(Yii::app()->user->nivel) && Yii::app()->user->nivel==2){
	if(Yii::app()->user->dependid==1){
		$html.='<th class="principal" width="7%">&nbsp;MOVISTAR</td>';
	}
	else{
		if(Yii::app()->user->dependid==2){
			$html.='<th class="principal" width="19%">&nbsp;CLARO</td>';
		}
	}
}
else{
	$html.='<th class="principal" width="7%">&nbsp;MOVISTAR</td>
<th class="principal" width="19%">&nbsp;CLARO</td>
</tr>
</thead>';
}

$i=0;
$val=count($dataProvider);
while($i<$val){
$html.='
<tr class="odd" style="font-size:12px">
<td class="odd" width="7%" align="center">&nbsp;'.$dataProvider[$i]
["fecha"].'</td>';

if(isset(Yii::app()->user->nivel) && Yii::app()->user->nivel==2){
	if(Yii::app()->user->dependid==1){
		$html.='<td class="odd" width="7%" align="center">&nbsp;'.$dataProvider[$i]
["Movistar"].'</td>';
	}
	else{
		if(Yii::app()->user->dependid==2){
			$html.='<td class="odd" width="19%" align="center">&nbsp;'.$dataProvider[$i]
["Claro"].'</td>';
		}
	}
}
else{
	$html.='<td class="odd" width="7%" align="center">&nbsp;'.$dataProvider[$i]
["Movistar"].'</td>
<td class="odd" width="19%" align="center">&nbsp;'.$dataProvider[$i]
["Claro"].'</td>';
$html.='</tr>';
}


$i++;
}
if(isset(Yii::app()->user->nivel) && Yii::app()->user->nivel==2){
	$html.='<tfoot><tr><th scope="row">Total</th><td>'.$contador.' registros</td></tr></tfoot></table>';
}
else{
$html.='<tfoot><tr><th scope="row">Total</th><td colspan="2">'.$contador.' registros</td></tr></tfoot></table>';
}
$mpdf=new mPDF('win-1252','LETTER-L','','',9,9,24,10,5,5);
$mpdf->WriteHTML($html);
$mpdf->Output('Reporte_Envíos_Operadora.pdf','D');
exit; ?>