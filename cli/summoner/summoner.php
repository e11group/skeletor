
<?php

// TODO: separate concerns and meet psr-1, psr-2

require_once '../../vendor/autoload.php';

use Herrera\Cli\Application;
use Symfony\Component\Yaml\Yaml;
use Weather\Skeletor;


$app = new Application('Summoner', '1.2.3');

$app->add('hello', function ($input, $output) use ($app) {
    
    $output->writeln('Hello, ' . $input->getArgument('name') . '!');

    return 123;
})->addArgument('name');



$app->add('summon', function ($input, $output) use ($app) {
    


    	$path = $_SERVER['DOCUMENT_ROOT']. 'bones/config/config.yml';


	try {

		$config_yaml = Yaml::parse($path);


	} catch (ParseException $e) {
   	
   	 	printf("Unable to parse the YAML string: %s", $e->getMessage());
	
	}

 


    
    return 123;
})->addArgument('name');



$app->add('customSchema', function ($input, $output) use ($app) {
    


      $path = $_SERVER['DOCUMENT_ROOT']. 'bones/config/config.yml';

$file_name = $input->getArgument('name');

  $array = Yaml::parse($file_name);
  // print Yaml::dump($array);
   foreach ($array as $n=>$row){

      // declare this shit 
      // TODO psr-0 yea yea
      $insert_arr = array();
    
      // set table

      //get values
      foreach ($row as $r) {
    
            $insert_arr = array(
            'name' => $r,
            'product'  => $n,
        );

            // create add column to table
            
      }
   }

   

  try {

    $config_yaml = Yaml::parse($path);


  } catch (ParseException $e) {
    
      printf("Unable to parse the YAML string: %s", $e->getMessage());
  
  }

 


    
    return 123;
})->addArgument('name');



 


$app->run();

?> 