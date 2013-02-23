 requirejs.config({
   paths:{
      jquery: '../components/jquery/jquery.min'
      },

  shim: {

        'foundation/jquery.placeholder': ['jquery'],
        'foundation/app': ['jquery'],
        'foundation/jquery.foundation.forms': ['jquery'],
        'foundation/jquery.foundation.navigation': ['jquery'],
        'foundation/jquery.foundation.alerts': ['jquery'],
        'foundation/jquery.foundation.buttons': ['jquery'],
        'foundation/jquery.foundation.mediaQueryToggle': ['jquery'],
        'foundation/jquery.foundation.tabs': ['jquery'],
        'foundation/jquery.foundation.topbar': ['jquery'],
        'foundation/jquery.foundation.reveal': ['jquery'],
        '../components/Parsley.js/dist/parsley.min': ['jquery'],
        '../components/jquery.maskedinput/dist/jquery.maskedinput.min': ['jquery'],
        '../components/chosen/chosen/chosen.jquery.min' : ['jquery'],
        'lib/tablesorter': ['jquery'],
        'lib/tablesorter_filter': ['jquery', 'lib/tablesorter'],
        'lib/tablesorter.pager': ['jquery', 'lib/tablesorter'],
        'lib/jquery.passwordstrength': ['jquery'],
        'lib/redactor': ['jquery'],
        'lib/jquery.chained.mini': ['jquery'],
        'lib/uploader/js/header': ['jquery'],
        'lib/uploader/js/util': ['jquery', 'lib/uploader/js/header'],
        'lib/uploader/js/button': ['jquery', 'lib/uploader/js/header', 'lib/uploader/js/util'],
        'lib/uploader/js/handler.base': ['jquery', 'lib/uploader/js/header', 'lib/uploader/js/util', 'lib/uploader/js/button'],
        'lib/uploader/js/handler.form': ['jquery', 'lib/uploader/js/header', 'lib/uploader/js/util', 'lib/uploader/js/button', 'lib/uploader/js/handler.base'],
        'lib/uploader/js/handler.xhr': ['jquery', 'lib/uploader/js/header', 'lib/uploader/js/util', 'lib/uploader/js/button', 'lib/uploader/js/handler.base', 'lib/uploader/js/handler.form'],
        'lib/uploader/js/uploader.basic': ['jquery', 'lib/uploader/js/header', 'lib/uploader/js/util', 'lib/uploader/js/button', 'lib/uploader/js/handler.base', 'lib/uploader/js/handler.form', 'lib/uploader/js/handler.xhr'],
        'lib/uploader/js/uploader': ['jquery', 'lib/uploader/js/header', 'lib/uploader/js/util', 'lib/uploader/js/button', 'lib/uploader/js/handler.base', 'lib/uploader/js/handler.form', 'lib/uploader/js/handler.xhr', 'lib/uploader/js/uploader.basic'],
        'lib/uploader/js/jquery-plugin': ['jquery', 'lib/uploader/js/header', 'lib/uploader/js/util', 'lib/uploader/js/button', 'lib/uploader/js/handler.base', 'lib/uploader/js/handler.form', 'lib/uploader/js/handler.xhr', 'lib/uploader/js/uploader.basic', 'lib/uploader/js/uploader']

  }

});




/* front end validation */

require(['../components/jquery/jquery.min', '../components/Parsley.js/dist/parsley.min'], function(jQuery, parsley) {

});


/* input masking */
require(['../components/jquery/jquery.min', '../components/jquery.maskedinput/dist/jquery.maskedinput.min'], function(jQuery, maskedinput) {


  $(document).ready( function() { 

     $(".date").mask("99/99/9999",{placeholder:" "});
     $(".phone").mask("(999) 999-9999",{placeholder:" "});

   });

});

/* select handling */

