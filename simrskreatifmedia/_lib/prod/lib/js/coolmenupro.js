// Title: COOLjsMenuPRO
// URL: http://javascript.cooldev.com/scripts/coolmenupro/
// Version: 2.1.0
// Last Modify: 26 May 2003
// Author: Sergey Nosenko <darknos@cooldev.com>
// Notes: Registration needed to use this script on your web site.
// Copyright (c) 2001-2002 by CoolDev.Com
// Copyright (c) 2001-2002 by Sergey Nosenko
window.CMenus=[];
var BLANK_IMAGE="img/b.gif";
function bw_check(){var is_major=parseInt(navigator.appVersion);this.nver=is_major;this.ver=navigator.appVersion;this.agent=navigator.userAgent;this.dom=document.getElementById?1:0;this.opera=window.opera?1:0;this.ie55=(this.ver.indexOf("MSIE 5.5")>-1&&this.dom&&!this.opera)?1:0;this.ie5=(this.ver.indexOf("MSIE 5")>-1&&this.dom&&!this.ie55&&!this.opera)?1:0;this.ie6=(this.ver.indexOf("MSIE 6")>-1&&this.dom&&!this.opera)?1:0;this.ie4=(document.all&&!this.dom&&!this.opera)?1:0;this.ie=this.ie4||this.ie5||this.ie6;this.mac=this.agent.indexOf("Mac")>-1;this.ns6=(this.dom&&parseInt(this.ver)>=5)?1:0;this.ie3=(this.ver.indexOf("MSIE")&&(is_major<4));this.hotjava=(this.agent.toLowerCase().indexOf('hotjava')!=-1)?1:0;this.ns4=(document.layers&&!this.dom&&!this.hotjava)?1:0;this.bw=(this.ie6||this.ie5||this.ie4||this.ns4||this.ns6||this.opera);this.ver3=(this.hotjava||this.ie3);this.opera7=((this.agent.toLowerCase().indexOf('opera 7')>-1) || (this.agent.toLowerCase().indexOf('opera/7')>-1));this.operaOld=this.opera&&!this.opera7;return this};
function none(){}
function nn(val){return val != null}
function und(val){return typeof(val)=='undefined'}
function COOLjsMenuPRO(name, items){
	this.bw=new bw_check(); this.bi=new Image(); this.bi.src=BLANK_IMAGE;
	if (this.bw.ns4) window.onresize=resizeHandler; window.CMenus[name]=this; window.CMenuHideTimers[name]=null;
	this.name=name; this.rel=items[0].pos=="relative"; this.root=[]; this.root.par=null;this.root.cd=[];
	this.root.fmt=items[0]; this.root.pos=this.rel?[0,0]:items[0].pos; this.root.fmt.pos=this.root.pos;this.root.frameoff=items[0].pos?items[0].pos:[0,0];
	this.items=[];this.root.index=0;this.root.lvl=new CMenuLevel(this, this.root);
	for (var i=1;i<items.length;i++) if (!und(items[i])) new CMenuItem(this, this.root, items[i], und(items[i].format)?items[0]:items[i].format);
	this.drawTop=function(){
		var s="";
		for (var i=0;i<this.items.length;i++) if (this.items[i].par==this.root) s+=this.items[i].draw();
		if (this.rel){
			var w=0; var h=0;
			for (var i=0;i<this.root.cd.length;i++) {
				var n=this.root.cd[i];
				if (n.pos[1]+n.size[0]>h) h=n.pos[1]+n.size[0];
				if (n.pos[0]+n.size[1]>w) w=n.pos[0]+n.size[1];
			}
			s=this.bw.ns4?'<ilayer id="cm'+this.name+'_" >' + s + '</ilayer>':'<div id="cm'+this.name+'_" style="position:relative;left:0px;top:0px;width:'+w+'px;height:'+h+'px;">' + s +'</div>';
		}
		return s;
	};
	this.drawOther=function(){
		var s="";
		for (var i=0;i<this.items.length;i++){
			if (this.items[i].par!=this.root) s+=this.items[i].draw();
			if (this.items[i].lvl!=null)s+=this.items[i].lvl.code;
		}
		s+=this.root.lvl.code;
		return s;
	};
	this.initTop=function(){document.write(this.drawTop())};
	this.init=function(){document.write(this.drawOther())};
	this.hide=function(){
		if (this.root.fmt.popup) 
			this.root.lvl.vis(0);
		else {
			for (var i=0;i<this.root.cd.length;i++) if (this.root.cd[i].lvl) this.root.cd[i].lvl.vis(0);
			this.root.lvl.a=null;
			this.root.lvl.draw();
			if (this.root.fmt.hidden_top) this.root.lvl.vis(0);
		}
	};
	this.mpopup=function(ev,offX,offY){
		var x=ev.pageX?ev.pageX:(this.bw.opera?ev.clientX:this.bw.ie4?ev.clientX+document.body.scrollLeft:ev.x+document.body.scrollLeft);
		var y=ev.pageY?ev.pageY:(this.bw.opera?ev.clientY:this.bw.ie4?ev.clientY+document.body.scrollTop:ev.y+document.body.scrollTop);
		var po=this.root.fmt.popupoff;
		y += offY?offY:po?po[0]:0;
		x += offX?offX:po?po[1]:0;
		this.popup(x, y);
	};
	this.popup=function(x,y){
		this.moveXY(x,y);
		this.root.lvl.a=null;
		this.root.lvl.vis(1);
		mEvent(this.name,0,'t');
		mEvent(this.name,0,'0');
	};
	this.moveXY=function(x,y){
		if (!this.root.pos || this.root.pos[0] != x || this.root.pos[1] != y) {
			this.root.pos=[x,y]; this.root.loff=[0,0]; this.root.ioff=[0,0];
			for (var i=0;i<this.items.length;i++){
				this.items[i].setPosFromParent();
				this.items[i].move(this.items[i].pos[0],this.items[i].pos[1]);
			}
		}
	};
	this.show=function(){
		if (this.rel) this.move();
		this.root.lvl.vis(1)
	};
	this.move=function(){
		if (!this.rel) return;
		this.rel_div=this.rel_div||this.get_div('cm'+this.name+'_');
		var x=this.bw.ns4?this.rel_div.pageX:domPageX(this.rel_div); 
		var y=this.bw.ns4?this.rel_div.pageY:domPageY(this.rel_div);
		if (this.root.pos[0]==x && this.root.pos[1]==y) return;
		this.root.pos=[x,y];
		for (var i=0;i<this.items.length;i++){
			this.items[i].setPosFromParent();
			if (this.items[i].par !== this.root) 
				this.items[i].move(this.items[i].pos[0],this.items[i].pos[1]);
		}
	};
	this.get_div=function (name){return this.bw.ns4?document.layers[name]:document.getElementById?document.getElementById(name):document.all[name]}
}

