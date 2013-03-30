<?php

namespace Skeletor\Methods;

class AppService

{

   
 public static function createNameVariety($page_name) 
    {

      $page_name_url = strtolower(str_replace(" ", "_", $page_name));

      $explode = explode(' ', $page_name);

      $last = $page_name[strlen($page_name)-1];
      if ($last == 's') {
        $plural = $page_name;
      } elseif ($last == 'y') {
        $replacement = 'ies';
        $plural = substr($page_name, 0, -1).$replacement;  
      } else {
        $plural = $page_name . 's';
      }

      $path = strtolower(str_replace(" ", "/", $page_name ));

      $page_name_arr = array(
        'plural' => $plural,
        'encoded' => $page_name_url,
        'resource' => ucwords($page_name),
        'template' => ucwords(str_replace(" ", "", $page_name)),
        'first' => $explode[0],
        'encoded_first' => strtolower($explode[0]),
        'path' => $path
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

  public static function setDevMode($dev_mode) {

    if ($dev_mode == true) {
      error_reporting(E_ALL);
      ini_set('display_errors', '1');
    }

  } 

  public static function setDefinitions() {


    date_default_timezone_set('America/Los_Angeles');  
    define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/skeletor/');
    define('WWW', '/skeletor/public/');
    define('API_LOC', 'http://localhost/skeletor/public/api/');
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
    define('VENDOR_DIR', ROOT . 'vendor/');  
    define('BASE_URL', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $routes = explode('/', str_replace($_SERVER['HTTP_HOST'], '', BASE_URL));  
    define('CSRF_SECRET', 'c2ioeEU1n48QF2WsHGWd2HmiuUUT6dxr');
    define('DEFAULT_FORM_THEME', 'form_div_layout.html.twig');  
    define('VENDORDIR', realpath(__DIR__ . '/../vendor'));
    define('VENDOR_FORM_DIR', VENDORDIR . '/symfony/form/Symfony/Component/Form');
    define('VENDOR_VALIDATOR_DIR', VENDORDIR . '/symfony/validator/Symfony/Component/Validator');
    define('VENDOR_TWIG_BRIDGE_DIR', VENDORDIR . '../vendor/symfony/twig-bridge/Symfony/Bridge/Twig');
    define('VIEWS_DIR', realpath(__DIR__ . '/../views'));
    if (isset($routes[3])) {
    define('PAGE_TITLE', ucwords($routes[3])); 
    } else {
    define('PAGE_TITLE', 'Skeletor'); 
    }
  }

    public static function generateHash($password)
    {
        if ($password == null
            || strlen($password) < 2
            || strlen($password) > 100)  {
              throw new \InvalidArgumentException("The password is too weak.");

      }
       
      if (defined('CRYPT_SHA512') && CRYPT_SHA512) {

        $Salt = uniqid();  
        $Algo = '6';   
        $Rounds = '5000';   
        $CryptSalt = '$' . $Algo . '$rounds=' . $Rounds . '$' . $Salt;  
        $HashedPassword = crypt($password, $CryptSalt);  
        return $HashedPassword;

        }
    }




  public static function prepareFlight() {

    // TODO Clean this up
    AppService::setDevMode(true);
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
        'cache'  =>  './cache/twig/',
        'cache'  =>  false,
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
  // TODO remove when i can
  require_once INC_DIR . 'helper.php';

  // get config stuff (autogenerated in our build)

  // ready

  session_start();

  // these routes are only valid if authenticated


  // api config
  \Flight::set('api-service','http://localhost/skeletor/public/api/');
  \Flight::set('api-private-key', 'P4p79B9N369w48z9Qrcf8sRk29gVJUKX');
  \Flight::set('api-public-key', 'uH9UVCSJ5yV3jo7VZi7jPXyfLzxmga54');
  \Flight::set('api-phrase', 'Skeletor');
  \Flight::set('formal-name', 'Skeletor');
  \Flight::set('url', 'http://localhost/skeletor/public');

/*
   // a real conditional, not breaking 'break first'
  if (isset($_SESSION['user_id'])) {

      $salt = \Flight::get('api-phrase');
      $hashids = new \Hashids\Hashids($salt);      
      $user_id = $hashids->decrypt($_SESSION['user_id']);
      $em = \Flight::get('em');
      $qb = $em->createQueryBuilder();
      $qb->select(array('u'))
         ->from('Skeletor\Entities\Client\Users', 'u')
         ->where('u.id = :id')
         ->setParameter('id', $user_id);
         $query = $qb->getQuery();

      // one or null
      $users = $query->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
      $email = $users->getEmail();  
      \Flight::set('user_name', $email);

  }

*/

\Flight::map('notFound', function(){
    // Display custom 404 page
    include  '404.html';
});

/*
  \Flight::route('GET /api/templates',  array('\Skeletor\Controllers\API\TemplateController','find_all'));
  \Flight::route('POST /api/template',  array('\Skeletor\Controllers\API\TemplateController','create'));
  \Flight::route('GET /api/template',  array('\Skeletor\Controllers\API\TemplateController','create_view'));
  \Flight::route('GET /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','find_by_id'));
  \Flight::route('POST /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','edit'));
  \Flight::route('DELETE /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','delete'));

  \Flight::route('GET /admin/templates',  array('\Skeletor\Controllers\Client\TemplateController','view_all'));
  \Flight::route('POST /admin/template',  array('\Skeletor\Controllers\Client\TemplateController','add'));
  \Flight::route('GET /admin/template',  array('\Skeletor\Controllers\Client\TemplateController','add_view'));
  \Flight::route('GET /admin/templates/@id',  array('\Skeletor\Controllers\Client\TemplateController','edit_view'));
  \Flight::route('POST /admin/templates/@id',  array('\Skeletor\Controllers\Client\TemplateController','edit'));

*/

  // api
  // work routes

  \Flight::route('GET /api/store/customers',  array('\Skeletor\Controllers\API\CustomersController','find_all'));
  \Flight::route('GET /api/store/customers/@id',  array('\Skeletor\Controllers\API\CustomersController','find_by_id'));
  \Flight::route('GET /api/store/customers/history/@id',  array('\Skeletor\Controllers\API\CustomersController','find_history_by_id'));
  \Flight::route('POST /api/store/customer',  array('\Skeletor\Controllers\API\CouponsController','create'));
  \Flight::route('POST /api/store/customers/@id',  array('\Skeletor\Controllers\API\CouponsController','update'));
  \Flight::route('POST /api/store/customers/address/@id',  array('\Skeletor\Controllers\API\CouponsController','update_address'));
  \Flight::route('DELETE /api/store/coupons/@id',  array('\Skeletor\Controllers\API\CouponsController','delete'));


  \Flight::route('GET /api/store/settings/emails',  array('\Skeletor\Controllers\API\EmailsController','find_settings'));
  \Flight::route('POST /api/store/settings/emails',  array('\Skeletor\Controllers\API\EmailsController','update_settings'));
  \Flight::route('GET /api/store/settings/coupons',  array('\Skeletor\Controllers\API\CouponsController','find_settings'));
  \Flight::route('POST /api/store/settings/coupons',  array('\Skeletor\Controllers\API\CouponsController','update_settings'));
  \Flight::route('GET /api/store/settings/shipping',  array('\Skeletor\Controllers\API\ShippingController','find_settings'));
  \Flight::route('POST /api/store/settings/shipping',  array('\Skeletor\Controllers\API\ShippingController','update_settings'));
  \Flight::route('GET /api/store/settings/taxes',  array('\Skeletor\Controllers\API\TaxesController','find_settings'));
  \Flight::route('POSt /api/store/settings/taxes',  array('\Skeletor\Controllers\API\Taxesontroller','update_settings'));

  \Flight::route('GET /api/store/coupons',  array('\Skeletor\Controllers\API\CouponsController','find_all'));
  \Flight::route('GET /api/store/coupons/@id',  array('\Skeletor\Controllers\API\CouponsController','find_by_id'));
  \Flight::route('GET /api/store/coupon',  array('\Skeletor\Controllers\API\CouponsController','create_view'));
  \Flight::route('POST /api/store/coupon',  array('\Skeletor\Controllers\API\CouponsController','create'));
  \Flight::route('POST /api/store/coupons/@id',  array('\Skeletor\Controllers\API\CouponsController','update'));
  \Flight::route('DELETE /api/store/coupons/@id',  array('\Skeletor\Controllers\API\CouponsController','delete'));

  \Flight::route('GET /api/store/emails',  array('\Skeletor\Controllers\API\EmailsController','find_all'));
  \Flight::route('GET /api/store/emails/@id',  array('\Skeletor\Controllers\API\EmailsController','find_by_id'));
  \Flight::route('GET /api/store/email',  array('\Skeletor\Controllers\API\EmailsController','create_view'));
  \Flight::route('POST /api/store/email',  array('\Skeletor\Controllers\API\EmailsController','create'));
  \Flight::route('POST /api/store/emails/@id',  array('\Skeletor\Controllers\API\EmailsController','update'));
  \Flight::route('DELETE /api/store/emails/@id',  array('\Skeletor\Controllers\API\EmailsController','update'));

  \Flight::route('GET /api/store/emails/templates',  array('\Skeletor\Controllers\API\EmailsController','find_all_templates'));
  \Flight::route('GET /api/store/emails/templates/@id',  array('\Skeletor\Controllers\API\EmailsController','find_template_by_id'));
  \Flight::route('GET /api/emails/template',  array('\Skeletor\Controllers\API\EmailsController','create_template_view'));
  \Flight::route('POST /api/emails/template',  array('\Skeletor\Controllers\API\EmailsController','create_template'));
  \Flight::route('POST /api/store/emails/templates/@id',  array('\Skeletor\Controllers\API\EmailsController','update_template'));
  \Flight::route('DELETE /api/store/emails/templates/@id',  array('\Skeletor\Controllers\API\EmailsController','update_template'));

   \Flight::route('GET /api/store/products',  array('\Skeletor\Controllers\API\ProductsController','find_all'));
  \Flight::route('GET /api/store/products/@id',  array('\Skeletor\Controllers\API\ProductsController','find_by_id'));
  \Flight::route('GET /api/store/product',  array('\Skeletor\Controllers\API\ProductsController','create_view'));
  \Flight::route('POST /api/store/product',  array('\Skeletor\Controllers\API\ProductsController','create'));
  \Flight::route('POST /api/store/products/@id',  array('\Skeletor\Controllers\API\ProductsController','update'));
  \Flight::route('DELETE /api/store/products/@id',  array('\Skeletor\Controllers\API\ProductsController','update'));

  \Flight::route('GET /api/store/products/categories',  array('\Skeletor\Controllers\API\ProductsController','find_all_categories'));
  \Flight::route('GET /api/store/products/categories/@id',  array('\Skeletor\Controllers\API\ProductsController','find_category_by_id'));
  \Flight::route('GET /api/store/products/categories',  array('\Skeletor\Controllers\API\ProductsController','create_category_view'));
  \Flight::route('POST /api/store/products/categories',  array('\Skeletor\Controllers\API\ProductsController','create_category'));
  \Flight::route('POST /api/store/products/categories/@id',  array('\Skeletor\Controllers\API\ProductsController','update_category'));
  \Flight::route('DELETE /api/store/products/categories/@id',  array('\Skeletor\Controllers\API\ProductsController','update_category'));

  \Flight::route('GET /api/store/products/tags',  array('\Skeletor\Controllers\API\ProductsController','find_all_tags'));
  \Flight::route('GET /api/store/products/tags/@id',  array('\Skeletor\Controllers\API\ProductsController','find__tagby_id'));
  \Flight::route('GET /api/store/products/tag',  array('\Skeletor\Controllers\API\ProductsController','create_tag_view'));
  \Flight::route('POST /api/store/products/tag',  array('\Skeletor\Controllers\API\ProductsController','create_tag'));
  \Flight::route('POST /api/store/products/tags/@id',  array('\Skeletor\Controllers\API\ProductsController','update_tag'));
  \Flight::route('DELETE /api/store/products/tags/@id',  array('\Skeletor\Controllers\API\ProductsController','update_tag'));

  \Flight::route('GET /api/cms/pages',  array('\Skeletor\Controllers\API\PagesController','find_all'));
  \Flight::route('GET /api/cms/pages/@id',  array('\Skeletor\Controllers\API\PagesController','find_by_id'));
  \Flight::route('GET /api/cms/page',  array('\Skeletor\Controllers\API\PagesController','create_view'));
  \Flight::route('POST /api/cms/page',  array('\Skeletor\Controllers\API\PagesController','create'));
  \Flight::route('POST /api/cms/pages/@id',  array('\Skeletor\Controllers\API\PagesController','update'));
  \Flight::route('DELETE /api/cms/pages/@id',  array('\Skeletor\Controllers\API\PagesController','update'));

  \Flight::route('GET /api/cms/pages/templates',  array('\Skeletor\Controllers\API\PagesController','find_all_templates'));
  \Flight::route('GET /api/cms/pages/templates/@id',  array('\Skeletor\Controllers\API\PagesController','find_template_by_id'));
  \Flight::route('GET /api/cms/pages/template',  array('\Skeletor\Controllers\API\PagesController','create_template_view'));
  \Flight::route('POST /api/cms/pages/template',  array('\Skeletor\Controllers\API\PagesController','create_template'));
  \Flight::route('POST /api/cms/pages/templates/@id',  array('\Skeletor\Controllers\API\PagesController','update_template'));
  \Flight::route('DELETE /api/cms/pages/templates/@id',  array('\Skeletor\Controllers\API\PagesController','update_template'));

  \Flight::route('GET /api/cms/pages/blocks',  array('\Skeletor\Controllers\API\PagesController','find_all_blocks'));
  \Flight::route('GET /api/cms/pages/blocks/@id',  array('\Skeletor\Controllers\API\PagesController','find_block_by_id'));
  \Flight::route('GET /api/cms/pages/block',  array('\Skeletor\Controllers\API\PagesController','create_block_view'));
  \Flight::route('POST /api/cms/pages/block',  array('\Skeletor\Controllers\API\PagesController','create_block'));
  \Flight::route('POST /api/cms/pages/blocks/@id',  array('\Skeletor\Controllers\API\PagesController','update_block'));
  \Flight::route('DELETE /api/cms/pages/blocks/@id',  array('\Skeletor\Controllers\API\PagesController','update_block'));

  \Flight::route('GET /api/store/orders',  array('\Skeletor\Controllers\API\OrdersController','find_all'));
  \Flight::route('GET /api/store/orders/@id',  array('\Skeletor\Controllers\API\OrdersController','find_by_id'));
  \Flight::route('POST /api/store/orders/status/@id',  array('\Skeletor\Controllers\API\OrdersController','update_status'));
  \Flight::route('POST /api/store/orders/tracking/@id',  array('\Skeletor\Controllers\API\OrdersController','update_tracking'));


  \Flight::route('GET /api/account',  array('\Skeletor\Controllers\API\AccountController', 'find_by_id'));
  \Flight::route('POST /api/account',  array('\Skeletor\Controllers\API\AccountController', 'update'));
  \Flight::route('GET /api/dashboard',  array('\Skeletor\Controllers\API\AccountController', 'view_dashboard'));
  \Flight::route('GET /api/store',  array('\Skeletor\Controllers\API\AccountController','view_store'));
  \Flight::route('GET /api/cms',  array('\Skeletor\Controllers\API\AccountController','view_cms'));
  

  // client admin

  \Flight::route('GET /login',  array('\Skeletor\Controllers\Client\LoginController', 'login'));
  \Flight::route('POST /login',  array('\Skeletor\Controllers\Client\LoginController', 'process_login'));
  \Flight::route('GET /logout',  array('\Skeletor\Controllers\Client\LoginController', 'logout'));
  \Flight::route('GET /login/@provider',  array('\Skeletor\Controllers\Client\LoginController', 'login_provider'));
  
  \Flight::route('GET /account',  array('\Skeletor\Controllers\Client\AccountController', 'find_by_id'));
  \Flight::route('POST /account',  array('\Skeletor\Controllers\Client\AccountController', 'update'));
  \Flight::route('GET /admin/dashboard',  array('\Skeletor\Controllers\Client\AccountController', 'view_dashboard'));
  \Flight::route('GET /admin/store',  array('\Skeletor\Controllers\Client\AccountController','view_store'));
  \Flight::route('GET /admin/cms',  array('\Skeletor\Controllers\Client\AccountController','view_cms'));
  
  \Flight::route('GET /admin/store/settings/emails',  array('\Skeletor\Controllers\Client\EmailsController','find_settings'));
  \Flight::route('POST /admin/store/settings/emails',  array('\Skeletor\Controllers\Client\EmailsController','update_settings'));

  \Flight::route('GET /admin/store/settings/coupons',  array('\Skeletor\Controllers\Client\CouponsController','find_settings'));
  \Flight::route('POST /admin/store/settings/coupons',  array('\Skeletor\Controllers\Client\CouponsController','update_settings'));

  \Flight::route('GET /admin/store/settings/shipping',  array('\Skeletor\Controllers\Client\ShippingController','find_settings'));
  \Flight::route('POST /admin/store/settings/shipping',  array('\Skeletor\Controllers\Client\ShippingController','update_settings'));

  \Flight::route('GET /admin/store/settings/taxes',  array('\Skeletor\Controllers\Client\TaxesController','find_settings'));
  \Flight::route('POSt /admin/store/settings/taxes',  array('\Skeletor\Controllers\Client\Taxesontroller','update_settings'));



  \Flight::route('GET /admin/store/coupons',  array('\Skeletor\Controllers\Client\CouponsController','find_all'));
  \Flight::route('GET /admin/store/coupons/@id',  array('\Skeletor\Controllers\Client\CouponsController','find_by_id'));
  \Flight::route('GET /admin/store/coupon',  array('\Skeletor\Controllers\Client\CouponsController','create_view'));
  \Flight::route('POST /admin/store/coupon',  array('\Skeletor\Controllers\Client\CouponsController','create'));
  \Flight::route('POST /admin/store/coupons/@id',  array('\Skeletor\Controllers\Client\CouponsController','update'));
  \Flight::route('DELETE /admin/store/coupons/@id',  array('\Skeletor\Controllers\Client\CouponsController','delete'));

  \Flight::route('GET /admin/store/emails',  array('\Skeletor\Controllers\Client\EmailsController','find_all'));
  \Flight::route('GET /admin/store/emails/@id',  array('\Skeletor\Controllers\Client\EmailsController','find_by_id'));
  \Flight::route('GET /admin/store/email',  array('\Skeletor\Controllers\Client\EmailsController','create_view'));
  \Flight::route('POST /admin/store/email',  array('\Skeletor\Controllers\Client\EmailsController','create'));
  \Flight::route('POST /admin/store/emails/@id',  array('\Skeletor\Controllers\Client\EmailsController','update'));
  \Flight::route('DELETE /admin/store/emails/@id',  array('\Skeletor\Controllers\Client\EmailsController','update'));

  \Flight::route('GET /admin/store/emails/templates',  array('\Skeletor\Controllers\Client\EmailsController','find_all_templates'));
  \Flight::route('GET /admin/store/emails/templates/@id',  array('\Skeletor\Controllers\Client\EmailsController','find_template_by_id'));
  \Flight::route('GET /admin/emails/template',  array('\Skeletor\Controllers\Client\EmailsController','create_template_view'));
  \Flight::route('POST /admin/emails/template',  array('\Skeletor\Controllers\Client\EmailsController','create_template'));
  \Flight::route('POST /admin/store/emails/templates/@id',  array('\Skeletor\Controllers\Client\EmailsController','update_template'));
  \Flight::route('DELETE /admin/store/emails/templates/@id',  array('\Skeletor\Controllers\Client\EmailsController','update_template'));

  \Flight::route('GET /admin/store/customers',  array('\Skeletor\Controllers\Client\CustomersController','find_all'));
  \Flight::route('GET /admin/store/customers/history/@id',  array('\Skeletor\Controllers\Client\CustomersController','find_history_by_id'));
  \Flight::route('GET /admin/store/customers/@id',  array('\Skeletor\Controllers\Client\CustomersController','find_by_id'));

  \Flight::route('GET /admin/store/orders',  array('\Skeletor\Controllers\Client\OrdersController','find_all'));
  \Flight::route('GET /admin/store/orders/@id',  array('\Skeletor\Controllers\Client\OrdersController','find_by_id'));
  \Flight::route('GET /admin/store/orders/details/@id',  array('\Skeletor\Controllers\Client\OrdersController','find_details_by_id'));
  \Flight::route('GET /admin/store/orders/status/@id',  array('\Skeletor\Controllers\Client\OrdersController','find_status_by_id'));
  \Flight::route('POST /admin/store/orders/status/@id',  array('\Skeletor\Controllers\Client\OrdersController','update_status'));
  \Flight::route('GET /admin/store/orders/tracking/@id',  array('\Skeletor\Controllers\Client\OrdersController','find_tracking_by_id'));
  \Flight::route('POST /admin/store/orders/tracking/@id',  array('\Skeletor\Controllers\Client\OrdersController','update_tracking'));

  \Flight::route('GET /admin/store/products',  array('\Skeletor\Controllers\Client\ProductsController','find_all'));
  \Flight::route('GET /admin/store/products/@id',  array('\Skeletor\Controllers\Client\ProductsController','find_by_id'));
  \Flight::route('GET /admin/store/product',  array('\Skeletor\Controllers\Client\ProductsController','create_view'));
  \Flight::route('POST /admin/store/product',  array('\Skeletor\Controllers\Client\ProductsController','create'));
  \Flight::route('POST /admin/store/products/@id',  array('\Skeletor\Controllers\Client\ProductsController','update'));
  \Flight::route('DELETE /admin/store/products/@id',  array('\Skeletor\Controllers\Client\ProductsController','update'));

  \Flight::route('GET /admin/store/products/categories',  array('\Skeletor\Controllers\Client\ProductsController','find_all_categories'));
  \Flight::route('GET /admin/store/products/categories/@id',  array('\Skeletor\Controllers\Client\ProductsController','find_category_by_id'));
  \Flight::route('GET /admin/store/products/categories',  array('\Skeletor\Controllers\Client\ProductsController','create_category_view'));
  \Flight::route('POST /admin/store/products/categories',  array('\Skeletor\Controllers\Client\ProductsController','create_category'));
  \Flight::route('POST /admin/store/products/categories/@id',  array('\Skeletor\Controllers\Client\ProductsController','update_category'));
  \Flight::route('DELETE /admin/store/products/categories/@id',  array('\Skeletor\Controllers\Client\ProductsController','update_category'));

  \Flight::route('GET /admin/store/products/tags',  array('\Skeletor\Controllers\Client\ProductsController','find_all_tags'));
  \Flight::route('GET /admin/store/products/tags/@id',  array('\Skeletor\Controllers\Client\ProductsController','find__tagby_id'));
  \Flight::route('GET /admin/store/products/tag',  array('\Skeletor\Controllers\Client\ProductsController','create_tag_view'));
  \Flight::route('POST /admin/store/products/tag',  array('\Skeletor\Controllers\Client\ProductsController','create_tag'));
  \Flight::route('POST /admin/store/products/tags/@id',  array('\Skeletor\Controllers\Client\ProductsController','update_tag'));
  \Flight::route('DELETE /admin/store/products/tags/@id',  array('\Skeletor\Controllers\Client\ProductsController','update_tag'));

  \Flight::route('GET /admin/cms/pages',  array('\Skeletor\Controllers\Client\PagesController','find_all'));
  \Flight::route('GET /admin/cms/pages/@id',  array('\Skeletor\Controllers\Client\PagesController','find_by_id'));
  \Flight::route('GET /admin/cms/page',  array('\Skeletor\Controllers\Client\PagesController','create_view'));
  \Flight::route('POST /admin/cms/page',  array('\Skeletor\Controllers\Client\PagesController','create'));
  \Flight::route('POST /admin/cms/pages/@id',  array('\Skeletor\Controllers\Client\PagesController','update'));
  \Flight::route('DELETE /admin/cms/pages/@id',  array('\Skeletor\Controllers\Client\PagesController','update'));

  \Flight::route('GET /admin/cms/pages/templates',  array('\Skeletor\Controllers\Client\PagesController','find_all_templates'));
  \Flight::route('GET /admin/cms/pages/templates/@id',  array('\Skeletor\Controllers\Client\PagesController','find_template_by_id'));
  \Flight::route('GET /admin/cms/pages/template',  array('\Skeletor\Controllers\Client\PagesController','create_template_view'));
  \Flight::route('POST /admin/cms/pages/template',  array('\Skeletor\Controllers\Client\PagesController','create_template'));
  \Flight::route('POST /admin/cms/pages/templates/@id',  array('\Skeletor\Controllers\Client\PagesController','update_template'));
  \Flight::route('DELETE /admin/cms/pages/templates/@id',  array('\Skeletor\Controllers\Client\PagesController','update_template'));

  \Flight::route('GET /admin/cms/pages/blocks',  array('\Skeletor\Controllers\Client\PagesController','find_all_blocks'));
  \Flight::route('GET /admin/cms/pages/blocks/@id',  array('\Skeletor\Controllers\Client\PagesController','find_block_by_id'));
  \Flight::route('GET /admin/cms/pages/block',  array('\Skeletor\Controllers\Client\PagesController','create_block_view'));
  \Flight::route('POST /admin/cms/pages/block',  array('\Skeletor\Controllers\Client\PagesController','create_block'));
  \Flight::route('POST /admin/cms/pages/blocks/@id',  array('\Skeletor\Controllers\Client\PagesController','update_block'));
  \Flight::route('DELETE /admin/cms/pages/blocks/@id',  array('\Skeletor\Controllers\Client\PagesController','update_block'));


  // client public


  }
}