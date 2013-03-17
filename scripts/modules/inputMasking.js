/*global define*/
define([
  'jquery',
  'vendor/jquery.maskedinput/jquery.maskedinput.min'
], function ($) {

'use strict';

  $(document).ready( function() { 

     $(".date").mask("99/99/9999",{placeholder:" "});
     $(".phone").mask("(999) 999-9999",{placeholder:" "});

   });
});