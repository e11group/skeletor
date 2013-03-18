/*global define*/
define([
    'jquery'
    ], function ($) {

    'use strict';
    $(document).ready(function(){    

        $('.form-submit').on('click', function(){ 

            $(this).addClass('disabled').attr('disabled',true);
            $(this).val('Loading ...');
        });

        
    }); // end document.ready


});  

