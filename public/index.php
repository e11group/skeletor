<?php

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Load up
     *
     *
    */

    // definitions
    require_once '../app/config/definitions.php';

    // autoloader
    require_once '../bootstrap.php';

	// helper functions
	require_once INC_DIR . 'helper.php';

   

    // all hail WingCommander
	//WingCommander::init();

require_once '../forms-bootstrap.php';


// Set up the Validator component

// Set up the Translation component

  /**
    * Initiate Twig, and register to Flight
    */
    $loader = new \Twig_Loader_Filesystem(array(
      dirname(dirname(__FILE__)) . '/app/templates',
          VENDOR_TWIG_BRIDGE_DIR . '/Resources/views/Form',

      )
    );

    $twigConfig = array(
        // 'cache'  =>  './cache/twig/',
        // 'cache'  =>  false,
        'debug' =>  false,
    );
    Flight::register('view_form', 'Twig_Environment', array($loader, $twigConfig), function($twig) {
       $translator = new \Symfony\Component\Translation\Translator('en');
       $translator->addLoader('xlf', new \Symfony\Component\Translation\Loader\XliffFileLoader());
       $translator->addResource('xlf', VENDOR_FORM_DIR . '/Resources/translations/validators.en.xlf', 'en', 'validators');
       $translator->addResource('xlf', VENDOR_VALIDATOR_DIR . '/Resources/translations/validators.en.xlf', 'en', 'validators');
       $formEngine = new \Symfony\Bridge\Twig\Form\TwigRendererEngine(array(DEFAULT_FORM_THEME));
       $formEngine->setEnvironment($twig);
       $csrfProvider = new \Symfony\Component\Form\Extension\Csrf\CsrfProvider\DefaultCsrfProvider(CSRF_SECRET);
       $validator = \Symfony\Component\Validator\Validation::createValidator();
       $twig->addExtension(new Twig_Extension_Debug()); // Add the debug extension
       $twig->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($translator));
       $twig->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(new \Symfony\Bridge\Twig\Form\TwigRenderer($formEngine, $csrfProvider)));
       
    });

  Flight::register('view', 'Twig_Environment', array($loader, $twigConfig), function() {
       
    });






        Flight::route('/items',  array('\Skeletor\Controllers\Items\Items','get_items_page'));

        Flight::route('GET /api/templates',  array('\Skeletor\Controllers\API\TemplateController','find_all'));
        Flight::route('POST /api/templates',  array('\Skeletor\Controllers\API\TemplateController','find_all'));
        Flight::route('GET /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','find_by_id'));
        Flight::route('POST /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','update'));




        Flight::route('GET /admin/templates',  array('\Skeletor\Controllers\Client\ClientController','find_all'));


    Flight::set('api-service','http://localhost/skeletor/public/api/');
    Flight::set('api-private-key', 'P4p79B9N369w48z9Qrcf8sRk29gVJUKX');
    Flight::set('api-public-key', 'uH9UVCSJ5yV3jo7VZi7jPXyfLzxmga54');
      $query = \Flight::set('api-phrase', 'Skeletor');




    // lift off
	Flight::start();
