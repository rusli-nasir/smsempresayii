Prototip.start();
CoolSpotters.Nav2=Class.create();
CoolSpotters.Nav2.prototype={
    mainMenuTimeoutId:0,
    isOpen:false,
    menuId:null,
    initialize:function(){
        var menu1=$("main_nav");
        menu1.cleanWhitespace();
        menu1.childElements().each(function(elem){
            var li=elem;
            elem.identify();
            var menu_item=elem.down('.d-carrot');
            var menu_dropdown=elem.down().next();
            this.setClickEvents(li,menu_item,menu_dropdown);
        },this);
        var menu2=$("side_nav");
        menu2.cleanWhitespace();
        menu2.childElements().each(function(elem){
            var li=elem;
            var menu_item=elem.down();
            var menu_dropdown=elem.down().next();
            this.setEvents(li,menu_item,menu_dropdown);
            var offset_x=-(menu_dropdown.getDimensions().width-menu_item.getDimensions().width);
            menu_dropdown.setStyle({
                left:offset_x+'px'
                });
        },this);
        if($("user_nav")){
            var menu3=$("user_nav");
            menu3.cleanWhitespace();
            menu3.childElements().each(function(elem){
                var li=elem;
                elem.identify();
                var menu_item=elem.down('.d-carrot');
                var menu_dropdown=elem.down().next();
                if(menu_item!=null&&menu_dropdown!=null){
                    this.setClickEvents(li,menu_item,menu_dropdown);
                }
            },this);
    }
    Event.observe(document,"click",this.clearAll.bind(this));
},
setEvents:function(li,menu_item,menu_dropdown){
    Event.observe($(menu_item),"mouseover",this.menuRoll.bindAsEventListener(this,"in",$(li),$(menu_item),$(menu_dropdown),true));
    Event.observe($(menu_item),"mouseout",this.menuRoll.bindAsEventListener(this,"out",$(li),$(menu_item),$(menu_dropdown),false));
    Event.observe($(menu_dropdown),"mouseover",this.menuRoll.bindAsEventListener(this,"in",$(li),$(menu_item),$(menu_dropdown),false));
    Event.observe($(menu_dropdown),"mouseout",this.menuRoll.bindAsEventListener(this,"out",$(li),$(menu_item),$(menu_dropdown),false));
},
setClickEvents:function(li,menu_item,menu_dropdown){
    Event.observe($(menu_item),"click",this.tagRoll.bindAsEventListener(this,"in",$(li),$(menu_item).up(),$(menu_dropdown),false,true));
},
menuRoll:function(e,mode,li,link,menu,isMenuItem,animate){
    e.stop();
    var eventMenuId=Event.element(e).up('li').id;
    if(mode=="in"){
        if(eventMenuId!=this.menuId){
            this.clearAll(false,menu);
        }
        clearTimeout(this.mainMenuTimeoutId);
        this.showDrop(link,menu,animate,eventMenuId);
    }else if(mode=="out"){
        this.hideDrop(link,menu,animate);
    }
    return false;
},
tagRoll:function(e,mode,li,link,menu,isMenuItem,animate){
    e.stop();
    var eventMenuId=Event.element(e).up('li').id;
    if(mode=="in"){
        if(eventMenuId!=this.menuId){
            this.clearAll(false,menu);
        }
        clearTimeout(this.mainMenuTimeoutId);
        if(!this.isOpen&&e.type=="click"){
            this.showDrop(link,menu,animate,eventMenuId);
        }else if(this.isOpen&&e.type=="click"){
            this.hideDrop(link,menu,animate,eventMenuId);
        }else{
            this.showDrop(link,menu,animate,eventMenuId);
        }
    }else if(mode=="out"){
    this.hideDrop(link,menu,animate);
}
return false;
},
showDrop:function(link,menu,animate,id){
    $(link).addClassName("over");
    if(animate){
        $(menu).appear({
            duration:0.1
        });
    }else{
        $(menu).show();
    }
    this.isOpen=true;
    this.menuId=id;
},
hideDrop:function(link,menu,animate,id){
    clearTimeout(this.mainMenuTimeoutId);
    animate=false;
    if(animate){
        $(menu).fade({
            duration:0.1
        });
    }else{
        $(menu).hide();
    }
    $(link).removeClassName("over");
    this.isOpen=false;
},
clearAll:function(e,menu){
    var menu1=$("main_nav");
    menu1.cleanWhitespace();
    menu1.childElements().each(function(elem){
        var menu_item=elem.down();
        var menu_dropdown=elem.down().next();
        if(menu_dropdown){
            if(menu!=menu_dropdown){
                this.hideDrop(menu_item,menu_dropdown,true);
            }
        }
    },this);
if($("user_nav")){
    var menu3=$("user_nav");
    menu3.cleanWhitespace();
    menu3.childElements().each(function(elem){
        var menu_item=elem.down();
        var menu_dropdown=elem.down().next();
        if(menu_dropdown){
            if(menu!=menu_dropdown){
                this.hideDrop(menu_item,menu_dropdown,true);
            }
        }
    },this);
}
}
};