require(['../components/jquery/jquery.min', '../components/chosen/chosen/chosen.jquery.min'], function(jQuery, chosen) {

    $(document).ready( function() { 

      $(".chzn-select").chosen();

    });

});


 require(['../components/jquery/jquery.min', 'lib/jquery.chained.mini'], function(jQuery, mp) {
      
    $(document).ready( function() { 

       $("#series").chained("#mark"); /* or $("#series").chainedTo("#mark"); */

       $('.submitter').on('click', function() {

              $(this).disabled = true;
              $(this).val('Loading...')

       });


    });
      
});




 require(['foundation/jquery', 'lib/uploader/js/header', 'lib/uploader/js/util', 'lib/uploader/js/button', 'lib/uploader/js/handler.base', 'lib/uploader/js/handler.form', 'lib/uploader/js/handler.xhr', 'lib/uploader/js/uploader.basic','lib/uploader/js/uploader', 'lib/uploader/js/jquery-plugin'], function(jQuery, uploader, uploaderwrapper) {
      
    $(document).ready( function() {      

    	if($("#upload-flag").length > 0) {

    var post_uid = $('#post_uid').val(); 

 $('#thumbnail-fine-uploader').fineUploader({
request: {
endpoint: 'http://localhost/leadertech/uploads/php.php',
 params: {
   uid: post_uid,
  }
},
multiple: false,
validation: {
allowedExtensions: ['jpeg', 'jpg', 'gif', 'png'],
sizeLimit: 5120000 // 50 kB = 50 * 1024 bytes
},
text: {
uploadButton: 'Click or Drop Image to Upload'
},

 failedUploadTextDisplay: {
mode: 'custom',
maxChars: 40,
responseProperty: 'error',
enableTooltip: true
},
debug: true
}).on('complete', function(event, id, fileName, responseJSON) {
if (responseJSON.success) {
$(this).append('<img src="http://localhost/leadertech/uploads/uploads/' + post_uid + '" alt="' + fileName + '">');
$('#post_ext').val(responseJSON.ext);
}
});

}

    });
  
  });      





require(['../components/jquery/jquery.min', 'lib/redactor'], function(jQuery, redactor) {

	        $('.wysiwyg').redactor({

	        	minHeight: 500

	        	}); 

});

/* Return JSON AJAX */