function CMenuLevel(menu, par){
	this.menu=menu;this.par=par;this.v=0;
	this.code='';
	if((this.menu.bw.ie55||this.menu.bw.ie6)&&(this.par!=this.menu.root||this.menu.root.fmt.popup)){
		var blnk="";
		if(location.protocol=="https:")
			blnk=this.menu.root.fmt.https_fix_blank_doc;
		this.code = "<IFRAME frameborder=0 id=ifr"+this.menu.name+"_"+this.par.index+" src=\""+blnk+"\" scroll=none style=\"FILTER:progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0);visibility:hidden;height:1;position:absolute;width:1px;left:0px;top:0px;z-index:1\"></iframe>";
	}
	this.menu_rect=function(){var r=[65535,65535,0,0];for (i in this.par.cd) {var itm = this.par.cd[i];if (itm.par==this.menu.root || itm.v) {var s=itm.style.shadow;var slt=(s<0?-s:0);var srt=(s>0?s:0);var l=itm.pos[0]-slt;var t=itm.pos[1]-slt;var w=itm.size[1]+itm.pos[0]+srt;var h=itm.size[0]+itm.pos[1]+srt;if(l<r[0])r[0]=l;if(t<r[1])r[1]=t;if(w>r[2])r[2]=w;if(h>r[3])r[3]=h;}} return r;};
	this.fix_form=function(lvl,v){if((this.menu.bw.ie55||this.menu.bw.ie6)&&(this.par!=this.menu.root||this.menu.root.fmt.popup)){this.iframe=this.iframe?this.iframe:this.menu.get_div("ifr"+this.menu.name+"_"+this.par.index);if (v) {var r=this.menu_rect();var st = this.iframe.style;st.left=r[0];st.top=r[1];st.width=Math.abs(r[0]-r[2]);st.height=Math.abs(r[1]-r[3]);this.iframe.style.visibility='visible'; }else this.iframe.style.visibility='hidden';}
		var fmt = this.menu.root.fmt;
		if ((this.menu.bw.ie5||this.menu.bw.ns4||this.menu.bw.operaOld)&&!(lvl==this.menu.root.lvl&&fmt.popup)&&fmt.forms_to_hide) {
			var hide = 0;
			for (var i=0;i<this.menu.root.cd.length;i++){
				var lvl = this.menu.root.cd[i].lvl;
				if (lvl!=null&&lvl.v) hide=1;
			}
			for (var i=0;i<fmt.forms_to_hide.length;i++){
				var frm=fmt.forms_to_hide[i];
				var frmobj=this.menu.bw.ns4?document.layers[frm]:document.getElementById?document.getElementById(frm):document.all[frm];
				if (this.menu.bw.ns4) frmobj.style=frmobj;
				if (frmobj&&frmobj.style) {
					if (hide) 
						frmobj.style.visibility=this.menu.bw.ns4?'hide':'hidden';
					else
						frmobj.style.visibility=this.menu.bw.ns4?'show':'visible';
				}
			}
		}
	
	};
	this.vis=function(s){
		if (s&&this.menu.root.lvl!=this&&this.menu.rel) {this.menu.move()};
		var ss=this.v;
		this.v=s; var l=this.par.cd.length;
		if (this.menu.onlevelshow) this.menu.onlevelshow(this);
		for (var i=0;i<l;i++){
			var n=this.par.cd[i];
			if ( n.hc() && n.lvl.v && !s ) n.lvl.vis(s);
				n.vis(s);
		}
		if (!s) this.a=null;
		if (this.v!=ss&&this.menu.onlevelshow) this.menu.onlevelshow(this);
		this.fix_form(this, this.v);

	};
	this.setA=function(idx,s){
		var n=this.menu.items[idx];
		if (nn(this.a)&&n.par.lvl!=this.a.par.lvl) return;
		if(s&&n.hc())n.lvl.vis(1);
		if( s && n!= this.a && nn(this.a) && this.a.hc() && this.a.lvl.v ) this.a.lvl.vis(0);
		this.a=n;
		this.draw()
	};
	this.draw=function(){if (this.menu.root.lvl==this&&this.menu.root.fmt.hidden_top) return;for (var i=0;i<this.par.cd.length;i++) if (this.par.cd[i]==this.a) this.par.cd[i].setVis('o'); else this.par.cd[i].setVis('n')}
}

