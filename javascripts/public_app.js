 requirejs.config({
   paths:{
      jquery: '../components/jquery/jquery.min'
      },

  shim: {

        'foundation/jquery.placeholder': ['jquery'],
        'foundation/app': ['jquery'],
        'foundation/jquery.foundation.forms': ['jquery'],
       // 'foundation/jquery.foundation.navigation': ['jquery'],
        'foundation/jquery.foundation.alerts': ['jquery'],
        'foundation/jquery.foundation.buttons': ['jquery'],
        'foundation/jquery.foundation.mediaQueryToggle': ['jquery'],
       // 'foundation/jquery.foundation.tabs': ['jquery'],
       // 'foundation/jquery.foundation.topbar': ['jquery'],
        'foundation/jquery.foundation.reveal': ['jquery'],
        'foundation/jquery.foundation.orbit': ['jquery'],
        '../components/Parsley.js/dist/parsley.min' : ['jquery'],
        '../components/jquery.maskedinput/dist/jquery.maskedinput.min': ['jquery'],
        '../components/chosen/chosen/chosen.jquery.min' : ['jquery'],
        'lib/jquery.validate.min': ['jquery'],

      
  }


});


/* nav fix */

require(['../components/jquery/jquery.min'], function(jQuery) {


  $(document).ready( function() { 

      $('.sf-menu li ul li ul').on('mouseenter', function(){ 
        
        $(this).parent().addClass('ontop');
        
      });

      $('.sf-menu li ul li ul').on('mouseleave', function(){ 
        
        $(this).parent().removeClass('ontop');
        
      });


   });

});



require(['foundation/jquery', 'foundation/foundation.min', 'foundation/jquery.foundation.orbit'], function(jQuery, orbit) {

  $(document).ready(function() { 
     
      if($(".home-flag").length > 0) {

$('#featured').orbit({
animation: 'fade'

});

}


  });

});


/* input masking */

require(['../components/jquery/jquery.min', '../components/jquery.maskedinput/dist/jquery.maskedinput.min'], function(jQuery, maskedinput) {


  $(document).ready( function() { 

     $(".date").mask("99/99/9999",{placeholder:" "});
     $(".phone").mask("(999) 999-9999",{placeholder:" "});

   });

});


/* client side input validation */

require(['../components/jquery/jquery.min', 'lib/jquery.validate.min'], function(jQuery, validate) {



$(document).ready(function(){


    $('#contact_form').validate({
      rules: {
        contact_name: {
          required: true,
          minlength: 2
        },
        contact_email: {
          minlength: 2,
          required: true,
          email: true,
        },
        contact_industry: {
          required: true
        },
         contact_phone: {
          required: true,
        },
        contact_notes: {
         required: true,
        }
      },
      highlight: function(label) {
        $(label).closest('.control-group').addClass('error');
      },
      success: function(label) {
        label
          .text('OK!').addClass('valid')
          .closest('.control-group').addClass('success');
      }
    });
    
}); // end document.ready

});


/* select handling 

require(['../components/jquery/jquery.min', '../components/chosen/chosen/chosen.jquery.min'], function(jQuery, chosen) {

    $(document).ready( function() { 

      $(".chzn-select").chosen();

    });

});


*/

/* plug init shit */


require(['../components/jquery/jquery.min', 'foundation/jquery.foundation.forms','foundation/jquery.foundation.alerts', 'foundation/jquery.foundation.buttons', 'foundation/jquery.foundation.mediaQueryToggle','foundation/app'], function(jQuery, app, forms, alerts, buttons, mediaquery) {




});

require(['../components/jquery/jquery.min', 'foundation/jquery.foundation.reveal'], function(jQuery, reveal) {


});