require(['../components/jquery/jquery.min'], function(jQuery) {

    $(document).ready( function() { 


/*
 * jQuery Responsive menu plugin by Matt Kersley
 * Converts menus into a select elements for mobile devices and low browser widths
 * github.com/mattkersley/Responsive-Menu
 */
(function(b){var c=0;b.fn.mobileMenu=function(g){function f(a){return a.attr("id")?b("#mobileMenu_"+a.attr("id")).length>0:(c++,a.attr("id","mm"+c),b("#mobileMenu_mm"+c).length>0)}function h(a){a.hide();b("#mobileMenu_"+a.attr("id")).show()}function k(a){if(a.is("ul, ol")){var e='<select id="mobileMenu_'+a.attr("id")+'" class="mobileMenu">';e+='<option value="">'+d.topOptionText+"</option>";a.find("li").each(function(){var a="",c=b(this).parents("ul, ol").length;for(i=1;i<c;i++)a+=d.indentString;
c=b(this).find("a:first-child").attr("href");a+=b(this).clone().children("ul, ol").remove().end().text();e+='<option value="'+c+'">'+a+"</option>"});e+="</select>";a.parent().append(e);b("#mobileMenu_"+a.attr("id")).change(function(){var a=b(this);if(a.val()!==null)document.location.href=a.val()});h(a)}else alert("mobileMenu will only work with UL or OL elements!")}function j(a){b(window).width()<d.switchWidth&&!f(a)?k(a):b(window).width()<d.switchWidth&&f(a)?h(a):!(b(window).width()<d.switchWidth)&&
f(a)&&(a.show(),b("#mobileMenu_"+a.attr("id")).hide())}var d={switchWidth:768,topOptionText:"Select a page",indentString:"&nbsp;&nbsp;&nbsp;"};return this.each(function(){g&&b.extend(d,g);var a=b(this);b(window).resize(function(){j(a)});j(a)})}})(jQuery);



/*
 * jQuery Extended Selectors plugin. (c) Keith Clark freely distributable under the terms of the MIT license.
 * Adds missing -of-type pseudo-class selectors to jQuery 
 * github.com/keithclark/JQuery-Extended-Selectors  -  twitter.com/keithclarkcouk  -  keithclark.co.uk
 */
(function(g){function e(a,b){for(var c=a,d=0;a=a[b];)c.tagName==a.tagName&&d++;return d}function h(a,b,c){a=e(a,c);if(b=="odd"||b=="even")c=2,a-=b!="odd";else{var d=b.indexOf("n");d>-1?(c=parseInt(b,10)||parseInt(b.substring(0,d)+"1",10),a-=(parseInt(b.substring(d+1),10)||0)-1):(c=a+1,a-=parseInt(b,10)-1)}return(c<0?a<=0:a>=0)&&a%c==0}var f={"first-of-type":function(a){return e(a,"previousSibling")==0},"last-of-type":function(a){return e(a,"nextSibling")==0},"only-of-type":function(a){return f["first-of-type"](a)&&
f["last-of-type"](a)},"nth-of-type":function(a,b,c){return h(a,c[3],"previousSibling")},"nth-last-of-type":function(a,b,c){return h(a,c[3],"nextSibling")}};g.extend(g.expr[":"],f)})(jQuery);



/*! http://mths.be/placeholder v1.8.5 by @mathias */
(function(g,a,$){var f='placeholder' in a.createElement('input'),b='placeholder' in a.createElement('textarea');if(f&&b){$.fn.placeholder=function(){return this};$.fn.placeholder.input=$.fn.placeholder.textarea=true}else{$.fn.placeholder=function(){return this.filter((f?'textarea':':input')+'[placeholder]').bind('focus.placeholder',c).bind('blur.placeholder',e).trigger('blur.placeholder').end()};$.fn.placeholder.input=f;$.fn.placeholder.textarea=b;$(function(){$('form').bind('submit.placeholder',function(){var h=$('.placeholder',this).each(c);setTimeout(function(){h.each(e)},10)})});$(g).bind('unload.placeholder',function(){$('.placeholder').val('')})}function d(i){var h={},j=/^jQuery\d+$/;$.each(i.attributes,function(l,k){if(k.specified&&!j.test(k.name)){h[k.name]=k.value}});return h}function c(){var h=$(this);if(h.val()===h.attr('placeholder')&&h.hasClass('placeholder')){if(h.data('placeholder-password')){h.hide().next().show().focus().attr('id',h.removeAttr('id').data('placeholder-id'))}else{h.val('').removeClass('placeholder')}}}function e(){var l,k=$(this),h=k,j=this.id;if(k.val()===''){if(k.is(':password')){if(!k.data('placeholder-textinput')){try{l=k.clone().attr({type:'text'})}catch(i){l=$('<input>').attr($.extend(d(this),{type:'text'}))}l.removeAttr('name').data('placeholder-password',true).data('placeholder-id',j).bind('focus.placeholder',c);k.data('placeholder-textinput',l).data('placeholder-id',j).before(l)}k=k.removeAttr('id').hide().prev().attr('id',j).show()}k.addClass('placeholder').val(k.attr('placeholder'))}else{k.removeClass('placeholder')}}}(this,document,jQuery));
     

$(document).ready(function(){
  
  // Run Matt Kersley's jQuery Responsive menu plugin (see plugins.js)
  if ($.fn.mobileMenu) {
    $('ol#id').mobileMenu({
      switchWidth: 768,                   // width (in px to switch at)
      topOptionText: 'Choose a page',     // first option text
      indentString: '&nbsp;&nbsp;&nbsp;'  // string for indenting nested items
    });
  }

  // Run Mathias Bynens jQuery placeholder plugin (see plugins.js)
  if ($.fn.placeholder) {
    $('input, textarea').placeholder();   
  }
});

      $('.new_input_submit').on('click', function() {

            var orderID = new Array();

            $('.newinput').each(function(n){
             var vaa = $(this).val()
            
              var total_fields = $('#add_number_fields').val();

              if (total_fields == '') { 

                $('#add_number_fields').val(vaa);


              } else {
              
                $('#add_number_fields').val(total_fields +", "+ vaa);

              }
            });

            var anf = $('#add_number_fields').val();

        });

       $('.edit_input_submit').on('click', function() {

            var orderID = new Array();
            $('#edit_number_fields').val('');
            $('.newinput').each(function(n){
             var vaa = $(this).val()
            

              var total_fields = $('#edit_number_fields').val();

              if (total_fields == '') { 

                $('#edit_number_fields').val(vaa);


              } else {
              
                $('#edit_number_fields').val(total_fields +", "+ vaa);

              }
            });

            var anf = $('#edit_number_fields').val();

        });

      
      if($("#edit-number-flag").length > 0) {
        
        returnJ();


        }



      $('#add_number_product').change(function() {

        returnJ();
        });

      function returnJ() {

        var product_id = $('#add_number_product').val();
        if(! product_id){
          var product_id = $('#edit_number_product').val();
        };


     $.ajax({
              async: false,
              type: "GET",
              url: "http://localhost/leadertech/public/server/returnJSON/" + product_id,
              global: "true",
              data: {
                  
              },
              dataType: "json", 

              success: function(data){

                $.each(data, function(i, val) {

                  $.each(this, function(n, v) { 

                    var name;

                     $.each(this, function(j, value) { 

                    if (j == 'name') {

                      name = value;

                     }


                  });

                   var allFields = $('#edit_number_fields').val();

                   var allFieldsSplit=allFields.split(',');
                    
                   $('fieldset').append('<div class="row">');
 
                   $('fieldset').append('<div class="two mobile-one columns"><label class="right inline" for="">'+name+'</label></div><div class="ten mobile-three columns"><input type="text" class="forminput eight newinput '+name+'" name="'+name+'" id="'+name+'" value="'+allFieldsSplit[n]+'"/></div>');

                   $('fieldset').append('</div>');

                   
                  
                      });






                });



               }

            });



    }

                  
    });


});

