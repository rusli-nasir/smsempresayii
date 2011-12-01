<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of xmlgenerator
 *
 * @author Irving Medina
 */
class XmlGen {
    public static function generate($arr,$id,$root='messages',$prefix='505'){
        $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><{$root} reg='{$id}'></{$root}>");
$f = create_function('$f,$c,$a','
        foreach($a as $v) {
            if(isset($v["@text"])) {
                $ch = $c->addChild($v["@tag"],$v["@text"]);
            } else {
                $ch = $c->addChild($v["@tag"]);
                if(isset($v["@items"])) {
                    $f($f,$ch,$v["@items"]);
                }
            }
            if(isset($v["@attr"])) {
                foreach($v["@attr"] as $attr => $val) {
                    $ch->addAttribute($attr,$val);
                }
            }
        }');
            $f($f,$xml,$arr);
            $name=sprintf("sms%s.xml",time());
            $filename=sprintf("xml/%s",$name);
            $handle = fopen($filename, "w");
            if($xml->asXML($filename)){
                return $name;
            }
            return "Error al generar el archivo";
    }
}
/**
 * Este es el codigo de ejemplo
 * Cada mensaje a enviarse debe insertarse en el arreglo
 * ///////
 *
 * $messages[]=array('@tag'=>'message','@attr'=>array('id'=>1,'phone'=>'84507107','name'=>'Irving Medina'),'@text'=>'Este es un mensaje de 160 caracteres');
 * $messages[]=array('@tag'=>'message','@attr'=>array('id'=>2,'phone'=>'88693087','name'=>'Marcos Sevilla'),'@text'=>'Este es un mensaje de 160 caracteres');
 * $messages[]=array('@tag'=>'message','@attr'=>array('id'=>3,'phone'=>'84690613','name'=>'Diego Urcuyo'),'@text'=>'Este es un mensaje de 160 caracteres');
 * $messages[]=array('@tag'=>'message','@attr'=>array('id'=>4,'phone'=>'88097397','name'=>'Karina Tijerino'),'@text'=>'Este es un mensaje de 160 caracteres');
 *
 * $url=XmlGen::generate($messages);
 *
 *
 * ////
 * La url es la que se pasara de parametro al servidor de asia
 * /////
 * echo "Archivo generado en <a href='".$url."'>Ver XML</a>";
 */

?>
