/*global define*/
define([
  'jquery',
  'vendor/redactor-js/redactor/redactor.min'
], function ($) {

'use strict';

    $(document).ready( function() { 

   		$('.wysiwyg').redactor({

            minHeight: 250

            }); 
   		 });

});  

