<?php

//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Everybody loves the sunshine
     *
     *
    */

    /*

		Nothing to see here, friend, move along - all changes should be made through skeletor.json
		
    */



//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Misc mode and config side effects.
     *
     *
    */

    // TODO : clear this out and assign to builder script

	error_reporting(E_ALL);
	
	ini_set('display_errors', '1');
	
	date_default_timezone_set('America/Los_Angeles');

    require_once '../app/config/definitions.php';


//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Libs and Classes
     *
     *
    */


    // composer autoloader
    require_once VENDOR_DIR . 'autoload.php';

    // skeletor custom classes

    // $us = new Weather\Skeletor\UserService(1,1);

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     *  Configuration
     *
     *
    */

    // database configuration
	require_once CONFIG_DIR . 'config.php';



//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Helpers
     *
   	 *
    */


	// helper functions
	require_once INC_DIR . 'helper.php';

	// kirby toolkit
	require_once '../components/kirby/kirby.php';


//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Sessions
     *
   	 *
    */

    // TODO : add login_controller to class-autoloader through build script

    // start sessions
    use mjohnson\resession\Resession;
 
	$session = new Resession(array(
		'security' => Resession::SECURITY_HIGH,
		'cookies' => true,
		'name' => 'Session'
	));

    // login controller
    //require_once INC_DIR . 'login_controller.php';


//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Security
     *
   	 *
    */

    /***

    // Generate CSRF token to use in form hidden field
    $token = NoCSRF::generate( 'csrf_token' );

    // Input for view
    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">


    	
    if (isset($_POST[ 'field' ])) {
        
        try
        {
            // Run CSRF check, on POST data, in exception mode, for 10 minutes, in one-time mode.
            NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
           
        }
        catch ( Exception $e )
        {
            // CSRF attack detected
            $result = $e->getMessage() . ' Form ignored.';
        }
    
    } else
    
    {

    }


***/



//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Routes and Views
     *
   	 *
    */


    // all hail WingCommander
	WingCommander::init();

    // ready ...

    Weather\Skeletor\AppService::loadRoutes();
   
	Flight::route('/', function()
    {

        $routes_dir = '../app/routes/';

        
        $us = new Weather\Skeletor\UserService(1,1);
   
            

    $pageTitle = 'asdf';
		Flight::view()->set("someVar", "Hello, World!");
		Flight::render("templates/add_page", array("title" => $pageTitle));

	});


//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Initializiate
     *
   	 *
    */

    // lift off
	Flight::start();



//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Lionel Richie
     *
   	 *
    */

    /*
	
    I know it sounds funny but I just can't stand the pain, aoh
    Girl, I'm leaving you tomorrow
    Seems to me girl, you know I've done all I can, aoh
    See I begged, stole and I borrowed, yeah
    
    Ooh, that's why I'm easy
    I'm easy like Sunday mornin', yeah, oh
    That's why I'm easy
    I'm easy like Sunday mornin'

    Why in the world would anybody put chains on me?
    I've paid my dues to make it
    Everybody wants me to be what they want me to be
    I'm not happy when I try to fake it, oh, no

    Ooh, that's why I'm easy
    I'm easy like Sunday mornin', yeah, oh
    That's why I'm easy
    I'm easy like Sunday mornin'

    I wanna be high, so high
    I wanna be free to know the things I do are right
    Yeah, I wanna be free, just me, oh, babe

    Yeah, oh, yeah

    That's why I'm easy, baby
    Easy like Sunday mornin', yeah, oh
    That's why I'm easy, yeah
    I'm easy like Sunday mornin', oh

    Why I'm easy, yeah
    Easy like Sunday mornin'
    That's why I'm easy, yeah
    I'm easy like Sunday mornin'

    Said, I'm easy like Sunday
    I'm easy like Sunday, I'm easy like Sunday mornin'
    I'm easy like Sunday mornin', mornin, yeah
    I'm so easy
    I'm easy like Sunday mornin', yeah, yeah

    I feel so easy, yeah, yeah
    I'm easy like Sunday mornin'
    Easy like Sunday mornin'
    I'm easy like Sunday morn, mornin'

    */