function CMenuItem(menu, par, item, format){
	if (und(item)) return;
	this.lvl=null;this.par=par;this.code=item.code; this.ocode=item.ocode || item.code;
	this.targ=und(item.target)?"":'target="'+item.target+'" ';this.url=und(item.url)?"javascript:none()":item.url;
	this.fmt=format;this.menu=menu;this.bw=menu.bw;this.cd=[];this.divs=[];this.index=menu.items.length;menu.items=menu.items.concat([this]);this.pindex=par.cd.length;
	par.cd=par.cd.concat([this]);this.id="cmi"+this.menu.name+"_"+this.index;this.v=0;this.state='n';
	this.diva=["b","s","o","n","e"];this.v=0;
	this.hc=function(){return this.cd.length > 0}; 
	this.hac=function(){return this.hc()&&this.cd[0].vis}; 
	this.div=function(n){return und(this.divs[n])?this.divs[n]=this.get_div(this.id+n):this.divs[n]};
	this.gen_code=function(state, off){
		var res='';
		var table=(nn(this.arrow) && this.hc()) || nn(this.image);
		var image=nn(this.image);
		var arrow=nn(this.arrow)&& this.hc();
		if (table) res += '<table cellpadding=0 cellspacing=0 width="100%" height="'+(parseInt(this.size[0])-parseInt(off))+'" border=0><tr>';															
		if (image) res += '<td bgcolor="'+(state=='n'?this.style.color.imagebg:this.style.color.oimagebg)+'" width='+this.imgsize[1]+'><img src="'+(state=='n'?this.image:this.oimage)+'" width='+this.imgsize[1]+' height='+this.imgsize[0]+'></td>';
		if (table) res += '<td width="100%">';
		res += '<div class="'+(state=='n'?this.style.css.ON:this.style.css.OVER)+'">'+(state=='n'?this.code:this.ocode)+'</div>';
		if (table) res += '</td>';
		if (arrow) res += '<td width='+this.arrsize[1]+'><img src="'+(state=='n'?this.arrow:this.oarrow)+'" width='+this.arrsize[1]+' height='+this.arrsize[0]+'></td>';
		if (table) res += '</tr></table>';
		return res;
	};
	this.draw=function(){	
		var bl=bt=this.style.border;
		var br=bb=this.style.border*2;
		if (this.style.border && !und(this.style.borders)) {
			bl=this.style.borders[0];
			bt=this.style.borders[1];
			br=this.style.borders[2]+bl;
			bb=this.style.borders[3]+bt;
		}
		var s=this.style.shadow;
		var z=(!this.style.shadow?"":adiv(this.menu.bw, this.id+"s", this.z+1, this.pos[0]+s, this.pos[1]+s, this.size[1], this.size[0], this.style.color.shadow, "", ""))+
				(!this.style.border?"":adiv(this.menu.bw, this.id+"b", this.z+2, this.pos[0], this.pos[1], this.size[1], this.size[0], this.style.color.border, "", ""))+
				adiv(this.menu.bw, this.id+"n", this.z+3, this.pos[0]+bl, this.pos[1]+bt, this.size[1]-br, this.size[0]-bb, this.style.color.bgON, this.gen_code('n', parseInt(bt)+parseInt(bb)))+
				adiv(this.menu.bw, this.id+"o", this.z+4, this.pos[0]+bl, this.pos[1]+bt, this.size[1]-br, this.size[0]-bb, this.style.color.bgOVER,this.gen_code('o', bt+bb))+
				adiv(this.menu.bw, this.id+"e", this.z+5, this.pos[0]+bl, this.pos[1]+bt, this.size[1]-br, this.size[0]-bb, "", '<a href="'+this.url+'" '+this.targ+'onclick="mEvent(\''+this.menu.name+'\','+this.index+',\'c\');">'+'<img src="'+this.menu.bi.src+'" width="'+this.size[1]+'" height="'+this.size[0]+'" border="0"></a>','','onmouseover="mEvent(\''+this.menu.name+'\','+this.index+',\'o\');" onmouseout="mEvent(\''+this.menu.name+'\','+this.index+',\'t\');"');
		return z;
	};
	this.vis=function(s){
			if (this.style.shadow) this.visDiv("s",s);
			if (this.style.border) this.visDiv("b",s);
			if (!s) {
				this.visDiv("o",0);
				this.visDiv("n",0);
				this.state="n";
			}else if (this.state=="n")
				this.visDiv("n",1);
			else 
				this.visDiv("o",1);
			this.visDiv("e",s);
			this.v=s;
	};
	this.setVis = function (n){
		if (this.state!=n)
			switch (n){
				case "n":
					this.visDiv("n",1);this.visDiv("o",0);
					break;
				case "o":
					this.visDiv("n",0);this.visDiv("o",1);
					break;
			}
		this.state=n;
	};
	this.visDiv=this.bw.ns4? visDivNS:visDivDom;
	this.getf=function(obj, name){
		if (!und(obj) && nn(obj) && !und(obj.fmt)) {
			if (!und(obj.fmt[name]))
				return obj.fmt[name];
			if (obj.par!=this.menu.root && obj.par && obj.par.sub && obj.par.sub[0][name]) 
				return obj.par.sub[0][name];
			return this.getf(obj.par, name);
		}
		return;
	};
	this.ioff=this.getf(this, "itemoff");
	this.loff=this.getf(this, "leveloff");
	this.imgsize=this.getf(this, "imgsize");
	this.arrsize=this.getf(this, "arrsize");
	this.image=this.getf(this, "image");
	this.oimage=this.getf(this, "oimage") || this.image;
	this.arrow=this.getf(this, "arrow");
	this.oarrow=this.getf(this, "oarrow") || this.arrow;
	this.style=this.getf(this, "style");
	this.size=this.getf(this, "size");
	if (this.par==this.menu.root) this.fmt.pos=this.getf(this, "pos");
	this.prev=this.pindex==0? null : this.par.cd[this.pindex-1];
	this.setPos=function(){
		if (this.prev==null){
			this.z=this.par==this.menu.root? 10: this.par.z+10;
			this.pos=und(this.fmt.pos)?(this.par==this.menu.root? this.fmt.pos : this.pos=[this.par.pos[0]+this.loff[1], this.par.pos[1]+this.loff[0]]):this.fmt.pos;
		}else{
			this.prev.next=this;
			this.z=this.prev.z;
			this.pos=[this.prev.pos[0]+this.ioff[1], this.prev.pos[1]+this.ioff[0]];
		}
	};
	this.setPosFromParent=function(){
		if (this.index==0&&!this.menu.rel) {
			this.pos=[this.menu.root.pos[0], this.menu.root.pos[1]]
		} else 
		if (this.prev==null){
			this.pos=[this.par.pos[0]+this.loff[1], this.par.pos[1]+this.loff[0]];
		}else{
			this.pos=[this.prev.pos[0]+this.ioff[1], this.prev.pos[1]+this.ioff[0]];
		}
	};
	this.setPos();
	this.sub=item.sub;
	if (!und(this.sub) && !und(this.sub.length)&& this.sub.length>0){
		this.lvl=new CMenuLevel(menu, this);
		for (var i=1;i<this.sub.length;i++)
			if (!und(this.sub[i])) new CMenuItem(this.menu, this, this.sub[i], und(this.sub[i].format)?this.sub[0]: this.sub[i].format);
	};
	this.get_div=function (name){
		if (this.bw.ns4 && this.menu.rel && this.par==this.menu.root) 
			return document.layers["cm"+this.menu.name+"_"].layers[name];
		else
			return this.bw.ns4?document.layers[name]:document.getElementById?document.getElementById(name):document.all[name];
	};
	this.move=function( x, y ){
		var bl=bt=this.style.border;
		if (this.style.border && !und(this.style.borders)) {
			bl=this.style.borders[0];
			bt=this.style.borders[1];
		}
		if (this.style.shadow) this.moveTo(x+parseInt(this.style.shadow),y+parseInt(this.style.shadow),"s");
		if (this.style.border) this.moveTo(x,y,"b");
		this.moveTo(x+bl,y+bt,"o");
		this.moveTo(x+bl,y+bt,"n");
		this.moveTo(x+bl,y+bt,"e");
	};
	this.moveTo=function( x, y, b ){
		if (this.bw.ns4)
			this.div(b).moveTo(x,y);
		else{
			this.div(b).style.left=x;
			this.div(b).style.top=y;
		}
	};
	return this;
}
function adiv(bw,name,z,left,top,width,height,bgc,code,otherCSS, otherDIV){
	return bw.ns4?
		'<layer id="'+name+'" z-index="'+z+'" left="'+left+'" top='+top+'" width="'+width+'" height="'+height+'"'+(bgc!=""?' bgcolor="'+bgc+'"':'')+(otherCSS?' style="'+otherCSS:'')+'" visibility="hidden" '+(otherDIV?otherDIV:'')+'>'+code+'</layer>\n':
		'<div id="'+name+'" style="position:absolute;clip:rect(0px '+width+'px '+height+'px 0px);z-index:'+z+';left:'+left+'px;top:'+top+'px;width:'+width+'px;height:'+height+'px;visibility:hidden'+(bgc!=""?';background-color:'+bgc+'':'')+';'+(otherCSS?otherCSS:'')+'" '+(otherDIV?otherDIV:'')+'>'+code+'</div>';
}
function visDivNS(d,s){this.div(d).visibility=s?'show':'hide'}
function visDivDom(d,s){this.div(d).style.visibility=s?'visible': 'hidden'}
function mEvent(m,node_index,e) {
	if (nn(window.CMenuHideTimers[m])) {
		window.clearTimeout(window.CMenuHideTimers[m]);
		window.CMenuHideTimers[m]=null;
	}
	switch (e){
		case "o": 
			window.CMenus[m].items[node_index].par.lvl.setA(node_index,1);
			if (window.CMenus[m].onmouseover) window.CMenus[m].onmouseover(window.CMenus[m].items[node_index]);
			break;
		case "c":
			if (window.CMenus[m].items[node_index].hc()) 
				window.CMenus[m].items[node_index].lvl.vis(!window.CMenus[m].items[node_index].lvl.v);
			else
				for (var i=0;i<window.CMenus[m].root.cd.length;i++)
					if (nn(window.CMenus[m].root.cd[i].lvl)) window.CMenus[m].root.cd[i].lvl.vis(0);
			if (window.CMenus[m].onclick) window.CMenus[m].onclick(window.CMenus[m].items[node_index]);
			break;
		case "t": 
			window.CMenuHideTimers[m]=setTimeout('window.CMenus["'+m+'"].hide()', und(window.CMenus[m].root.fmt.delay)?600:window.CMenus[m].root.fmt.delay);
			if (window.CMenus[m].onmouseout) window.CMenus[m].onmouseout(window.CMenus[m].items[node_index]);
			break;
	}
	return true;
}
function domPageX(el) {
  var x=el.offsetLeft;
  var parent=el.offsetParent;
  while(parent && parent!=document.body) {
	x += parent.offsetLeft;
	parent=parent.offsetParent;
  }
  return x;
}
function domPageY(el) {
  var x=el.offsetTop;
  var parent=el.offsetParent;
  while(parent && parent!=document.body) {
	x += parent.offsetTop;
	parent=parent.offsetParent;
  }
  return x;
}
if (und(window.CMenuHideTimers)) window.CMenuHideTimers=[];
window.oldCMOnLoad=window.onload;
function CMOnLoad(){
	var bw=new bw_check();
	if (bw.operaOld)window.operaResizeTimer=setTimeout('resizeHandler()',1000);
	if (typeof(window.oldCMOnLoad)=='function') window.oldCMOnLoad();
	if (bw.ns4) window.onresize=resizeHandler;
}
window.onload=new CMOnLoad();
function resizeHandler() {
	if (window.reloading) return;
	if (!window.origWidth){
		window.origWidth=window.innerWidth;
		window.origHeight=window.innerHeight;
	}
	var reload=window.innerWidth != window.origWidth || window.innerHeight != window.origHeight;
	window.origWidth=window.innerWidth;window.origHeight=window.innerHeight;
	if (window.operaResizeTimer)clearTimeout(window.operaResizeTimer);
	if (reload) {window.reloading=1;document.location.reload();return};
	if (new bw_check().operaOld){window.operaResizeTimer=setTimeout('resizeHandler()',500)};
}
function CMenuPopUp(menu, evn, offX, offY){window.CMenus[menu].mpopup(evn, offX, offY)}
function CMenuPopUpXY(menu,x,y){window.CMenus[menu].popup(x,y)}
