 'use strict';

 requirejs.config({

  baseUrl: "http://localhost/skeletor/scripts",
  paths:{
      jquery: 'vendor/jquery/jquery.min'
  },
  shim: {
        'foundation/foundation.alerts': { deps: ['jquery'] },
        'foundation/foundation.clearing': { deps: ['jquery'] },
        'foundation/foundation.cookie': { deps: ['jquery'] },
        'foundation/foundation.dropdown': { deps: ['jquery'] },
        'foundation/foundation.forms': { deps: ['jquery'] },
        'foundation/foundation.joyride': { deps: ['jquery'] },
        'foundation/foundation.magellan': { deps: ['jquery'] },
        'foundation/foundation.min': { deps: ['jquery'] },
        'foundation/foundation.orbit': { deps: ['jquery'] },
        'foundation/foundation.placeholder': { deps: ['jquery'] },
        'foundation/foundation.reveal': { deps: ['jquery'] },
        'foundation/foundation.section': { deps: ['jquery'] },
        'foundation/foundation.tooltips': { deps: ['jquery'] },
        'foundation/foundation.topbar': { deps: ['jquery'] },
        'vendor/jquery.maskedinput/jquery.maskedinput.min': { deps: ['jquery']},
        'vendor/chosen/chosen/chosen.jquery': { deps: ['jquery']},
        'vendor/tablesorter/js/jquery.tablesorter.min': { deps: ['jquery']},
        'vendor/tablesorter/addons/pager/jquery.tablesorter.pager.min': {
          deps: [
          'jquery', 
          'vendor/tablesorter/js/jquery.tablesorter.min'
          ]
        },
        'vendor/redactor-js/redactor/redactor.min': { deps: ['jquery']},
        'lib/jquery.passwordstrength': { deps: ['jquery']}
  }

});

 // lets init some plugins

require([
  'jquery',
  'vendor/jquery.maskedinput/jquery.maskedinput.min',
  'modules/inputMasking'
], function ($) { });


require([
  'jquery',
  'vendor/chosen/chosen/chosen.jquery',
  'modules/selectFields'
], function ($) { });

require([
  'jquery',
  'vendor/redactor-js/redactor/redactor.min',
  'modules/wysiwyg'
], function ($) { });




require([
  'jquery', 
  'vendor/tablesorter/js/jquery.tablesorter.min', 
  'vendor/tablesorter/addons/pager/jquery.tablesorter.pager.min', 
  'modules/tableSorter'
  ], function ($) { });

// an example of an inline or dirty plugin with no git, so no bower, so no mvc

require(['jquery', 'lib/jquery.passwordstrength'], function($) {

  $(function() {
    $('.password').pstrength();
  });

});



/*

require(['vendor/jquery/jquery.min', 'foundation/foundation.forms', 'foundation/foundation.navigation', 'foundation/foundation.alerts', 'foundation/foundation.buttons', 'foundation/foundation.mediaQueryToggle', 'foundation/foundation.tabs', 'foundation/foundation.topbar', 'foundation/app'], function(jQuery, app, forms, navi, alerts, buttons, mediaquery, tabs, topbar) {


});

require(['vendor/jquery/jquery.min', 'foundation/foundation.reveal'], function(jQuery, reveal) {


});







*/
