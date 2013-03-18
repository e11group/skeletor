/*global define*/
define([
    'jquery', 
  'lib/jquery.validate.min',
    ], function ($) {

    'use strict';
    $(document).ready(function(){    

    $('#template').validate({
          rules: {
            
            template_form_title: {
              minlength: 20,
              required: true
            }
          },
          highlight: function(input) {
            $(input).addClass('error');
            $('label.error').removeClass('validation-success');
          },
          success: function(label) {
            label
              .text('OK!').addClass('validation-success').removeClass('validation-error');
          }
        });    

        
    }); // end document.ready


});  

