 'use strict';

 requirejs.config({

  baseUrl: "http://localhost/skeletor/scripts",
  paths:{
      jquery: 'vendor/jquery/jquery.min',
  },
  shim: {

        'foundation/foundation': { deps: ['jquery'] },
        'foundation/foundation.alerts': { deps: ['jquery'] },
        'foundation/foundation.clearing': { deps: ['jquery'] },
        'foundation/foundation.cookie': { deps: ['jquery'] },
        'foundation/foundation.dropdown': { deps: ['jquery'] },
        'foundation/foundation.forms': { deps: ['jquery'] },
        'foundation/foundation.joyride': { deps: ['jquery'] },
        'foundation/foundation.magellan': { deps: ['jquery'] },
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
        'lib/jquery.passwordstrength': { deps: ['jquery']},
        'lib/jquery.validate.min': { deps: ['jquery']}

  }

});


require(["jquery",
"foundation/foundation",
"foundation/foundation.alerts",
"foundation/foundation.clearing",
"foundation/foundation.cookie",
"foundation/foundation.dropdown",
"foundation/foundation.forms",
"foundation/foundation.joyride",
"foundation/foundation.magellan",
"foundation/foundation.orbit",
"foundation/foundation.placeholder",
"foundation/foundation.reveal",
"foundation/foundation.section",
"foundation/foundation.tooltips",
"foundation/foundation.topbar"
], function ($) {
  $(document).foundation();
});


 // lets init some plugins

 // input masking
require([
  'jquery',
  'vendor/jquery.maskedinput/jquery.maskedinput.min',
  'modules/inputMasking'
], function ($) { });


// drop down handling
require([
  'jquery',
  'vendor/chosen/chosen/chosen.jquery',
  'modules/selectFields'
], function ($) { });


// wysiwyg
require([
  'jquery',
  'vendor/redactor-js/redactor/redactor.min',
  'modules/wysiwyg'
], function ($) { });

// tablesorter
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



require([
  'jquery', 
  'lib/jquery.validate.min',
  'modules/validation'
  ], function($) {


});
