/*
 * PROJECT:   mygosuMenu
 * VERSION:   1.1.6
 * COPYRIGHT: (c) 2003,2004 Cezary Tomczak
 * LINK:      http://gosu.pl/dhtml/mygosumenu.html
 * LICENSE:   BSD (revised)
 */
function DropDownMenuX(id){this.type="horizontal";this.delay={"show":0,"hide":400}
this.position={"level1":{"top":0,"left":0},"levelX":{"top":0,"left":0}}
this.fixIeSelectBoxBug=true;this.zIndex={"visible":500,"hidden":-1};this.browser={"ie":Boolean(document.body.currentStyle),"ie5":(navigator.appVersion.indexOf("MSIE 5.5")!=-1||navigator.appVersion.indexOf("MSIE 5.0")!=-1),"ie6":(navigator.appVersion.indexOf("MSIE 6.0")!=-1)};if(!this.browser.ie){this.browser.ie5=false;this.browser.ie6=false;}
this.init=function(){if(!document.getElementById(this.id)){return alert("DropDownMenuX.init() failed. Element '"+this.id+"' does not exist.");}
if(this.type!="horizontal"&&this.type!="vertical"){return alert("DropDownMenuX.init() failed. Unknown menu type: '"+this.type+"'");}
if(this.browser.ie&&this.browser.ie5){fixWrap();}
fixSections();parse(document.getElementById(this.id).childNodes,this.tree,this.id);}
function fixSections(){var arr=document.getElementById(self.id).getElementsByTagName("div");var sections=new Array();var widths=new Array();for(var i=0;i<arr.length;i++){if(arr[i].className=="section"){sections.push(arr[i]);}}
for(vari=0;i<sections.length;i++){widths.push(getMaxWidth(sections[i].childNodes));}
for(vari=0;i<sections.length;i++){sections[i].style.width=(widths[i])+"px";}
if(self.browser.ie){for(vari=0;i<sections.length;i++){setMaxWidth(sections[i].childNodes,widths[i]);}}}
function fixWrap(){var elements=document.getElementById(self.id).getElementsByTagName("a");for(var i=0;i<elements.length;i++){if(/item2/.test(elements[i].className)){elements[i].innerHTML='<div nowrap="nowrap">'+elements[i].innerHTML+'</div>';}}}
function getMaxWidth(nodes){var maxWidth=0;for(var i=0;i<nodes.length;i++){if(nodes[i].nodeType!=1||/section/.test(nodes[i].className)){continue;}
if(nodes[i].offsetWidth>maxWidth){maxWidth=nodes[i].offsetWidth;}}
return maxWidth;}
function setMaxWidth(nodes,maxWidth){for(var i=0;i<nodes.length;i++){if(nodes[i].nodeType==1&&/item2/.test(nodes[i].className)&&nodes[i].currentStyle){if(self.browser.ie5){nodes[i].style.width=(maxWidth)+"px";}else{nodes[i].style.width=(maxWidth-parseInt(nodes[i].currentStyle.paddingLeft)-parseInt(nodes[i].currentStyle.paddingRight))+"px";}}}}
function parse(nodes,tree,id){for(var i=0;i<nodes.length;i++){if(1!=nodes[i].nodeType){continue;}
switch(true){case/\bitem1\b/.test(nodes[i].className):nodes[i].id=id+"-"+tree.length;tree.push(new Array());nodes[i].onmouseover=itemOver;nodes[i].onmouseout=itemOut;break;case/\bitem2\b/.test(nodes[i].className):nodes[i].id=id+"-"+tree.length;tree.push(new Array());nodes[i].onmouseover=itemOver;nodes[i].onmouseout=itemOut;break;case/\bsection\b/.test(nodes[i].className):nodes[i].id=id+"-"+(tree.length-1)+"-section";nodes[i].onmouseover=sectionOver;nodes[i].onmouseout=sectionOut;var box1=document.getElementById(id+"-"+(tree.length-1));var box2=document.getElementById(nodes[i].id);var el=new Element(box1.id);if(1==el.level){if("horizontal"==self.type){box2.style.top=box1.offsetTop+box1.offsetHeight+self.position.level1.top+"px";if(self.browser.ie5){box2.style.left=self.position.level1.left+"px";}else{box2.style.left=box1.offsetLeft+self.position.level1.left+"px";}}else if("vertical"==self.type){box2.style.top=box1.offsetTop+self.position.level1.top+"px";if(self.browser.ie5){box2.style.left=box1.offsetWidth+self.position.level1.left+"px";}else{box2.style.left=box1.offsetLeft+box1.offsetWidth+self.position.level1.left+"px";}}}else{box2.style.top=box1.offsetTop+self.position.levelX.top+"px";box2.style.left=box1.offsetLeft+box1.offsetWidth+self.position.levelX.left+"px";}
self.sections.push(nodes[i].id);self.sectionsShowCnt.push(0);self.sectionsHideCnt.push(0);if(self.fixIeSelectBoxBug&&self.browser.ie6){nodes[i].innerHTML=nodes[i].innerHTML+'<iframe id="'+nodes[i].id+'-iframe" src="javascript:false;" scrolling="no" frameborder="0" style="position: absolute; top: 0px; left: 0px; display: none; filter:alpha(opacity=0);"></iframe>';}
break;}
if(nodes[i].childNodes){if(/\bsection\b/.test(nodes[i].className)){parse(nodes[i].childNodes,tree[tree.length-1],id+"-"+(tree.length-1));}else{parse(nodes[i].childNodes,tree,id);}}}}
function itemOver(){self.itemShowCnt++;var id_section=this.id+"-section";if(self.visible.length){var el=new Element(self.visible.getLast());el=document.getElementById(el.getParent().id);if(/item\d-active/.test(el.className)){el.className=el.className.replace(/(item\d)-active/,"$1");}}
if(self.sections.contains(id_section)){clearTimers();self.sectionsHideCnt[self.sections.indexOf(id_section)]++;var cnt=self.sectionsShowCnt[self.sections.indexOf(id_section)];var timerId=setTimeout(function(a,b){return function(){self.showSection(a,b);}}(id_section,cnt),self.delay.show);self.timers.push(timerId);}else{if(self.visible.length){clearTimers();var timerId=setTimeout(function(a,b){return function(){self.showItem(a,b);}}(this.id,self.itemShowCnt),self.delay.show);self.timers.push(timerId);}}}
function itemOut(){self.itemShowCnt++;var id_section=this.id+"-section";if(self.sections.contains(id_section)){self.sectionsShowCnt[self.sections.indexOf(id_section)]++;if(self.visible.contains(id_section)){var cnt=self.sectionsHideCnt[self.sections.indexOf(id_section)];var timerId=setTimeout(function(a,b){return function(){self.hideSection(a,b);}}(id_section,cnt),self.delay.hide);self.timers.push(timerId);}}}
function sectionOver(){self.sectionsHideCnt[self.sections.indexOf(this.id)]++;var el=new Element(this.id);var parent=document.getElementById(el.getParent().id);if(!/item\d-active/.test(parent.className)){parent.className=parent.className.replace(/(item\d)/,"$1-active");}}
function sectionOut(){self.sectionsShowCnt[self.sections.indexOf(this.id)]++;var cnt=self.sectionsHideCnt[self.sections.indexOf(this.id)];var timerId=setTimeout(function(a,b){return function(){self.hideSection(a,b);}}(this.id,cnt),self.delay.hide);self.timers.push(timerId);}
this.showSection=function(id,cnt){if(typeof cnt!="undefined"){if(cnt!=this.sectionsShowCnt[this.sections.indexOf(id)]){return;}}
this.sectionsShowCnt[this.sections.indexOf(id)]++;if(this.visible.length){if(id==this.visible.getLast()){return;}
var el=new Element(id);var parents=el.getParentSections();for(var i=this.visible.length-1;i>=0;i--){if(parents.contains(this.visible[i])){break;}else{this.hideSection(this.visible[i]);}}}
var el=new Element(id);var parent=document.getElementById(el.getParent().id);if(!/item\d-active/.test(parent.className)){parent.className=parent.className.replace(/(item\d)/,"$1-active");}
if(document.all){document.getElementById(id).style.display="block";}
document.getElementById(id).style.visibility="visible";document.getElementById(id).style.zIndex=this.zIndex.visible;if(this.fixIeSelectBoxBug&&this.browser.ie6){var div=document.getElementById(id);var iframe=document.getElementById(id+"-iframe");iframe.style.width=div.offsetWidth+parseInt(div.currentStyle.borderLeftWidth)+parseInt(div.currentStyle.borderRightWidth);iframe.style.height=div.offsetHeight+parseInt(div.currentStyle.borderTopWidth)+parseInt(div.currentStyle.borderBottomWidth);iframe.style.top=-parseInt(div.currentStyle.borderTopWidth);iframe.style.left=-parseInt(div.currentStyle.borderLeftWidth);iframe.style.zIndex=div.style.zIndex-1;iframe.style.display="block";}
this.visible.push(id);}
this.showItem=function(id,cnt){if(typeof cnt!="undefined"){if(cnt!=this.itemShowCnt){return;}}
this.itemShowCnt++;if(this.visible.length){var el=new Element(id+"-section");var parents=el.getParentSections();for(var i=this.visible.length-1;i>=0;i--){if(parents.contains(this.visible[i])){break;}else{this.hideSection(this.visible[i]);}}}}
this.hideSection=function(id,cnt){if(typeof cnt!="undefined"){if(cnt!=this.sectionsHideCnt[this.sections.indexOf(id)]){return;}
if(id==this.visible.getLast()){for(var i=this.visible.length-1;i>=0;i--){this.hideSection(this.visible[i]);}
return;}}
var el=new Element(id);var parent=document.getElementById(el.getParent().id);if(/item\d-active/.test(parent.className)){parent.className=parent.className.replace(/(item\d)-active/,"$1");}
document.getElementById(id).style.zIndex=this.zIndex.hidden;document.getElementById(id).style.visibility="hidden";if(document.all){document.getElementById(id).style.display="none";}
if(this.fixIeSelectBoxBug&&this.browser.ie6){var iframe=document.getElementById(id+"-iframe");iframe.style.display="none";}
if(this.visible.contains(id)){if(id==this.visible.getLast()){this.visible.pop();}else{return;}}else{return;}
this.sectionsHideCnt[this.sections.indexOf(id)]++;}
function Element(id){this.menu=self;this.id=id;this.getLevel=function(){var s=this.id.substr(this.menu.id.length);return s.substrCount("-");}
this.getParent=function(){var s=this.id.substr(this.menu.id.length);var a=s.split("-");a.pop();return new Element(this.menu.id+a.join("-"));}
this.hasParent=function(){var s=this.id.substr(this.menu.id.length);var a=s.split("-");return a.length>2;}
this.hasChilds=function(){return Boolean(document.getElementById(this.id+"-section"));}
this.getParentSections=function(){var s=this.id.substr(this.menu.id.length);s=s.substr(0,s.length-"-section".length);var a=s.split("-");a.shift();a.pop();var s=this.menu.id;var parents=[];for(var i=0;i<a.length;i++){s+=("-"+a[i]);parents.push(s+"-section");}
return parents;}
this.level=this.getLevel();}
function clearTimers(){for(var i=self.timers.length-1;i>=0;i--){clearTimeout(self.timers[i]);self.timers.pop();}}
var self=this;this.id=id;this.tree=[];this.sections=[];this.sectionsShowCnt=[];this.sectionsHideCnt=[];this.itemShowCnt=0;this.timers=[];this.visible=[];}
if(typeof Array.prototype.indexOf=="undefined"){Array.prototype.indexOf=function(item){for(var i=0;i<this.length;i++){if(this[i]===item){return i;}}return-1;}}
if(typeof Array.prototype.contains=="undefined"){Array.prototype.contains=function(s){for(var i=0;i<this.length;i++){if(this[i]===s){return true;}}return false;}}
if(typeof String.prototype.substrCount=="undefined"){String.prototype.substrCount=function(s){return this.split(s).length-1;}}
if(typeof Array.prototype.getLast=="undefined"){Array.prototype.getLast=function(){return this[this.length-1];}}
function ChangeLayer(value,id){var el=document.getElementById(id+"_max");if(value==0){el.style.visibility='hidden';el.value="";}else{el.style.visibility='visible';}}
/**
 * JsHttpRequest: JavaScript "AJAX" data loader (script support only!)
 * Minimized version: see debug directory for the complete one.
 *
 * @license LGPL
 * @author Dmitry Koterov, http://en.dklab.ru/lib/JsHttpRequest/
 * @version 5.x $Id$
 */
