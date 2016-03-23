/*-------------------------------
	VALIDATE.JS
	A barebones jQuery validation plugin
	@author Todd Francis
	@version 1.0.3
-------------------------------*/
;(function(r,d,l){d.fn.validate=function(m){return this.each(function(){var f=d(this);if(l===f.data("validate")){var j=new d.validate(m,f);f.data("validate",j)}})};d.validate=function(m,f){function j(a,b){-1==d.inArray(a,b)&&b.push(a);return b}function p(a){a=a.slice(a.indexOf("[")+1,-1);return-1!==a.indexOf(",")?a.split(","):[a]}function n(a){for(var b=[],c=0;c<a.length;c++){var g=a[c],d=[],h=g.indexOf("[");-1!==h&&(d=d.concat(p(g)),g=g.slice(0,h));b.push({rule:g,args:d})}return b}var h=d.extend(!0,
{debug:!1,autoDetect:!1,visibleOnly:!0,beforeSubmit:function(){},singleError:function(){},overallError:function(){},singleSuccess:function(){},overallSuccess:function(){},regExp:{alpha:/^[a-zA-Z]*$/,numeric:/^[0-9]*$/,alphanumeric:/^[a-zA-Z0-9]*$/,url:/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/,email:/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/}},
m),c=this,q=["checkGroupRequired","checkGroupMin","checkGroupMax"];c.$form=f;c.version="1.0.0";if(f!==l)f.on("submit",function(a){if(!c.validate()||h.debug)a.stopImmediatePropagation(),a.preventDefault()});c.validate=function(a){a="undefined"===typeof a?c.$form:a;var b=!1,e=d();h.beforeSubmit.call(c);c.fieldsToCheck(a).each(function(){var a=d(this);if((h.visibleOnly&&a.is(":visible")||!h.visibleOnly)&&!c.checkField(a))b=!0,e=e.add(a)});b?h.overallError.call(c,a,e):!1===h.overallSuccess.call(c,a)&&
(b=!0);return!b};c.checkField=function(a){var b=a.data("validate")?a.data("validate").split("|"):[];a.val();var e=[];if(h.autoDetect&&a.is('input:not([type="checkbox"], [type="radio"])')&&"text"!=a.attr("type"))switch(e=a.attr("type"),e){case "number":b=j("numeric",b);break;default:b=j(e,b)}b=n(b);e=c.checkValue(a,b);if(e instanceof Object)return h.singleError.call(c,a,e),!1;h.singleSuccess.call(c,a,b);return!0};c.checkValue=function(a,b){if(!b)return!0;b="string"==typeof b?n(b):b;for(var e=[],g=
0;g<b.length;g++){var f=b[g].rule,k="",j=[a].concat(b[g].args.slice());f.indexOf("[");k="check"+f.charAt(0).toUpperCase()+f.slice(1);"checkRequired"==k&&a.is('input[type="checkbox"]')?k="checkRequiredCheckbox":-1!=d.inArray(k,q)&&(f=d('input[type="checkbox"]',a),f.length||(f=d('input[type="radio"]',a)),j=[f].concat(j.slice(1)));c[k]instanceof Function?c[k].apply(c,j)||e.push(b[g]):h.regExp[b[g].rule]?""!==a.val()&&!c.checkRegExp(a,b[g].rule)&&e.push(b[g]):e.push(b[g])}return 0<e.length?e:!0};c.fieldsToCheck=
function(a){a=d("[data-validate]",a===l?c.$form:a);h.autoDetect&&(a=d("input[required]").add(a));return a};c.checkRequired=function(a){return 0<a.val().length?!0:!1};c.checkRequiredCheckbox=function(a){return a.is(":checked")};c.checkGroupRequired=function(a){return a.filter(":checked").length?!0:!1};c.checkGroupMin=function(a,b){return a.filter(":checked").length>=b};c.checkGroupMax=function(a,b){return a.filter(":checked").length<=b};c.checkCustomRegExp=function(a,b,c){if(""===a.val())return!0;
b=RegExp(b,c);return a.val().match(b)?!0:!1};c.checkRegExp=function(a,b){return a.val().match(h.regExp[b])?!0:!1};c.checkMaxLength=function(a,b){return""===a.val()?!0:a.val().length<=b};c.checkMinLength=function(a,b){return""===a.val()?!0:a.val().length>=b};c.checkMax=function(a,b){return""===a.val()?!0:parseFloat(a.val())<=parseFloat(b)};c.checkMin=function(a,b){return""===a.val()?!0:parseFloat(a.val())>=parseFloat(b)}}})(window,jQuery);

// $(function(){
// 	var formSettings = {
// 		singleError : function($field, rules){ $field.closest('.form-group').removeClass('valid').addClass('error'); $('.alert.alert-danger').removeClass('hidden');},
// 		singleSuccess : function($field, rules){ $field.closest('.form-group').removeClass('error').addClass('valid'); $('.alert.alert-danger').addClass('hidden');},
// 		overallSuccess : function(){

// 			var form    	= $('#registerForm'),
// 				nombre_negocio   	= form.find( "input[name='nombre_negocio']" ).val(),
// 				email				= form.find( "input[name='email']" ).val(),
// 				descripcion			= form.find( "input[name='descripcion']" ).val(),
// 				giro				= form.find( "input[name='giro']" ).val(),
// 				direccion			= form.find( "input[name='direccion']" ).val(),
// 				telefono			= form.find( "input[name='telefono']" ).val(),
// 				sitio_web			= form.find( "input[name='sitio_web']" ).val(),
// 				coords				= form.find( "input[name='coords']" ).val(),
// 				fb					= form.find( "input[name='fb']" ).val(),
// 				tw					= form.find( "input[name='tw']" ).val(),
// 				ig					= form.find( "input[name='ig']" ).val(),
// 				imagen				= form.find( "input[name='image']" ).val(),
// 				nombre_responsable	= form.find( "input[name='nombre_responsable']" ).val(),
// 				correo_responsable	= form.find( "input[name='correo_responsable']" ).val(),
// 				telefono_responsable= form.find( "input[name='telefono_responsable']" ).val(),
// 				_token   	= form.find( "input[name='_token']" ).val(),
// 				action  	= form.attr( "action"),
// 				url     	= action;

// 				// imagen = imagen.replace(' ', '');
// 				// console.log('img ' + imagen);

// 			var posting = $.post( 
// 				url, { 	fb: fb, 
// 						tw: tw, 
// 						ig: ig, 
// 						giro: giro, 
// 						email: email, 
// 						coords: coords, 
// 						imagen: imagen, 
// 						telefono: telefono, 
// 						direccion: direccion, 
// 						sitio_web: sitio_web, 
// 						descripcion: descripcion, 
// 						nombre_negocio: nombre_negocio, 
// 						nombre_responsable: nombre_responsable, 
// 						correo_responsable: correo_responsable, 
// 						telefono_responsable: telefono_responsable, 
// 						_token: _token
// 					}
// 				);
// 			posting.done(function( data ) {
// 				console.log(data);
// 				console.log('email sent!');
// 				$('#registerForm')[0].reset();
// 				$('.sent_mail_alert').fadeIn().delay(2000).fadeOut();
// 			});

// 		},
// 		overallError : function($form, fields){ /*Do nothing, just show the error fields*/ },
// 		autoDetect : true, debug : true
// 	};
// 	var $validate = $('#registerForm').validate(formSettings).data('validate');
// });

$(document).ready(function() {
	
	$(".fancybox").fancybox();
	
	$('.home-slider').slick({
		'autoplay': true,
		'dots': true
	});

});