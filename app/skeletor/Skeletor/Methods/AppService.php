<?php

namespace Skeletor\Methods;

class AppService

{

   
 public static function createNameVariety($page_name) 
    {


      $page_name_arr = array(

        'lower_name_ess' => strtolower($page_name) . 's',
        'upper_name_ess' => strtoupper($page_name) . 's',
        'ucName_ess' => ucwords($page_name) . 's',
        'lower_name' => strtolower($page_name),
        'upperName' => strtoupper($page_name),
        'ucName' => ucwords($page_name)

      );
      
      return $page_name_arr;

    }


  public static function hashHMAC($data, $api_client_key = null) 
  {

    $api_key = $api_client_key; 
    if (empty($api_key)) { $api_key = \Flight::get('api-private-key'); }
    if (empty($api_key)) {
    
      $response = $this->http->newResponse();
      $response->headers->set('Content-Type', 'application/json');
    $response->setStatusCode(400);
      $this->http->send($response);
      exit;

    }
    return hash_hmac("sha256", $data, $api_key, $raw_output = false);

  }

  public static function setDefinitions() {


  error_reporting(E_ALL);
  
  ini_set('display_errors', '1');
  
  date_default_timezone_set('America/Los_Angeles');

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/skeletor/');
define('WWW', '/skeletor/public/');
define('BASE', '/');
define('CONFIG_DIR', '../app/config/');
define('SCRIPTS_DIR', ROOT . 'scripts/');
define('COMPONENTS_DIR', ROOT . 'components/');
define('STYLE_DIR', ROOT . 'styles/');
define('INC_DIR', '../app/inc/');
define('VIEW_DIR', '../app/views/');
define('VIEW_INC_DIR', '../app/views/inc/');
define('MODELS_DIR', '../app/models/');
define('CONTROLLERS_DIR', '../app/controllers/');
define('METHODS_DIR', '../app/methods/');
define('VENDOR_DIR', '../vendor/');

define('BASE_URL', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$routes = explode('/', str_replace($_SERVER['HTTP_HOST'], '', BASE_URL));

if (isset($routes[3])) {
define('PAGE_TITLE', ucwords($routes[3])); 
} else {
define('PAGE_TITLE', 'LeaderTech'); 
}

// Overwrite this with your own secret
define('CSRF_SECRET', 'c2ioeEU1n48QF2WsHGWd2HmiuUUT6dxr');
define('DEFAULT_FORM_THEME', 'form_div_layout.html.twig');

define('VENDORDIR', realpath(__DIR__ . '/../vendor'));
define('VENDOR_FORM_DIR', VENDORDIR . '/symfony/form/Symfony/Component/Form');
define('VENDOR_VALIDATOR_DIR', VENDORDIR . '/symfony/validator/Symfony/Component/Validator');
define('VENDOR_TWIG_BRIDGE_DIR', VENDORDIR . '../vendor/symfony/twig-bridge/Symfony/Bridge/Twig');
define('VIEWS_DIR', realpath(__DIR__ . '/../views'));


  }

  public static function prepareFlight() {

        /**
     *
     * Load up
     *
     *
    */

        // TODO Clean this up

        AppService::setDefinitions();



  /**
    * Initiate Twig, and register to Flight
    */
    $loader = new \Twig_Loader_Filesystem(array(
     $_SERVER['DOCUMENT_ROOT'] . '/skeletor/app/templates',
          VENDOR_TWIG_BRIDGE_DIR . '/Resources/views/Form',

      )
    );

    $twigConfig = array(
        // 'cache'  =>  './cache/twig/',
        // 'cache'  =>  false,
        'debug' =>  false,
    );
    \Flight::register('view_form', 'Twig_Environment', array($loader, $twigConfig), function($twig) {
       $translator = new \Symfony\Component\Translation\Translator('en');
       $translator->addLoader('xlf', new \Symfony\Component\Translation\Loader\XliffFileLoader());
       $translator->addResource('xlf', VENDOR_FORM_DIR . '/Resources/translations/validators.en.xlf', 'en', 'validators');
       $translator->addResource('xlf', VENDOR_VALIDATOR_DIR . '/Resources/translations/validators.en.xlf', 'en', 'validators');
       $formEngine = new \Symfony\Bridge\Twig\Form\TwigRendererEngine(array(DEFAULT_FORM_THEME));
       $formEngine->setEnvironment($twig);
       $csrfProvider = new \Symfony\Component\Form\Extension\Csrf\CsrfProvider\DefaultCsrfProvider(CSRF_SECRET);
       $validator = \Symfony\Component\Validator\Validation::createValidator();
       $twig->addExtension(new \Twig_Extension_Debug()); // Add the debug extension
       $twig->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($translator));
       $twig->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(new \Symfony\Bridge\Twig\Form\TwigRenderer($formEngine, $csrfProvider)));
       
    });

  \Flight::register('view', 'Twig_Environment', array($loader, $twigConfig), function() {
       
    });







// helper functions
  require_once INC_DIR . 'helper.php';

// get config stuff

  // ready

  // api config
  \Flight::set('api-service','http://localhost/skeletor/public/api/');
  \Flight::set('api-private-key', 'P4p79B9N369w48z9Qrcf8sRk29gVJUKX');
  \Flight::set('api-public-key', 'uH9UVCSJ5yV3jo7VZi7jPXyfLzxmga54');
  \Flight::set('api-phrase', 'Skeletor');


  // auto generated routes
  \Flight::route('/items',  array('\Skeletor\Controllers\Items\Items','get_items_page'));
  \Flight::route('GET /api/templates',  array('\Skeletor\Controllers\API\TemplateController','find_all'));
  \Flight::route('POST /api/templates',  array('\Skeletor\Controllers\API\TemplateController','find_all'));
  \Flight::route('GET /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','find_by_id'));
  \Flight::route('POST /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','update'));
  \Flight::route('GET /admin/templates/template',  array('\Skeletor\Controllers\Client\ClientController','find_all'));


  }

}