function JsHttpRequest(){
var t=this;
t.onreadystatechange=null;
t.readyState=0;
t.responseText=null;
t.responseXML=null;
t.status=200;
t.statusText="OK";
t.responseJS=null;
t.caching=false;
t.loader=null;
t.session_name="PHPSESSID";
t._ldObj=null;
t._reqHeaders=[];
t._openArgs=null;
t._errors={inv_form_el:"Invalid FORM element detected: name=%, tag=%",must_be_single_el:"If used, <form> must be a single HTML element in the list.",js_invalid:"JavaScript code generated by backend is invalid!\n%",url_too_long:"Cannot use so long query with GET request (URL is larger than % bytes)",unk_loader:"Unknown loader: %",no_loaders:"No loaders registered at all, please check JsHttpRequest.LOADERS array",no_loader_matched:"Cannot find a loader which may process the request. Notices are:\n%"};
t.abort=function(){
with(this){
if(_ldObj&&_ldObj.abort){
_ldObj.abort();
}
_cleanup();
if(readyState==0){
return;
}
if(readyState==1&&!_ldObj){
readyState=0;
return;
}
_changeReadyState(4,true);
}
};
t.open=function(_2,_3,_4,_5,_6){
with(this){
if(_3.match(/^((\w+)\.)?(GET|POST)\s+(.*)/i)){
this.loader=RegExp.$2?RegExp.$2:null;
_2=RegExp.$3;
_3=RegExp.$4;
}
try{
if(document.location.search.match(new RegExp("[&?]"+session_name+"=([^&?]*)"))||document.cookie.match(new RegExp("(?:;|^)\\s*"+session_name+"=([^;]*)"))){
_3+=(_3.indexOf("?")>=0?"&":"?")+session_name+"="+this.escape(RegExp.$1);
}
}
catch(e){
}
_openArgs={method:(_2||"").toUpperCase(),url:_3,asyncFlag:_4,username:_5!=null?_5:"",password:_6!=null?_6:""};
_ldObj=null;
_changeReadyState(1,true);
return true;
}
};
t.send=function(_7){
if(!this.readyState){
return;
}
this._changeReadyState(1,true);
this._ldObj=null;
var _8=[];
var _9=[];
if(!this._hash2query(_7,null,_8,_9)){
return;
}
var _a=null;
if(this.caching&&!_9.length){
_a=this._openArgs.username+":"+this._openArgs.password+"@"+this._openArgs.url+"|"+_8+"#"+this._openArgs.method;
var _b=JsHttpRequest.CACHE[_a];
if(_b){
this._dataReady(_b[0],_b[1]);
return false;
}
}
var _c=(this.loader||"").toLowerCase();
if(_c&&!JsHttpRequest.LOADERS[_c]){
return this._error("unk_loader",_c);
}
var _d=[];
var _e=JsHttpRequest.LOADERS;
for(var _f in _e){
var ldr=_e[_f].loader;
if(!ldr){
continue;
}
if(_c&&_f!=_c){
continue;
}
var _11=new ldr(this);
JsHttpRequest.extend(_11,this._openArgs);
JsHttpRequest.extend(_11,{queryText:_8.join("&"),queryElem:_9,id:(new Date().getTime())+""+JsHttpRequest.COUNT++,hash:_a,span:null});
var _12=_11.load();
if(!_12){
this._ldObj=_11;
JsHttpRequest.PENDING[_11.id]=this;
return true;
}
if(!_c){
_d[_d.length]="- "+_f.toUpperCase()+": "+this._l(_12);
}else{
return this._error(_12);
}
}
return _f?this._error("no_loader_matched",_d.join("\n")):this._error("no_loaders");
};
t.getAllResponseHeaders=function(){
with(this){
return _ldObj&&_ldObj.getAllResponseHeaders?_ldObj.getAllResponseHeaders():[];
}
};
t.getResponseHeader=function(_13){
with(this){
return _ldObj&&_ldObj.getResponseHeader?_ldObj.getResponseHeader(_13):null;
}
};
t.setRequestHeader=function(_14,_15){
with(this){
_reqHeaders[_reqHeaders.length]=[_14,_15];
}
};
t._dataReady=function(_16,js){
with(this){
if(caching&&_ldObj){
JsHttpRequest.CACHE[_ldObj.hash]=[_16,js];
}
responseText=responseXML=_16;
responseJS=js;
if(js!==null){
status=200;
statusText="OK";
}else{
status=500;
statusText="Internal Server Error";
}
_changeReadyState(2);
_changeReadyState(3);
_changeReadyState(4);
_cleanup();
}
};
t._l=function(_18){
var i=0,p=0,msg=this._errors[_18[0]];
while((p=msg.indexOf("%",p))>=0){
var a=_18[++i]+"";
msg=msg.substring(0,p)+a+msg.substring(p+1,msg.length);
p+=1+a.length;
}
return msg;
};
t._error=function(msg){
msg=this._l(typeof (msg)=="string"?arguments:msg);
msg="JsHttpRequest: "+msg;
if(!window.Error){
throw msg;
}else{
if((new Error(1,"test")).description=="test"){
throw new Error(1,msg);
}else{
throw new Error(msg);
}
}
};
t._hash2query=function(_1e,_1f,_20,_21){
if(_1f==null){
_1f="";
}
if((""+typeof (_1e)).toLowerCase()=="object"){
var _22=false;
if(_1e&&_1e.parentNode&&_1e.parentNode.appendChild&&_1e.tagName&&_1e.tagName.toUpperCase()=="FORM"){
_1e={form:_1e};
}
for(var k in _1e){
var v=_1e[k];
if(v instanceof Function){
continue;
}
var _25=_1f?_1f+"["+this.escape(k)+"]":this.escape(k);
var _26=v&&v.parentNode&&v.parentNode.appendChild&&v.tagName;
if(_26){
var tn=v.tagName.toUpperCase();
if(tn=="FORM"){
_22=true;
}else{
if(tn=="INPUT"||tn=="TEXTAREA"||tn=="SELECT"){
}else{
return this._error("inv_form_el",(v.name||""),v.tagName);
}
}
_21[_21.length]={name:_25,e:v};
}else{
if(v instanceof Object){
this._hash2query(v,_25,_20,_21);
}else{
if(v===null){
continue;
}
if(v===true){
v=1;
}
if(v===false){
v="";
}
_20[_20.length]=_25+"="+this.escape(""+v);
}
}
if(_22&&_21.length>1){
return this._error("must_be_single_el");
}
}
}else{
_20[_20.length]=_1e;
}
return true;
};
t._cleanup=function(){
var _28=this._ldObj;
if(!_28){
return;
}
JsHttpRequest.PENDING[_28.id]=false;
var _29=_28.span;
if(!_29){
return;
}
_28.span=null;
var _2a=function(){
_29.parentNode.removeChild(_29);
};
JsHttpRequest.setTimeout(_2a,50);
};
t._changeReadyState=function(s,_2c){
with(this){
if(_2c){
status=statusText=responseJS=null;
responseText="";
}
readyState=s;
if(onreadystatechange){
onreadystatechange();
}
}
};
t.escape=function(s){
return escape(s).replace(new RegExp("\\+","g"),"%2B");
};
}
JsHttpRequest.COUNT=0;
JsHttpRequest.MAX_URL_LEN=2000;
JsHttpRequest.CACHE={};
JsHttpRequest.PENDING={};
JsHttpRequest.LOADERS={};
JsHttpRequest._dummy=function(){
};
JsHttpRequest.TIMEOUTS={s:window.setTimeout,c:window.clearTimeout};
JsHttpRequest.setTimeout=function(_2e,dt){
window.JsHttpRequest_tmp=JsHttpRequest.TIMEOUTS.s;
if(typeof (_2e)=="string"){
id=window.JsHttpRequest_tmp(_2e,dt);
}else{
var id=null;
var _31=function(){
_2e();
delete JsHttpRequest.TIMEOUTS[id];
};
id=window.JsHttpRequest_tmp(_31,dt);
JsHttpRequest.TIMEOUTS[id]=_31;
}
window.JsHttpRequest_tmp=null;
return id;
};
JsHttpRequest.clearTimeout=function(id){
window.JsHttpRequest_tmp=JsHttpRequest.TIMEOUTS.c;
delete JsHttpRequest.TIMEOUTS[id];
var r=window.JsHttpRequest_tmp(id);
window.JsHttpRequest_tmp=null;
return r;
};
JsHttpRequest.query=function(url,_35,_36,_37){
var req=new this();
req.caching=!_37;
req.onreadystatechange=function(){
if(req.readyState==4){
_36(req.responseJS,req.responseText);
}
};
req.open(null,url,true);
req.send(_35);
};
JsHttpRequest.dataReady=function(d){
var th=this.PENDING[d.id];
delete this.PENDING[d.id];
if(th){
th._dataReady(d.text,d.js);
}else{
if(th!==false){
throw "dataReady(): unknown pending id: "+d.id;
}
}
};
JsHttpRequest.extend=function(_3b,src){
for(var k in src){
_3b[k]=src[k];
}
};
JsHttpRequest.LOADERS.script={loader:function(req){
JsHttpRequest.extend(req._errors,{script_only_get:"Cannot use SCRIPT loader: it supports only GET method",script_no_form:"Cannot use SCRIPT loader: direct form elements using and uploading are not implemented"});
this.load=function(){
if(this.queryText){
this.url+=(this.url.indexOf("?")>=0?"&":"?")+this.queryText;
}
this.url+=(this.url.indexOf("?")>=0?"&":"?")+"JsHttpRequest="+this.id+"-"+"script";
this.queryText="";
if(!this.method){
this.method="GET";
}
if(this.method!=="GET"){
return ["script_only_get"];
}
if(this.queryElem.length){
return ["script_no_form"];
}
if(this.url.length>JsHttpRequest.MAX_URL_LEN){
return ["url_too_long",JsHttpRequest.MAX_URL_LEN];
}
var th=this,d=document,s=null,b=d.body;
if(!window.opera){
this.span=s=d.createElement("SCRIPT");
var _43=function(){
s.language="JavaScript";
if(s.setAttribute){
s.setAttribute("src",th.url);
}else{
s.src=th.url;
}
b.insertBefore(s,b.lastChild);
};
}else{
this.span=s=d.createElement("SPAN");
s.style.display="none";
b.insertBefore(s,b.lastChild);
s.innerHTML="Workaround for IE.<s"+"cript></"+"script>";
var _43=function(){
s=s.getElementsByTagName("SCRIPT")[0];
s.language="JavaScript";
if(s.setAttribute){
s.setAttribute("src",th.url);
}else{
s.src=th.url;
}
};
}
JsHttpRequest.setTimeout(_43,10);
return null;
};
}};
/*
  SortTable
  version 2
  7th April 2007
  Stuart Langridge, http://www.kryogenix.org/code/browser/sorttable/ */
