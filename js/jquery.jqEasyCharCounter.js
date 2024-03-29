/* jQuery jqEasyCharCounter plugin
    'maxChars': 50,
    'maxCharsWarning': 40,
    'msgFontSize': '12px',
    'msgFontColor': '#000',
    'msgFontFamily': 'Arial',
    'msgTextAlign': 'left',
    'msgWarningColor': '#F00',
    'msgAppendMethod': 'insertBefore'
 */
 (function(a){a.fn.extend({jqEasyCounter:function(b){return this.each(function(){var f=a(this),e=a.extend({maxChars:100,maxCharsWarning:80,msgFontSize:"12px",msgFontColor:"#000000",msgFontFamily:"Arial",msgTextAlign:"right",msgWarningColor:"#F00",msgAppendMethod:"insertAfter"},b);if(e.maxChars<=0){return}var d=a('<div class="jqEasyCounterMsg">&nbsp;</div>');var c={"font-size":e.msgFontSize,"font-family":e.msgFontFamily,color:e.msgFontColor,"text-align":e.msgTextAlign,width:f.width(),opacity:0};d.css(c);d[e.msgAppendMethod](f);f.bind("keydown keyup keypress",g).bind("focus paste",function(){setTimeout(g,10)}).bind("blur",function(){d.stop().fadeTo("fast",0);return false});function g(){var i=f.val(),h=i.length;if(h>=e.maxChars){i=i.substring(0,e.maxChars)}if(h>e.maxChars){var j=f.scrollTop();f.val(i.substring(0,e.maxChars));f.scrollTop(j)}if(h>=e.maxCharsWarning){d.css({color:e.msgWarningColor})}else{d.css({color:e.msgFontColor})}d.html("Caracteres: "+f.val().length+"/"+e.maxChars);d.stop().fadeTo("fast",1)}})}})})(jQuery);