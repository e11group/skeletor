<?php

//-------------------------------------------------------------------------------------------------------------

  
    // bootstrap
  require_once '../bootstrap.php';
    // pre-flight
  $preflight = \Skeletor\Methods\AppService::prepareFlight();
    // lift off
	Flight::start();
  ?>