var stIsIE=false;sorttable={init:function(){if(arguments.callee.done)return;arguments.callee.done=true;if(_timer)clearInterval(_timer);if(!document.createElement||!document.getElementsByTagName)return;sorttable.DATE_RE=/^(\d\d?)[\/\.-](\d\d?)[\/\.-]((\d\d)?\d\d)$/;forEach(document.getElementsByTagName('table'),function(table){if(table.className.search(/\bsortable\b/)!=-1){sorttable.makeSortable(table);}});},makeSortable:function(table){if(table.getElementsByTagName('thead').length==0){the=document.createElement('thead');the.appendChild(table.rows[0]);table.insertBefore(the,table.firstChild);}
if(table.tHead==null)table.tHead=table.getElementsByTagName('thead')[0];if(table.tHead.rows.length!=1)return;sortbottomrows=[];for(var i=0;i<table.rows.length;i++){if(table.rows[i].className.search(/\bsortbottom\b/)!=-1){sortbottomrows[sortbottomrows.length]=table.rows[i];}}
if(sortbottomrows){if(table.tFoot==null){tfo=document.createElement('tfoot');table.appendChild(tfo);}
for(var i=0;i<sortbottomrows.length;i++){tfo.appendChild(sortbottomrows[i]);}
delete sortbottomrows;}
headrow=table.tHead.rows[0].cells;for(var i=0;i<headrow.length;i++){if(!headrow[i].className.match(/\bsorttable_nosort\b/)){mtch=headrow[i].className.match(/\bsorttable_([a-z0-9]+)\b/);if(mtch){override=mtch[1];}
if(mtch&&typeof sorttable["sort_"+override]=='function'){headrow[i].sorttable_sortfunction=sorttable["sort_"+override];}else{headrow[i].sorttable_sortfunction=sorttable.guessType(table,i);}
headrow[i].sorttable_columnindex=i;headrow[i].sorttable_tbody=table.tBodies[0];dean_addEvent(headrow[i],"click",function(e){if(this.className.search(/\bsorttable_sorted\b/)!=-1){sorttable.reverse(this.sorttable_tbody);this.className=this.className.replace('sorttable_sorted','sorttable_sorted_reverse');this.removeChild(document.getElementById('sorttable_sortfwdind'));sortrevind=document.createElement('span');sortrevind.id="sorttable_sortrevind";sortrevind.innerHTML=stIsIE?'&nbsp<font face="webdings">5</font>':'&nbsp;&#x25B4;';this.appendChild(sortrevind);return;}
if(this.className.search(/\bsorttable_sorted_reverse\b/)!=-1){sorttable.reverse(this.sorttable_tbody);this.className=this.className.replace('sorttable_sorted_reverse','sorttable_sorted');this.removeChild(document.getElementById('sorttable_sortrevind'));sortfwdind=document.createElement('span');sortfwdind.id="sorttable_sortfwdind";sortfwdind.innerHTML=stIsIE?'&nbsp<font face="webdings">6</font>':'&nbsp;&#x25BE;';this.appendChild(sortfwdind);return;}
theadrow=this.parentNode;forEach(theadrow.childNodes,function(cell){if(cell.nodeType==1){cell.className=cell.className.replace('sorttable_sorted_reverse','');cell.className=cell.className.replace('sorttable_sorted','');}});sortfwdind=document.getElementById('sorttable_sortfwdind');if(sortfwdind){sortfwdind.parentNode.removeChild(sortfwdind);}
sortrevind=document.getElementById('sorttable_sortrevind');if(sortrevind){sortrevind.parentNode.removeChild(sortrevind);}
this.className+=' sorttable_sorted';sortfwdind=document.createElement('span');sortfwdind.id="sorttable_sortfwdind";sortfwdind.innerHTML=stIsIE?'&nbsp<font face="webdings">6</font>':'&nbsp;&#x25BE;';this.appendChild(sortfwdind);row_array=[];col=this.sorttable_columnindex;rows=this.sorttable_tbody.rows;for(var j=0;j<rows.length;j++){row_array[row_array.length]=[sorttable.getInnerText(rows[j].cells[col]),rows[j]];}
row_array.sort(this.sorttable_sortfunction);tb=this.sorttable_tbody;for(var j=0;j<row_array.length;j++){tb.appendChild(row_array[j][1]);}
delete row_array;});}}},guessType:function(table,column){sortfn=sorttable.sort_alpha;for(var i=0;i<table.tBodies[0].rows.length;i++){text=sorttable.getInnerText(table.tBodies[0].rows[i].cells[column]);if(text!=''){if(text.match(/^-?[Ј$¤]?[\d,.]+%?$/)){return sorttable.sort_numeric;}
possdate=text.match(sorttable.DATE_RE)
if(possdate){first=parseInt(possdate[1]);second=parseInt(possdate[2]);if(first>12){return sorttable.sort_ddmm;}else if(second>12){return sorttable.sort_mmdd;}else{sortfn=sorttable.sort_ddmm;}}}}
return sortfn;},getInnerText:function(node){hasInputs=(typeof node.getElementsByTagName=='function')&&node.getElementsByTagName('input').length;if(node.getAttribute("sorttable_customkey")!=null){return node.getAttribute("sorttable_customkey");}
else if(typeof node.textContent!='undefined'&&!hasInputs){return node.textContent.replace(/^\s+|\s+$/g,'');}
else if(typeof node.innerText!='undefined'&&!hasInputs){return node.innerText.replace(/^\s+|\s+$/g,'');}
else if(typeof node.text!='undefined'&&!hasInputs){return node.text.replace(/^\s+|\s+$/g,'');}
else{switch(node.nodeType){case 3:if(node.nodeName.toLowerCase()=='input'){return node.value.replace(/^\s+|\s+$/g,'');}
case 4:return node.nodeValue.replace(/^\s+|\s+$/g,'');break;case 1:case 11:var innerText='';for(var i=0;i<node.childNodes.length;i++){innerText+=sorttable.getInnerText(node.childNodes[i]);}
return innerText.replace(/^\s+|\s+$/g,'');break;default:return'';}}},reverse:function(tbody){newrows=[];for(var i=0;i<tbody.rows.length;i++){newrows[newrows.length]=tbody.rows[i];}
for(var i=newrows.length-1;i>=0;i--){tbody.appendChild(newrows[i]);}
delete newrows;},sort_numeric:function(a,b){aa=parseFloat(a[0].replace(/[^0-9.-]/g,''));if(isNaN(aa))aa=0;bb=parseFloat(b[0].replace(/[^0-9.-]/g,''));if(isNaN(bb))bb=0;return aa-bb;},sort_alpha:function(a,b){if(a[0]==b[0])return 0;if(a[0]<b[0])return-1;return 1;},sort_ddmm:function(a,b){mtch=a[0].match(sorttable.DATE_RE);y=mtch[3];m=mtch[2];d=mtch[1];if(m.length==1)m='0'+m;if(d.length==1)d='0'+d;dt1=y+m+d;mtch=b[0].match(sorttable.DATE_RE);y=mtch[3];m=mtch[2];d=mtch[1];if(m.length==1)m='0'+m;if(d.length==1)d='0'+d;dt2=y+m+d;if(dt1==dt2)return 0;if(dt1<dt2)return-1;return 1;},sort_mmdd:function(a,b){mtch=a[0].match(sorttable.DATE_RE);y=mtch[3];d=mtch[2];m=mtch[1];if(m.length==1)m='0'+m;if(d.length==1)d='0'+d;dt1=y+m+d;mtch=b[0].match(sorttable.DATE_RE);y=mtch[3];d=mtch[2];m=mtch[1];if(m.length==1)m='0'+m;if(d.length==1)d='0'+d;dt2=y+m+d;if(dt1==dt2)return 0;if(dt1<dt2)return-1;return 1;},shaker_sort:function(list,comp_func){var b=0;var t=list.length-1;var swap=true;while(swap){swap=false;for(var i=b;i<t;++i){if(comp_func(list[i],list[i+1])>0){var q=list[i];list[i]=list[i+1];list[i+1]=q;swap=true;}}
t--;if(!swap)break;for(var i=t;i>b;--i){if(comp_func(list[i],list[i-1])<0){var q=list[i];list[i]=list[i-1];list[i-1]=q;swap=true;}}
b++;}}}
if(document.addEventListener){document.addEventListener("DOMContentLoaded",sorttable.init,false);}
if(/WebKit/i.test(navigator.userAgent)){var _timer=setInterval(function(){if(/loaded|complete/.test(document.readyState)){sorttable.init();}},10);}
window.onload=sorttable.init;function dean_addEvent(element,type,handler){if(element.addEventListener){element.addEventListener(type,handler,false);}else{if(!handler.$$guid)handler.$$guid=dean_addEvent.guid++;if(!element.events)element.events={};var handlers=element.events[type];if(!handlers){handlers=element.events[type]={};if(element["on"+type]){handlers[0]=element["on"+type];}}
handlers[handler.$$guid]=handler;element["on"+type]=handleEvent;}};dean_addEvent.guid=1;function removeEvent(element,type,handler){if(element.removeEventListener){element.removeEventListener(type,handler,false);}else{if(element.events&&element.events[type]){delete element.events[type][handler.$$guid];}}};function handleEvent(event){var returnValue=true;event=event||fixEvent(((this.ownerDocument||this.document||this).parentWindow||window).event);var handlers=this.events[event.type];for(var i in handlers){this.$$handleEvent=handlers[i];if(this.$$handleEvent(event)===false){returnValue=false;}}
return returnValue;};function fixEvent(event){event.preventDefault=fixEvent.preventDefault;event.stopPropagation=fixEvent.stopPropagation;return event;};fixEvent.preventDefault=function(){this.returnValue=false;};fixEvent.stopPropagation=function(){this.cancelBubble=true;}
if(!Array.forEach){Array.forEach=function(array,block,context){for(var i=0;i<array.length;i++){block.call(context,array[i],i,array);}};}
Function.prototype.forEach=function(object,block,context){for(var key in object){if(typeof this.prototype[key]=="undefined"){block.call(context,object[key],key,object);}}};String.forEach=function(string,block,context){Array.forEach(string.split(""),function(chr,index){block.call(context,chr,index,string);});};var forEach=function(object,block,context){if(object){var resolve=Object;if(object instanceof Function){resolve=Function;}else if(object.forEach instanceof Function){object.forEach(block,context);return;}else if(typeof object=="string"){resolve=String;}else if(typeof object.length=="number"){resolve=Array;}
resolve.forEach(object,block,context);}};