/* plug init shit */


require(['../components/jquery/jquery.min', 'foundation/jquery.foundation.forms', 'foundation/jquery.foundation.navigation', 'foundation/jquery.foundation.alerts', 'foundation/jquery.foundation.buttons', 'foundation/jquery.foundation.mediaQueryToggle', 'foundation/jquery.foundation.tabs', 'foundation/jquery.foundation.topbar', 'foundation/app'], function(jQuery, app, forms, navi, alerts, buttons, mediaquery, tabs, topbar) {


});

require(['../components/jquery/jquery.min', 'foundation/jquery.foundation.reveal'], function(jQuery, reveal) {


});

require(['../components/jquery/jquery.min', 'lib/jquery.passwordstrength'], function(jQuery, strength) {

  $(function() {
    $('.password').pstrength();
  });

});


  require(['../components/jquery/jquery.min', 'lib/tablesorter', 'lib/tablesorter.pager', 'lib/tablesorter_filter'], function(jQuery, tablesorter, tablesorter_pager, tablesorter_filter) {


  $(document).ready(function() {
        $(".tsort")
        .tablesorter({debug: false})
        .tablesorterPager({container: $("#tablesorter-pager")})
        .tablesorterFilter({filterContainer: "#filter-box",
                            filterClearContainer: "#filter-clear-button"});
    });// end document.ready

  });



