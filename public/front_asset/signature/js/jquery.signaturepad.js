!function(e){function t(t,n){var a=this,r=e.extend({},e.fn.signaturePad.defaults,n),o=e(t),l=e(r.canvas,o),s=l.get(0),u=null,d={x:null,y:null},c=[],p=!1,h=!1,f=!1,g=!1,v=30,m=v,y=0,C=[];function b(){clearTimeout(p),p=!1,h=!1}function w(t,n){var o,l,s;if(t.preventDefault(),o=e(t.target).offset(),clearTimeout(p),p=!1,void 0!==t.changedTouches?(l=Math.floor(t.changedTouches[0].pageX-o.left),s=Math.floor(t.changedTouches[0].pageY-o.top)):(l=Math.floor(t.pageX-o.left),s=Math.floor(t.pageY-o.top)),d.x===l&&d.y===s)return!0;if(null===d.x&&(d.x=l),null===d.y&&(d.y=s),n&&(s+=n),u.beginPath(),u.moveTo(d.x,d.y),u.lineTo(l,s),u.lineCap=r.penCap,u.stroke(),u.closePath(),!0===r.drawBezierCurves){C.push({lx:l,ly:s,mx:d.x,my:d.y});var h=4*r.bezierSkip;if(C.length>=h){var f=c.slice(c.length-h+2,c.length);for(i in u.strokeStyle=r.bgColour,f){var g=f[i];u.beginPath(),u.moveTo(g.mx,g.my),u.lineTo(g.lx,g.ly),u.lineCap=r.penCap,u.stroke(),u.closePath()}u.strokeStyle=r.penColour,z(C,u),C=C.slice(h-1,h)}}c.push({lx:l,ly:s,mx:d.x,my:d.y}),d.x=l,d.y=s,r.onDraw&&"function"==typeof r.onDraw&&r.onDraw.apply(a)}function x(t){t&&"touchend"!==t.type&&"touchcancel"!=t.type?w(t,1):(f?l.each(function(){this.removeEventListener("touchmove",w)}):l.unbind("mousemove.signaturepad"),c.length>0&&(r.onDrawEnd&&"function"==typeof r.onDrawEnd&&r.onDrawEnd.apply(a),C=[],I(),F(c,u,!1))),d.x=null,d.y=null,r.output&&c.length>0&&e(r.output,o).val(JSON.stringify(c))}function I(){u.clearRect(0,0,s.width,s.height),u.fillStyle=r.bgColour,u.fillRect(0,0,s.width,s.height),r.displayOnly||function(){if(!r.lineWidth)return!1;u.beginPath(),u.lineWidth=r.lineWidth,u.strokeStyle=r.lineColour,u.moveTo(r.lineMargin,r.lineTop),u.lineTo(s.width-r.lineMargin,r.lineTop),u.stroke(),u.closePath()}(),u.lineWidth=r.penWidth,u.strokeStyle=r.penColour}function D(){I(),e(r.output,o).val(""),c=[],x()}function M(e,t){null==d.x?w(e,1):w(e,t)}function S(e,t){f?t.addEventListener("touchmove",M,!1):l.bind("mousemove.signaturepad",M),w(e,1)}function P(t){if(g)return!1;g=!0,e("input").blur(),void 0!==t.changedTouches&&(f=!0),f?(l.each(function(){this.addEventListener("touchend",x,!1),this.addEventListener("touchcancel",x,!1)}),l.unbind("mousedown.signaturepad")):(e(document).bind("mouseup.signaturepad",function(){h&&(x(),b())}),l.bind("mouseleave.signaturepad",function(e){h&&x(e),h&&!p&&(p=setTimeout(function(){x(),b()},500))}),l.each(function(){this.ontouchstart=null}))}function T(){e(r.typed,o).hide(),D(),l.each(function(){this.ontouchstart=function(e){e.preventDefault(),h=!0,P(e),S(e,this)}}),l.bind("mousedown.signaturepad",function(e){e.preventDefault(),h=!0,P(e),S(e)}),e(r.clear,o).bind("click.signaturepad",function(e){e.preventDefault(),D()}),e(r.typeIt,o).bind("click.signaturepad",function(e){e.preventDefault(),E()}),e(r.drawIt,o).unbind("click.signaturepad"),e(r.drawIt,o).bind("click.signaturepad",function(e){e.preventDefault()}),e(r.typeIt,o).removeClass(r.currentClass),e(r.drawIt,o).addClass(r.currentClass),e(r.sig,o).addClass(r.currentClass),e(r.typeItDesc,o).hide(),e(r.drawItDesc,o).show(),e(r.clear,o).show()}function E(){D(),g=!1,l.each(function(){this.removeEventListener&&(this.removeEventListener("touchend",x),this.removeEventListener("touchcancel",x),this.removeEventListener("touchmove",w)),this.ontouchstart&&(this.ontouchstart=null)}),e(document).unbind("mouseup.signaturepad"),l.unbind("mousedown.signaturepad"),l.unbind("mousemove.signaturepad"),l.unbind("mouseleave.signaturepad"),e(r.clear,o).unbind("click.signaturepad"),e(r.typed,o).show(),e(r.drawIt,o).bind("click.signaturepad",function(e){e.preventDefault(),T()}),e(r.typeIt,o).unbind("click.signaturepad"),e(r.typeIt,o).bind("click.signaturepad",function(e){e.preventDefault()}),e(r.output,o).val(""),e(r.drawIt,o).removeClass(r.currentClass),e(r.typeIt,o).addClass(r.currentClass),e(r.sig,o).removeClass(r.currentClass),e(r.drawItDesc,o).hide(),e(r.clear,o).hide(),e(r.typeItDesc,o).show(),m=v=e(r.typed,o).css("font-size").replace(/px/,"")}function W(t){var n=e(r.typed,o),a=t.replace(/>/g,"&gt;").replace(/</g,"&lt;").trim(),i=y,l=.5*m;if(y=a.length,n.html(a),a){if(y>i&&n.outerWidth()>s.width)for(;n.outerWidth()>s.width;)m--,n.css("font-size",m+"px");if(y<i&&n.outerWidth()+l<s.width&&m<v)for(;n.outerWidth()+l<s.width&&m<v;)m++,n.css("font-size",m+"px")}else n.css("font-size",v+"px")}function O(){var t=!0,n={drawInvalid:!1,nameInvalid:!1},i=[o,r],l=[n,o,r];return r.onBeforeValidate&&"function"==typeof r.onBeforeValidate?r.onBeforeValidate.apply(a,i):function(t,n){e("p."+n.errorClass,t).remove(),t.removeClass(n.errorClass),e("input, label",t).removeClass(n.errorClass)}.apply(a,i),r.drawOnly&&c.length<1&&(n.drawInvalid=!0,t=!1),""===e(r.name,o).val()&&(n.nameInvalid=!0,t=!1),r.onFormError&&"function"==typeof r.onFormError?r.onFormError.apply(a,l):function(t,n,a){t.nameInvalid&&(n.prepend(['<p class="',a.errorClass,'">',a.errorMessage,"</p>"].join("")),e(a.name,n).focus(),e(a.name,n).addClass(a.errorClass),e("label[for="+e(a.name).attr("id")+"]",n).addClass(a.errorClass)),t.drawInvalid&&n.prepend(['<p class="',a.errorClass,'">',a.errorMessageDraw,"</p>"].join(""))}.apply(a,l),t}function z(e,t){for(var n=[],a=[],i=0;i<e.length-1;i++)if("object"==typeof e[i]&&"object"==typeof e[i+1]){var o=e[i],l=e[i+1];if(o.mx==o.lx&&o.my==o.ly)continue;n.push(o),o.lx==l.mx&&o.ly==l.my||o.mx==l.lx&&o.my==l.ly||(a.push(n),n=[]),i==e.length-2&&(n.push(l),a.push(n))}var s=[];for(k=0;k<a.length;k++){var u=a[k].pop();a[k]=a[k].filter(function(e,t){return t%r.bezierSkip==0}),a[k].push(u);n=a[k];for(j=0;j<n.length;j++){var d=n[j],c=Math.abs(d.lx-d.mx)+Math.abs(d.ly-d.my);s.push(c)}}var p=stats(s);for(p.length=numeric.sum(s),p.mean*=3,p.deviation*=3,k=0;k<a.length;k++){var h=(n=a[k]).map(function(e){return[e.lx,e.ly]}),f=getBezierControlPoints(h);for(var i in f){var g=f[i][0],v=f[i][1],m=f[i][2],y=f[i][3];if(!0===r.variableStrokeWidth){var C=(Math.abs(g[0]-v[0])+Math.abs(v[0]-m[0])+Math.abs(m[0]-y[0])+Math.abs(g[1]-v[1])+Math.abs(v[1]-m[1])+Math.abs(m[1]-y[1])-p.mean)/p.deviation;if(C>0)var b=3-C/2.5;else if(C<=0)b=3-2*C}t.beginPath(),t.moveTo(g[0],g[1]),t.bezierCurveTo(v[0],v[1],m[0],m[1],y[0],y[1]),t.lineWidth=r.penWidth,t.lineWidth=b,t.lineCap=r.penCap,t.stroke(),t.closePath()}}}function F(t,n,a){if(r.autoscale){var i=0,o=0,s=e(l).width(),u=e(l).height();e.each(t,function(e,t){i=Math.max(t.mx,t.lx,i),s=Math.min(t.mx,t.lx,s),o=Math.max(t.my,t.ly,o),u=Math.min(t.my,t.ly,u)});var d=(i*=1.15)-(s*=.85),p=(o*=1.15)-(u*=.85);if(d/p>l.width()/l.height())var h=l.width()/d;else h=l.height()/p;n.translate(-s*h,-u*h),n.scale.apply(n,[h,h]),n.translate((l.width()/h-d)/2,(l.height()/h-p)/2)}else n.scale.apply(n,r.scale);for(var f in t)"object"==typeof t[f]&&(!1===r.drawBezierCurves&&(n.beginPath(),n.moveTo(t[f].mx,t[f].my),n.lineTo(t[f].lx,t[f].ly),n.lineCap=r.penCap,n.stroke(),n.closePath()),a&&c.push({lx:t[f].lx,ly:t[f].ly,mx:t[f].mx,my:t[f].my}));!0===r.drawBezierCurves&&z(t,n)}e.extend(a,{init:function(){parseFloat((/CPU.+OS ([0-9_]{3}).*AppleWebkit.*Mobile/i.exec(navigator.userAgent)||[0,"4_2"])[1].replace("_","."))<4.1&&(e.fn.Oldoffset=e.fn.offset,e.fn.offset=function(){var t=e(this).Oldoffset();return t.top-=window.scrollY,t.left-=window.scrollX,t}),e(r.typed,o).bind("selectstart.signaturepad",function(t){return e(t.target).is(":input")}),l.bind("selectstart.signaturepad",function(t){return e(t.target).is(":input")}),!s.getContext&&FlashCanvas&&FlashCanvas.initElement(s),s.getContext&&(u=s.getContext("2d"),e(r.sig,o).show(),r.displayOnly||(r.drawOnly||(e(r.name,o).bind("keyup.signaturepad",function(){W(e(this).val())}),e(r.name,o).bind("blur.signaturepad",function(){W(e(this).val())}),e(r.drawIt,o).bind("click.signaturepad",function(e){e.preventDefault(),T()})),r.drawOnly||"drawIt"===r.defaultAction?T():E(),r.validateFields&&(e(t).is("form")?e(t).bind("submit.signaturepad",function(){return O()}):e(t).parents("form").bind("submit.signaturepad",function(){return O()})),e(r.sigNav,o).show()))},updateOptions:function(t){e.extend(r,t)},regenerate:function(t){a.clearCanvas(),e(r.typed,o).hide(),"string"==typeof t&&(t=JSON.parse(t)),F(t,u,!0),r.output&&e(r.output,o).length>0&&e(r.output,o).val(JSON.stringify(c))},clearCanvas:function(){D()},getSignature:function(){return c},getSignatureString:function(){return JSON.stringify(c)},getSignatureImage:function(){var e,t=document.createElement("canvas"),n=null;return t.style.position="absolute",t.style.top="-999em",t.width=s.width,t.height=s.height,document.body.appendChild(t),!t.getContext&&FlashCanvas&&FlashCanvas.initElement(t),(n=t.getContext("2d")).fillStyle=r.bgColour,n.fillRect(0,0,s.width,s.height),n.lineWidth=r.penWidth,n.strokeStyle=r.penColour,F(c,n),e=t.toDataURL.apply(t,arguments),document.body.removeChild(t),t=null,e},validateForm:function(){return O()}})}e.fn.signaturePad=function(n){var a=null;return this.each(function(){e.data(this,"plugin-signaturePad")?(a=e.data(this,"plugin-signaturePad")).updateOptions(n):((a=new t(this,n)).init(),e.data(this,"plugin-signaturePad",a))}),a},e.fn.signaturePad.defaults={defaultAction:"typeIt",displayOnly:!1,drawOnly:!1,canvas:"canvas",sig:".sig",sigNav:".sigNav",bgColour:"#ffffff",penColour:"#145394",penWidth:2,penCap:"round",lineColour:"#ccc",lineWidth:2,lineMargin:5,lineTop:35,name:".name",typed:".typed",clear:".clearButton",typeIt:".typeIt a",drawIt:".drawIt a",typeItDesc:".typeItDesc",drawItDesc:".drawItDesc",output:".output",currentClass:"current",validateFields:!0,errorClass:"error",errorMessage:"Please enter your name",errorMessageDraw:"Please sign the document",onBeforeValidate:null,onFormError:null,onDraw:null,onDrawEnd:null,scale:[1,1],autoscale:!1,drawBezierCurves:!1,variableStrokeWidth:!1,bezierSkip:4}}(jQuery);