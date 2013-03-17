/*global define*/
define([
    'jquery', 
    'vendor/tablesorter/js/jquery.tablesorter.min', 
    'vendor/tablesorter/addons/pager/jquery.tablesorter.pager.min'
    ], function ($) {

'use strict';


   	
  $(document).ready(function() {
        $(".table-sort")
        .tablesorter({debug: false})
        .tablesorterPager({container: $("#tablesorter-pager")});
    });// end document.ready
});  

